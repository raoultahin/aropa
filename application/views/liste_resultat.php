<main>
    <div class="container1">
        <div class="row z-depth-1" style="margin-bottom: 80px;">
            <div id="liste" class="col s12">
                <h2 class="header">Liste des résultats</h2>
                <div class="row">
                    <label>Filtre : </label>
                    <form method="get" action="<?php echo base_url()?>c_resultat/liste_resultat">
                        <select name="annee" class="col s1 browser-default" style="border: 1px solid #d0d0d0; margin-right: 10px">
                            <option disabled selected value="">Année</option>
                            <?php foreach($anneeListe as $annee){?>
                                <option value="<?php echo $annee->ANNEE ?>"><?php echo $annee->ANNEE ?></option>
                            <?php } ?>
                            <option value="tous">Tous</option>
                        </select>
                        <select name="op" class="col s2 browser-default" style="border: 1px solid #d0d0d0; margin-right: 10px">
                            <option selected value="opb">OPB</option>
                            <option value="union">UNION</option>
                            <option value="opr">OPR</option>
                            <option value="opf">OPF</option>
                        </select>
                        <button type="submit" class="waves-effect waves-light green btn btn-resultat"><i class="material-icons">search</i></button>
                    </form>
                </div>
                <div class="row input-field">
                    <label for="recherche" class="grey-text">Recherche</label>
                    <input id="recherche" type="text" class="search col s3" style="margin: 0">
                    <a href="<?php echo base_url()?>c_appui/rechercher" style="font-size: 13px;"> <i class="material-icons left" style="margin-right: 3px;font-size: 20px">search</i> Recherche avancée</a>
                </div>
                <table class="bordered striped">
                    <thead>
                    <tr style="border-top: 1px solid #d0d0d0">
                        <th>Code OP</th>
                        <th>Nom OP</th>
                        <th>Annee</th>
                        <th>Filière</th>
                        <th>Campagne</th>
                        <th>Fokontany</th>
                        <th>Commune</th>
                        <th>District</th>
                        <th>Région</th>
                        <th width="3%"></th>
                    </tr>
                    </thead>
                    <tbody class="list">
                    <?php foreach($resultatListe as $resultat){ ?>
                    <tr>
                        <td><?php echo $resultat->CODE_OP ?></td>
                        <td><?php echo $resultat->NOM_OP ?></td>
                        <td><?php echo $resultat->ANNEE ?></td>
                        <td><?php echo $resultat->NOM_FILIERE ?></td>
                        <td><?php echo $resultat->NUM_CAMPAGNE ?></td>
                        <td><?php echo $resultat->NOM_FOKONTANY ?></td>
                        <td><?php echo $resultat->NOM_COMMUNE ?></td>
                        <td><?php echo $resultat->NOM_DISTRICT ?></td>
                        <td><?php echo $resultat->NOM_REGION ?></td>
                        <td>
                            <a href="<?php echo base_url()?>c_resultat/fiche_resultat/<?php echo $resultat->ANNEE .'/'.$op .'?id='. $resultat->ID_OP.'&filiere='.$resultat->ID_FILIERE.'&campagne='.$resultat->NUM_CAMPAGNE?>"><i class="material-icons green-text">info_outline</i></a>
                        </td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <div id="pagination">
                    <p class="left"><b>Total: <?php echo empty($resultatTotal)?'':$$resultatTotal?></b></p>
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
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/list.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/materialize-pagination.js"></script>
<script type="text/javascript">
    var li = $('a[href="http://localhost/aropa/c_resultat/liste_resultat"]').parent();
    li.addClass("active");
    $(document).ready(function(){
        var options = {
            valueNames: [ 'date_saisie','code_op', 'nom_op', 'filiere', 'date_f', 'libele']
        };
        var appuiListe = new List('liste', options);

        $('#pagination').materializePagination({
            align: 'right',
            lastPage:  <?php if($resultatTotal%20==0) echo $resultatTotal/20; else echo $resultatTotal/20;+ 1 ?>,
            firstPage:  1,
            urlParameter: 'page',
            useUrlParameter: true,
            onClickCallback: function(requestedPage){
                window.location.replace('<?php echo base_url() ?>c_appui/liste_resultat?page='+requestedPage);
            }
        });

        $('.pagination').removeClass('right-align');
        $('.pagination').addClass('right');
    });
</script>