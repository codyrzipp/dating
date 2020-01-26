<?php
//this is our controller!

session_start();
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
    var_dump($_POST);
    $_SESSION['first'] = $_POST['first'];
    $_SESSION['last'] = $_POST['last'];
    $_SESSION['age'] = $_POST['age'];
    $_SESSION['gender'] = $_POST['gender'];
    $_SESSION['phone'] = $_POST['phone'];
    $view = new Template();
    echo $view -> render('views/form2.html');
});

//define a form3 route
$f3->route('POST /profile3', function() {
    var_dump($_POST);
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['state'] = $_POST['state'];
    $_SESSION['seeking'] = $_POST['seeking'];
    $_SESSION['bio'] = $_POST['bio'];
    $view = new Template();
    echo $view -> render('views/form3.html');
});

//define a summary route
$f3 -> route('POST /summary', function() {
    var_dump($_POST);
    $string = "";
    for($i = 0; $i < count($_POST['indoor']); $i++) {
        $string .= $_POST['indoor'][$i]." ";
    }
    $_SESSION['indoor'] = $string;

    $string1 = "";
    for ($j = 0; $j < count($_POST['outdoor']); $j++) {
        $string1 .= $_POST['outdoor'][$i]." ";
    }
    $_SESSION['outdoor'] = $string1;
    $view = new Template();
    echo $view -> render('views/results.html');
});
//run fat free
$f3 -> run();

