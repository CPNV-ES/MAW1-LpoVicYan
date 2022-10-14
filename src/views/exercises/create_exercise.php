<?php
/**
 * Title : create_exercice
 * Author : Victorien Montavon
 * Verison : 1.0 from 09.09.2022
 */
?>

<header class="heading managing">
  <section class="container">
  <a href="/"><img src="/images/logo.png" /></a>
    <span class="exercise-label">New exercise</span>
  </section>
</header>

<main class="container">
  <!DOCTYPE html>
<html>
  <head>
    <title>ExerciseLooper</title>
    <meta name="csrf-param" content="authenticity_token" />
<meta name="csrf-token" content="kmlh/H+MXagV4qyR9JaIXlJJVXsdLEquM4QRk+o9NMGho6VMdtro1h4Qa0gX6achxZQR/lkeudpFke5yqjbq8A==" />
    

    <link rel="stylesheet" media="all" href="/css/stylesheet.css" />
    <script src="/js/script.js"></script>
  </head>

  <body>
    <h1>New Exercise</h1>

<form action="/exercises/<?= $_POST ($bag['post_data'])?>/create_questions" accept-charset="UTF-8" method="post"><input name="utf8" type="hidden" value="&#x2713;" /><input type="hidden" name="authenticity_token" value="fKJWz2xwmy0CsjZNyAx9IVj1dgX274vMobANwR7EIv0bjFweCGmftjVmtO1R6N35E4ZkfuDhOSpvQ8OsZ8J9pA==" />

  <div class="field">
    <label for="exercise_title">Title</label>
    <input type="text" name="exercise_title" id="exercise_title" />
  </div>

  <div class="actions">
    <input type="submit" name="commit" value="Create Exercise" data-disable-with="Create Exercise" />
  </div>
</form>

  </body>
</html>

</main>
