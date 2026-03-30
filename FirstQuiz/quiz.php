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
        $answer = intval($_POST['answer']);
        $time_taken = intval($_POST['time_taken'] ?? 30);

        if ($answer == $questions[$q]['correct']) {
            // Base score + time bonus (faster = more points)
            $time_bonus = max(0, 30 - $time_taken); // 0-30 bonus points
            $_SESSION['score'] += 2 + floor($time_bonus / 3);
        } elseif ($answer === -1) {
            // Timeout - no points
            $_SESSION['score'] += 0;
        }
        // Wrong answer - no points added

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

    <!-- NAVIGATION -->
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent mb-4">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="index.php">HBO-ICT</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="vakken.php">Vakken</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="specialisaties.php">Specialisaties</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="quiz.php">Quiz</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="quiz-card card p-4 shadow fade-in-up">

        <!-- Timer and Progress -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <span class="badge bg-primary-subtle">
                Vraag <?php echo $q + 1; ?> van <?php echo $total; ?>
            </span>
            <div class="timer-container">
                <i class="bi bi-clock me-2"></i>
                <span id="timer" class="fw-bold text-warning">30</span>
                <span class="text-muted">s</span>
            </div>
        </div>

        <!-- Streak Counter -->
        <div class="streak-container mb-3">
            <i class="bi bi-fire text-danger me-1"></i>
            <span id="streak">0</span> op rij goed
        </div>

        <!-- Vraag -->
        <h4 class="fw-bold mb-4 question-text">
            <?php echo $current['question']; ?>
        </h4>

        <!-- Antwoorden -->
        <form method="POST" id="quizForm">

            <?php foreach ($current['options'] as $index => $option): ?>
                <button type="button"
                        class="btn-answer w-100 text-start mb-3 d-flex align-items-center"
                        onclick="selectAnswer(<?php echo $index; ?>, <?php echo $current['correct']; ?>)"
                        data-index="<?php echo $index; ?>">
                    <i class="bi <?php echo $option[1]; ?> me-2"></i>
                    <span class="option-text"><?php echo $option[0]; ?></span>
                    <div class="feedback-icon ms-auto">
                        <i class="bi bi-check-circle-fill text-success d-none"></i>
                        <i class="bi bi-x-circle-fill text-danger d-none"></i>
                    </div>
                </button>
            <?php endforeach; ?>

            <input type="hidden" name="answer" id="answerInput">
            <input type="hidden" name="time_taken" id="timeInput">

            <div id="feedback-section" class="text-center mb-3 d-none">
                <div id="feedback-message" class="alert alert-success mb-3">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    <span>Goed gedaan!</span>
                </div>
                <button type="button" id="nextBtn" class="btn btn-primary px-4" onclick="nextQuestion()">
                    <i class="bi bi-arrow-right me-2"></i>Volgende vraag
                </button>
            </div>

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
    let timer = 30;
    let timerInterval;
    let selectedAnswer = null;
    let correctAnswer = null;
    let streak = parseInt(localStorage.getItem('quizStreak') || '0');
    let startTime = Date.now();

    // Initialize streak display
    document.getElementById('streak').textContent = streak;

    // Start timer
    function startTimer() {
        timerInterval = setInterval(() => {
            timer--;
            document.getElementById('timer').textContent = timer;

            // Change color based on time remaining
            const timerEl = document.getElementById('timer');
            if (timer <= 10) {
                timerEl.className = 'fw-bold text-black';
            } else if (timer <= 20) {
                timerEl.className = 'fw-bold text-black';
            } else {
                timerEl.className = 'fw-bold text-black';
            }

            if (timer <= 0) {
                clearInterval(timerInterval);
                autoSubmit();
            }
        }, 1000);
    }

    // Select answer with immediate feedback
    function selectAnswer(index, correct) {
        if (selectedAnswer !== null) return; // Prevent multiple selections

        selectedAnswer = index;
        correctAnswer = correct;
        clearInterval(timerInterval);

        const buttons = document.querySelectorAll('.btn-answer');
        const timeTaken = Math.floor((Date.now() - startTime) / 1000);

        // Show feedback immediately
        buttons.forEach((btn, i) => {
            const feedbackIcon = btn.querySelector('.feedback-icon i');
            if (i === correct) {
                btn.classList.add('correct-answer');
                feedbackIcon.classList.remove('d-none');
                feedbackIcon.classList.add('bi-check-circle-fill', 'text-success');
            } else if (i === index && i !== correct) {
                btn.classList.add('wrong-answer');
                feedbackIcon.classList.remove('d-none');
                feedbackIcon.classList.add('bi-x-circle-fill', 'text-danger');
            }
            btn.disabled = true;
        });

        // Update streak
        if (index === correct) {
            streak++;
            localStorage.setItem('quizStreak', streak);
            showFeedback(true);
            playSound('correct');
        } else {
            streak = 0;
            localStorage.setItem('quizStreak', streak);
            showFeedback(false);
            playSound('wrong');
        }

        document.getElementById('streak').textContent = streak;
        document.getElementById('answerInput').value = index;
        document.getElementById('timeInput').value = timeTaken;

        // Show next button after a delay
        setTimeout(() => {
            document.getElementById('feedback-section').classList.remove('d-none');
        }, 1500);
    }

    function showFeedback(isCorrect) {
        const feedbackSection = document.getElementById('feedback-section');
        const feedbackMessage = document.getElementById('feedback-message');

        if (isCorrect) {
            feedbackMessage.className = 'alert alert-success mb-3';
            feedbackMessage.innerHTML = '<i class="bi bi-check-circle-fill me-2"></i><span>Goed gedaan!</span>';
        } else {
            feedbackMessage.className = 'alert alert-danger mb-3';
            feedbackMessage.innerHTML = '<i class="bi bi-x-circle-fill me-2"></i><span>Helaas, dat is niet correct.</span>';
        }
    }

    function nextQuestion() {
        document.getElementById('quizForm').submit();
    }

    function autoSubmit() {
        // Auto-submit with no answer if time runs out
        document.getElementById('answerInput').value = -1; // Indicate timeout
        document.getElementById('timeInput').value = 30;
        document.getElementById('quizForm').submit();
    }

    function playSound(type) {
        // Create audio context for sound effects
        try {
            const audioContext = new (window.AudioContext || window.webkitAudioContext)();
            const oscillator = audioContext.createOscillator();
            const gainNode = audioContext.createGain();

            oscillator.connect(gainNode);
            gainNode.connect(audioContext.destination);

            if (type === 'correct') {
                oscillator.frequency.setValueAtTime(800, audioContext.currentTime);
                oscillator.frequency.exponentialRampToValueAtTime(1200, audioContext.currentTime + 0.1);
                gainNode.gain.setValueAtTime(0.3, audioContext.currentTime);
                gainNode.gain.exponentialRampToValueAtTime(0.01, audioContext.currentTime + 0.3);
                oscillator.start(audioContext.currentTime);
                oscillator.stop(audioContext.currentTime + 0.3);
            } else {
                oscillator.frequency.setValueAtTime(300, audioContext.currentTime);
                gainNode.gain.setValueAtTime(0.3, audioContext.currentTime);
                gainNode.gain.exponentialRampToValueAtTime(0.01, audioContext.currentTime + 0.5);
                oscillator.start(audioContext.currentTime);
                oscillator.stop(audioContext.currentTime + 0.5);
            }
        } catch (e) {
            // Fallback: no sound if Web Audio API not supported
        }
    }

    // Add some CSS animations
    document.addEventListener('DOMContentLoaded', () => {
        startTimer();

        // Add click animations to buttons
        document.querySelectorAll('.btn-answer').forEach(btn => {
            btn.addEventListener('click', function() {
                this.style.transform = 'scale(0.98)';
                setTimeout(() => {
                    this.style.transform = '';
                }, 150);
            });
        });
    });
</script>

</body>
</html>
