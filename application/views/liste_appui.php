<main>
    <div class="container1">
        <div class="row z-depth-1" style="margin-bottom: 80px;">
            <div id="liste" class="col s12">
                <h2 class="header">Liste des appuis effectués (OP) <a href="<?php echo base_url()?>c_appui/liste_appui_eaf" class="waves-effect blue waves-light btn right">Appui EAF</a></h2>
                <div class="row input-field">
                    <label for="recherche" class="grey-text">Recherche</label>
                    <input id="recherche" type="text" class="search col s3" style="margin: 0">
                    <a href="<?php echo base_url()?>c_appui/rechercher" style="font-size: 13px;"> <i class="material-icons left" style="margin-right: 3px;font-size: 20px">search</i> Recherche avancée</a>
                </div>
                <table class="bordered striped">
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