<?php
    /**
     * Project: MAW1-LpoVicYan
     * Title: modify.php
     * Author: LPOdev
     * Version: 1.0 from the 07th 10 2022
     */
;?>

<header class="heading managing">
    <section class="container">
        <a href="/"><img src="/images/logo.png" /></a>
        <span class="exercise-label">Exercise: <a href="/exercises/<?=$data['exercise_id'];?>/fields">test maw
                vyl</a></span>
    </section>
</header>

<main class="container">
    <!DOCTYPE html>
    <html>

    <head>
        <title>ExerciseLooper</title>
        <meta name="csrf-param" content="authenticity_token" />
        <meta name="csrf-token"
            content="0I0GNSsJ8tuGMS7lLpUAIZWZ9IheGWcwEAu1wJm+ucB0DhVs+mqiRAxl0NudJkKXDa+u3zyfk8dQJB50sRA1pg==" />


        <link rel="stylesheet" media="all" href="/css/stylesheet.css" />
        <script src="/js/script.js"></script>
    </head>

    <body>
        <h1>Editing Field</h1>

        <form action="/exercises/<?=$data['exercise_id'];?>/fields" accept-charset="UTF-8" method="post"><input
                name="utf8" type="hidden" value="&#x2713;" /><input type="hidden" name="_method" value="patch" /><input
                type="hidden" name="field[id]" value="<?=$data['question']->getId();?>" />

            <div class="field">
                <label for="field_label">Label</label>
                <input type="text" value="<?=$data['question']->getName();?>" name="field[name]" id="field_label" />
            </div>

            <div class="field">
                <label for="field_value_kind">Value kind</label>
                <select name="field[type]" id="field_value_kind">

                    <option <?php if ( $data['question']->getType() == 'inline' )
                                {
                                    echo 'selected';
                            }
                            ?> value="inline">Single line text</option>
                    <option <?php if ( $data['question']->getType() == 'choice' )
                                {
                                    echo 'selected';
                            }
                            ?> value="choice">List of single lines</option>
                    <option <?php if ( $data['question']->getType() == 'multiline' )
                                {
                                    echo 'selected';
                            }
                            ?> value="multiline">Multi-line text</option>
                </select>
            </div>

            <div class="actions">
                <input type="submit" name="commit" value="Update Field" data-disable-with="Update Field" />
            </div>
        </form>

    </body>

    </html>

</main>