<?php

/**
 * Title : create_exercice2
 * Author : Victorien Montavon
 * Verison : 1.0 from 0.9.09.2022
 */
?>

<header class="heading managing">
    <section class="container">
        <a href="/"><img src="/images/logo.png" /></a>
        <span class="exercise-label">Exercise: <a href="/exercises/750/fields"><?= $_GET['exercise_title']?></a></span>
    </section>
</header>

<main class="container">
    <!DOCTYPE html>
    <html>

    <head>
        <title>ExerciseLooper</title>
        <meta name="csrf-param" content="authenticity_token" />
        <meta name="csrf-token" content="HDgG6C5Po9HXZWtSrCfIvJsxH/Bc7epBasJEboNWsugv8sJYJxkWr9yXrItPWOfDDOxbdRjfGTUc17uPw11s2Q==" />


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
                    </tbody>
                </table>

                <a data-confirm="Are you sure? You won&#39;t be able to further edit this exercise" class="button" rel="nofollow" data-method="put" href="/manage-exercises"><i class="fa fa-comment"></i> Complete and be ready for answers</a>

            </section>
            <section class="column">
                <h1>New Field</h1>
                <form action="/exercises/750/fields" accept-charset="UTF-8" method="post"><input name="utf8" type="hidden" value="&#x2713;" /><input type="hidden" name="authenticity_token" value="rb0PMhs4hMsL04IiyaU2HBzGnFbebUgu7Cs2A/9rJ9zUi12WX6SyWATpXSreU/xjJThJkzNJ35RfBL8jh+lRvg==" />

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