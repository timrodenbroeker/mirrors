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

let pos = -2225;
let capture;

function setup() {
    var canvas = createCanvas(windowWidth, windowHeight);
    canvas.parent('stage');
    capture = createCapture(VIDEO);
    capture.size(16, 16);
    //capture.hide();
    imageMode(CENTER);


}


function draw() {


    background("#000000");

    var tilesX = capture.width;
    noStroke();
    var tilesY = capture.height;


    var tileW = width / tilesX;
    var tileH = height / tilesY;

    push();

    translate(-tileW, 0);
    for (var x = 0; x < tilesX; x++) {
        for (var y = 0; y < tilesY; y++) {

            var waveX = map(tan(radians(frameCount * 3 + x * 2 + y * 4)), -1, 1, -10, 10);
            var waveZ = map(sin(radians(frameCount * 3 + x * 22 + y * 22)), -1, 1, -100, 100);
            var posX = map(x, 0, capture.width, width, 0);
            var posY = map(y, 0, capture.height, 0, height);


            var b = map(brightness(capture.get(Math.floor(x), Math.floor(y))), 0, 255, 0, 1);


            // fill(map(b, 0, 1, 0, 255));

            fill(capture.get(Math.floor(x), Math.floor(y)));

            push();
            translate(posX, posY);

            rect(0, 0, tileW, tileH);


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

function mouseReleased() {
    if (mouseY > 100) {
        save('aaa<?php echo generateRandomString(); ?>.jpg');
    }
}
</script>


<?php require "footer.php";