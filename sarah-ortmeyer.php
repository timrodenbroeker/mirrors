<?php require "header.php";?>

<nav id="main">
    <?php echo submitLink("GALLERY_SUBMISSION_SARAH_ORTMEYER"); ?>

    <a href="index.php" style="">
        BACK TO INDEX</a>
    <a href="sarah-ortmeyer-gallery.php">
        gallery</a>
</nav>

<main>
    <div id="intro">
        <h1 style="line-height: 100%; font-size: 9vw;">Tell me what you think</h1>
    </div>
    <div id="selectReaction">
        <?php require "sarah-ortmeyer-sr.php";?>
    </div>
</main>

<?php vorhang(file_get_contents("content/sarah-ortmeyer.txt"));?>



<?php require "footer.php";