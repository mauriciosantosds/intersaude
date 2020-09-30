<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="<?=base_url('assets/images/favicon.png');?>" rel="icon">
        <title>Painel administrativo</title>
        <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css');?>">
        <link rel="stylesheet" href="<?= base_url('assets/css/dash/custom.css');?>">
        <link rel="stylesheet" href="<?= base_url('assets/css/icomoon.css');?>">
        <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap-datepicker.css');?>">
    <style>
     .active {
             background-color: #953132;
     }
     .active a {
         color: #fff !important;
     }
    </style>
    </head>

    <body>

        <body>
            <?php $this->load->view('dash/menu');?>
            <div class="container-fluid">
                <div class="row justify-content-center">
                    
        