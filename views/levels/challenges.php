<!DOCTYPE html>
<html lang="nl">

<head>
    <?php require '../views/templates/head.php' ?>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100 text-gray-900">

    <?php require '../views/templates/menu.php' ?>

    <div class="mt-6 mb-16 w-11/12 p-6 space-y-8 sm:p-8 bg-white mx-auto rounded-lg shadow-lg">

    <h2 class="text-3xl font-extrabold mb-6 text-center">Overzicht van alle Levels en Onderdelen</h2>


<!-- Tab navigatie knoppen -->
<div class="flex justify-center items-center space-x-4 mb-6">
<button class="py-2 px-4 bg-indigo-500 text-white rounded-md hover:bg-indigo-600 hover:scale-110 transition-transform duration-300 focus:outline-none" onclick="filterLevel('all')">Alle Levels</button>
<button class="py-2 px-4 bg-gray-300 text-gray-800 rounded-md hover:bg-indigo-500 hover:scale-110 transition-transform duration-300 focus:outline-none" onclick="filterLevel('level1')">Level 1</button>
<button class="py-2 px-4 bg-gray-300 text-gray-800 rounded-md hover:bg-indigo-500 hover:scale-110 transition-transform duration-300 focus:outline-none" onclick="filterLevel('level2')">Level 2</button>
<button class="py-2 px-4 bg-gray-300 text-gray-800 rounded-md hover:bg-indigo-500 hover:scale-110 transition-transform duration-300 focus:outline-none" onclick="filterLevel('level3')">Level 3</button>
<button class="py-2 px-4 bg-gray-300 text-gray-800 rounded-md hover:bg-indigo-500 hover:scale-110 transition-transform duration-300 focus:outline-none" onclick="filterLevel('level4')">Level 4</button>
<button class="py-2 px-4 bg-gray-300 text-gray-800 rounded-md hover:bg-indigo-500 hover:scale-110 transition-transform duration-300 focus:outline-none" onclick="filterLevel('level5')">Level 5</button>
<button class="py-2 px-4 bg-gray-300 text-gray-800 rounded-md hover:bg-indigo-500 hover:scale-110 transition-transform duration-300 focus:outline-none" onclick="filterLevel('level6')">Level 6</button>
<button class="py-2 px-4 bg-gray-300 text-gray-800 rounded-md hover:bg-indigo-500 hover:scale-110 transition-transform duration-300 focus:outline-none" onclick="filterLevel('level7')">Level 7</button>

</div>


        <!-- Dynamische tabel -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-sm">
                <thead class="bg-gray-100 border-b">
                    <tr class="text-gray-600 uppercase text-sm">
                        <th class="py-3 px-6 text-left">Onderdeel</th>
                        <th class="py-3 px-6 text-left level-filter level1">Level 1</th>
                        <th class="py-3 px-6 text-left level-filter level2">Level 2</th>
                        <th class="py-3 px-6 text-left level-filter level3">Level 3</th>
                        <th class="py-3 px-6 text-left level-filter level4">Level 4</th>
                        <th class="py-3 px-6 text-left level-filter level5">Level 5</th>
                        <th class="py-3 px-6 text-left level-filter level6">Level 6</th>
                        <th class="py-3 px-6 text-left level-filter level7">Level 7</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 text-sm">
                    <!-- 1: Realiseert Software -->
                    <tr class="border-b">
                        <td class="py-3 px-6 font-bold">1: Realiseert Software</td>
                        <td class="py-3 px-6 level-filter level1">XAMPP geïnstalleerd en HTML/CSS kennis.</td>
                        <td class="py-3 px-6 level-filter level2">Kan 5 HTML tags en CSS uitleggen.</td>
                        <td class="py-3 px-6 level-filter level3">Maakt een database en schrijft nette code.</td>
                        <td class="py-3 px-6 level-filter level4">ERD en ontwerpen maken met OOP.</td>
                        <td class="py-3 px-6 level-filter level5">Presenteert tweede programmeertaal.</td>
                        <td class="py-3 px-6 level-filter level6">Legt de code van een verdiepende challenge uit.</td>
                        <td class="py-3 px-6 level-filter level7">Voltooit challenges en kan testplan uitleggen.</td>
                    </tr>

                    <!-- 2: Werken in een ontwikkelteam -->
                    <tr class="border-b bg-gray-50">
                        <td class="py-3 px-6 font-bold">2: Werken in een ontwikkelteam</td>
                        <td class="py-3 px-6 level-filter level1">Project uitgevoerd in een groep.</td>
                        <td class="py-3 px-6 level-filter level2">Samenwerking en presentatie.</td>
                        <td class="py-3 px-6 level-filter level3">Reflectie via Belbin test.</td>
                        <td class="py-3 px-6 level-filter level4">Geeft feedback en maakt planning.</td>
                        <td class="py-3 px-6 level-filter level5">STARR-reflectie en feedback geven.</td>
                        <td class="py-3 px-6 level-filter level6">360-graden feedback en presentatie.</td>
                        <td class="py-3 px-6 level-filter level7">Presenteert professioneel product.</td>
                    </tr>

                    <!-- 3: Generieke onderdelen RE -->
                    <tr class="border-b">
                        <td class="py-3 px-6 font-bold">3: Generieke onderdelen RE</td>
                        <td class="py-3 px-6 level-filter level1">Rekenlicentie aangeschaft en H1-6 voltooid..</td>
                        <td class="py-3 px-6 level-filter level2">H7-13 voltooid.</td>
                        <td class="py-3 px-6 level-filter level3">H14-18 voltooid.  </td>
                        <td class="py-3 px-6 level-filter level4"></td>
                        <td colspan="4" class="py-3 px-6"></td>
                    </tr>

                    <!-- 4: Generieke onderdelen BS -->
                    <tr class="border-b bg-gray-50">
                        <td class="py-3 px-6 font-bold">4: Generieke onderdelen BS</td>
                        <td class="py-3 px-6 level-filter level1">Beloning: '*'.</td>
                        <td class="py-3 px-6 level-filter level2">Heeft zich verdiept in de dimensie Sociaal Maatschappelijk, heeft een mening over normen en waarden en verschillen tusssen individuen en heeft dit aangetoond in een infographic</td>
                        <td class="py-3 px-6 level-filter level3">Heeft zich verdiept in de dimensie gezondheid, heeft een mening over beroepsziekten en het belang van gezondheid in het algemeen en heeft dit aangetoond in een infographic.</td>
                        <td class="py-3 px-6 level-filter level4">Heeft zich verdiept in de dimensie politiek, heeft een mening over diverse politieke stromingen, heeft kennis van het Nederlandse kiessysteen, 1e en 2e kamer en trias politica en heeft dit aangetoond in een infographic</td>
                        <td class="py-3 px-6 level-filter level5">Heeft zich verdiept in de dimensie economie, heeft zich verdiept in de kosten die een student in Nederland heeft, welke verzekeringen verplicht zijn na de leeftijd van 18 jaar en heeft kennis van belastingen in Nederland en heeft dit aangetoond in een infographic</td>
                        <td class="py-3 px-6 level-filter level6">Interview bij de stagebegeleider van het BPV bedrijf over hoe de vier dimensies een plek krijgen in de organisatie en geeft een advies voor verbetering op basis van het interview.</td>
                        <td class="py-3 px-6 level-filter level7">Neemt de burgerschapsdimensies op in uitwerking van de challenges. Doet voorstel voor acties challenge owner</td>
                    </tr>

                    <!-- 5: Generieke onderdelen NE -->
                    <tr class="border-b">
                        <td class="py-3 px-6 font-bold">5: Generieke onderdelen NE</td>
                        <td class="py-3 px-6 level-filter level1">Student heeft drie verschillende "Nederlands-Bricks" succesvol voltooid. </td>
                        <td class="py-3 px-6 level-filter level2">-</td>
                        <td class="py-3 px-6 level-filter level3">-</td>
                        <td class="py-3 px-6 level-filter level4">Student heeft een presentatie-opdracht op 3F-niveau voltooid.</td>
                        <td class="py-3 px-6 level-filter level5">Student heeft een schrijfopdracht op 3F-niveau voltooid.</td>
                        <td class="py-3 px-6 level-filter level6">Student heeft een oefenexamen Lezen/Luisteren op 3F-niveau voltooid.</td>
                        <td class="py-3 px-6 level-filter level7">Student heeft alle examens voor Nederlands behaald.</td>
                    </tr>

                    <!-- 6: Generieke onderdelen EN -->
                    <tr class="border-b bg-gray-50">
                        <td class="py-3 px-6 font-bold">6: Generieke onderdelen EN</td>
                        <td class="py-3 px-6 level-filter level1">Beloning: '*'</td>
                        <td class="py-3 px-6 level-filter level2">Opdrachten voor A2 lezen en luisteren ERK niveau lezen: Ik kan zeer korte eenvoudige teksten lezen. Ik kan specifieke voorspelbare informatie vinden in eenvoudige, alledaagse teksten zoals advertenties, folders, menu's en dienstregelingen en ik kan korte, eenvoudige, persoonlijke brieven begrijpen. ERK niveau luisteren: Ik kan zinnen en de meest frequente woorden begrijpen die betrekking hebben op gebieden die van direct persoonlijk belang zijn (bijvoorbeeld basisinformatie over mezelf en mijn familie, winkelen, plaatselijke omgeving, werk). Ik kan de belangrijkste punten in korte, duidelijke eenvoudige boodschappen en aankondigingen volgen.</td>
                        <td class="py-3 px-6 level-filter level3">Opdrachten voor A2 schrijven en gesprekken voeren ERK niveau schrijven: Ik kan korte, eenvoudige notities en boodschappen opschrijven. Ik kan een zeer eenvoudige persoonlijke brief schrijven, bijvoorbeeld om iemand voor iets te bedanken. ERK niveau gesprekken voeren: Ik kan communiceren over eenvoudige en alledaagse taken die een eenvoudige en directe uitwisseling van informatie over vertrouwde onderwerpen en activiteiten betreffen. Ik kan zeer korte sociale gesprekken aan, alhoewel ik gewoonlijk niet voldoende begrijp om het gesprek zelfstandig gaande te houden.</td>
                        <td class="py-3 px-6 level-filter level4">Opdrachten voor A2 vocabulair en spreken ERK niveau spreken: Ik kan een reeks uitdrukkingen en zinnen gebruiken om in eenvoudige bewoordingen mijn familie en andere mensen, leefomstandigheden, mijn opleiding en mijn huidige of meest recente baan te beschrijven.</td>
                        <td class="py-3 px-6 level-filter level5">Opdrachten voor B1 lezen en luisteren ERK niveau lezen: Ik kan teksten begrijpen die hoofdzakelijk bestaan uit hoogfrequente, alledaagse of aan mijn werk gerelateerde taal. Ik kan de beschrijving van gebeurtenissen, gevoelens en wensen in persoonlijke brieven begrijpen. ERK niveau luisteren: Ik kan de hoofdpunten begrijpen wanneer in duidelijk uitgesproken standaarddialect wordt gesproken over vertrouwde zaken die ik regelmatig tegenkom op mijn werk, school, vrije tijd enz. Ik kan de hoofdpunten van veel radio- of tvprogramma’s over actuele zaken of over onderwerpen van persoonlijk of beroepsmatig belang begrijpen, wanneer er betrekkelijk langzaam en duidelijk gesproken wordt.</td>
                        <td class="py-3 px-6 level-filter level6">-</td>
                        <td class="py-3 px-6 level-filter level7">Opdrachten voor B1 vocabulair en spreken Examen spreken, gesprek voeren, schrijven ERK niveau spreken: Ik kan uitingen op een simpele manier aan elkaar verbinden, zodat ik ervaringen en gebeurtenissen, mijn dromen, verwachtingen en ambities kan beschrijven. Ik kan in het kort redenen en verklaringen geven voor mijn meningen en plannen. Ik kan een verhaal vertellen, of de plot van een boek of film weergeven en mijn reacties beschrijven.</td>
                    </tr>

                    <!-- 7: Generieke onderdelen LB -->
                    <tr class="border-b">
                        <td class="py-3 px-6 font-bold">7: Generieke onderdelen LB</td>
                        <td colspan="4" class="py-3 px-6 level-filter level1">-</td>
                        <td colspan="2" class="py-3 px-6 level-filter level2">Maak een profiel aan bij Leo Loopbaan. Doe de test "jouw plek in de wereld van werk" Reflecteer hierop. Maak de loopbaanopdracht belemmering of kans in Leo Loopbaan. En reflecteer.</td>
                        <td colspan="2" class="py-3 px-6 level-filter level3">Maak in Leo Loopbaan de tests 'Persoonlijkheidstype', 'Kwaliteitentest' en 'Beroepenzelfonderzoek' schrijf een reflectie over de uitkomsten, je kunt uitleg geven over de uitkomsten wat je over jezelf leerde.</td>
                        <td colspan="4" class="py-3 px-6 level-filter level4">Maak in Leo Loopbaan de tests 'Waardentest', 'Competentiescan' en 'Employebility' schrijf een reflectie over de uitkomsten, je kunt uitleg geven over de uitkomsten wat je over jezelf leerde.</td>
                        <td colspan="2" class="py-3 px-6 level-filter level5">Maak een LinkedIn profiel aan, je kunt hierover uitleggen wat belangrijk is. Maak een CV.</td>
                        <td colspan="2" class="py-3 px-6 level-filter level6">-</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function filterLevel(level) {
            var i, allCells, levelCells;

            // Verberg alle rijen van alle levels
            allCells = document.getElementsByClassName('level-filter');
            for (i = 0; i < allCells.length; i++) {
                allCells[i].classList.add('hidden');
            }

            // Toon de geselecteerde level kolom of toon alles als 'all' is geselecteerd
            if (level === 'all') {
                for (i = 0; i < allCells.length; i++) {
                    allCells[i].classList.remove('hidden');
                }
            } else {
                levelCells = document.getElementsByClassName(level);
                for (i = 0; i < levelCells.length; i++) {
                    levelCells[i].classList.remove('hidden');
                }
            }
        }
    </script>

    <?php require '../views/templates/footer.php' ?>

</body>

</html>
