<?php
function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function submitLink($subject)
{
    return '<a href="mailto:timrodenbroeker@gmail.com?subject=' . $subject . '">submit</a>';
}

function vorhang($content)
{?>

<a id="bottomnav" onclick="myFunction()">info</a>

<div id="vorhang" class="hide" onclick="myFunction()">
    <p class="text-large"><?php echo $content; ?></p>

</div>

<script>
function myFunction() {
    var element = document.getElementById("vorhang");
    element.classList.toggle("hide");
}
</script>
<?php }?>