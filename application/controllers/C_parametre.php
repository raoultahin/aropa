<?php
	class C_parametre extends CI_Controller {

        /*
         * zone_intervention
         */

        public function zone_intervention(){
            if (isset($this->session->user)) {
                $this->load->model('M_zone_intervention');

                $data['titre'] = 'Paramétrage';
                $data['contents'] = 'zone_intervention';
                $data['regions'] = $this->M_zone_intervention->getRegion();
                $data['zoneIntervention'] = $this->M_zone_intervention->getZoneIntervention();
                $data['nb'] = new stdClass();
                $data['nb']->NB_DISTRICT = count($this->M_zone_intervention->getDistrict());
                $data['nb']->NB_COMMUNE = count($this->M_zone_intervention->getCommune());
                $data['nb']->NB_FOKONTANY = count($this->M_zone_intervention->getFokontany());

                $this->load->view('templates', $data);
            }
            else redirect('c_login');
        }

        //region
        public function liste_region(){
            if (isset($this->session->user)) {
                $this->load->model('M_zone_intervention');

                $data['titre'] = 'Paramétrage';
                $data['contents'] = 'liste_region';
                $data['regions'] = $this->M_zone_intervention->getRegion();
                $this->load->view('templates', $data);
            }
            else redirect('c_login');
        }

        public function insert_region(){
            if (isset($this->session->user)) {
                $this->load->model('M_zone_intervention');

                $codeRegion = $this->input->post('code_region');
                $nomRegion = $this->input->post('nom_region');

                if ($codeRegion != '' && $nomRegion != '') {
                    $this->M_zone_intervention->insertRegion($codeRegion, trim($nomRegion));
                    redirect('c_parametre/liste_region');
                } else redirect('c_parametre/liste_region');
            }
            else redirect('c_login');
        }

        public function update_region(){
            if (isset($this->session->user)) {
                $this->load->model('M_zone_intervention');

                $idRegion = $this->input->post('id_region');
                $codeRegion = $this->input->post('code_region');
                $nomRegion = $this->input->post('nom_region');

                if ($codeRegion != '' && $nomRegion != '') {
                    $error = $this->M_zone_intervention->updateRegion($idRegion, $codeRegion, $nomRegion);
                    if (!isset($error)) {
                        redirect('c_parametre/liste_region');
                    } else {
                        echo $error['message'];
                    }
                } else redirect('c_parametre/liste_region');
            }
            else redirect('c_login');
        }

        public function delete_region(){
            if (isset($this->session->user)) {
                $this->load->model('M_zone_intervention');

                $idRegion = $this->input->post('id_region');

                if ($idRegion != '') {
                    $error = $this->M_zone_intervention->deleteRegion($idRegion);
                    if (!isset($error)) {
                        redirect('c_parametre/liste_region');
                    } else {
                        echo $error['message'];
                    }
                } else redirect('c_parametre/liste_region');
            }
            else redirect('c_login');
        }

        //district
        public function liste_district(){
            if (isset($this->session->user)) {
                $this->load->model('M_zone_intervention');

                $data['titre'] = 'Paramétrage';
                $data['contents'] = 'liste_district';
                $data['regions'] = $this->M_zone_intervention->getRegion();
                $data['districts'] = $this->M_zone_intervention->getDistrict();
                $this->load->view('templates', $data);
            }
            else redirect('c_login');
        }

        public function insert_district(){
            if (isset($this->session->user)) {
                $this->load->model('M_zone_intervention');

                $idRegion = $this->input->post('id_region');
                $codeDistrict = $this->input->post('code_district');
                $nomDistrict = $this->input->post('nom_district');

                if ($codeDistrict != '' && $nomDistrict != '' && $idRegion != '') {
                    $error = $this->M_zone_intervention->insertDistrict($idRegion, $codeDistrict, trim($nomDistrict));

                    if (!isset($error))
                        redirect('c_parametre/liste_district');
                    else
                        echo $error['message'];

                } else redirect('c_parametre/liste_district');
            }
            else redirect('c_login');
        }

        public function update_district(){
            if (isset($this->session->user)) {
                $this->load->model('M_zone_intervention');

                $idRegion = $this->input->post('id_region');
                $idDistrict = $this->input->post('id_district');
                $codeDistrict = $this->input->post('code_district');
                $nomDistrict = $this->input->post('nom_district');

                if ($codeDistrict != '' && $nomDistrict != '' && $idRegion != '') {
                    $error = $this->M_zone_intervention->updateDistrict($idDistrict, $idRegion, $codeDistrict, $nomDistrict);
                    if (!isset($error)) {
                        redirect('c_parametre/liste_district');
                    } else {
                        echo $error['message'];
                    }
                } else redirect('c_parametre/liste_district');
            }
            else redirect('c_login');
        }

        public function delete_district(){
            if (isset($this->session->user)) {
                $this->load->model('M_zone_intervention');

                $idDistrict = $this->input->post('id_district');

                if ($idDistrict != '') {
                    $error = $this->M_zone_intervention->deleteDistrict($idDistrict);
                    if (!isset($error)) {
                        redirect('c_parametre/liste_district');
                    } else {
                        echo $error['message'];
                    }
                } else redirect('c_parametre/liste_district');
            }
            else redirect('c_login');
        }

        public function liste_district_by_region($idRegion){
            if (isset($this->session->user)) {
                $this->load->model('M_zone_intervention');

                $data['districts'] = $this->M_zone_intervention->getDistrictByRegion($idRegion);
                echo json_encode($data['districts']);
            }
            else redirect('c_login');
        }

        public function importer_district(){
            if (isset($this->session->user)) {
                $this->load->model('M_zone_intervention');

                $file = fopen($_FILES['csv']['tmp_name'], 'r');
                $temp = null;
                $i = 0;
                while (($data = fgetcsv($file, 1000, ";")) !== FALSE) {
                    if ($i != 0) {
                        if ($data[0] != $temp) {
                            $region = $this->M_zone_intervention->getRegionByCode($data[0]);
                        }
                        $error = $this->M_zone_intervention->insertDistrict($region->ID_REGION, $data[1], trim($data[2]));
                        if (isset($error)) {
                            echo $error['message'];
                            break;
                        }
                        $temp = $data[0];
                    }
                    $i++;
                }
                redirect('c_parametre/liste_district');
            }
            else redirect('c_login');
        }

        //commune
        public function liste_commune(){
            if (isset($this->session->user)) {
                $this->load->model('M_zone_intervention');

                $data['titre'] = 'Paramétrage';
                $data['contents'] = 'liste_commune';
                $data['regions'] = $this->M_zone_intervention->getRegion();
                $data['communes'] = $this->M_zone_intervention->getCommune();
                $this->load->view('templates', $data);
            }
            else redirect('c_login');
        }

        public function insert_commune(){
            if (isset($this->session->user)) {
                $this->load->model('M_zone_intervention');

                $idDistrict = $this->input->post('id_district');
                $codeCommune = $this->input->post('code_commune');
                $nomCommune = $this->input->post('nom_commune');

                if ($codeCommune != '' && $nomCommune != '' && $idDistrict != '') {
                    $error = $this->M_zone_intervention->insertCommune($idDistrict, $codeCommune, trim($nomCommune));
                    if (!isset($error))
                        redirect('c_parametre/liste_commune');
                    else
                        echo $error['message'];
                } else redirect('c_parametre/liste_commune');
            }
            else redirect('c_login');
        }

        public function update_commune(){
            if (isset($this->session->user)) {
                $this->load->model('M_zone_intervention');

                $idCommune = $this->input->post('id_commune');
                $idDistrict = $this->input->post('id_district');
                $codeCommune = $this->input->post('code_commune');
                $nomCommune = $this->input->post('nom_commune');

                if ($codeCommune != '' && $nomCommune != '' && $idDistrict != '') {
                    $error = $this->M_zone_intervention->updateCommune($idCommune, $idDistrict, $codeCommune, $nomCommune);
                    if (!isset($error))
                        redirect('c_parametre/liste_commune');
                    else
                        echo $error['message'];
                } else redirect('c_parametre/liste_commune');
            }
            else redirect('c_login');
        }

        public function delete_commune(){
            if (isset($this->session->user)) {
                $this->load->model('M_zone_intervention');

                $idCommune = $this->input->post('id_commune');

                if ($idCommune != '') {
                    $error = $this->M_zone_intervention->deleteCommune($idCommune);
                    if (!isset($error))
                        redirect('c_parametre/liste_commune');
                    else
                        echo $error['message'];
                } else redirect('c_parametre/liste_commune');
            }
            else redirect('c_login');
        }

        public function liste_commune_by_district($idDistrict){
            if (isset($this->session->user)) {
                $this->load->model('M_zone_intervention');

                $data['communes'] = $this->M_zone_intervention->getCommuneByDistrict($idDistrict);
                echo json_encode($data['communes']);
            }
            else redirect('c_login');
        }

        public function importer_commune(){
            if (isset($this->session->user)) {
                $this->load->model('M_zone_intervention');

                $file = fopen($_FILES['csv']['tmp_name'], 'r');
                $temp = null;
                $i = 0;
                while (($data = fgetcsv($file, 1000, ";")) !== FALSE) {
                    if ($i != 0) {
                        if ($data[0] != $temp) {
                            $district = $this->M_zone_intervention->getDistrictByCode($data[0]);
                        }
                        $error = $this->M_zone_intervention->insertCommune($district->ID_DISTRICT, $data[1], trim($data[2]));
                        if (isset($error)) {
                            echo $error['message'];
                            break;
                        }
                        $temp = $data[0];
                    }
                    $i++;
                }
                redirect('c_parametre/liste_commune');
            }
            else redirect('c_login');
        }

        //fokontany
        public function liste_fokontany(){
            if (isset($this->session->user)) {
                $this->load->model('M_zone_intervention');

                $data['titre'] = 'Paramétrage';
                $data['contents'] = 'liste_fokontany';
                $data['regions'] = $this->M_zone_intervention->getRegion();
                $data['fokontany'] = $this->M_zone_intervention->getFokontany();
                $this->load->view('templates', $data);
            }
            else redirect('c_login');
        }

        public function insert_fokontany(){
            if (isset($this->session->user)) {
                $this->load->model('M_zone_intervention');

                $idCommune = $this->input->post('id_commune');
                $codeFokontany = $this->input->post('code_fokontany');
                $nomFokontany = $this->input->post('nom_fokontany');

                if ($codeFokontany != '' && $nomFokontany != '' && $idCommune != '') {
                    $error = $this->M_zone_intervention->insertFokontany($idCommune, $codeFokontany, trim($nomFokontany));
                    if (!isset($error))
                        redirect('c_parametre/liste_fokontany');
                    else
                        echo $error['message'];
                } else redirect('c_parametre/liste_fokontany');
            }
            else redirect('c_login');
        }

        public function update_fokontany(){
            if (isset($this->session->user)) {
                $this->load->model('M_zone_intervention');

                $idCommune = $this->input->post('id_commune');
                $idFokontany = $this->input->post('id_fokontany');
                $codeFokontany = $this->input->post('code_fokontany');
                $nomFokontany = $this->input->post('nom_fokontany');

                if ($codeFokontany != '' && $nomFokontany != '' && $idCommune != '') {
                    $error = $this->M_zone_intervention->updateFokontany($idFokontany, $idCommune, $codeFokontany, $nomFokontany);
                    if (!isset($error))
                        redirect('c_parametre/liste_fokontany');
                    else
                        echo $error['message'];
                } else redirect('c_parametre/liste_fokontany');
            }
            else redirect('c_login');
        }

        public function delete_fokontany(){
            if (isset($this->session->user)) {
                $this->load->model('M_zone_intervention');

                $idFokontany = $this->input->post('id_fokontany');

                if ($idFokontany != '') {
                    $error = $this->M_zone_intervention->deleteFokontany($idFokontany);
                    if (!isset($error))
                        redirect('c_parametre/liste_fokontany');
                    else
                        echo $error['message'];
                } else redirect('c_parametre/liste_fokontany');
            }
            else redirect('c_login');
        }

        public function liste_fokontany_by_commune($idCommune){
            if (isset($this->session->user)) {
                $this->load->model('M_zone_intervention');

                $data['fokontany'] = $this->M_zone_intervention->getFokontanyByCommune($idCommune);
                echo json_encode($data['fokontany']);
            }
            else redirect('c_login');
        }

        public function importer_fokontany(){
            if (isset($this->session->user)) {
                $this->load->model('M_zone_intervention');

                $file = fopen($_FILES['csv']['tmp_name'], 'r');
                $temp = null;
                $i = 0;
                while (($data = fgetcsv($file, 1000, ";")) !== FALSE) {
                    if ($i != 0) {
                        if ($data[0] != $temp) {
                            $commune = $this->M_zone_intervention->getCommuneByCode($data[0]);
                        }
                        $error = $this->M_zone_intervention->insertFokontany($commune->ID_COMMUNE, $data[1], trim($data[2]));
                        if (isset($error)) {
                            echo $error['message'];
                            break;
                        }
                        $temp = $data[0];
                    }
                    $i++;
                }
                redirect('c_parametre/liste_fokontany');
            }
            else redirect('c_login');
        }

        /*
         * OPF
         */

        public function liste_opf(){
            if (isset($this->session->user)) {
                $this->load->model('M_op');

                $page = intval($this->input->get('page'));
                if (empty($page)) $page = 1;

                $data['titre'] = 'Paramétrage';
                $data['contents'] = 'liste_opf';
                $data['opfListe'] = $this->M_op->getOpf($page);
                $data['opfTotal'] = $this->M_op->getTotal('opf');
                $this->load->view('templates', $data);
            }
            else redirect('c_login');
        }

        public function ajout_opf(){
            if (isset($this->session->user)) {
                $this->load->model('M_zone_intervention');
                $this->load->model('M_filiere');

                $data['titre'] = 'Paramétrage';
                $data['contents'] = 'ajout_opf';
                $data['filieres'] = $this->M_filiere->getFilieres();
                $data['regions'] = $this->M_zone_intervention->getRegion();
                $this->load->view('templates', $data);
            }
            else redirect('c_login');
        }

        public function insert_opf(){
            if (isset($this->session->user)) {
                $this->load->model('M_op');

                $nomOpf = $this->input->post('nom_opf');
                $dateCreation = $this->input->post('date_creation');
                $statut = $this->input->post('statut');
                $filiereListe = $this->input->post('filieres');
                $formelle = $this->input->post('formelle');
                $representant = $this->input->post('representant');
                $contact = $this->input->post('contact');
                $siege = $this->input->post('id_fokontany');
                $observation = $this->input->post('observation');
                if ($nomOpf != '') {
                    $error = $this->M_op->insertOpf($siege, trim($nomOpf), $dateCreation, $statut, $formelle, trim($representant), trim($contact), trim($observation), $filiereListe, null);
                    if (!isset($error)) {
                        redirect('c_parametre/liste_opf');
                    } else
                        echo $error['message'];
                } else redirect('c_parametre/ajout_opf');
            }
            else redirect('c_login');
        }

        public function delete_opf(){
            if (isset($this->session->user)) {
                $this->load->model('M_op');

                $idOpf = $this->input->post('id_opf');

                if ($idOpf != '') {
                    $error = $this->M_op->deleteOpf($idOpf);
                    if (!isset($error))
                        redirect('c_parametre/liste_opf');
                    else
                        echo($error);
                } else redirect('c_parametre/liste_opf');
            }
            else redirect('c_login');
        }

        /*
         * OPR
         */

        public function liste_opr(){
            if (isset($this->session->user)) {
                $this->load->model('M_op');

                $page = intval($this->input->get('page'));
                if (empty($page)) $page = 1;

                $data['titre'] = 'Paramétrage';
                $data['contents'] = 'liste_opr';
                $data['oprListe'] = $this->M_op->getOpr($page);
                $data['oprTotal'] = $this->M_op->getTotal('opr');
                $this->load->view('templates', $data);
            }
            else redirect('c_login');
        }

        public function ajout_opr(){
            if (isset($this->session->user)) {
                $this->load->model('M_zone_intervention');
                $this->load->model('M_filiere');

                $data['titre'] = 'Paramétrage';
                $data['contents'] = 'ajout_opr';
                $data['filieres'] = $this->M_filiere->getFilieres();
                $data['regions'] = $this->M_zone_intervention->getRegion();
                $this->load->view('templates', $data);
            }
            else redirect('c_login');
        }

        public function insert_opr(){
            if (isset($this->session->user)) {
                $this->load->model('M_op');

                $nomOpr = $this->input->post('nom_opr');
                $dateCreation = $this->input->post('date_creation');
                $statut = $this->input->post('statut');
                $filiereListe = $this->input->post('filieres');
                $formelle = $this->input->post('formelle');
                $representant = $this->input->post('representant');
                $contact = $this->input->post('contact');
                $siege = $this->input->post('id_fokontany');
                $observation = $this->input->post('observation');
                if (isset($nomOpr) && $nomOpr != '') {
                    $error = $this->M_op->insertOpr($siege, trim($nomOpr), $dateCreation, $statut, $formelle, trim($representant), trim($contact), trim($observation), $filiereListe, null);
                    if (!isset($error)) {
                        redirect('c_parametre/liste_opr');
                    } else
                        echo $error['message'];
                } else redirect('c_parametre/ajout_opr');
            }
            else redirect('c_login');
        }

        public function delete_opr(){
            if (isset($this->session->user)) {
                $this->load->model('M_op');

                $idOpr = $this->input->post('id_opr');

                if ($idOpr != '') {
                    $error = $this->M_op->deleteOpr($idOpr);
                    if (!isset($error))
                        redirect('c_parametre/liste_opr');
                    else
                        echo $error;
                } else redirect('c_parametre/liste_opr');
            }
            else redirect('c_login');
        }

        public function importer_opr(){
            if (isset($this->session->user)) {
                $this->load->model('M_zone_intervention');
                $this->load->model('M_op');

                $file = fopen($_FILES['csv']['tmp_name'], 'r');
                $temp = null;
                $i = 0;
                while (($data = fgetcsv($file, 1000, ";")) !== FALSE) {
                    if ($i != 0) {
                        if ($data[0] != $temp) {
                            $fokontany = $this->M_zone_intervention->getFokontanyByCode($data[0]);
                        }
                        $date = empty($data[2]) ? null : date('Y-m-d', strtotime($data[2]));
                        $statut = empty($data[3]) ? null : $data[3];
                        $representant = empty($data[6]) ? null : trim($data[6]);
                        $contact = empty($data[7]) ? null : trim($data[7]);
                        $filiereListe = array_filter(explode(',', $data[5]));
                        $result = $this->M_op->insertOpr($fokontany->ID_FOKONTANY, trim($data[1]), $date, $statut, intval($data[4]), $representant, $contact, null, $filiereListe, intval($data[8]));
                        if (isset($result['error'])) {
                            echo $result['error']['message'];
                            break;
                        }
                        if ($data[9] != '') $this->M_op->setOprIdOpf(intval($data[9]), $result['idOpr']);
                        $temp = $data[0];
                    }
                    $i++;
                }
                redirect('c_parametre/liste_opr');
            }
            else redirect('c_login');
        }

        /*
         * UNION
         */

        public function liste_union(){
            if (isset($this->session->user)) {
                $this->load->model('M_op');
                $page = intval($this->input->get('page'));
                if (empty($page)) $page = 1;

                $data['titre'] = 'Paramétrage';
                $data['contents'] = 'liste_union';
                $data['unionListe'] = $this->M_op->getUnion($page);
                $data['unionTotal'] = $this->M_op->getTotal('tab_union');
                $this->load->view('templates', $data);
            }
            else redirect('c_login');
        }

        public function ajout_union(){
            if (isset($this->session->user)) {
                $this->load->model('M_zone_intervention');
                $this->load->model('M_filiere');

                $data['titre'] = 'Paramétrage';
                $data['contents'] = 'ajout_union';
                $data['filieres'] = $this->M_filiere->getFilieres();
                $data['regions'] = $this->M_zone_intervention->getRegion();
                $this->load->view('templates', $data);
            }
            else redirect('c_login');
        }

        public function insert_union(){
            if (isset($this->session->user)) {
                $this->load->model('M_op');

                $nomUnion = $this->input->post('nom_union');
                $dateCreation = $this->input->post('date_creation');
                $statut = $this->input->post('statut');
                $filiereListe = $this->input->post('filieres');
                $formelle = $this->input->post('formelle');
                $representant = $this->input->post('representant');
                $contact = $this->input->post('contact');
                $siege = $this->input->post('id_fokontany');
                $observation = $this->input->post('observation');
                if (isset($nomUnion) && $nomUnion != '') {
                    $error = $this->M_op->insertUnion($siege, null, trim($nomUnion), $dateCreation, $statut, $formelle, $representant, trim($contact), trim($observation), $filiereListe, null);
                    if (!isset($error)) {
                        redirect('c_parametre/liste_union');
                    } else
                        echo $error['message'];
                } else redirect('c_parametre/ajout_union');
            }
            else redirect('c_login');
        }

        public function delete_union(){
            if (isset($this->session->user)) {
                $this->load->model('M_op');

                $idUnion = $this->input->post('id_union');

                if ($idUnion != '') {
                    $error = $this->M_op->deleteUnion($idUnion);
                    if (!isset($error))
                        redirect('c_parametre/liste_union');
                    else
                        echo $error;
                } else redirect('c_parametre/liste_union');
            }
            else redirect('c_login');
        }

        public function importer_union(){
            if (isset($this->session->user)) {
                $this->load->model('M_zone_intervention');
                $this->load->model('M_op');

                $file = fopen($_FILES['csv']['tmp_name'], 'r');
                $temp = null;
                while (($data = fgetcsv($file, 1000, ";")) !== FALSE) {
                    if ($data[0] != $temp) {
                        $fokontany = $this->M_zone_intervention->getFokontanyByCode($data[0]);
                    }
                    $date = date('Y-m-d', strtotime($data[4]));
                    if ($data[4] == '') $date = null;
                    $filiereListe = array_filter(explode(',', $data[2]));
                    $idOpr = empty($data[3]) ? null : $data[3];
                    $error = $this->M_op->insertUnion($fokontany->ID_FOKONTANY, $idOpr, trim($data[1]), $date, null, null, null, $data[5], null, $filiereListe);
                    if (isset($error)) {
                        echo $error['message'];
                        break;
                    }
                    $temp = $data[0];
                }
            }
            else redirect('c_login');
        }

        /*
         * opb
         */

        public function liste_opb(){
            if (isset($this->session->user)) {
                $this->load->model('M_op');
                $page = intval($this->input->get('page'));
                if (empty($page)) $page = 1;

                $data['titre'] = 'Paramétrage';
                $data['contents'] = 'liste_opb';
                $data['opbListe'] = $this->M_op->getOpb($page);
                $data['opbTotal'] = $this->M_op->getTotal('opb');
                $this->load->view('templates', $data);
            }
            else redirect('c_login');
        }

        public function ajout_opb(){
            if (isset($this->session->user)) {
                $this->load->model('M_zone_intervention');
                $this->load->model('M_filiere');
                $this->load->model('M_appui');

                $data['titre'] = 'Paramétrage';
                $data['contents'] = 'ajout_opb';
                $data['filieres'] = $this->M_filiere->getFilieres();
                $data['regions'] = $this->M_zone_intervention->getRegion();
                $data['catOp'] = $this->M_appui->getCatOp();
                $this->load->view('templates', $data);
            }
            else redirect('c_login');
        }

        public function insert_opb(){
            if (isset($this->session->user)) {
                $this->load->model('M_op');

                $nomOpb = $this->input->post('nom_opb');
                $dateCreation = $this->input->post('date_creation');
                $statut = $this->input->post('statut');
                $filiereListe = $this->input->post('filieres');
                $formelle = $this->input->post('formelle');
                $type = $this->input->post('type');
                $representant = $this->input->post('representant');
                $contact = $this->input->post('contact');
                $siege = $this->input->post('id_fokontany');
                $observation = $this->input->post('observation');
                if (isset($nomOpb) && $nomOpb != '') {
                    $result = $this->M_op->insertOpb($siege, trim($nomOpb), $dateCreation, $statut, $formelle, trim($representant), trim($contact), trim($observation), $filiereListe, $type, null);
                    if (!isset($result['errot'])) {
                        redirect('c_parametre/liste_opb');
                    } else
                        echo $result['errot']['message'];
                } else redirect('c_parametre/ajout_opb');
            }
            else redirect('c_login');
        }

        public function delete_opb(){
            if (isset($this->session->user)) {
                $this->load->model('M_op');

                $idOpb = $this->input->post('id_opb');

                if ($idOpb != '') {
                    $error = $this->M_op->deleteOpb($idOpb);
                    if (!isset($error))
                        redirect('c_parametre/liste_opb');
                    else
                        echo $error;
                } else redirect('c_parametre/liste_opb');
            }
            else redirect('c_login');
        }

        public function importer_opb(){
            if (isset($this->session->user)) {
                $this->load->model('M_zone_intervention');
                $this->load->model('M_op');

                $file = fopen($_FILES['csv']['tmp_name'], 'r');
                $temp = null;
                $i = 0;
                while (($data = fgetcsv($file, 1000, ";")) !== FALSE) {
                    if ($i != 0) {
                        if ($data[0] != $temp) {
                            $fokontany = $this->M_zone_intervention->getFokontanyByCode($data[0]);
                        }
                        $date = empty($data[2]) ? null : date('Y-m-d', strtotime($data[2]));
                        $statut = empty($data[3]) ? null : trim($data[3]);
                        $representant = empty($data[6]) ? null : trim($data[6]);
                        $contact = empty($data[7]) ? null : trim($data[7]);
                        $filiereListe = array_filter(explode(',', $data[5]));
                        $result = $this->M_op->insertOpb($fokontany->ID_FOKONTANY, trim($data[1]), $date, $statut, intval($data[4]), $representant, $contact, null, $filiereListe, intval($data[8]), intval($data[9]));
                        if (isset($result['error'])) {
                            echo $result['error']['message'];
                            break;
                        }
                        if ($data[10] != '') $this->M_op->insertOprMembreIdOpb($data[12], $result['idOpb']);
                        $temp = $data[0];
                    }
                    $i++;
                }
                redirect('c_parametre/liste_opb');
            }
            else redirect('c_login');
        }

        /*
         * Ménage
         */

        public function liste_menage(){
            if (isset($this->session->user)) {
                $this->load->model('M_op');
                $page = intval($this->input->get('page'));
                if (empty($page)) $page = 1;

                $data['titre'] = 'Paramétrage';
                $data['contents'] = 'liste_menage';
                $data['menages'] = $this->M_op->getMenages($page);
                $data['menageTotal'] = $this->M_op->getTotal('menages');
                $this->load->view('templates', $data);
            }
            else redirect('c_login');
        }

        public function ajout_menage(){
            if (isset($this->session->user)) {
                $this->load->model('M_zone_intervention');
                $this->load->model('M_filiere');
                $this->load->model('M_op');

                $data['titre'] = 'Paramétrage';
                $data['contents'] = 'ajout_menage';
                $data['filieres'] = $this->M_filiere->getFilieres();
                $data['regions'] = $this->M_zone_intervention->getRegion();
                $this->load->view('templates', $data);
            }
            else redirect('c_login');
        }

        public function insert_menage(){
            if (isset($this->session->user)) {
                $this->load->model('M_op');

                $nomMenage = $this->input->post('nom_menage');
                $surnom = $this->input->post('surnom');
                $sexe = $this->input->post('sexe');
                $typeEaf = $this->input->post('type_eaf');
                $siege = $this->input->post('id_fokontany');
                $filiereListe = $this->input->post('filieres');
                $imf = $this->input->post('imf');

                if (isset($nomMenage) && $nomMenage != '') {
                    $error = $this->M_op->insertMenage($siege, $typeEaf, trim($nomMenage), trim($surnom), $sexe, $imf, $filiereListe);
                    if (!isset($error)) {
                        redirect('c_parametre/liste_menage');
                    } else
                        echo $error['message'];
                } else redirect('c_parametre/ajout_menage');
            }
            else redirect('c_login');
        }

        public function delete_menage(){
            if (isset($this->session->user)) {
                $this->load->model('M_op');

                $idMenage = $this->input->post('id_menage');

                if ($idMenage != '') {
                    $error = $this->M_op->deleteMenage($idMenage);
                    if (!isset($error))
                        redirect('c_parametre/liste_menage');
                    else
                        echo $error;
                } else redirect('c_parametre/liste_menage');
            }
            else redirect('c_login');
        }

        public function importer_menage(){
            if (isset($this->session->user)) {
                $this->load->model('M_zone_intervention');
                $this->load->model('M_op');

                $file = fopen($_FILES['csv']['tmp_name'], 'r');
                $temp = null;
                $i = 0;
                while (($data = fgetcsv($file, 1000, ";")) !== FALSE) {
                    if ($i != 0) {
                        if ($data[0] != $temp) {
                            $fokontany = $this->M_zone_intervention->getFokontanyByCode($data[0]);
                        }
                        $filiereListe = array_filter(explode(',', $data[5]));
                        $result = $this->M_op->insertMenage($fokontany->ID_FOKONTANY, intval($data[4]), trim($data[1]), trim($data[2]), $data[3], intval($data[6]), $filiereListe, intval(7));
                        if (isset($result['error'])) {
                            echo $result['error']['message'];
                            break;
                        }
                        if ($data[8] != '') $this->M_op->insertOpbMembreDet($data[8], $result['idMenage'], $data[9], null);
                        $temp = $data[0];
                    }
                    $i++;
                }
                redirect('c_parametre/liste_menage');
            }
            else redirect('c_login');
        }

        /*
         * autre
         */

        public function fiche_op($op,$id){
            if (isset($this->session->user)) {
                $this->load->model('M_op');

                $data['titre'] = 'Paramétrage';
                $data['contents'] = 'fiche_op';
                if (isset($op) && isset($id)) {
                    $data['op'] = $op;
                    $column = 'ID_' . $op . ' ID_OP, CODE_' . $op . ' CODE_OP, NOM_' . $op . ' NOM_OP, NOM_REGION, NOM_DISTRICT, NOM_COMMUNE, NOM_FOKONTANY, DATE_CREATION, STATUT, FORMELLE, REPRESENTANT,CONTACT, OBSERVATION';
                    $data['ficheOp'] = $this->M_op->getOpById($op, $id, $column);
                    $data['filieres'] = $this->M_op->getOpFiliere($id, $op);

                    if ($op == 'opf') $data['membres'] = $this->M_op->getOpfMembres($id);
                    if ($op == 'opr') $data['membres'] = $this->M_op->getOprMembres($id);
                    if ($op == 'union') $data['membres'] = $this->M_op->getUnionMembres($id);
                    if ($op == 'opb') {
                        $data['membres'] = $this->M_op->getOpbMembres($id);
                    }
                    $this->load->view('templates', $data);
                }
            }
            else redirect('c_login');
        }

        public function edit_op($op,$id){
            if (isset($this->session->user)) {
                $this->load->model('M_op');
                $this->load->model('M_filiere');
                $this->load->model('M_zone_intervention');

                $data['titre'] = 'Paramétrage';
                $data['contents'] = 'edit_op';
                if (isset($op) && isset($id)) {
                    $data['op'] = $op;
                    $column = 'ID_' . $op . ' ID_OP, CODE_' . $op . ' CODE_OP, NOM_' . $op . ' NOM_OP, NOM_REGION, NOM_DISTRICT, NOM_COMMUNE, zone_intervention.ID_FOKONTANY, NOM_FOKONTANY, DATE_CREATION, STATUT, FORMELLE, REPRESENTANT,CONTACT, OBSERVATION';
                    $data['ficheOp'] = $this->M_op->getOpById($op, $id, $column);
                    $data['fil'] = $this->M_op->getOpFiliere($id, $op);
                    $data['filieres'] = $this->M_filiere->getFilieres();
                    $data['regions'] = $this->M_zone_intervention->getRegion();

                    $this->load->view('templates', $data);
                }
            }
            else redirect('c_login');
        }

        public function update_op($op,$id){
            if (isset($this->session->user)) {
                $this->load->model('M_op');

                $nomOp = $this->input->post('nom_op');
                $dateCreation = $this->input->post('date_creation');
                $statut = $this->input->post('statut');
                $filiereListe = $this->input->post('filieres');
                $formelle = $this->input->post('formelle');
                if ($op == 'opb') $type = $this->input->post('type_op');
                $representant = $this->input->post('representant');
                $contact = $this->input->post('contact');
                $siege = $this->input->post('id_fokontany');
                $observation = $this->input->post('observation');
                if (isset($nomOp) && $nomOp != '') {
                    $error = null;
                    if ($op == 'opf')
                        $error = $this->M_op->updateOpf($siege, $nomOp, $dateCreation, $statut, $formelle, $representant, $contact, $observation, $filiereListe, $id);
                    if ($op == 'opr')
                        $error = $this->M_op->updateOpr($siege, $nomOp, $dateCreation, $statut, $formelle, $representant, $contact, $observation, $filiereListe, $id);
                    if ($op == 'union')
                        $error = $this->M_op->updateUnion($siege, $nomOp, $dateCreation, $statut, $formelle, $representant, $contact, $observation, $filiereListe, $id);
                    if ($op == 'opb')
                        $error = $this->M_op->updateOpb($siege, $nomOp, $dateCreation, $statut, $formelle, $representant, $contact, $observation, $filiereListe, $type, $id);

                    if (!isset($error)) {
                        redirect('c_parametre/liste_' . $op);
                    } else
                        echo $error['message'];
                } else redirect('c_parametre/edit_op/' . $op . '/' . $id);
            }
            else redirect('c_login');
        }

        public function ajout_membre($op,$id){
            if (isset($this->session->user)) {
                $this->load->model('M_op');
                $data['titre'] = 'Paramétrage';
                $column = 'ID_' . $op . ' ID_OP, CODE_' . $op . ' CODE_OP, NOM_' . $op . ' NOM_OP';
                $data['ficheOp'] = $this->M_op->getOpById($op, $id, $column);
                if ($op == 'opf') $data['contents'] = 'ajout_membre_opf';
                if ($op == 'opr') $data['contents'] = 'ajout_membre_opr';
                if ($op == 'union') $data['contents'] = 'ajout_membre_union';
                if ($op == 'opb') {
                    $data['contents'] = 'ajout_membre_opb';
                    $data['fonctions'] = $this->M_op->getMenageFonctions();
                }
                $this->load->view('templates', $data);
            }
            else redirect('c_login');
        }

        public function insert_opf_membre() {
            if (isset($this->session->user)) {
                $this->load->model('M_op');

                $idOpf = $this->input->post('id_op');
                $membres = array_filter($this->input->post('membres'));
                if ($idOpf != '' && sizeof($membres) != 0) {
                    $this->M_op->setOprOpf($idOpf, $membres);
                    redirect('c_parametre/fiche_op/opf/' . $idOpf . '/#liste_membre');
                } else redirect('c_parametre/fiche_op/opf/' . $idOpf . '/#liste_membre');
            }
            else redirect('c_login');
        }

        public function insert_opr_membre() {
            if (isset($this->session->user)) {
                $this->load->model('M_op');

                $idOpr = $this->input->post('id_op');
                $membres = array_filter($this->input->post('membres'));
                if ($idOpr != '' && sizeof($membres) != 0) {
                    $this->M_op->insertOprMembre($idOpr, $membres);
                    redirect('c_parametre/fiche_op/opr/' . $idOpr . '/#liste_membre');
                } else redirect('c_parametre/fiche_op/opr/' . $idOpr . '/#liste_membre');
            }
            else redirect('c_login');
        }

        public function insert_union_membre() {
            if (isset($this->session->user)) {
                $this->load->model('M_op');

                $idUnion = $this->input->post('id_op');
                $membres = array_filter($this->input->post('membres'));
                if ($idUnion != '' && sizeof($membres) != 0) {
                    $this->M_op->insertUnionMembre($idUnion, $membres);
                    redirect('c_parametre/fiche_op/union/' . $idUnion . '/#liste_membre');
                } else redirect('c_parametre/fiche_op/union/' . $idUnion . '/#liste_membre');
            }
            else redirect('c_login');
        }

        public function insert_opb_membre() {
            if (isset($this->session->user)) {
                $this->load->model('M_op');

                $idOpb = $this->input->post('id_op');
                $membres = $this->input->post('membres');

                if ($idOpb != '') {
                    $this->M_op->insertOpbMembre($idOpb, $membres);
                    redirect('c_parametre/fiche_op/opb/' . $idOpb . '/#liste_membre');
                } else redirect('c_parametre/fiche_op/opb/' . $idOpb . '/#liste_membre');
            }
            else redirect('c_login');
        }

        public function rechercher($op){
            if (isset($this->session->user)) {
                $this->load->model('M_op');
                $this->load->model('M_zone_intervention');
                $data['titre'] = 'Paramétrage';
                $data['op'] = $op;

                $data['regions'] = $this->M_zone_intervention->getRegion();

                $page = intval($this->input->get('page'));
                if (empty($page)) $page = 1;

                if ($op == 'opb') {
                    $critere['idRegion'] = $this->input->get('id_region');
                    $critere['idDistrict'] = $this->input->get('id_district');
                    $critere['idCommune'] = $this->input->get('id_commune');
                    $critere['idFokontany'] = $this->input->get('id_fokontany');

                    $critere['codeOp'] = $this->input->get('code_op');
                    $critere['nomOp'] = $this->input->get('nom_op');
                    $critere['filiere'] = $this->input->get('filiere');
                    $critere['representant'] = $this->input->get('representant');

                    $critere['formelle'] = $this->input->get('formelle');

                    $data['opTotal'] = count($this->M_op->findOpb($critere));
                    $data['opListe'] = $this->M_op->findOpb($critere, $page);

                    $data['contents'] = 'recherche_op';
                }
                $this->load->view('templates', $data);
            }
            else redirect('c_login');
        }

	}