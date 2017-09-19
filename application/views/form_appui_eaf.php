<?php
    $idParent = $this->input->get('parent',TRUE);
    $parent = null;
    if($idParent!='') $parent = getOpParent($idParent);
?>
<main xmlns="http://www.w3.org/1999/html">
    <div class="container1">
        <div class="row z-depth-1">
            <div class="col s12">
                <h2 class="header" style="margin-bottom: 30px;">Nouvelle appui EAF</h2>

                <form method="post" action="<?php echo base_url(); ?>c_appui/ajout_appui_eaf" style="margin-bottom: 20px;" class="container">
                    <div class="row">
                        <div class="input-field inline col s12">
                            <input type="hidden" name="id_eaf" value="<?php echo $id ?>">
                            <?php if(isset($parent)) { ?>
                            <input type="hidden" name="id_parent" value="<?php echo $idParent ?>">
                            <?php } ?>
                            <input readonly value="<?php echo $eaf->NOM_MENAGE.' (code: '. $eaf->CODE_MENAGE.')'?>" id="label_op" type="text" class="green-text col s10">
                            <label class="active grey-text" for="label_op">EAF</label>
                            <?php if(!isset($parent)) { ?>
                            <a href="<?php echo base_url(); ?>c_appui/appui_eaf" class="waves-effect blue waves-light btn col s2">modifier</a>
                            <?php } else { ?>
                                <a href="<?php echo base_url(); ?>c_appui/appui_eaf" class="waves-effect blue waves-light btn col s2">modifier</a>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="row">
                        <?php if(isset($parent)) {?>
                        <div class="input-field col s4">
                            <label for="parent" class="grey-text">Appui a partir du groupe :</label>
                            <input id="parent" type="text" value="<?php echo $parent->NOM_OP.'(code: '.$parent->CODE_OP.')' ?>" readonly>
                        </div>
                        <?php } ?>
                        <div class="input-field col s4 right">
                            <label for="date_collecte" class="grey-text active">Date de Collecte</label>
                            <input id="date_collecte" type="date" class="datepicker" name="date_collecte">
                        </div>
                    </div>
                    <div id="detail_formation" class="row">
                        <h5 class="green-text col s12">Détail de la formation</h5>
                        <div class="input-field col s12">
                            <input id="theme_formation" type="text" name="theme_formation">
                            <label class="grey-text" for="theme_formation">Thème de formation</label>
                        </div>
                        <div class="input-field col s6">
                            <label for="date_debut" class="grey-text active">Date de début</label>
                            <input id="date_debut" type="date" class="datepicker" name="formation_debut">
                        </div>
                        <div class="input-field col s6">
                            <label for="date_fin" class="grey-text active">Date fin</label>
                            <input id="date_fin" type="date" class="datepicker" name="formation_fin">
                        </div>
                        <label class="label" style="padding-left: 0.75rem">Lieu:</label>
                        <div class="input-field col s12" style="margin: 0">
                            <div class="input-field inline col s3" style="padding-left: 0">
                                <select class="browser-default" name="id_region" style="border: 1px solid darkgrey;">
                                    <option value="" disabled selected>Choisir une région</option>
                                    <?php foreach($regions as $region){ ?>
                                        <option value="<?php echo $region->ID_REGION ?>"><?php echo $region->NOM_REGION ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="input-field inline col s3" style="padding-left: 0">
                                <select class="browser-default" name="id_district" style="border: 1px solid darkgrey;">
                                    <option value="" disabled selected>Choisir une district</option>
                                </select>
                            </div>
                            <div class="input-field inline col s3" style="padding-left: 0">
                                <select class="browser-default" name="id_commune" style="border: 1px solid darkgrey;">
                                    <option value="" disabled selected>Choisir une commune</option>
                                </select>
                            </div>
                            <div class="input-field inline  col s3" style="padding-left: 0">
                                <select class="browser-default" name="id_fokontany" style="border: 1px solid darkgrey;">
                                    <option value="" disabled selected>Choisir une Fokontany</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <h5 class="green-text col s12">Détails Objet/nature offert</h5>
                        <div class="input-field col s8">
                            <label for="libelle" class="grey-text active">Libellé</label>
                            <input id="libelle" type="text" name="objet_nature">
                        </div>
                        <div class="input-field col s2">
                            <label for="qte" class="grey-text">Quantité</label>
                            <input id="qte" type="number" min="0" class="validate" name="qte">
                        </div>
                        <div class="input-field col s2">
                            <select name="unite" class="browser-default" style="border: 1px solid darkgrey;">
                                <option disabled selected value="">Unité</option>
                                <option value="kg">kg</option>
                                <option value="nb">nb</option>
                            </select>
                        </div>
                    </div>
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
    console.log(window.location.href);
    var parentLi = li.parents("li");
    parentLi.addClass("active");
    $(parentLi).children().first().addClass("active");
</script>