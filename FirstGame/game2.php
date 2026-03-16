<?php
session_start();
if (!isset($_SESSION['arcade'])) {
    header("Location: index.php");
    exit();
}
$arcade = &$_SESSION['arcade'];
$game = &$arcade['game2'];

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
    header("Location: game2.php");
    exit();
}

$stage = $game['stage'];
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Mini‑game 2 – Cyber Defense (Stage <?php echo $stage; ?>)</title>
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
        <span class="hud-label"><i class="bi bi-shield-lock me-1"></i>Cyber Defense</span>
    </div>
    <div class="hud-right">
        <span class="hud-label small">Stage <?php echo $stage; ?>/<?php echo $game['max_stage']; ?> • ❤️ <?php echo $game['lives']; ?></span>
    </div>
</div>

<div class="container min-vh-100 d-flex align-items-center justify-content-center">
    <div class="row w-100 justify-content-center">
        <div class="col-lg-9">
            <div class="card game-card shadow-xl rounded-4 p-4 p-md-5 card-hidden" id="game2Card">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <span class="badge bg-arcade px-3 py-2 rounded-pill">
                        Stage <?php echo $stage; ?> – 
                        <?php
                        if ($stage === 1) echo "Basis kwetsbare poorten";
                        elseif ($stage === 2) echo "Extra kwetsbaarheden (SQL, weak pw)";
                        elseif ($stage === 3) echo "Incident response (timer)";
                        else echo "Boss attack: meerdere aanvallen tegelijk";
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
                            Klik kwetsbare elementen en plaats firewall‑blokken of patches.
                            Hogere stages voegen meer aanvalstypen en tijdsdruk toe.
                        </p>
                        <ul class="small text-muted mb-2">
                            <li>Klik op rode nodes om ze te markeren.</li>
                            <li>Sleep firewall‑blokken naar gemarkeerde nodes.</li>
                            <?php if ($stage >= 2): ?>
                                <li>Let op labels: SQLi, weak‑pw, open‑port.</li>
                            <?php endif; ?>
                            <?php if ($stage >= 3): ?>
                                <li>Je hebt beperkte tijd (incident response).</li>
                            <?php endif; ?>
                            <?php if ($stage >= 4): ?>
                                <li>Boss attack: meerdere kwetsbaarheden tegelijk.</li>
                            <?php endif; ?>
                        </ul>

                        <div class="timer-display mb-2">
                            <span class="small text-muted">Tijd:</span>
                            <span id="cyberTimer" class="timer-value">30</span>s
                        </div>

                        <button class="btn btn-neon btn-sm mb-2" id="startCyberBtn">
                            <i class="bi bi-play-fill me-1"></i> Start stage
                        </button>
                        <p id="game2Message" class="small mt-1 text-warning"></p>
                    </div>
                    <div class="col-md-7">
                        <h4 class="text-light mb-2">Netwerk</h4>
                        <div class="cyber-grid mb-2" id="cyberGrid"
                             data-stage="<?php echo $stage; ?>"></div>
                        <div class="firewall-pool" id="firewallPool"></div>
                        <p class="small text-muted mb-0">
                            Bescherm alle kritieke nodes voordat de tijd of je levens op zijn.
                        </p>
                    </div>
                </div>

                <?php if ($game['done']): ?>
                    <div class="alert alert-info mt-3 mb-0 small">
                        Deze mini‑game is afgerond met resultaat: <strong><?php echo strtoupper($game['result']); ?></strong>.
                        Ga terug naar de hub om verder te spelen.
                    </div>
                <?php endif; ?>

                <form method="POST" id="game2ResultForm" class="d-none">
                    <input type="hidden" name="stage_result" id="game2ResultInput">
                </form>
            </div>
        </div>
    </div>
</div>

<audio id="clickVuln"></audio>
<audio id="placeFirewall"></audio>
<audio id="winSound2"></audio>
<audio id="failSound2"></audio>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="script.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    fadeInCard('game2Card');
    initCyberGameMultiStage();
});
</script>
</body>
</html>
