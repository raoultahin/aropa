<!DOCTYPE html>
<html>
<head>
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/materialize.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta charset="utf-8">
    <title>Index.html</title>
</head>

<body class="grey lighten-2">

    <div class="conteneur">
        <div class="row grey lighten-2" style="margin: 7rem auto">
            <form action="<?php echo base_url()?>c_login" method="post" style="margin: 0 auto; width: 35%">
                <div class="card">
                    <div class="card-content">
                        <img class="circle right" src="<?php echo base_url(); ?>assets/images/logo-aropa.png" alt="logo" style="position:absolute; left: 35%; top:-20%"/>
                        <h4 class="card-title blue-text" style="margin-top:75px;font-weight: 600">Connexion</h4>
                        <div class="divider"></div>
                        <div class="input-field" style="margin: 35px auto; width: 85%">
                            <input id="username" type="text" name="username" required="">
                            <label class="grey-text" for="username">Nom d'utilisateur</label>
                        </div>
                        <div class="input-field" style="margin: 35px auto; width: 85%">
                            <input id="mdp" type="password" name="mdp" required="">
                            <label class="grey-text" for="mdp">Mot de passe</label>
                        </div>
                        <div class="input-field" style="margin: 35px auto; width: 85%">
                            <span style="color:red"><?php echo $error ?></span>
                        </div>
                        <div class="input-field" style="margin: 0 auto; width: 85%">
                            <button type="submit" class="waves-effect waves-light btn-large green" style="width: 100%">Connexion</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/materialize.min.js"></script>
</html>