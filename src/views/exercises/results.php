<?php 

/**
 * Title : results
 * Author : Victorien Montavon
 * Vs : 1.0 from 16.11.22
 */
?>

<html><head></head><body><header class="heading results">
  <section class="container">
    <a href="/"><img src="/images/logo.png"></a>
    <?php foreach ($data['exercisesClosed'] as $exercise) : ?>
    <span class="exercise-label">Exercise: <a href="/exercises/<?= $exercise->getId() ?>/results"><?= $exercise->getTitle() ?></a></span>
    <?php endforeach; ?>
  </section>
</header>

<main class="container">
  

  
    <title>ExerciseLooper</title>
    <meta name="csrf-param" content="authenticity_token">
<meta name="csrf-token" content="BLjkGqGJW8WU1wASHt8IjAJ0JHUiugDVSz/+8DrrF9nluIDI1ZPFqpymow8rvEJM8MeRd0d0tYNQL92/5DuntQ==">
    

    <link rel="stylesheet" media="all" href="/css/stylesheet.css">
    <script src="/js/script.js"></script>
  

  
    <table>
  <thead>
    <tr>
      <th>Take</th>
        <th><a href="/exercises/344/results/490">la réponse d</a></th>
    </tr>
  </thead>
  
  <tbody>
      <tr>
        <td><a href="/exercises/344/fulfillments/292">2021-09-01 13:30:53 UTC</a></td>
          <td class="answer"><i class="fa fa-check short"></i></td>
      </tr>
      <tr>
        <td><a href="/exercises/344/fulfillments/301">2021-09-05 14:42:31 UTC</a></td>
          <td class="answer"><i class="fa fa-times empty"></i></td>
      </tr>
      <tr>
        <td><a href="/exercises/344/fulfillments/305">2021-09-08 11:49:36 UTC</a></td>
          <td class="answer"><i class="fa fa-check-double filled"></i></td>
      </tr>
  </tbody>
</table>

  


</main></body></html>