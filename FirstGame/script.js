/* ---------- BASIC ANIMATIONS ---------- */

function fadeInCard(id) {
    const card = document.getElementById(id);
    if (!card) return;
    card.classList.remove('card-hidden');
    card.classList.add('fade-in-up');
}

/* ---------- HUD HANDLING ---------- */

function updateHUD({ playerName, gameName, stage, lives, maxLives, progress }) {
    const nameEl = document.getElementById('hudPlayer');
    const gameEl = document.getElementById('hudGame');
    const stageEl = document.getElementById('hudStage');
    const livesEl = document.getElementById('hudLives');
    const progEl = document.getElementById('hudProgress');

    if (nameEl && playerName) nameEl.textContent = playerName;
    if (gameEl && gameName) gameEl.textContent = gameName;
    if (stageEl && stage != null) stageEl.textContent = 'Stage ' + stage;
    if (progEl && progress != null) progEl.textContent = progress + '%';

    if (livesEl && maxLives != null) {
        livesEl.innerHTML = '';
        for (let i = 0; i < maxLives; i++) {
            const dot = document.createElement('span');
            if (lives != null && i >= lives) dot.classList.add('lost');
            livesEl.appendChild(dot);
        }
    }
}

/* ---------- MOVEMENT GAME (MULTI-STAGE) ---------- */

function initMovementGame() {
    const gridEl = document.getElementById('movementGrid');
    const msgEl = document.getElementById('game1Message');
    const codeInput = document.getElementById('codeInput');
    const runBtn = document.getElementById('runCodeBtn');
    const resetBtn = document.getElementById('resetGame1');
    const resultForm = document.getElementById('game1ResultForm');
    const resultInput = document.getElementById('game1ResultInput');
    const stageBadge = document.getElementById('game1StageBadge');

    if (!gridEl) return;

    const stages = [
        { size: 5, obstacles: [], description: 'Basisgrid, geen obstakels.' },
        { size: 7, obstacles: [{ x: 3, y: 3 }, { x: 2, y: 4 }], description: 'Groter grid met obstakels.' },
        { size: 10, obstacles: [{ x: 4, y: 5 }, { x: 6, y: 6 }, { x: 7, y: 2 }], description: 'Nog groter grid, meer obstakels.' },
        { size: 10, obstacles: 'maze', description: 'Maze‑achtige finale stage.' }
    ];

    let stageIndex = 0;
    let lives = 3;
    const maxLives = 3;

    let size = stages[stageIndex].size;
    let player = { x: 0, y: size - 1, dir: 'right' };
    let goal = { x: size - 1, y: 0 };
    let obstacles = [];

    function setupStage() {
        const stage = stages[stageIndex];
        size = stage.size;
        player = { x: 0, y: size - 1, dir: 'right' };
        goal = { x: size - 1, y: 0 };
        obstacles = [];

        if (stage.obstacles === 'maze') {
            // simple maze pattern
            for (let i = 1; i < size - 1; i++) {
                if (i % 2 === 0) {
                    obstacles.push({ x: i, y: Math.floor(size / 2) });
                }
            }
        } else {
            obstacles = stage.obstacles || [];
        }

        gridEl.style.gridTemplateColumns = `repeat(${size}, 40px)`;
        gridEl.style.gridTemplateRows = `repeat(${size}, 40px)`;
        msgEl.textContent = stage.description;
        if (stageBadge) stageBadge.textContent = 'Stage ' + (stageIndex + 1);

        updateHUD({
            gameName: 'Code Movement',
            stage: stageIndex + 1,
            lives,
            maxLives,
            progress: Math.round(((stageIndex) / (stages.length)) * 100)
        });

        renderGrid();
    }

    function isObstacle(x, y) {
        return obstacles.some(o => o.x === x && o.y === y);
    }

    function renderGrid(trailPos) {
        gridEl.innerHTML = '';
        for (let y = 0; y < size; y++) {
            for (let x = 0; x < size; x++) {
                const cell = document.createElement('div');
                cell.className = 'grid-cell';
                if (x === goal.x && y === goal.y) {
                    cell.classList.add('goal');
                    cell.textContent = 'F';
                }
                if (isObstacle(x, y)) {
                    cell.classList.add('obstacle');
                    cell.textContent = 'X';
                }
                if (x === player.x && y === player.y) {
                    cell.classList.add('player');
                    cell.textContent = 'P';
                }
                if (trailPos && trailPos.x === x && trailPos.y === y) {
                    const trail = document.createElement('div');
                    trail.className = 'trail';
                    cell.appendChild(trail);
                }
                gridEl.appendChild(cell);
            }
        }
    }

    function resetState() {
        setupStage();
    }

    function parseCommands(text) {
        const lines = text.split('\n').map(l => l.trim()).filter(l => l);
        const commands = [];
        for (const line of lines) {
            if (line.startsWith('move')) {
                const m = line.match(/move\((\d+)\)/i);
                if (m) commands.push({ type: 'move', steps: parseInt(m[1], 10) });
            } else if (line.startsWith('turn')) {
                const m = line.match(/turn\(\"?(left|right|up|down)\"?\)/i);
                if (m) commands.push({ type: 'turn', dir: m[1].toLowerCase() });
            } else if (line.startsWith('jump')) {
                const m = line.match(/jump\((\d+)\)/i);
                if (m) commands.push({ type: 'jump', steps: parseInt(m[1], 10) });
            } else if (line.startsWith('wait')) {
                commands.push({ type: 'wait' });
            } else if (line.startsWith('repeat')) {
                const m = line.match(/repeat\((\d+)\)\s*\{(.+)\}/i);
                if (m) {
                    const times = parseInt(m[1], 10);
                    const inner = m[2].split(';').map(s => s.trim()).filter(s => s);
                    for (let t = 0; t < times; t++) {
                        inner.forEach(cmdLine => {
                            if (cmdLine.startsWith('move')) {
                                const mm = cmdLine.match(/move\((\d+)\)/i);
                                if (mm) commands.push({ type: 'move', steps: parseInt(mm[1], 10) });
                            } else if (cmdLine.startsWith('turn')) {
                                const mm = cmdLine.match(/turn\(\"?(left|right|up|down)\"?\)/i);
                                if (mm) commands.push({ type: 'turn', dir: mm[1].toLowerCase() });
                            }
                        });
                    }
                }
            }
        }
        return commands;
    }

    function applyTurn(dir) {
        if (['up','down','left','right'].includes(dir)) {
            player.dir = dir;
            return;
        }
        const dirs = ['up','right','down','left'];
        let idx = dirs.indexOf(player.dir);
        if (dir === 'left') idx = (idx + 3) % 4;
        if (dir === 'right') idx = (idx + 1) % 4;
        player.dir = dirs[idx];
    }

    function stepForward() {
        let nx = player.x;
        let ny = player.y;
        if (player.dir === 'right') nx++;
        else if (player.dir === 'left') nx--;
        else if (player.dir === 'up') ny--;
        else if (player.dir === 'down') ny++;

        if (nx < 0 || ny < 0 || nx >= size || ny >= size) return false;
        if (isObstacle(nx, ny)) return false;

        player.x = nx;
        player.y = ny;
        return true;
    }

    function jumpForward(steps) {
        for (let i = 0; i < steps; i++) {
            if (!stepForward()) return false;
        }
        return true;
    }

    function loseLife() {
        lives--;
        if (lives <= 0) {
            msgEl.textContent = 'Geen levens meer. Game over voor deze mini‑game.';
            resultInput.value = 'lose';
            setTimeout(() => resultForm.submit(), 1200);
        } else {
            msgEl.textContent = 'Je botste tegen een muur of obstakel. Probeer opnieuw.';
            updateHUD({
                gameName: 'Code Movement',
                stage: stageIndex + 1,
                lives,
                maxLives,
                progress: Math.round(((stageIndex) / (stages.length)) * 100)
            });
            setTimeout(resetState, 800);
        }
    }

    function nextStage() {
        stageIndex++;
        if (stageIndex >= stages.length) {
            msgEl.textContent = 'Je hebt alle stages gehaald! 🎉';
            resultInput.value = 'win';
            setTimeout(() => resultForm.submit(), 1200);
        } else {
            msgEl.textContent = 'Stage voltooid! Volgende stage...';
            setTimeout(setupStage, 800);
        }
    }

    function animateCommands(commands) {
        let i = 0;
        msgEl.textContent = 'Code wordt uitgevoerd...';

        function next() {
            if (i >= commands.length) {
                if (player.x === goal.x && player.y === goal.y) {
                    msgEl.textContent = 'Finish bereikt! 🎉';
                    nextStage();
                } else {
                    msgEl.textContent = 'Finish niet bereikt.';
                    loseLife();
                }
                return;
            }
            const cmd = commands[i++];
            if (cmd.type === 'turn') {
                applyTurn(cmd.dir);
                renderGrid();
                setTimeout(next, 220);
            } else if (cmd.type === 'wait') {
                renderGrid();
                setTimeout(next, 300);
            } else if (cmd.type === 'move') {
                let steps = 0;
                function moveStep() {
                    if (steps >= cmd.steps) {
                        setTimeout(next, 200);
                        return;
                    }
                    const ok = stepForward();
                    renderGrid({ x: player.x, y: player.y });
                    if (!ok) {
                        loseLife();
                        return;
                    }
                    steps++;
                    setTimeout(moveStep, 200);
                }
                moveStep();
            } else if (cmd.type === 'jump') {
                const ok = jumpForward(cmd.steps);
                renderGrid({ x: player.x, y: player.y });
                if (!ok) {
                    loseLife();
                    return;
                }
                setTimeout(next, 250);
            }
        }
        next();
    }

    runBtn.addEventListener('click', () => {
        const code = codeInput.value;
        if (!code.trim()) {
            msgEl.textContent = 'Schrijf eerst wat pseudo‑code.';
            return;
        }
        const commands = parseCommands(code);
        if (!commands.length) {
            msgEl.textContent = 'Geen geldige commando’s gevonden. Gebruik move(), turn(), jump(), wait(), repeat().';
            return;
        }
        setupStage(); // reset before run
        animateCommands(commands);
    });

    resetBtn.addEventListener('click', resetState);

    setupStage();
}

/* ---------- CYBER GAME (MULTI-STAGE) ---------- */

function initCyberGame() {
    const gridEl = document.getElementById('cyberGrid');
    const poolEl = document.getElementById('firewallPool');
    const timerEl = document.getElementById('cyberTimer');
    const msgEl = document.getElementById('game2Message');
    const startBtn = document.getElementById('startCyberBtn');
    const resultForm = document.getElementById('game2ResultForm');
    const resultInput = document.getElementById('game2ResultInput');
    const stageBadge = document.getElementById('game2StageBadge');

    if (!gridEl) return;

    const stages = [
        { rows: 3, cols: 4, time: 30, vulnCount: 4 },
        { rows: 3, cols: 5, time: 25, vulnCount: 6 },
        { rows: 4, cols: 5, time: 20, vulnCount: 7 },
        { rows: 4, cols: 6, time: 18, vulnCount: 9, boss: true }
    ];

    let stageIndex = 0;
    let lives = 3;
    const maxLives = 3;

    let timer = 0;
    let interval = null;
    let started = false;
    let vulnNodes = [];
    let placed = 0;
    let totalFirewalls = 0;

    function setupStage() {
        const stage = stages[stageIndex];
        const { rows, cols } = stage;

        gridEl.innerHTML = '';
        poolEl.innerHTML = '';
        vulnNodes = [];
        placed = 0;
        msgEl.textContent = '';
        timer = stage.time;
        timerEl.textContent = timer.toString();
        totalFirewalls = stage.vulnCount;

        gridEl.style.gridTemplateColumns = `repeat(${cols}, 60px)`;
        gridEl.style.gridTemplateRows = `repeat(${rows}, 60px)`;

        const totalNodes = rows * cols;
        const vulnIndices = [];
        while (vulnIndices.length < stage.vulnCount) {
            const idx = Math.floor(Math.random() * totalNodes);
            if (!vulnIndices.includes(idx)) vulnIndices.push(idx);
        }

        for (let i = 0; i < totalNodes; i++) {
            const node = document.createElement('div');
            node.className = 'cyber-node';
            node.dataset.index = i;
            node.textContent = 'P' + (i + 1);
            gridEl.appendChild(node);
            if (vulnIndices.includes(i)) {
                node.classList.add('vuln', 'alert');
                vulnNodes.push(node);
            }
        }

        for (let i = 0; i < totalFirewalls; i++) {
            const fw = document.createElement('div');
            fw.className = 'firewall-block';
            fw.textContent = 'FW';
            fw.draggable = true;
            fw.dataset.id = 'fw' + i;
            poolEl.appendChild(fw);
        }

        if (stageBadge) stageBadge.textContent = 'Stage ' + (stageIndex + 1);

        updateHUD({
            gameName: 'Cyber Defense',
            stage: stageIndex + 1,
            lives,
            maxLives,
            progress: Math.round(((stageIndex) / (stages.length)) * 100)
        });
    }

    function startTimer() {
        if (interval) clearInterval(interval);
        interval = setInterval(() => {
            timer--;
            timerEl.textContent = timer.toString();
            if (timer <= 0) {
                clearInterval(interval);
                endStage(false);
            }
        }, 1000);
    }

    function loseLife() {
        lives--;
        if (lives <= 0) {
            msgEl.textContent = 'Geen levens meer. Game over voor deze mini‑game.';
            resultInput.value = 'lose';
            setTimeout(() => resultForm.submit(), 1200);
        } else {
            msgEl.textContent = 'Stage mislukt. Je verliest een leven.';
            updateHUD({
                gameName: 'Cyber Defense',
                stage: stageIndex + 1,
                lives,
                maxLives,
                progress: Math.round(((stageIndex) / (stages.length)) * 100)
            });
            setTimeout(() => {
                started = false;
                setupStage();
            }, 900);
        }
    }

    function nextStage() {
        stageIndex++;
        if (stageIndex >= stages.length) {
            msgEl.textContent = 'Je hebt alle cyber‑stages gehaald! 🎉';
            resultInput.value = 'win';
            setTimeout(() => resultForm.submit(), 1200);
        } else {
            msgEl.textContent = 'Stage voltooid! Volgende stage...';
            setTimeout(() => {
                started = false;
                setupStage();
            }, 900);
        }
    }

    function endStage(win) {
        started = false;
        clearInterval(interval);
        if (win) {
            msgEl.textContent = 'Alle kwetsbare poorten beschermd! 🎉';
            nextStage();
        } else {
            msgEl.textContent = 'Niet alle poorten zijn beschermd.';
            loseLife();
        }
    }

    gridEl.addEventListener('click', e => {
        if (!started) return;
        const node = e.target.closest('.cyber-node');
        if (!node || !node.classList.contains('vuln')) return;
        node.classList.toggle('marked');
    });

    gridEl.addEventListener('dragover', e => {
        e.preventDefault();
        const node = e.target.closest('.cyber-node');
        if (!node) return;
        if (node.classList.contains('marked')) {
            node.classList.add('drop-ok');
        }
    });

    gridEl.addEventListener('dragleave', e => {
        const node = e.target.closest('.cyber-node');
        if (!node) return;
        node.classList.remove('drop-ok');
    });

    gridEl.addEventListener('drop', e => {
        e.preventDefault();
        const node = e.target.closest('.cyber-node');
        if (!node) return;
        node.classList.remove('drop-ok');
        const fwId = e.dataTransfer.getData('text/plain');
        const fw = document.querySelector(`.firewall-block[data-id="${fwId}"]`);
        if (!fw) return;
        if (!node.classList.contains('marked')) {
            msgEl.textContent = 'Plaats firewall alleen op gemarkeerde kwetsbare poorten.';
            return;
        }
        if (node.querySelector('.firewall-block')) return;
        node.appendChild(fw);
        placed++;
        if (placed >= totalFirewalls) {
            const allProtected = vulnNodes.every(n => n.querySelector('.firewall-block'));
            endStage(allProtected);
        }
    });

    poolEl.addEventListener('dragstart', e => {
        const fw = e.target.closest('.firewall-block');
        if (!fw) return;
        e.dataTransfer.setData('text/plain', fw.dataset.id);
    });

    startBtn.addEventListener('click', () => {
        setupStage();
        started = true;
        startTimer();
        msgEl.textContent = 'Klik kwetsbare poorten en plaats firewalls.';
    });

    setupStage();
}

/* ---------- DATA GAME (MULTI-STAGE) ---------- */

function initDataGame() {
    const blocksEl = document.getElementById('dataBlocks');
    const zonesEl = document.getElementById('dataZones');
    const msgEl = document.getElementById('game3Message');
    const resultForm = document.getElementById('game3ResultForm');
    const resultInput = document.getElementById('game3ResultInput');
    const progressBar = document.querySelector('.model-progress-bar');
    const stageBadge = document.getElementById('game3StageBadge');

    if (!blocksEl) return;

    const stages = [
        {
            type: 'classification',
            blocks: [
                { id: 'b1', label: 'CPU load 10%', zone: 'low' },
                { id: 'b2', label: 'CPU load 80%', zone: 'high' },
                { id: 'b3', label: 'Requests 30/s', zone: 'medium' },
                { id: 'b4', label: 'Latency 20ms', zone: 'low' }
            ],
            zones: [
                { id: 'low', label: 'Low' },
                { id: 'medium', label: 'Medium' },
                { id: 'high', label: 'High' }
            ]
        },
        {
            type: 'clustering',
            blocks: [
                { id: 'c1', label: 'User group A', zone: 'cluster1' },
                { id: 'c2', label: 'User group B', zone: 'cluster2' },
                { id: 'c3', label: 'User group C', zone: 'cluster3' },
                { id: 'c4', label: 'User group A2', zone: 'cluster1' }
            ],
            zones: [
                { id: 'cluster1', label: 'Cluster 1' },
                { id: 'cluster2', label: 'Cluster 2' },
                { id: 'cluster3', label: 'Cluster 3' }
            ]
        },
        {
            type: 'connections',
            blocks: [
                { id: 'n1', label: 'Sensor', zone: 'input' },
                { id: 'n2', label: 'Pre‑processing', zone: 'hidden' },
                { id: 'n3', label: 'Model', zone: 'hidden' },
                { id: 'n4', label: 'Dashboard', zone: 'output' }
            ],
            zones: [
                { id: 'input', label: 'Input' },
                { id: 'hidden', label: 'Hidden' },
                { id: 'output', label: 'Output' }
            ]
        },
        {
            type: 'fix_labels',
            blocks: [
                { id: 'f1', label: 'Spam mail (incorrect: ham)', zone: 'spam' },
                { id: 'f2', label: 'Normale mail (incorrect: spam)', zone: 'ham' },
                { id: 'f3', label: 'Phishing (incorrect: ham)', zone: 'spam' }
            ],
            zones: [
                { id: 'spam', label: 'Spam' },
                { id: 'ham', label: 'Ham' }
            ]
        }
    ];

    let stageIndex = 0;
    let lives = 3;
    const maxLives = 3;

    function setupStage() {
        const stage = stages[stageIndex];
        blocksEl.innerHTML = '';
        zonesEl.innerHTML = '';
        msgEl.textContent = '';

        stage.blocks.forEach(b => {
            const el = document.createElement('div');
            el.className = 'data-block';
            el.textContent = b.label;
            el.draggable = true;
            el.dataset.id = b.id;
            blocksEl.appendChild(el);
        });

        stage.zones.forEach(z => {
            const el = document.createElement('div');
            el.className = 'data-zone';
            el.dataset.zone = z.id;
            el.innerHTML = `<div class="data-zone-label">${z.label}</div>`;
            zonesEl.appendChild(el);
        });

        if (stageBadge) stageBadge.textContent = 'Stage ' + (stageIndex + 1);

        const progress = Math.round((stageIndex / stages.length) * 100);
        if (progressBar) progressBar.style.width = progress + '%';

        updateHUD({
            gameName: 'Data & AI Puzzle',
            stage: stageIndex + 1,
            lives,
            maxLives,
            progress
        });
    }

    function loseLife() {
        lives--;
        if (lives <= 0) {
            msgEl.textContent = 'Geen levens meer. Game over voor deze mini‑game.';
            resultInput.value = 'lose';
            setTimeout(() => resultForm.submit(), 1200);
        } else {
            msgEl.textContent = 'Niet alle blokken liggen goed. Je verliest een leven.';
            const progress = Math.round((stageIndex / stages.length) * 100);
            updateHUD({
                gameName: 'Data & AI Puzzle',
                stage: stageIndex + 1,
                lives,
                maxLives,
                progress
            });
            setTimeout(setupStage, 900);
        }
    }

    function nextStage() {
        stageIndex++;
        if (stageIndex >= stages.length) {
            msgEl.textContent = 'Alle data‑stages voltooid! Model volledig getraind. 🎉';
            if (progressBar) progressBar.style.width = '100%';
            resultInput.value = 'win';
            setTimeout(() => resultForm.submit(), 1200);
        } else {
            msgEl.textContent = 'Stage voltooid! Volgende data‑puzzel...';
            setTimeout(setupStage, 900);
        }
    }

    function checkWin() {
        const stage = stages[stageIndex];
        const placedBlocks = zonesEl.querySelectorAll('.data-zone .data-block');
        if (placedBlocks.length !== stage.blocks.length) return;

        let allCorrect = true;
        placedBlocks.forEach(el => {
            const id = el.dataset.id;
            const block = stage.blocks.find(b => b.id === id);
            const zone = el.closest('.data-zone').dataset.zone;
            if (!block || block.zone !== zone) {
                allCorrect = false;
            }
        });

        if (allCorrect) {
            msgEl.textContent = 'Alle data‑blokken zijn correct geplaatst! 🎉';
            nextStage();
        } else {
            loseLife();
        }
    }

    blocksEl.addEventListener('dragstart', e => {
        const block = e.target.closest('.data-block');
        if (!block) return;
        e.dataTransfer.setData('text/plain', block.dataset.id);
    });

    zonesEl.addEventListener('dragover', e => {
        e.preventDefault();
        const zone = e.target.closest('.data-zone');
        if (!zone) return;
        zone.classList.add('highlight');
    });

    zonesEl.addEventListener('dragleave', e => {
        const zone = e.target.closest('.data-zone');
        if (!zone) return;
        zone.classList.remove('highlight');
    });

    zonesEl.addEventListener('drop', e => {
        e.preventDefault();
        const zone = e.target.closest('.data-zone');
        if (!zone) return;
        zone.classList.remove('highlight');
        const id = e.dataTransfer.getData('text/plain');
        const block = document.querySelector(`.data-block[data-id="${id}"]`);
        if (!block) return;
        zone.appendChild(block);
        checkWin();
    });

    setupStage();
}

/* ---------- CONFETTI ---------- */

function launchConfetti() {
    for (let i = 0; i < 70; i++) {
        const conf = document.createElement('div');
        conf.className = 'confetti';
        conf.style.left = Math.random() * 100 + 'vw';
        conf.style.animationDelay = Math.random() * 2 + 's';
        conf.style.backgroundColor = ['#0d6efd','#20c997','#ffc107','#e83e8c'][Math.floor(Math.random()*4)];
        document.body.appendChild(conf);
        setTimeout(() => conf.remove(), 4000);
    }
}
