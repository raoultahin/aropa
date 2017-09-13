<main>
    <div class="container1">
        <div class="row z-depth-1">
            <div class="col s12">
                <h2 class="header" style="margin-bottom: 30px;">Ajout membre OPF</h2>
                <div class="row">
                    <div class="input-field col s3">
                        <input disabled id="code_op" value="<?php echo $ficheOp->CODE_OP?>" type="text" class="black-text" >
                        <label class="blue-text" for="code_op">Code OPF</label>
                    </div>
                    <div class="input-field col s3">
                        <input disabled id="nom_op" value="<?php echo $ficheOp->NOM_OP?>" type="text" class="black-text">
                        <label class="blue-text" for="nom_op">Nom OPF</label>
                    </div>
                </div>
                <form method="post" action="<?php echo base_url()?>c_parametre/insert_opf_membre">
                    <input type="hidden" name="id_op" value="<?php echo $ficheOp->ID_OP?>">
                    <div class="row">
                    <table class="ajout">
                        <thead >
                        <tr>
                            <th width="2%">#</th>
                            <th>Code : Nom OPR</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php for($i=0; $i<10; $i++) {?>
                        <tr>
                            <td><?php echo $i+1?></td>
                            <td class="input-field">
                                <input type="hidden" name="membres[]">
                                <input type="text" class="autocomplete" autocomplete="off">
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
    var li = $('a[href="http://localhost/aropa/c_parametre/liste_opf"]').parent();
    li.addClass("active");
    var parentLi = li.parents("li");
    parentLi.addClass("active");
    $(parentLi).children().first().addClass("active");

    $(document).ready(function(){
        $(function() {
            $.ajax({
                type: 'GET',
                url: 'http://localhost/aropa/c_rest/liste_opr',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                dataType : 'json',
                success: function(response) {
                    var oprListe = response;
                    var dataOpr = {};
                    for (var i = 0; i < oprListe.length; i++) {
                        dataOpr[oprListe[i].CODE_OPR+' : '+oprListe[i].NOM_OPR] = oprListe[i].ID_OPR;
                    }
                    $('input.autocomplete').autocomplete({
                        data: dataOpr,
                        onAutocomplete: function(val) {
                            $('input.autocomplete').change(function(){
                                $(this.previousElementSibling).attr('value',dataOpr[val]);
                            });
                        },
                        limit: 5
                    });
                }
            });
        });
    });
</script>