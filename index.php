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

//define a form3 route
$f3->route('POST /profile3', function() {
    $view = new Template();
    echo $view -> render('views/form3.html');
});

//define a summary route
$f3 -> route('POST /summary', function() {
//    var_dump($_POST);
//    $_SESSION['order'] = $_POST['food'];
    $view = new Template();
    echo $view -> render('views/results.html');
});
//run fat free
$f3 -> run();

