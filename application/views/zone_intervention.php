<main>
    <div class="container1">
        <div class="row z-depth-1">
            <div class="col s12">
                <h2 class="header">Zone d'intervention </h2>
                <div class="row">
                    <div class="col s6 m3">
                        <a href="<?php echo base_url(); ?>c_parametre/liste_region">
                            <div class="my-card card-panel red waves-effect waves-light  center-align">
                              <div class="white-text isa">5</div>
                              <span class="white-text soratra">Région</span>
                            </div>
                        </a>
                    </div>
                    <div class="col s6 m3">
                        <a href="<?php echo base_url(); ?>c_parametre/liste_district">
                            <div class="my-card card-panel orange waves-effect waves-light center-align">
                                <div class="white-text isa">15</div>
                                <span class="white-text soratra">District</span>
                            </div>
                        </a>
                    </div>
                    <div class="col s6 m3">
                        <a href="<?php echo base_url(); ?>c_parametre/liste_commune">
                            <div class="my-card card-panel green waves-effect waves-light center-align">
                                <div class="white-text isa">170</div>
                                <span class="white-text soratra">Commune</span>
                            </div>
                        </a>
                    </div>
                    <div class="col s6 m3">
                        <a href="<?php echo base_url(); ?>c_parametre/liste_fokontany">
                            <div class="my-card card-panel blue waves-effect waves-light center-align">
                                <div class="white-text isa">500</div>
                                <span class="white-text soratra">Fokontany</span>
                            </div>
                        </a>
                    </div>
                </div>
                <table class="responsive-table bordered striped">
                    <thead>
                    <tr>
                        <th>Région</th>
                        <th>District</th>
                        <th>Commune</th>
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

                <div class="fixed-action-btn horizontal">
                    <a class="btn-floating btn-large red">
                        <i class="large material-icons">add</i>
                    </a>
                    <ul>
                        <li><a class="btn-floating red" href="#add_fkt"><i class="material-icons">F</i></a></li>
                        <li><a class="btn-floating yellow darken-1" href="#add_commune"><i class="material-icons">C</i></a></li>
                        <li><a class="btn-floating green" href="#add_district"><i class="material-icons">D</i></a></li>
                        <li><a class="btn-floating blue" href="#add_region"><i class="material-icons">R</i></a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
    <!-- Modal add fokontany -->
    <div id="add_fkt" class="modal">
        <form method="post" action="<?php echo base_url(); ?>c_parametre/insert_fokontany">
            <div class="modal-content">
                <h5 class="green-text">Ajouter une fokontany</h5>
                <div class="divider"></div>
                <div class="col s12 container">
                    <table>
                        <tr>
                            <td width="30%">Région:</td>
                            <td>
                                <div class="input-field inline" style="margin: 0; width: 85%">
                                    <select class="browser-default" name="id_region">
                                        <option value="" disabled selected>Choisir une région</option>
                                        <?php foreach($regions as $region){ ?>
                                            <option value="<?php echo $region->ID_REGION ?>"><?php echo $region->NOM_REGION ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>District:</td>
                            <td>
                                <div class="input-field inline" style="margin: 0; width: 85%">
                                    <select class="browser-default" name="id_district">
                                        <option value="" disabled selected>Choisir une district</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Commune:</td>
                            <td>
                                <div class="input-field inline" style="margin: 0; width: 85%">
                                    <select class="browser-default" name="id_commune">
                                        <option value="" disabled selected>Choisir une commune</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Code du fokontany:</td>
                            <td>
                                <div class="input-field inline" style="width:85%;">
                                    <input type="text" name="code_fokontany">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Nom du fokontany:</td>
                            <td>
                                <div class="input-field inline" style="width:85%;">
                                    <input type="text" name="nom_fokontany">
                                </div>
                            </td>
                        </tr>
                    </table>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="modal-action modal-close red waves-effect waves-light btn">Fermer</button>
                <button type="submit" class="waves-effect green waves-light btn">Ajouter</button>
            </div>
        </form>
    </div>

    <!-- Modal add commune -->
    <div id="add_commune" class="modal">
        <form method="post" action="<?php echo base_url(); ?>c_parametre/insert_commune">
            <div class="modal-content">
                <h5 class="green-text">Ajouter une commune</h5>
                <div class="divider"></div>
                <div class="col s12 container">
                    <table>
                        <tr>
                            <td width="30%">Région:</td>
                            <td>
                                <div class="input-field inline" style="margin: 0; width: 85%">
                                    <select class="browser-default" name="id_region">
                                        <option value="" disabled selected>Choisir une région</option>
                                        <?php foreach($regions as $region){ ?>
                                            <option value="<?php echo $region->ID_REGION ?>"><?php echo $region->NOM_REGION ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>District:</td>
                            <td>
                                <div class="input-field inline" style="margin: 0; width: 85%">
                                    <select class="browser-default" name="id_district">
                                        <option value="" disabled selected>Choisir une district</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Code du commune:</td>
                            <td>
                                <div class="input-field inline" style="width:85%;">
                                    <input type="text" name="code_commune">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Nom du commune:</td>
                            <td>
                                <div class="input-field inline" style="width:85%;">
                                    <input type="text" name="nom_commune">
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="modal-action modal-close red waves-effect waves-light btn">Fermer</button>
                <button type="submit" class="waves-effect green waves-light btn">Ajouter</button>
            </div>
        </form>
    </div>

    <!-- Modal add district -->
    <div id="add_district" class="modal">
        <form method="post" action="<?php echo base_url(); ?>c_parametre/insert_district">
            <div class="modal-content">
                <h5 class="green-text">Ajouter une district</h5>
                <div class="divider"></div>
                <div class="col s12 container">
                    <table>
                        <tr>
                            <td width="30%">Région:</td>
                            <td>
                                <div class="input-field inline" style="margin: 0; width: 85%">
                                    <select class="browser-default" name="id_region">
                                        <option value="" disabled selected>Choisir une région</option>
                                        <?php foreach($regions as $region){ ?>
                                            <option value="<?php echo $region->ID_REGION ?>"><?php echo $region->NOM_REGION ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Code du district:</td>
                            <td>
                                <div class="input-field inline" style="width:85%;">
                                    <input type="text" name="Code_district">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Nom du district:</td>
                            <td>
                                <div class="input-field inline" style="width:85%;">
                                    <input type="text" name="nom_district">
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="modal-action modal-close red waves-effect waves-light btn">Fermer</button>
                <button type="submit" class="waves-effect green waves-light btn">Ajouter</button>
            </div>
        </form>
    </div>

    <!-- Modal add region -->
    <div id="add_region" class="modal">
        <form method="post" action="<?php echo base_url(); ?>c_parametre/insert_region">
            <div class="modal-content">
                <h5 class="green-text">Ajouter une région</h5>
                <div class="divider"></div>
                <div class="col s12 container">
                    Code du région:
                    <div class="input-field inline" style="width:70%;">
                        <input type="text" name="code_region">
                    </div><br>
                    Nom du région:
                    <div class="input-field inline" style="width:70%;">
                        <input type="text" name="nom_region">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="modal-action modal-close red waves-effect waves-light btn">Fermer</button>
                <button type="submit" class="waves-effect green waves-light btn">Ajouter</button>
            </div>
        </form>
    </div>
</main>
<script type="text/javascript">
    var page = "zi";
</script>