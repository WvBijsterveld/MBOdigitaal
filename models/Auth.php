<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/docroot.php';
require_once __DOCUMENTROOT__ . '/config/globalvars.php';
require_once __DOCUMENTROOT__ . '/errors/default.php';
require_once __DOCUMENTROOT__ . '/database/dbconnection.php';
require_once __DOCUMENTROOT__ . '/vendor/autoload.php';

require_once __DOCUMENTROOT__ . '/models/Users.php';
require_once __DOCUMENTROOT__ . '/models/Roles.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class Auth
{
    // login controleert de gebruikersnaam (emailadres) en het wachtwoord (secret)
    // die de gebruiker heeft ingevuld in het formulier.
    // login maakt ook een cookie aan. Cookie is 1 uur geldig.
    // functie retourneert true als het goed gaat.
    public static function login($email, $secret)
    {
        global $db;

        $sql_select_user_by_email = "SELECT * FROM users WHERE email=?";

        $stmt = $db->prepare($sql_select_user_by_email);

        // Gebruiker wordt opgezocht in de user tabel.
        if ($stmt->execute([$email])) {
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $user = $users[0];

            if (!$user) {
                callLoginPage("Er is geen gebruiker gevonden met dit emailadres.");
                exit();
            }

            // Controleren of het gegeven wachtwoord overeenkomt met het opgeslagen wachtwoord.
// Corrected login function
if ($secret === $user['password']) {
    // Correct password
    global $jwtkey;

    // Get the user's role directly from the `users` table
    $role = $user["role"];
    
    // Generate JWT
    $token = JWT::encode(
        array(
            'iat' => time(),
            'nbf' => time(),
            'exp' => time() + 8 * 3600,  // Token valid for 8 hours
            'data' => array(
                'id' => $user['id'],
                'roleName' => $role
            )
        ),
        $jwtkey,
        'HS256'
    );

    // Set the JWT token in cookies
    setcookie(
        "token",
        $token,
        time() + 8 * 3600,
        "/",
        "",
        true,
        true
    );

    // Role-based redirection
    $roleName = strtolower($role);  // Ensure role is lowercase
    if ($roleName === 'student') {
        header("Location: /views/Studentpage.php");
    } elseif ($roleName === 'mentor') {
        header("Location: /views/mentorpage.php");
    } elseif ($roleName === 'levelcoordinator') {
        header("location: /views/managelevel.php");
    } else {
        header("Location: ../views/defaultpagina.php");
    }

    exit();  // Stop further script execution

  // Stop further script execution after redirect.
            } else {
                callLoginPage("Uw inloggegevens zijn niet juist.");
            }
            
        } else {
            callErrorPage("Het is niet gelukt om uw gegevens te controleren.");
            exit();
        }
    }

    public static function check($rolesOrIds)
    {
        if (isset($_COOKIE['token'])) {

            $token = $_COOKIE['token'];
            global $jwtkey;
            $decoded = JWT::decode($token, new Key($jwtkey, 'HS256'));

            // Controleren of het account van de gebruiker wel actief is.
            $tokenId = $decoded->data->id;
            if (!Users::isEnabled($tokenId)) {
                callErrorPage("Uw account is niet actief.");
            }

            // Controleren of het token nog geldig is.
            $exp = (int) $decoded->exp;
            if ($exp < time()) {
                callLoginPage("U moet opnieuw inloggen. Uw sessie is verlopen.");
            }

            $tokenIsValid = false;
            // Controleren of de rol van de gebruiker is toegestaan.
            $tokenRole = $decoded->data->roleName;
            foreach ($rolesOrIds as $role) {
                if (strtolower($tokenRole) === strtolower($role)) {
                    $tokenIsValid = true;
                }
            }

            // Controleren of de ID van de gebruiker is toegestaan.
            foreach ($rolesOrIds as $id) {
                if ($tokenId === $id) {
                    $tokenIsValid = true;
                }
            }

            if ($tokenIsValid) {
                return true;
            }

            callLoginPage("U hebt niet de juiste rechten om deze pagina te bezoeken.");

        } else {
            callLoginPage("U bent niet ingelogd.");
        }
    }

    public static function checkResetPassword()
    {
        $id = Auth::getTokenId();

        if (Users::mustChangeSecretAtLogon($id)) {
            callResetPasswordPage($id);
        }
    }

    public static function logout()
    {
        setcookie("token", "", time() - 8 * 3600, "/", "", true, true);
    }

    private static function getTokenId()
    {
        if (isset($_COOKIE['token'])) {

            $token = $_COOKIE['token'];
            global $jwtkey;
            $decoded = JWT::decode($token, new Key($jwtkey, 'HS256'));

            return $decoded->data->id;
        }
    }
}
