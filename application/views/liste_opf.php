<main>
    <div class="container1">
        <div class="row z-depth-1">
            <div class="col s12">
                <h2 class="header">Liste des OPF </h2>
                <table class="bordered striped">
                    <thead>
                    <tr>
                        <th>Code</th>
                        <th>Nom</th>
                        <th>Filières développées</th>
                        <th>Statut juridique</th>
                        <th>Formelle</th>
                        <th>Representant</th>
                        <th width="12%">Option</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($opfListe as $opf) { ?>
                    <tr>
                        <td><a href="<?php echo base_url()?>c_parametre/fiche_op/opf/<?php echo $opf->ID_OPF ?>"><?php echo $opf->CODE_OPF ?></a></td>
                        <td><?php echo $opf->NOM_OPF ?></td>
                        <td><?php echo $opf->FILIERES ?></td>
                        <td><?php echo $opf->STATUT ?></td>
                        <td><?php if($opf->FORMELLE == 1) echo 'OUI'; else echo 'NON' ?></td>
                        <td><?php echo $opf->ID_REPRESENTANT ?></td>
                        <td>
                            <a href="#!" class="waves-effect waves-light green btn edit" data-id="<?php echo $opf->ID_OPF ?>"><i class="material-icons">edit</i></a>
                            <a href="#!" class="waves-effect waves-light red btn delete" data-id="<?php echo $opf->ID_OPF ?>"><i class="material-icons">delete</i></a>
                        </td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <div class="fixed-action-btn">
                    <a href="<?php echo base_url(); ?>c_parametre/ajout_opf" class="btn-floating btn-large red">
                        <i class="large material-icons">add</i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal add region -->
    <div id="add_region" class="modal">
        <form method="post" action="<?php echo base_url(); ?>c_parametre/insert_region">
            <div class="modal-content">
                <h5 class="green-text">Ajouter une région</h5>
                <div class="divider"></div>
                <div class="col s12 container">
                    Code du région:
                    <div class="input-field inline" style="width:70%;">
                        <input type="text" name="code_region">
                    </div><br>
                    Nom du région:
                    <div class="input-field inline" style="width:70%;">
                        <input type="text" name="nom_region">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="modal-action modal-close red waves-effect waves-light btn">Fermer</button>
                <button type="submit" class="waves-effect green waves-light btn">Ajouter</button>
            </div>
        </form>
    </div>
    <!-- Modal modif region -->
    <div id="modif_region" class="modal">
        <form method="post" action="<?php echo base_url(); ?>c_parametre/update_region">
            <div class="modal-content">
                <h5 class="green-text">Modifier une région</h5>
                <div class="divider"></div>
                <div class="col s12 container">
                    <input id="id_region" type="hidden" name="id_region">
                    Code du région:
                    <div class="input-field inline" style="width:70%;">
                        <input id="code_region" type="text" name="code_region">
                    </div><br>
                    Nom du région:
                    <div class="input-field inline" style="width:70%;">
                        <input id="nom_region" type="text" name="nom_region">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="modal-action modal-close red waves-effect waves-light btn">Fermer</button>
                <button type="submit" class="waves-effect green waves-light btn">Modifier</button>
            </div>
        </form>
    </div>
    <!-- Modal delete region -->
    <div id="delete_region" class="modal" style="width: 25%">
        <form method="post" action="<?php echo base_url(); ?>c_parametre/delete_region" >
            <div class="modal-content center-align">
                <h5 class="red-text"> Supprimer région ?</h5>
                <div class="divider"></div>
                <input id="id_region_del" type="hidden" name="id_region">
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

<script type="text/javascript">
    var li = $('a[href="http://localhost/aropa/c_parametre/liste_opf"]').parent();
    li.addClass("active");
    console.log(window.location.href);
    var parentLi = li.parents("li");
    parentLi.addClass("active");
    $(parentLi).children().first().addClass("active");
</script>