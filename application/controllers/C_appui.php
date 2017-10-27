<?php
	class C_appui extends CI_Controller {

        public function liste_appui(){
            if (isset($this->session->user)) {
                $this->load->model('M_appui');

                $page = intval($this->input->get('page'));
                if (empty($page)) $page = 1;

                $data['titre'] = 'Gestion des appuis';
                $data['contents'] = 'liste_appui';
                $data['appuiListe'] = $this->M_appui->getAppuiListe($page);
                $data['appuiTotal'] = count($this->M_appui->getAppuiListe());
                $this->load->view('templates', $data);
            }
            else redirect('c_login');
        }

        public function liste_appui_eaf(){
            if (isset($this->session->user)) {
                $this->load->model('M_appui');

                $data['titre'] = 'Gestion des appuis';
                $data['contents'] = 'liste_appui_eaf';
                $data['appuiEafListe'] = $this->M_appui->getAppuiEafListe();
                $this->load->view('templates', $data);
            }
            else redirect('c_login');

        }

        public function appui_op($op='',$id=''){
            if (isset($this->session->user)) {
                $this->load->model('M_zone_intervention');
                $this->load->model('M_op');
                $data['titre'] = 'Gestion des appuis';
                $column = 'ID_' . $op . ' ID_OP, CODE_' . $op . ' CODE_OP, NOM_' . $op . ' NOM_OP, NOM_REGION, NOM_DISTRICT, NOM_COMMUNE, NOM_FOKONTANY';
                if ($op != '') {
                    if ($id == '') {
                        $data['op'] = strtolower($op);
                        $data['regions'] = $this->M_zone_intervention->getRegion();
                        $data['opListe'] = $this->M_op->getOp($op, $column);
                        $data['contents'] = 'new_appui';

                        $this->load->view('templates', $data);
                    } else {
                        $this->load->model('M_appui');
                        $this->load->model('M_filiere');

                        $data['id'] = $id;
                        $data['op'] = strtoupper($op);
                        $data['regions'] = $this->M_zone_intervention->getRegion();
                        $data['opLigne'] = $this->M_op->getOpById($op, $id, $column);
                        $data['types'] = $this->M_appui->getTypeAppui();
                        $data['contents'] = 'form_appui_op';
                        if ($op == 'opb') {
                            $data['mecanismes'] = $this->M_appui->getMecanisme();
                            $data['catOp'] = $this->M_appui->getCatOp();
                        }
                        if ($op == 'opf') {
                            $data['typeOp'] = 1;
                            $data['filieres'] = $this->M_filiere->getObfFiliere($id);
                        }
                        if ($op == 'opr') {
                            $data['typeOp'] = 2;
                            $data['filieres'] = $this->M_filiere->getOprFiliere($id);
                        }
                        if ($op == 'union') {
                            $data['typeOp'] = 3;
                            $data['filieres'] = $this->M_filiere->getUnionFiliere($id);
                        }
                        if ($op == 'opb') {
                            $data['typeOp'] = 4;
                            $data['filieres'] = $this->M_filiere->getOpbFiliere($id);
                        }

                        $this->load->view('templates', $data);
                    }
                }
            }
            else redirect('c_login');

        }

        public function appui_eaf($id=''){
            if (isset($this->session->user)) {
                $this->load->model('M_zone_intervention');
                $this->load->model('M_op');
                $data['titre'] = 'Gestion des appuis';
                $data['regions'] = $this->M_zone_intervention->getRegion();
                if ($id == '') {
                    $data['eafListe'] = $this->M_op->getMenages();
                    $data['contents'] = 'new_appui_eaf';

                    $this->load->view('templates', $data);
                } else {
                    $data['contents'] = 'form_appui_eaf';
                    $data['id'] = $id;
                    $data['eaf'] = $this->M_op->getMenageById($id);
                    $this->load->view('templates', $data);
                }
            }
            else redirect('c_login');
        }

        public function ajout_appui(){
            if (isset($this->session->user)) {
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

                $this->M_appui->ajoutAppui($idFiliere, $dateFinancement, $montant, $lieuFormation, $themeFormation, $debutFormation, $finFormation, $idMecanisme, $autreMec, $idCatOp, $autreCat, $idParent, $idType, $typeOp, $idOp, $description, $objetNature, $qte, $unite, $dateCollecte);
                redirect('c_appui/liste_appui');
            }
            else redirect('c_login');
        }

        public function ajout_appui_eaf(){
            if (isset($this->session->user)) {
                $idParent = $this->input->post('id_parent');

                //formation
                $themeFormation = $this->input->post('theme_formation');
                $debutFormation = $this->input->post('formation_debut');
                $finFormation = $this->input->post('formation_fin');
                $lieuFormation = $this->input->post('id_fokontany');

                //appui_op
                $idEaf = $this->input->post('id_eaf');
                $objetNature = $this->input->post('objet_nature');
                $qte = $this->input->post('qte');
                $unite = $this->input->post('unite');
                $dateCollecte = $this->input->post('date_collecte');

                $this->load->model('M_appui');

                $this->M_appui->ajoutAppuiEaf($lieuFormation, $themeFormation, $debutFormation, $finFormation, $idParent, $idEaf, $objetNature, $qte, $unite, $dateCollecte);
                redirect('c_appui/liste_appui');
            }
            else redirect('c_login');
        }

        public function fiche_appui($id=''){
            if (isset($this->session->user)) {
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
                if (isset($data['formation']->ID_FOKONTANY)) {
                    $data['zone_intervention'] = $this->M_zone_intervention->getZoneInterventionByIdFkt($data['formation']->ID_FOKONTANY);
                }
                if ($data['appui_op']->TYPE_OP != '4') {
                    $data['beneficiaires'] = $this->M_appui->getBeneficiaireById($data['appui_op']->ID_APPUI_OP);
                } else {
                    $data['beneficiaires'] = $this->M_appui->getEafBeneficiaireById($data['appui_op']->ID_APPUI_OP);
                }
                $this->load->view('templates', $data);
            }
            else redirect('c_login');
        }

        public function fiche_appui_eaf($id=''){
            if (isset($this->session->user)) {
                $this->load->model('M_op');
                $this->load->model('M_appui');
                $this->load->model('M_zone_intervention');

                $data['titre'] = 'Gestion des appuis';
                $data['contents'] = 'fiche_appui_eaf';
                $data['appui_eaf'] = $this->M_appui->getAppuiEafById($id);
                $data['eaf'] = $this->M_op->getMenageById($data['appui_eaf']->ID_MENAGE);
                $data['formation'] = $this->M_appui->getFormationById($data['appui_eaf']->ID_FORMATION);
                if (isset($data['formation']->ID_FOKONTANY)) {
                    $data['zone_intervention'] = $this->M_zone_intervention->getZoneInterventionByIdFkt($data['formation']->ID_FOKONTANY);
                }
                $this->load->view('templates', $data);
            }
            else redirect('c_login');
        }

        public function ajout_beneficiaire($id){
            if (isset($this->session->user)) {
                $this->load->model('M_zone_intervention');
                $this->load->model('M_op');
                $this->load->model('M_appui');
                $data['titre'] = 'Gestion des appuis';

                $temp['appui'] = $this->M_appui->getAppuiOpById($id);
                $data['idAppui'] = $temp['appui']->ID_APPUI_OP;
                $data['regions'] = $this->M_zone_intervention->getRegion();
                $data['contents'] = 'ajout_beneficiaire';

                if ($temp['appui']->TYPE_OP == 1) {
                    $data['op'] = 'opr';
                    $data['opListe'] = $this->M_op->getOpfMembres($temp['appui']->ID_OP);
                }
                if ($temp['appui']->TYPE_OP == 2) {
                    $data['op'] = 'opb / union';
                    $data['typeOp'] = 2;
                    $data['opListe'] = $this->M_op->getOprMembres($temp['appui']->ID_OP);
                }
                if ($temp['appui']->TYPE_OP == 3) {
                    $data['op'] = 'opb';
                    $data['opListe'] = $this->M_op->getUnionMembres($temp['appui']->ID_OP);
                }
                if ($temp['appui']->TYPE_OP == 4) {
                    $data['op'] = 'eaf';
                    $data['membres'] = $this->M_op->getOpbMembres($temp['appui']->ID_OP);
                }

                $this->load->view('templates', $data);
            }
            else redirect('c_login');
        }

        public function rechercher(){
            if (isset($this->session->user)) {
                $this->load->model('M_appui');
                $this->load->model('M_zone_intervention');
                $data['titre'] = 'Gestion des appuis';

                $data['regions'] = $this->M_zone_intervention->getRegion();

                $page = intval($this->input->get('page'));
                if (empty($page)) $page = 1;

                $critere['idRegion'] = $this->input->post('id_region');
                $critere['idDistrict'] = $this->input->post('id_district');
                $critere['idCommune'] = $this->input->post('id_commune');
                $critere['idFokontany'] = $this->input->post('id_fokontany');

                $critere['typeOp'] = $this->input->post('type_op');

                $critere['typeAppui'] = $this->input->post('type_appui');

                $critere['dateFDebut'] = $this->input->post('date_fdebut');
                $critere['dateFFin'] = $this->input->post('date_ffin');

                $critere['dateCDebut'] = $this->input->post('date_cdebut');
                $critere['dateCFin'] = $this->input->post('date_cfin');

                $data['appuiTotal'] = count($this->M_appui->findAppui($critere));
                $data['appuiListe'] = $this->M_appui->findAppui($critere, $page);

                $data['contents'] = 'recherche_appui';

                $this->load->view('templates', $data);
            }
            else redirect('c_login');
        }
	}