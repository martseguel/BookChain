<?php
session_start();
if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['username']);
  header("location: index.php");
}
?>

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
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-3 d-none d-lg-block logo-background">
        <a href="index.php" class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
          <h1 class="m-0 display-4 text-white text-uppercase text-logo">
            BookChain
          </h1>
        </a>
      </div>
      <div class="col-lg-9">
        <div class="row bg-white border-bottom d-none d-lg-flex">
          <div class="col-lg-7 text-left">
            <div class="h-100 d-inline-flex align-items-center py-2 px-3">
              <i class="fa fa-envelope text-primary mr-2"></i>
              <small>info@bookchain.cl</small>
            </div>
            <div class="h-100 d-inline-flex align-items-center py-2 px-2">
              <i class="fa fa-phone-alt text-primary mr-2"></i>
              <small>+56 951 970 995</small>
            </div>
          </div>
          <!-- login & register START -->
          <div class="col-lg-5 text-right">
            <?php if (!isset($_SESSION['nombre'])) : ?>
              <div class="d-inline-flex align-items-center p-2">
                <a class="btn btn-outline-primary" href="login.php">
                  <span>Iniciar sesion</span>
                </a>
              </div>

              <div class="d-inline-flex align-items-center p-2">
                <a class="btn btn-outline-primary" href="register.php">
                  <span>Registrarse</span>
                </a>
              </div>
            <?php endif ?>
            <?php if (isset($_SESSION['nombre'])) : ?>
              <div class="d-inline-flex align-items-center p-2">
                <a class="btn btn-outline-primary" href="inBuilding.php">
                  <span>Mi perfil</span>
                </a>
                <a class="btn btn-outline-primary ml-2" href="index.php?logout='1'">Salir</a>
              </div>
            <?php endif ?>
          </div>
          <!--login & register End-->
        </div>

        <nav class="navbar navbar-expand-lg bg-white navbar-light p-0">
          <a href="index.php" class="navbar-brand d-block d-lg-none">
            <h1 class="m-0 display-4 text-primary text-uppercase">
              BookChain
            </h1>
          </a>
          <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
            <div class="navbar-nav mr-auto py-0">
              <a href="index.php" class="nav-item nav-link active">Inicio</a>
              <a href="ventas.php" class="nav-item nav-link">Vender</a>
              <a href="comprar.php" class="nav-item nav-link">Comprar</a>
              <a href="intercambio.php" class="nav-item nav-link">Intercambiar</a>
              <a href="contact.php" class="nav-item nav-link">Contactar</a>
            </div>
            <div class="col-lg-5 text-right">
              <div class="d-inline-flex align-items-center p-2">
                <a class="btn btn-sm btn-outline-primary btn-lg-square mr-2" href="https://www.facebook.com/">
                  <i class="fab fa-facebook-f"></i>
                </a>
                <a class="btn btn-sm btn-outline-primary btn-lg-square mr-2" href="https://twitter.com/">
                  <i class="fab fa-twitter"></i>
                </a>
                <a class="btn btn-sm btn-outline-primary btn-lg-square mr-2" href="https://www.instagram.com/">
                  <i class="fab fa-instagram"></i>
                </a>
                <a class="btn btn-sm btn-outline-primary btn-lg-square mr-2" href="https://www.youtube.com/">
                  <i class="fab fa-youtube"></i>
                </a>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </div>
  </div>
  <!-- Header End -->

  <!-- Carousel Start -->
  <div class="container-fluid p-0 mb-5 pb-5">
    <div id="header-carousel" class="carousel slide carousel-fade" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item position-relative active" style="height: 100vh; min-height: 400px">
          <img class="position-absolute w-100 h-100" src="img/carousel-1.jpg" style="object-fit: cover" />
          <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
            <div class="p-3" style="max-width: 900px">
              <h3 class="display-2 text-capitalize text-white mb-4">
                Compra tu <br />proximo libro
              </h3>
              <a class="btn btn-primary py-3 px-5 mt-2" href="comprar.php">Compra aquí</a>
            </div>
          </div>
        </div>
        <div class="carousel-item position-relative" style="height: 100vh; min-height: 400px">
          <img class="position-absolute w-100 h-100" src="img/carousel-2.jpg" style="object-fit: cover" />
          <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
            <div class="p-3" style="max-width: 900px">
              <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px">
                Si ya leiste tu libro
              </h4>
              <h3 class="display-2 text-capitalize text-white mb-4">
                Vendelo aquí
              </h3>
              <a class="btn btn-primary py-3 px-5 mt-2" href="ventas.php">Vender</a>
            </div>
          </div>
        </div>
        <div class="carousel-item position-relative" style="height: 100vh; min-height: 400px">
          <img class="position-absolute w-100 h-100" src="img/carousel-3.jpg" style="object-fit: cover" />
          <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
            <div class="p-3" style="max-width: 900px">
              <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px">
                Si ya leiste tu libro<br />y quieres leer otro
              </h4>
              <h3 class="display-2 text-capitalize text-white mb-4">
                ¡Intercambialo!
              </h3>
              <a class="btn btn-primary py-3 px-5 mt-2" href="intercambio.php">Intercambia aquí</a>
            </div>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
        <div class="btn btn-lg btn-secondary btn-lg-square">
          <span class="carousel-control-prev-icon"></span>
        </div>
      </a>
      <a class="carousel-control-next" href="#header-carousel" data-slide="next">
        <div class="btn btn-lg btn-secondary btn-lg-square">
          <span class="carousel-control-next-icon"></span>
        </div>
      </a>
    </div>
  </div>
  <!-- Carousel End -->

  <!-- Appointment Start -->
  <div class="container-fluid py-5">
    <div class="container py-5">
      <div class="bg-appointment rounded">
        <div class="row h-100 align-items-center justify-content-center">
          <div class="col-lg-6 py-5">
            <div class="rounded p-5 my-5" style="background: rgba(55, 55, 63, 0.7)">
              <h1 class="text-center text-white mb-4">
                ¿Tienes alguna duda?
              </h1>
              <form method="post" action="inBuilding.php">
                <div class="form-group">
                  <input type="text" class="form-control border-0 p-4" placeholder="Tu nombre" required="required" <?php if (isset($_SESSION['nombre'])) : ?> value="<?php echo ($_SESSION['nombre']) ?> " <?php endif ?> />
                </div>
                <div class="form-group">
                  <input type="email" class="form-control border-0 p-4" placeholder="Tu correo" required="required" <?php if (isset($_SESSION['nombre'])) : ?> value="<?php echo ($_SESSION['correo']) ?> " <?php endif ?> />
                </div>
                <div class="form-group">
                  <select class="custom-select border-0 px-4" style="height: 47px">
                    <option selected>Selecciona el motivo</option>
                    <option value="1">Tengo un problema comprando</option>
                    <option value="2">Tengo un problema vendiendo</option>
                    <option value="3">
                      Tengo un problema intercambiando
                    </option>
                    <option value="4">Otro</option>
                  </select>
                </div>
                <div>
                  <button class="btn btn-primary btn-block border-0 py-3" type="submit">
                    Contactar
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Appointment End -->

  <!-- Footer Start -->
  <div class="container-fluid bg-secondary text-white pt-5 px-sm-3 px-md-5" style="margin-top: 90px">
    <div class="row mt-5">
      <div class="col-lg-4">
        <div class="d-flex justify-content-lg-center p-4" style="background: rgba(256, 256, 256, 0.05)">
          <i class="fa fa-2x fa-map-marker-alt text-primary"></i>
          <div class="ml-3">
            <h5 class="text-white">Oficinas</h5>
            <p class="m-0">Las Condes, Santiago, Chile</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="d-flex justify-content-lg-center p-4" style="background: rgba(256, 256, 256, 0.05)">
          <i class="fa fa-2x fa-envelope-open text-primary"></i>
          <div class="ml-3">
            <h5 class="text-white">Contactanos</h5>
            <p class="m-0">info@bookchain.cl</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="d-flex justify-content-lg-center p-4" style="background: rgba(256, 256, 256, 0.05)">
          <i class="fa fa-2x fa-phone-alt text-primary"></i>
          <div class="ml-3">
            <h5 class="text-white">LLamanos</h5>
            <p class="m-0">+56 951 970 995</p>
          </div>
        </div>
      </div>
    </div>
    <div class="row pt-5">
      <div class="col-lg-3 col-md-6 mb-5">
        <a href="index.php" class="navbar-brand">
          <h1 class="m-0 mt-n2 display-4 text-primary text-uppercase">
            BookChain
          </h1>
        </a>
        <p>
          Plataforma para intercambio y compra/venta de libros por regiones de
          Chile
        </p>
        <div class="d-flex justify-content-start mt-4">
          <a class="btn btn-lg btn-outline-light btn-lg-square mr-2" href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
          <a class="btn btn-lg btn-outline-light btn-lg-square mr-2" href="https://facebook.com/"><i class="fab fa-facebook-f"></i></a>
          <a class="btn btn-lg btn-outline-light btn-lg-square mr-2" href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a>
          <a class="btn btn-lg btn-outline-light btn-lg-square" href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 mb-5">
        <h4 class="font-weight-semi-bold text-primary mb-4">Links</h4>
        <div class="d-flex flex-column justify-content-start">
          <a class="text-white mb-2" href="index.php"><i class="fa fa-angle-right mr-2"></i>Inicio</a>
          <a class="text-white mb-2" href="ventas.php"><i class="fa fa-angle-right mr-2"></i>Vender</a>
          <a class="text-white mb-2" href="comprar.php"><i class="fa fa-angle-right mr-2"></i>Comprar</a>
          <a class="text-white mb-2" href="intercambio.php"><i class="fa fa-angle-right mr-2"></i>Intercambiar</a>
          <a class="text-white" href="contact.php"><i class="fa fa-angle-right mr-2"></i>Contactar</a>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 mb-5"></div>
      <div class="col-lg-3 col-md-6 mb-5">
        <h4 class="font-weight-semi-bold text-primary mb-4">Noticias</h4>
        <p>
          Suscribete gratis a nuestras actualizaciones y noticias para estar
          al dia!
        </p>
        <div class="w-100">
          <div class="input-group">
            <form method="post" action="inbuilding.php">
              <input type="text" class="form-control border-0" style="padding: 25px" placeholder="Tu correo" <?php if (isset($_SESSION['nombre'])) : ?> value="<?php echo ($_SESSION['correo']) ?> " <?php endif ?> />
              <div class="input-group-append">
                <button type="submit" class="btn btn-primary px-4">Ir</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="row p-4 mt-5 mx-0" style="background: rgba(256, 256, 256, 0.05)">
      <div class="col-md-6 text-center text-md-left mb-3 mb-md-0">
        <p class="m-0 text-white">
          &copy; <a class="font-weight-bold" href="#">2022 BookChain</a>.
          Derechos reservados.
        </p>
      </div>
      <div class="col-md-6 text-center text-md-right">
        <p class="m-0 text-white">
          Designed by
          <a class="font-weight-bold" href="https://github.com/martseguel">Martin Seguel</a>
        </p>
      </div>
    </div>
  </div>
  <!-- Footer End -->

  <!-- Back to Top -->
  <a href="#" class="btn btn-primary px-3 back-to-top"><i class="fa fa-angle-double-up"></i></a>

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