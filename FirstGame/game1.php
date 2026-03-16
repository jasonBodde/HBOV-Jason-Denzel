<?php
session_start();
if (!isset($_SESSION['arcade'])) {
    header("Location: index.php");
    exit();
}
$arcade = &$_SESSION['arcade'];
$game = &$arcade['game1'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['stage_result'])) {
    $result = $_POST['stage_result']; // "win" or "lose"
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
    header("Location: game1.php");
    exit();
}

$stage = $game['stage'];
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Mini‑game 1 – Code Movement (Stage <?php echo $stage; ?>)</title>
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
        <span class="hud-label"><i class="bi bi-arrows-move me-1"></i>Code Movement</span>
    </div>
    <div class="hud-right">
        <span class="hud-label small">Stage <?php echo $stage; ?>/<?php echo $game['max_stage']; ?> • ❤️ <?php echo $game['lives']; ?></span>
    </div>
</div>

<div class="container min-vh-100 d-flex align-items-center justify-content-center">
    <div class="row w-100 justify-content-center">
        <div class="col-lg-9">
            <div class="card game-card shadow-xl rounded-4 p-4 p-md-5 card-hidden" id="game1Card">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <span class="badge bg-arcade px-3 py-2 rounded-pill">
                        Stage <?php echo $stage; ?> – 
                        <?php
                        if ($stage === 1) echo "Basis grid (5x5)";
                        elseif ($stage === 2) echo "Groter grid (7x7) + obstakels";
                        elseif ($stage === 3) echo "10x10 met jump() & wait()";
                        else echo "Maze‑boss met repeat()";
                        ?>
                    </span>
                    <a href="index.php" class="text-decoration-none small text-muted">
                        <i class="bi bi-arrow-left-circle me-1"></i> Hub
                    </a>
                </div>

                <div class="row g-4">
                    <div class="col-md-6">
                        <h4 class="text-light mb-2">Tutorial</h4>
                        <p class="text-muted small mb-2">
                            Schrijf pseudo‑code om <span class="text-neon">P</span> naar <span class="text-neon">F</span> te bewegen.
                            Elke stage voegt nieuwe mechanics toe.
                        </p>
                        <ul class="small text-muted mb-2">
                            <li><code>move(n)</code> – beweeg n stappen vooruit</li>
                            <li><code>turn("left")</code>, <code>turn("right")</code>, <code>turn("up")</code>, <code>turn("down")</code></li>
                            <?php if ($stage >= 2): ?>
                                <li><code>jump()</code> – spring 2 stappen vooruit (kan obstakel overslaan)</li>
                            <?php endif; ?>
                            <?php if ($stage >= 3): ?>
                                <li><code>wait()</code> – sla een beurt over</li>
                            <?php endif; ?>
                            <?php if ($stage >= 4): ?>
                                <li><code>repeat(n){ ... }</code> – herhaal commando’s n keer</li>
                            <?php endif; ?>
                        </ul>
                        <p class="small text-info mb-2">
                            Vermijd obstakels (X). In de laatste stage is het een maze.
                        </p>

                        <textarea id="codeInput" class="form-control code-area mb-2" rows="7"
                                  placeholder="Schrijf hier je pseudo‑code..."></textarea>

                        <div class="d-flex gap-2">
                            <button class="btn btn-neon btn-sm" id="runCodeBtn">
                                <i class="bi bi-play-fill me-1"></i> Run code
                            </button>
                            <button class="btn btn-outline-light btn-sm" id="resetGame1">
                                <i class="bi bi-arrow-counterclockwise me-1"></i> Reset
                            </button>
                        </div>

                        <p id="game1Message" class="small mt-2 text-warning"></p>
                    </div>
                    <div class="col-md-6">
                        <h4 class="text-light mb-2">Grid</h4>
                        <div class="grid-container mb-2" id="movementGrid"
                             data-stage="<?php echo $stage; ?>"></div>
                        <p class="small text-muted mb-0">
                            Bereik de finish zonder levens te verliezen. Elke mislukte poging kost een leven.
                        </p>
                    </div>
                </div>

                <?php if ($game['done']): ?>
                    <div class="alert alert-info mt-3 mb-0 small">
                        Deze mini‑game is afgerond met resultaat: <strong><?php echo strtoupper($game['result']); ?></strong>.
                        Ga terug naar de hub om verder te spelen.
                    </div>
                <?php endif; ?>

                <form method="POST" id="game1ResultForm" class="d-none">
                    <input type="hidden" name="stage_result" id="game1ResultInput">
                </form>
            </div>
        </div>
    </div>
</div>

<audio id="moveSound"></audio>
<audio id="winSound1"></audio>
<audio id="failSound1"></audio>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="script.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    fadeInCard('game1Card');
    initMovementGameMultiStage();
});
</script>
</body>
</html>
