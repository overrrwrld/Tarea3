<?php
// Inclusión de la conexión a la base de datos
require 'conexiones.php';

try {
    // Consulta para obtener títulos y publicadores
    $stmtTitulosPublicadores = $pdo->query('
        SELECT t.titulo, p.nombre_pub 
        FROM titulos t
        INNER JOIN publicadores p ON t.id_pub = p.id_pub
    ');
    // Obtener todos los registros en un arreglo asociativo
    $titulos = $stmtTitulosPublicadores->fetchAll(PDO::FETCH_ASSOC);

    $stmttitulosCantidad = $pdo->query("SELECT COUNT(*) as cantidad FROM titulos");
    $titulosCantidad = $stmttitulosCantidad->fetch(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die('Error en la consulta a la base de datos: ' . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Agency - Start Bootstrap Theme</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/index.css" rel="stylesheet"/>
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top">Librería</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="./index.php">Libros</a></li>
                        <li class="nav-item"><a class="nav-link" href="./authors.php">Autores</a></li>
                        <li class="nav-item"><a class="nav-link" href="./contact.php">Contacto</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
            <div class="masthead-subheading">Bienvenido a la Librería</div>
            <div class="masthead-heading text-uppercase">Encantados de conocerte!</div>
            </div>
        </header>
        <!-- Portfolio Grid-->
        <section class="page-section bg-light" id="portfolio">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase mb-5">Libros [<?php echo $titulosCantidad["cantidad"]; ?>]</h2>
                </div>
                <div class="row">
                    <?php foreach ($titulos as $row): ?>
                        <div class="col-lg-4 col-sm-6 mb-4">
                            <div class="portfolio-item">
                                <div class="portfolio-caption">
                                    <div class="portfolio-caption-heading">
                                        <?php echo htmlspecialchars($row['titulo']); ?>
                                    </div>
                                    <div class="portfolio-caption-subheading text-muted">
                                        <?php echo htmlspecialchars($row['nombre_pub']); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-start">Copyright &copy; Your Website 2023</div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                        <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
