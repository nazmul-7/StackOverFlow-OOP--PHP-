<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/includes/css/bootstrap.min.css">
    <link href="<?php echo BASE_URL; ?>/includes/css/offcanvas.css" rel="stylesheet"> -->

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.15/css/mdb.min.css" rel="stylesheet">
    
    
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo BASE_URL; ?>/includes/css/main.css" />
    
</head>
<body>

<?php
    session::start();
    $nav='navber';
    if(session::get("login") == true){
        if(session::get("userType")== 1){
             $nav ='adminNavber';
           
        }
      
    }
   
?>

<?php  include_once('views/partials/'.$nav.'.php'); ?>
