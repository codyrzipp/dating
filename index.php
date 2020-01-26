<?php
//this is our controller!

//turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//require the autoload file
require_once ('vendor/autoload.php');

//create an instance of the base class
$f3 = Base::instance();

//define a default route
$f3->route('GET /', function() {
    $view = new Template();
    echo $view -> render('views/home.html');
});

//define a profile route
$f3->route('GET /profile', function() {
    $view = new Template();
    echo $view -> render('views/form1.html');
});

//define a form2 route
$f3->route('POST /profile2', function() {
    $view = new Template();
    echo $view -> render('views/form2.html');
});
//run fat free
$f3 -> run();

