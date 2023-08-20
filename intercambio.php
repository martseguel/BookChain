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
              <a href="ventas.php" class="nav-item nav-link">Vender</a>
              <a href="comprar.php" class="nav-item nav-link">Comprar</a>
              <a href="intercambio.php" class="nav-item nav-link active">Intercambiar</a>
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

  <div class="collection-sort">
    <label>Region:</label>
    <select id="filterByRegion" onchange="filterValueByRegion()">
      <option selected="selected">Todas</option>
      <option value="Metropolitana">Metropolitana</option>
      <option value="Tarapaca">Tarapacá</option>
      <option value="Antofagasta">Antofagasta</option>
      <option value="Atacama">Atacama</option>
      <option value="Coquimbo">Coquimbo</option>
      <option value="Valparaiso">Valparaiso</option>
      <option value="Ohiggins">Ohiggins</option>
      <option value="Maule">Maule</option>
      <option value="BioBio">BioBio</option>
      <option value="Araucania">Araucania</option>
      <option value="Lagos">Los Lagos</option>
      <option value="Aysen">Aysen</option>
      <option value="Magallanes">Magallanes</option>
      <option value="Rios">Los Rios</option>
      <option value="Arica">Arica y Parinacota</option>
      <option value="Ñuble">Ñuble</option>
    </select>
  </div>
  <div class="collection-sort">
    <label>Ciudad:</label>
    <select id="filterByCiudad" onchange="changeOptionFilterByCiudad()">
      <option selected="selected">Todas</option>
    </select>
  </div>
  <script>
    function filterValueByRegion() {
      const selectValue = document.getElementById("filterByRegion").value;
      const acceptedValues = [
        "Metropolitana",
        "Tarapaca",
        "Antofagasta",
        "Atacama",
        "Coquimbo",
        "Valparaiso",
        "Ohiggins",
        "Maule",
        "BioBio",
        "Araucania",
        "Lagos",
        "Aysen",
        "Magallanes",
        "Rios",
        "Arica",
        "Ñuble",
      ];
      const productCards = document.querySelectorAll(".card");
      if (acceptedValues.includes(selectValue)) {
        changeFilterByCiudad(selectValue);
      }
      productCards.forEach((card) => {
        if (acceptedValues.includes(selectValue)) {
          if (card.classList.contains(selectValue)) {
            card.style.display = "block";
          } else {
            card.style.display = "none";
          }
        } else {
          //Todas
          card.style.display = "block";
          changeFilterByCiudad("Todas");
        }
      });
    }

    function changeFilterByCiudad(option) {
      selectBox = document.getElementById("filterByCiudad");
      while (selectBox.options.length > 0) {
        selectBox.remove(0);
      }
      selectBox.add(new Option("Todas", "Todas"), undefined);
      switch (option) {
        case "Metropolitana":
          selectBox.add(new Option("Las Condes", "LasCondes"), undefined);
          selectBox.add(new Option("Vitacura", "Vitacura"), undefined);
          break;
        case "Tarapaca":
          selectBox.add(new Option("Iquique", "Iquique"), undefined);
          break;
        case "Antofagasta":
          selectBox.add(new Option("Antofagasta", "Antofagasta"), undefined);
          break;
        case "Atacama":
          selectBox.add(new Option("Copiapó", "Copiapo"), undefined);
          break;
        case "Coquimbo":
          selectBox.add(new Option("La Serena", "LaSerena"), undefined);
          break;
        case "Valparaiso":
          selectBox.add(new Option("Valparaíso", "Valparaiso"), undefined);
          break;
        case "Ohiggins":
          selectBox.add(new Option("Rancagua", "Rancagua"), undefined);
          break;
        case "Maule":
          selectBox.add(new Option("Talca", "Talca"), undefined);
          break;
        case "BioBio":
          selectBox.add(new Option("Concepción", "Concepcion"), undefined);
          selectBox.add(new Option("Los Angeles", "LosAngeles"), undefined);
          break;
        case "Araucania":
          selectBox.add(new Option("Temuco", "Temuco"), undefined);
          break;
        case "Lagos":
          selectBox.add(new Option("Puerto Montt", "PuertoMontt"), undefined);
          break;
        case "Aysen":
          selectBox.add(new Option("Coyhaique", "Coyhaique"), undefined);
          break;
        case "Magallanes":
          selectBox.add(new Option("Punta Arenas", "PuntaArenas"), undefined);
          break;
        case "Rios":
          selectBox.add(new Option("Valdivia", "Valdivia"), undefined);
          break;
        case "Arica":
          selectBox.add(new Option("Arica", "Arica"), undefined);
          break;
        case "Ñuble":
          selectBox.add(new Option("Chillán", "Chillan"), undefined);
          break;
      }
    }

    function changeOptionFilterByCiudad() {
      const selectValue = document.getElementById("filterByCiudad").value;
      const productCards = document.querySelectorAll(".card");
      productCards.forEach((card) => {
        if (selectValue != "Todas") {
          if (card.classList.contains(selectValue)) {
            card.style.display = "block";
          } else {
            card.style.display = "none";
          }
        } else {
          if (
            card.classList.contains(
              document.getElementById("filterByRegion").value
            )
          ) {
            card.style.display = "block";
          }
        }
      });
    }
  </script>

  <div class="container d-flex justify-content-center mt-50 mb-50">
    <div class="row">
      <div class="col-md-10">
        <!-- Aqui va el codigo php que saca los libros de la base de datos
              * Paginacion pendiente -->
        <div class="card card-body mt-3 Metropolitana Vitacura" style="min-width: 50em">
          <div class="media align-items-center align-items-lg-start text-center text-lg-left flex-column flex-lg-row">
            <div class="mr-2 mb-3 mb-lg-0">
              <img src="img/book1.jpg" width="150" height="150" alt="" />
            </div>

            <div class="media-body">
              <h6 class="media-title font-weight-semibold">
                <a href="#" data-abc="true">Libro 1</a>
              </h6>

              <ul class="list-inline list-inline-dotted mb-3 mb-lg-2">
                <li class="list-inline-item">
                  <a href="#" class="text-muted" data-abc="true">Metropolitana</a>
                </li>
                <li class="list-inline-item">
                  <a href="#" class="text-muted" data-abc="true">Vitacura</a>
                </li>
              </ul>

              <p class="mb-3">Autor: Juanito</p>

              <ul class="list-inline list-inline-dotted mb-0">
                <li class="list-inline-item">
                  Añadir a <a href="#" data-abc="true">Favoritos</a>
                </li>
              </ul>
            </div>

            <div class="mt-3 mt-lg-4 ml-lg-3 text-center">
              <h3 class="mb-0 font-weight-semibold">$9.990</h3>

              <form method="post" action="inbuilding.php">
                <button type="button" class="btn btn-intercambio mt-4 text-white">
                  <i class="icon-cart-add mr-2"></i> Intercambiar
                </button>
              </form>
            </div>
          </div>
        </div>

        <div class="card card-body mt-3 BioBio Concepcion" style="min-width: 50em">
          <div class="media align-items-center align-items-lg-start text-center text-lg-left flex-column flex-lg-row">
            <div class="mr-2 mb-3 mb-lg-0">
              <img src="img/book1.jpg" width="150" height="150" alt="" />
            </div>

            <div class="media-body">
              <h6 class="media-title font-weight-semibold">
                <a href="#" data-abc="true">Libro 2</a>
              </h6>

              <ul class="list-inline list-inline-dotted mb-3 mb-lg-2">
                <li class="list-inline-item">
                  <a href="#" class="text-muted" data-abc="true">BioBio</a>
                </li>
                <li class="list-inline-item">
                  <a href="#" class="text-muted" data-abc="true">Concepcion</a>
                </li>
              </ul>

              <p class="mb-3">Autor: Juanito</p>

              <ul class="list-inline list-inline-dotted mb-0">
                <li class="list-inline-item">
                  Añadir a <a href="#" data-abc="true">Favoritos</a>
                </li>
              </ul>
            </div>

            <div class="mt-3 mt-lg-4 ml-lg-3 text-center">
              <h3 class="mb-0 font-weight-semibold">$9.990</h3>

              <form method="post" action="inbuilding.php">
                <button type="button" class="btn btn-intercambio mt-4 text-white">
                  <i class="icon-cart-add mr-2"></i> Intercambiar
                </button>
              </form>
            </div>
          </div>
        </div>

        <div class="card card-body mt-3 Metropolitana LasCondes" style="min-width: 50em">
          <div class="media align-items-center align-items-lg-start text-center text-lg-left flex-column flex-lg-row">
            <div class="mr-2 mb-3 mb-lg-0">
              <img src="img/book1.jpg" width="150" height="150" alt="" />
            </div>

            <div class="media-body">
              <h6 class="media-title font-weight-semibold">
                <a href="#" data-abc="true">Libro 3</a>
              </h6>

              <ul class="list-inline list-inline-dotted mb-3 mb-lg-2">
                <li class="list-inline-item">
                  <a href="#" class="text-muted" data-abc="true">Metropolitana</a>
                </li>
                <li class="list-inline-item">
                  <a href="#" class="text-muted" data-abc="true">Las Condes</a>
                </li>
              </ul>

              <p class="mb-3">Autor: Juanito</p>

              <ul class="list-inline list-inline-dotted mb-0">
                <li class="list-inline-item">
                  Añadir a <a href="#" data-abc="true">Favoritos</a>
                </li>
              </ul>
            </div>

            <div class="mt-3 mt-lg-4 ml-lg-3 text-center">
              <h3 class="mb-0 font-weight-semibold">$9.990</h3>

              <form method="post" action="inbuilding.php">
                <button type="button" class="btn btn-intercambio mt-4 text-white">
                  <i class="icon-cart-add mr-2"></i> Intercambiar
                </button>
              </form>
            </div>
          </div>
        </div>

        <div class="card card-body mt-3 BioBio LosAngeles" style="min-width: 50em">
          <div class="media align-items-center align-items-lg-start text-center text-lg-left flex-column flex-lg-row">
            <div class="mr-2 mb-3 mb-lg-0">
              <img src="img/book1.jpg" width="150" height="150" alt="" />
            </div>

            <div class="media-body">
              <h6 class="media-title font-weight-semibold">
                <a href="#" data-abc="true">Libro 4</a>
              </h6>

              <ul class="list-inline list-inline-dotted mb-3 mb-lg-2">
                <li class="list-inline-item">
                  <a href="#" class="text-muted" data-abc="true">BioBio</a>
                </li>
                <li class="list-inline-item">
                  <a href="#" class="text-muted" data-abc="true">Los Angeles</a>
                </li>
              </ul>

              <p class="mb-3">Autor: Juanito</p>

              <ul class="list-inline list-inline-dotted mb-0">
                <li class="list-inline-item">
                  Añadir a <a href="#" data-abc="true">Favoritos</a>
                </li>
              </ul>
            </div>

            <div class="mt-3 mt-lg-4 ml-lg-3 text-center">
              <h3 class="mb-0 font-weight-semibold">$9.990</h3>

              <form method="post" action="inbuilding.php">
                <button type="button" class="btn btn-intercambio mt-4 text-white">
                  <i class="icon-cart-add mr-2"></i> Intercambiar
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

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