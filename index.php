<?php
// header("Location: lin-ke.php");
// die();
?>

<?php require "header.php";?>

<div id="main">
    <a href="index.php"></a>
    <a href="index.php">Mirror Series</a>
    <a href="index.php"></a>
</div>


<main id="portal">
    <div id="links" style="height: 100vh;">
        <a href="./lin-ke.php">

            <h2>Mirrors</h2>
        </a>
        <a href="./sarah-ortmeyer.php">

            <h2>Tell me what you think</h2>

        </a>
        <a href="./gottfried-jaeger.php">

            <h2>srorriM</h2>

        </a>
    </div>

</main>


<script>
function myFunction() {
    var element = document.getElementById("vorhang");
    element.classList.toggle("hide");
}
</script>

<?php vorhang(file_get_contents("content/about.txt"));?>


<?php require "footer.php";