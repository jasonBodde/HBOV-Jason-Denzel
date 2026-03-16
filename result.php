<?php
session_start();
$score = $_SESSION["score"] ?? 0;

/* ------------------------------ New scoring logic ------------------------------ */
if ($score >= 30) {
    $title = "HBO-ICT past perfect bij jou!";
    $text = "Je hebt een sterke interesse in ICT en technologie. Deze studie sluit waarschijnlijk goed aan bij jouw talenten en interesses.";
    $icon = "bi-check-circle-fill";
    $color = "success";
} elseif ($score >= 15) {
    $title = "ICT kan bij je passen";
    $text = "Je hebt interesse in ICT, maar misschien wil je nog verder onderzoeken welke richting het beste bij je past.";
    $icon = "bi-lightbulb-fill";
    $color = "warning";
} else {
    $title = "ICT past waarschijnlijk niet bij je";
    $text = "Je interesses liggen mogelijk in een andere richting. Het is de moeite waard om ook andere studies te verkennen.";
    $icon = "bi-x-circle-fill";
    $color = "danger";
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
<body class="result-body">

<div class="overlay-gradient d-flex justify-content-center align-items-center min-vh-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card result-card shadow-lg rounded-4 text-center p-5 fade-in">
                    <h1 class="mb-3 fw-bold">Jouw resultaat</h1>
                    <i class="bi <?php echo $icon; ?> display-1 text-<?php echo $color; ?> mb-3"></i>
                    <h3 class="text-<?php echo $color; ?> mb-3">
                        <?php echo $title; ?>
                    </h3>
                    <p class="lead mb-4">
                        <?php echo $text; ?>
                    </p>
                    <p class="mb-4 fs-5">
                        Score: <strong><?php echo $score; ?></strong>
                    </p>
                    <div class="d-flex justify-content-center gap-3">
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

</body>
</html>
