<?php if(!isset($_SESSION['name'])){ header("Location: /HMS/");}

?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <title>HMS - Admin Panel</title>
   
    <link href="/HMS/dashboard/admin/css/style.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.css" rel="stylesheet">
    <style>
        .show {
            border:3px solid green;
        }
    </style>
</head>
<body> 