<main>
    <div class="container1">
        <div class="row z-depth-1">
            <div class="col s12">
                <h2 class="header" style="margin-bottom: 30px;">Nouvelle EAF </h2>

                <form method="post" action="<?php echo base_url(); ?>c_parametre/insert_menage" style="margin-bottom: 20px;" class="container">
                    <div class="input-field col s12">
                        <input id="nom_menage" type="text" name="nom_menage">
                        <label class="label" for="nom_menage">Nom et Prénom</label>
                    </div>
                    <div class="input-field col s12">
                        <input id="surnom" type="text" name="surnom">
                        <label class="label" for="surnom">Surnom</label>
                    </div>
                    <div class="input-field col s12">
                        Sexe :
                        <input checked class="with-gap" name="sexe" type="radio" id="homme" value="H"/>
                        <label class="grey-text" style="top: 0" for="homme">H</label>
                        <input class="with-gap" name="sexe" type="radio" id="femme" value="F"/>
                        <label class="grey-text" style="top: 0" for="femme">F</label>
                    </div>

                    <div class="input-field col s12">
                        <input id="type" type="number" name="type_eaf" min="1" max="3" value="1" class="validate" style="width:15%">
                        <label class="label active" for="type">Type EAF</label>
                    </div>
                    <label class="grey-text col 12" style="padding-left: 0.75rem">Filières développées</label>
                    <div class="input-field col s12" style="margin: 0">
                        <select multiple name="filieres[]">
                            <option value="" disabled selected>Filières développées</option>
                            <?php foreach($filieres as $filiere){ ?>
                            <option value="<?php echo $filiere->ID_FILIERE ?>"><?php echo $filiere->NOM_FILIERE ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="input-field col s12">
                        Residance:
                        <div class="input-field inline"  style="margin: 0 0 0 5px">
                            <select class="browser-default" name="id_region">
                                <option value="" disabled selected>Choisir une région</option>
                                <?php foreach($regions as $region){ ?>
                                <option value="<?php echo $region->ID_REGION ?>"><?php echo $region->NOM_REGION ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="input-field inline"  style="margin: 0 0 0 5px">
                            <select class="browser-default" name="id_district">
                                <option value="" disabled selected>Choisir une district</option>
                            </select>
                        </div>
                        <div class="input-field inline"  style="margin: 0 0 0 5px">
                            <select class="browser-default" name="id_commune">
                                <option value="" disabled selected>Choisir une commune</option>
                            </select>
                        </div>
                        <div class="input-field inline" style="margin: 0 0 0 5px">
                            <select class="browser-default" name="id_fokontany">
                                <option value="" disabled selected>Choisir une Fokontany</option>
                            </select>
                        </div>
                    </div>
                    <div class="input-field col s12">
                        Affiliation IMF :
                        <input checked class="with-gap" name="imf" type="radio" id="oui" value="1"/>
                        <label class="grey-text" style="top: 0" for="oui">oui</label>
                        <input class="with-gap" name="imf" type="radio" id="non" value="0"/>
                        <label class="grey-text" style="top: 0" for="non">non</label>
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
    var li = $('a[href="http://localhost/aropa/c_parametre/liste_menage"]').parent();
    li.addClass("active");
    console.log(window.location.href);
    var parentLi = li.parents("li");
    parentLi.addClass("active");
    $(parentLi).children().first().addClass("active");
    $('form')[0].reset();

</script>