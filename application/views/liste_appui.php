<main>
    <div class="container1">
        <div class="row z-depth-1">
            <div class="col s12">
                <h2 class="header">Liste des appuis effectués </h2>
                <table class="responsive-table bordered striped">
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>Code OP</th>
                        <th>Nom OP</th>
                        <th>Date de financement</th>
                        <th>Montant</th>
                        <th>Filière</th>
                        <th>Type appui</th>
                        <th width="3%"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($appuiListe as $appui) { ?>
                    <tr>
                        <td><?php echo $appui->DATE_SAISIE ?></td>
                        <td><?php echo $appui->CODE_OP ?></td>
                        <td><?php echo $appui->NOM_OP ?></td>
                        <td><?php echo $appui->DATE_FINANCEMENT ?></td>
                        <td><?php echo $appui->MONTANT ?></td>
                        <td><?php echo $appui->NOM_FILIERE ?></td>
                        <td><?php echo $appui->LIBELLE ?></td>
                        <td>
                            <a href="<?php echo base_url()?>c_appui/fiche_appui/<?php echo $appui->ID_APPUI_OP?>" class="waves-effect waves-light green btn" data-id="<?php echo $appui->ID_APPUI_OP ?>"><i class="material-icons">info_outline</i></a>
                        </td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <div class="fixed-action-btn">
                    <a href="#new_appui" class="btn-floating btn-large red">
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
            </div>
        </div>
    </div>
</main>
<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/materialize.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/init.js"></script>
<script type="text/javascript">
    var li = $('a[href="http://localhost/aropa/c_appui/liste_appui"]').parent();
    li.addClass("active");
    console.log(window.location.href);
    var parentLi = li.parents("li");
    parentLi.addClass("active");
    $(parentLi).children().first().addClass("active");
</script>