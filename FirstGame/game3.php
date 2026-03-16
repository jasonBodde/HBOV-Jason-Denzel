<?php
session_start();
if (!isset($_SESSION['arcade'])) {
    header("Location: index.php");
    exit();
}
$arcade = &$_SESSION['arcade'];
$game = &$arcade['game3'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['stage_result'])) {
    $result = $_POST['stage_result'];
    if ($result === 'win') {
        if ($game['stage'] < $game['max_stage']) {
            $game['stage']++;
        } else {
            $game['done'] = true;
            $game['result'] = 'win';
        }
    } else {
        $game['lives']--;
        if ($game['lives'] <= 0) {
            $game['done'] = true;
            $game['result'] = 'lose';
        }
    }
    header("Location: game3.php");
    exit();
}

$stage = $game['stage'];
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Mini‑game 3 – Data & AI Puzzle (Stage <?php echo $stage; ?>)</title>
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
        <span class="hud-label"><i class="bi bi-diagram-3 me-1"></i>Data & AI Puzzle</span>
    </div>
    <div class="hud-right">
        <span class="hud-label small">Stage <?php echo $stage; ?>/<?php echo $game['max_stage']; ?> • ❤️ <?php echo $game['lives']; ?></span>
    </div>
</div>

<div class="container min-vh-100 d-flex align-items-center justify-content-center">
    <div class="row w-100 justify-content-center">
        <div class="col-lg-9">
            <div class="card game-card shadow-xl rounded-4 p-4 p-md-5 card-hidden" id="game3Card">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <span class="badge bg-arcade px-3 py-2 rounded-pill">
                        Stage <?php echo $stage; ?> – 
                        <?php
                        if ($stage === 1) echo "Basis classificatie";
                        elseif ($stage === 2) echo "Meer categorieën & blokken";
                        elseif ($stage === 3) echo "Clustering / verbinden";
                        else echo "Boss: mislabeled data corrigeren";
                        ?>
                    </span>
                    <a href="index.php" class="text-decoration-none small text-muted">
                        <i class="bi bi-arrow-left-circle me-1"></i> Hub
                    </a>
                </div>

                <div class="row g-4">
                    <div class="col-md-5">
                        <h4 class="text-light mb-2">Tutorial</h4>
                        <p class="text-muted small mb-2">
                            Orden data‑blokken in de juiste zones, cluster gerelateerde items en corrigeer fouten.
                            Je traint zo een “model”.
                        </p>
                        <ul class="small text-muted mb-2">
                            <li>Stage 1–2: sleep blokken naar de juiste categorie.</li>
                            <li>Stage 3: verbind gerelateerde blokken (clustering).</li>
                            <li>Stage 4: corrigeer verkeerd gelabelde blokken.</li>
                        </ul>

                        <div class="progress mb-2 ai-progress">
                            <div class="progress-bar bg-success" id="aiProgressBar" style="width: 0%;">
                                Model training: <span id="aiProgressText">0%</span>
                            </div>
                        </div>

                        <p id="game3Message" class="small mt-1 text-warning"></p>
                    </div>
                    <div class="col-md-7">
                        <h4 class="text-light mb-2">Data‑puzzel</h4>
                        <div class="data-blocks mb-3" id="dataBlocks" data-stage="<?php echo $stage; ?>"></div>
                        <div class="data-zones" id="dataZones"></div>
                        <div class="data-links mt-2" id="dataLinks"></div>
                        <p class="small text-muted mb-0">
                            Los de puzzel op om de trainingsbalk te vullen. Foutieve oplossing kost een leven.
                        </p>
                    </div>
                </div>

                <?php if ($game['done']): ?>
                    <div class="alert alert-info mt-3 mb-0 small">
                        Deze mini‑game is afgerond met resultaat: <strong><?php echo strtoupper($game['result']); ?></strong>.
                        Ga terug naar de hub om verder te spelen.
                    </div>
                <?php endif; ?>

                <form method="POST" id="game3ResultForm" class="d-none">
                    <input type="hidden" name="stage_result" id="game3ResultInput">
                </form>
            </div>
        </div>
    </div>
</div>

<audio id="dragSound"></audio>
<audio id="dropSound"></audio>
<audio id="winSound3"></audio>
<audio id="failSound3"></audio>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="script.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    fadeInCard('game3Card');
    initDataGameMultiStage();
});
</script>
</body>
</html>
