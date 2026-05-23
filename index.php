<?php
require_once 'funciones_sesion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Byron V. Ñato - Desarrollador & Tecnólogo</title>
    
    <!-- Bootstrap CSS desde CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome para iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- CSS personalizado -->
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <?php include 'nav.php'; ?>

    <!-- Encabezado principal -->
    <header class="hero-section text-white py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 fw-bold mb-3">
                        Hola, soy <span class="text-primary">Byron</span>
                    </h1>
                    <p class="lead mb-4">
                        Tecnólogo en Electrónica y estudiante de Ingeniería en Tecnologías de la Información. 
                        Apasionado por la programación y el desarrollo web.
                    </p>
                    <div class="d-flex gap-3">
                        <a href="sobre_mi.php" class="btn btn-primary btn-lg">
                            <i class="fas fa-user"></i> Conocerme más
                        </a>
                        <a href="contacto.php" class="btn btn-outline-light btn-lg">
                            <i class="fas fa-envelope"></i> Contactarme
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <img src="img/perfil.jpeg" 
                         alt="Byron V. Ñato - Perfil Profesional" class="img-fluid rounded-circle shadow hero-image">
                </div>
            </div>
        </div>
    </header>

    <!-- Sección de presentación -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5 section-title">
                <i class="fas fa-info-circle text-primary"></i> Acerca de Mí
            </h2>
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body">
                            <h3 class="card-title text-primary">
                                <i class="fas fa-graduation-cap"></i> Formación
                            </h3>
                            <p class="card-text">
                                Tecnólogo en Electrónica con experiencia en electrónica analógica y digital.
                                Actualmente estudiante de Ingeniería en Tecnologías de la Información en la UTPL,
                                enfocándome en desarrollo web y programación.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body">
                            <h4 class="card-title text-primary">
                                <i class="fas fa-map-marker-alt"></i> Ubicación
                            </h4>
                            <p class="card-text">
                                Vivo en Sangolquí, cantón Rumiñahui, provincia de Pichincha, Ecuador.
                                Casado con mi esposa Iveth y padre de Abraham.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4 mt-2">
                <div class="col-md-6">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body">
                            <h5 class="card-title text-primary">
                                <i class="fas fa-briefcase"></i> Profesión
                            </h5>
                            <p class="card-text">
                                Ejerco mi profesión como Tecnólogo con el objetivo de superarme continuamente.
                                Responsable, puntual y apasionado por la tecnología y la programación.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body">
                            <h5 class="card-title text-primary">
                                <i class="fas fa-heart"></i> Intereses
                            </h5>
                            <p class="card-text">
                                Disfruto de la tecnología, programación, deporte, música y actividades familiares.
                                Siempre en búsqueda del aprendizaje continuo.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p class="mb-0">&copy; 2026 Byron V. Ñato. Todos los derechos reservados.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="mb-0">Sitio académico para la UTPL</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS desde CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- JavaScript personalizado -->
    <script src="js/script.js"></script>
</body>
</html>
