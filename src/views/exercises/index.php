<?php
/**
 * Title: index
 * Author: Luís Pedro Pinheiro
 * Version: 1.0 from 7th September 2022
 */
?>

<header class="heading results">
  <section class="container">
    <a href="/"><img src="/images/logo.png" /></a>
    
  </section>
</header>

<main class="container">
  <!DOCTYPE html>
<html>
  <head>
    <title>ExerciseLooper</title>
    <meta name="csrf-param" content="authenticity_token" />
<meta name="csrf-token" content="cTQ75Yh5yYTc3Q4xxJg0ows2Aa/orSIAKGibpK6NoZsOqGtVPo8xNRCFWLSaCJw4j5SZ1er9yQnuHtlO+X4nSw==" />
    

    <link rel="stylesheet" media="all" href="/css/stylesheet.css" />
    <script src="/js/script.js"></script>
  </head>

  <body>
  <?php foreach ($data['exercises'] as $exercise): ?>
        <?= $exercise['title'] ?><br/>
    <?php endforeach; ?>
  </body>
</html>

</main>