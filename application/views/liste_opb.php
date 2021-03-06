<main>
    <div class="container1">
        <div class="row z-depth-1" style="margin-bottom: 80px">
            <div id="liste" class="col s12">
                <h2 class="header">Liste des OPB <a href="#importer" class="modal-trigger waves-effect waves-light btn blue">Importer</a> </h2>
                <div class="row input-field">
                    <label for="recherche" class="grey-text">Recherche</label>
                    <input id="recherche" type="text" class="search col s3" style="margin: 0">
                    <a href="<?php echo base_url()?>c_parametre/rechercher/opb" style="font-size: 13px;"> <i class="material-icons left" style="margin-right: 3px;font-size: 20px">search</i> Recherche avancée</a>
                </div>
                <table class="bordered striped">
                    <thead>
                    <tr>
                        <th>Code</th>
                        <th>Nom</th>
                        <th>Filières développées</th>
                        <th>Nb. eaf</th>
                        <th>Fokontany</th>
                        <th>Commune</th>
                        <th>Ditrict</th>
                        <th>Region</th>
                        <th>Formelle</th>
                        <th>Representant</th>
                        <th width="10%">Option</th>
                    </tr>
                    </thead>
                    <tbody class="list">
                    <?php foreach($opbListe as $opb) { ?>
                        <tr>
                            <td class="codeOpb"><a href="<?php echo base_url()?>c_parametre/fiche_op/opb/<?php echo $opb->ID_OPB ?>"><?php echo $opb->CODE_OPB ?></a></td>
                            <td class="nomOpb"><?php echo $opb->NOM_OPB ?></td>
                            <td class="filiere"><?php echo $opb->FILIERES ?></td>
                            <td><?php echo getNbrEafByIdOpb($opb->ID_OPB)['nb'] ?></td>
                            <td class="fokontany"><?php echo $opb->NOM_FOKONTANY ?></td>
                            <td class="commune"><?php echo $opb->NOM_COMMUNE ?></td>
                            <td class="district"><?php echo $opb->NOM_DISTRICT ?></td>
                            <td class="region"><?php echo $opb->NOM_REGION ?></td>
                            <td><?php if($opb->FORMELLE == 1) echo 'OUI'; else echo 'NON' ?></td>
                            <td class="representant"><?php echo $opb->REPRESENTANT ?></td>
                            <td>
                                <a href="<?php echo base_url()?>c_parametre/edit_op/opb/<?php echo $opb->ID_OPB ?>" class="waves-effect waves-light green btn edit" data-id="<?php echo $opb->ID_OPB ?>"><i class="material-icons">edit</i></a>
                                <a href="#delete_opb" class="modal-trigger waves-effect waves-light red btn delete" data-id="<?php echo $opb->ID_OPB ?>"><i class="material-icons">delete</i></a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <div id="pagination">
                    <p class="left"><b>Total: <?php echo $opbTotal?></b></p>
                </div>
                <div class="fixed-action-btn">
                    <a href="<?php echo base_url(); ?>c_parametre/ajout_opb" class="btn-floating btn-large red">
                        <i class="large material-icons">add</i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal import opb -->
    <div id="importer" class="modal" style="width: 50%">
        <form method="post" action="<?php echo base_url(); ?>c_parametre/importer_opb" enctype="multipart/form-data">
            <div class="modal-content center-align">
                <h5 class="green-text"> Importer OPB (CSV)</h5>
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
    <!-- Modal delete opb -->
    <div id="delete_opb" class="modal" style="width: 25%">
        <form method="post" action="<?php echo base_url(); ?>c_parametre/delete_opb" >
            <div class="modal-content center-align">
                <h5 class="red-text"> Supprimer OPB ?</h5>
                <div class="divider"></div>
                <input id="id_opb" type="hidden" name="id_opb">
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
    var li = $('a[href="http://localhost/aropa/c_parametre/liste_opb"]').parent();
    li.addClass("active");
    console.log(window.location.href);
    var parentLi = li.parents("li");
    parentLi.addClass("active");
    $(parentLi).children().first().addClass("active");

    $(document).ready(function(){
        var options = {
            valueNames: [ 'codeOpb', 'nomOpb', 'filiere', 'fokontany', 'commune', 'district', 'region', 'representant' ]
        };
        var opbListe = new List('liste', options);

        $('#pagination').materializePagination({
            align: 'right',
            lastPage:  <?php if($opbTotal%20==0) echo $opbTotal/20; else  $opbTotal/20;+ 1 ?>,
            firstPage:  1,
            urlParameter: 'page',
            useUrlParameter: true,
            onClickCallback: function(requestedPage){
                window.location.replace('<?php echo base_url() ?>c_parametre/liste_opb?page='+requestedPage);
            }
        });

        $('.pagination').removeClass('right-align');
        $('.pagination').addClass('right');
    });

    $(document).on('click', '.delete', function () {
        var id_opb = $(this).attr('data-id');
        $('#id_opb').val(id_opb);
    });
</script>