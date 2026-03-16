<?php
session_start();
$score = $_SESSION["score"] ?? 0;

/* ------------------------------ New scoring logic ------------------------------ */
if ($score >= 30) {
    $title = "HBO-ICT past perfect bij jou!";
    $text = "Je hebt een sterke interesse in ICT en technologie. Deze studie sluit waarschijnlijk heel goed aan bij wie jij bent.";
    $icon = "bi-check-circle-fill";
    $color = "success";
    $celebrate = true;
} elseif ($score >= 15) {
    $title = "ICT kan bij je passen";
    $text = "Je hebt interesse in ICT, maar misschien wil je nog verder onderzoeken welke richting het beste bij je past.";
    $icon = "bi-lightbulb-fill";
    $color = "warning";
    $celebrate = false;
} else {
    $title = "ICT past waarschijnlijk niet bij je";
    $text = "Je interesses liggen mogelijk in een andere richting. Het is de moeite waard om ook andere studies te verkennen.";
    $icon = "bi-x-circle-fill";
    $color = "danger";
    $celebrate = false;
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Resultaat - HBO-ICT Quiz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="app-body">

<div class="overlay-gradient d-flex justify-content-center align-items-center min-vh-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div id="resultCard" class="card result-card shadow-lg rounded-4 text-center p-5 card-hidden <?php echo $celebrate ? 'glow-card' : ''; ?>">
                    <?php if ($celebrate): ?>
                        <div id="confettiContainer" class="confetti-container"></div>
                    <?php endif; ?>

                    <h1 class="mb-3 fw-bold">Jouw resultaat</h1>
                    <i class="bi <?php echo $icon; ?> display-1 text-<?php echo $color; ?> mb-3"></i>

                    <h3 class="text-<?php echo $color; ?> mb-3">
                        <?php echo $title; ?>
                    </h3>

                    <p class="lead mb-4">
                        <?php echo $text; ?>
                    </p>

                    <div class="score-circle mx-auto mb-4 border-<?php echo $color; ?>">
                        <span class="score-value" id="scoreValue"><?php echo $score; ?></span>
                        <span class="score-label">score</span>
                    </div>

                    <p class="small text-muted mb-4">
                        Deze quiz geeft een eerste indruk. Praat ook met een studieloopbaanbegeleider of bezoek een open dag om verder te verkennen.
                    </p>

                    <div class="d-flex justify-content-center gap-3 flex-wrap">
                        <a href="index.php" class="btn btn-outline-primary px-4">
                            <i class="bi bi-arrow-repeat me-1"></i>Quiz opnieuw doen
                        </a>
                        <a href="https://www.google.com/search?q=studiekeuze+ict" target="_blank" class="btn btn-primary px-4">
                            <i class="bi bi-search me-1"></i>Meer over ICT-studies
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
// Fade-in result card
document.addEventListener('DOMContentLoaded', () => {
    const card = document.getElementById('resultCard');
    card.classList.remove('card-hidden');
    card.classList.add('fade-in-up');

    // Simple score "pop" animation
    const scoreEl = document.getElementById('scoreValue');
    scoreEl.classList.add('score-pop');

    // Simple confetti using small colored elements
    const confettiContainer = document.getElementById('confettiContainer');
    if (confettiContainer) {
        for (let i = 0; i < 80; i++) {
            const piece = document.createElement('span');
            piece.className = 'confetti-piece';
            piece.style.left = Math.random() * 100 + '%';
            piece.style.animationDelay = (Math.random() * 3) + 's';
            confettiContainer.appendChild(piece);
        }
    }
});
</script>
</body>
</html>
