/**
 * Created by Andriamalala Raoul on 10/08/2017.
 */
$(document).on('change','select[name="id_mecanisme"]', function () {
    var idMecanisme = $(this).val();
    if(idMecanisme=='')
        $('input[name="autre_mec"]').removeAttr('disabled');
    else
        $('input[name="autre_mec"]').attr('disabled','');
});

$(document).on('change','select[name="id_cat_op"]', function () {
    var idCatOp = $(this).val();
    if(idCatOp=='')
        $('input[name="autre_cat"]').removeAttr('disabled');
    else
        $('input[name="autre_cat"]').attr('disabled','');
});

$(document).on('change','select[name="id_type_appui"]', function () {
    var idMecanisme = $(this).val();
    if(idMecanisme==5 || idMecanisme==7)
        $('#detail_formation').removeAttr('hidden');
    else
        $('#detail_formation').attr('hidden','');

});