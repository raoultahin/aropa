<?php

function getNbrOpbByIdMenage($idMenage){
    $CI = get_instance();
    $CI->load->model('M_op');
    $count = $CI->M_op->getNbrOpbByIdMenage($idMenage);
    if(count($count) > 1) return 1;
    else return 0;
}

function getNbrEafByIdOpr($idOpr){
    $CI = get_instance();
    $CI->load->model('M_op');
    $n['nb'] = 0;
    $n['H'] = 0;
    $n['F'] = 0;
    $array = $CI->M_op->getOprMembreByIdOpr($idOpr);
    foreach($array as $row){
        $nbTemp = getNbrEafUnionOpb($row->CODE_OP,$row->ID_OP);
        $n['nb'] += $nbTemp['nb'];
        $n['H'] += $nbTemp['H'];
        $n['F'] += $nbTemp['F'];
    }
    return $n;

}

function getNbrEafUnionOpb($code,$id){
    $CI = get_instance();
    $CI->load->model('M_op');
    if($code[0]=='O'){
        return getNbrEafByIdOpb($id);
    }
    else{
        return getNbrEafByIdUnion($id);
    }
}

function getNbrEafByIdUnion($idUnion){
    $CI = get_instance();
    $CI->load->model('M_op');
    $array = $CI->M_op->getUnionOpbByIdUnion($idUnion);
    $n['nb'] = 0;
    $n['H'] = 0;
    $n['F'] = 0;
    foreach($array as $row) {
        $nbTemp = getNbrEafByIdOpb($row->ID_OPB);
        $n['nb'] += $nbTemp['nb'];
        $n['H'] += $nbTemp['H'];
        $n['F'] += $nbTemp['F'];
    }
    return $n;
}

function getNbrEafByIdOpb($idOpb){
    $CI = get_instance();
    $CI->load->model('M_op');
    $array = $CI->M_op->getOpbEafByIdOpb($idOpb);
    $n['nb'] = count($array);
    $n['H'] = 0;
    $n['F'] = 0;
    foreach($array as $row) {
        if($row->SEXE=='H') $n['H']++;
        else $n['F']++;
    }
    return $n;
}

function getOpParent($idAppui){
    $CI = get_instance();
    $CI->load->model('M_appui');
    $CI->load->model('M_op');
    $appui = $CI->M_appui->getAppuiOpById($idAppui);
    $op = null;
    if($appui->TYPE_OP==1) {
        $op = $CI->M_op->getOpById('opf', $appui->ID_OP, 'ID_OPF ID_OP, CODE_OPF CODE_OP, NOM_OPF NOM_OP');
    }
    if($appui->TYPE_OP==2) {
        $op = $CI->M_op->getOpById('opr', $appui->ID_OP, 'ID_OPR ID_OP, CODE_OPR CODE_OP, NOM_OPR NOM_OP');
    }
    if($appui->TYPE_OP==3) {
        $op = $CI->M_op->getOpById('union', $appui->ID_OP, 'ID_UNION ID_OP, CODE_UNION CODE_OP, NOM_UNION NOM_OP');
    }
    if($appui->TYPE_OP==4) {
        $op = $CI->M_op->getOpById('opb', $appui->ID_OP, 'ID_OPB ID_OP, CODE_OPB CODE_OP, NOM_OPB NOM_OP');
    }
    $data['appui'] = $appui;
    $data['op'] = $op;
    return $data;
}

function getOpById($typeOp,$id){
    $CI = get_instance();
    $CI->load->model('M_op');
    $opResult = null;
    if($typeOp=='1') {
        $opResult = $CI->M_op->getOpById('opf', $id, 'ID_OPF ID_OP, CODE_OPF CODE_OP, NOM_OPF NOM_OP');
    }
    if($typeOp=='2') {
        $opResult = $CI->M_op->getOpById('opr', $id, 'ID_OPR ID_OP, CODE_OPR CODE_OP, NOM_OPR NOM_OP');
    }
    if($typeOp=='3') {
        $opResult = $CI->M_op->getOpById('union', $id, 'ID_UNION ID_OP, CODE_UNION CODE_OP, NOM_UNION NOM_OP, tab_union.TYPE');
    }
    if($typeOp=='4') {
        $opResult = $CI->M_op->getOpById('opb', $id, 'ID_OPB ID_OP, CODE_OPB CODE_OP, NOM_OPB NOM_OP, opb.TYPE');
    }
    return $opResult;
}

function getNbEafAppuieByIdAppui($idAppui){
    $CI = get_instance();
    $CI->load->model('M_appui');
    $appui = $CI->M_appui->getAppuiOpById($idAppui);
    if($appui->TYPE_OP == '2'){
        $appuiListe = $CI->M_appui->getBeneficiaireById($appui->ID_APPUI_OP);
        $n['nb'] = 0;
        $n['H'] = 0;
        $n['F'] = 0;
        foreach($appuiListe as $a){
            $nbTemp = getNbEafAppuieUnionOpb($CI,$a);
            $n['nb'] += $nbTemp['nb'];
            $n['H'] += $nbTemp['H'];
            $n['F'] += $nbTemp['F'];
        }
        return $n;
    }
    else {
        return getNbEafAppuieUnionOpb($CI,$appui);
    }
}


function getNbEafAppuieUnionOpb($ci,$appui){
    if($appui->TYPE_OP == '3'){
        $appuiListe = $ci->M_appui->getBeneficiaireById($appui->ID_APPUI_OP);
        $n['nb'] = 0;
        $n['H'] = 0;
        $n['F'] = 0;
        foreach($appuiListe as $a){
            $nbTemp = getNbEafAppuieByIdAppuiOpb($ci,$a->ID_APPUI_OP);
            $n['nb'] += $nbTemp['nb'];
            $n['H'] += $nbTemp['H'];
            $n['F'] += $nbTemp['F'];
        }
        return $n;
    }
    if($appui->TYPE_OP == '4'){
        return getNbEafAppuieByIdAppuiOpb($ci,$appui->ID_APPUI_OP);
    }
}

function getNbEafAppuieByIdAppuiOpb($ci,$idAppui){
    $array = $ci->M_appui->getNbEafAppuieByIdAppuiOpb($idAppui);
    $n['nb'] = count($array);
    $n['H'] = 0;
    $n['F'] = 0;
    foreach($array as $row) {
        if($row->SEXE=='H') $n['H']++;
        else $n['F']++;
    }
    return $n;
}

function getEtatAppui($idAppui){
    $CI = get_instance();
    $CI->load->model('M_appui');
    $appui = $CI->M_appui->getAppuiOpById($idAppui);

    if($appui->TYPE_OP!=4) {
        $qte = 0.;
        $beneficiaires = $CI->M_appui->getBeneficiaireById($appui->ID_APPUI_OP);
        if(count($beneficiaires)==0){
            $etat['etat'] = false;
            $etat['msg'] = 'Pas de bénéficiaire';
            return $etat;
        }
        foreach($beneficiaires as $beneficiaire){
            $qte += $beneficiaire->QTE;
        }
        if($appui->QTE==$qte){
            $etat['etat'] = true;
            return $etat;
        }
        else {
            $etat['etat'] = false;
            $etat['msg'] = 'Erreur de répartition de qte';
            return $etat;
        }
    }
    else{
        $qte = 0;
        $beneficiaires = $CI->M_appui->getEafBeneficiaireById($appui->ID_APPUI_OP);
        if(count($beneficiaires)==0){
            $etat['etat'] = false;
            $etat['msg'] = 'Pas de bénéficiaire';
            return $etat;
        }
        foreach($beneficiaires as $beneficiaire){
            $qte += $beneficiaire->QTE;
        }
        if($appui->QTE==$qte){
            $etat['etat'] = true;
            return $etat;
        }
        else {
            $etat['etat'] = false;
            $etat['msg'] = 'Erreur de répartition de qte';
            return $etat;
        }
    }
}