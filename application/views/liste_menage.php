<main>
    <div class="container1">
        <div class="row z-depth-1" style="margin-bottom: 80px">
            <div id="liste" class="col s12">
                <h2 class="header" style="margin-top: 20px">Liste des EAF <a href="#importer" class="modal-trigger waves-effect waves-light btn blue">Importer</a> </h2>
                <div class="row input-field">
                    <label for="recherche" class="grey-text">Recherche</label>
                    <input id="recherche" type="text" class="search col s3" style="margin: 0">
                    <a href="<?php echo base_url()?>c_parametre/rechercher/eaf" style="font-size: 13px;"> <i class="material-icons left" style="margin-right: 3px;font-size: 20px">search</i> Recherche avancée</a>
                </div>
                <table id="liste" class="bordered striped">
                    <thead>
                    <tr>
                        <th>Code</th>
                        <th width="25%">Nom</th>
                        <th>Surnom</th>
                        <th>Sexe</th>
                        <th>Imf</th>
                        <th>Filières</th>
                        <th>Fokontany</th>
                        <th>Commune</th>
                        <th>District</th>
                        <th>Region</th>
                        <th>Option</th>
                    </tr>
                    </thead>
                    <tbody class="list">
                    <?php foreach($menages as $menage) { ?>
                    <tr>
                        <td class="code"><?php echo $menage->CODE_MENAGE ?></td>
                        <td class="nom"><?php echo $menage->NOM_MENAGE ?></td>
                        <td class="surnom"><?php echo $menage->SURNOM ?></td>
                        <td><?php echo $menage->SEXE ?></td>
                        <td><?php echo ($menage->IMF=0)?"OUI":"NON" ?></td>
                        <td class="filiere"><?php echo $menage->FILIERES ?></td>
                        <td class="fokontany"><?php echo $menage->NOM_FOKONTANY ?></td>
                        <td class="commune"><?php echo $menage->NOM_COMMUNE ?></td>
                        <td class="district"><?php echo $menage->NOM_DISTRICT ?></td>
                        <td class="region"><?php echo $menage->NOM_REGION ?></td>
                        <td>
                            <a href="#!" class="waves-effect waves-light green btn edit" data-id="<?php echo $menage->ID_MENAGE ?>"><i class="material-icons">edit</i></a>
                            <a href="#delete_menage" class="modal-trigger waves-effect waves-light red btn delete" data-id="<?php echo $menage->ID_MENAGE ?>"><i class="material-icons">delete</i></a>
                        </td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>

                <div id="pagination">
                    <p class="left"><b>Total: <?php echo $menageTotal ?></b></p>
                </div>

                <div class="fixed-action-btn">
                    <a href="<?php echo base_url(); ?>c_parametre/ajout_menage" class="btn-floating btn-large red">
                        <i class="large material-icons">add</i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal import menage -->
    <div id="importer" class="modal" style="width: 50%">
        <form method="post" action="<?php echo base_url(); ?>c_parametre/importer_menage" enctype="multipart/form-data">
            <div class="modal-content center-align">
                <h5 class="green-text"> Importer Ménage (CSV)</h5>
                <div class="divider"></div>
                <div class="file-field input-field">
                    <div class="btn blue">
                        <span>File</span>
                        <input type="file" name="csv">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="width: 100% !important;">
                <button type="button" class="modal-action modal-close red waves-effect waves-light btn">Fermer</button>
                <button type="submit" class="waves-effect green waves-light btn">Importer</button>
            </div>
        </form>
    </div>
    <!-- Modal delete menage -->
    <div id="delete_menage" class="modal" style="width: 25%">
        <form method="post" action="<?php echo base_url(); ?>c_parametre/delete_menage" >
            <div class="modal-content center-align">
                <h5 class="red-text"> Supprimer Ménage ?</h5>
                <div class="divider"></div>
                <input id="id_menage" type="hidden" name="id_menage">
            </div>
            <div class="modal-footer center-align" style="width: 100%!important;">
                <button type="submit" class="waves-effect green waves-light btn" style="float: none">Supprimer</button>
                <button type="button" class="modal-action modal-close red waves-effect waves-light btn" style="float: none">Fermer</button>
            </div>
        </form>
    </div>

</main>
<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/materialize.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/init.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/list.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/materialize-pagination.js"></script>

<script type="text/javascript">
    var li = $('a[href="http://localhost/aropa/c_parametre/liste_menage"]').parent();
    li.addClass("active");
    var parentLi = li.parents("li");
    parentLi.addClass("active");
    $(parentLi).children().first().addClass("active");
    $(document).ready(function(){
        var options = {
            valueNames: [ 'code', 'nom', 'filiere', 'fokontany', 'commune', 'district', 'region', 'surnom' ]
        };
        var opbListe = new List('liste', options);

        $('#pagination').materializePagination({
            align: 'right',
            lastPage:  <?php if($menageTotal%20==0) echo $menageTotal/20; else echo $menageTotal/20+1 ?>,
            firstPage:  1,
            urlParameter: 'page',
            useUrlParameter: true,
            onClickCallback: function(requestedPage){
                window.location.replace('<?php echo base_url() ?>c_parametre/liste_menage?page='+requestedPage);
            }
        });

        $('.pagination').removeClass('right-align');
        $('.pagination').addClass('right');
    });

    $(document).on('click', '.delete', function () {
        var id_menage = $(this).attr('data-id');
        $('#id_menage').val(id_menage);
    });
</script>