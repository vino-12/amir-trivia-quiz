<?php
   include "./scripts/php_includes/data-collector.php";
?>
<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Trivia Quiz - Results</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sticky-footer-navbar/">

    

    

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- Favicons -->

<meta name="theme-color" content="#712cf9">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      /* }

      .img-fluid {

max-width: 10%;

*/
} 
    </style>

    
    <!-- Custom styles for this template -->
    <link href="/css/sticky-footer-navbar.css" rel="stylesheet">
    
  </head>
  <body class="d-flex flex-column h-100 bg-info">

    


    
<header>
  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
    <a class="navbar-brand" href="index.php"><h5 class="mt-0 text-light">Restart Trivia Quiz</h5></a>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      </div>
    </div>
  </nav>
</header>

<?php


$totalPoints = 0;

foreach ($_SESSION as $name => $value) {
    if (str_contains($name, 'question-')) {
        if (isset($value["single-choice"])) {
            $points = intval($value["single-choice"]);
            $totalPoints = $totalPoints + $points;
        }
    }
}

$maxPoints = $_SESSION["quiz"]["questionNum"];

    ?>

<!-- Begin page content -->


<main class="flex-shrink-0">

<div class="row align-items-center">
    <div class="col">
    <h1 class="mt-5">Result:</h1>
    </div>
    <div class="col">
    <h2 class="mt-5">You made <?php echo $totalPoints ?> of <?php echo $maxPoints ?> points!</h1>
    </div>
    <div class="col">
     
    </div>
  </div>

  <div class="col">
    
    </div>
    <div class="col">
    
    </div>
    <div class="col">
      <img src="images/logo_quiz.svg" class="img-fluid" alt="logo">
    </div>
  </div>

  
    

  
           


  </div>

  
</main>

<footer class="footer mt-auto py-3 bg-light">
  <div class="container">

  
    <span class="text-muted">Trivia Quiz <?php echo $quiz["topic"] ?> results</span>
  </div>
</footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

      
  </body>
</html>