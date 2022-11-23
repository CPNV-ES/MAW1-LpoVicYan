<?php

/**
 * Title: take_exercice
 * Author: Victorien Montavon
 * Version: 1.0 from 7th September 2022
 */
?>
<header class="heading answering">
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
    <meta name="csrf-token" content="0NHSc9pSStBS3iRXgJv1k7zZn7YHL4/nt1DU6DpHVsivTYLDbKSyYZ6GctLeC10IOHsHzAV/ZO5xJpYCbbTQGA==" />
    <link rel="stylesheet" media="all" href="/css/stylesheet.css" />
    <script src="/js/script.js"></script>
  </head>

  <body>
    <ul class="ansering-list">
    <?php foreach ($data['exercisesAnswering'] as $exercise) : ?>
      <li class="row">
        <div class="column card">
          <div class="title"><?= $exercise->getTitle(); ?></div>
          <a class="button" href="/exercises/<?= $exercise->getId();?>/fulfillments/new">Take it</a>
        </div>
      </li>
      <?php endforeach; ?>
    </ul>
  </body>
  </html>
</main>