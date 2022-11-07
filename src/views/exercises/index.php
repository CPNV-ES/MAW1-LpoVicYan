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
    <div class="row">
      <section class="column">
        <h1>Building</h1>
        <table class="records">
          <thead>
            <tr>
              <th>Title</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($data['exercisesBuilding'] as $exercise) : ?>
              <tr>
                <td><?= $exercise->getTitle() ?></td>
                <td>
                  <a title="Be ready for answers" rel="nofollow" data-method="put" href="/exercises/<?= $exercise->getId() ?>/answering"><i class="fa fa-comment"></i></a>
                  <a title="Manage fields" href="/exercises/<?= $exercise->getId() ?>/fields"><i class="fa fa-edit"></i></a>
                  <a data-confirm="Are you sure?" title="Destroy" rel="nofollow" data-method="delete" href="/exercises/<?= $exercise->getId() ?>"><i class="fa fa-trash"></i></a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </section>

      <section class="column">
        <h1>Answering</h1>
        <table class="records">
          <thead>
            <tr>
              <th>Title</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($data['exercisesAnswering'] as $exercise) : ?>
              <tr>
                <td><?= $exercise->getTitle(); ?></td>
                <td>
                  <a title="Show results" href="/exercises/<?= $exercise->getId() ?>/fields"><i class="fa fa-chart-bar"></i></a>
                  <a data-confirm="Are you sure to close?" title="Close" rel="nofollow" data-method="put" href="/exercises/<?= $exercise->getId() ?>"><i class="fa fa-minus-circle"></i></a>
                </td>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </section>

      <section class="column">
        <h1>Closed</h1>
        <table class="records">
          <thead>
            <tr>
              <th>Title</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($data['exercisesClosed'] as $exercise) : ?>
              <tr>
                <td><?= $exercise->getTitle() ?></td>
                <td>
                  <a title="Show results" href="/exercises/<?= $exercise->getId() ?>/fields"><i class="fa fa-chart-bar"></i></a>
                  <a data-confirm="Are you sure?" title="Destroy" rel="nofollow" data-method="delete" href="/exercises/<?= $exercise->getId() ?>"><i class="fa fa-trash"></i></a>
                <td>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </section>
    </div>
  </body>

  </html>
</main>