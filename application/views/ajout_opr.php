<main>
    <div class="container1">
        <div class="row z-depth-1">
            <div class="col s12">
                <h2 class="header" style="margin-bottom: 30px;">Nouvelle OPR </h2>

                <form method="post" action="<?php echo base_url(); ?>c_parametre/insert_opr" style="margin-bottom: 20px;" class="container">
                    <div class="input-field col s12">
                        <input id="nom_opr" type="text" name="nom_opr">
                        <label class="label" for="nom_opr">Nom</label>
                    </div>
                    <div class="col s12">
                        <label for="date_appui">Date de constitution</label>
                        <input id="date_appui" type="date" class="datepicker" name="date_creation">
                    </div>

                    <label class="grey-text" style="padding-left: 0.75rem; display: block">Statut juridique</label>
                    <div class="input-field col s12" style="margin: 0">
                        <select style=" margin-bottom: 10px" name="statut">
                            <option value="" disabled selected>Statut juridique</option>
                            <option value="Association">Association</option>
                            <option value="Cooperative">Cooperative</option>
                        </select>
                    </div>

                    <label class="grey-text" style="padding-left: 0.75rem; display: block">Filières développées</label>
                    <div class="input-field col s12" style="margin: 0">
                        <select multiple name="filieres[]">
                            <option value="" disabled selected>Filières développées</option>
                            <?php foreach($filieres as $filiere){ ?>
                            <option value="<?php echo $filiere->ID_FILIERE ?>"><?php echo $filiere->NOM_FILIERE ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="input-field col s12">
                        Formelle :
                        <input class="with-gap" name="formelle" type="radio" id="oui" value="1"/>
                        <label class="grey-text" style="top: 0" for="oui">oui</label>
                        <input class="with-gap" name="formelle" type="radio" id="non" value="0"/>
                        <label class="grey-text" style="top: 0" for="non">non</label>
                    </div>
                    <div class="input-field col s12">
                        <input type="hidden" name="representant">
                        <input id="representant_opr" type="text" class="autocomplete" autocomplete="off">
                        <label class="label" for="representant_opr">Représentant OPR</label>
                    </div>
                    <div class="input-field col s12">
                        <input id="contact_opr" type="text" name="contact">
                        <label class="label" for="contact_opr">Contact</label>
                    </div>
                    <div class="input-field col s12">
                        Siège:
                        <div class="input-field inline"  style="margin: 0 0 0 15px">
                            <select class="browser-default" name="id_region">
                                <option value="" disabled selected>Choisir une région</option>
                                <?php foreach($regions as $region){ ?>
                                <option value="<?php echo $region->ID_REGION ?>"><?php echo $region->NOM_REGION ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="input-field inline"  style="margin: 0 0 0 15px">
                            <select class="browser-default" name="id_district">
                                <option value="" disabled selected>Choisir une district</option>
                            </select>
                        </div>
                        <div class="input-field inline"  style="margin: 0 0 0 15px">
                            <select class="browser-default" name="id_commune">
                                <option value="" disabled selected>Choisir une commune</option>
                            </select>
                        </div>
                        <div class="input-field inline" style="margin: 0 0 0 15px">
                            <select class="browser-default" name="id_fokontany">
                                <option value="" disabled selected>Choisir une Fokontany</option>
                            </select>
                        </div>
                    </div>
                    <div class="input-field col s12">
                        <textarea id="observation" class="materialize-textarea" name="observation"></textarea>
                        <label class="label" for="observation">Observation</label>
                    </div>
                    <input type="submit" value="Valider" class="waves-effect green waves-light btn" style="margin:50px 0 0 0.75rem">
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
    var li = $('a[href="http://localhost/aropa/c_parametre/liste_opr"]').parent();
    li.addClass("active");
    console.log(window.location.href);
    var parentLi = li.parents("li");
    parentLi.addClass("active");
    $(parentLi).children().first().addClass("active");
</script>