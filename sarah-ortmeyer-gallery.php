<?php require "header.php";?>


<nav id="main" style="background: #f1f1f1;">
    <a href="sarah-ortmeyer.php" style="">
        BACK</a>
    <a href="mailto:timrodenbroeker@gmail.com">
        submit</a>
</nav>



<div id="thegallery" style="background: #f1f1f1;margin-top: 50px;">

    <?php $directory = "galleries/sarah-ortmeyer";
$images = glob($directory . "/*.jpg");

foreach ($images as $image) {?>
    <img src="<?php echo $image; ?>" />
    <?php }?>
</div>



<?php require "footer.php";