<main>
    <div class="container1">
        <div class="row z-depth-1">
            <div class="col s12">
                <h2 class="header" style="margin-bottom: 30px;">Nouvelle appui OPB (1/2) </h2>
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

                <h5 class="green-text">Liste OPB </h5>
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
                    <tr>
                        <td>Alvin</td>
                        <td>Eclairaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</td>
                        <td>Alvin</td>
                        <td>Eclair</td>
                        <td>Eclair</td>
                        <td>Eclair</td>
                        <td><a href="<?php echo base_url(); ?>c_appui/appui_opb/1" class="waves-effect green waves-light btn"><i class="material-icons">done</i></a></td>
                    </tr>
                    <tr>
                        <td>Alan</td>
                        <td>Alan</td>
                        <td>Alan</td>
                        <td>Alan</td>
                        <td>Alan</td>
                        <td>Jellybean</td>
                        <td><a class="waves-effect green waves-light btn"><i class="material-icons">done</i></a></td>
                    </tr>
                    <tr>
                        <td>Jonathan</td>
                        <td>Jonathan</td>
                        <td>Jonathan</td>
                        <td>Jonathan</td>
                        <td>Lollipop</td>
                        <td>Lollipop</td>
                        <td><a class="waves-effect green waves-light btn"><i class="material-icons">done</i></a></td>
                    </tr>
                    <tr>
                        <td>Shannon</td>
                        <td>Shannon</td>
                        <td>KitKat</td>
                        <td>KitKat</td>
                        <td>$9.99</td>
                        <td>$9.99</td>
                        <td><a class="waves-effect green waves-light btn"><i class="material-icons">done</i></a></td>
                    </tr>
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
