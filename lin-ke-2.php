<?php require "header.php";?>


<?php require "lin-ke-nav.php";?>

<style>
#stage {
    cursor: url('cursor.png'), auto;
}

video {
    display: none;
}
</style>
<div id="stage">
</div>


<script>
function preload() {

}

function mouseReleased() {
    if (mouseY > 100) {
        save('aaa<?php echo generateRandomString(); ?>.jpg');
    }
}
let pos = -2225;
let capture;

function setup() {
    var canvas = createCanvas(windowWidth, windowHeight, WEBGL);
    canvas.parent('stage');
    capture = createCapture(VIDEO);
    capture.size(16, 16);
    //capture.hide();
    imageMode(CENTER);


}


function draw() {

    var eyeX = width / 2.0 + map(mouseX, 0, width, 5000, -5000);
    var eyeY = height / 2.0 + map(mouseY, 0, height, 5000, -5000);
    var eyeZ = (height / 2.0) / tan(PI * 30.0 / 180.0) - pos;
    var centerX = width / 2.0;
    var centerY = height / 2.0;
    var centerZ = 0;
    var upX = 0;
    var upY = 1;
    var upZ = 0;
    camera(eyeX, eyeY, eyeZ, centerX, centerY, centerZ, upX, upY, upZ);
    perspective(PI / 3.0, width / height, 0.1, 500000);
    background("#000000");

    var tilesX = capture.width;
    noStroke();
    var tilesY = capture.height;


    var tileW = width / tilesX;
    var tileH = height / tilesY;

    push();
    translate(width / 2, height / 2);
    // rotateY(radians(frameCount * 3));


    for (var x = 0; x < tilesX; x++) {
        for (var y = 0; y < tilesY; y++) {

            var waveX = map(tan(radians(frameCount * 3 + x * 2 + y * 4)), -1, 1, -10, 10);
            var waveZ = map(sin(radians(frameCount * 3 + x * 22 + y * 22)), -1, 1, -100, 100);
            var posX = map(x, 0, capture.width, 0 - width / 2, width - width / 2);
            var posY = map(y, 0, capture.height, 0 - height / 2, height - height / 2);


            var b = map(brightness(capture.get(Math.floor(x), Math.floor(y))), 0, 255, 0, 1);


            fill(map(b, 0, 1, 0, 255));

            // fill(capture.get(Math.floor(x), Math.floor(y)));

            push();
            translate(posX, posY, b * 4444);
            rotateY(radians(map(sin(radians(frameCount + x * 13 + y)), -1, 1, -50, 50)));

            triangle(0, 0, tileW, tileH, 0, tileH);

            pop();

        }
    }


    pop();

    // image(capture, 0, 0, 320, 240);

}


function mouseWheel(event) {
    print(event.delta);
    //move the square according to the vertical scroll amount
    pos += event.delta * -110;
    //uncomment to block page scrolling
    //return false;
}

function windowResized() {
    resizeCanvas(windowWidth, windowHeight);
}
</script>


<?php require "footer.php";