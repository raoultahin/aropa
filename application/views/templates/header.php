<!DOCTYPE html>
<html>
<head>
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/materialize.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css"/>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/datatables.min.css"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta charset="utf-8">
    <title>Index.html</title>
</head>

<body>

<div class="conteneur">
    <!-- header -->
    <header>
        <nav class="top-nav">
            <div style="padding-left: 20px">
                <div class="nav-wrapper"><a class="page-title"><?php echo $titre ?></a></div>
            </div>
        </nav>
        <!-- side-nav -->
        <a href="#" data-activates="slide-out" class="button-collapse top-nav full hide-on-large-only"><i class="material-icons">menu</i></a>
        <ul id="slide-out" class="side-nav fixed blue-grey darken-3 collapsible" data-collapsible="accordion" style="overflow: auto;">
            <div class="logo">
                <img class="circle" src="<?php echo base_url(); ?>assets/images/logo-aropa.png" alt="logo"/>
            </div>
            <li ><a href="#!" class="waves-effect waves-light"><i class="material-icons left">today</i>Dashboard</a></li>
            <li>
                <a href="#!" class="waves-effect waves-light collapsible-header"><i class="material-icons left">mode_edit</i>Paramétrage</a>
                <div class="collapsible-body">
                    <ul>
                        <li><a href="<?php echo base_url(); ?>c_parametre/zone_intervention">Zone d'intervention</a></li>
                        <li><a href="<?php echo base_url(); ?>c_parametre/liste_opf" >OPF</a></li>
                        <li><a href="<?php echo base_url(); ?>c_parametre/liste_opr" >OPR</a></li>
                        <li><a href="<?php echo base_url(); ?>c_parametre/liste_union" >UNION</a></li>
                        <li><a href="<?php echo base_url(); ?>c_parametre/liste_opb" >OPB</a></li>
                        <li><a href="<?php echo base_url(); ?>c_parametre/liste_menage" >EAF</a></li>
                    </ul>
                </div>
            </li>
            <li>
                <a href="#!" class="waves-effect waves-light collapsible-header"><i class="material-icons left">work</i>Gestion des Appuis</a>
                <div class="collapsible-body">
                    <ul>
                        <li><a href="<?php echo base_url(); ?>c_appui/liste_appui" >Liste des appuis</a></li>
                    </ul>
                </div>
            </li>
            <li>
                <a href="#!" class="waves-effect waves-light collapsible-header"><i class="material-icons left">chat</i>Gestion des Résutats</a>
                <div class="collapsible-body">
                    <ul>
                        <li><a href="#!" >OPF</a></li>
                        <li><a href="#!" >OPR</a></li>
                        <li><a href="#!" >UNION</a></li>
                        <li><a href="#!" >OPB</a></li>
                        <li><a href="#!" >Ménages</a></li>
                    </ul>
                </div>
            </li>

        </ul>
    </header>