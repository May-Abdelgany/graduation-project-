<?php

namespace App\Http\Misc\Helpers;

class Errors
{
    //records errors
    const EXISTS = "Record already exists!";
    const NOT_EXISTS = "Record not exists!";

    // general errors
    const TESTING  = 'Invalid parameter.';
    const UNAUTHENTICATED  = 'Unauthenticated.';
    const UNAUTHORIZED = 'Unauthorized.';
    const GENERAL = "General error ,try again later!";
    const ERROR = "Don't Have Permission For That";
    //sent email
    const CODE = "Invalid code!";
    const SIGNUP = "error in sign up";
    const ExamNotExist = "code of exam is not exist!";
}
