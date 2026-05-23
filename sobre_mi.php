<?php
require_once 'funciones_sesion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre Mí - Byron V. Ñato</title>
    
    <!-- Bootstrap CSS desde CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome para iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- CSS personalizado -->
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <?php include 'nav.php'; ?>

    <!-- Encabezado de la página -->
    <section class="page-header bg-gradient py-5">
        <div class="container">
            <h1 class="display-5 fw-bold text-white mb-3">Conoce más sobre mí</h1>
            <p class="lead text-light">Descubre mis intereses, hobbies y pasiones</p>
        </div>
    </section>

    <!-- Contenido principal -->
    <main class="py-5">
        <div class="container">
            <!-- Sección de Biografía -->
            <section class="mb-5">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <img src="img/perfil.jpeg" 
                             alt="Byron V. Ñato - Perfil Profesional" class="img-fluid rounded shadow">
                    </div>
                    <div class="col-lg-6 ps-lg-4 mt-4 mt-lg-0">
                        <h2 class="section-title text-primary mb-4">Mi Historia</h2>
                        <p class="text-muted mb-3">
                            Soy Byron, un profesional apasionado por la tecnología y la innovación. 
                            Nacido y criado en Ecuador, específicamente en Sangolquí, he dedicado mi carrera 
                            al desarrollo tecnológico.
                        </p>
                        <p class="text-muted mb-3">
                            Con 28 años, he trabajado como Tecnólogo en Electrónica, pero mi verdadera pasión 
                            me llevó a perseguir un sueño más ambicioso: la Ingeniería en Tecnologías de la Información. 
                            Actualmente soy estudiante en la UTPL, combinando mis experiencias previas con nuevos conocimientos.
                        </p>
                        <p class="text-muted">
                            Soy una persona responsable, puntual y comprometida con el crecimiento continuo. 
                            Mi familia, especialmente mi esposa Iveth y mi hijo Abraham, son mi motivación principal.
                        </p>
                    </div>
                </div>
            </section>

            <hr class="my-5">

            <!-- Sección de Hobbies e Intereses -->
            <section class="mb-5">
                <h2 class="section-title text-primary text-center mb-5">Hobbies e Intereses</h2>
                
                <div class="row g-4">
                    <!-- Tecnología y Programación -->
                    <div class="col-lg-6">
                        <div class="card h-100 shadow-sm border-0 hover-card">
                            <div class="card-body">
                                <h3 class="card-title text-primary mb-3">
                                    <i class="fas fa-laptop-code fa-2x mb-2"></i>
                                </h3>
                                <h4 class="card-title">Tecnología y Programación</h4>
                                <p class="card-text text-muted">
                                    Mi mayor pasión es el desarrollo de software. Me encanta explorar nuevas tecnologías,
                                    aprender lenguajes de programación y crear soluciones innovadoras. Desde desarrollo web
                                    hasta aplicaciones de escritorio, busco expandir constantemente mis habilidades técnicas.
                                </p>
                                <p class="small text-primary fw-bold">
                                    <i class="fas fa-check-circle"></i> HTML, CSS, JavaScript, PHP, MySQL
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Estudios y Aprendizaje -->
                    <div class="col-lg-6">
                        <div class="card h-100 shadow-sm border-0 hover-card">
                            <div class="card-body">
                                <h5 class="card-title text-primary mb-3">
                                    <i class="fas fa-book fa-2x mb-2"></i>
                                </h5>
                                <h5 class="card-title">Estudios y Aprendizaje Continuo</h5>
                                <p class="card-text text-muted">
                                    Creo firmemente en el aprendizaje de por vida. Dedico tiempo regularmente a estudiar nuevos
                                    temas, realizar cursos en línea y mantenerme actualizado con las tendencias tecnológicas.
                                    La educación es la base del progreso profesional.
                                </p>
                                <p class="small text-primary fw-bold">
                                    <i class="fas fa-check-circle"></i> Cursos, certificaciones, investigación
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Deporte -->
                    <div class="col-lg-6">
                        <div class="card h-100 shadow-sm border-0 hover-card">
                            <div class="card-body">
                                <h5 class="card-title text-primary mb-3">
                                    <i class="fas fa-running fa-2x mb-2"></i>
                                </h5>
                                <h5 class="card-title">Deporte: Correr</h5>
                                <p class="card-text text-muted">
                                    Correr es mi escape favorito. No solo es excelente para la salud física, sino que también
                                    me ayuda a mantener claridad mental y reducir el estrés. Disfruto de las mañanas o tardes
                                    corriendo por las calles de mi ciudad, en contacto con la naturaleza.
                                </p>
                                <p class="small text-primary fw-bold">
                                    <i class="fas fa-check-circle"></i> Maratones, trotadas matutinas
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Música -->
                    <div class="col-lg-6">
                        <div class="card h-100 shadow-sm border-0 hover-card">
                            <div class="card-body">
                                <h5 class="card-title text-primary mb-3">
                                    <i class="fas fa-music fa-2x mb-2"></i>
                                </h5>
                                <h5 class="card-title">Música</h5>
                                <p class="card-text text-muted">
                                    La música es mi compañera constante. Soy fanático de la música latina con sus ritmos vibrantes,
                                    el rock clásico con sus memorables guitarras, y especialmente la música de los años 80 con su
                                    nostalgia y energía. La música alimenta mi alma.
                                </p>
                                <p class="small text-primary fw-bold">
                                    <i class="fas fa-check-circle"></i> Salsa, rock, synth-pop, disco
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Familia -->
                    <div class="col-lg-6">
                        <div class="card h-100 shadow-sm border-0 hover-card">
                            <div class="card-body">
                                <h5 class="card-title text-primary mb-3">
                                    <i class="fas fa-heart fa-2x mb-2"></i>
                                </h5>
                                <h5 class="card-title">Actividades Familiares</h5>
                                <p class="card-text text-muted">
                                    Paso tiempo valioso con mi familia. Disfrutamos salir a comer en restaurantes, ver películas
                                    en el cine y compartir momentos especiales juntos. La familia es mi prioridad y mis momentos
                                    más felices son con ellos.
                                </p>
                                <p class="small text-primary fw-bold">
                                    <i class="fas fa-check-circle"></i> Cine, gastronomía, viajes
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Innovación -->
                    <div class="col-lg-6">
                        <div class="card h-100 shadow-sm border-0 hover-card">
                            <div class="card-body">
                                <h5 class="card-title text-primary mb-3">
                                    <i class="fas fa-lightbulb fa-2x mb-2"></i>
                                </h5>
                                <h5 class="card-title">Innovación y Creatividad</h5>
                                <p class="card-text text-muted">
                                    Me encanta pensar en formas nuevas y creativas de resolver problemas. Busco innovar en mis
                                    proyectos y explorar posibilidades que otros no ven. La creatividad es el puente entre
                                    la teoría y la práctica.
                                </p>
                                <p class="small text-primary fw-bold">
                                    <i class="fas fa-check-circle"></i> Proyectos personales, emprendimiento
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <hr class="my-5">

            <!-- Sección de Valores -->
            <section>
                <h2 class="section-title text-primary text-center mb-5">Mis Valores</h2>
                <div class="row">
                    <div class="col-md-6 col-lg-3 text-center mb-4">
                        <div class="value-icon mb-3">
                            <i class="fas fa-handshake text-primary" style="font-size: 2.5rem;"></i>
                        </div>
                        <h3>Responsabilidad</h3>
                        <p class="text-muted small">Compromiso con mis obligaciones y promesas</p>
                    </div>
                    <div class="col-md-6 col-lg-3 text-center mb-4">
                        <div class="value-icon mb-3">
                            <i class="fas fa-clock text-primary" style="font-size: 2.5rem;"></i>
                        </div>
                        <h4>Puntualidad</h4>
                        <p class="text-muted small">Respeto por el tiempo propio y ajeno</p>
                    </div>
                    <div class="col-md-6 col-lg-3 text-center mb-4">
                        <div class="value-icon mb-3">
                            <i class="fas fa-fire text-primary" style="font-size: 2.5rem;"></i>
                        </div>
                        <h5>Pasión</h5>
                        <p class="text-muted small">Dedicación auténtica en todo lo que hago</p>
                    </div>
                    <div class="col-md-6 col-lg-3 text-center mb-4">
                        <div class="value-icon mb-3">
                            <i class="fas fa-graduation-cap text-primary" style="font-size: 2.5rem;"></i>
                        </div>
                        <h5>Aprendizaje</h5>
                        <p class="text-muted small">Crecimiento continuo y mejora constante</p>
                    </div>
                </div>
            </section>
        </div>
    </main>

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
</body>
</html>
