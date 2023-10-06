<?php require "header.php";?>


<?php require "gottfried-jaeger-nav.php";?>

<div id="stage">
</div>

<script>
let arr = [];

let img;
let pg, pg2;

function preload() {

    img = loadImage("./media/gj/<?php echo random_int(1, 7); ?>.jpg");

    pg = createGraphics(500, 300);
    pg2 = createGraphics(500, 300);
}

function mouseReleased() {
    if (mouseY > 100) {
        save('aaa<?php echo generateRandomString(); ?>.jpg');
    }
}

function setup() {
    var canvas = createCanvas(windowWidth, windowHeight, WEBGL);
    canvas.parent('stage');
    rectMode(CENTER);
    background(0);
}

let pos = 25;

var fg = "#f1f1f1";
var bg = "#000000";


function draw() {

    // background(map(sin(radians(frameCount)), -1, 1, 0, 255));
    perspective(PI / 3.0, width / height, 0.1, 500000);

    let wave = map(sin(radians(frameCount * 3)), -1, 1, 0, -400);
    pg.imageMode(CENTER);
    pg2.imageMode(CENTER);
    pg.image(img, pg.width / 2 + wave, pg.height / 2);
    pg2.image(img, pg.width / 2, pg.height / 2 + wave);

    var eyeX = width / 2.0;
    var eyeY = height / 2.0;
    var eyeZ = (height / 2.0) / tan(PI * 30.0 / 180.0);
    var centerX = width / 2.0;
    var centerY = height / 2.0;
    var centerZ = 0;
    var upX = 0;
    var upY = 1;
    var upZ = 0;
    camera(eyeX, eyeY, eyeZ, centerX, centerY, centerZ, upX, upY, upZ);

    // background(map(sin(radians(frameCount)), -1, 1, 0, 255));
    imageMode(CENTER);
    fill(fg);
    noStroke();
    frameRate(30);

    // var tilesX = map(mouseX, 0, width, 1, 20);
    // var tilesY = map(mouseY, 0, height, 1, 20);

    var tilesX = 5;
    var tilesY = 5;

    push();



    translate(width / 2, height / 2);
    scale(1.1);
    rotateX(radians(map(mouseY, 0, height, -180, 180)));
    rotateY(radians(map(mouseX, 0, width, -180, 180)));
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
            translate(0, 0);

            var wave4 = map(sin(radians(frameCount + x + y)), -1, 1, -444, 444);

            rotate(radians(x + y * 10 + frameCount * 0.04));
            rotateY(radians(x * 10 + frameCount * 0.04));
            rotateX(radians(x + y * 10 + frameCount * 0.04));
            translate(0, 0);
            push();
            translate(wave4, 0);
            rotate(radians(x * 10 + y * 10));
            if (counter % 2 == 0) {
                image(pg, 0, 0);
            } else {
                image(pg2, 0, 0);
            }
            pop();

            counter++;

        }



    }
    pop();

}


function windowResized() {
    resizeCanvas(windowWidth, windowHeight);
}
</script>

<?php require "footer.php";