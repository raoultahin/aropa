/**
 * Created by Andriamalala Raoul on 10/08/2017.
 */
$(document).ready(function(){
    $('.button-collapse').sideNav({
            onOpen: function(){
                $('#sidenav-overlay').remove();
                $('body').removeAttr('style');
                $('header,main,footer').animate({ "padding-left": "235px" }, 300 );
                $('#slide-out').addClass('fixed')
                $('.drag-target').remove();
            },
            onClose: function(){
                $('header,main,footer').animate({ "padding-left": "0" }, 150 );
            }
        }
    );
    Materialize.updateTextFields();

    $('.modal').modal();
    $('select').material_select();

    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 10, // Creates a dropdown of 15 years to control year
        format: 'yyyy-mm-dd'
    });
});

$(document).on('change','select[name="id_region"]', function () {
    var id_region = $(this).val();
    $('select[name="id_district"]').html('<option value="" disabled selected>Choisir une district</option>');
    $('select[name="id_commune"]').html('<option value="" disabled selected>Choisir une commune</option>');
    $('select[name="id_fokontany"]').html('<option value="" disabled selected>Choisir une Fokontany</option>');
    $.ajax({
        url : 'http://localhost/aropa/c_parametre/liste_district_by_region/'+id_region,
        type : 'GET',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        dataType : 'json',
        success : function(reponse){
            reponse.forEach(function (obj) {
                $('select[name="id_district"]').append($('<option>', {
                    value: obj.ID_DISTRICT,
                    text: obj.NOM_DISTRICT
                }));
            })
        }
    });
});
$(document).on('change','select[name="id_district"]', function () {
    var id_district = $(this).val();
    $('select[name="id_commune"]').html('<option value="" disabled selected>Choisir une commune</option>');
    $('select[name="id_fokontany"]').html('<option value="" disabled selected>Choisir une Fokontany</option>');
    $.ajax({
        url : 'http://localhost/aropa/c_parametre/liste_commune_by_district/'+id_district,
        type : 'GET',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        dataType : 'json',
        success : function(reponse){
            reponse.forEach(function (obj) {
                $('select[name="id_commune"]').append($('<option>', {
                    value: obj.ID_COMMUNE,
                    text: obj.NOM_COMMUNE
                }));
            })
        }
    });
});
$(document).on('change','select[name="id_commune"]', function () {
    var id_commune = $(this).val();
    $('select[name="id_fokontany"]').html('<option value="" disabled selected>Choisir une Fokontany</option>');
    $.ajax({
        url : 'http://localhost/aropa/c_parametre/liste_fokontany_by_commune/'+id_commune,
        type : 'GET',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        dataType : 'json',
        success : function(reponse){
            reponse.forEach(function (obj) {
                $('select[name="id_fokontany"]').append($('<option>', {
                    value: obj.ID_FOKONTANY,
                    text: obj.NOM_FOKONTANY
                }));
            })
        }
    });
});