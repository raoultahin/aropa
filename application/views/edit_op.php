<main>
    <div class="container1">
        <div class="row z-depth-1" style="padding-bottom: 40px">
            <div class="col s12">
                <h2 class="header" style="margin-bottom: 30px;">Fiche <?php echo strtoupper($op)?></h2>
                <form method="post" action="<?php echo base_url()?>c_parametre/update_op/<?php echo $op.'/'.$ficheOp->ID_OP?>">
                    <div class="row">
                        <div class="input-field col s6">
                            <input name="nom_op" id="nom_op" value="<?php echo $ficheOp->NOM_OP?>" type="text" class="black-text">
                            <label class="blue-text" for="nom_op">Nom</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <label for="date_appui" class="blue-text active">Date de constitution</label>
                            <input id="date_appui" value="<?php echo $ficheOp->DATE_CREATION?>" name="date_creation" type="date" class="datepicker black-text">
                        </div>
                        <div class="input-field col s6">
                            <select style=" margin-bottom: 10px" name="statut">
                                <option value="" disabled>Statut juridique</option>
                                <option <?php if($ficheOp->STATUT=='Association') echo 'selected'?> value="Association">Association</option>
                                <option <?php if($ficheOp->STATUT=='Cooperative') echo 'selected'?>value="Cooperative">Cooperative</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <select multiple name="filieres[]">
                                <option value="" disabled>Filières développées</option>
                                <?php foreach($filieres as $filiere){ ?>
                                    <option <?php if(strpos($fil->FILIERES,$filiere->NOM_FILIERE) !== false) echo 'selected'?> value="<?php echo $filiere->ID_FILIERE ?>"><?php echo $filiere->NOM_FILIERE ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s4">
                            Formelle :
                            <input <?php if($ficheOp->FORMELLE==1) echo 'checked'?> class="with-gap" name="formelle" type="radio" id="oui" value="1"/>
                            <label class="grey-text" style="top: 0" for="oui">OUI</label>
                            <input <?php if($ficheOp->FORMELLE==0) echo 'checked'?> class="with-gap" name="formelle" type="radio" id="non" value="0"/>
                            <label class="grey-text" style="top: 0" for="non">NON</label>
                        </div>
                        <?php if($op=='opb' || $op=='union'){?>
                        <div class="input-field col s2">
                            <input name="type_op" id="type_op" value="<?php echo $ficheOp->NOM_OP?>" type="number" min="0" class="black-text validate">
                            <label class="blue-text" for="type_op">Type</label>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input type="hidden" name="representant">
                            <input id="representant_op" type="text" class="autocomplete black-text" value="<?php echo $ficheOp->NOM_MENAGE?>" autocomplete="off">
                            <label class="blue-text" for="representant_op">Représentant <?php echo strtoupper($op)?></label>
                        </div>
                        <div class="input-field col s6">
                            <input name="contact" value="<?php echo $ficheOp->CONTACT?>" id="contact_op" type="text" class="black-text">
                            <label class="blue-text" for="contact_op">Contact</label>
                        </div>
                    </div>
                    <div class="row">
                        <span class="col input-field inline col s1">Siège:</span>
                        <div class="col s11">
                            <div class="input-field inline col s3 "  style="margin: 0">
                                <select class="browser-default" name="id_region" >
                                    <option value="" selected><?php echo $ficheOp->NOM_REGION?></option>
                                    <?php foreach($regions as $region){ ?>
                                        <option value="<?php echo $region->ID_REGION ?>"><?php echo $region->NOM_REGION ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="input-field inline col s3"  style="margin: 0">
                                <select class="browser-default" name="id_district">
                                    <option value="" selected><?php echo $ficheOp->NOM_DISTRICT?></option>
                                </select>
                            </div>
                            <div class="input-field inline col s3"  style="margin: 0">
                                <select class="browser-default" name="id_commune">
                                    <option value="" selected><?php echo $ficheOp->NOM_COMMUNE?></option>
                                </select>
                            </div>
                            <div class="input-field inline col s3" style="margin: 0">
                                <select class="browser-default" name="id_fokontany">
                                    <option value="<?php echo $ficheOp->ID_FOKONTANY?>" selected><?php echo $ficheOp->NOM_FOKONTANY?></option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="input-field col s12">
                        <textarea name="observation" id="observation" class="materialize-textarea">
                            <?php echo $ficheOp->OBSERVATION?>
                        </textarea>
                        <label class="blue-text" for="observation">Observation</label>
                    </div>
                    <button type="submit" class="waves-effect waves-light green btn">Modifier</button>
                    <a href="<?php echo base_url()?>c_parametre/fiche_op/<?php echo $op.'/'.$ficheOp->ID_OP?>" class="waves-effect waves-light red btn">annuler</a>
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
    var li = $('a[href="http://localhost/aropa/c_parametre/liste_<?php echo $op?>"]').parent();
    li.addClass("active");
    console.log(window.location.href);
    var parentLi = li.parents("li");
    parentLi.addClass("active");
    $(parentLi).children().first().addClass("active");
    $('form')[0].reset();

    $(document).ready(function(){
        $(function() {
            $.ajax({
                type: 'GET',
                url: 'http://localhost/aropa/c_rest/liste_menage',
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
                                $('input[name="representant"]').attr('value',data[val]);
                            });
                        },
                        limit: 5
                    });
                }
            });
        });
    });

</script>