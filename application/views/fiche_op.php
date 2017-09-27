<main>
    <div class="container1">
        <div class="row z-depth-1">
            <div class="col s12">
                <h2 class="header" style="margin-bottom: 30px;">Fiche <?php echo strtoupper($op)?> <a href="#!" class="waves-effect blue waves-light btn right">Modifier</a></h2>
                <div class="row">
                    <div class="input-field col s6">
                        <input readonly id="code_op" value="<?php echo $ficheOp->CODE_OP?>" type="text" class="black-text" >
                        <label class="blue-text" for="code_op">Code <?php echo strtoupper($op)?></label>
                    </div>
                    <div class="input-field col s6">
                        <input readonly id="nom_op" value="<?php echo $ficheOp->NOM_OP?>" type="text" class="black-text">
                        <label class="blue-text" for="nom_op">Nom</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <label for="date_appui" class="blue-text">Date de constitution</label>
                        <input readonly id="date_appui" value="<?php echo $ficheOp->DATE_CREATION?>" type="text" class="black-text">
                    </div>
                    <div class="input-field col s6">
                        <label for="statut" class="blue-text">Statut juridique</label>
                        <input readonly value="<?php echo $ficheOp->STATUT?>" id="statut" type="text" class="black-text">
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <label for="filiere" class="blue-text">Filières développées</label>
                        <input readonly value="<?php echo $filieres->FILIERES?>"id="filiere" type="text" class="black-text">
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        Formelle :
                        <input <?php if($ficheOp->FORMELLE==1) echo 'checked'?> class="with-gap" name="formelle" type="radio" id="oui" value="1"/>
                        <label class="grey-text" style="top: 0" for="oui">OUI</label>
                        <input <?php if($ficheOp->FORMELLE==0) echo 'checked'?> class="with-gap" name="formelle" type="radio" id="non" value="0"/>
                        <label class="grey-text" style="top: 0" for="non">NON</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input readonly value="<?php echo $ficheOp->NOM_MENAGE?>" id="representant_op" type="text" class="black-text">
                        <label class="blue-text" for="representant_op">Représentant <?php echo strtoupper($op)?></label>
                    </div>
                    <div class="input-field col s6">
                        <input readonly value="<?php echo $ficheOp->CONTACT?>"id="contact_op" type="text" class="black-text">
                        <label class="blue-text" for="contact_op">Contact</label>
                    </div>
                </div>
                <div class="row">
                    <span class="col input-field inline col s1">Siège:</span>
                    <div class="col s11">
                        <div class="input-field inline col s3 "  style="margin: 0">
                            <select class="browser-default" >
                                <option value="" disabled selected><?php echo $ficheOp->NOM_REGION?></option>
                            </select>
                        </div>
                        <div class="input-field inline col s3"  style="margin: 0">
                            <select class="browser-default">
                                <option value="" disabled selected><?php echo $ficheOp->NOM_DISTRICT?></option>
                            </select>
                        </div>
                        <div class="input-field inline col s3"  style="margin: 0">
                            <select class="browser-default">
                                <option value="" disabled selected><?php echo $ficheOp->NOM_COMMUNE?></option>
                            </select>
                        </div>
                        <div class="input-field inline col s3" style="margin: 0">
                            <select class="browser-default">
                                <option value="" disabled selected><?php echo $ficheOp->NOM_FOKONTANY?></option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="input-field col s12">
                    <textarea readonly id="observation" class="materialize-textarea">
                        <?php echo $ficheOp->OBSERVATION?>
                    </textarea>
                    <label class="blue-text" for="observation">Observation</label>
                </div>
                <h5 class="green-text" id="liste_membre">
                    Détails des Membres
                    <a href="<?php echo base_url();?>c_parametre/ajout_membre/<?php echo $op?>/<?php echo $ficheOp->ID_OP?>"  class="btn-floating btn-large right waves-effect waves-light green"><i class="material-icons">add</i></a>
                </h5>
                <?php if($op=='opf'){?>
                    <table class="bordered striped">
                        <thead>
                        <tr>
                            <th width="10%">Code OPR</th>
                            <th>Nom de l'OPR</th>
                            <th>Nb EAF</th>
                            <th>Sexe(M)</th>
                            <th>Sexe(F)</th>
                            <th>Commune</th>
                            <th>District</th>
                            <th>Region</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($membres as $membre) { $nb = getNbrEafByIdOpr($membre->ID_OP) ?>
                            <tr>
                                <td><a href="<?php echo base_url()?>c_parametre/fiche_op/opr/<?php echo $membre->ID_OP ?>"><?php echo $membre->CODE_OP ?></a></td>
                                <td><?php echo $membre->NOM_OP ?></td>
                                <td><?php echo $nb['nb'] ?></td>
                                <td><?php echo $nb['H'] ?></td>
                                <td><?php echo $nb['F'] ?></td>
                                <td><?php echo $membre->NOM_COMMUNE ?></td>
                                <td><?php echo $membre->NOM_DISTRICT ?></td>
                                <td><?php echo $membre->NOM_REGION ?></td>
                                <td width="1%"><button class="waves-effect waves-light btn red" style="padding: 0 0.5rem"><i class="material-icons">delete</i></button></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                <?php } ?>
                <?php if($op=='opr'){?>
                    <table class="bordered striped">
                        <thead>
                        <tr>
                            <th width="10%">Code OP</th>
                            <th>Nom de l'OPB/Union</th>
                            <th>Type OP</th>
                            <th>Nb EAF</th>
                            <th>Sexe(M)</th>
                            <th>Sexe(F)</th>
                            <th>Fokontany</th>
                            <th>Commune</th>
                            <th>District</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($membres as $membre) { $nb = getNbrEafUnionOpb($membre->CODE_OP,$membre->ID_OP); ?>
                            <tr>
                                <td><a href="<?php echo base_url()?>c_parametre/fiche_op/<?php if($membre->CODE_OP[0]=='O') echo 'opb'; else echo 'union'?>/<?php echo $membre->ID_OP ?>"><?php echo $membre->CODE_OP ?></a></td>
                                <td><?php echo $membre->NOM_OP ?></td>
                                <td><?php echo $membre->TYPE ?></td>
                                <td><?php echo $nb['nb'] ?></td>
                                <td><?php echo $nb['H'] ?></td>
                                <td><?php echo $nb['F'] ?></td>
                                <td><?php echo $membre->NOM_FOKONTANY ?></td>
                                <td><?php echo $membre->NOM_COMMUNE ?></td>
                                <td><?php echo $membre->NOM_DISTRICT ?></td>
                                <td width="1%"><button class="waves-effect waves-light btn red" style="padding: 0 0.5rem"><i class="material-icons">delete</i></button></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                <?php } ?>
                <?php if($op=='union'){?>
                    <table class="bordered striped">
                        <thead>
                        <tr>
                            <th width="10%">Code OPB</th>
                            <th>Nom de l'OPB</th>
                            <th>Type OP</th>
                            <th>Nb EAF</th>
                            <th>Sexe(M)</th>
                            <th>Sexe(F)</th>
                            <th>Fokontany</th>
                            <th>Commune</th>
                            <th>District</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($membres as $membre) { $nb = getNbrEafByIdOpb($membre->ID_OP); ?>
                            <tr>
                                <td><a href="<?php echo base_url()?>c_parametre/fiche_op/opb/<?php echo $membre->ID_OP ?>"><?php echo $membre->CODE_OP ?></a></td>
                                <td><?php echo $membre->NOM_OP ?></td>
                                <td><?php echo $membre->TYPE ?></td>
                                <td><?php echo $nb['nb'] ?></td>
                                <td><?php echo $nb['H'] ?></td>
                                <td><?php echo $nb['F'] ?></td>
                                <td><?php echo $membre->NOM_FOKONTANY ?></td>
                                <td><?php echo $membre->NOM_COMMUNE ?></td>
                                <td><?php echo $membre->NOM_DISTRICT ?></td>
                                <td width="1%"><button class="waves-effect waves-light btn red" style="padding: 0 0.5rem"><i class="material-icons">delete</i></button></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                <?php } ?>
                <?php if($op=='opb'){?>
                    <table class="bordered striped">
                        <thead>
                        <tr>
                            <th width="10%">Code EAF</th>
                            <th>Nom et Prénoms</th>
                            <th>Surnom</th>
                            <th>Type EAF</th>
                            <th>Fonction</th>
                            <th>Sexe</th>
                            <th>Date d'Adhesion</th>
                            <th>Affiliation autre OP</th>
                            <th>Affiliation IMF</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($membres as $membre) {?>
                            <tr>
                                <td><?php echo $membre->CODE_MENAGE ?></td>
                                <td><?php echo $membre->NOM_MENAGE ?></td>
                                <td><?php echo $membre->SURNOM ?></td>
                                <td><?php echo $membre->TYPE ?></td>
                                <td><?php echo $membre->NOM_FONCTION ?></td>
                                <td><?php echo $membre->SEXE ?></td>
                                <td><?php echo $membre->DATE_ADHESION ?></td>
                                <td><?php if(getNbrOpbByIdMenage($membre->ID_MENAGE) == 1) echo 'OUI'; else echo 'NON' ?></td>
                                <td><?php if($membre->IMF == 1) echo 'OUI'; else echo 'NON' ?></td>
                                <td width="1%"><button class="waves-effect waves-light btn red" style="padding: 0 0.5rem"><i class="material-icons">delete</i></button></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
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
    var li = $('a[href="http://localhost/aropa/c_parametre/liste_<?php echo $op?>"]').parent();
    li.addClass("active");
    console.log(window.location.href);
    var parentLi = li.parents("li");
    parentLi.addClass("active");
    $(parentLi).children().first().addClass("active");
</script>