<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Studiekeuze Quiz - HBO-ICT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="app-body">

<div class="overlay-gradient d-flex align-items-center justify-content-center min-vh-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div id="landingCard" class="landing-card text-center p-5 shadow-lg rounded-4 card-hidden">
                    <h1 class="display-3 fw-bold text-white mb-3">
                        <i class="bi bi-mortarboard-fill me-2"></i>Studiekeuze Quiz
                    </h1>
                    <p class="lead text-white-50 mb-4">
                        Ontdek op een speelse manier of <strong>HBO-ICT</strong> bij jou past.
                    </p>

                    <button class="btn btn-lg btn-light px-5 py-3 start-btn mb-3"
                            id="startBtn">
                        <i class="bi bi-play-circle-fill me-2"></i>Start de quiz
                    </button>

                    <div class="mt-3 small text-white-50">
                        <i class="bi bi-info-circle me-1"></i>
                        <span class="what-to-expect" data-bs-toggle="collapse" data-bs-target="#expectationText">
                            Wat kun je verwachten?
                        </span>
                        <div id="expectationText" class="collapse mt-2">
                            <p class="mb-0">
                                Je krijgt korte vragen over de opleiding HBO-ICT, praktijk, vakken en toekomstmogelijkheden.
                                Aan het einde zie je hoe goed de studie bij jou past.
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
// Fade-in landing card
document.addEventListener('DOMContentLoaded', () => {
    const card = document.getElementById('landingCard');
    card.classList.remove('card-hidden');
    card.classList.add('fade-in-up');

    const startBtn = document.getElementById('startBtn');
    startBtn.addEventListener('click', () => {
        startBtn.classList.add('btn-press');
        setTimeout(() => {
            window.location.href = 'questions.php?q=0';
        }, 200);
    });
});
</script>
</body>
</html>
