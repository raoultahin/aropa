<?php
    $idParent = $this->input->get('parent',TRUE);
    $parent = null;
    $appui = null;
    if($idParent!='') {
        $data = getOpParent($idParent);
        $appui = $data['appui'];
        $parent = $data['op'];
    }

?>
<main xmlns="http://www.w3.org/1999/html">
    <div class="container1">
        <div class="row z-depth-1">
            <div class="col s12">
                <h2 class="header" style="margin-bottom: 30px;">Nouvelle appui <?php echo $op ?></h2>
                <form method="post" action="<?php echo base_url(); ?>c_appui/ajout_appui" style="margin-bottom: 20px;" class="container">
                    <div class="row">
                        <div class="input-field inline col s12">
                            <input type="hidden" name="id_op" value="<?php echo $id ?>">
                            <input type="hidden" name="type_op" value="<?php echo $typeOp ?>">
                            <?php if(isset($parent)) { ?>
                            <input type="hidden" name="id_parent" value="<?php echo $idParent ?>">
                            <?php } ?>
                            <input readonly value="<?php echo $opLigne->NOM_OP.' (code: '. $opLigne->CODE_OP.')'?>" id="label_op" type="text" class="green-text col s10">
                            <label class="active grey-text" for="label_op"><?php echo $op ?></label>
                            <?php if(!isset($parent)) { ?>
                            <a href="<?php echo base_url(); ?>c_appui/appui_op/<?php echo strtolower($op) ?>" class="waves-effect blue waves-light btn col s2">modifier</a>
                            <?php } else { ?>
                                <a href="<?php echo base_url(); ?>c_appui/ajout_beneficiaire/<?php echo $idParent ?>" class="waves-effect blue waves-light btn col s2">modifier</a>
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
                    <?php if($op=='OPB') { ?>
                    <div class="row">
                        <div class="input-field col s6">
                            <select name="id_mecanisme" class="browser-default" style="border: 1px solid darkgrey;">
                                <option disabled selected value="">Mécanismes d'appui</option>
                                <?php foreach($mecanismes as $mecanisme){ ?>
                                <option value="<?php echo $mecanisme->ID_MECANISME ?>"><?php echo $mecanisme->LIBELLE ?></option>
                                <?php } ?>
                                <option value="">autre</option>
                            </select>
                        </div>
                        <div class="input-field col s6">
                            <input id="autre_mec" type="text" name="autre_mec" disabled required="" >
                            <label class="grey-text" for="autre_mec">Partenaire à préciser</label>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="row">
                        <div class="input-field col s4">
                            <label for="date_appui" class="grey-text active">Date de financement</label>
                            <input id="date_appui" type="date" value="<?php echo empty($appui)?'':$appui->DATE_FINANCEMENT ?>" class="datepicker" name="date_financement">
                        </div>
                        <div class="input-field col s4">
                            <label for="montant" class="grey-text">Montant</label>
                            <input id="montant" type="number" min="0" class="validate" name="montant">
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
                    <div class="row">
                        <div class="input-field col s12">
                            <select name="id_type_appui" class="browser-default" style="border: 1px solid darkgrey;">
                                <option disabled selected value="">Type Appui</option>
                                <?php
                                    if(isset($parent)) {
                                        foreach($types as $type) {
                                            if($type->ID_TYPE == $appui->ID_TYPE) {
                                ?>
                                <option value="<?php echo $type->ID_TYPE ?>"><?php echo $type->LIBELLE ?></option>
                                <?php
                                            break;
                                            }
                                        }
                                    } else {
                                        foreach($types as $type) {
                                ?>
                                <option value="<?php echo $type->ID_TYPE ?>"><?php echo $type->LIBELLE ?></option>
                                <?php } } ?>
                            </select>

                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="nature_appui" type="text" name="description" value="<?php echo empty($appui)?'':$appui->DESCRIPTION?>">
                            <label class="grey-text" for="nature_appui">Objet/Nature de l'appui</label>
                        </div>
                    </div>
                    <?php if($op=='OPB') { ?>
                    <div class="row">
                        <div class="input-field col s6">
                            <select class="browser-default" style="border: 1px solid darkgrey;" name="id_cat_op">
                                <option disabled selected value="">Catégorie des OP appuyées</option>
                                <?php foreach($catOp as $cat){ ?>
                                    <option value="<?php echo $cat->ID_CAT_OP ?>"><?php echo $cat->LIBELLE ?></option>
                                <?php } ?>
                                <option value="">autre</option>
                            </select>
                        </div>
                        <div class="input-field col s6">
                            <input id="autre_cat" type="text" name="autre_cat" disabled required="">
                            <label class="grey-text" for="autre_cat">Categorie à préciser</label>
                        </div>
                    </div>
                    <?php } ?>
                    <div id="detail_formation" class="row" hidden="" >
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
                            <?php if(isset($parent)) {?>
                                <input id="libelle" type="text" name="objet_nature" value="<?php echo $appui->OBJET_NATURE ?>">
                            <?php } else {?>
                                <input id="libelle" type="text" name="objet_nature">
                            <?php } ?>
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
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/appui_form.js"></script>
<script type="text/javascript">
    var li = $('a[href="http://localhost/aropa/c_appui/new_appui"]').parent();
    li.addClass("active");
    var parentLi = li.parents("li");
    parentLi.addClass("active");
    $(parentLi).children().first().addClass("active");
    $('form')[0].reset();
</script>