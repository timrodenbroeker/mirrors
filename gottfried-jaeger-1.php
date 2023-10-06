<?php require "header.php";?>

<?php require "gottfried-jaeger-nav.php";?>

<div id="stage">
</div>

<script>
let arr = [];

let img;

function preload() {

    img = loadImage("./media/gj/<?php echo random_int(1, 7); ?>.jpg");

}

function mouseReleased() {
    if (mouseY > 100) {
        save('aaa<?php echo generateRandomString(); ?>.jpg');
    }
}

let pg;

function setup() {
    var canvas = createCanvas(windowWidth, windowHeight);
    canvas.parent('stage');
    rectMode(CENTER);
    pg = createGraphics(width, height / 2);
}



var fg = "#f1f1f1";
var bg = "#000000";


function draw() {


    background(0);
    fill(fg);
    noStroke();


    var tilesX = 5;
    var tilesY = 2;
    imageMode(CORNER);

    push();
    translate(width / 2, height / 2);
    pg.clear();
    pg.imageMode(CENTER);
    pg.push();

    pg.push();
    pg.scale(map(mouseY, 0, width, 0.7, 1.2));
    pg.rotate(radians(90 + frameCount));
    pg.image(img, map(sin(radians(frameCount)), -1, 1, 0, -1000), 0);
    pg.pop();
    pg.pop();

    var tileW = width / tilesX;
    var tileH = height / tilesY;

    var counter = 0;
    for (var x = 0; x < tilesX; x++) {
        for (var y = 0; y < tilesY; y++) {

            push();

            rotate(radians(counter * mouseX * 0.1));
            image(pg, 0, 0);
            pop();
            counter++;
        }



    }
    pop();

}

let pos = 0;

function mouseWheel(event) {
    print(event.delta);
    //move the square according to the vertical scroll amount
    pos += event.delta * -5;
    //uncomment to block page scrolling
    //return false;
}


function windowResized() {
    resizeCanvas(windowWidth, windowHeight);
}
</script>


<?php require "footer.php";