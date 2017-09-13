<?php

function getNbrOpbByIdMenage($idMenage){
    $CI = get_instance();
    $CI->load->model('M_op');
    $count = $CI->M_op->getNbrOpbByIdMenage($idMenage);
    if(count($count) > 1) return 1;
    else return 0;
}

function getNbrEafByIdOp($op,$idOpb){
    $CI = get_instance();
    $CI->load->model('M_op');
    $array = $CI->M_op->getNbrEafByIdOpb($idOpb);
    $n['nb'] = count($array);
    $n['H'] = 0;
    $n['F'] = 0;
    foreach($array as $row) {
        if($row->SEXE=='H') $n['H']++;
        else $n['F']++;
    }
    return $n;
}