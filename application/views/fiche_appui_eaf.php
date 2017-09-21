<?php
    if(isset($appui_eaf->ID_PARENT)) {
        $data = getOpParent($appui_eaf->ID_PARENT);
        $parent = $data['op'];
    }
?>
<main xmlns="http://www.w3.org/1999/html">
    <div class="container1">
        <div class="row z-depth-1" style="padding-bottom: 20px">
            <div class="col s12">
                <h2 class="header" style="margin-bottom: 30px;">Fiche Appui EAF <a href="#!" class="waves-effect blue waves-light btn right">Modifier</a></h2>

                <div class="row">
                    <div class="input-field inline col s6">
                        <input readonly value="<?php echo $eaf->NOM_MENAGE.' (code : '.$eaf->CODE_MENAGE.')' ?>" id="code_nom" type="text" class="black-text">
                        <label for="code_nom" class="blue-text">Identification de l'EAF</label>
                    </div>
                </div>
                <div class="row">
                    <?php if(isset($parent)) {?>
                    <div class="input-field col s6">
                        <input readonly value="<?php echo $parent->NOM_OP.' (code: '.$parent->CODE_OP.')' ?>" id="parent" type="text" class="black-text">
                        <label for="parent" class="blue-text">Appui a partir du groupe :</label>
                    </div>
                    <?php } ?>
                    <div class="input-field col s6">
                        <input readonly value="<?php echo date('d/m/Y',strtotime($appui_eaf->DATE_COLLECTE)) ?>" id="date_collecte" type="text" class="black-text">
                        <label for="date_collecte" class="blue-text">Date de Collecte</label>
                    </div>
                </div>
                <?php if($appui_eaf->ID_FORMATION!='' && $appui_eaf->ID_FORMATION!=null) { ?>
                <div id="detail_formation" class="row" >
                    <h5 class="green-text col s12">Détail de la formation</h5>
                    <div class="input-field col s12">
                        <input readonly value="<?php echo $formation->THEME?>" id="theme_formation" type="text" class="black-text">
                        <label for="theme_formation" class="blue-text">Thème de formation</label>
                    </div>
                    <div class="input-field col s6">
                        <label for="date_debut" class="blue-text">Date de début</label>
                        <input readonly value="<?php echo $formation->DATE_DEBUT?>" id="date_debut" type="text" class="black-text">
                    </div>
                    <div class="input-field col s6">
                        <label for="date_fin" class="blue-text">Date fin</label>
                        <input readonly value="<?php echo $formation->DATE_FIN?>" id="date_fin" type="text" class="black-text">
                    </div>
                    <label class="blue-text" style="padding-left: 0.75rem">Lieu:</label>
                    <div class="input-field col s12" style="margin: 0">
                        <div class="input-field inline col s3" style="padding-left: 0">
                            <select class="browser-default" name="id_region" style="border: 1px solid darkgrey;">
                                <option value="" disabled selected><?php echo $zone_intervention->NOM_REGION ?></option>
                            </select>
                        </div>
                        <div class="input-field inline col s3" style="padding-left: 0">
                            <select class="browser-default" name="id_district" style="border: 1px solid darkgrey;">
                                <option value="" disabled selected><?php echo $zone_intervention->NOM_DISTRICT ?></option>
                            </select>
                        </div>
                        <div class="input-field inline col s3" style="padding-left: 0">
                            <select class="browser-default" name="id_commune" style="border: 1px solid darkgrey;">
                                <option value="" disabled selected><?php echo $zone_intervention->NOM_COMMUNE ?></option>
                            </select>
                        </div>
                        <div class="input-field inline  col s3" style="padding-left: 0">
                            <select class="browser-default" name="id_fokontany" style="border: 1px solid darkgrey;">
                                <option value="" disabled selected><?php echo $zone_intervention->NOM_FOKONTANY ?></option>
                            </select>
                        </div>
                    </div>
                </div>
                <?php } if($appui_eaf->OBJET_NATURE!='' && $appui_eaf->OBJET_NATURE!=null) {?>
                <div class="row">
                    <h5 class="green-text col s12">Détails Objet/nature offert</h5>
                    <div class="input-field col s8">
                        <label class="blue-text" for="libelle">Libellé</label>
                        <input readonly value="<?php echo $appui_eaf->OBJET_NATURE?>" id="libelle" type="text" class="black-text">
                    </div>
                    <div class="input-field col s2">
                        <label class="blue-text" for="qte" >Quantité</label>
                        <input readonly id="qte" value="<?php echo $appui_eaf->QTE?>" type="text" class="black-text" >
                    </div>
                    <div class="input-field col s2">
                        <label class="blue-text" for="unite">Unité</label>
                        <input readonly id="unite" value="<?php echo $appui_eaf->UNITE?>" type="text" class="black-text" >
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</main>
<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/materialize.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/init.js"></script>
<script type="text/javascript">
    var li = $('a[href="http://localhost/aropa/c_appui/liste_appui"]').parent();
    li.addClass("active");
    console.log(window.location.href);
    var parentLi = li.parents("li");
    parentLi.addClass("active");
    $(parentLi).children().first().addClass("active");
</script>