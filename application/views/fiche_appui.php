<main xmlns="http://www.w3.org/1999/html">
    <div class="container1">
        <div class="row z-depth-1" style="padding-bottom: 20px">
            <div class="col s12">
                <h2 class="header" style="margin-bottom: 30px;">Fiche Appui </h2>

                <div class="row">
                    <div class="input-field inline col s6">
                        <input disabled value="<?php echo $op->CODE_OP.' : '.$op->NOM_OP ?>" id="code_nom" type="text" class="black-text">
                        <label for="code_nom" class="blue-text">Identification de l'OP</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input disabled value="<?php echo date('d/m/Y',strtotime($appui_op->DATE_COLLECTE)) ?>" id="date_collecte" type="text" class="black-text">
                        <label for="date_collecte" class="blue-text">Date de Collecte</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input disabled value="<?php echo $mecanisme->LIBELLE?>" id="mecanisme" type="text" class="black-text">
                        <label for="mecanisme" class="blue-text">Mécanismes d'appui</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s4">
                        <input disabled value="<?php echo date('d/m/Y',strtotime($detail_appui->DATE_FINANCEMENT)) ?>" id="date_appui" type="text" class="black-text">
                        <label for="date_appui" class="blue-text">Date de financement</label>
                    </div>
                    <div class="input-field col s4">
                        <input disabled value="<?php echo $detail_appui->MONTANT ?>" id="montant" type="text" class="black-text">
                        <label for="montant" class="blue-text">Montant</label>
                    </div>
                    <div class="input-field col s4">
                        <input disabled value="<?php echo $detail_appui->NOM_FILIERE ?>" id="filiere" type="text" class="black-text">
                        <label for="filiere" class="blue-text">Filière</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input disabled value="<?php echo $type_appui->LIBELLE ?>" id="type_appui" type="text" class="black-text">
                        <label for="type_appui" class="blue-text">Type Appui</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input disabled value="<?php echo $appui_op->DESCRIPTION ?>" id="nature_appui" type="text" class="black-text">
                        <label class="blue-text" for="nature_appui">Objet/Nature de l'appui</label>
                    </div>
                </div>
                <?php if($appui_op->ID_CAT_OP!='' && $appui_op->ID_CAT_OP!=null) {?>
                <div class="row">
                    <div class="input-field col s6">
                        <input disabled value="<?php echo $cat_op->LIBELLE ?>" id="cat_op" type="text" class="black-text">
                        <label for="cat_op" class="blue-text">Catégorie du appuyée</label>
                    </div>
                </div>
                <?php } if($appui_op->ID_FORMATION!='' && $appui_op->ID_FORMATION!=null) { ?>
                <div id="detail_formation" class="row" >
                    <h5 class="green-text col s12">Détail de la formation</h5>
                    <div class="input-field col s12">
                        <input disabled value="<?php echo $formation->THEME?>" id="theme_formation" type="text" class="black-text">
                        <label for="theme_formation" class="blue-text">Thème de formation</label>
                    </div>
                    <div class="input-field col s6">
                        <label for="date_debut" class="blue-text">Date de début</label>
                        <input disabled value="<?php echo $formation->DATE_DEBUT?>" id="date_debut" type="text" class="black-text">
                    </div>
                    <div class="input-field col s6">
                        <label for="date_fin" class="blue-text">Date fin</label>
                        <input disabled value="<?php echo $formation->DATE_FIN?>" id="date_fin" type="text" class="black-text">
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
                        <label for="libelle">Libellé</label>
                        <input disabled value="<?php echo $appui_op->OBJET_NATURE?>" id="libelle" type="text" class="black-text">
                    </div>
                    <div class="input-field col s2">
                        <label for="qte" >Quantité</label>
                        <input disabled id="qte" value="<?php echo $appui_op->QTE?>" type="text" class="black-text" >
                    </div>
                    <div class="input-field col s2">
                        <label for="unite">Unité</label>
                        <input disabled id="unite" value="<?php echo $appui_op->UNITE?>" type="text" class="black-text" >
                    </div>
                </div>

                <div class="row">
                    <h5 class="green-text col s12">Détails des béneficiaires</h5>

                    <table class="responsive-table bordered striped col s12">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Item Name</th>
                            <th>Item Price</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Alvin</td>
                            <td>Eclair</td>
                            <td>$0.87</td>
                        </tr>
                        <tr>
                            <td>Alan</td>
                            <td>Jellybean</td>
                            <td>$3.76</td>
                        </tr>
                        <tr>
                            <td>Jonathan</td>
                            <td>Lollipop</td>
                            <td>$7.00</td>
                        </tr>
                        <tr>
                            <td>Shannon</td>
                            <td>KitKat</td>
                            <td>$9.99</td>
                        </tr>
                        </tbody>
                    </table>
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