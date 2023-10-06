<?php require "header.php";?>
<?php require "sarah-ortmeyer-nav.php";?>

<div style="position: fixed; top: 0; background: white">
    <?php

$pathn = './media/animals/';

$myArray = array(glob($pathn . '*'));

foreach ($myArray as $filename) {
    echo basename($filename) . "\n";
}
?>

</div>

<div id="so-stage">
    <div id="so-left" style="background-image: url(./media/animals/<?php echo random_int(1, 7);
?>.jpg)">
        <a href="sarah-ortmeyer-4.php">new</a>
        <a onclick="save('aaa<?php echo generateRandomString(); ?>.jpg')">save</a>
    </div>

    <div id="so-right"></div>
</div>

<script>
var thecolor = 0;
var counter = 0;


function setup() {
    var canvas = createCanvas(windowWidth / 2, windowHeight, WEBGL);
    canvas.parent('so-right');
    mag = random(100);
    particles = random(80);
    background("#bbbbbb");
}

var mag, particles;
var fg;

function draw() {

    noStroke();

    if (random(1) < 0.5) {
        fg = "#111111";
    } else {
        fg = "#eeeeee";
    }
    noStroke();

    fill(fg);
    rectMode(CENTER);

    if (mouseIsPressed) {



        vertex(-width / 2 + mouseX, -height / 2 + mouseY);
        rect(-width / 2 + mouseX, -height / 2 + mouseY, 5, 5);

    }
}

function windowResized() {
    resizeCanvas(windowWidth / 2, windowHeight);
}

function mouseReleased() {
    if (counter >= 2) {
        counter = 0
    } else {
        counter++;
    }

    endShape(CLOSE);

}

function mousePressed() {
    if (counter >= 2) {
        counter = 0
    } else {
        counter++;
    }

    beginShape();

}

function mouseWheel(event) {
    print(event.delta);
    //move the square according to the vertical scroll amount
    pos += event.delta * 1;
    //uncomment to block page scrolling
    //return false;
}

let pos = 0;
</script>


<?php require "footer.php";