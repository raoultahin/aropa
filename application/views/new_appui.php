<main>
    <div class="container1">
        <div class="row z-depth-1">
            <div class="col s12">
                <h2 class="header" style="margin-bottom: 30px;">Nouvelle appui <?php echo $op?> </h2>
                <?php if(sizeof($opListe)>0) { ?>
                <form method="get" action="#!" style="margin-bottom: 20px;">
                    Région:
                    <div class="input-field inline" style="margin: 0 15px 0 5px">
                        <select class="browser-default" name="id_region">
                            <option value="" disabled selected>Choisir une région</option>
                            <?php foreach($regions as $region){?>
                            <option value="<?php echo $region->ID_REGION ?>"><?php echo $region->NOM_REGION ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    District:
                    <div class="input-field inline" style="margin: 0 15px 0 5px">
                        <select class="browser-default" name="id_district">
                            <option value="" disabled selected>Choisir une district</option>
                        </select>
                    </div>
                    Commune:
                    <div class="input-field inline" style="margin: 0 15px 0 5px">
                        <select class="browser-default" name="id_commune">
                            <option value="" disabled selected>Choisir une commune</option>
                        </select>
                    </div>
                    <input type="submit" value="Filtrer" class="waves-effect blue waves-light btn btn-block" style="vertical-align: middle;">
                </form>

                <?php } ?>

                <h5 class="green-text">Liste <?php echo $op?> </h5>
                <div class="divider"></div>
                <table class="responsive-table bordered striped">
                    <thead>
                    <tr>
                        <th>Code</th>
                        <th>Nom</th>
                        <th>Fokontany</th>
                        <th>Commune</th>
                        <th>District</th>
                        <th>Région</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($opListe as $opLigne){ ?>
                    <tr>
                        <td><?php echo $opLigne->CODE_OP?></td>
                        <td><?php echo $opLigne->NOM_OP?></td>
                        <td><?php echo $opLigne->NOM_FOKONTANY?></td>
                        <td><?php echo $opLigne->NOM_COMMUNE?></td>
                        <td><?php echo $opLigne->NOM_DISTRICT?></td>
                        <td><?php echo $opLigne->NOM_REGION?></td>
                        <td><a href="<?php echo base_url(); ?>c_appui/appui_op/<?php echo $op.'/'.$opLigne->ID_OP ?>" class="waves-effect green waves-light btn"><i class="material-icons">done</i></a></td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>

                <ul class="pagination">
                    <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                    <li class="active"><a href="#!">1</a></li>
                    <li class="waves-effect"><a href="#!">2</a></li>
                    <li class="waves-effect"><a href="#!">3</a></li>
                    <li class="waves-effect"><a href="#!">4</a></li>
                    <li class="waves-effect"><a href="#!">5</a></li>
                    <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
                </ul>

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