<?php session_start(); ?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Taviraj&display=swap" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=w22fesakkdz0snzdmlhx3l7rghzai4755s282iw70fhxmqn8"></script>
<script src="https://cdn.tiny.cloud/1/w22fesakkdz0snzdmlhx3l7rghzai4755s282iw70fhxmqn8/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" rel="stylesheet" type="text/css">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jq-3.3.1/jszip-2.5.0/dt-1.10.20/af-2.3.4/b-1.6.1/b-colvis-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/cr-1.5.2/fc-3.3.0/fh-3.1.6/kt-2.5.1/r-2.2.3/rg-1.1.1/rr-1.2.6/sc-2.0.1/sp-1.0.1/sl-1.3.1/datatables.min.css"/>


<style>
body{
    font-family: 'Taviraj', serif;
   background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);
   margin-top: 100px;
   margin-bottom: 100px;
}
a{
    font-size: 18px;
}
.footer{
display: flex;
justify-content: space-between;

position: fixed;
bottom: 0%;
background-color: white;
width: 100%;
padding: 1% 0.5% 0;
z-index: 99;
opacity: 90%;
}
#showcomment{
    border-width: 2px;
    border-style: solid;
    border-color: #ffc107;
    transition:   ease-in-out;
}
#showcomment:hover{
    border-width: 5px;
    border-style: solid;
    border-color: white;
}
.profile{
        position: fixed;
        top: 50%;
        right: 0;
        z-index: 99;
    }
    .fa-user-circle{
        color: blue;
    }
 .fa-user-circle:hover{
        color: red;
    }



</style>
