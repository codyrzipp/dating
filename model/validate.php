<?php

function validForm() {
    global $f3;
    $isValid = true;

    if (!validFirst($f3->get('first'))) {

        $isValid = false;
        $f3->set("errors['first']", "Please enter a first name");
    }

    if (!validLast($f3->get('last'))) {

        $isValid = false;
        $f3->set("errors['last']", "Please enter a last name");
    }

    if (!validAge($f3->get('age'))) {

        $isValid = false;
        $f3->set("errors['age']", "Please an age");
    }

    if (!validPhone($f3->get('phone'))) {

        $isValid = false;
        $f3->set("errors['phone']", "Please enter a phone number");
    }

    if (!validEmail($f3->get('email'))) {

        $isValid = false;
        $f3->set("errors['email']", "Please enter an email");
    }

    if (!validActivities('activities')) {
        $isValid = false;
        $f3 -> set("errors['activities']", "Please select activities");
    }
    return $isValid;
}

function validFirst($first)
{
    return !empty($first)
        && ctype_digit($first)
        && $first >= 1;
}

function validLast($last)
{
    return !empty($last)
        && ctype_digit($last)
        && $last >= 1;
}
function validAge($age)
{
    return !empty($age)
        && $age <= 118
        && $age >= 18;
}

function validPhone($phone)
{
    return !empty($phone)
        && $phone == 10;

}

function validEmail($email)
{
    return !empty($email)
        && ctype_alpha($email);
}

function validActivities($activities) {
//    global $f3;
    return !empty($activities);
}