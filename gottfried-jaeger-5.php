<?php require "header.php";?>

<div id="reactionsNav" style="bottom: 0; right: 0;">
    <?php require "gottfried-jaeger-sr.php";?>
</div>

<?php require "gottfried-jaeger-nav.php";?>

<div id="stage">
</div>

<script>
let arr = [];

let img;

function preload() {

    img = loadImage("./media/6.jpg");

}



function setup() {
    var canvas = createCanvas(windowWidth, windowHeight, WEBGL);
    canvas.parent('stage');
    rectMode(CENTER);

}

let pos = 25;

var fg = "#f1f1f1";
var bg = "#000000";


function draw() {

    if (mouseX < width / 2) {
        fg = "#f1f1f1";
        bg = "#000000";
    } else {
        fg = "#000000";
        bg = "#f1f1f1";
    }

    var eyeX = width / 2.0 + map(mouseX, 0, width, -10000, 10000);
    var eyeY = height / 2.0 + map(mouseY, 0, height, -10000, 10000);;
    var eyeZ = (height / 2.0) / tan(PI * 30.0 / 180.0) + map(mouseY, 0, width, -1000, 10000);
    var centerX = width / 2.0;
    var centerY = height / 2.0;
    var centerZ = 0;
    var upX = 0;
    var upY = 1;
    var upZ = 0;
    camera(eyeX, eyeY, eyeZ, centerX, centerY, centerZ, upX, upY, upZ);

    background(bg);
    fill(fg);
    noStroke();
    frameRate(30);

    // var tilesX = map(mouseX, 0, width, 1, 20);
    // var tilesY = map(mouseY, 0, height, 1, 20);

    var tilesX = 30;
    var tilesY = 20;

    push();



    translate(width / 2, height / 2);
    scale(5);
    var tileW = width / tilesX;
    var tileH = height / tilesY;
    var counter = 0;


    for (var x = 0; x < tilesX; x++) {
        for (var y = 0; y < tilesY; y++) {
            var wave0 = map(sin(radians(frameCount + x + y)), -1, 1, 0.1, 1);
            var wave1 = map(tan(radians(frameCount + x * 01 + y * 5)), -1, 1, -100, 100);
            var wave2 = map(tan(radians(frameCount + x * 5 + y)), -1, 1, -100, 100);
            var wave3 = map(tan(radians(frameCount + x + y)), -1, 1, -10, 10);

            var w = map(sin(radians(frameCount + x + y)), -1, 1, 0, 1);

            push();

            var posX = map(x * tileW, 0, width, -width / 2, width / 2);
            var posY = map(y * tileH, 0, height, -height / 2, height / 2);
            var posZ = map(y * tileH, 0, height, -height / 2, height / 2);
            translate(posX + wave1, posY + wave2, posZ + wave3);



            sphere(tileW * 0.4 * w);
            pop();

        }



    }
    pop();

}



function mouseWheel(event) {
    print(event.delta);
    //move the square according to the vertical scroll amount
    pos += event.delta * 10;
    //uncomment to block page scrolling
    //return false;
}

function windowResized() {
    resizeCanvas(windowWidth, windowHeight);
}
</script>


<?php require "footer.php";