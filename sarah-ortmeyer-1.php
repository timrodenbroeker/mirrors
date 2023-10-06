<?php require "header.php";?>
<?php require "sarah-ortmeyer-nav.php";?>

<div style="position: fixed; top: 0; background: white">
    <?php

$pathn = './media/urformen/';

$myArray = array(glob($pathn . '*'));

foreach ($myArray as $filename) {
    echo basename($filename) . "\n";
}
?>

</div>

<div id="so-stage">
    <div id="so-left" style="background-size: 60%; background-image: url(./media/urformen/<?php echo random_int(1, 19);
?>.jpg)">
        <a href="sarah-ortmeyer-1.php">new</a>
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
    frameRate(60);
    fill(0);
}

var mag, particles;
var fg;

function draw() {

    noStroke();


    rectMode(CENTER);

    if (mouseIsPressed) {

        push();
        translate(-width / 2 + mouseX, -height / 2 + mouseY);
        rotate(radians(random(360)));


        rect(0, 0, 50 + pos, 50 + pos);
        pop();


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
    fill(map(sin(radians(frameCount * 10)), -1, 1, 0, 150));
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