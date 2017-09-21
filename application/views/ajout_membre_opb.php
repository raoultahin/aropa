<main>
    <div class="container1">
        <div class="row z-depth-1">
            <div class="col s12">
                <h2 class="header" style="margin-bottom: 30px;">Ajout membre OPB</h2>
                <div class="row">
                    <div class="input-field col s3">
                        <input disabled id="code_op" value="<?php echo $ficheOp->CODE_OP?>" type="text" class="black-text" >
                        <label class="blue-text" for="code_op">Code OPB</label>
                    </div>
                    <div class="input-field col s3">
                        <input disabled id="nom_op" value="<?php echo $ficheOp->NOM_OP?>" type="text" class="black-text">
                        <label class="blue-text" for="nom_op">Nom OPB</label>
                    </div>
                </div>
                <form method="post" action="<?php echo base_url()?>c_parametre/insert_opb_membre">
                    <input type="hidden" name="id_op" value="<?php echo $ficheOp->ID_OP?>">
                    <div class="row">
                    <table class="ajout">
                        <thead >
                        <tr>
                            <th width="2%">#</th>
                            <th width="50%">Code : Nom EAF</th>
                            <th width="20%">Date Adhesion</th>
                            <th>Fonction dans l'OP</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php for($i=0; $i<10; $i++) {?>
                        <tr>
                            <td><?php echo $i+1?></td>
                            <td class="input-field">
                                <input type="hidden" name="membres[<?php echo $i?>][id]">
                                <input type="text" class="autocomplete" autocomplete="off" style="position: relative; bottom: 10px">
                            </td>
                            <td class="input-field">
                                <input type="date" class="datepicker" name="membres[<?php echo $i?>][date_adhesion]" >
                            </td>
                            <td class="input-field">
                                <select class="browser-default" name="membres[<?php echo $i?>][fonction]" style="position: relative; bottom: 10px">
                                    <option value="" disabled selected>Fonction</option>
                                    <?php foreach($fonctions as $fonction){?>
                                    <option value="<?php echo $fonction->ID_FONCTION ?>"><?php echo $fonction->NOM_FONCTION ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                    <button type="submit" class="waves-effect waves-light green btn" style="margin: 10px 0 0 10px">Ajouter</button>
                </div>
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
    var li = $('a[href="http://localhost/aropa/c_parametre/liste_opb"]').parent();
    li.addClass("active");
    var parentLi = li.parents("li");
    parentLi.addClass("active");
    $(parentLi).children().first().addClass("active");
    $('form')[0].reset();

    $(document).ready(function(){
        $(function() {
            $.ajax({
                type: 'GET',
                url: 'http://localhost/aropa/c_rest/liste_eaf/<?php echo $ficheOp->ID_OP ?>',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                dataType : 'json',
                success: function(response) {
                    var liste = response;
                    var data = {};
                    for (var i = 0; i < liste.length; i++) {
                        data[liste[i].CODE_MENAGE+' : '+liste[i].NOM_MENAGE+' ('+liste[i].SURNOM+')'] = liste[i].ID_MENAGE;
                    }
                    $('input.autocomplete').autocomplete({
                        data: data,
                        onAutocomplete: function(val) {
                            $('input.autocomplete').change(function(){
                                $(this.previousElementSibling).attr('value',data[val]);
                            });
                        },
                        limit: 5
                    });
                }
            });
        });
    });
</script>