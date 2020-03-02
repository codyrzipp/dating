<?php
//require ("model/validation.php");
class Validate
{
    private $_f3;

    function __construct($f3)
    {
        $this->_f3 = $f3;
        $this->_f3->set('states', array('Alabama', 'Alaska', 'Arizona', 'Arkansas', 'California',
            'Colorado', 'Connecticut', 'Delaware', 'Florida', 'Georgia', 'Hawaii', 'Idaho',
            'Illinois', 'Indiana', 'Iowa', 'Kansas', 'Kentucky', 'Louisiana', 'Maine',
            'Maryland', 'Massachusetts', 'Michigan', 'Minnesota', 'Mississippi', 'Missouri',
            'Montana', 'Nebraska', 'Nevada', 'New Hampshire', 'New Jersey', 'New Mexico',
            'New York', 'North Carolina', 'North Dakota', 'Ohio', 'Oklahoma', 'Oregon',
            'Pennsylvania', 'Rhode Island', 'South Carolina', 'South Dakota', 'Tennessee',
            'Texas', 'Utah', 'Vermont', 'Virginia', 'Washington', 'West Virginia',
            'Wisconsin', 'Wyoming'));
        $this->_f3->set('indoor', array('tv', 'movies', 'cooking', 'board games', 'puzzles', 'reading', 'playing cards',
            'video games'));
        $this->_f3->set('outdoor', array('hiking', 'biking', 'swimming', 'collecting', 'walking', 'climbing', 'sports'));
    }

    function validPerson($first, $last, $age)
    {
        $isValid = true;

        if (!validFirst($first)) {

            $isValid = false;
            $this->_f3->set("errors['first']", "Please enter a first name");
        }

        if (!validLast($last)) {

            $isValid = false;
            $this->_f3->set("errors['last']", "Please enter a last name");
        }

        if (!validAge($age)) {

            $isValid = false;
            $this->_f3->set("errors['age']", "Please an age");
        }

        return $isValid;
    }

    function validInfo($email)
    {
        $isValid = true;

        if (validEmail($email)) {
            $isValid = true;
            $_SESSION['member']->setEmail($email);
        } else {
            $isValid = false;
            $this->_f3->set('error["email"]', 'Please enter a valid email');
        }
        return $isValid;
    }

    function validActivities($indoor, $outdoor)
    {

//        if (isset($interest)) {
//            if (!validIndoor($interest) || !validOutdoor($interest)) {
//                $_SESSION['member']->setInterestArray(implode(', ', $interest));
//            }
//        }
    }
}

    function validFirst($first)
    {
        $name = trim($first);
        if (!isset($name) || !ctype_alpha($name) || $name != htmlspecialchars($name)) {
            return false;
        }
        return true;
    }

    function validLast($last)
    {
        $name = trim($last);
        if (!isset($name) || !ctype_alpha($name) || $name != htmlspecialchars($name)) {
            return false;
        }
        return true;
    }

    function validAge($age)
    {
        $age = trim($age);
        if (!isset($age) || ctype_alpha($age) || $age != htmlspecialchars($age) || !($age < 118 && $age > 18)) {
            return false;
        }
        return true;
    }


    function validEmail($email)
    {

        if (trim($email) === "" || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        return true;
    }


    function validIndoor($indoor)
    {
        return !empty($indoor);
    }

    function validOutdoor($outdoor)
    {
        return !empty($outdoor);
    }
