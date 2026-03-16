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
<body class="landing-body">

<div class="overlay-gradient d-flex align-items-center justify-content-center min-vh-100">
    <div class="container text-center">
        <div class="landing-card mx-auto p-5 shadow-lg rounded-4 fade-in">
            <h1 class="display-3 fw-bold text-white mb-3">
                <i class="bi bi-mortarboard-fill me-2"></i>Studiekeuze Quiz
            </h1>
            <p class="lead text-white-50 mb-4">
                Ontdek of de opleiding <strong>HBO-ICT</strong> bij jou past.
            </p>
            <a href="questions.php?q=0" class="btn btn-lg btn-light px-5 py-3 start-btn">
                <i class="bi bi-play-circle-fill me-2"></i>Start de quiz
            </a>
        </div>
    </div>
</div>

</body>
</html>
