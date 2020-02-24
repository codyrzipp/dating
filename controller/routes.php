<?php
class Routes
{
    private $_f3;

    function __construct($f3)
    {
        $this->_f3 = $f3;
    }

    function home()
    {
        $view = new Template();
        echo $view->render("views/home.html");
    }

    function profile()
    {
        $view = new Template();
        echo $view->render("views/form1.html");
    }

    function personalInfo()
    {
        $view = new Template();
        echo $view->render("views/form2.html");
    }
    function interests()
    {
        $view = new Template();
        echo $view->render("views/form3.html");
    }
    function results()
    {
        $view = new Template();
        echo $view->render("views/results.html");
    }
}