<?php require "header.php";?>

<nav id="main">
    <?php echo submitLink("GALLERY_SUBMISSION_LIN_KE"); ?>
    <a href="index.php" style="">
        BACK TO INDEX</a>
    <a href="lin-ke-gallery.php">
        gallery</a>
</nav>

<main>
    <div id="intro">
        <h1>Mirrors</h1>
    </div>
    <div id="selectReaction">
        <?php require "lin-ke-sr.php";?>
    </div>
</main>



<?php vorhang(file_get_contents("content/lin-ke.txt"));?>

<?php require "footer.php";?>