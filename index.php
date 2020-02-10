<?php
//this is our controller!

session_start();
//turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//require the autoload file
require_once ('vendor/autoload.php');
require_once ('model/validate.php');

//create an instance of the base class
$f3 = Base::instance();

//define a default route
$f3->route('GET /', function() {
    $view = new Template();
    echo $view -> render('views/home.html');
});

//define a profile route
$f3->route('GET|POST /profile', function($f3) {
    //If form has been submitted, validate
    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        //Get data from form
        $first = $_POST['first'];
        $last = $_POST['last'];
        $age = $_POST['age'];
        $phone = $_POST["phone"];

        //Add data to hive
        $f3->set('first', $first);
        $f3->set('last', $last);
        $f3->set('age', $age);
        $f3->set('phone', $phone);

        //If data is valid
        if (validForm()) {
            $_SESSION['first'] = $first;
            $_SESSION['last'] = $last;
            $_SESSION['age'] = $age;
            $_SESSION['phone'] = $phone;

            //Redirect to Summary
            $f3->reroute('views/form1.html');
        }
    }
    $view = new Template();
    echo $view -> render('views/form1.html');
});

//define a form2 route
$f3->route('GET|POST /profile2', function($f3) {
    var_dump($_POST);


    $view = new Template();
    echo $view -> render('views/form2.html');
});

//define a form3 route
$f3->route('POST /profile3', function($f3) {
    var_dump($_POST);
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['state'] = $_POST['state'];
    $_SESSION['seeking'] = $_POST['seeking'];
    $_SESSION['bio'] = $_POST['bio'];
    $f3 -> set('email', $email);
    $view = new Template();
    echo $view -> render('views/form3.html');
});

//define a summary route
$f3 -> route('POST /summary', function($f3) {
    var_dump($_POST);
    $string = "";
    for($i = 0; $i < count($_POST['activities']); $i++) {
        $string .= $_POST['activities'][$i]." ";
    }
    $_SESSION['activities'] = $string;
    $f3 -> set('activities', $activities);
    $view = new Template();
    echo $view -> render('views/results.html');
});
//run fat free
$f3 -> run();

