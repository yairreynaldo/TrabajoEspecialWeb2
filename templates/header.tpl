<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <base href='{$BASE_URL}' >


  <title>Supermercado Marano</title>

  <!-- development version, includes helpful console warnings -->
                <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
                  <link href="css/shop-homepage.css" rel="stylesheet">



</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">MHS</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="inicio">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
            <a class="nav-link" href="nosotros">nosotros</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="producto">productos</a>
          </li>
                         {if !isset($userName)}
         <div class="navbar-nav ml-auto">
            <a class="nav-item nav-link" href="login">iniciar sesion</a>
        </div>
                {/if}
        </div>
        {if isset($userName)}
        <div class="navbar-nav ml-auto">
           <a class="nav-item nav-link" href="">{$userName}</a>
       </div>
                       {/if}
   {if isset($userName)}
    <div class="navbar-nav ml-auto">
      <a class="nav-item nav-link" href="logout">LOGOUT</a>
          </div>
         {/if}
        </ul>
      </div>
    </div>
  </nav>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
