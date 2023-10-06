<?php require "header.php";?>

<nav id="main">
    <a></a>
    <a href="index.php" style="">
        BACK TO INDEX</a>
    <a></a>
</nav>
<main>
    <div id="intro">
        <h1>srorriM</h1>
    </div>
    <div id="selectReaction">
        <?php require "gottfried-jaeger-sr.php";?>
    </div>
</main>



<?php vorhang(file_get_contents("content/gottfried-jaeger.txt"));?>

<?php require "footer.php";?>