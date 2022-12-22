<?php

/**
 * Title : answers
 * Author : Victorien Montavon
 * Vs : 1.0 from 16.12.22
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
                    <th>Answers</th>
            </thead>
            <tbody>
            <?php foreach ($data['questions_exercise'] as $question) : ?>
              <tr>
                <td><?= $question->getName() ?></td>
                <?php foreach ($question->getAnswers() as $answer): ?>
                <td><?= $answer->getAnswerText() ?></td>
                <?php if (str_world_count($answer->getAnswerText()) >10) : ?>
                <i class="bi bi-check"></i>
                <?php elseif (str_world_count($answer->getAnswerText()) >10) : ?>
                <?php endif; ?>
                <?php endforeach; ?>
              </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </main>
</body>

</html>