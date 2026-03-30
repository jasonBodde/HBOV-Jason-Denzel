<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Specialisaties in de HBO-ICT Opleiding</title>
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
                        <a class="nav-link" href="vakken.php">Vakken</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="specialisaties.php">Specialisaties</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="quiz.php">Quiz</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="card-round p-4 mb-5 fade-in-up">
        <h1 class="section-heading">Specialisaties in de HBO-ICT Opleiding</h1>
        <p class="section-subtitle mb-0">
            Ontdek de verschillende specialisaties die je kunt volgen binnen de HBO-ICT opleiding.
        </p>
    </header>

    <section id="specializations" class="fade-in-up">
        <div class="row g-4">

            <div class="col-md-4">
                <div class="landing-card p-4 rounded-4 shadow h-100">
                    <h4 class="fw-bold"><i class="bi bi-code-slash me-2"></i>Software Development</h4>
                    <p>
                        Leer professionele software bouwen: van websites tot mobiele apps en complexe systemen.
                        Je werkt met moderne programmeertalen en frameworks zoals Java, Python, React en Node.js.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="landing-card p-4 rounded-4 shadow h-100">
                    <h4 class="fw-bold"><i class="bi bi-shield-lock me-2"></i>Cybersecurity</h4>
                    <p>
                        Bescherm systemen tegen cyberaanvallen, leer ethisch hacken en ontdek hoe je
                        organisaties digitaal veilig houdt. Specialiseer je in penetration testing en security audits.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="landing-card p-4 rounded-4 shadow h-100">
                    <h4 class="fw-bold"><i class="bi bi-bar-chart-line me-2"></i>Data Science</h4>
                    <p>
                        Duik in de wereld van data-analyse, machine learning en kunstmatige intelligentie.
                        Ontdek patronen in grote datasets en bouw voorspellende modellen met tools als Python en R.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="landing-card p-4 rounded-4 shadow h-100">
                    <h4 class="fw-bold"><i class="bi bi-hdd-network me-2"></i>Network & Infrastructure</h4>
                    <p>
                        Leer netwerken ontwerpen, beheren en beveiligen. Van cloud computing tot IoT-systemen,
                        bouw de digitale infrastructuur van morgen met Cisco, AWS en Azure certificeringen.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="landing-card p-4 rounded-4 shadow h-100">
                    <h4 class="fw-bold"><i class="bi bi-robot me-2"></i>AI & Machine Learning</h4>
                    <p>
                        Ontwikkel intelligente systemen en algoritmen. Leer deep learning, computer vision
                        en natuurlijke taalverwerking met frameworks als TensorFlow en PyTorch.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="landing-card p-4 rounded-4 shadow h-100">
                    <h4 class="fw-bold"><i class="bi bi-phone me-2"></i>Mobile Development</h4>
                    <p>
                        Creëer innovatieve mobiele applicaties voor iOS en Android. Werk met Swift, Kotlin,
                        React Native en Flutter om apps te bouwen die miljoenen gebruikers bereiken.
                    </p>
                </div>
            </div>

        </div>
    </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Add interactive effects to specialization cards
        const cards = document.querySelectorAll('.landing-card');
        cards.forEach((card, index) => {
            card.style.animationDelay = (index * 0.15) + 's';

            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-10px) scale(1.03)';
                this.style.boxShadow = '0 25px 50px rgba(0,0,0,0.2)';
                const icon = this.querySelector('i');
                if (icon) {
                    icon.style.transform = 'scale(1.2) rotate(5deg)';
                    icon.style.transition = 'transform 0.3s ease';
                }
            });

            card.addEventListener('mouseleave', function() {
                this.style.transform = '';
                this.style.boxShadow = '';
                const icon = this.querySelector('i');
                if (icon) {
                    icon.style.transform = '';
                }
            });

            // Add ripple effect on click
            card.addEventListener('click', function(e) {
                const ripple = document.createElement('div');
                ripple.className = 'ripple-effect';
                ripple.style.left = (e.offsetX) + 'px';
                ripple.style.top = (e.offsetY) + 'px';
                this.appendChild(ripple);
                setTimeout(() => ripple.remove(), 600);
            });
        });

        // Add floating animation to icons with different delays
        document.querySelectorAll('.landing-card i').forEach((icon, index) => {
            icon.style.animation = 'float 4s ease-in-out infinite';
            icon.style.animationDelay = (index * 0.5) + 's';
        });
    });
</script>
</body>
</html>