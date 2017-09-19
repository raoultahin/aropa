<?php
    if(isset($appui_op->ID_PARENT)) $parent = getOpParent($appui_op->ID_PARENT);
?>
<main xmlns="http://www.w3.org/1999/html">
    <div class="container1">
        <div class="row z-depth-1" style="padding-bottom: 20px">
            <div class="col s12">
                <h2 class="header" style="margin-bottom: 30px;">Fiche Appui <a href="#!" class="waves-effect blue waves-light btn right">Modifier</a></h2>

                <div class="row">
                    <div class="input-field inline col s6">
                        <input readonly value="<?php echo $op->NOM_OP.' (code : '.$op->CODE_OP.')' ?>" id="code_nom" type="text" class="black-text">
                        <label for="code_nom" class="blue-text">Identification de l'OP</label>
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
                        <input readonly value="<?php echo date('d/m/Y',strtotime($appui_op->DATE_COLLECTE)) ?>" id="date_collecte" type="text" class="black-text">
                        <label for="date_collecte" class="blue-text">Date de Collecte</label>
                    </div>
                </div>
                <?php if($appui_op->TYPE_OP=='4') {?>
                <div class="row">
                    <div class="input-field col s6">
                        <input readonly value="<?php echo $mecanisme->LIBELLE?>" id="mecanisme" type="text" class="black-text">
                        <label for="mecanisme" class="blue-text">Mécanismes d'appui</label>
                    </div>
                </div>
                <?php } ?>
                <div class="row">
                    <div class="input-field col s4">
                        <input readonly value="<?php echo date('d/m/Y',strtotime($detail_appui->DATE_FINANCEMENT)) ?>" id="date_appui" type="text" class="black-text">
                        <label for="date_appui" class="blue-text">Date de financement</label>
                    </div>
                    <div class="input-field col s4">
                        <input readonly value="<?php echo $detail_appui->MONTANT ?>" id="montant" type="text" class="black-text">
                        <label for="montant" class="blue-text">Montant</label>
                    </div>
                    <div class="input-field col s4">
                        <input readonly value="<?php echo $detail_appui->NOM_FILIERE ?>" id="filiere" type="text" class="black-text">
                        <label for="filiere" class="blue-text">Filière</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input readonly value="<?php echo $type_appui->LIBELLE ?>" id="type_appui" type="text" class="black-text">
                        <label for="type_appui" class="blue-text">Type Appui</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input readonly value="<?php echo $appui_op->DESCRIPTION ?>" id="nature_appui" type="text" class="black-text">
                        <label class="blue-text" for="nature_appui">Objet/Nature de l'appui</label>
                    </div>
                </div>
                <?php if($appui_op->TYPE_OP=='4') {?>
                    <div class="row">
                    <div class="input-field col s6">
                        <input readonly value="<?php echo $cat_op->LIBELLE ?>" id="cat_op" type="text" class="black-text">
                        <label for="cat_op" class="blue-text">Catégorie du appuyée</label>
                    </div>
                </div>
                <?php } if($appui_op->ID_FORMATION!='' && $appui_op->ID_FORMATION!=null) { ?>
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
                <?php } ?>
                <div class="row">
                    <h5 class="green-text col s12">Détails Objet/nature offert</h5>
                    <div class="input-field col s8">
                        <label class="blue-text" for="libelle">Libellé</label>
                        <input readonly value="<?php echo $appui_op->OBJET_NATURE?>" id="libelle" type="text" class="black-text">
                    </div>
                    <div class="input-field col s2">
                        <label class="blue-text" for="qte" >Quantité</label>
                        <input readonly id="qte" value="<?php echo $appui_op->QTE?>" type="text" class="black-text" >
                    </div>
                    <div class="input-field col s2">
                        <label class="blue-text" for="unite">Unité</label>
                        <input readonly id="unite" value="<?php echo $appui_op->UNITE?>" type="text" class="black-text" >
                    </div>
                </div>

                <div class="row">
                    <h5 class="green-text col s12">
                        Détails des béneficiaires
                        <a href="<?php echo base_url();?>c_appui/ajout_beneficiaire/<?php echo $appui_op->ID_APPUI_OP ?>" class="btn-floating btn-large right waves-effect waves-light green"><i class="material-icons">add</i></a>
                    </h5>

                    <?php if(isset($beneficiaires[0]) && isset($beneficiaires[0]->TYPE_OP) && $beneficiaires[0]->TYPE_OP == '2') {?>
                    <table class="bordered striped col s12">
                        <thead>
                        <tr>
                            <th>Code OPR</th>
                            <th>Nom de l' OPR</th>
                            <th>Nb EAF appuyés</th>
                            <th>Sexe (M)</th>
                            <th>Sexe (F)</th>
                            <th>Unite</th>
                            <th>Qte</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($beneficiaires as $beneficiaire){
                            $op=getOpById($beneficiaire->TYPE_OP,$beneficiaire->ID_OP);
                            $n = getNbEafAppuieByIdAppui($beneficiaire->ID_APPUI_OP);
                        ?>
                        <tr>
                            <td><?php echo $op->CODE_OP ?></td>
                            <td><?php echo $op->NOM_OP ?></td>
                            <td><?php echo $n['nb'] ?></td>
                            <td><?php echo $n['H'] ?></td>
                            <td><?php echo $n['F'] ?></td>
                            <td><?php echo $beneficiaire->UNITE ?></td>
                            <td><?php echo $beneficiaire->QTE ?></td>
                            <td>
                                <a href="<?php echo base_url()?>c_appui/fiche_appui/<?php echo $beneficiaire->ID_APPUI_OP?>" class="waves-effect waves-light green btn"><i class="material-icons">info_outline</i></a>
                            </td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                    <?php }  ?>
                    <?php if(isset($beneficiaires[0]) && isset($beneficiaires[0]->TYPE_OP) && ($beneficiaires[0]->TYPE_OP == '4' || $beneficiaires[0]->TYPE_OP == '3')) {?>
                        <table class="bordered striped col s12">
                            <thead>
                            <tr>
                                <th>Code OPB/UNION</th>
                                <th>Nom de l' OPB/UNION</th>
                                <th>Type OP</th>
                                <th>Nb EAF appuyés</th>
                                <th>Sexe (M)</th>
                                <th>Sexe (F)</th>
                                <th>Unite</th>
                                <th>Qte</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($beneficiaires as $beneficiaire){
                                $op=getOpById($beneficiaire->TYPE_OP,$beneficiaire->ID_OP);
                                $n = getNbEafAppuieByIdAppui($beneficiaire->ID_APPUI_OP);
                            ?>
                                <tr>
                                    <td><?php echo $op->CODE_OP ?></td>
                                    <td><?php echo $op->NOM_OP ?></td>
                                    <td><?php echo $op->TYPE ?></td>
                                    <td><?php echo $n['nb'] ?></td>
                                    <td><?php echo $n['H'] ?></td>
                                    <td><?php echo $n['F'] ?></td>
                                    <td><?php echo $beneficiaire->UNITE ?></td>
                                    <td><?php echo $beneficiaire->QTE ?></td>
                                    <td>
                                        <a href="<?php echo base_url()?>c_appui/fiche_appui/<?php echo $beneficiaire->ID_APPUI_OP?>" class="waves-effect waves-light green btn"><i class="material-icons">info_outline</i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    <?php } ?>
                    <?php if(isset($beneficiaires[0]) && isset($beneficiaires[0]->ID_MENAGE)) {?>
                        <table class="bordered striped col s12">
                            <thead>
                            <tr>
                                <th>Code EAF</th>
                                <th>Nom et prénoms</th>
                                <th>Sexe (M)</th>
                                <th>Objet/Nature</th>
                                <th>Unite</th>
                                <th>Qte</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($beneficiaires as $beneficiaire){
                                if($beneficiaire->THEME!=null) $beneficiaire->OBJET_NATURE = $beneficiaire->THEME;
                            ?>
                                <tr>
                                    <td><?php echo $beneficiaire->CODE_MENAGE ?></td>
                                    <td><?php echo $beneficiaire->NOM_MENAGE ?></td>
                                    <td><?php echo $beneficiaire->SEXE ?></td>
                                    <td><?php echo $beneficiaire->OBJET_NATURE ?></td>
                                    <td><?php echo $beneficiaire->UNITE ?></td>
                                    <td><?php echo $beneficiaire->QTE ?></td>
                                    <td>
                                        <a href="<?php echo base_url()?>c_appui/fiche_appui/<?php echo $beneficiaire->ID_APPUI_MENAGE?>" class="waves-effect waves-light green btn"><i class="material-icons">info_outline</i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    <?php } ?>
                </div>

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