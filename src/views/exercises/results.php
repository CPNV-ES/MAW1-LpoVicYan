<?php

/**
 * Title : results
 * Author : Victorien Montavon
 * Vs : 1.0 from 16.11.22
 */
?>

<html>
<header class="heading results">
  <section class="container">
    <a href="/"><img src="/images/logo.png"></a>
    <span class="exercise-label">Exercise: <a href="/exercises/<?= $data['exercise']->getId(); ?>/results"><?= $data['exercise']->getTitle(); ?></a></span>
  </section>
</header>

<body>


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
        <?php foreach ($data['questions'] as $question) : ?>
          <th><a href="/exercises/<?=$data['exercise']->getId();?>/question/<?= $question->getId();?>"><?= $question->getName()?></a></th>
        <?php endforeach?>
        </thead>
      <tbody>
          <?php
          foreach ($data['fulfillments'] as $fulfillment) : ?>
          <tr>
            <td>
              <a href="/exercises/<?= $data['exercise']->getId(); ?>/fulfillments/<?= $fulfillment->getId(); ?>/answers"><?= $fulfillment->getModificationDate(); ?></a>
            </td>
          </tr>
          <?php
          endforeach ?>
      </tbody>
    </table>
  </main>
</body>

</html>