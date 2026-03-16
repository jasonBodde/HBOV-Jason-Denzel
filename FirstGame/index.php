<?php
session_start();

if (!isset($_SESSION['arcade'])) {
    $_SESSION['arcade'] = [
        'player_name' => 'Player',
        'game1' => ['stage' => 1, 'max_stage' => 4, 'lives' => 3, 'done' => false, 'result' => null],
        'game2' => ['stage' => 1, 'max_stage' => 4, 'lives' => 3, 'done' => false, 'result' => null],
        'game3' => ['stage' => 1, 'max_stage' => 4, 'lives' => 3, 'done' => false, 'result' => null],
    ];
}
$arcade = &$_SESSION['arcade'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['player_name'])) {
    $name = trim($_POST['player_name']);
    if ($name !== '') {
        $arcade['player_name'] = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
    }
    header("Location: index.php");
    exit();
}

$allDone = $arcade['game1']['done'] && $arcade['game2']['done'] && $arcade['game3']['done'];
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>HBO‑ICT Arcade – Hub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="arcade-body">
<div class="arcade-bg"></div>

<!-- HUD -->
<div class="arcade-hud">
    <div class="hud-left">
        <span class="hud-label"><i class="bi bi-person-fill me-1"></i><?php echo $arcade['player_name']; ?></span>
    </div>
    <div class="hud-center">
        <span class="hud-label"><i class="bi bi-joystick me-1"></i>HBO‑ICT Arcade</span>
    </div>
    <div class="hud-right">
        <span class="hud-label small">Mini‑games: 
            <span class="<?php echo $arcade['game1']['done']?'text-success':'text-muted'; ?>">1</span> •
            <span class="<?php echo $arcade['game2']['done']?'text-success':'text-muted'; ?>">2</span> •
            <span class="<?php echo $arcade['game3']['done']?'text-success':'text-muted'; ?>">3</span>
        </span>
    </div>
</div>

<div class="container min-vh-100 d-flex align-items-center justify-content-center">
    <div class="row w-100 justify-content-center">
        <div class="col-lg-9">
            <div class="card hub-card shadow-xl rounded-4 p-4 p-md-5 card-hidden" id="hubCard">
                <div class="text-center mb-3">
                    <span class="badge bg-arcade px-3 py-2 rounded-pill">
                        <i class="bi bi-joystick me-1"></i> HBO‑ICT Arcade
                    </span>
                </div>
                <h1 class="text-center text-light fw-bold mb-2">Kies je mini‑game</h1>
                <p class="text-center text-muted mb-4">
                    Speel drie HBO‑ICT mini‑games met meerdere levels: programmeren, cybersecurity en data & AI.
                </p>

                <form method="POST" class="mb-4 text-center">
                    <div class="row justify-content-center g-2">
                        <div class="col-md-6">
                            <input type="text" name="player_name" class="form-control form-control-sm text-center"
                                   placeholder="Jouw naam" value="<?php echo $arcade['player_name']; ?>">
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-neon btn-sm w-100" type="submit">
                                <i class="bi bi-check2-circle me-1"></i> Opslaan
                            </button>
                        </div>
                    </div>
                </form>

                <div class="row g-3 mb-4">
                    <div class="col-md-4">
                        <a href="game1.php" class="text-decoration-none">
                            <div class="mini-card <?php echo $arcade['game1']['done'] ? 'mini-done' : ''; ?>">
                                <div class="mini-icon">
                                    <i class="bi bi-arrows-move"></i>
                                </div>
                                <h5>Code Movement</h5>
                                <p>Schrijf pseudo‑code om door steeds moeilijkere grids en een eindmaze te navigeren.</p>
                                <div class="mini-meta">
                                    <span class="badge bg-dark-subtle text-light small">
                                        Stage <?php echo $arcade['game1']['stage']; ?>/<?php echo $arcade['game1']['max_stage']; ?>
                                    </span>
                                    <span class="badge bg-dark-subtle text-danger small">
                                        ❤️ <?php echo $arcade['game1']['lives']; ?>
                                    </span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="game2.php" class="text-decoration-none">
                            <div class="mini-card <?php echo $arcade['game2']['done'] ? 'mini-done' : ''; ?>">
                                <div class="mini-icon">
                                    <i class="bi bi-shield-lock"></i>
                                </div>
                                <h5>Cyber Defense</h5>
                                <p>Bescherm je netwerk tegen steeds complexere aanvallen en een eind‑“boss attack”.</p>
                                <div class="mini-meta">
                                    <span class="badge bg-dark-subtle text-light small">
                                        Stage <?php echo $arcade['game2']['stage']; ?>/<?php echo $arcade['game2']['max_stage']; ?>
                                    </span>
                                    <span class="badge bg-dark-subtle text-danger small">
                                        ❤️ <?php echo $arcade['game2']['lives']; ?>
                                    </span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="game3.php" class="text-decoration-none">
                            <div class="mini-card <?php echo $arcade['game3']['done'] ? 'mini-done' : ''; ?>">
                                <div class="mini-icon">
                                    <i class="bi bi-diagram-3"></i>
                                </div>
                                <h5>Data & AI Puzzle</h5>
                                <p>Orden, cluster en corrigeer data om je AI‑model volledig te trainen.</p>
                                <div class="mini-meta">
                                    <span class="badge bg-dark-subtle text-light small">
                                        Stage <?php echo $arcade['game3']['stage']; ?>/<?php echo $arcade['game3']['max_stage']; ?>
                                    </span>
                                    <span class="badge bg-dark-subtle text-danger small">
                                        ❤️ <?php echo $arcade['game3']['lives']; ?>
                                    </span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="text-center">
                    <?php if ($allDone): ?>
                        <a href="result.php" class="btn btn-neon">
                            <i class="bi bi-stars me-1"></i> Bekijk jouw HBO‑ICT profiel
                        </a>
                    <?php else: ?>
                        <button class="btn btn-outline-light" disabled>
                            <i class="bi bi-lock me-1"></i> Speel eerst alle mini‑games uit
                        </button>
                    <?php endif; ?>
                </div>

                <p class="small text-center text-muted mt-3 mb-0">
                    <i class="bi bi-info-circle me-1"></i> Voortgang, stages en levens worden in de sessie opgeslagen.
                </p>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="script.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => fadeInCard('hubCard'));
</script>
</body>
</html>
