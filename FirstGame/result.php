<?php
session_start();
if (!isset($_SESSION['arcade'])) {
    header("Location: index.php");
    exit();
}
$arcade = $_SESSION['arcade'];
$g1 = $arcade['game1'];
$g2 = $arcade['game2'];
$g3 = $arcade['game3'];

if (!($g1['done'] && $g2['done'] && $g3['done'])) {
    header("Location: index.php");
    exit();
}

$wins = 0;
foreach ([$g1, $g2, $g3] as $g) {
    if ($g['result'] === 'win') $wins++;
}

if ($wins === 3) {
    $profileTitle = "All‑round HBO‑ICT Game Master";
    $profileText  = "Je hebt alle mini‑games en alle stages overwonnen. Je combineert programmeren, security en data‑denken.";
} elseif ($wins === 2) {
    $profileTitle = "Sterke HBO‑ICT Specialist";
    $profileText  = "Je blinkt uit in meerdere domeinen. Een mooie basis voor een ICT‑carrière.";
} elseif ($wins === 1) {
    $profileTitle = "Ontdekkende ICT‑speler";
    $profileText  = "Je hebt één mini‑game uitgespeeld. Je bent aan het ontdekken wat bij je past.";
} else {
    $profileTitle = "Nieuw in de digitale wereld";
    $profileText  = "Je hebt nog niet gewonnen, maar je hebt wel alle mini‑games ervaren. Dat is de eerste stap.";
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Jouw HBO‑ICT profiel – Arcade</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="arcade-body">
<div class="arcade-bg"></div>

<div class="arcade-hud">
    <div class="hud-left">
        <span class="hud-label"><i class="bi bi-person-fill me-1"></i><?php echo $arcade['player_name']; ?></span>
    </div>
    <div class="hud-center">
        <span class="hud-label"><i class="bi bi-stars me-1"></i>Profiel</span>
    </div>
    <div class="hud-right">
        <span class="hud-label small">Mini‑games voltooid</span>
    </div>
</div>

<div class="container min-vh-100 d-flex align-items-center justify-content-center">
    <div class="row w-100 justify-content-center">
        <div class="col-lg-7">
            <div class="card result-card shadow-xl rounded-4 p-4 p-md-5 card-hidden" id="resultCard">
                <div class="text-center mb-3">
                    <span class="badge bg-arcade px-3 py-2 rounded-pill">
                        <i class="bi bi-stars me-1"></i> HBO‑ICT Profiel
                    </span>
                </div>

                <h2 class="text-center text-light fw-bold mb-2"><?php echo $profileTitle; ?></h2>
                <p class="text-center text-muted mb-4"><?php echo $profileText; ?></p>

                <div class="row g-3 mb-4">
                    <div class="col-12 col-md-4">
                        <div class="summary-tile <?php echo $g1['result']==='win'?'tile-win':'tile-lose'; ?>">
                            <div class="icon"><i class="bi bi-arrows-move"></i></div>
                            <div class="label">Code Movement</div>
                            <div class="status">
                                <?php echo $g1['result']==='win'?'Alle stages gehaald':'Niet alle stages gehaald'; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="summary-tile <?php echo $g2['result']==='win'?'tile-win':'tile-lose'; ?>">
                            <div class="icon"><i class="bi bi-shield-lock"></i></div>
                            <div class="label">Cyber Defense</div>
                            <div class="status">
                                <?php echo $g2['result']==='win'?'Alle stages gehaald':'Niet alle stages gehaald'; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="summary-tile <?php echo $g3['result']==='win'?'tile-win':'tile-lose'; ?>">
                            <div class="icon"><i class="bi bi-diagram-3"></i></div>
                            <div class="label">Data & AI Puzzle</div>
                            <div class="status">
                                <?php echo $g3['result']==='win'?'Alle stages gehaald':'Niet alle stages gehaald'; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center mb-3">
                    <a href="index.php" class="btn btn-neon">
                        <i class="bi bi-arrow-repeat me-1"></i> Speel opnieuw
                    </a>
                </div>

                <p class="small text-center text-muted mb-0">
                    <i class="bi bi-info-circle me-1"></i> Deze arcade geeft een speelse indruk van HBO‑ICT richtingen.
                </p>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="script.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    fadeInCard('resultCard');
    launchConfetti();
});
</script>
</body>
</html>
