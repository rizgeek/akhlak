<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title><?=NAMA_WEB?></title>

    <!-- Fontfaces CSS-->
    <link href="<?=base_url('assets/')?>css/font-face.css" rel="stylesheet" media="all">
    <link href="<?=base_url('assets/')?>vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="<?=base_url('assets/')?>vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="<?=base_url('assets/')?>vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="<?=base_url('assets/')?>vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="<?=base_url('assets/')?>vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="<?=base_url('assets/')?>vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="<?=base_url('assets/')?>vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="<?=base_url('assets/')?>vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="<?=base_url('assets/')?>vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="<?=base_url('assets/')?>vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="<?=base_url('assets/')?>vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">


    <!-- Jquery JS-->
    <script src="<?=base_url('assets/')?>vendor/jquery-3.2.1.min.js"></script>

    <!-- Main CSS-->
    <link href="<?=base_url('assets/')?>css/theme.css" rel="stylesheet" media="all">

    <!-- SweatAlert -->
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- datatable -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>

</head>

<body class="animsition">
    <div class="page-wrapper">

<script><?=$this->session->flashdata('PESAN');?></script>
