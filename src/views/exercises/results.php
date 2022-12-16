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
    <span class="exercise-label">Exercise: <a
    href="/exercises/<?=$data['exercise']->getId();?>/results"><?=$data['exercise']->getTitle();?></a></span>
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
          <tbody>
            <?php
            foreach ($data['answers'] as $answer ): ?>
            <tr>
              <td><a href="/exercices/<?= $data["exercise"]->getId() ?>/fulfillments/<?= $answer->getId()?>"><?=$answer->getDate();?></a></td>
            </tr>
            <?php
            endforeach;?>
          </tbody>
        </tr>
      </thead>
      <tbody>
        <tr>
          <!--<td><a href="/exercises/344/fulfillments/292">2021-09-01 13:30:53 UTC</a></td> -->
          <td class="answer"><i class="fa fa-check short"></i></td>
        </tr>
      </tbody>
    </table>
  </main>
</body>

</html>