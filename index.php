<?php

/* Giovan Cervantes
 * January 2024
 * https://gecervantes.greenriverdev.com/328/diner/
 * This is my CONTROLLER for the diner app
*/

// Turn on all error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Require the autoload file
require_once('vendor/autoload.php');

// Instantiate the Fat-Free framework (F3)
$f3 = Base::instance();

// Define a default route
$f3 ->route('GET /', function() {

    // Display a view page
    $view = new Template();
    echo $view -> render('views/home.html');
});

$f3 ->route('GET /breakfast', function() {

    //echo "Breakfast";
    // Display a view page
    $view = new Template();
    echo $view -> render('views/breakfast-menu.html');
});

$f3 ->route('GET|POST /order1', function($f3) {
    // If form has been posted
    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        // validate the data
        $food = $_POST['food'];
        $meal = $_POST['meal'];

        // put the data in the session array
        $f3->set('SESSION.food', $food);
        $f3->set('SESSION.meal', $meal);

        // redirect to order2 route
        $f3->reroute('order2');
    }

    // Display a view page
    $view = new Template();
    echo $view -> render('views/order-form-1.html');
});

$f3 ->route('GET|POST /order2', function($f3) {
    // If form has been posted

    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        // validate the data

        $condiment = $_POST['conds[].value'];

        // put the data in the session array
        $f3->set('SESSION.conds', $condiment);

        // redirect to order2 route
        $f3->reroute('summary');
    }

    // Display a view page
    $view = new Template();
    echo $view -> render('views/order-form-2.html');
});

$f3 ->route('GET /summary', function() {

    // Display a view page
    $view = new Template();
    echo $view -> render('views/order-summary.html');
});

// Run Fat-Free
$f3 ->run();

