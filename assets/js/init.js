/**
 * Created by Andriamalala Raoul on 10/08/2017.
 */
$(".button-collapse").sideNav();
var zone_i = [
    "http://localhost/aropa/c_parametre/zone_intervention",
    "http://localhost/aropa/c_parametre/liste_region",
    "http://localhost/aropa/c_parametre/liste_district",
    "http://localhost/aropa/c_parametre/liste_commune",
    "http://localhost/aropa/c_parametre/liste_fokontany",
];
var param_opf = [
    "http://localhost/aropa/c_parametre/liste_opf",
    "http://localhost/aropa/c_parametre/ajout_opf"
];
var param_opr = [
    "http://localhost/aropa/c_parametre/liste_opr",
    "http://localhost/aropa/c_parametre/ajout_opr"
];
var param_union = [
    "http://localhost/aropa/c_parametre/liste_union",
    "http://localhost/aropa/c_parametre/ajout_union"
];
var param_opb = [
    "http://localhost/aropa/c_parametre/liste_opb",
    "http://localhost/aropa/c_parametre/ajout_opb"
];
var param_menage = [
    "http://localhost/aropa/c_parametre/liste_menage",
    "http://localhost/aropa/c_parametre/ajout_menage"
];

$(document).ready(function(){
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
    $('select[name="id_fokontany"]').html('<option value="" disabled selected>Choisir une fokontany</option>');
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
if(jQuery.inArray(window.location.href,zone_i)!=-1) {
    var li = $('a[href="http://localhost/aropa/c_parametre/zone_intervention"]').parent();
    li.addClass("active");
    var parentLi = li.parents("li");
    parentLi.addClass("active");
    $(parentLi).children().first().addClass("active");
}
if(jQuery.inArray(window.location.href,param_opf)!=-1) {
    var li = $('a[href="http://localhost/aropa/c_parametre/liste_opf"]').parent();
    li.addClass("active");
    console.log(window.location.href);
    var parentLi = li.parents("li");
    parentLi.addClass("active");
    $(parentLi).children().first().addClass("active");
}
if(jQuery.inArray(window.location.href,param_opr)!=-1) {
    var li = $('a[href="http://localhost/aropa/c_parametre/liste_opr"]').parent();
    li.addClass("active");
    console.log(window.location.href);
    var parentLi = li.parents("li");
    parentLi.addClass("active");
    $(parentLi).children().first().addClass("active");
}
if(jQuery.inArray(window.location.href,param_union)!=-1) {
    var li = $('a[href="http://localhost/aropa/c_parametre/liste_union"]').parent();
    li.addClass("active");
    console.log(window.location.href);
    var parentLi = li.parents("li");
    parentLi.addClass("active");
    $(parentLi).children().first().addClass("active");
}
if(jQuery.inArray(window.location.href,param_opb)!=-1) {
    var li = $('a[href="http://localhost/aropa/c_parametre/liste_opb"]').parent();
    li.addClass("active");
    console.log(window.location.href);
    var parentLi = li.parents("li");
    parentLi.addClass("active");
    $(parentLi).children().first().addClass("active");
}
if(jQuery.inArray(window.location.href,param_menage)!=-1) {
    var li = $('a[href="http://localhost/aropa/c_parametre/liste_menage"]').parent();
    li.addClass("active");
    console.log(window.location.href);
    var parentLi = li.parents("li");
    parentLi.addClass("active");
    $(parentLi).children().first().addClass("active");
}