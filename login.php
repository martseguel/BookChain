<?php include('server.php') ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>BookChain | Project</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <link href="img/favicon.ico" rel="icon" />

    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&family=Roboto:wght@300;500;700&display=swap" rel="stylesheet" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />

    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <link href="css/style.css" rel="stylesheet" />
</head>

<body>

    <div class="container-fluid py-5">
        <div class="container">
            <div class="bg-appointment rounded">
                <div class="row h-100 align-items-center justify-content-center">
                    <div class="col-lg-6 py-5">
                        <h1 class="text-center text-white mb-4">BookChain</h1>
                        <form method="post" action="login.php">
                            <?php include('errors.php'); ?>
                            <div class="form-group">
                                <input type="text" class="form-control border-0 p-4" placeholder="Correo" required="required" name="correo"/>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control border-0 p-4" placeholder="Contraseña" required="required" name="password"/>
                                <a href="#"><span>Olvidé mi contraseña</span></a>
                            </div>

                            <div>
                                <button class="btn btn-primary btn-block border-0 py-3" type="submit" name="login_user">
                                    Iniciar sesion
                                </button>
                            </div>
                            <div class="form-group">
                                <a href="register.php"><span>¿Aun no tienes cuenta? Registrate acá!</span></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>