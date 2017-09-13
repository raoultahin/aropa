<main>
    <div class="container1">
        <div class="row z-depth-1">
            <div class="col s12">
                <h2 class="header">Liste des Communes </h2>
                <table class="responsive-table bordered striped">
                    <thead>
                    <tr>
                        <th>Code</th>
                        <th width="75%">Nom</th>
                        <th>Option</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($communes as $commune) { ?>
                    <tr>
                        <td><?php echo $commune->CODE_COMMUNE ?></td>
                        <td><?php echo $commune->NOM_COMMUNE ?></td>
                        <td>
                            <a href="#!" class="waves-effect waves-light green btn edit" data-id="<?php echo $commune->ID_COMMUNE ?>"><i class="material-icons">edit</i></a>
                            <a href="#!" class="waves-effect waves-light red btn delete" data-id="<?php echo $commune->ID_COMMUNE ?>"><i class="material-icons">delete</i></a>
                        </td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <div class="fixed-action-btn">
                    <a href="#add_commune" class="btn-floating btn-large red">
                        <i class="large material-icons">add</i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal add commune -->
    <div id="add_commune" class="modal">
        <form method="post" action="<?php echo base_url(); ?>c_parametre/insert_commune">
            <div class="modal-content">
                <h5 class="green-text">Ajouter une commune</h5>
                <div class="divider"></div>
                <div class="col s12 container">
                    Région:
                    <div class="input-field inline" style="margin: 0 0 0 15%; width: 70%">
                        <select class="browser-default" name="id_region">
                            <option value="" disabled selected>Choisir une région</option>
                            <?php foreach($regions as $region){ ?>
                            <option value="<?php echo $region->ID_REGION ?>"><?php echo $region->NOM_REGION ?></option>
                            <?php } ?>
                        </select>
                    </div><br>
                    District:
                    <div class="input-field inline" style="margin: 10px 0 0 15%; width: 70%">
                        <select class="browser-default" name="id_district">
                            <option value="" disabled selected>Choisir une district</option>
                        </select>
                    </div><br>
                    Code du commune:
                    <div class="input-field inline" style="width:70%;">
                        <input type="text" name="code_commune">
                    </div><br>
                    Nom du commune:
                    <div class="input-field inline" style="width:70%;">
                        <input type="text" name="nom_commune">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="modal-action modal-close red waves-effect waves-light btn">Fermer</button>
                <button type="submit" class="waves-effect green waves-light btn">Ajouter</button>
            </div>
        </form>
    </div>
    <!-- Modal modif commune -->
    <div id="modif_commune" class="modal">
        <form method="post" action="<?php echo base_url(); ?>c_parametre/update_commune">
            <div class="modal-content">
                <h5 class="green-text">Modifier une commune</h5>
                <div class="divider"></div>
                <div class="col s12 container">
                    <input id="id_commune" type="hidden" name="id_commune">
                    Région:
                    <div class="input-field inline" style="margin: 0 0 0 15%; width: 70%">
                        <select class="browser-default" name="id_region">
                            <option value="" disabled selected>Choisir une région</option>
                            <?php foreach($regions as $region){ ?>
                                <option value="<?php echo $region->ID_REGION ?>"><?php echo $region->NOM_REGION ?></option>
                            <?php } ?>
                        </select>
                    </div><br>
                    District:
                    <div class="input-field inline" style="margin: 10px 0 0 15%; width: 70%">
                        <select class="browser-default" name="id_district">
                            <option value="" disabled selected>Choisir une district</option>
                        </select>
                    </div><br>
                    Code du commune:
                    <div class="input-field inline" style="width:70%;">
                        <input id="code_commune" type="text" name="code_commune">
                    </div><br>
                    Nom du commune:
                    <div class="input-field inline" style="width:70%;">
                        <input id="nom_commune" type="text" name="nom_commune">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="modal-action modal-close red waves-effect waves-light btn">Fermer</button>
                <button type="submit" class="waves-effect green waves-light btn">Modifier</button>
            </div>
        </form>
    </div>
    <!-- Modal delete commune -->
    <div id="delete_commune" class="modal" style="width: 25%">
        <form method="post" action="<?php echo base_url(); ?>c_parametre/delete_commune" >
            <div class="modal-content center-align">
                <h5 class="red-text"> Supprimer commune ?</h5>
                <div class="divider"></div>
                <input id="id_commune_del" type="hidden" name="id_commune">
            </div>
            <div class="modal-footer center-align" style="width: 100%!important;">
                <button type="submit" class="waves-effect green waves-light btn" style="float: none">Supprimer</button>
                <button type="button" class="modal-action modal-close red waves-effect waves-light btn" style="float: none">Fermer</button>
            </div>
        </form>
    </div>
</main>
<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/materialize.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/init.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/crud_commune.js"></script>
<script type="text/javascript">
    var li = $('a[href="http://localhost/aropa/c_parametre/zone_intervention"]').parent();
    li.addClass("active");
    console.log(window.location.href);
    var parentLi = li.parents("li");
    parentLi.addClass("active");
    $(parentLi).children().first().addClass("active");
</script>