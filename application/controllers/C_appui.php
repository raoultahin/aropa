<?php
	class C_appui extends CI_Controller {

        public function liste_appui(){
            $this->load->model('M_appui');

            $data['titre'] = 'Gestion des appuis';
            $data['contents'] = 'liste_appui';
            $data['appuiListe'] = $this->M_appui->getAppuiListe();
            $data['appuiListe'][0]->MONTANT = number_format($data['appuiListe'][0]->MONTANT, 2, '.', ',');
            $this->load->view('templates',$data);
        }

        public function appui_op($op='',$id=''){
            $this->load->model('M_zone_intervention');
            $this->load->model('M_op');
            $data['titre'] = 'Gestion des appuis';
            $column='ID_'.$op.' ID_OP, CODE_'.$op.' CODE_OP, NOM_'.$op.' NOM_OP, NOM_REGION, NOM_DISTRICT, NOM_COMMUNE, NOM_FOKONTANY';
            if($op!='') {
                if ($id == '') {
                    $data['op'] = strtolower($op);
                    $data['regions'] = $this->M_zone_intervention->getRegion();
                    $data['opListe'] = $this->M_op->getOp($op,$column);
                    $data['contents'] = 'new_appui';

                    $this->load->view('templates', $data);
                } else {
                    $this->load->model('M_appui');
                    $this->load->model('M_filiere');

                    $data['id'] = $id;
                    $data['op'] = strtoupper($op);
                    $data['regions'] = $this->M_zone_intervention->getRegion();
                    $data['opLigne'] = $this->M_op->getOpById($op,$id,$column);
                    $data['filieres'] = $this->M_filiere->getFilieres();
                    $data['types'] = $this->M_appui->getTypeAppui();
                    $data['contents'] = 'form_appui_op';
                    if ($op == 'opb') {
                        $data['mecanismes'] = $this->M_appui->getMecanisme();
                        $data['catOp'] = $this->M_appui->getCatOp();
                    }
                    if ($op == 'opf') $data['typeOp'] = 1;
                    if ($op == 'opr') $data['typeOp'] = 2;
                    if ($op == 'union') $data['typeOp'] = 3;
                    if ($op == 'opb') $data['typeOp'] = 4;

                    $this->load->view('templates', $data);
                }
            }
        }

        public function ajout_appui(){
            $idParent = $this->input->post('id_parent');

            //mecanisme
            $idMecanisme = $this->input->post('id_mecanisme');
            $autreMec = $this->input->post('autre_mec');

            //details_appui
            $idFiliere = $this->input->post('id_filiere');
            $dateFinancement = $this->input->post('date_financement');
            $montant = $this->input->post('montant');

            //type_appui
            $idType = $this->input->post('id_type_appui');

            //cat_op
            $idCatOp = $this->input->post('id_cat_op');
            $autreCat = $this->input->post('autre_cat');

            //formation
            $themeFormation = $this->input->post('theme_formation');
            $debutFormation = $this->input->post('formation_debut');
            $finFormation = $this->input->post('formation_fin');
            $lieuFormation = $this->input->post('id_fokontany');

            //appui_op
            $typeOp = $this->input->post('type_op');
            $idOp = $this->input->post('id_op');
            $description = $this->input->post('description');
            $objetNature = $this->input->post('objet_nature');
            $qte = $this->input->post('qte');
            $unite = $this->input->post('unite');
            $dateCollecte = $this->input->post('date_collecte');

            $this->load->model('M_appui');

            if($idFiliere!=''&& $dateFinancement!='' && $montant!=''){
                $error = $this->M_appui->ajoutAppui($idFiliere,$dateFinancement,$montant,$lieuFormation,$themeFormation,$debutFormation,$finFormation,$idMecanisme,$autreMec,$idCatOp,$autreCat,$idParent,$idType,$typeOp,$idOp,$description,$objetNature,$qte,$unite,$dateCollecte);
                echo $error;
            }
        }

        public function fiche_appui($id=''){
            $this->load->model('M_appui');
            $this->load->model('M_zone_intervention');

            $data['titre'] = 'Gestion des appuis';
            $data['contents'] = 'fiche_appui';
            $data['appui_op'] = $this->M_appui->getAppuiOpById($id);
            $data['op'] = $this->M_appui->getOpByAppui($data['appui_op']);
            $data['mecanisme'] = $this->M_appui->getMecanismeById($data['appui_op']->ID_MECANISME);
            $data['detail_appui'] = $this->M_appui->getDetailAppuiById($data['appui_op']->ID_DETAIL);
            $data['type_appui'] = $this->M_appui->getTypeAppuiById($data['appui_op']->ID_TYPE);
            $data['cat_op'] = $this->M_appui->getCatOpById($data['appui_op']->ID_CAT_OP);
            $data['formation'] = $this->M_appui->getFormationById($data['appui_op']->ID_FORMATION);
            $data['zone_intervention'] = $this->M_zone_intervention->getZoneInterventionByIdFkt($data['formation']->ID_FOKONTANY);

//            var_dump($data['appui_op']);
            $this->load->view('templates',$data);
        }
	}