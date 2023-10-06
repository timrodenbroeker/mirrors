<?php require "header.php";?>

<div id="reactionsNav" style="bottom: 0; right: 0;">

    <?php require "gottfried-jaeger-sr.php";?>
</div>

<?php require "gottfried-jaeger-nav.php";?>

<div id="stage">
</div>

<script>
function mapRange(value, low1, high1, low2, high2) {
    return low2 + (high2 - low2) * (value - low1) / (high1 - low1);
}

function getScrollPercent() {
    var h = document.documentElement,
        b = document.body,
        st = 'scrollTop',
        sh = 'scrollHeight';
    return (h[st] || b[st]) / ((h[sh] || b[sh]) - h.clientHeight) * 100;
}





var a;
var flick;
var b;
var rotation;

function setup() {

    var myCanvas = createCanvas(document.body.clientWidth, windowHeight, WEBGL);
    myCanvas.parent("stage");
    a = 22;
    b = 55;


    noStroke();
    frameRate(30);
}


function draw() {

    if (mouseX < width / 2) {
        fg = "#000000";
        bg = "#f1f1f1";
    } else {
        fg = "#f1f1f1";
        bg = "#000000";
    }

    background(bg);

    x = sin(a) * cos(a * 1.1) + sin(radians(b * 0.4)) * width;
    y = cos(a) * cos(a * 2.1) * height;
    z = sin(a) * cos(a * 11) * width / 8;

    scale(2);

    rotation = map(sin(a / 5), -1, 1, 0, 100);


    //    ambientMaterial(140);


    fill('#ffffff');


    directionalLight(255, 255, 255, -1, 0, 0);
    directionalLight(255, 255, 255, -1, 0, 0);
    //          rotateY(radians(map(getScrollPercent(),0,100,45+180,360+45+180)));
    rotateY(radians(map(mouseX, 0, windowWidth, 0, 180)));
    for (var i = 0; i < 200; i++) {

        rotateX(radians(b / 100));

        push();
        rotateX(radians(b) * 0.15);
        rotateY(radians(i * 2));

        var motion = map(sin(radians(frameCount)), -1, 1, -width / 4, width / 4);

        translate(i + motion, i, i);
        box(i * 2, 10, 2);
        pop();
    }
    a += 0.01;
    b++;
}

function windowResized() {
    resizeCanvas(windowWidth, windowHeight);
}

function windowResized() {
    resizeCanvas(windowWidth, windowHeight);
}
</script>

<?php require "footer.php";