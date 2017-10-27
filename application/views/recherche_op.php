<main>
    <div class="container1">
        <div class="row z-depth-2">
            <div class="col s12" style="padding-bottom: 30px">
                <h2 class="header">Recherche avancée <?php echo strtoupper($op)?></h2>
                <form action="<?php echo base_url()?>c_parametre/rechercher/<?php echo $op ?>" method="get">
                    <div class="row">
                        Région:
                        <div class="input-field inline" style="margin: 0 15px 0 5px">
                            <select class="browser-default" name="id_region" style="border: 1px solid #9e9e9e">
                                <option value="" disabled selected>Choisir une région</option>
                                <?php foreach($regions as $region){?>
                                    <option value="<?php echo $region->ID_REGION ?>"><?php echo $region->NOM_REGION ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        District:
                        <div class="input-field inline" style="margin: 0 15px 0 5px">
                            <select class="browser-default" name="id_district" style="border: 1px solid #9e9e9e">
                                <option value="" disabled selected>Choisir une district</option>
                            </select>
                        </div>
                        Commune:
                        <div class="input-field inline" style="margin: 0 15px 0 5px">
                            <select class="browser-default" name="id_commune" style="border: 1px solid #9e9e9e">
                                <option value="" disabled selected>Choisir une commune</option>
                            </select>
                        </div>
                        Fokontany:
                        <div class="input-field inline" style="margin: 0 15px 0 5px">
                            <select class="browser-default" name="id_fokontany" style="border: 1px solid #9e9e9e">
                                <option value="" disabled selected>Choisir une fokontany</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s3">
                            <label for="codeOp" class="grey-text">Code OP</label>
                            <input id="codeOp" type="text" name="code_op">
                        </div>
                        <div class="input-field col s3">
                            <label for="nomOp" class="grey-text">Nom OP</label>
                            <input id="nomOp" type="text" name="nom_op">
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s3">
                            <label for="filiereOp" class="grey-text">Filière développée</label>
                            <input id="filiereOp" type="text" name="filiere">
                        </div>
                        <div class="input-field col s3">
                            <label for="representantOp" class="grey-text">Représentant</label>
                            <input id="representantOp" type="text" name="representant">
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s4">
                            Formelle :
                            <input class="with-gap" name="formelle" type="radio" id="oui" value="1"/>
                            <label class="grey-text" style="top: 0" for="oui">oui</label>
                            <input class="with-gap" name="formelle" type="radio" id="non" value="0"/>
                            <label class="grey-text" style="top: 0" for="non">non</label>
                        </div>
                    </div>
                    <button type="submit" class="waves-effect waves-light btn darken-2 grey right"><i class="material-icons left">search</i> Affiner ma recherche</button>
                </form>
            </div>
        </div>

        <?php if(!empty($opListe)) {?>
        <div class="row z-depth-1" style="margin-bottom: 80px">
            <div id="liste" class="col s12">
                <h2 class="header">Résultats du recherche : </h2>
                <div class="row input-field">
                    <label for="recherche" class="grey-text">Recherche</label>
                    <input id="recherche" type="text" class="search col s3" style="margin: 0">
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
                        <th>Représentant</th>
                        <th width="10%">Option</th>
                    </tr>
                    </thead>
                    <tbody class="list">
                    <?php foreach($opListe as $opb) { ?>
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
                    <p class="left"><b>Total: <?php echo $opTotal ?></b></p>
                </div>
                <div class="fixed-action-btn">
                    <a href="<?php echo base_url(); ?>c_parametre/ajout_opb" class="btn-floating btn-large red">
                        <i class="large material-icons">add</i>
                    </a>
                </div>
            </div>
        </div>
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
    <?php } ?>
</main>
<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/materialize.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/init.js"></script>
<!--<script type="text/javascript" src="--><?php //echo base_url(); ?><!--assets/js/datatables.min.js"></script>-->
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
            lastPage:  <?php if($opTotal%20==0) echo $opTotal/20;else echo $opTotal/20 + 1 ?>,
            firstPage:  1,
            urlParameter: 'page',
            useUrlParameter: true,
            onClickCallback: function(requestedPage){
                console.log(window.location.href);
                window.location.replace(window.location.href.split("&page")[0]+'&page='+requestedPage);
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