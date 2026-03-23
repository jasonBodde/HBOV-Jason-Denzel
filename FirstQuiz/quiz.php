<?php
session_start();

/* ------------------------------ Reset score when quiz starts ------------------------------ */
if (!isset($_SESSION['score'])) {
    $_SESSION['score'] = 0;
}

/* ------------------------------ Question database (30 unique questions) ------------------------------ */
$questions = [
    [
        "question" => "Wat is de primaire focus van de HBO-ICT opleiding?",
        "options" => [
            ["Programmeren en softwareontwikkeling", "bi-laptop"],
            ["Netwerken en systeembeheer", "bi-router"],
            ["Data-analyse en kunstmatige intelligentie", "bi-bar-chart-line"],
            ["Alle bovenstaande", "bi-check-all"]
        ],
        "correct" => 3
    ],
    [
        "question" => "Welke van de volgende vakken komt waarschijnlijk voor in het eerste jaar van de opleiding?",
        "options" => [
            ["Computerbeveiliging", "bi-shield-lock"],
            ["Webdesign", "bi-browser-chrome"],
            ["Programmeren in Java", "bi-code"],
            ["Netwerkarchitectuur", "bi-server"]
        ],
        "correct" => 2
    ],
    [
        "question" => "Welke programmeertaal wordt vaak geleerd in het eerste jaar van de HBO-ICT opleiding?",
        "options" => [
            ["JavaScript", "bi-code-slash"],
            ["Python", "bi-file-earmark-code"],
            ["C#", "bi-file-earmark-text"],
            ["PHP", "bi-file-earmark-text"]
        ],
        "correct" => 1
    ],
    [
        "question" => "Wat is een belangrijk voordeel van stage lopen tijdens de opleiding?",
        "options" => [
            ["Het maakt je studie makkelijker", "bi-clipboard"],
            ["Je leert praktische ervaring opdoen en netwerken", "bi-person-lines-fill"],
            ["Je krijgt altijd een vast contract na je stage", "bi-file-earmark-check"],
            ["Je hebt geen lessen meer", "bi-door-open"]
        ],
        "correct" => 1
    ],
    [
        "question" => "Wat kun je verwachten in de minor “Cybersecurity”?",
        "options" => [
            ["Leren over ethische hacking en beveiligingsprotocollen", "bi-lock"],
            ["Het ontwerpen van websites", "bi-window"],
            ["Software development voor mobiele apps", "bi-phone"],
            ["Data-analyse voor bedrijven", "bi-pie-chart"]
        ],
        "correct" => 0
    ],
    [
        "question" => "Wat is de afkorting van de term “API”?",
        "options" => [
            ["Application Programming Interface", "bi-code-slash"],
            ["Application Program Interface", "bi-code"],
            ["Automated Processing Interface", "bi-cpu"],
            ["All Purpose Interface", "bi-tools"]
        ],
        "correct" => 0
    ],
    [
        "question" => "Hoeveel jaar duurt een HBO-ICT opleiding meestal?",
        "options" => [
            ["2 jaar", "bi-clock"],
            ["3 jaar", "bi-clock"],
            ["4 jaar", "bi-calendar"],
            ["5 jaar", "bi-calendar"]
        ],
        "correct" => 2
    ],
    [
        "question" => "Wat is het verschil tussen een programmeur en een software engineer?",
        "options" => [
            ["Een programmeur schrijft alleen code, een software engineer doet dat én ontwerpt systemen.", "bi-code-slash"],
            ["Er is geen verschil.", "bi-person-check"],
            ["Een software engineer is een type programmeur.", "bi-person-lines"],
            ["Een programmeur schrijft apps, een software engineer werkt alleen met websites.", "bi-file-earmark-text"]
        ],
        "correct" => 0
    ],
    [
        "question" => "Wat is een veelgebruikte software voor versiebeheer?",
        "options" => [
            ["GitHub", "bi-github"],
            ["Adobe Photoshop", "bi-image"],
            ["WordPress", "bi-window"],
            ["Excel", "bi-file-earmark-spreadsheet"]
        ],
        "correct" => 0
    ],
    [
        "question" => "Welke van de volgende specialisaties is geen onderdeel van de HBO-ICT opleiding?",
        "options" => [
            ["Software Engineering", "bi-laptop"],
            ["Data Science", "bi-pie-chart"],
            ["Verkoop en marketing", "bi-person-circle"],
            ["Kunstmatige Intelligentie", "bi-lightbulb"]
        ],
        "correct" => 2
    ],
    [
        "question" => "Wat zijn 'Agile' en 'Scrum' in de context van een ICT-opleiding?",
        "options" => [
            ["Methoden voor het managen van projecten en teams", "bi-people"],
            ["Specifieke programmeertalen", "bi-code"],
            ["Computerbeveiligingstechnieken", "bi-shield-lock"],
            ["Opleidingen voor netwerktechnici", "bi-server"]
        ],
        "correct" => 0
    ],
    [
        "question" => "Wat is een belangrijke vaardigheid voor een ICT’er op de werkvloer?",
        "options" => [
            ["Creatief denken", "bi-lightbulb"],
            ["Teamwerk en communicatie", "bi-person-lines-fill"],
            ["Alleen technische kennis", "bi-tools"],
            ["Alleen analytisch vermogen", "bi-graph-up"]
        ],
        "correct" => 1
    ],
    [
        "question" => "Waarom is het belangrijk om een netwerk van contacten te hebben tijdens de opleiding?",
        "options" => [
            ["Het helpt je bij het vinden van een stage of baan", "bi-person-check"],
            ["Het is niet echt belangrijk", "bi-x-circle"],
            ["Het helpt je om je studie sneller te voltooien", "bi-hourglass"],
            ["Je krijgt automatisch betere cijfers", "bi-bar-chart"]
        ],
        "correct" => 0
    ],
    [
        "question" => "Wat wordt er bedoeld met het begrip 'Big Data'?",
        "options" => [
            ["Grote hoeveelheden gestructureerde en ongestructureerde data", "bi-database"],
            ["Software die je helpt met datavisualisatie", "bi-bar-chart"],
            ["Een database voor kleine bedrijven", "bi-building"],
            ["Sociale netwerken", "bi-share-alt"]
        ],
        "correct" => 0
    ],
    [
        "question" => "Wat is een belangrijk voordeel van een ICT-opleiding in het buitenland?",
        "options" => [
            ["Je leert een nieuwe taal", "bi-globe"],
            ["Je ontvangt een hogere studiebeurs", "bi-cash-stack"],
            ["Je wordt automatisch aangenomen bij grote bedrijven", "bi-building"],
            ["Je krijgt geen stageplek", "bi-x-circle"]
        ],
        "correct" => 0
    ],
    [
        "question" => "Wat is het doel van een software architect in de ICT?",
        "options" => [
            ["Het ontwerpen van de algehele structuur van softwaresystemen", "bi-architecture"],
            ["Het schrijven van eenvoudige code", "bi-file-earmark-code"],
            ["Het beheren van netwerken", "bi-router"],
            ["Het onderhouden van klantrelaties", "bi-person-lines-fill"]
        ],
        "correct" => 0
    ],
    [
        "question" => "Wat betekent de term 'machine learning'?",
        "options" => [
            ["Een type kunstmatige intelligentie waarmee systemen leren van data", "bi-brain"],
            ["Het gebruik van robots voor fysiek werk", "bi-person"],
            ["De taak om handmatige processen te automatiseren", "bi-gear"],
            ["Een algoritme dat foto's maakt", "bi-camera"]
        ],
        "correct" => 0
    ],
    [
        "question" => "Wat kun je verwachten in een 'Data Science' specialisatie?",
        "options" => [
            ["Analyse van grote hoeveelheden gegevens om patronen te vinden", "bi-graph-up"],
            ["Softwareontwikkeling voor mobiele apps", "bi-phone"],
            ["Beveiliging van bedrijfsnetwerken", "bi-shield-lock"],
            ["Webdesign en UX/UI", "bi-ui-checks"]
        ],
        "correct" => 0
    ],
    [
        "question" => "Wat is 'cloud computing'?",
        "options" => [
            ["Het opslaan van data en apps op externe servers via internet", "bi-cloud"],
            ["Het beheren van lokale netwerken", "bi-server"],
            ["Een programmeertaal voor webapplicaties", "bi-file-earmark-code"],
            ["Een databaseprogramma", "bi-database"]
        ],
        "correct" => 0
    ],
    [
        "question" => "Welke techniek wordt vaak gebruikt voor gegevensbeveiliging?",
        "options" => [
            ["Encryptie", "bi-shield-lock"],
            ["HTML", "bi-code-slash"],
            ["CSS", "bi-file-earmark-css"],
            ["SQL", "bi-database"]
        ],
        "correct" => 0
    ],
    [
        "question" => "Welke skill is essentieel voor een Data Scientist?",
        "options" => [
            ["Statistische analyse en programmeren", "bi-bar-chart"],
            ["Alleen goed kunnen programmeren", "bi-code-slash"],
                       ["Alleen goed kunnen programmeren", "bi-code-slash"],
            ["Netwerkbeheer", "bi-router"],
            ["Webdesign", "bi-browser-chrome"]
        ],
        "correct" => 0
    ],
    [
        "question" => "Wat wordt er verstaan onder 'DevOps'?",
        "options" => [
            ["Een samenwerkingsmodel tussen ontwikkeling en IT-beheer", "bi-cogs"],
            ["Een programmeertaal voor webontwikkeling", "bi-code-slash"],
            ["Een type software voor datavisualisatie", "bi-pie-chart"],
            ["Een beveiligingsprotocol", "bi-shield-lock"]
        ],
        "correct" => 0
    ],
    [
        "question" => "Wat is een 'database schema'?",
        "options" => [
            ["De structuur van een database, inclusief tabellen en relaties", "bi-database"],
            ["Een manier om data te comprimeren", "bi-compress"],
            ["De beschrijving van de datatypes in een programma", "bi-file-earmark-code"],
            ["De manier waarop een website wordt gepresenteerd", "bi-browser-chrome"]
        ],
        "correct" => 0
    ],
    [
        "question" => "Wat houdt een 'full-stack developer' in?",
        "options" => [
            ["Een ontwikkelaar die zowel front-end als back-end code schrijft", "bi-laptop"],
            ["Een developer die alleen back-end code schrijft", "bi-server"],
            ["Een developer die zich alleen richt op mobiele apps", "bi-phone"],
            ["Een specialist in databanken", "bi-database"]
        ],
        "correct" => 0
    ],
    [
        "question" => "Wat is 'continuous integration'?",
        "options" => [
            ["Het automatisch integreren van code in een shared repository", "bi-cogs"],
            ["Het proces van handmatig testen van software", "bi-check-circle"],
            ["Het creëren van softwarepatches", "bi-code-slash"],
            ["Het maken van websites", "bi-browser-chrome"]
        ],
        "correct" => 0
    ],
    [
        "question" => "Wat is de functie van een API (Application Programming Interface)?",
        "options" => [
            ["Het biedt een interface voor softwareapplicaties om met elkaar te communiceren", "bi-code-slash"],
            ["Het is een database voor het opslaan van gegevens", "bi-database"],
            ["Het is een programma om apps te ontwerpen", "bi-app"],
            ["Het biedt grafische interfaces voor websites", "bi-browser-chrome"]
        ],
        "correct" => 0
    ],
    [
        "question" => "Wat is een voorbeeld van een 'frontend' technologie?",
        "options" => [
            ["HTML, CSS, JavaScript", "bi-file-earmark-code"],
            ["Python, Ruby, C++", "bi-code-slash"],
            ["SQL, MongoDB", "bi-database"],
            ["PHP, Node.js", "bi-server"]
        ],
        "correct" => 0
    ],
    [
        "question" => "Wat houdt 'cloud storage' in?",
        "options" => [
            ["Het opslaan van bestanden op een server via internet", "bi-cloud"],
            ["Het gebruiken van externe harde schijven", "bi-hdd"],
            ["Het beheren van lokale datacenters", "bi-server"],
            ["Het hosten van websites", "bi-browser-chrome"]
        ],
        "correct" => 0
    ],
    [
        "question" => "Welke van de volgende tools wordt vaak gebruikt voor versiebeheer?",
        "options" => [
            ["Git", "bi-git"],
            ["Postman", "bi-box"],
            ["Jira", "bi-clipboard"],
            ["Slack", "bi-chat-left-text"]
        ],
        "correct" => 0
    ],
    [
        "question" => "Wat is het doel van 'unit testing' in softwareontwikkeling?",
        "options" => [
            ["Het testen van kleine eenheden van code om fouten te vinden", "bi-check-circle"],
            ["Het testen van een volledige applicatie", "bi-laptop"],
            ["Het ontwerpen van de interface van de software", "bi-browser-chrome"],
            ["Het maken van een database", "bi-database"]
        ],
        "correct" => 0
    ],
    [
        "question" => "Wat is de betekenis van 'IoT' in de ICT-wereld?",
        "options" => [
            ["Internet of Things: verbonden apparaten die communiceren via internet", "bi-wifi"],
            ["International Online Technology", "bi-globe"],
            ["Internet of Technology: een platform voor IT-ontwikkeling", "bi-box"],
            ["Inner Online Tools", "bi-keypad"]
        ],
        "correct" => 0
    ],
    [
        "question" => "Welke van de volgende is een belangrijk onderdeel van 'data privacy'?",
        "options" => [
            ["Het beschermen van persoonlijke gegevens tegen ongeautoriseerde toegang", "bi-shield-lock"],
            ["Het optimaliseren van websites voor mobiele apparaten", "bi-phone"],
            ["Het analyseren van data voor bedrijfsbeslissingen", "bi-bar-chart"],
            ["Het ontwikkelen van mobiele apps", "bi-phone"]
        ],
        "correct" => 0
    ],
    [
        "question" => "Wat is de afkorting van 'SQL'?",
        "options" => [
            ["Structured Query Language", "bi-database"],
            ["Secure Query Language", "bi-lock"],
            ["Simple Query Language", "bi-file-earmark-text"],
            ["Server Query Language", "bi-server"]
        ],
        "correct" => 0
    ],
    [
        "question" => "Welke van de volgende technologieën is het best geschikt voor het maken van websites?",
        "options" => [
            ["HTML, CSS, JavaScript", "bi-file-earmark-code"],
            ["Java, C++", "bi-code-slash"],
            ["Python, Ruby", "bi-file-earmark-text"],
            ["SQL, MongoDB", "bi-database"]
        ],
        "correct" => 0
    ],
    [
        "question" => "Wat betekent de afkorting 'VPN'?",
        "options" => [
            ["Virtual Private Network", "bi-lock"],
            ["Very Private Network", "bi-shield-lock"],
            ["Virtual Private Node", "bi-cloud"],
            ["Voice Protected Network", "bi-headset"]
        ],
        "correct" => 0
    ]
];


/* Duplicate questions to reach ~30 */
while (count($questions) < 30) {
    $questions[] = $questions[array_rand($questions)];
}

$total = count($questions);

/* ------------------------------ Current question index ------------------------------ */
$q = isset($_GET['q']) ? intval($_GET['q']) : 0;

/* ------------------------------ Form handling (POST → REDIRECT) ------------------------------ */
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['answer'])) {
        if ($_POST['answer'] == $questions[$q]['correct']) {
            $_SESSION['score'] += 2;
        }
        $next = $q + 1;
        if ($next >= $total) {
            header("Location: result.php");
            exit();
        }
        header("Location: quiz.php?q=" . $next);
        exit();
    }
}

$current = $questions[$q];
$progress = (($q + 1) / $total) * 100;
?> 

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Quiz – Vraag <?php echo $q + 1; ?></title>

    <!-- Bootstrap + Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Jouw custom stylesheet -->
    <link rel="stylesheet" href="style.css">
</head>

<body class="app-body overlay-gradient">

<div class="container py-5">

    <div class="quiz-card card p-4 shadow fade-in-up">

        <!-- Vraag teller -->
        <span class="badge bg-primary-subtle mb-3">
            Vraag <?php echo $q + 1; ?> van <?php echo $total; ?>
        </span>

        <!-- Vraag -->
        <h4 class="fw-bold mb-4">
            <?php echo $current['question']; ?>
        </h4>

        <!-- Antwoorden -->
        <form method="POST" id="quizForm">

            <?php foreach ($current['options'] as $index => $option): ?>
                <button type="button"
                        class="btn-answer w-100 text-start mb-3 d-flex align-items-center"
                        onclick="selectAnswer(<?php echo $index; ?>)">
                    <i class="bi <?php echo $option[1]; ?> me-2"></i>
                    <?php echo $option[0]; ?>
                </button>
            <?php endforeach; ?>

            <input type="hidden" name="answer" id="answerInput">

            <button class="btn btn-primary w-100 mt-3 start-btn">
                Volgende vraag
            </button>
        </form>

        <!-- Voortgangsbalk -->
        <div class="quiz-progress mt-4">
            <div class="progress-bar bg-primary"
                 style="width: <?php echo $progress; ?>%;">
            </div>
        </div>

    </div>
</div>

<script>
    // Selecteer antwoord-knop
    function selectAnswer(index) {
        document.querySelectorAll('.btn-answer').forEach(btn => btn.classList.remove('selected'));
        document.querySelectorAll('.btn-answer')[index].classList.add('selected');
        document.getElementById('answerInput').value = index;
    }
</script>

</body>
</html>
