/**
 * Created by Andriamalala Raoul on 10/08/2017.
 */
$(document).on('click', '.edit', function () {
        var id_region = $(this).attr('data-id');
        var nom_region = $(this).parent().prev().html();
        var code_region = $(this).parent().prev().prev().html();
        $('#id_region').val(id_region);
        $('#nom_region').val(nom_region);
        $('#code_region').val(code_region);
        $('#modif_region').modal('open');
    }
);
$(document).on('click', '.delete', function () {
        var id_region = $(this).attr('data-id');
        console.log(id_region);
        $('#id_region_del').val(id_region);
        $('#delete_region').modal('open');
    }
);