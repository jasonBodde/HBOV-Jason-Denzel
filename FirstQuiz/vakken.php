<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vakken in de HBO-ICT Opleiding</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="app-body overlay-gradient">

<div class="container my-5">

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
                        <a class="nav-link active" href="vakken.php">Vakken</a>
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

    <header class="card-round p-4 mb-5 fade-in-up">
        <h1 class="section-heading">Vakken in de HBO-ICT Opleiding</h1>
        <p class="section-subtitle mb-0">
            Bekijk een overzicht van de belangrijkste vakken die je volgt tijdens de HBO-ICT opleiding.
        </p>
    </header>

    <section id="vakken" class="fade-in-up">
        <div class="row g-4">

            <div class="col-md-6">
                <div class="landing-card p-4 rounded-4 shadow h-100">
                    <h4 class="fw-bold"><i class="bi bi-code-slash me-2"></i>Programmeren</h4>
                    <p>
                        Je leert programmeren in verschillende talen, zoals Python, Java, C++, JavaScript en PHP.
                        Van algoritmen tot object-georiënteerd programmeren, bouw de basis voor softwareontwikkeling.
                    </p>
                </div>
            </div>

            <div class="col-md-6">
                <div class="landing-card p-4 rounded-4 shadow h-100">
                    <h4 class="fw-bold"><i class="bi bi-bar-chart-line me-2"></i>Data-analyse</h4>
                    <p>
                        Analyseer en interpreteer grote hoeveelheden data voor zakelijke toepassingen.
                        Leer werken met databases, SQL en data visualisatie tools.
                    </p>
                </div>
            </div>

            <div class="col-md-6">
                <div class="landing-card p-4 rounded-4 shadow h-100">
                    <h4 class="fw-bold"><i class="bi bi-hdd-network me-2"></i>Netwerken</h4>
                    <p>
                        Leer de fundamenten van netwerken, van routers tot serverbeheer.
                        Ontdek TCP/IP, netwerkbeveiliging en cloud-infrastructuur.
                    </p>
                </div>
            </div>

            <div class="col-md-6">
                <div class="landing-card p-4 rounded-4 shadow h-100">
                    <h4 class="fw-bold"><i class="bi bi-shield-lock me-2"></i>Cybersecurity</h4>
                    <p>
                        Leer hoe je systemen en data kunt beveiligen tegen cyberaanvallen.
                        Van encryptie tot ethisch hacken en security audits.
                    </p>
                </div>
            </div>

            <div class="col-md-6">
                <div class="landing-card p-4 rounded-4 shadow h-100">
                    <h4 class="fw-bold"><i class="bi bi-browser-chrome me-2"></i>Webontwikkeling</h4>
                    <p>
                        Bouw interactieve websites met HTML, CSS, JavaScript en frameworks als React.
                        Leer responsive design en moderne webtechnologieën.
                    </p>
                </div>
            </div>

            <div class="col-md-6">
                <div class="landing-card p-4 rounded-4 shadow h-100">
                    <h4 class="fw-bold"><i class="bi bi-database me-2"></i>Databases</h4>
                    <p>
                        Ontwerp en beheer relationele en NoSQL databases. Leer SQL, data modeling
                        en database optimalisatie voor grote applicaties.
                    </p>
                </div>
            </div>

        </div>
    </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Add interactive effects to subject cards
        const cards = document.querySelectorAll('.landing-card');
        cards.forEach((card, index) => {
            card.style.animationDelay = (index * 0.1) + 's';

            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-8px) rotate(1deg)';
                this.style.boxShadow = '0 20px 40px rgba(0,0,0,0.15)';
                const icon = this.querySelector('i');
                if (icon) {
                    icon.style.animation = 'bounce 0.6s ease';
                }
            });

            card.addEventListener('mouseleave', function() {
                this.style.transform = '';
                this.style.boxShadow = '';
                const icon = this.querySelector('i');
                if (icon) {
                    icon.style.animation = '';
                }
            });

            // Add click effect
            card.addEventListener('click', function() {
                this.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    this.style.transform = '';
                }, 150);
            });
        });

        // Add floating animation to icons
        document.querySelectorAll('.landing-card i').forEach(icon => {
            icon.style.animation = 'float 3s ease-in-out infinite';
            icon.style.animationDelay = Math.random() * 2 + 's';
        });
    });
</script>
</body>
</html>