<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/docroot.php';
require_once __DOCUMENTROOT__ . '/config/db.php';
require_once __DOCUMENTROOT__ . '/errors/default.php';

$dsn = "mysql:host=$host;dbname=$dbName;charset=UTF8";

try {
    $db = new PDO($dsn, $user, $password);
    // if ($pdo) {
    //     echo "Connected to the $db database successfully!";
    // }
} catch (PDOException $e) {
    echo $e;
    // callErrorPage("Er kan geen verbinding worden gemaakt met de databaseserver");
}
// INSERT INTO levels (id, educationId, level, subject, description, deliverables) VALUES ('1', '[]', 'Level 1', '1: Realiseert Software', 'U3R1ZGVudCBoZWVmdCBYQU1NUC9hbHRlcm5hdGllZiB3ZXJrZW5kIGdlw69uc3RhbGxlZXJkLg==', '[]');
// INSERT INTO levels (id, educationId, level, subject, description, deliverables) VALUES ('2', '[]', 'Level 1', '2: Werken in een ontwikkelteam', 'U3R1ZGVudCB2b2VydCBlZW4gcHJvamVjdCB1aXQgaW4gZWVuIGdyb2VwIGVuIG1hYWt0IGRlZWwgdWl0IHZhbiBlZW4gdGVhbS4=', '[]');
// INSERT INTO levels (id, educationId, level, subject, description, deliverables) VALUES ('3', '[]', 'Level 2', 'HTML/CSS Skills', 'U3R1ZGVudCBrYW4gNSBIVE1MIHRhZ3MuIDUgQ1NTIG9uZGVyd2VycGVuLg==', '[]');
// INSERT INTO levels (id, educationId, level, subject, description, deliverables) VALUES ('4', '[]', 'Level 3', 'Database Management', 'U3R1ZGVudCBrYW4gZWVuIGRhdGFiYXNlIG1ha2VuIG1ldCBnZWJydWlrZXJzcmVnaXN0cmF0aWUu', '[]');
// INSERT INTO levels (id, educationId, level, subject, description, deliverables) VALUES ('5', '[]', 'Level 4', 'ERD & Technical Design', 'U3R1ZGVudCBrYW4gZWVuIEVSRCwgRnVuY3Rpb25lZWwvVGVjaG5pc2NoIG9udHdlcnAgbWFrZW4u', '[]');
// INSERT INTO levels (id, educationId, level, subject, description, deliverables) VALUES ('6', '[]', 'Level 5 BPV 342 uur', 'Presentatie Software', 'U3R1ZGVudCBwcmVzZW50ZWVydCB6ZWxmZ2VtYWFrdGUgc29mdHdhcmUgaW4gZWVuIGJlZHJpamZzb21nZXZpbmcu', '[]');
// INSERT INTO levels (id, educationId, level, subject, description, deliverables) VALUES ('7', '[]', 'Level 6', 'Tweede Programmeertaal', 'U3R1ZGVudCBoZWVmdCB0d2VlZGUgcHJvZ3JhbW1lZXJ0YWFsIGdla296ZW4gZW4gcHJvamVjdCBhZmdlcm9uZC4=', '[]');
// INSERT INTO levels (id, educationId, level, subject, description, deliverables) VALUES ('8', '[]', 'Level 7', 'Afgeronde Challenges', 'U3R1ZGVudCBsYWF0IGluIG1pbmltYWFsIDIgYWZnZXJvbmRlIGNoYWxsZW5nZXMgZWVuIHplbGZzdGFuZGlnZSB3ZXJraG91ZGluZyB6aWVuLg==', '[]');
// INSERT INTO levels (id, educationId, level, subject, description, deliverables) VALUES ('9', '[]', 'Level 8 BPV 1296 uur', 'Professioneel Gedrag', 'U3R1ZGVudCB0b29udCBwcm9mZXNzaW9uZWVsIGdlZHJhZyBpbiBlZW4gQlBWIHZhbiAxMjk2IHV1ci4=', '[]');
