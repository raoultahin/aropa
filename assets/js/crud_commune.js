/**
 * Created by Andriamalala Raoul on 10/08/2017.
 */
$(document).on('click', '.edit', function () {
    var id_commune = $(this).attr('data-id');
    var nom_commune = $(this).parent().prev().html();
    var code_commune = $(this).parent().prev().prev().html();
    $('#id_commune').val(id_commune);
    $('#nom_commune').val(nom_commune);
    $('#code_commune').val(code_commune);
    $('#modif_commune').modal('open');
});
$(document).on('click', '.delete', function () {
    var id_commune = $(this).attr('data-id');
    $('#id_commune_del').val(id_commune);
    $('#delete_commune').modal('open');
});