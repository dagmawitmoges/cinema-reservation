<?php
require "connect.php";
$failed = 0;
$passed = 0;
$total = 4;

echo("Restricts Password Length <br>");
echo("------------------------------<br>");
function password_length_checker_test(){
    global $passed;
    global $failed;
    $case_pass = "123456";
    $case_fail = "123";
    
    if(password_check("123") == "password is short"){
        echo("Function is returning correct error message <br>");
        $passed+=1;
    }else{
        echo("Expected to get message 'password is short' but got ==>[ " . password_check($case_fail) . " ]<br>");
        $failed+=1;
    }
    if(password_check("123456") == "password is correct"){
        echo("Function is returning correct success message <br>");
        $passed+=1;
    }else{
        echo("Expected to get message 'password is correct' but got ==>[ " . password_check($case_pass) . " ]<br>");
        $failed+=1;
    }
}

password_length_checker_test(); 

echo("<br>");
echo("<br>");

echo("Checks for empty fields in the form <br>");
echo("------------------------------<br>");
function required_fields_checker(){
    global $passed;
    global $failed;

    if(null_field_check("test", "test", "t", "test@abc.com", "12345", 12345) == "all required fields exist"){
        echo("Function is returning correct success message <br>");
        $passed+=1;
    } else {
        echo("Expected to get message 'all required fields exist' but got ==>[ " . null_field_check("test", "test", "t", "test@abc.com", "12345", 12345) . " ]<br>");
        $failed+=1;
    }

    if (null_field_check("test", "test", "t", "test@abc.com", "", 12345) == "you have missing field/s") {
        echo("Function is returning correct error message <br>");
        $passed+=1;
    } else {
        echo("Expected to get message 'you have missing field/s' but got ==>[ " . null_field_check("test", "test", "t", "test@abc.com", "", 12345) . " ]<br>");
        $failed+=1;
    }
}

required_fields_checker();


echo("<br>");
echo("<br>");

echo($passed . " tests passed, " . $failed . " tests failed, "  . $total . " total tests")
?>