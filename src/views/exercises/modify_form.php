<?php
/**
 * Project: MAW1-LpoVicYan
 * Title: modify.php
 * Author: LPOdev
 * Version: 1.0 from the 07th 10 2022
 */

; ?>


<header class="heading managing">
    <section class="container">

        <a href="/"><img src="/images/logo.png" /></a>
        <span class="exercise-label">Exercise: <a href="/exercises/<?= $data['exercise']->getId(); ?>/fields">
                <?= $data['exercise']->getTitle(); ?>
            </a></span>
    </section>
</header>

<main class="container">
    <!DOCTYPE html>
    <html>

    <head>
        <title>ExerciseLooper</title>
        <meta name="csrf-param" content="authenticity_token" />
        <meta name="csrf-token"
            content="FAx9Ksqj2r9SNlvFVZl6dUJbi/fnCBKWMaqRffoMk5Gwj25zG8CKINhipfvmKjjD2m3RoIWO5mFxhTrJ0qIf9w==" />


        <link rel="stylesheet" media="all" href="/css/stylesheet.css" />
        <script src="/js/script.js"></script>
    </head>

    <body>
        <div class="row">
            <section class="column">
                <h1>Fields</h1>
                <table class="records">
                    <thead>
                        <tr>
                            <th>Label</th>
                            <th>Value kind</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        foreach ($data['questions'] as $field): ?>
                        <tr>
                            <td>
                                <?= $field->getName(); ?>
                            </td>
                            <td>
                                <?= $field->getType(); ?>
                            </td>
                            <td>
                                <a title="Edit"
                                    href="/exercises/<?= $data['exercise']->getId(); ?>/fields/<?= $field->getId(); ?>/edit"><i
                                        class="fa fa-edit"></i></a>
                                <a data-confirm="Are you sure?" title="Destroy" rel="nofollow" data-method="delete"
                                    href="/exercises/<?= $data['exercise']->getId(); ?>/fields/<?= $field->getId(); ?>"><i
                                        class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php
                        endforeach; ?>
                    </tbody>
                </table>

                <a data-confirm="Are you sure? You won&#39;t be able to further edit this exercise" class="button"
                    rel="nofollow" data-method="put" href="/exercises/<?= $data['exercise']->getId(); ?>/answering"><i
                        class="fa fa-comment"></i> Complete and be ready for answers</a>

            </section>
            <section class="column">
                <h1>New Field</h1>
                <form action="/exercises/<?= $data['exercise']->getId(); ?>/fields" accept-charset="UTF-8"
                    method="post">
                    <input name="utf8" type="hidden" value="&#x2713;" /><input type="hidden" name="authenticity_token"
                        value="dHt1q3fSnM1NXO344vHuHW5LpwOOrGG/GOJhLZJGHDwUrFWhF7KAo4teeRBModaf3x0Jmq9xC34MNjsfALADBg==" />

                    <div class="field">
                        <label for="field_label">Label</label>
                        <input type="text" name="field[label]" id="field_label" />
                    </div>

                    <div class="field">
                        <label for="field_value_kind">Value kind</label>
                        <select name="field[value_kind]" id="field_value_kind">
                            <option selected="selected" value="single_line">Single line text</option>
                            <option value="single_line_list">List of single lines</option>
                            <option value="multi_line">Multi-line text</option>
                        </select>
                    </div>

                    <div class="actions">
                        <input type="submit" name="commit" value="Create Field" data-disable-with="Create Field" />
                    </div>
                </form>
            </section>
        </div>

    </body>

    </html>
</main>