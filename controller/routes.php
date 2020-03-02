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
        $_SESSION = array();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $first = $_POST['first'];
            $last = $_POST['last'];
            $age = $_POST['age'];
            $prem = $_POST['premium'];

            $this->_f3->set('first', $first);
            $this->_f3->set('last', $last);
            $this->_f3->set('age', $age);
            $this->_f3->set('premium', $prem);

            $validPerson = $GLOBALS['validation']->validPerson($_POST['first'], $_POST['last'], $_POST['age']);
            var_dump($_POST['premium']);
            if ($validPerson) {
                if ($_POST['premium'] == 'premium') {
                    $member = new PremiumMembers($_POST['first'], $_POST['last'], $_POST['age']);

                } else {
                    $member = new Members($_POST['first'], $_POST['last'], $_POST['age']);
                }
                $_SESSION['member'] = $member;
                $this->_f3->reroute('/information');
            }
        }
        $view = new Template();
        echo $view->render("views/form1.html");
    }

    function personalInfo()
    {
//        var_dump($_SESSION['member']);
//        var_dump($_SESSION['premium']);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $validInfo = $GLOBALS['validation']->validInfo($_POST['email']);
            if ($validInfo) {

                if ($_SESSION['premium'] === true) {
                    var_dump($_SESSION['premium']);
                    $this->_f3->reroute('/interests');
                } else {
                    $this->_f3->reroute('/results');
                }
            }
        }
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
        var_dump($_SESSION['member']);
        echo $view->render("views/results.html");
    }
    function admin()
    {
        $member = $GLOBALS['db']->getMembers();
        //Add the student object to the hive, and display the view
        $this->_f3->set('member', $member);
        $view = new Template();
        echo $view->render("views/admin.html");
    }
}