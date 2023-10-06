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

    img = loadImage("./media/2.jpg");

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

    perspective(PI / 3.0, width / height, 0.1, 500000);

    directionalLight(255, 255, 255, -1, -1, -1);
    directionalLight(255, 255, 255, -1, -1, -1);

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


    if (mouseX < width / 2) {
        fg = "#ff0000";
        bg = "#f1f1f1";
    } else {
        fg = "#000000";
        bg = "#ff0000";
    }

    background(bg);

    fill(fg);
    noStroke();
    frameRate(30);

    // var tilesX = map(mouseX, 0, width, 1, 20);
    // var tilesY = map(mouseY, 0, height, 1, 20);

    var tilesX = 17;
    var tilesY = 17;

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
            var wave2 = map(tan(radians(frameCount + x * 5 + y)), -1, 1, -11, 11);
            var wave3 = map(tan(radians(frameCount + x + y)), -1, 1, -10, 10);

            var w = map(sin(radians(frameCount + x + y)), -1, 1, 0, 1);

            push();
            texture(img);
            var ww = 200;
            var posX = map(x * tileW, 0, width, ww, ww);
            var posY = map(y * tileH, 0, height, ww, ww);
            var posZ = map(y * tileH, 0, height, ww, ww);
            translate(posX + wave1, posY + wave2 + wave3, posZ);

            var wave4 = map(sin(radians(frameCount + x + y)), -1, 1, -444, 444);

            rotate(radians(x + y * 10 + frameCount * 0.4));
            rotateY(radians(x * 10 + frameCount * 0.4));
            rotateX(radians(x + y * 10 + frameCount * 0.4));
            translate(0, 0);
            box(777, 3, 3);
            push();
            translate(wave4, 0);
            sphere(20 + 20 * w);
            pop();
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