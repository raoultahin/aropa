<style>
    .dataTables_filter, #liste_paginate {
        float: left;
        margin-left: 50px;
    }
</style>
<main>
    <div class="container1">
        <div class="row z-depth-1" style="margin-bottom: 80px;">
            <div class="col s12">
                <h2 class="header">Détail OPB résltats et appuis</h2>
                <div class="row">
                    <label>Filtre : </label>
                    <form method="get" action="<?php echo base_url()?>c_resultat/liste_resultat">
                        <select name="annee" class="col s1 browser-default" style="border: 1px solid #d0d0d0; margin-right: 10px">
                            <option disabled selected value="">Année</option>
                            <option value="2017">2017</option>
                            <option value="tous">Tous</option>
                        </select>
                        <button type="submit" class="waves-effect waves-light green btn btn-resultat"><i class="material-icons">search</i></button>
                    </form>
                </div>
                <table id="liste" class="bordered striped">
                    <thead>
                    <tr style="border-top: 1px solid #d0d0d0">
                        <th>REGION</th>
                        <th>DISTRICT</th>
                        <th>COMMUNE</th>
                        <th>OPF</th>
                        <th>OPR</th>
                        <th>UNION</th>
                        <th>OPB</th>
                        <th>BENEFICIAIRE</th>
                        <th>SEXE (H)</th>
                        <th>SEXE (F)</th>
                        <th>EAF 1</th>
                        <th>EAF 2</th>
                        <th>EAF 3</th>
                        <th>FILIERE</th>
                        <th>SUPERFICIE</th>
                        <th>QTE PRODUITE</th>
                        <th>QTE COMMERCIALISEE</th>
                        <th>MONTANT</th>
                        <th>APPUI TECHNIQUE</th>
                        <th>INTRANTS ET PETITS MATERIELS</th>
                        <th>EQUIPEMENTS</th>
                        <th>INFRASTRUCTURE</th>
                        <th>APPUIS CONSEILS</th>
                        <th>STRUCTURATION</th>
                        <th>FORMATION</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($detailOpb as $r){ ?>
                        <tr>
                            <td><?php echo $r->NOM_REGION?></td>
                            <td><?php echo $r->NOM_DISTRICT?></td>
                            <td><?php echo $r->NOM_COMMUNE?></td>
                            <td><?php echo $r->NOM_OPF?></td>
                            <td><?php echo $r->NOM_OPR?></td>
                            <td><?php echo $r->NOM_UNION?></td>
                            <td><?php echo $r->NOM_OPB?></td>
                            <td><?php echo $r->NB_EAF?></td>
                            <td><?php echo $r->NB_H?></td>
                            <td><?php echo $r->NB_F?></td>
                            <td><?php echo $r->EAF_1?></td>
                            <td><?php echo $r->EAF_2?></td>
                            <td><?php echo $r->EAF_3?></td>
                            <td><?php echo $r->NOM_FILIERE?></td>
                            <td><?php echo $r->SUPERFICIE?></td>
                            <td><?php echo $r->QTE_PRODUITE?></td>
                            <td><?php echo $r->QTE_COMMERCIALISEE?></td>
                            <td><?php echo $r->MONTANT?></td>
                            <td><?php echo $r->APPUI_TECHNIQUE?></td>
                            <td><?php echo $r->INTRANT?></td>
                            <td><?php echo $r->EQUIPEMENT?></td>
                            <td><?php echo $r->INFRASTRUCTURE?></td>
                            <td><?php echo $r->CONSEILS?></td>
                            <td><?php echo $r->STRUCTURATION?></td>
                            <td><?php echo $r->FORMATION?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <div class="row" style="margin-top: 50px">
                    <a href="<?php echo base_url()?>c_sortie/export_detail_opb" class="waves-effect waves-light btn"><i class="material-icons left">file_download</i>télécharger la liste au format csv</a>
                </div>
                <div class="fixed-action-btn">
                    <a href="<?php echo base_url()?>c_resultat/choisir_opb" class="btn-floating btn-large red">
                        <i class="large material-icons">add</i>
                    </a>
                </div>
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
    $('.conteneur').css('display','table');
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