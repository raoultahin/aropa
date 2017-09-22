<main>
    <div class="container1">
        <div class="row z-depth-1">
            <div class="col s12">
                <h2 class="header" style="margin-bottom: 30px;">Nouvelle résultat </h2>
                <form method="get" action="#!" style="margin-bottom: 20px;">
                    Région:
                    <div class="input-field inline" style="margin: 0 15px 0 5px">
                        <select class="browser-default" name="id_region" style="border: 1px solid #d0d0d0;">
                            <option value="" disabled selected>Choisir une région</option>
                            <?php foreach($regions as $region){?>
                            <option value="<?php echo $region->ID_REGION ?>"><?php echo $region->NOM_REGION ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    District:
                    <div class="input-field inline" style="margin: 0 15px 0 5px">
                        <select class="browser-default" name="id_district" style="border: 1px solid #d0d0d0;">
                            <option value="" disabled selected>Choisir une district</option>
                        </select>
                    </div>
                    Commune:
                    <div class="input-field inline" style="margin: 0 15px 0 5px">
                        <select class="browser-default" name="id_commune" style="border: 1px solid #d0d0d0;">
                            <option value="" disabled selected>Choisir une commune</option>
                        </select>
                    </div>
                    <input type="submit" value="Filtrer" class="waves-effect blue waves-light btn btn-block" style="vertical-align: middle;">
                </form>

                <h5 class="green-text">Liste OPB </h5>
                <table id="liste" class="bordered striped">
                    <thead>
                    <tr style="border-top: 1px solid #d0d0d0">
                        <th>Code</th>
                        <th>Nom</th>
                        <th>Fokontany</th>
                        <th>Commune</th>
                        <th>District</th>
                        <th>Région</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($opbListe as $opLigne){ ?>
                    <tr>
                        <td><?php echo $opLigne->CODE_OPB?></td>
                        <td><?php echo $opLigne->NOM_OPB?></td>
                        <td><?php echo $opLigne->NOM_FOKONTANY?></td>
                        <td><?php echo $opLigne->NOM_COMMUNE?></td>
                        <td><?php echo $opLigne->NOM_DISTRICT?></td>
                        <td><?php echo $opLigne->NOM_REGION?></td>
                        <td><a href="<?php echo base_url(); ?>c_resultat/new_resultat/<?php echo $opLigne->ID_OPB ?>" class="waves-effect green waves-light btn"><i class="material-icons">done</i></a></td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/materialize.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/init.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/datatables.min.js"></script>

<script type="text/javascript">
    var li = $('a[href="http://localhost/aropa/c_resultat/liste_resultat"]').parent();
    li.addClass("active");
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