<?php
//this is our controller!
//turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//require the autoload file
require('vendor/autoload.php');
require('model/validate.php');

session_start();

//create an instance of the base class
$f3 = Base::instance();

$routes = new Routes($f3);
$validation = new Validate($f3);

//define a default route
$f3->route('GET /', function () {
    $GLOBALS['routes']->home();
});

//define a profile route
$f3->route('GET|POST /profile', function () {
    $GLOBALS['routes']->profile();
});

//define a form2 route
$f3->route('GET|POST /information', function ($f3) {
    $GLOBALS['routes']->personalInfo();
});

//define a form3 route
$f3->route('GET|POST /interests', function () {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $validActiv = $GLOBALS['validation']->validActivities($_POST['indoor'], $_POST['outdoor']);
//        $GLOBALS['validation']->validActiv($_POST['outdoor']);
    }
    $GLOBALS['routes']->interests();
});

//define a summary route
$f3->route('POST|GET /results', function () {
    $GLOBALS['routes']->results();

});

$f3->route('GET /admin', function() {
    $GLOBALS['routes']->admin();
});
//run fat free
$f3->run();

