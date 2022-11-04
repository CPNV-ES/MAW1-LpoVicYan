<header class="heading answering">
  <section class="container">
    <a href="/"><img src="/assets/logo-84d7d70645fbe179ce04c983a5fae1e6cba523d7cd28e0cd49a04707ccbef56e.png" /></a>
    <span class="exercise-label">Exercise: <?= $data['exercise']->getName() ?></span>
  </section>
</header>

<main class="container">
  <!DOCTYPE html>
<html>
  <head>
    <title>ExerciseLooper</title>
    <meta name="csrf-param" content="authenticity_token" />
<meta name="csrf-token" content="UvcqIb515WEFgn+NWJ3SocXyS3TUiyDKQbsJAyfiros+1qt68HPfRkz2k1Dym9FIPUqK1lrWkRzxWGBAl3NmDg==" />
    

    <link rel="stylesheet" media="all" href="/assets/application-264507a893987846393b8514969b89293817c54265354e63e6ab61fb46193f89.css" />
    <script src="/assets/application-212289bcba525f2374cdbd70755ea38f2cfdd35d479e9638fae0b2832fac5dac.js"></script>
  </head>

  <body>
    <h1>Your take</h1>
<p>If you'd like to come back later to finish, simply submit it with blanks</p>

<form action="/exercises/229/fulfillments" accept-charset="UTF-8" method="post"><input name="utf8" type="hidden" value="&#x2713;" /><input type="hidden" name="authenticity_token" value="4CJ0mFdQLO0dAhZb7HRqY6nTlIB5Zfi4/hJd/VwRna3Zv63Nbs2wOL7MX3jmQJ/1X72hEInLAwv/DeJSHkeV8Q==" />
  
    
      
      <input type="hidden" value="354" name="fulfillment[answers_attributes][][field_id]" id="fulfillment_answers_attributes__field_id" />
      <div class="field">
        <label for="fulfillment_answers_attributes__value">TASTY</label>
<input type="text" name="fulfillment[answers_attributes][][value]" id="fulfillment_answers_attributes__value" />

      </div>
    
  <div class="actions">
    <input type="submit" name="commit" value="Save" data-disable-with="Save" />
  </div>
</form>

  </body>
</html>

</main>
