/**
 * Created by Andriamalala Raoul on 10/08/2017.
 */
$(document).on('click', '.edit', function () {
        var id_district = $(this).attr('data-id');
        var nom_district = $(this).parent().prev().html();
        var code_district = $(this).parent().prev().prev().html();
        $('#id_district').val(id_district);
        $('#nom_district').val(nom_district);
        $('#code_district').val(code_district);
        $('#modif_district').modal('open');
    }
);
$(document).on('click', '.delete', function () {
        var id_district = $(this).attr('data-id');
        $('#id_district_del').val(id_district);
        $('#delete_district').modal('open');
    }
);