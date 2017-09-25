<main xmlns="http://www.w3.org/1999/html">
    <div class="container1">
        <div class="row z-depth-1">
            <div class="col s12">
                <h2 class="header" style="margin-bottom: 30px;">Fiche Résultat <a href="#!" class="waves-effect blue waves-light btn right">Modifier</a></h2>
                <div class="row">
                    <div class="input-field inline col s4">
                        <input readonly value="<?php echo $fiche[0]->NOM_OP.' (code: '. $fiche[0]->CODE_OP.')'?>" id="label_op" type="text" class="green-text">
                        <label class="active grey-text" for="label_op">OPB</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s2">
                        <label for="annee" class="grey-text">Année :</label>
                        <input id="annee" type="text" value="<?php echo $fiche[0]->ANNEE?>" readonly>
                    </div>
                    <div class="input-field col s2">
                        <label for="date_collecte" class="grey-text active">Date de Collecte</label>
                        <input id="date_collecte" type="text" value="<?php echo date("d/m/Y", strtotime($fiche[0]->DATE_COLLECTE));?>" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s4">
                        Campagne :
                        <input <?php if($fiche[0]->NUM_CAMPAGNE == 1) echo 'checked' ?> class="with-gap" name="campagne" type="radio" id="num1" value="1"/>
                        <label class="grey-text" style="top: 0" for="num1">1</label>
                        <input <?php if($fiche[0]->NUM_CAMPAGNE == 2) echo 'checked' ?> class="with-gap" name="campagne" type="radio" id="num2" value="2"/>
                        <label class="grey-text" style="top: 0" for="num2">2</label>
                    </div>
                    <div class="input-field col s4">
                        <select class="browser-default" style="border: 1px solid darkgrey;">
                            <option disabled>Filière</option>
                            <option selected><?php echo $fiche[0]->NOM_FILIERE?></option>
                        </select>
                    </div>
                </div>
                <table class="bordered striped">
                    <thead >
                    <tr>
                        <th>Code EAF</th>
                        <th>Nom</th>
                        <th>Surnom</th>
                        <th>Superficie (Ares)</th>
                        <th>Qte produite (Kg)</th>
                        <th>Qte commercialisée (Kg)</th>
                        <th>Montant reçu (Ariary)</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        $S = 0;$qteP=0;$qteC=0;$M=0;
                        foreach($fiche as $f) {
                        $S += $f->SUPERFICIE;
                        $qteP += $f->QTE_PRODUITE;
                        $qteC += $f->QTE_COMMERCIALISEE;
                        $M += $f->MONTANT;
                    ?>
                        <tr>
                            <td><?php echo $f->CODE_MENAGE ?></td>
                            <td><?php echo $f->NOM_MENAGE ?></td>
                            <td><?php echo $f->SURNOM ?></td>
                            <td><?php echo $f->SUPERFICIE ?></td>
                            <td><?php echo $f->QTE_PRODUITE ?></td>
                            <td><?php echo $f->QTE_COMMERCIALISEE ?></td>
                            <td><?php echo number_format($f->MONTANT, 2, '.', ',') ?></td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <td colspan="3"><b>TOTAL</b></td>
                        <td><?php echo number_format($S, 2, '.', ',') ?></td>
                        <td><?php echo number_format($qteP, 2, '.', ',') ?></td>
                        <td><?php echo number_format($qteC, 2, '.', ',') ?></td>
                        <td><?php echo number_format($M, 2, '.', ',') ?></td>
                    </tr>
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
<script type="text/javascript">
    var li = $('a[href="http://localhost/aropa/c_parametre/liste_resultat"]').parent();
    li.addClass("active");
    var parentLi = li.parents("li");
    parentLi.addClass("active");
    $(parentLi).children().first().addClass("active");
</script>