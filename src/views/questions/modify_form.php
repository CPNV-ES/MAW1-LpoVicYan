<?php
/**
 * Project: MAW1-LpoVicYan
 * Title: modify.php
 * Author: LPOdev
 * Version: 1.0 from the 07th 10 2022
 */

?>

<header class="heading managing">
    <section class="container">
        <a href="/"><img src="/images/logo.png"/></a>
        <span class="exercise-label">Exercise: <a href="/exercises/789/fields">test maw vyl</a></span>
    </section>
</header>

<main class="container">
    <!DOCTYPE html>
    <html>
    <head>
        <title>ExerciseLooper</title>
        <meta name="csrf-param" content="authenticity_token"/>
        <meta name="csrf-token"
              content="0I0GNSsJ8tuGMS7lLpUAIZWZ9IheGWcwEAu1wJm+ucB0DhVs+mqiRAxl0NudJkKXDa+u3zyfk8dQJB50sRA1pg=="/>


        <link rel="stylesheet" media="all"
              href="/assets/application-264507a893987846393b8514969b89293817c54265354e63e6ab61fb46193f89.css"/>
        <script src="/assets/application-212289bcba525f2374cdbd70755ea38f2cfdd35d479e9638fae0b2832fac5dac.js"></script>
    </head>

    <body>
    <h1>Editing Field</h1>

    <form action="/exercises/789/fields/1105" accept-charset="UTF-8" method="post"><input name="utf8" type="hidden"
                                                                                          value="&#x2713;"/><input
                type="hidden" name="_method" value="patch"/><input type="hidden" name="authenticity_token"
                                                                   value="Ljkm2U/arKjhqKa61oUHA/CpF3ldG8IHW5zfsEHCS2njaE+EAyXeBDvJQhshNhccm+4kxJIpSgLCyGKLfey4FA=="/>

        <div class="field">
            <label for="field_label">Label</label>
            <input type="text" value="modifié!" name="field[label]" id="field_label"/>
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
            <input type="submit" name="commit" value="Update Field" data-disable-with="Update Field"/>
        </div>
    </form>

    </body>
    </html>

</main>
