<main xmlns="http://www.w3.org/1999/html">
    <div class="container1">
        <div class="row z-depth-1">
            <div class="col s12">
                <h2 class="header" style="margin-bottom: 30px;">Nouvelle Résultat</h2>

                <form method="post" action="<?php echo base_url(); ?>c_resultat/ajout_resultat" style="margin-bottom: 20px;" class="container">
                    <div class="row">
                        <div class="input-field inline col s12">
                            <input type="hidden" name="id_opb" value="<?php echo $id ?>">
                            <input readonly value="<?php echo $opb->NOM_OPB.' (code: '. $opb->CODE_OPB.')'?>" id="label_op" type="text" class="green-text col s10">
                            <label class="active grey-text" for="label_op">OPB</label>
                            <a href="<?php echo base_url(); ?>c_resultat/choisir_opb" class="waves-effect blue waves-light btn col s2">modifier</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s2">
                            <label for="annee" class="grey-text">Année :</label>
                            <input id="annee" type="text" name="annee" value="<?php echo date('Y')?>" required="">
                        </div>
                        <div class="input-field col s4">
                            <label for="date_collecte" class="grey-text active">Date de Collecte</label>
                            <input id="date_collecte" type="date" class="datepicker" name="date_collecte">
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s4">
                            Campagne :
                            <input class="with-gap" name="campagne" type="radio" id="num1" value="1" checked/>
                            <label class="grey-text" style="top: 0" for="num1">1</label>
                            <input class="with-gap" name="campagne" type="radio" id="num2" value="2"/>
                            <label class="grey-text" style="top: 0" for="num2">2</label>
                        </div>
                        <div class="input-field col s4">
                            <select name="id_filiere" class="browser-default" style="border: 1px solid darkgrey;">
                                <option disabled selected value="">Filière</option>
                                <?php foreach($filieres as $filiere){ ?>
                                <option value="<?php echo $filiere->ID_FILIERE ?>"><?php echo $filiere->NOM_FILIERE ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <table class="ajout">
                        <thead >
                        <tr>
                            <th width="2%">#</th>
                            <th width="35%">Code : Nom EAF</th>
                            <th>Superficie (Ares)</th>
                            <th>Qté produite (Kg)</th>
                            <th>Qtée commercialisée (Kg)</th>
                            <th>Montant reçu (Ariary)</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php for($i=0; $i<10; $i++) {?>
                            <tr>
                                <td><?php echo $i+1?></td>
                                <td class="input-field">
                                    <input type="hidden" name="membres[<?php echo $i?>][id]">
                                    <input type="text" class="autocomplete" autocomplete="off" style="position: relative; bottom: 10px">
                                </td>
                                <td class="input-field">
                                    <input type="number" name="membres[<?php echo $i?>][superficie]" class="validate" >
                                </td>
                                <td class="input-field">
                                    <input type="number" name="membres[<?php echo $i?>][qte_produite]" class="validate" >
                                </td>
                                <td class="input-field">
                                    <input type="number" name="membres[<?php echo $i?>][qte_com]" class="validate" >
                                </td>
                                <td class="input-field">
                                    <input type="number" name="membres[<?php echo $i?>][montant]" class="validate" >
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                    <input type="submit" value="Valider" class="waves-effect green waves-light btn">
                </form>
            </div>
        </div>
    </div>
</main>
<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/materialize.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/init.js"></script>
<script type="text/javascript">
    var li = $('a[href="http://localhost/aropa/c_appui/new_appui"]').parent();
    li.addClass("active");
    var parentLi = li.parents("li");
    parentLi.addClass("active");
    $(parentLi).children().first().addClass("active");
    $('form')[0].reset();
    $(document).ready(function(){
        $(function() {
            $.ajax({
                type: 'GET',
                url: 'http://localhost/aropa/c_rest/liste_eaf_membre/<?php echo $id ?>',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                dataType : 'json',
                success: function(response) {
                    var liste = response;
                    var data = {};
                    for (var i = 0; i < liste.length; i++) {
                        data[liste[i].CODE_MENAGE+' : '+liste[i].NOM_MENAGE+' ('+liste[i].SURNOM+')'] = liste[i].ID_MENAGE;
                    }
                    $('input.autocomplete').autocomplete({
                        data: data,
                        onAutocomplete: function(val) {
                            $('input.autocomplete').change(function(){
                                $(this.previousElementSibling).attr('value',data[val]);
                            });
                        },
                        limit: 5
                    });
                }
            });
        });
    });
</script>