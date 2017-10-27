<main>
    <div class="container1">
        <div id="liste" class="row z-depth-1" style="margin-bottom: 80px">
            <div class="col s12">
                <h2 class="header">Liste des OPR <a href="#importer" class="modal-trigger waves-effect waves-light btn blue">Importer</a> </h2>
                <div class="row input-field">
                    <label for="recherche" class="grey-text">Recherche</label>
                    <input id="recherche" type="text" class="search col s3" style="margin: 0">
                    <a href="<?php echo base_url()?>c_parametre/rechercher/opr" style="font-size: 13px;"> <i class="material-icons left" style="margin-right: 3px;font-size: 20px">search</i> Recherche avancée</a>
                </div>
                <table class="bordered striped">
                    <thead>
                    <tr>
                        <th>Code</th>
                        <th>Nom</th>
                        <th>Filières développées</th>
                        <th>Statut juridique</th>
                        <th>Formelle</th>
                        <th>Representant</th>
                        <th width="10%">Option</th>
                    </tr>
                    </thead>
                    <tbody class="list">
                    <?php foreach($oprListe as $opr) { ?>
                    <tr>
                        <td class="codeOpr"><a href="<?php echo base_url()?>c_parametre/fiche_op/opr/<?php echo $opr->ID_OPR ?>"><?php echo $opr->CODE_OPR ?></a></td>
                        <td class="nomOpr"><?php echo $opr->NOM_OPR ?></td>
                        <td class="filiere"><?php echo $opr->FILIERES ?></td>
                        <td><?php echo $opr->STATUT ?></td>
                        <td><?php if($opr->FORMELLE == 1) echo 'OUI'; else echo 'NON' ?></td>
                        <td class="representant"><?php echo $opr->REPRESENTANT ?></td>
                        <td>
                            <a href="<?php echo base_url()?>c_parametre/edit_op/opr/<?php echo $opr->ID_OPR ?>" class="waves-effect waves-light green btn edit" data-id="<?php echo $opr->ID_OPR ?>"><i class="material-icons">edit</i></a>
                            <a href="#delete_opr" class="modal-trigger waves-effect waves-light red btn delete" data-id="<?php echo $opr->ID_OPR ?>"><i class="material-icons">delete</i></a>
                        </td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <div id="pagination">
                    <p class="left"><b>Total: <?php echo $oprTotal?></b></p>
                </div>
                <div class="fixed-action-btn">
                    <a href="<?php echo base_url(); ?>c_parametre/ajout_opr" class="btn-floating btn-large red">
                        <i class="large material-icons">add</i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal import opr -->
    <div id="importer" class="modal" style="width: 50%">
        <form method="post" action="<?php echo base_url(); ?>c_parametre/importer_opr" enctype="multipart/form-data">
            <div class="modal-content center-align">
                <h5 class="green-text"> Importer OPR (CSV)</h5>
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
    <!-- Modal delete opr -->
    <div id="delete_opr" class="modal" style="width: 25%">
        <form method="post" action="<?php echo base_url(); ?>c_parametre/delete_opr" >
            <div class="modal-content center-align">
                <h5 class="red-text"> Supprimer OPR ?</h5>
                <div class="divider"></div>
                <input id="id_opr" type="hidden" name="id_opr">
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
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/list.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/materialize-pagination.js"></script>

<script type="text/javascript">
    var li = $('a[href="http://localhost/aropa/c_parametre/liste_opr"]').parent();
    li.addClass("active");
    console.log(window.location.href);
    var parentLi = li.parents("li");
    parentLi.addClass("active");
    $(parentLi).children().first().addClass("active");

    $(document).ready(function(){
        var options = {
            valueNames: [ 'codeOpr', 'nomOpr', 'filiere', 'representant' ]
        };
        var opbListe = new List('liste', options);

        $('#pagination').materializePagination({
            align: 'right',
            lastPage:  <?php echo $oprTotal/20 +1 ?>,
            firstPage:  1,
            urlParameter: 'page',
            useUrlParameter: true,
            onClickCallback: function(requestedPage){
                window.location.replace('<?php echo base_url() ?>c_parametre/liste_opr?page='+requestedPage);
            }
        });

        $('.pagination').removeClass('right-align');
        $('.pagination').addClass('right');
    });

    $(document).on('click', '.delete', function () {
        var id_opr = $(this).attr('data-id');
        $('#id_opr').val(id_opr);
    });
</script>