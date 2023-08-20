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
              <a href="index.php" class="nav-item nav-link ">Inicio</a>
              <a href="ventas.php" class="nav-item nav-link active">Vender</a>
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

  <!-- Appointment Start -->
  <div class="container-fluid py-5">
    <div class="container py-5">
      <div class="bg-appointment rounded">
        <div class="row h-100 align-items-center justify-content-center">
          <div class="col-lg-6 py-5">
            <h1 class="text-center text-white mb-4">Publica tu libro</h1>
            <form method="post" action="inbuilding.php">
              <div class="form-group">
                <input type="text" class="form-control border-0 p-4" placeholder="Tu nombre" required="required" <?php if (isset($_SESSION['nombre'])) : ?> value="<?php echo ($_SESSION['nombre']) ?> " <?php endif ?> />
              </div>
              <div class="form-group">
                <input type="email" class="form-control border-0 p-4" placeholder="Tu correo" required="required" <?php if (isset($_SESSION['nombre'])) : ?> value="<?php echo ($_SESSION['correo']) ?> " <?php endif ?> />
              </div>
              <div class="form-group">
                <input type="text" class="form-control border-0 p-4" placeholder="Titulo" required="required" />
              </div>
              <div class="form-group">
                <input type="text" class="form-control border-0 p-4" placeholder="Autor" required="required" />
              </div>
              <div class="form-group">
                <label style="
                      background-color: white;
                      padding: 9px;
                      border-radius: 5px;
                    ">Imagen</label>
                <label for="file-upload" class="custom-file-upload">
                  <i class="fa fa-cloud-upload"></i> Subir imagen
                </label>
                <input id="file-upload" type="file" />
              </div>

              <div class="form-group">
                <select class="custom-select border-0 px-4" style="height: 47px">
                  <option selected>Categoria</option>
                  <option value="ArteFotografia">Arte y Fotografia</option>
                  <option value="Astronomia">Astronomia</option>
                  <option value="Autoayuda">Autoayuda</option>
                  <option value="Espiritualidad">Espiritualidad</option>
                  <option value="Cálculo">Cálculo</option>
                  <option value="Ciencia">Ciencia</option>
                  <option value="Cuentos">Cuentos</option>
                  <option value="DerechoyPolitica">Derecho y Política</option>
                  <option value="Diccionarios ">Diccionarios</option>
                  <option value="Economia">Economía</option>
                  <option value="Escolares">Escolares</option>
                  <option value="Esotericos">Esotericos</option>
                  <option value="Astronomia">Astronomia</option>
                  <option value="Filosofía">Filosofía</option>
                  <option value="Finanzas">Finanzas</option>
                  <option value="Física">Física</option>
                  <option value="Geografía">Geografía</option>
                  <option value="Historia">Historia</option>
                  <option value="Informática">Informática</option>
                  <option value="Literatura">Literatura</option>
                  <option value="Matemáticas">Matemáticas</option>
                </select>
              </div>

              <div class="form-group">
                <input type="checkbox" id="cbox-venta" value="cbox-venta" />
                <label style="
                      background-color: white;
                      padding: 9px;
                      border-radius: 5px;
                    ">Publicar para venta
                </label>
                <script>
                  const checkbox = document.getElementById("cbox-venta");

                  checkbox.addEventListener("change", (event) => {
                    if (event.currentTarget.checked) {
                      document.getElementById("priceDiv").style.display = "block";
                    } else {
                      document.getElementById("priceDiv").style.display = "none";
                    }
                  });
                </script>
              </div>

              <div class="form-group" style="display: none" id="priceDiv">
                <input type="number" class="form-control border-0 p-4" placeholder="Precio" required="required" />
              </div>

              <div class="form-group">
                <input type="checkbox" id="cbox-venta" value="cbox-venta" />
                <label style="
                      background-color: white;
                      padding: 9px;
                      border-radius: 5px;
                    ">Publicar para Intercambio</label>
              </div>

              <div>
                <button class="btn btn-primary btn-block border-0 py-3" type="submit">
                  Publicar
                </button>
              </div>
            </form>
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