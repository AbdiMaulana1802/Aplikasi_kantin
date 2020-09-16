<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">


    <style type="text/css">
    body {
        width: 100%;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        /* background: #8A2BE2; */
        background-image: url("<?php echo base_url('assets/img/warung.jpg'); ?>");
        background-repeat: no-repeat;
        background-size: 100%;
        /* background: -webkit-linear-gradient(left, rgb(138, 137, 137), rgb(87, 87, 87)); */
    }



    .form {
        width: 600px;
        height: 490px;
        margin: 0 auto;
        position: relative;
        background: rgb(0, 0, 0, 0.4);
        text-align: center;
        margin-top: 60px;
        padding: 35px;
        border: 3px solid #fff;
        -webkit-border-radius: 70px 0 70px 0;
        -moz-border-radius: 70px 0 70px 0;
        border-radius: 70px 0 70px 0;
        /* position: relative;
        width: 640px;
        height: 100%;
        padding: 50px 30px;
        margin-left: 400px; */
    }



    h2 {
        width: 100%;
        font-size: 40px;
        text-align: center;
        color: tomato;


    }

    label {
        display: block;
        width: 260px;
        margin: 25px auto;
        margin-top: 46px;
        text-align: left;
        color: #fff;
    }

    label span {
        font-size: 25px;
        font-weight: 600;
        text-transform: uppercase;

    }

    input {
        width: 115%;
        height: 40px;
        border-radius: 15px 0 15px 0;
        border: 2px solid #fff;
        margin-bottom: 8px;
        background-color: transparent;
        color: #fff;
    }

    button {
        display: block;
        margin: 0 auto;
        width: 270px;
        height: 36px;
        cursor: pointer;
        color: red;
        background-color: red;
    }

    .btn {
        margin-top: 10px;
        margin-left: 40px;
        text-transform: uppercase;
        font-weight: 600;
        border-radius: 30px;
    }

    .forgot {
        margin-top: 15px;
        text-align: center;
        font-size: 14px;
        font-weight: 600;
        color: tomato;
        cursor: pointer;
        font-style: italic;
    }

    .forgot:hover {
        color: red;
    }

    .sign-up {
        margin-top: 15px;
        text-align: center;
        font-size: 14px;
        font-weight: 600;
        color: red;
        /* color: rgb(66, 66, 66); */
        cursor: pointer;
    }

    .sign-up:hover {
        color: dodgerblue;
        text-decoration: underline;
    }


    .link ul li {
        display: inline;
        margin-right: 50px;
    }

    .link {
        margin: auto;
        text-align: center;
    }

    .link ul li a {
        color: white;
        text-decoration: none;
        font-weight: bold;
        font-size: 25px;

    }
    </style>
    <title>Login</title>
</head>

<body>