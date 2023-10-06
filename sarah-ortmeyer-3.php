<?php require "header.php";?>

<?php
// the array
$arrX = array(
    "I can't understand why people are frightened of new ideas. I'm frightened of the old ones.",
    "The first question I ask myself when something doesn't seem to be beautiful is why do I think it's not beautiful. And very shortly you discover that there is no reason.",
    "If something is boring after two minutes, try it for four. If still boring, then eight. Then sixteen. Then thirty-two. Eventually one discovers that it is not boring at all.",
    "I have nothing to say and I am saying it and that is poetry as I need it.",
    "Every something is an echo of nothing.",
    "Get yourself out of whatever cage you find yourself in.",
    "In the dark, all cats are black.",
    "There is no such thing as an empty space or an empty time. There is always something to see, something to hear. In fact, try as we may to make a silence, we cannot.",
    "As far as consistency of thought goes, I prefer inconsistency.",
    "The emotions - love, mirth, the heroic, wonder, tranquility, fear, anger, sorrow, disgust - are in the audience.",
    "Everything we do is music.",
    "The world is teeming; anything can happen.",
    "It is not irritating to be where one is. It is only irritating to think one would like to be somewhere else.",
    "Our business in living is to become fluent with the life we are living, and art can help this.",
    "There is poetry as soon as we realize that we possess nothing.",
    "I am trying to be unfamiliar with what I'm doing.",
    "College: two hundred people reading the same book. An obvious mistake. Two hundred people can read two hundred books.",
    "The highest purpose is to have no purpose at all. This puts one in accordance with nature, in her manner of operation.",
    "Art is sort of an experimental station in which one tries out living",
    "alue judgments are destructive to our proper business, which is curiosity and awareness.",
);

// get 2 random indexes from array $arrX
$randIndex = array_rand($arrX, 2);

?>

<?php require "sarah-ortmeyer-nav.php";?>

<div id="so3-stage">
    <div id="so3-left">
        <div id="so3inner" style="background: black; padding: 45px;">
            <h1 style="text-align: center;line-height: 100%; font-size: calc(16px + 4vw);">
                <?php echo $arrX[$randIndex[0]]; ?></h1>
        </div>
        <div id="so3nav">
            <a href="sarah-ortmeyer-3.php">new</a>
            <a onclick="save('aaa<?php echo generateRandomString(); ?>.jpg')">save</a>
        </div>
    </div>



    <div id="so3-right"></div>
</div>

<script>
var thecolor = 0;
var counter = 0;


function setup() {
    var canvas = createCanvas(windowWidth / 2, windowHeight);
    canvas.parent('so3-right');
    mag = random(100);
    particles = random(80);
    background("#bbbbbb");
}

var mag, particles;
var fg;

function draw() {

    noStroke();

    fg = "#aaaaaa";


    fill(fg);
    rectMode(CENTER);

    if (mouseIsPressed) {

        push();
        translate(mouseX, mouseY);
        rotate(radians(frameCount * 7));
        fill(map(sin(radians(frameCount * 8)), -1, 1, 0, 255));
        triangle(0, 0, 60, 160, 0, 60);

        pop();
        push();
        translate(width - mouseX, mouseY);
        rotate(radians(frameCount * 7));
        fill(map(sin(radians(-frameCount * 8)), -1, 1, 0, 255));
        triangle(0, 0, 60, 160, 0, 60);

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