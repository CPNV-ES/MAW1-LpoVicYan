<?php
    /**
    * Title: create.php
    * Author: LPO & VIC & YAN
    * Date: 29 august 2022
    * Version: 1.0
    */
?>
<html>
<head>
    <title>ExerciseLooper</title>
    <meta name="csrf-param" content="authenticity_token">
    <meta name="csrf-token"
        content="nUvnusYD+1qjb01guAZ9hA+VSy7MKipC1EiltIX5VJTGrpsti+mEKBVLguUqTHMy5gXJVsLmKZoec9c3y0I/pg==">


    <link rel="stylesheet" media="all" href="/css/stylesheet.css">
    <script src="/js/script.js"></script>
</head>

<body>
    <header class="dashboard">
        <section class="container">
            <p><img src="public/images/logo.png"></p>
            <h1>Exercise<br>Looper</h1>
        </section>
    </header>

    <div class="container dashboard">
        <section class="row">
            <div class="column">
                <a class="button answering column" href="/exercises/answering">Take an exercise</a>
            </div>
            <div class="column">
                <a class="button managing column" href="/exercises/new">Create an exercise</a>
            </div>
            <div class="column">
                <a class="button results column" href="/exercises">Manage an exercise</a>
            </div>
        </section>
    </div>

</body>

</html>