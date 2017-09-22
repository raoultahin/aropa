<main>
    <div class="container1">
        <div class="row z-depth-1" style="margin-bottom: 80px;">
            <div class="col s12">
                <h2 class="header">Liste des résultats</h2>
                <div class="row">
                    <label>Filtre : </label>
                    <form method="get" action="<?php echo base_url()?>c_resultat/liste_resultat">
                        <select class="col s1 browser-default" style="border: 1px solid #d0d0d0; margin-right: 10px">
                            <option disabled selected value="">Année</option>
                        </select>
                        <select class="col s2 browser-default" style="border: 1px solid #d0d0d0; margin-right: 10px">
                            <option selected value="opb">OPB</option>
                            <option value="union">UNION</option>
                            <option value="opr">OPR</option>
                            <option value="opf">OPF</option>
                        </select>
                        <button type="submit" class="waves-effect waves-light green btn btn-resultat"><i class="material-icons">search</i></button>
                    </form>
                </div>
                <table id="liste" class="bordered striped">
                    <thead>
                    <tr style="border-top: 1px solid #d0d0d0">
                        <th>Code OP</th>
                        <th>Nom OP</th>
                        <th>Annee</th>
                        <th>Fokontany</th>
                        <th>Commune</th>
                        <th>District</th>
                        <th>Région</th>
                        <th width="3%"></th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
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