<?php
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
    if (!isset($age) || !ctype_alpha($age) || $age != htmlspecialchars($age) || $age < 118 || $age > 18) {
        return false;
    }
    return true;
}

function validGender($gender)
{
    if (!isset($gender)) {
        return false;
    }
    return true;
}

function validPhone($phone)
{

    if (trim($phone) === "" || !ctype_alpha($phone) || $phone != htmlspecialchars($phone) || strlen($phone) != 10) {
        return false;
    }
    return true;
}


function validEmail($email)
{

    if (trim($email) === "" || !filter_var($email, FILTER_VALIDATE_EMAIL)|| $email != htmlspecialchars($email)) {
        return false;
    }
    return true;
}


function validIndoor($indoor) {
    return !empty($indoor);
}

function validOutdoor($outdoor) {
    return !empty($outdoor);
}