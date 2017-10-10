<main>
    <div class="container1">
        <div class="row z-depth-1">
            <div class="col s12">
                <h2 class="header">Liste des OPR </h2>
                <table id="liste" class="bordered striped">
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
                    <?php foreach($oprListe as $opr) { ?>
                    <tr>
                        <td><a href="<?php echo base_url()?>c_parametre/fiche_op/opr/<?php echo $opr->ID_OPR ?>"><?php echo $opr->CODE_OPR ?></a></td>
                        <td><?php echo $opr->NOM_OPR ?></td>
                        <td><?php echo $opr->FILIERES ?></td>
                        <td><?php echo $opr->STATUT ?></td>
                        <td><?php if($opr->FORMELLE == 1) echo 'OUI'; else echo 'NON' ?></td>
                        <td><?php echo $opr->ID_REPRESENTANT ?></td>
                        <td>
                            <a href="<?php echo base_url()?>c_parametre/edit_op/opr/<?php echo $opr->ID_OPR ?>" class="waves-effect waves-light green btn edit" data-id="<?php echo $opr->ID_OPR ?>"><i class="material-icons">edit</i></a>
                            <a href="#delete_opr" class="modal-trigger waves-effect waves-light red btn delete" data-id="<?php echo $opr->ID_OPR ?>"><i class="material-icons">delete</i></a>
                        </td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <div class="fixed-action-btn">
                    <a href="<?php echo base_url(); ?>c_parametre/ajout_opr" class="btn-floating btn-large red">
                        <i class="large material-icons">add</i>
                    </a>
                </div>
            </div>
        </div>
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
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/datatables.min.js"></script>

<script type="text/javascript">
    var li = $('a[href="http://localhost/aropa/c_parametre/liste_opr"]').parent();
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

    $(document).on('click', '.delete', function () {
        var id_opr = $(this).attr('data-id');
        $('#id_opr').val(id_opr);
    });
</script>