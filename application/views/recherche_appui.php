<main>
    <div class="container1">
        <div class="row z-depth-2">
            <div class="col s12" style="padding-bottom: 30px">
                <h2 class="header">Recherche avancée appui OP</h2>
                <form action="<?php echo base_url()?>c_appui/rechercher" method="post">
                    <div class="row">
                        <div class="col s6 m3">
                            Région:
                            <div class="input-field inline" style="margin: 0 15px 0 5px;width: 70%">
                                <select class="browser-default" name="id_region" style="border: 1px solid #9e9e9e">
                                    <option value="" disabled selected>Choisir une région</option>
                                    <?php foreach($regions as $region){?>
                                        <option value="<?php echo $region->ID_REGION ?>"><?php echo $region->NOM_REGION ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col s6 m3">
                            District:
                            <div class="input-field inline" style="margin: 0 15px 0 5px;width: 70%">
                                <select class="browser-default" name="id_district" style="border: 1px solid #9e9e9e">
                                    <option value="" disabled selected>Choisir une district</option>
                                </select>
                            </div>
                        </div>
                        <div class="col s6 m3">
                            Commune:
                            <div class="input-field inline" style="margin: 0 15px 0 5px;width: 65%">
                                <select class="browser-default" name="id_commune" style="border: 1px solid #9e9e9e">
                                    <option value="" disabled selected>Choisir une commune</option>
                                </select>
                            </div>
                        </div>
                        <div class="col s6 m3">
                            Fokontany:
                            <div class="input-field inline" style="margin: 0 15px 0 5px;width: 65%">
                                <select class="browser-default" name="id_fokontany" style="border: 1px solid #9e9e9e">
                                    <option value="" disabled selected>Choisir une fokontany</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row valign-wrapper" style="height: 50px;margin-bottom: 0; padding-left: 10px">
                        <div class="left-align">
                            Type OP :
                            <input id="opf" type="checkbox" value="1" name="type_op[]">
                            <label for="opf" class="grey-text" style="margin-right: 10px">OPF</label>
                            <input id="opr" type="checkbox" value="2" name="type_op[]">
                            <label for="opr" class="grey-text" style="margin-right: 10px">OPR</label>
                            <input id="union" type="checkbox" value="3" name="type_op[]">
                            <label for="union" class="grey-text" style="margin-right: 10px">UNION</label>
                            <input id="opb" type="checkbox" value="4" name="type_op[]">
                            <label for="opb" class="grey-text" style="margin-right: 10px">OPB</label>
                        </div>
                    </div>
                    <div class="row" style="padding-left: 10px">
                            <span style="display: block">Type appui :</span>
                            <p class="col s6">
                                <input id="Technique" type="checkbox" value="1" name="type_appui[]">
                                <label for="Technique" class="grey-text">Appui Technique</label>
                            </p>
                            <p class="col s6">
                                <input id="Intrants" type="checkbox" value="2" name="type_appui[]">
                                <label for="Intrants" class="grey-text">Intrants et petits matériels</label>
                            </p>
                            <p class="col s6">
                                <input id="Equipements" type="checkbox" value="3" name="type_appui[]">
                                <label for="Equipements" class="grey-text">Equipements</label>
                            </p>
                            <p class="col s6">
                                <input id="Infrastructure" type="checkbox" value="4" name="type_appui[]">
                                <label for="Infrastructure" class="grey-text">Infrastructure</label>
                            </p>
                            <p class="col s6">
                                <input id="Conseils" type="checkbox" value="5" name="type_appui[]">
                                <label for="Conseils" class="grey-text">Appuis Conseils</label>
                            </p>
                            <p class="col s6">
                                <input id="Structuration" type="checkbox" value="6" name="type_appui[]">
                                <label for="Structuration" class="grey-text">Structuration</label>
                            </p>
                            <p class="col s6">
                                <input id="Formation" type="checkbox" value="7" name="type_appui[]">
                                <label for="Formation" class="grey-text">Formation</label>
                            </p>

                    </div>
                    <div class="row" style="padding-left: 10px">
                        Date de financement :
                        <div class="input-field col s12">
                            <div class="input-field col s3">
                                <label for="date_fdebut" class="grey-text active">Debut</label>
                                <input id="date_fdebut" type="date" class="datepicker" name="date_fdebut">
                            </div>
                            <div class="input-field col s3">
                                <label for="date_ffin" class="grey-text active">Fin</label>
                                <input id="date_ffin" type="date" class="datepicker" name="date_ffin">
                            </div>
                        </div>
                    </div>
                    <div class="row" style="padding-left: 10px">
                        Date collecte :
                        <div class="input-field col s12">
                            <div class="input-field col s3">
                                <label for="date_cdebut" class="grey-text active">Debut</label>
                                <input id="date_sdebut" type="date" class="datepicker" name="date_cdebut">
                            </div>
                            <div class="input-field col s3">
                                <label for="date_cfin" class="grey-text active">Fin</label>
                                <input id="date_cfin" type="date" class="datepicker" name="date_cfin">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="waves-effect waves-light btn darken-2 grey right"><i class="material-icons left">search</i> Affiner ma recherche</button>
                </form>
            </div>
        </div>

        <?php if(!empty($appuiListe)) {?>
        <div class="row z-depth-1" style="margin-bottom: 80px;">
            <div id="liste" class="col s12">
                <h2 class="header">Liste des appuis effectués (OP) <a href="<?php echo base_url()?>c_appui/liste_appui_eaf" class="waves-effect blue waves-light btn right">Appui EAF</a></h2>
                <div class="row input-field">
                    <label for="recherche" class="grey-text">Recherche</label>
                    <input id="recherche" type="text" class="search col s3" style="margin: 0">
                </div>
                <table id="liste" class="bordered striped">
                    <thead>
                    <tr style="border-top: 1px solid #d0d0d0">
                        <th>Date saisie</th>
                        <th>Code OP</th>
                        <th>Nom OP</th>
                        <th>Date de financement</th>
                        <th>Montant(Ar)</th>
                        <th>Filière</th>
                        <th>Type appui</th>
                        <th>Nb. eaf appuyé(e)s</th>
                        <th>Etat</th>
                        <th width="3%"></th>
                    </tr>
                    </thead>
                    <tbody class="list">
                    <?php foreach($appuiListe as $appui) {
                        $etat = getEtatAppui($appui->ID_APPUI_OP);
                        ?>
                        <tr>
                            <td class="date_saisie"><?php if($appui->DATE_SAISIE != '0000-00-00')echo date('d M Y',strtotime($appui->DATE_SAISIE))  ?></td>
                            <td class="code_op"><?php echo $appui->CODE_OP ?></td>
                            <td class="nom_op"><?php echo $appui->NOM_OP ?></td>
                            <td class="date_f"><?php if($appui->DATE_FINANCEMENT != '0000-00-00')echo date('d M Y',strtotime($appui->DATE_FINANCEMENT)) ?></td>
                            <td><?php echo number_format($appui->MONTANT, 2, '.', ',')?></td>
                            <td class="filiere"><?php echo $appui->NOM_FILIERE ?></td>
                            <td class="libele"><?php echo $appui->LIBELLE ?></td>
                            <td><?php echo getNbEafAppuieByIdAppui($appui->ID_APPUI_OP)['nb']?></td>
                            <?php if($etat['etat']!=true){ ?>
                                <td><a class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="<?php echo $etat['msg'] ?>"><i class="material-icons orange-text">assignment_late</i></a></td>
                            <?php } else {?>
                                <td><i class="material-icons green-text">assignment_turned_in</i></td>
                            <?php } ?>
                            <td>
                                <a href="<?php echo base_url()?>c_appui/fiche_appui/<?php echo $appui->ID_APPUI_OP?>"><i class="material-icons green-text">info_outline</i></a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <div id="pagination">
                    <p class="left"><b>Total: <?php echo $appuiTotal?></b></p>
                </div>
                <div class="fixed-action-btn">
                    <a href="#new_appui" class="btn-floating btn-large red modal-trigger">
                        <i class="large material-icons">add</i>
                    </a>
                </div>
            </div>
        </div>
        <!-- Modal nouvelle appui -->
        <div id="new_appui" class="modal">
            <div class="modal-content">
                <h5 class="green-text">Nouvelle appui</h5>
                <div class="divider"></div>
                <div class="col s12 container">
                    <div class="row">
                        <div class="col s6">
                            <a href="<?php echo base_url(); ?>c_appui/appui_op/opf">
                                <div class="my-card card-panel blue-grey lighten-2 waves-effect waves-light  center-align">
                                    <div class="white-text isa" style="line-height: 80px">OPF</div>
                                </div>
                            </a>
                        </div>
                        <div class="col s6">
                            <a href="<?php echo base_url(); ?>c_appui/appui_op/opr">
                                <div class="my-card card-panel cyan waves-effect waves-light  center-align">
                                    <div class="white-text isa" style="line-height: 80px">OPR</div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s6">
                            <a href="<?php echo base_url(); ?>c_appui/appui_op/union">
                                <div class="my-card card-panel yellow darken-3 waves-effect waves-light  center-align">
                                    <div class="white-text isa" style="line-height: 80px">UNION</div>
                                </div>
                            </a>
                        </div>
                        <div class="col s6">
                            <a href="<?php echo base_url(); ?>c_appui/appui_op/opb">
                                <div class="my-card card-panel light-green waves-effect waves-light  center-align">
                                    <div class="white-text isa" style="line-height: 80px">OPB</div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s6 offset-l3">
                            <a href="<?php echo base_url(); ?>c_appui/appui_eaf">
                                <div class="my-card card-panel indigo lighten-1 waves-effect waves-light  center-align">
                                    <div class="white-text isa" style="line-height: 80px">EAF</div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>


</main>
<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/materialize.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/init.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/list.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/materialize-pagination.js"></script>

<script type="text/javascript">
    var li = $('a[href="http://localhost/aropa/c_appui/liste_appui"]').parent();
    li.addClass("active");
    var parentLi = li.parents("li");
    parentLi.addClass("active");
    $(parentLi).children().first().addClass("active");

    $(document).ready(function(){
        var options = {
            valueNames: [ 'date_saisie','code_op', 'nom_op', 'filiere', 'date_f', 'libele']
        };
        var appuiListe = new List('liste', options);

        $('#pagination').materializePagination({
            align: 'right',
            lastPage:  <?php if($appuiTotal%20==0) echo $appuiTotal/20; else echo $appuiTotal/20;+ 1 ?>,
            firstPage:  1,
            urlParameter: 'page',
            useUrlParameter: true,
            onClickCallback: function(requestedPage){
                window.location.replace('<?php echo base_url() ?>c_appui/liste_appui?page='+requestedPage);
            }
        });

        $('.pagination').removeClass('right-align');
        $('.pagination').addClass('right');
    });

</script>