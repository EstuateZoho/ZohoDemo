<?php

session_start();

$org_name = $_REQUEST['org_name'];
$_SESSION['org_name'] = $org_name;

$_SESSION['bill_to_email'] = $_REQUEST['bill_to_email'];
$_SESSION['bill_to_display_name'] = $_REQUEST['bill_to_display_name'];
$_SESSION['bill_to_first_name'] = $_REQUEST['bill_to_first_name'];
$_SESSION['bill_to_last_name'] = $_REQUEST['bill_to_last_name'];
$_SESSION['bill_to_pnum'] = $_REQUEST['bill_to_pnum'];
$_SESSION['bill_to_add_one'] = $_REQUEST['bill_to_add_one'];
$_SESSION['bill_to_add_two'] = $_REQUEST['bill_to_add_two'];
$_SESSION['bill_to_country'] = $_REQUEST['bill_to_country'];

if($_SESSION['bill_to_country'] == "U.S.A" || $_SESSION['bill_to_country'] == "Canada"){
    $_SESSION['bill_to_stateD'] = $_REQUEST['bill_to_stateD'];
}else{
    $_SESSION['bill_to_stateT'] = $_REQUEST['bill_to_stateT'];
}
$_SESSION['bill_to_city'] = $_REQUEST['bill_to_city'];
$_SESSION['bill_to_pcode'] = $_REQUEST['bill_to_pcode'];
$_SESSION['sold_to_pcode'] = $_REQUEST['sold_to_pcode'];

$_SESSION['sold_to_add_one'] = $_REQUEST['sold_to_add_one'];
$_SESSION['sold_to_add_two'] = $_REQUEST['sold_to_add_two'];
$_SESSION['sold_to_country'] = $_REQUEST['sold_to_country'];
$_SESSION['sold_to_city'] = $_REQUEST['sold_to_city'];


if($_SESSION['sold_to_country'] == "U.S.A" || $_SESSION['sold_to_country'] == "Canada"){
    if(!isset($_REQUEST['sold_to_stateD'])){
        $_SESSION['sold_to_stateD'] = $_REQUEST['bill_to_stateD'];
    }else{
        $_SESSION['sold_to_stateD'] = $_REQUEST['sold_to_stateD'];
    }
}else{
    $_SESSION['sold_to_stateT'] = $_REQUEST['sold_to_stateT'];
}

//return true;
//header('Location: ../checkOut.php');
header('Location: ../intermediate.php');
?>
