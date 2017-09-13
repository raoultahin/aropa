<?php

function getNbrOpbByIdMenage($idMenage){
    $CI = get_instance();
    $CI->load->model('M_op');
    $count = $CI->M_op->getNbrOpbByIdMenage($idMenage);
    if(count($count) > 1) return 1;
    else return 0;
}
