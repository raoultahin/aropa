<main>
    <div class="container1">
        <div class="row z-depth-1">
            <div class="col s12">
                <h2 class="header">Liste des appuis effectués (EAF) <a href="<?php echo base_url()?>c_appui/liste_appui" class="waves-effect blue waves-light btn right">Appui OP</a></h2>
                <table class="bordered striped">
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>Code EAF</th>
                        <th>Nom et prénoms</th>
                        <th>Surnom</th>
                        <th>Objet/nature offert</th>
                        <th>Qte</th>
                        <th>Unité</th>
                        <th width="3%"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($appuiEafListe as $appui) {
                        if($appui->THEME!=null) $appui->OBJET_NATURE = $appui->THEME;
                    ?>
                    <tr>
                        <td><?php echo $appui->DATE_SAISIE ?></td>
                        <td><?php echo $appui->CODE_MENAGE ?></td>
                        <td><?php echo $appui->NOM_MENAGE ?></td>
                        <td><?php echo $appui->SURNOM ?></td>
                        <td><?php echo $appui->OBJET_NATURE ?></td>
                        <td><?php echo $appui->QTE ?></td>
                        <td><?php echo $appui->UNITE ?></td>
                        <td>
                            <a href="<?php echo base_url()?>c_appui/fiche_appui_eaf/<?php echo $appui->ID_APPUI_MENAGE?>"><i class="material-icons green-text">info_outline</i></a>
                        </td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <div class="fixed-action-btn">
                    <a href="<?php echo base_url(); ?>c_appui/appui_eaf" class="modal-trigger btn-floating btn-large red">
                        <i class="large material-icons">add</i>
                    </a>
                </div>
            </div>
        </div>
    </div>
<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/materialize.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/init.js"></script>
<script type="text/javascript">
    var li = $('a[href="http://localhost/aropa/c_appui/liste_appui"]').parent();
    li.addClass("active");
    var parentLi = li.parents("li");
    parentLi.addClass("active");
    $(parentLi).children().first().addClass("active");
</script>