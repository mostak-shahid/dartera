/**
 * @Script js for (Template/Project Name)
 *
 * @project     - Project Name
 * @author      -
 * @created_by  -
 * @created_at  -
 * @modified_by -
 */

/**
 * ========================================================
 * this function execute when window properly loaded
 * ===========================================================
 */

// $(window).on("load", function () {
//     // code should be execute here
// });

/**
 * ========================================================
 * this function execute when DOM element ready
 * ===========================================================
 */

// Stepper lement
var element = document.querySelector("#kt_stepper_example_vertical");

// Initialize Stepper
var stepper = new KTStepper(element);

// Handle next step
stepper.on("kt.stepper.next", function (stepper) {
    stepper.goNext(); // go next step
});

// Handle previous step
stepper.on("kt.stepper.previous", function (stepper) {
    stepper.goPrevious(); // go previous step
});


//signature

var square = document.getElementById("drawPlace");
var paper = square.getContext("2d");
var pressedMouse = false;
var x;
var y;
var colorLine = "#9ACD32";
var key = { C: 67 };

document.addEventListener("mousedown", startDrawing);
document.addEventListener("mousemove", drawLine);
document.addEventListener("mouseup", stopDrawing);
document.addEventListener("keydown", clearCanvas);

function startDrawing(eventvs01) {
    pressedMouse = true;
    x = eventvs01.offsetX;
    y = eventvs01.offsetY;
}

function drawLine(eventvs02) {
    if (pressedMouse) {
        document.getElementById("drawPlace").style.cursor = "crosshair";
        var xM = eventvs02.offsetX;
        var yM = eventvs02.offsetY;
        drawing_line(colorLine, x, y, xM, yM, paper);
        x = xM;
        y = yM;
    }
}

function stopDrawing(eventvs03) {
    pressedMouse = false;
    document.getElementById("drawPlace").style.cursor = "default";
}

function clearCanvas(whenPressKey) {
    if (whenPressKey.keyCode == key.C) {
        paper.clearRect(0, 0, square.width, square.height);
    }
}

drawing_line("#FF6347", x - 1, y, x, y, paper);

function drawing_line(color, x_start, y_start, x_end, y_end, board) {
    board.beginPath();
    board.strokeStyle = color;
    board.lineWidth = 2;
    board.moveTo(x_start, y_start);
    board.lineTo(x_end, y_end);
    board.stroke();
    board.closePath();
}

jQuery(document).ready(function ($) {
    $(".btn-submit").click(function () {
        $(".final-steps").addClass("completed").removeClass("current");
    });





});
