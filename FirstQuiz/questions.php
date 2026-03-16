<?php
session_start();

/* ------------------------------ Reset score when quiz starts ------------------------------ */
if (!isset($_SESSION['score'])) {
    $_SESSION['score'] = 0;
}

/* ------------------------------ Question database (30 questions) ------------------------------ */
$questions = [
    [
        "question" => "Wat zijn de belangrijkste vakken in HBO-ICT?",
        "options" => [
            ["Programmeren, databases, security","bi-cpu"],
            ["Geschiedenis en aardrijkskunde","bi-globe"],
            ["Sport en beweging","bi-dribbble"],
            ["Muziek en kunst","bi-music-note"]
        ],
        "correct" => 0
    ],
    [
        "question" => "Hoe ziet het curriculum van HBO-ICT eruit?",
        "options" => [
            ["Alleen theorie","bi-book"],
            ["Theorie + projecten + specialisaties","bi-diagram-3"],
            ["Alleen stage","bi-briefcase"],
            ["Alleen zelfstudie","bi-house"]
        ],
        "correct" => 1
    ],
    [
        "question" => "Hoeveel praktijkervaring zit er in de opleiding?",
        "options" => [
            ["Geen","bi-x-circle"],
            ["Alleen in jaar 1","bi-1-circle"],
            ["Stage + projecten + labs","bi-laptop"],
            ["Alleen in jaar 4","bi-4-circle"]
        ],
        "correct" => 2
    ],
    [
        "question" => "Wat zijn de toelatingseisen voor HBO-ICT?",
        "options" => [
            ["Alleen VWO","bi-mortarboard"],
            ["MBO-4, HAVO of VWO","bi-person-check"],
            ["Alleen MBO-2","bi-person-x"],
            ["Alleen met wiskunde B","bi-calculator"]
        ],
        "correct" => 1
    ],
    [
        "question" => "Hoe wordt omgegaan met studenten zonder ICT-achtergrond?",
        "options" => [
            ["Ze mogen niet starten","bi-x"],
            ["Extra jaar verplicht","bi-calendar"],
            ["Instapmodules en begeleiding","bi-life-preserver"],
            ["Alles zelf leren","bi-person"]
        ],
        "correct" => 2
    ],
    [
        "question" => "Zijn er mogelijkheden voor buitenlandervaring?",
        "options" => [
            ["Nee","bi-x-circle"],
            ["Ja, via minor of stage","bi-airplane"],
            ["Alleen jaar 1","bi-1-circle"],
            ["Alleen cum laude studenten","bi-star"]
        ],
        "correct" => 1
    ],
    [
        "question" => "Hoe is stagebegeleiding geregeld?",
        "options" => [
            ["Geen begeleiding","bi-x"],
            ["Docent + praktijkbegeleider","bi-people"],
            ["Alleen klasgenoten","bi-person"],
            ["Zelf regelen","bi-house"]
        ],
        "correct" => 1
    ],
    [
        "question" => "Is er extra ondersteuning voor moeilijke vakken?",
        "options" => [
            ["Nee","bi-x-circle"],
            ["Alleen wiskunde","bi-calculator"],
            ["Ja, studiecoaches en bijles","bi-life-preserver"],
            ["Alleen laatste jaar","bi-calendar"]
        ],
        "correct" => 2
    ],
    [
        "question" => "Hoe groot zijn werkgroepen?",
        "options" => [
            ["100 studenten","bi-people"],
            ["40 studenten","bi-people"],
            ["15-25 studenten","bi-person"],
            ["2 studenten","bi-person"]
        ],
        "correct" => 2
    ],
    [
        "question" => "Zijn er netwerkmogelijkheden?",
        "options" => [
            ["Nee","bi-x"],
            ["Ja via bedrijven en events","bi-diagram-3"],
            ["Alleen social media","bi-phone"],
            ["Alleen docenten","bi-person"]
        ],
        "correct" => 1
    ],
    [
        "question" => "Wat kun je worden na HBO-ICT?",
        "options" => [
            ["Kapper","bi-scissors"],
            ["Software developer","bi-code-slash"],
            ["Tandarts","bi-emoji-smile"],
            ["Fysiotherapeut","bi-heart"]
        ],
        "correct" => 1
    ],
    [
        "question" => "Werkt de opleiding samen met bedrijven?",
        "options" => [
            ["Nee","bi-x-circle"],
            ["Ja met ICT bedrijven","bi-building"],
            ["Alleen sportclubs","bi-dribbble"],
            ["Alleen scholen","bi-building"]
        ],
        "correct" => 1
    ],
    [
        "question" => "Hoe helpt de opleiding bij stages?",
        "options" => [
            ["Niet","bi-x"],
            ["Stagebureau en events","bi-briefcase"],
            ["Zelf zoeken","bi-search"],
            ["Via vrienden","bi-people"]
        ],
        "correct" => 1
    ],
    [
        "question" => "Zijn er succesverhalen van alumni?",
        "options" => [
            ["Nee","bi-x"],
            ["Ja, werken bij grote techbedrijven","bi-building"],
            ["Alleen één student","bi-person"],
            ["Alleen docenten","bi-person"]
        ],
        "correct" => 1
    ],
    [
        "question" => "Welke faciliteiten zijn er?",
        "options" => [
            ["Alleen klaslokaal","bi-door-open"],
            ["Moderne labs en software","bi-laptop"],
            ["Alleen bibliotheek","bi-book"],
            ["Geen","bi-x"]
        ],
        "correct" => 1
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
        header("Location: questions.php?q=" . $next);
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
    <title>Vraag <?php echo $q + 1; ?> - HBO-ICT Quiz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="app-body">

<div class="overlay-gradient d-flex align-items-center justify-content-center min-vh-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div id="quizCard" class="card quiz-card shadow-lg rounded-4 p-4 card-hidden">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge bg-primary-subtle text-primary px-3 py-2 rounded-pill">
                            Vraag <?php echo $q + 1; ?> van <?php echo $total; ?>
                        </span>
                        <a href="index.php" class="text-decoration-none small text-muted">
                            <i class="bi bi-arrow-left-circle me-1"></i>Terug naar start
                        </a>
                    </div>

                    <p class="text-success small mb-2">
                        <i class="bi bi-emoji-smile me-1"></i>Je bent goed bezig, ga zo door!
                    </p>

                    <div class="progress mb-4 quiz-progress">
                        <div id="progressBar"
                             class="progress-bar progress-bar-striped bg-info"
                             role="progressbar"
                             data-target="<?php echo $progress; ?>"
                             style="width: 0%;"
                             aria-valuenow="<?php echo $progress; ?>"
                             aria-valuemin="0"
                             aria-valuemax="100">
                            <?php echo round($progress); ?>%
                        </div>
                    </div>

                    <h4 class="mb-4 fw-semibold">
                        <i class="bi bi-question-circle-fill text-primary me-2"></i>
                        <?php echo $current['question']; ?>
                    </h4>

                    <!-- Optional sound effect placeholder -->
                    <audio id="clickSound">
                        <!-- Voeg hier een .mp3 of .wav bestand toe als je wilt -->
                    </audio>

                    <form method="POST" id="quizForm">
                        <input type="hidden" name="answer" id="answerInput">
                        <?php foreach ($current['options'] as $index => $option) { ?>
                            <button type="button"
                                    data-value="<?php echo $index; ?>"
                                    class="btn btn-answer w-100 text-start mb-3 d-flex align-items-center justify-content-between answer-option">
                                <span>
                                    <i class="bi <?php echo $option[1]; ?> me-2"></i>
                                    <?php echo $option[0]; ?>
                                </span>
                                <span class="chevron">
                                    <i class="bi bi-chevron-right"></i>
                                </span>
                            </button>
                        <?php } ?>
                    </form>

                    <p class="small text-muted mt-2 mb-0">
                        Tip: kies het antwoord dat het beste bij jouw gevoel past.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
// Fade-in card and animate progress bar
document.addEventListener('DOMContentLoaded', () => {
    const card = document.getElementById('quizCard');
    card.classList.remove('card-hidden');
    card.classList.add('fade-in-up');

    const bar = document.getElementById('progressBar');
    const target = parseFloat(bar.getAttribute('data-target')) || 0;
    setTimeout(() => {
        bar.style.width = target + '%';
    }, 150);
});

// Answer selection with highlight, sound, and delayed submit
const options = document.querySelectorAll('.answer-option');
const answerInput = document.getElementById('answerInput');
const form = document.getElementById('quizForm');
const sound = document.getElementById('clickSound');

options.forEach(btn => {
    btn.addEventListener('click', () => {
        options.forEach(b => b.classList.remove('selected'));
        btn.classList.add('selected');

        const value = btn.getAttribute('data-value');
        answerInput.value = value;

        if (sound && sound.play) {
            try { sound.currentTime = 0; sound.play(); } catch (e) {}
        }

        setTimeout(() => {
            form.submit();
        }, 250);
    });
});
</script>
</body>
</html>
