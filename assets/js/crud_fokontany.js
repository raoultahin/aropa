/**
 * Created by Andriamalala Raoul on 10/08/2017.
 */
$(document).on('click', '.edit', function () {
    var id_fokontany = $(this).attr('data-id');
    var nom_fokontany = $(this).parent().prev().prev().prev().html();
    var code_fokontany = $(this).parent().prev().prev().prev().prev().html();
    $('#id_fokontany').val(id_fokontany);
    $('#nom_fokontany').val(nom_fokontany);
    $('#code_fokontany').val(code_fokontany);
    $('#modif_fokontany').modal('open');
});
$(document).on('click', '.delete', function () {
    var id_fokontany = $(this).attr('data-id');
    $('#id_fokontany_del').val(id_fokontany);
    $('#delete_fokontany').modal('open');
});