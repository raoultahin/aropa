<main>
    <div class="container1">
        <div class="row z-depth-1" style="margin-bottom: 80px;">
            <div class="col s12">
                <h2 class="header">Liste des District  <a href="#importer" class="modal-trigger waves-effect waves-light btn blue">Importer</a> </h2>
                <table id="liste" class="bordered striped">
                    <thead>
                    <tr>
                        <th>Code</th>
                        <th width="75%">Nom</th>
                        <th>Option</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($districts as $district) { ?>
                    <tr>
                        <td><?php echo $district->CODE_DISTRICT ?></td>
                        <td><?php echo $district->NOM_DISTRICT ?></td>
                        <td>
                            <a href="#!" class="waves-effect waves-light green btn edit" data-id="<?php echo $district->ID_DISTRICT ?>"><i class="material-icons">edit</i></a>
                            <a href="#!" class="waves-effect waves-light red btn delete" data-id="<?php echo $district->ID_DISTRICT ?>"><i class="material-icons">delete</i></a>
                        </td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <div class="fixed-action-btn">
                    <a href="#add_district" class="btn-floating btn-large red modal-trigger">
                        <i class="large material-icons">add</i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal import district -->
    <div id="importer" class="modal" style="width: 50%">
        <form method="post" action="<?php echo base_url(); ?>c_parametre/importer_district" enctype="multipart/form-data">
            <div class="modal-content center-align">
                <h5 class="green-text"> Importer District (CSV)</h5>
                <div class="divider"></div>
                <div class="file-field input-field">
                    <div class="btn blue">
                        <span>File</span>
                        <input type="file" name="csv">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="width: 100% !important;">
                <button type="button" class="modal-action modal-close red waves-effect waves-light btn">Fermer</button>
                <button type="submit" class="waves-effect green waves-light btn">Importer</button>
            </div>
        </form>
    </div>
    <!-- Modal add district -->
    <div id="add_district" class="modal">
        <form method="post" action="<?php echo base_url(); ?>c_parametre/insert_district">
            <div class="modal-content">
                <h5 class="green-text">Ajouter une district</h5>
                <div class="divider"></div>
                <div class="col s12 container">
                    Région:
                    <div class="input-field inline" style="margin: 0 0 0 11%; width: 70%">
                        <select class="browser-default" name="id_region">
                            <option value="" disabled selected>Choisir une région</option>
                            <?php foreach($regions as $region){ ?>
                            <option value="<?php echo $region->ID_REGION ?>"><?php echo $region->NOM_REGION ?></option>
                            <?php } ?>
                        </select>
                    </div><br>
                    Code du district:
                    <div class="input-field inline" style="width:70%;">
                        <input type="text" name="code_district">
                    </div><br>
                    Nom du district:
                    <div class="input-field inline" style="width:70%;">
                        <input type="text" name="nom_district">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="modal-action modal-close red waves-effect waves-light btn">Fermer</button>
                <button type="submit" class="waves-effect green waves-light btn">Ajouter</button>
            </div>
        </form>
    </div>
    <!-- Modal modif district -->
    <div id="modif_district" class="modal">
        <form method="post" action="<?php echo base_url(); ?>c_parametre/update_district">
            <div class="modal-content">
                <h5 class="green-text">Modifier une district</h5>
                <div class="divider"></div>
                <div class="col s12 container">
                    <input id="id_district" type="hidden" name="id_district">
                    Région:
                    <div class="input-field inline" style="margin: 0 0 0 11%; width: 70%">
                        <select class="browser-default" name="id_region">
                            <option value="" disabled selected>Choisir une région</option>
                            <?php foreach($regions as $region){ ?>
                                <option value="<?php echo $region->ID_REGION ?>"><?php echo $region->NOM_REGION ?></option>
                            <?php } ?>
                        </select>
                    </div><br>
                    Code du district:
                    <div class="input-field inline" style="width:70%;">
                        <input id="code_district" type="text" name="code_district">
                    </div><br>
                    Nom du district:
                    <div class="input-field inline" style="width:70%;">
                        <input id="nom_district" type="text" name="nom_district">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="modal-action modal-close red waves-effect waves-light btn">Fermer</button>
                <button type="submit" class="waves-effect green waves-light btn">Modifier</button>
            </div>
        </form>
    </div>
    <!-- Modal delete district -->
    <div id="delete_district" class="modal" style="width: 25%">
        <form method="post" action="<?php echo base_url(); ?>c_parametre/delete_district" >
            <div class="modal-content center-align">
                <h5 class="red-text"> Supprimer district ?</h5>
                <div class="divider"></div>
                <input id="id_district_del" type="hidden" name="id_district">
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
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/crud_district.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/datatables.min.js"></script>
<script type="text/javascript">
    var li = $('a[href="http://localhost/aropa/c_parametre/zone_intervention"]').parent();
    li.addClass("active");
    console.log(window.location.href);
    var parentLi = li.parents("li");
    parentLi.addClass("active");
    $(parentLi).children().first().addClass("active");

    $(document).ready(function(){
        $('#liste').DataTable({
            "language": {
                "lengthMenu": "Afficher _MENU_ ligne par page",
                "zeroRecords": "Rien à afficher",
                "info": "<b>Total: _TOTAL_</b> enregistrements",
                "sInfoEmpty":      "Affichage de l'&eacute;l&eacute;ment 0 &agrave; 0 sur 0 &eacute;l&eacute;ment",
                "sInfoFiltered":   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                "oPaginate": {
                    "sPrevious":   "<i class='material-icons'>chevron_left</i>",
                    "sNext":       "<i class='material-icons'>chevron_right</i>"
                },
                "sSearch":         "Rechercher&nbsp;:"
            },
            "drawCallback": function () {
                $('#liste_paginate a').addClass('waves-effect btn-flat');
            }
        });

        $('select').addClass('browser-default');

    });
</script>