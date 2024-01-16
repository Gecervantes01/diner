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
    echo "This is my Diner";
});

// Run Fat-Free
$f3 ->run();

