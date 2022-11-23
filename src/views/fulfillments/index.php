<header class="heading answering">
  <section class="container">
    <a href="/"><img src="/images/logo.png" /></a>
    <span class="exercise-label">Exercise: <span class="exercise-title"><?= $data['exercise_name'] ?></span></span>
  </section>
</header>

<main class="container">
  <!DOCTYPE html>
  <html>

  <head>
    <title>ExerciseLooper</title>
    <meta name="csrf-param" content="authenticity_token" />
    <meta name="csrf-token" content="4/CFBvzwlSIJ9vX4msDwuaMsYT8vqXwiDEt79kZRqqlU5373iaXH1/yQ46UONxZG6UxjVACNozQwsbVgx2nxow==" />
    <link rel="stylesheet" media="all" href="/css/stylesheet.css" />
    <script src="/js/script.js"></script>
  </head>

  <body>
    <h1>Your take</h1>
    <p>If you'd like to come back later to finish, simply submit it with blanks</p>

    <form action="/exercises/430/fulfillments" accept-charset="UTF-8" method="post"><input name="utf8" type="hidden" value="&#x2713;" /><input type="hidden" name="authenticity_token" value="7kS02MjD2BIIOO+UfFYnBCxOwqs5/pfa5tha6oR4ffEK5qUwZznqASYGK3AmokGLgofblOWtIBNV3XOWAxujVA==" />

      <?php foreach ($data['questions'] as $question) : ?>
        <input type="hidden" value="620" name="fulfillment[answers_attributes][][field_id]" id="fulfillment_answers_attributes__field_id" />
        <div class="field">
          <label for="fulfillment_answers_attributes__value"><?= $question->getName(); ?></label>
          <input type="text" name="fulfillment[answers_attributes][][value]" id="fulfillment_answers_attributes__value" />
        </div>
      <?php endforeach; ?>

      <div class="actions">
        <input type="submit" name="commit" value="Save" data-disable-with="Save"/>
      </div>
    </form>
  </body>
  </html>
</main>