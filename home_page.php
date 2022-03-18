<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>WINDSELL</title>
  <link rel="stylesheet" href="./styleboutique.css" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

</head>

<body>
  <!-- Barre de navigation -->
  <nav class="navbar navbar-expand-md" style="background-color: #424242">
    <!-- Drawer Start -->
    <a class="navbar-brand" href="./home_page.php" style="color: orangered"><em> &nbsp; WINDSELL</em></a>

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
                <li><a class="dropdown-item" id="All">Tout</a></li>
                <li><a class="dropdown-item" id="Eoliennes">Eoliennes</a></li>
                <li><a class="dropdown-item" id="Solar panels (coming soon)">Panneaux solaires (bientot)</a></li>
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
          <small>Nouvel utilisateur ?<a href="">
              <br />
              Inscrivez-vous ici !.</a></small>
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
  <!-- Fin de la barre de navigation -->

  <!-- Header -->
  <header>
    <h1>WINDSELL, L'AVENIR.</h1>
    <!--  <button>Naviguer <i class="fas fa-paper-plane"></i></button> -->
  </header>
  <!-- Fin du header -->

  <!-- Section principale -->
  <section class="main">
    <!-- Toutes les cartes -->

    <div class="cards">
      <!-- ICI CODE PHP POUR DYNAMISER LES PRODUITS DEPUIS LA BDD -->

      <div class="card">
        <a href="./product.php">
          <img src="images/eolienneTexenergy.jpg" />
        </a>
        <div class="card-header">
          <h4 class="title">EOLIENNE TEXENERGY</h4>
          <h4 class="price">150$</h4>
        </div>
        <div class="card-body">
          <p>Légère, compacte, efficace et résistante, </p>
          <p>cette éolienne permet de recharger </p>
          <p>tous les appareils via une prise USB. </p>

        </div>
      </div>
      <!-- ICI CODE PHP POUR DYNAMISER LES PRODUITS DEPUIS LA BDD -->

      <!-- ICI CODE PHP POUR DYNAMISER LES PRODUITS DEPUIS LA BDD -->
      <div class="card">

        <img src="images/eolienneGenerateur.jpg" />

        <div class="card-header">
          <h4 class="title">EOLIENNE 300W</h4>
          <h4 class="price">2000$</h4>
        </div>
        <div class="card-body">
          <p>Eolienne avec haute efficacité, </p>
          <p>pourrait être un système hybride </p>
          <p>avec des panneaux solaires </p>

        </div>
      </div>
      <!-- ICI CODE PHP POUR DYNAMISER LES PRODUITS DEPUIS LA BDD -->
      <!-- ICI CODE PHP POUR DYNAMISER LES PRODUITS DEPUIS LA BDD -->
      <div class="card">
        <img src="images/eolienne3.jpg" height="350px" />
        <div class="card-header">
          <h4 class="title">EOLIENNE SMOOSE</h4>
          <h4 class="price">1899$</h4>
        </div>
        <div class="card-body">
          <p>Eolienne Générateur meglev sans noyau, </p>
          <p>rotation horizontale à haute efficacité </p>
          <p>avec 3 pales avec conception incurvée. </p>

        </div>
      </div>
      <!-- ICI CODE PHP POUR DYNAMISER LES PRODUITS DEPUIS LA BDD -->
    </div>
    <!-- Fin de toutes les cartes -->
  </section>
  <!-- Fin de la section principale -->

  <!-- Pied de page -->
  <footer>
    <ul class="medias">
      <a class="bulle" href="https://www.facebook.com/profile.php?id=100078808338416"><img src=".\images\facebook.png" class="logo-medias"></a>
      <a class="bulle" href="https://www.instagram.com/windsell_ing4/"><img src=".\images\instagram.png" class="logo-medias"></a>
      <a class="bulle" href="https://www.youtube.com/channel/UC3c-ueaR2XWuOao8Wxn6n6g"><img src=".\images\youtube.png" class="logo-medias"></a>
    </ul>
  </footer>
  <!-- Fin du pied de page -->
</body>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>

</html>