<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>WINDSELL</title>
  <link rel="stylesheet" href="static/style/site.css" />

  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
</head>

<body>
  <nav class="navbar navbar-expand-md" style="background-color: #424242">
    <!-- Drawer Start -->
    <a class="navbar-brand" href="./home_page.php" style="color: orange"><em> &nbsp; WINDSELL SHOP</em></a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Search Bar Starts -->
      <form class="form-inline px-lg-5" novalidate method="get">
        <div class="input-group">
          <div class="input-group-prepend">
            <div class="dropdown">
              <button class="btn btn-primary dropdown-toggle" type="button" id="dropdown_categories" data-mdb-toggle="dropdown" aria-expanded="false">Tout</button>
              <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton">
                <li><a class="dropdown-item" id="all">Tout</a></li>
                <li><a class="dropdown-item" id="Eoliennes">Eoliennes</a></li>
                <li><a class="dropdown-item" id="Panneaux solaires">Panneaux solaires (bientot)</a></li>
              </ul>
            </div>
          </div>
          <input type="text" placeholder="Search bar" id="search_bar" class="form-control" size="50>
            <div class=" input-group-append">
          <a href="" id="search_btn" type="submit" class="btn btn-warning" onclick="">
            <i class="fas fa-search"></i>
          </a>
        </div>
    </div>
    </form>
    <!-- Search Bar Ends -->
    <ul class="navbar-nav">
      <!-- User Account Starts - Dynamiser si connect?? ou pas -->

      <!-- <li class="nav-item dropdown px-2">
                <a class="nav-link" href="" id="userAccount" role="button" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-2x fa-user-circle"></i>
                </a>
            </li> -->

      <li class="nav-item dropdown px-2">
        <a class="nav-link" href="#" id="userAccount" role="button" data-mdb-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-2x fa-user-circle"></i>
        </a>
        <div class="dropdown-menu px-3" aria-labelledby="userAccount">
          <br />
          <a href="PageConnexion.php" class="dropdown-item btn btn-warning w-75 btn-sm font-weight-bold">Connexion</a>
          <br />
          <small>Nouvel utilisateur ?<a href="PageInscription2.php">
              <br />
              S'inscrire ici !</a></small>
        </div>
      </li>
      <!-- User Account Ends -->
      <!-- Shopping Cart Starts -->
      <li class="nav-item px-2">
        <a class="nav-link" href="" aria-disabled=" true">
          <i class="fas fa-2x text-light fa-shopping-cart"></i>

          <span class="badge bg-danger ms-2">0</span>
          <!-- Dynamiser ??a  -->
        </a>
      </li>
      <!-- Shopping Cart Starts -->
    </ul>
    </div>
  </nav>

  <div class="container my-5">
    <!-- Cart title start -->
    <div class="row">
      <div class="col-md-8">
        <h3>Panier d'achat</h3>
      </div>
    </div>
    <!-- Cart title ends -->

    <!-- Product list start -->
    <div class="row">
      <!-- Product Detail start -->
      <div class="col-md-8">
        <!-- Product row starts -->
        <div class="row border-top py-3">
          <!-- Product image -->
          <div class="col-md-3">
            <img src="images/eolienneTexenergy.jpg" class="img-fluid" alt="product 01 image" />
          </div>

          <!-- Product details -->
          <div class="col-md-9">
            <a href="./product.php">EOLIENNE TEXENERGY</a>
            <p class="text-uppercase font-weight-bold my-0 float-right"><span>150</span> <i class="fas fa-dollar-sign" style="font-size: 10px"></i></p>
            <p class="text-muted my-0">Vendu par : Florian</p>

            <div class="d-flex flex-row mt-2">
              <!-- Quatinty select -->
              <div class="number-input md-number-input">
                <form method="POST">
                  <input type="text" name="pid" hidden value="id product" />
                  <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="btn btn-info btn-sm" type="submit" name="decrement_quantity_btn">-</button>
                  <input class="text" min="1" name="quantity" value="1" type="number" disabled />
                  <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="btn btn-info btn-sm" type="submit" name="increment_quantity_btn">+</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- Product row ends -->

        <!-- Sub total row starts -->
        <div class="row border-top py-3">
          <div class="col-md-12">Total : 150</span> <i class="fas fa-dollar-sign" style="font-size: 10px"></i></p>
          </div>
        </div>
      </div>
      <!-- Product Detail end -->

      <!-- Proceed to buy card start -->
      <div class="col-md-4 text-center pl-md-5 pl-0">
        <div class="card my-3">
          <div class="card-header bg-transparent">
            <p class="text-center text-success my-0" style="font-size: 15px">
              <!-- <i class="fas fa-info-circle text-info"></i>
              Add ??? 17.00 of eligible items to your order to qualify for FREE Delivery. -->
              <i class="fas fa-check"></i>
              Votre commande est eligible pour la livraison gratuite !
            </p>
          </div>
          <div class="card-body text-center" style="background-color: #f3f3f3">
            <p class="font-weight-bold">
              Total: <span>150</span> <i class="fas fa-dollar-sign" style="font-size: 10px"></i>
            </p>

            <button onclick="Buy()" href="#" class="btn btn-warning btn-sm btn-block">Acheter</button>
          </div>
        </div>
      </div>
      <!-- Proceed to buy card end -->
    </div>
    <!-- Product list end -->
  </div>
  <script>
    function Buy() {
      alert("L'achat du produit a bien ??t?? effectu?? !");
    }
  </script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.js"></script>
</body>

</html>