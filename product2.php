<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Your market</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css" rel="stylesheet" />
  </head>

  <body>
    <nav class="navbar navbar-expand-md" style="background-color: #424242">
      <!-- Drawer Start -->
      <a class="navbar-brand" href="./home_page.php" style="color: orangered"><em> &nbsp; WINDSELL</em></a>

      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
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
                  <li><a class="dropdown-item" id="All">Tout</a></li>
                  <li><a class="dropdown-item" id="Eoliennes">Eoliennes</a></li>
                  <li><a class="dropdown-item" id="Solar panels (coming soon)">Panneaux solaires (bientot)</a></li>
                </ul>
              </div>
            </div>
            <input type="text" placeholder="Search bar" id="search_bar" class="form-control" size="50>
            <div class="input-group-append">
              <a href="" id="search_btn" type="submit" class="btn btn-warning" onclick="">
                <i class="fas fa-search"></i>
              </a>
            </div>
          </div>
        </form>
        <!-- Search Bar Ends -->
        <ul class="navbar-nav">
          <!-- User Account Starts - Dynamiser si connecté ou pas -->

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
              <a href="" class="dropdown-item btn btn-warning w-75 btn-sm font-weight-bold">Se connecter</a>
              <br />
              <small
                >Nouvel utilisateur ?<a href="">
                  <br />
                  Inscrivez-vous ici !.</a
                ></small
              >
            </div>
          </li>
          <!-- User Account Ends -->
          <!-- Shopping Cart Starts -->
          <li class="nav-item px-2">
            <a class="nav-link" href="" aria-disabled=" true">
              <i class="fas fa-2x text-light fa-shopping-cart"></i>

              <span class="badge bg-danger ms-2">0</span>
              <!-- Dynamiser ça  -->
            </a>
          </li>
          <!-- Shopping Cart Starts -->
        </ul>
      </div>
    </nav>

    <div class="container my-5">
      <!-- Top Page Design Starts -->
      <div class="row">
        <!-- Image Select Button starts  -->
        <div class="col-md-1">
          <button class="btn btn-sm bg-transparent">
            <img width="45px" src="images/eolienneGenerateur2.jpg" alt="btn image" />
          </button>
          <button class="btn btn-sm bg-transparent">
            <img width="45px" src="images/eolienneGenerateur3.jpg" alt="btn image" />
          </button>
          <button class="btn btn-sm bg-transparent">
            <img width="45px" src="images/eolienneGenerateur4.jpg" alt="btn image" />
          </button>
          <button class="btn btn-sm bg-transparent">
            <img width="45px" src="images/eolienneGenerateur5.jpg" alt="btn image" />
          </button>
        </div>
        <!-- Image Select Button Ends  -->

        <!-- Product Image Starts -->
        <div class="col-md-3">
          <img
            src="images/eolienneGenerateur.jpg"
            class="img-fluid"
            alt="product image"
          />
        </div>
        <!-- Product Image Ends -->

        <!-- Product Details Starts -->
        <div class="col-md-4">
          <h8><strong>Vendeur :</strong> <em>Florian</em> </h8>
          <h6 class="font-weight-bold">EOLIENNE 300W</h6>
          <p>
            <i class="fas fa-star text-warning"></i>
            <i class="fas fa-star text-warning"></i>
            <i class="fas fa-star text-warning"></i>
            <i class="far fa-star text-warning"></i>
            <i class="far fa-star text-warning"></i>
            &nbsp; 2 Avis
          </p>

          <div class="dropdown-divider mt-3"></div>
          <p class="mb-0">
            <span class="text-muted mr-2">Prix :</span>
            <span class="text-danger font-weight-bold">2000 &nbsp;<i class="fas fa-dollar-sign"></i></span>

            <br />
            <span class="text-muted mr-2">Auteur :</span>
            <span class="text-danger font-weight-bold"> WINDSELL&nbsp; <i class="fas fa-user"></i> </span>
            <br />
          </p>
          <div class="dropdown-divider mt-3"></div>

          <!-- Delivery Quality Images starts -->
          <div class="row" style="font-size: 12px; font-weight: bold">
            <div class="form-group">
              <form method="POST" action="./shopping_cart.php">
                <button class="btn btn-warning btn-sm mt-3" type="submit" name="add_to_cart_btn">
                  <i class="fas fa-cart-plus float-left text-primary" style="font-size: 25px; width: 80px"></i>
                  Ajouter à la carte
                </button>
                &nbsp; &nbsp;
              </form>
            </div>

            <div class="dropdown-divider"></div>
            <a href="#">
              <i class="fas fa-map-marker-alt text-dark"></i>
              Selectionner le lieu de livraison
            </a>
          </div>
          <!-- Product Details Starts -->
        </div>
        <!-- Top Page Design Ends -->

        <div class="row border-bottom mt-3">
          <div class="col-md-12 my-3">
            <h6 class="text-warning font-weight-bold">Description du produit</h6>
            <p class="ml-3">Informations techniques : </p>
            <p> Max Power : 100W </p>
            <p> Couleur : blanc, rouge et vert </p>
            <p> Tension nominale : 12V </p>
            <p> Nombre de feuilles : 3 pieces </p>
            <p> Méthode de freinage : électromagnétique </p>
          </div>
        </div>

        <!-- Customer Review starts -->
        <div class="row my-5">
          <div class="col-md-4">
            <p class="text-capitalize font-weight-bold">AVIS </p>
            <a class="btn btn-sm bg-transparent" href="">
              <i class="fas fa-star" style="color: #ffa41c"></i>
              <i class="fas fa-star" style="color: #ffa41c"></i>
              <i class="fas fa-star" style="color: #ffa41c"></i>
              <i class="fas fa-star" style="color: #ffa41c"></i>
              <i class="fas fa-star" style="color: #ffa41c"></i>
            </a>
            <br />
            <a class="btn btn-sm bg-transparent" href="">
              <i class="fas fa-star" style="color: #ffa41c"></i>
              <i class="fas fa-star" style="color: #ffa41c"></i>
              <i class="fas fa-star" style="color: #ffa41c"></i>
              <i class="fas fa-star" style="color: #ffa41c"></i>
              <i class="far fa-star" style="color: #ffa41c"></i>
            </a>
            <br />
            <a class="btn btn-sm bg-transparent" href="">
              <i class="fas fa-star" style="color: #ffa41c"></i>
              <i class="fas fa-star" style="color: #ffa41c"></i>
              <i class="fas fa-star" style="color: #ffa41c"></i>
              <i class="far fa-star" style="color: #ffa41c"></i>
              <i class="far fa-star" style="color: #ffa41c"></i>
            </a>
            <br />
            <a class="btn btn-sm bg-transparent" href="">
              <i class="fas fa-star" style="color: #ffa41c"></i>
              <i class="fas fa-star" style="color: #ffa41c"></i>
              <i class="far fa-star" style="color: #ffa41c"></i>
              <i class="far fa-star" style="color: #ffa41c"></i>
              <i class="far fa-star" style="color: #ffa41c"></i>
            </a>
            <br />
            <a class="btn btn-sm bg-transparent" href="">
              <i class="fas fa-star" style="color: #ffa41c"></i>
              <i class="far fa-star" style="color: #ffa41c"></i>
              <i class="far fa-star" style="color: #ffa41c"></i>
              <i class="far fa-star" style="color: #ffa41c"></i>
              <i class="far fa-star" style="color: #ffa41c"></i>
            </a>
            <br />
          </div>

          <div class="col-md-8">
            <div class="row">
              <div class="col-md-12">
                <span class="text-dark" style="text-decoration: none">ENTREPRISE 1</span>
                <p class="font-weight-bold mt-2">
                  <i class="fas fa-star text-warning"></i>
                  <i class="fas fa-star text-warning"></i>
                  <i class="fas fa-star text-warning"></i>
                  <i class="fas fa-star text-warning"></i>

                  <i class="far fa-star text-warning"></i>
                </p>
                <p>L'éolienne est très ergonomique ! </p>
              </div>
              <div class="dropdown-divider mt-3"></div>
              <div class="col-md-12">
                <span class="text-dark" style="text-decoration: none">Entreprise 2</span>
                <p class="font-weight-bold mt-2">
                  <i class="fas fa-star text-warning"></i>
                  <i class="fas fa-star text-warning"></i>
                  <i class="fas fa-star text-warning"></i>

                  <i class="far fa-star text-warning"></i>
                  <i class="far fa-star text-warning"></i>
                </p>
                <p>Le produit est correct, mais le rendement est insuffisant pour notre société !</p>
              </div>
            </div>

            <div class="dropdown-divider mt-3"></div>
          </div>
        </div>
        <!-- Customer Review ends -->
      </div>
    </div>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

    <script>
      let selected = 'all';

      $(document).keypress(function (event) {
        if (event.which == '13') {
          event.preventDefault();
        }
      });

      $('ul li').click(function (event) {
        $('#dropdown_categories').html(event.target.id);
        selected = event.target.id;
      });
      $('#search_btn').click(function (event) {
        $('#search_btn').attr('href', '#');
      });
    </script>
  </body>
</html>
