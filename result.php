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
    <title>HBO-ICT School | Resultaten</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="app-body">

<div class="overlay-gradient d-flex justify-content-center align-items-center min-vh-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">

                <!-- NAVIGATION -->
                <nav class="navbar navbar-expand-lg navbar-light bg-transparent mb-4 position-absolute top-0 start-0 w-100" style="z-index: 10;">
                    <div class="container-fluid">
                        <a class="navbar-brand fw-bold" href="index.php">HBO-ICT School</a>
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
                                    <a class="nav-link" href="quiz.php">Quiz</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>

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

    <footer class="site-footer text-center mt-5 pt-4 pb-3">
        <div class="container">
            <p class="mb-1 fw-semibold">HBO-ICT School | Advies voor jouw studiekeuze</p>
            <p class="small text-muted mb-0">Contact: info@hbo-ict.school | Tel: 012-345-6789 | Bezoek onze open dag</p>
        </div>
    </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
// Fade-in result card with enhanced animation
document.addEventListener('DOMContentLoaded', () => {
    const card = document.getElementById('resultCard');
    card.classList.remove('card-hidden');
    card.classList.add('fade-in-up');

    // Animated score counting
    const scoreValue = document.getElementById('scoreValue');
    const finalScore = <?php echo $score; ?>;
    let currentScore = 0;
    const increment = finalScore / 50; // Animate over 50 steps

    const scoreInterval = setInterval(() => {
        currentScore += increment;
        if (currentScore >= finalScore) {
            currentScore = finalScore;
            clearInterval(scoreInterval);
        }
        scoreValue.textContent = Math.floor(currentScore);
    }, 50);

    // Enhanced confetti with more colors and physics
    const confettiContainer = document.getElementById('confettiContainer');
    if (confettiContainer) {
        const colors = ['#007bff', '#28a745', '#dc3545', '#ffc107', '#6f42c1', '#e83e8c'];

        for (let i = 0; i < 100; i++) {
            const piece = document.createElement('div');
            piece.className = 'confetti-piece';
            piece.style.left = Math.random() * 100 + '%';
            piece.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
            piece.style.animationDelay = (Math.random() * 3) + 's';
            piece.style.animationDuration = (Math.random() * 2 + 2) + 's';
            piece.style.width = (Math.random() * 8 + 4) + 'px';
            piece.style.height = (Math.random() * 8 + 4) + 'px';
            confettiContainer.appendChild(piece);
        }

        // Add some sparkle effects
        setTimeout(() => {
            for (let i = 0; i < 20; i++) {
                const sparkle = document.createElement('div');
                sparkle.className = 'sparkle';
                sparkle.style.left = Math.random() * 100 + '%';
                sparkle.style.top = Math.random() * 100 + '%';
                sparkle.style.animationDelay = Math.random() * 2 + 's';
                confettiContainer.appendChild(sparkle);
            }
        }, 1000);
    }

    // Add celebration sound effect
    <?php if ($celebrate): ?>
    playCelebrationSound();
    <?php endif; ?>
});

function playCelebrationSound() {
    try {
        const audioContext = new (window.AudioContext || window.webkitAudioContext)();

        // Play a celebratory melody
        const notes = [523, 659, 784, 1047]; // C, E, G, C
        let noteIndex = 0;

        function playNote() {
            if (noteIndex >= notes.length) return;

            const oscillator = audioContext.createOscillator();
            const gainNode = audioContext.createGain();

            oscillator.connect(gainNode);
            gainNode.connect(audioContext.destination);

            oscillator.frequency.setValueAtTime(notes[noteIndex], audioContext.currentTime);
            gainNode.gain.setValueAtTime(0.3, audioContext.currentTime);
            gainNode.gain.exponentialRampToValueAtTime(0.01, audioContext.currentTime + 0.5);

            oscillator.start(audioContext.currentTime);
            oscillator.stop(audioContext.currentTime + 0.5);

            noteIndex++;
            setTimeout(playNote, 200);
        }

        playNote();
    } catch (e) {
        // No sound if Web Audio API not supported
    }
}
</script>
</body>
</html>
