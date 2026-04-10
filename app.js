const quizQuestions = [
    {
        question: "Wat is de primaire focus van de HBO-ICT opleiding?",
        options: [
            { label: "Programmeren en softwareontwikkeling", icon: "bi-laptop" },
            { label: "Netwerken en systeembeheer", icon: "bi-router" },
            { label: "Data-analyse en kunstmatige intelligentie", icon: "bi-bar-chart-line" },
            { label: "Alle bovenstaande", icon: "bi-check-all" }
        ],
        correct: 3
    },
    {
        question: "Welke van de volgende vakken komt waarschijnlijk voor in het eerste jaar van de opleiding?",
        options: [
            { label: "Computerbeveiliging", icon: "bi-shield-lock" },
            { label: "Webdesign", icon: "bi-browser-chrome" },
            { label: "Programmeren in Java", icon: "bi-code" },
            { label: "Netwerkarchitectuur", icon: "bi-server" }
        ],
        correct: 2
    },
    {
        question: "Welke programmeertaal wordt vaak geleerd in het eerste jaar van de HBO-ICT opleiding?",
        options: [
            { label: "JavaScript", icon: "bi-code-slash" },
            { label: "Python", icon: "bi-file-earmark-code" },
            { label: "C#", icon: "bi-file-earmark-text" },
            { label: "PHP", icon: "bi-file-earmark-text" }
        ],
        correct: 1
    },
    {
        question: "Wat is een belangrijk voordeel van stage lopen tijdens de opleiding?",
        options: [
            { label: "Het maakt je studie makkelijker", icon: "bi-clipboard" },
            { label: "Je leert praktische ervaring opdoen en netwerken", icon: "bi-person-lines-fill" },
            { label: "Je krijgt altijd een vast contract na je stage", icon: "bi-file-earmark-check" },
            { label: "Je hebt geen lessen meer", icon: "bi-door-open" }
        ],
        correct: 1
    },
    {
        question: "Wat kun je verwachten in de minor “Cybersecurity”?",
        options: [
            { label: "Leren over ethische hacking en beveiligingsprotocollen", icon: "bi-lock" },
            { label: "Het ontwerpen van websites", icon: "bi-window" },
            { label: "Software development voor mobiele apps", icon: "bi-phone" },
            { label: "Data-analyse voor bedrijven", icon: "bi-pie-chart" }
        ],
        correct: 0
    },
    {
        question: "Wat is de afkorting van de term “API”?",
        options: [
            { label: "Application Programming Interface", icon: "bi-code-slash" },
            { label: "Application Program Interface", icon: "bi-code" },
            { label: "Automated Processing Interface", icon: "bi-cpu" },
            { label: "All Purpose Interface", icon: "bi-tools" }
        ],
        correct: 0
    },
    {
        question: "Hoeveel jaar duurt een HBO-ICT opleiding meestal?",
        options: [
            { label: "2 jaar", icon: "bi-clock" },
            { label: "3 jaar", icon: "bi-clock" },
            { label: "4 jaar", icon: "bi-calendar" },
            { label: "5 jaar", icon: "bi-calendar" }
        ],
        correct: 2
    },
    {
        question: "Wat is het verschil tussen een programmeur en een software engineer?",
        options: [
            { label: "Een programmeur schrijft alleen code, een software engineer doet dat én ontwerpt systemen.", icon: "bi-code-slash" },
            { label: "Er is geen verschil.", icon: "bi-person-check" },
            { label: "Een software engineer is een type programmeur.", icon: "bi-person-lines" },
            { label: "Een programmeur schrijft apps, een software engineer werkt alleen met websites.", icon: "bi-file-earmark-text" }
        ],
        correct: 0
    },
    {
        question: "Wat is een veelgebruikte software voor versiebeheer?",
        options: [
            { label: "GitHub", icon: "bi-github" },
            { label: "Adobe Photoshop", icon: "bi-image" },
            { label: "WordPress", icon: "bi-window" },
            { label: "Excel", icon: "bi-file-earmark-spreadsheet" }
        ],
        correct: 0
    },
    {
        question: "Welke van de volgende specialisaties is geen onderdeel van de HBO-ICT opleiding?",
        options: [
            { label: "Software Engineering", icon: "bi-laptop" },
            { label: "Data Science", icon: "bi-pie-chart" },
            { label: "Verkoop en marketing", icon: "bi-person-circle" },
            { label: "Kunstmatige Intelligentie", icon: "bi-lightbulb" }
        ],
        correct: 2
    },
    {
        question: "Wat zijn 'Agile' en 'Scrum' in de context van een ICT-opleiding?",
        options: [
            { label: "Methoden voor het managen van projecten en teams", icon: "bi-people" },
            { label: "Specifieke programmeertalen", icon: "bi-code" },
            { label: "Computerbeveiligingstechnieken", icon: "bi-shield-lock" },
            { label: "Opleidingen voor netwerktechnici", icon: "bi-server" }
        ],
        correct: 0
    },
    {
        question: "Wat is een belangrijke vaardigheid voor een ICT’er op de werkvloer?",
        options: [
            { label: "Creatief denken", icon: "bi-lightbulb" },
            { label: "Teamwerk en communicatie", icon: "bi-person-lines-fill" },
            { label: "Alleen technische kennis", icon: "bi-tools" },
            { label: "Alleen analytisch vermogen", icon: "bi-graph-up" }
        ],
        correct: 1
    },
    {
        question: "Waarom is het belangrijk om een netwerk van contacten te hebben tijdens de opleiding?",
        options: [
            { label: "Het helpt je bij het vinden van een stage of baan", icon: "bi-person-check" },
            { label: "Het is niet echt belangrijk", icon: "bi-x-circle" },
            { label: "Het helpt je om je studie sneller te voltooien", icon: "bi-hourglass" },
            { label: "Je krijgt automatisch betere cijfers", icon: "bi-bar-chart" }
        ],
        correct: 0
    },
    {
        question: "Wat wordt er bedoeld met het begrip 'Big Data'?",
        options: [
            { label: "Grote hoeveelheden gestructureerde en ongestructureerde data", icon: "bi-database" },
            { label: "Software die je helpt met datavisualisatie", icon: "bi-bar-chart" },
            { label: "Een database voor kleine bedrijven", icon: "bi-building" },
            { label: "Sociale netwerken", icon: "bi-share-alt" }
        ],
        correct: 0
    },
    {
        question: "Wat is een belangrijk voordeel van een ICT-opleiding in het buitenland?",
        options: [
            { label: "Je leert een nieuwe taal", icon: "bi-globe" },
            { label: "Je ontvangt een hogere studiebeurs", icon: "bi-cash-stack" },
            { label: "Je wordt automatisch aangenomen bij grote bedrijven", icon: "bi-building" },
            { label: "Je krijgt geen stageplek", icon: "bi-x-circle" }
        ],
        correct: 0
    },
    {
        question: "Wat is het doel van een software architect in de ICT?",
        options: [
            { label: "Het ontwerpen van de algehele structuur van softwaresystemen", icon: "bi-architecture" },
            { label: "Het schrijven van eenvoudige code", icon: "bi-file-earmark-code" },
            { label: "Het beheren van netwerken", icon: "bi-router" },
            { label: "Het onderhouden van klantrelaties", icon: "bi-person-lines-fill" }
        ],
        correct: 0
    },
    {
        question: "Wat betekent de term 'machine learning'?",
        options: [
            { label: "Een type kunstmatige intelligentie waarmee systemen leren van data", icon: "bi-brain" },
            { label: "Het gebruik van robots voor fysiek werk", icon: "bi-person" },
            { label: "De taak om handmatige processen te automatiseren", icon: "bi-gear" },
            { label: "Een algoritme dat foto's maakt", icon: "bi-camera" }
        ],
        correct: 0
    },
    {
        question: "Wat kun je verwachten in een 'Data Science' specialisatie?",
        options: [
            { label: "Analyse van grote hoeveelheden gegevens om patronen te vinden", icon: "bi-graph-up" },
            { label: "Softwareontwikkeling voor mobiele apps", icon: "bi-phone" },
            { label: "Beveiliging van bedrijfsnetwerken", icon: "bi-shield-lock" },
            { label: "Webdesign en UX/UI", icon: "bi-ui-checks" }
        ],
        correct: 0
    },
    {
        question: "Wat is 'cloud computing'?",
        options: [
            { label: "Het opslaan van data en apps op externe servers via internet", icon: "bi-cloud" },
            { label: "Het beheren van lokale netwerken", icon: "bi-server" },
            { label: "Een programmeertaal voor webapplicaties", icon: "bi-file-earmark-code" },
            { label: "Een databaseprogramma", icon: "bi-database" }
        ],
        correct: 0
    },
    {
        question: "Welke techniek wordt vaak gebruikt voor gegevensbeveiliging?",
        options: [
            { label: "Encryptie", icon: "bi-shield-lock" },
            { label: "HTML", icon: "bi-code-slash" },
            { label: "CSS", icon: "bi-file-earmark-css" },
            { label: "SQL", icon: "bi-database" }
        ],
        correct: 0
    },
    {
        question: "Welke skill is essentieel voor een Data Scientist?",
        options: [
            { label: "Statistische analyse en programmeren", icon: "bi-bar-chart" },
            { label: "Alleen goed kunnen programmeren", icon: "bi-code-slash" },
            { label: "Netwerkbeheer", icon: "bi-router" },
            { label: "Webdesign", icon: "bi-browser-chrome" }
        ],
        correct: 0
    },
    {
        question: "Wat wordt er verstaan onder 'DevOps'?",
        options: [
            { label: "Een samenwerkingsmodel tussen ontwikkeling en IT-beheer", icon: "bi-cogs" },
            { label: "Een programmeertaal voor webontwikkeling", icon: "bi-code-slash" },
            { label: "Een type software voor datavisualisatie", icon: "bi-pie-chart" },
            { label: "Een beveiligingsprotocol", icon: "bi-shield-lock" }
        ],
        correct: 0
    },
    {
        question: "Wat is een 'database schema'?",
        options: [
            { label: "De structuur van een database, inclusief tabellen en relaties", icon: "bi-database" },
            { label: "Een manier om data te comprimeren", icon: "bi-compress" },
            { label: "De beschrijving van de datatypes in een programma", icon: "bi-file-earmark-code" },
            { label: "De manier waarop een website wordt gepresenteerd", icon: "bi-browser-chrome" }
        ],
        correct: 0
    },
    {
        question: "Wat houdt een 'full-stack developer' in?",
        options: [
            { label: "Een ontwikkelaar die zowel front-end als back-end code schrijft", icon: "bi-laptop" },
            { label: "Een developer die alleen back-end code schrijft", icon: "bi-server" },
            { label: "Een developer die zich alleen richt op mobiele apps", icon: "bi-phone" },
            { label: "Een specialist in databanken", icon: "bi-database" }
        ],
        correct: 0
    },
    {
        question: "Wat is 'continuous integration'?",
        options: [
            { label: "Het automatisch integreren van code in een shared repository", icon: "bi-cogs" },
            { label: "Het proces van handmatig testen van software", icon: "bi-check-circle" },
            { label: "Het creëren van softwarepatches", icon: "bi-code-slash" },
            { label: "Het maken van websites", icon: "bi-browser-chrome" }
        ],
        correct: 0
    },
    {
        question: "Wat is de functie van een API (Application Programming Interface)?",
        options: [
            { label: "Het biedt een interface voor softwareapplicaties om met elkaar te communiceren", icon: "bi-code-slash" },
            { label: "Het is een database voor het opslaan van gegevens", icon: "bi-database" },
            { label: "Het is een programma om apps te ontwerpen", icon: "bi-app" },
            { label: "Het biedt grafische interfaces voor websites", icon: "bi-browser-chrome" }
        ],
        correct: 0
    },
    {
        question: "Wat is een voorbeeld van een 'frontend' technologie?",
        options: [
            { label: "HTML, CSS, JavaScript", icon: "bi-file-earmark-code" },
            { label: "Python, Ruby, C++", icon: "bi-code-slash" },
            { label: "SQL, MongoDB", icon: "bi-database" },
            { label: "PHP, Node.js", icon: "bi-server" }
        ],
        correct: 0
    },
    {
        question: "Wat houdt 'cloud storage' in?",
        options: [
            { label: "Het opslaan van bestanden op een server via internet", icon: "bi-cloud" },
            { label: "Het gebruiken van externe harde schijven", icon: "bi-hdd" },
            { label: "Het beheren van lokale datacenters", icon: "bi-server" },
            { label: "Het hosten van websites", icon: "bi-browser-chrome" }
        ],
        correct: 0
    },
    {
        question: "Welke van de volgende tools wordt vaak gebruikt voor versiebeheer?",
        options: [
            { label: "Git", icon: "bi-git" },
            { label: "Postman", icon: "bi-box" },
            { label: "Jira", icon: "bi-clipboard" },
            { label: "Slack", icon: "bi-chat-left-text" }
        ],
        correct: 0
    }
];

function scrollToQuiz() {
    const quizSection = document.getElementById('quizLink');
    if (quizSection) {
        quizSection.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }
}

function addCardInteractions() {
    const cards = document.querySelectorAll('.landing-card');
    cards.forEach(card => {
        card.addEventListener('mouseenter', () => {
            card.style.transform = 'translateY(-7px) scale(1.02)';
            card.style.boxShadow = '0 22px 58px rgba(0,0,0,0.12)';
        });

        card.addEventListener('mouseleave', () => {
            card.style.transform = '';
            card.style.boxShadow = '';
        });

        card.addEventListener('click', (event) => {
            const ripple = document.createElement('div');
            ripple.className = 'ripple-effect';
            ripple.style.left = `${event.offsetX}px`;
            ripple.style.top = `${event.offsetY}px`;
            card.appendChild(ripple);
            setTimeout(() => ripple.remove(), 600);
        });
    });
}

function animateFadeInUp() {
    document.querySelectorAll('.fade-in-up').forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(20px)';
        el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });
        observer.observe(el);
    });
}

function initQuizPage() {
    const questionText = document.getElementById('questionText');
    const optionsContainer = document.getElementById('optionsContainer');
    const questionCounter = document.getElementById('questionCounter');
    const scoreIndicator = document.getElementById('scoreIndicator');
    const progressBar = document.getElementById('progressBar');
    const nextButton = document.getElementById('nextButton');

    let currentQuestionIndex = 0;
    let score = 0;
    let answered = false;

    function updateProgress() {
        questionCounter.textContent = `Vraag ${currentQuestionIndex + 1} / ${quizQuestions.length}`;
        scoreIndicator.textContent = `Score: ${score}`;
        const progress = ((currentQuestionIndex) / quizQuestions.length) * 100;
        progressBar.style.width = `${progress}%`;
    }

    function renderQuestion() {
        const question = quizQuestions[currentQuestionIndex];
        questionText.textContent = question.question;
        optionsContainer.innerHTML = '';
        answered = false;
        nextButton.disabled = true;
        nextButton.textContent = currentQuestionIndex === quizQuestions.length - 1 ? 'Bekijk resultaat' : 'Volgende vraag';

        question.options.forEach((option, optionIndex) => {
            const button = document.createElement('button');
            button.type = 'button';
            button.className = 'btn btn-answer w-100 text-start';
            button.innerHTML = `<div class="d-flex align-items-center gap-3"><i class="bi ${option.icon} fs-4"></i><span>${option.label}</span></div>`;
            button.addEventListener('click', () => handleAnswer(optionIndex, button));
            const wrapper = document.createElement('div');
            wrapper.className = 'col-12';
            wrapper.appendChild(button);
            optionsContainer.appendChild(wrapper);
        });

        updateProgress();
    }

    function handleAnswer(selectedIndex, button) {
        if (answered) return;

        answered = true;
        const question = quizQuestions[currentQuestionIndex];
        const correctIndex = question.correct;

        if (selectedIndex === correctIndex) {
            button.classList.add('correct-answer');
            score += 1;
        } else {
            button.classList.add('wrong-answer');
            const correctButton = optionsContainer.querySelectorAll('button')[correctIndex];
            if (correctButton) {
                correctButton.classList.add('correct-answer');
            }
        }

        optionsContainer.querySelectorAll('button').forEach((optionButton) => {
            optionButton.disabled = true;
        });

        nextButton.disabled = false;
        scoreIndicator.textContent = `Score: ${score}`;
    }

    nextButton.addEventListener('click', () => {
        if (!answered) return;
        currentQuestionIndex += 1;
        if (currentQuestionIndex >= quizQuestions.length) {
            sessionStorage.setItem('hboictQuizScore', String(score));
            window.location.href = 'result.html';
            return;
        }
        renderQuestion();
    });

    renderQuestion();
}

function initResultPage() {
    const resultCard = document.getElementById('resultCard');
    const resultTitle = document.getElementById('resultTitle');
    const resultText = document.getElementById('resultText');
    const resultIcon = document.getElementById('resultIcon');
    const scoreValue = document.getElementById('scoreValue');
    const confettiContainer = document.getElementById('confettiContainer');

    const storedScore = sessionStorage.getItem('hboictQuizScore');
    const score = storedScore !== null ? parseInt(storedScore, 10) : -1;

    if (score < 0 || Number.isNaN(score)) {
        resultTitle.textContent = 'Geen quizgegevens gevonden';
        resultText.textContent = 'Start eerst de quiz om jouw resultaat te bekijken. Je kunt terug naar de quizpagina om opnieuw te beginnen.';
        resultIcon.className = 'bi bi-info-circle display-1 text-secondary mb-3';
        scoreValue.textContent = '0';
        resultCard.classList.remove('card-hidden');
        resultCard.classList.add('fade-in-up');
        return;
    }

    let title;
    let text;
    let iconClass;
    let colorClass;
    let celebrate = false;

    if (score >= 24) {
        title = 'HBO-ICT past perfect bij jou!';
        text = 'Je hebt een sterke interesse in ICT en technologie. Deze studie sluit waarschijnlijk heel goed aan bij wie jij bent.';
        iconClass = 'bi-check-circle-fill';
        colorClass = 'success';
        celebrate = true;
    } else if (score >= 12) {
        title = 'ICT kan bij je passen';
        text = 'Je hebt interesse in ICT, maar misschien wil je nog verder onderzoeken welke richting het beste bij je past.';
        iconClass = 'bi-lightbulb-fill';
        colorClass = 'warning';
    } else {
        title = 'ICT past waarschijnlijk niet bij je';
        text = 'Je interesses liggen mogelijk in een andere richting. Het is de moeite waard om ook andere studies te verkennen.';
        iconClass = 'bi-x-circle-fill';
        colorClass = 'danger';
    }

    resultTitle.textContent = title;
    resultText.textContent = text;
    resultIcon.className = `bi ${iconClass} display-1 text-${colorClass} mb-3`;
    scoreValue.textContent = String(score);

    resultCard.classList.remove('card-hidden');
    resultCard.classList.add('fade-in-up');

    if (celebrate) {
        launchConfetti(confettiContainer);
        playCelebrationSound();
    }
}

function launchConfetti(container) {
    if (!container) return;

    const colors = ['#007bff', '#28a745', '#dc3545', '#ffc107', '#6f42c1', '#e83e8c'];
    for (let i = 0; i < 80; i += 1) {
        const piece = document.createElement('div');
        piece.className = 'confetti-piece';
        piece.style.left = `${Math.random() * 100}%`;
        piece.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
        piece.style.animationDelay = `${Math.random() * 2}s`;
        piece.style.animationDuration = `${Math.random() * 1.8 + 2}s`;
        piece.style.width = `${Math.random() * 8 + 4}px`;
        piece.style.height = `${Math.random() * 8 + 4}px`;
        container.appendChild(piece);
    }
}

function playCelebrationSound() {
    try {
        const audioContext = new (window.AudioContext || window.webkitAudioContext)();
        const notes = [523, 659, 784, 1047];
        let noteIndex = 0;

        function playNote() {
            if (noteIndex >= notes.length) return;
            const oscillator = audioContext.createOscillator();
            const gainNode = audioContext.createGain();
            oscillator.connect(gainNode);
            gainNode.connect(audioContext.destination);
            oscillator.frequency.setValueAtTime(notes[noteIndex], audioContext.currentTime);
            gainNode.gain.setValueAtTime(0.25, audioContext.currentTime);
            gainNode.gain.exponentialRampToValueAtTime(0.01, audioContext.currentTime + 0.5);
            oscillator.start(audioContext.currentTime);
            oscillator.stop(audioContext.currentTime + 0.5);
            noteIndex += 1;
            setTimeout(playNote, 220);
        }

        playNote();
    } catch (error) {
        // Web Audio API may not be supported in all browsers.
    }
}

function initPage() {
    animateFadeInUp();
    addCardInteractions();
    const page = document.body.dataset.page;
    if (page === 'quiz') {
        initQuizPage();
    }
    if (page === 'result') {
        initResultPage();
    }
}

document.addEventListener('DOMContentLoaded', initPage);
