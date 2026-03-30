<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HBO-ICT Opleiding</title>

    <!-- Bootstrap + Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Custom styles -->
    <link rel="stylesheet" href="style.css">

    <!-- OVERRIDES: tekstkleur fix -->
    <style>
        /* ----------------------------- */
        /* 1. Donkere tekst in kaarten   */
        /* ----------------------------- */
        .landing-card,
        .landing-card p,
        .landing-card h2,
        .landing-card h4,
        #specializations .landing-card p,
        #specializations .landing-card h4,
        #future .landing-card p,
        #future .landing-card h5 {
            color: #000000 !important;
        }

        /* ----------------------------- */
        /* 2. Lichte tekst op achtergrond */
        /* ----------------------------- */
        body,
        header p,
        header h1,
        #quizLink h3,
        #quizLink p {
            color: #000000 !important;
        }

        /* ----------------------------- */
        /* 3. Titels op donkere achtergrond */
        /* ----------------------------- */
        #specializations h2,
        #future h2 {
            color: #000000 !important;
        }

        /* ----------------------------- */
        /* 4. Iconen accentkleur         */
        /* ----------------------------- */
        .landing-card i,
        #specializations i,
        #future i {
            color: #0d6efd !important;
        }

        /* ----------------------------- */
        /* 5. Startknop tekstkleur fix   */
        /* ----------------------------- */
        .start-btn {
            color: #000000 !important;
        }

        .start-btn:hover {
            color: #0d6efd !important;
            background-color: #ffffff !important;
        }
    </style>
</head>

<body class="app-body overlay-gradient">

<div class="container py-5">

    <!-- NAVIGATION -->
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent mb-4">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="index.php">HBO-ICT</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="vakken.php">Vakken</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="specialisaties.php">Specialisaties</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="quiz.php">Quiz</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- HEADER -->
    <header class="text-center mb-5 fade-in-up">
        <h1 class="fw-bold display-5">Welkom bij de HBO‑ICT Opleiding</h1>
        <p class="lead">
            Ontdek alles over de opleiding: vakken, specialisaties, stages, toekomstmogelijkheden en meer.
        </p>
    </header>

    <!-- INTRO CARD -->
    <section id="intro" class="landing-card p-4 rounded-4 shadow fade-in-up mb-5 interactive-card">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h2 class="fw-bold mb-3">Wat is HBO‑ICT?</h2>
                <p>
                    De HBO‑ICT opleiding leidt je op tot een veelzijdige IT‑professional. Je leert programmeren,
                    netwerken beheren, data analyseren, systemen beveiligen en software ontwerpen. De opleiding
                    combineert theorie met praktijk, zodat je klaar bent voor de snelgroeiende IT‑wereld.
                </p>
                <p>
                    De opleiding duurt gemiddeld 4 jaar en biedt talloze specialisaties, projecten en stages.
                </p>
                <button class="btn btn-primary mt-3 pulse-btn" onclick="scrollToQuiz()">
                    <i class="bi bi-lightning-charge-fill me-2"></i>Ontdek meer
                </button>
            </div>

            <div class="col-md-6 text-center">
                <div class="image-container">
                    <img src="ict.png" alt="ICT Opleiding" class="img-fluid rounded-4 shadow-lg hover-lift">
                </div>
            </div>
        </div>
    </section>

    <!-- QUIZ SECTION -->
    <section id="quizLink" class="text-center my-5 fade-in-up">
        <h3 class="fw-bold">Test je kennis met onze interactieve quiz!</h3>
        <p>
            Benieuwd hoeveel je al weet over de HBO‑ICT opleiding?  
            Doe de quiz en ontdek het!
        </p>
        <a href="quiz.php" class="btn start-btn px-4 py-2 fs-5">
            <i class="bi bi-lightning-charge-fill me-2"></i> Start de Quiz
        </a>
    </section>

    <!-- SPECIALISATIES -->
    <section id="specializations" class="my-5 fade-in-up">
        <h2 class="fw-bold text-center mb-4">Specialisaties binnen HBO‑ICT</h2>

        <div class="row g-4">

            <div class="col-md-4">
                <div class="landing-card p-4 rounded-4 shadow h-100">
                    <h4 class="fw-bold"><i class="bi bi-code-slash me-2"></i>Software Development</h4>
                    <p>
                        Leer professionele software bouwen: van websites tot mobiele apps en complexe systemen.
                        Je werkt met moderne programmeertalen en frameworks.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="landing-card p-4 rounded-4 shadow h-100">
                    <h4 class="fw-bold"><i class="bi bi-shield-lock me-2"></i>Cybersecurity</h4>
                    <p>
                        Bescherm systemen tegen cyberaanvallen, leer ethisch hacken en ontdek hoe je
                        organisaties digitaal veilig houdt.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="landing-card p-4 rounded-4 shadow h-100">
                    <h4 class="fw-bold"><i class="bi bi-bar-chart-line me-2"></i>Data Science</h4>
                    <p>
                        Duik in de wereld van data‑analyse, machine learning en kunstmatige intelligentie.
                        Ontdek patronen en bouw voorspellende modellen.
                    </p>
                </div>
            </div>

        </div>
    </section>

    <!-- TOEKOMST -->
    <section id="future" class="my-5 fade-in-up">
        <h2 class="fw-bold text-center mb-4">Wat kun je worden met HBO‑ICT?</h2>

        <div class="row g-4">

            <div class="col-md-3">
                <div class="landing-card p-4 rounded-4 shadow h-100 text-center">
                    <i class="bi bi-laptop fs-1 mb-3"></i>
                    <h5>Software Engineer</h5>
                    <p>Ontwerp en ontwikkel professionele softwareoplossingen.</p>
                </div>
            </div>

            <div class="col-md-3">
                <div class="landing-card p-4 rounded-4 shadow h-100 text-center">
                    <i class="bi bi-shield-check fs-1 mb-3"></i>
                    <h5>Security Specialist</h5>
                    <p>Bescherm bedrijven tegen digitale dreigingen.</p>
                </div>
            </div>

            <div class="col-md-3">
                <div class="landing-card p-4 rounded-4 shadow h-100 text-center">
                    <i class="bi bi-graph-up-arrow fs-1 mb-3"></i>
                    <h5>Data Analyst</h5>
                    <p>Analyseer data en ondersteun belangrijke beslissingen.</p>
                </div>
            </div>

            <div class="col-md-3">
                <div class="landing-card p-4 rounded-4 shadow h-100 text-center">
                    <i class="bi bi-cloud fs-1 mb-3"></i>
                    <h5>Cloud Engineer</h5>
                    <p>Werk met cloudplatformen zoals Azure, AWS en Google Cloud.</p>
                </div>
            </div>

        </div>
    </section>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Smooth scrolling function
    function scrollToQuiz() {
        document.getElementById('quizLink').scrollIntoView({
            behavior: 'smooth',
            block: 'center'
        });
    }

    // Add interactive effects
    document.addEventListener('DOMContentLoaded', () => {
        // Add hover effects to cards
        const cards = document.querySelectorAll('.landing-card');
        cards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-5px) scale(1.02)';
                this.style.boxShadow = '0 15px 35px rgba(0,0,0,0.1)';
            });

            card.addEventListener('mouseleave', function() {
                this.style.transform = '';
                this.style.boxShadow = '';
            });
        });

        // Add click ripple effect
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('landing-card') || e.target.closest('.landing-card')) {
                const ripple = document.createElement('div');
                ripple.className = 'ripple-effect';
                ripple.style.left = e.offsetX + 'px';
                ripple.style.top = e.offsetY + 'px';

                const card = e.target.closest('.landing-card');
                if (card) {
                    card.appendChild(ripple);
                    setTimeout(() => ripple.remove(), 600);
                }
            }
        });

        // Animate elements on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Observe all fade-in-up elements
        document.querySelectorAll('.fade-in-up').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(20px)';
            el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(el);
        });

        // Add floating animation to icons
        document.querySelectorAll('.landing-card i').forEach(icon => {
            icon.style.animation = 'float 3s ease-in-out infinite';
        });
    });
</script>
</body>
</html>
