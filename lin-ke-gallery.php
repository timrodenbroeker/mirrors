<?php require "header.php";?>

<nav id="main">
    <a href="lin-ke.php" style="">
        BACK</a>
    <a href="mailto:timrodenbroeker@gmail.com">
        submit</a>
</nav>


<div id="thegallery" style="margin-top: 50px;">

    <?php $directory = "galleries/lin-ke";
$images = glob($directory . "/*.jpg");

foreach ($images as $image) {?>
    <img src="<?php echo $image; ?>" />
    <?php }?>

</div>





<?php require "footer.php";