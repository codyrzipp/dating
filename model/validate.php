<?php

class validate
{
    private $_f3;
    function __construct($f3)
    {
        $this->_f3=$f3;
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
}
function validPerson($first, $last, $age, $gender, $phone, $prem)
{
    $isValid = true;

    $this->_f3->set('first', $first);
    $this->_f3->set('last', $last);
    $this->_f3->set('age', $age);
    $this->_f3->set('gender', $gender);
    $this->_f3->set('phone', $phone);
    if (!validFirst($first)) {

        $this->_f3->set("errors['first']", "Please enter a first name");
        $isValid = false;
    }

    if (!validLast($last)) {

        $this->_f3->set("errors['last']", "Please enter a last name");
        $isValid = false;
    }

    if (!validAge($age)) {

        $this->_f3->set("errors['age']", "Please an age");
        $isValid = false;
    }

    if (!validPhone($phone)) {

        $this->_f3->set("errors['phone']", "Please enter a phone number");
        $isValid = false;
    }
    if (!validGender($gender)) {

        $this->_f3->set("errors['gender']", "Please enter an email");
        $isValid = false;
    }
    if ($isValid) {
        if ($prem == 'premium') {
            $_SESSION['member'] = new PremiumMembers($first, $last, $age, $gender, $phone);
            $_SESSION['premium'] = true;
        } else {
            $_SESSION['member'] = new Members($first, $last, $age, $gender, $phone);
            $_SESSION['premium'] = false;
        }
        $this->_f3->reroute('/profile');
    }
}

function validInfo($email, $state, $seeking, $bio)
{
    $this->_f3->set('email', $email);
    $this->_f3->set('state', $state);
    $this->_f3->set('seeking', $seeking);
    $this->_f3->set('bio', $bio);
    if(isset($seeking)){
        $_SESSION['member']->setSeeking($seeking);
    }

    if(!empty($bio)){
        $_SESSION['member']->setBio($bio);
    }
    $_SESSION['member']->setState($state);


    if(validEmail($email)){
        $_SESSION['member']->setEmail($email);
        if($_SESSION['premium']){
            $this->_f3->reroute('/interests');
        }
        else{
            $this->_f3->reroute('/results');
        }
    }
    else{
        $this->_f3->set('error["mail"]','Please enter a valid email');
    }
}

function validActivities($interest)
{
    if (isset($interest)) {
        if (!validIndoor($interest) || !validOutdoor($interest)) {
            $_SESSION['member']->setInterestArray(implode(', ', $interest));
        }
    }
}