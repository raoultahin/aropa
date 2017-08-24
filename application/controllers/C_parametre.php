<?php
	class C_parametre extends CI_Controller {

        /*
         * zone_intervention
         */

        public function zone_intervention(){
            $this->load->model('M_zone_intervention');

            $data['titre']= 'Paramétrage';
            $data['contents']= 'zone_intervention';
            $data['regions'] = $this->M_zone_intervention->getRegion();

            $this->load->view('templates',$data);
        }

        //region
        public function liste_region(){
            $this->load->model('M_zone_intervention');

            $data['titre'] = 'Paramétrage';
            $data['contents'] = 'liste_region';
            $data['regions'] = $this->M_zone_intervention->getRegion();
            $this->load->view('templates',$data);
        }

        public function insert_region(){
            $this->load->model('M_zone_intervention');

            $codeRegion = $this->input->post('code_region');
            $nomRegion = $this->input->post('nom_region');

            if(isset($nomRegion) && $codeRegion!='' && isset($nomRegion) && $nomRegion!='') {
                $this->M_zone_intervention->insertRegion($codeRegion,$nomRegion);
                redirect('c_parametre/liste_region');
            }
            else redirect('c_parametre/liste_region');

        }

        public function update_region(){
            $this->load->model('M_zone_intervention');

            $idRegion = $this->input->post('id_region');
            $codeRegion = $this->input->post('code_region');
            $nomRegion = $this->input->post('nom_region');

            if(isset($nomRegion) && $codeRegion!='' && isset($nomRegion) && $nomRegion!='') {
                $error = $this->M_zone_intervention->updateRegion($idRegion,$codeRegion,$nomRegion);
                if(!isset($error)){
                    redirect('c_parametre/liste_region');
                }
                else {
                    echo $error['message'];
                }
            }
            else redirect('c_parametre/liste_region');

        }

        public function delete_region(){
            $this->load->model('M_zone_intervention');

            $idRegion = $this->input->post('id_region');

            if(isset($idRegion) && $idRegion!='') {
                $error = $this->M_zone_intervention->deleteRegion($idRegion);
                if(!isset($error)){
                    redirect('c_parametre/liste_region');
                }
                else {
                    echo $error['message'];
                }
            }
            else redirect('c_parametre/liste_region');

        }

        //district
        public function liste_district(){
            $this->load->model('M_zone_intervention');

            $data['titre'] = 'Paramétrage';
            $data['contents'] = 'liste_district';
            $data['regions'] = $this->M_zone_intervention->getRegion();
            $data['districts'] = $this->M_zone_intervention->getDistrict();
            $this->load->view('templates',$data);
        }

        public function insert_district(){
            $this->load->model('M_zone_intervention');

            $idRegion = $this->input->post('id_region');
            $codeDistrict = $this->input->post('code_district');
            $nomDistrict = $this->input->post('nom_district');

            if(isset($nomDistrict) && $codeDistrict!='' && isset($nomDistrict) && $nomDistrict!='') {
                $error=$this->M_zone_intervention->insertDistrict($idRegion,$codeDistrict,$nomDistrict);

                if(!isset($error))
                    redirect('c_parametre/liste_district');
                else
                    echo $error['message'];

            }
             else redirect('c_parametre/liste_district');
        }

        public function update_district(){
            $this->load->model('M_zone_intervention');

            $idRegion = $this->input->post('id_region');
            $idDistrict = $this->input->post('id_district');
            $codeDistrict = $this->input->post('code_district');
            $nomDistrict = $this->input->post('nom_district');

            if(isset($nomDistrict) && $codeDistrict!='' && isset($nomDistrict) && $nomDistrict!='') {
                $error = $this->M_zone_intervention->updateDistrict($idDistrict,$idRegion,$codeDistrict,$nomDistrict);
                if(!isset($error)){
                    redirect('c_parametre/liste_district');
                }
                else {
                    echo $error['message'];
                }
            }
            else redirect('c_parametre/liste_district');

        }

        public function delete_district(){
            $this->load->model('M_zone_intervention');

            $idDistrict = $this->input->post('id_district');

            if(isset($idDistrict) && $idDistrict!='') {
                $error = $this->M_zone_intervention->deleteDistrict($idDistrict);
                if(!isset($error)){
                    redirect('c_parametre/liste_district');
                }
                else {
                    echo $error['message'];
                }
            }
            else redirect('c_parametre/liste_district');

        }

        public function liste_district_by_region($idRegion){
            $this->load->model('M_zone_intervention');

            $data['districts'] = $this->M_zone_intervention->getDistrictByRegion($idRegion);
            echo json_encode($data['districts']);
        }

        //commune
        public function liste_commune(){
            $this->load->model('M_zone_intervention');

            $data['titre'] = 'Paramétrage';
            $data['contents'] = 'liste_commune';
            $data['regions'] = $this->M_zone_intervention->getRegion();
            $data['communes'] = $this->M_zone_intervention->getCommune();
            $this->load->view('templates',$data);
        }

        public function insert_commune(){
            $this->load->model('M_zone_intervention');

            $idDistrict = $this->input->post('id_district');
            $codeCommune = $this->input->post('code_commune');
            $nomCommune = $this->input->post('nom_commune');

            if(isset($nomCommune) && $codeCommune!='' && isset($nomCommune) && $nomCommune!='') {
                $error=$this->M_zone_intervention->insertCommune($idDistrict,$codeCommune,$nomCommune);
                if(!isset($error))
                    redirect('c_parametre/liste_commune');
                else
                    echo $error['message'];
            }
            else redirect('c_parametre/liste_commune');
        }

        public function update_commune(){
            $this->load->model('M_zone_intervention');

            $idCommune = $this->input->post('id_commune');
            $idDistrict = $this->input->post('id_district');
            $codeCommune = $this->input->post('code_commune');
            $nomCommune = $this->input->post('nom_commune');

            if(isset($nomCommune) && $codeCommune!='' && isset($nomCommune) && $nomCommune!='') {
                $error = $this->M_zone_intervention->updateCommune($idCommune,$idDistrict,$codeCommune,$nomCommune);
                if(!isset($error))
                    redirect('c_parametre/liste_commune');
                else
                    echo $error['message'];
            }
            else redirect('c_parametre/liste_commune');

        }

        public function delete_commune(){
            $this->load->model('M_zone_intervention');

            $idCommune = $this->input->post('id_commune');

            if(isset($idCommune) && $idCommune!='') {
                $error = $this->M_zone_intervention->deleteCommune($idCommune);
                if(!isset($error))
                    redirect('c_parametre/liste_commune');
                else
                    echo $error['message'];
            }
            else redirect('c_parametre/liste_commune');
        }

        public function liste_commune_by_district($idDistrict){
            $this->load->model('M_zone_intervention');

            $data['communes'] = $this->M_zone_intervention->getCommuneByDistrict($idDistrict);
            echo json_encode($data['communes']);
        }

        //fokontany
        public function liste_fokontany(){
            $this->load->model('M_zone_intervention');

            $data['titre'] = 'Paramétrage';
            $data['contents'] = 'liste_fokontany';
            $data['regions'] = $this->M_zone_intervention->getRegion();
            $data['fokontany'] = $this->M_zone_intervention->getFokontany();
            $this->load->view('templates',$data);
        }

        public function insert_fokontany(){
            $this->load->model('M_zone_intervention');

            $idCommune = $this->input->post('id_commune');
            $codeFokontany = $this->input->post('code_fokontany');
            $nomFokontany = $this->input->post('nom_fokontany');

            if(isset($nomFokontany) && $codeFokontany!='' && isset($nomFokontany) && $nomFokontany!='') {
                $error=$this->M_zone_intervention->insertFokontany($idCommune,$codeFokontany,$nomFokontany);
                if(!isset($error))
                    redirect('c_parametre/liste_fokontany');
                else
                    echo $error['message'];
            }
            else redirect('c_parametre/liste_fokontany');
        }

        public function update_fokontany(){
            $this->load->model('M_zone_intervention');

            $idCommune = $this->input->post('id_commune');
            $idFokontany = $this->input->post('id_fokontany');
            $codeFokontany = $this->input->post('code_fokontany');
            $nomFokontany = $this->input->post('nom_fokontany');

            if(isset($nomFokontany) && $codeFokontany!='' && isset($nomFokontany) && $nomFokontany!='') {
                $error = $this->M_zone_intervention->updateFokontany($idFokontany,$idCommune,$codeFokontany,$nomFokontany);
                if(!isset($error))
                    redirect('c_parametre/liste_fokontany');
                else
                    echo $error['message'];
            }
            else redirect('c_parametre/liste_fokontany');
        }

        public function delete_fokontany(){
            $this->load->model('M_zone_intervention');

            $idFokontany = $this->input->post('id_fokontany');

            if(isset($idFokontany) && $idFokontany!='') {
                $error = $this->M_zone_intervention->deleteFokontany($idFokontany);
                if(!isset($error))
                    redirect('c_parametre/liste_fokontany');
                else
                    echo $error['message'];
            }
            else redirect('c_parametre/liste_fokontany');
        }

        public function liste_fokontany_by_commune($idCommune){
            $this->load->model('M_zone_intervention');

            $data['fokontany'] = $this->M_zone_intervention->getFokontanyByCommune($idCommune);
            echo json_encode($data['fokontany']);
        }

        /*
         * OPF
         */

        public function liste_opf(){
            $this->load->model('M_op');

            $data['titre'] = 'Paramétrage';
            $data['contents'] = 'liste_opf';
            $data['opfListe'] = $this->M_op->getOpf();
            $this->load->view('templates',$data);
        }

        public function ajout_opf(){
            $this->load->model('M_zone_intervention');
            $this->load->model('M_filiere');

            $data['titre'] = 'Paramétrage';
            $data['contents'] = 'ajout_opf';
            $data['filieres'] = $this->M_filiere->getFilieres();
            $data['regions'] = $this->M_zone_intervention->getRegion();
            $this->load->view('templates',$data);
        }

        public function insert_opf(){
            $this->load->model('M_op');

            $codeOpf = $this->input->post('code_opf');
            $nomOpf = $this->input->post('nom_opf');
            $dateCreation = $this->input->post('date_creation');
            $statut = $this->input->post('statut');
            $filiereListe = $this->input->post('filieres');
            $formelle = $this->input->post('formelle');
            $representant = $this->input->post('representant');
            $contact = $this->input->post('contact');
            $siege = $this->input->post('id_fokontany');
            $observation = $this->input->post('observation');

            if(isset($nomOpf) && $nomOpf!='') {
                $error = $this->M_op->insertOpf($siege,$codeOpf,$nomOpf,$dateCreation,$statut,$formelle,$representant,$contact,$observation,$filiereListe);
                if(!isset($error)) {
                    redirect('c_parametre/liste_opf');
                }
                else
                    echo $error['message'];
            }
            else redirect('c_parametre/ajout_opf');

        }

        /*
         * OPR
         */

        public function liste_opr(){
            $this->load->model('M_op');

            $data['titre'] = 'Paramétrage';
            $data['contents'] = 'liste_opr';
            $data['oprListe'] = $this->M_op->getOpr();
            $this->load->view('templates',$data);
        }

        public function ajout_opr(){
            $this->load->model('M_zone_intervention');
            $this->load->model('M_filiere');

            $data['titre'] = 'Paramétrage';
            $data['contents'] = 'ajout_opr';
            $data['filieres'] = $this->M_filiere->getFilieres();
            $data['regions'] = $this->M_zone_intervention->getRegion();
            $this->load->view('templates',$data);
        }

        public function insert_opr(){
            $this->load->model('M_op');

            $codeOpr = $this->input->post('code_opr');
            $nomOpr = $this->input->post('nom_opr');
            $dateCreation = $this->input->post('date_creation');
            $statut = $this->input->post('statut');
            $filiereListe = $this->input->post('filieres');
            $formelle = $this->input->post('formelle');
            $representant = $this->input->post('representant');
            $contact = $this->input->post('contact');
            $siege = $this->input->post('id_fokontany');
            $observation = $this->input->post('observation');

            if(isset($nomOpr) && $nomOpr!='') {
                $error = $this->M_op->insertOpr($siege,$codeOpr,$nomOpr,$dateCreation,$statut,$formelle,$representant,$contact,$observation,$filiereListe);
                if(!isset($error)) {
                    redirect('c_parametre/liste_opr');
                }
                else
                    echo $error['message'];
            }
            else redirect('c_parametre/ajout_opr');
        }

        /*
         * UNION
         */

        public function liste_union(){
            $this->load->model('M_op');

            $data['titre'] = 'Paramétrage';
            $data['contents'] = 'liste_union';
            $data['unionListe'] = $this->M_op->getUnion();
            $this->load->view('templates',$data);
        }

        public function ajout_union(){
            $this->load->model('M_zone_intervention');
            $this->load->model('M_filiere');

            $data['titre'] = 'Paramétrage';
            $data['contents'] = 'ajout_union';
            $data['filieres'] = $this->M_filiere->getFilieres();
            $data['regions'] = $this->M_zone_intervention->getRegion();
            $this->load->view('templates',$data);
        }

        public function insert_union(){
            $this->load->model('M_op');

            $codeUnion = $this->input->post('code_union');
            $nomUnion = $this->input->post('nom_union');
            $dateCreation = $this->input->post('date_creation');
            $statut = $this->input->post('statut');
            $filiereListe = $this->input->post('filieres');
            $formelle = $this->input->post('formelle');
            $representant = $this->input->post('representant');
            $contact = $this->input->post('contact');
            $siege = $this->input->post('id_fokontany');
            $observation = $this->input->post('observation');

            if(isset($nomUnion) && $nomUnion!='') {
                $error = $this->M_op->insertUnion($siege,$codeUnion,$nomUnion,$dateCreation,$statut,$formelle,$representant,$contact,$observation,$filiereListe);
                if(!isset($error)) {
                    redirect('c_parametre/liste_union');
                }
                else
                    echo $error['message'];
            }
            else redirect('c_parametre/ajout_union');
        }

        /*
         * opb
         */

        public function liste_opb(){
            $this->load->model('M_op');

            $data['titre'] = 'Paramétrage';
            $data['contents'] = 'liste_opb';
            $data['unionListe'] = $this->M_op->getOpb();
            $this->load->view('templates',$data);
        }

        public function ajout_opb(){
            $this->load->model('M_zone_intervention');
            $this->load->model('M_filiere');

            $data['titre'] = 'Paramétrage';
            $data['contents'] = 'ajout_opb';
            $data['filieres'] = $this->M_filiere->getFilieres();
            $data['regions'] = $this->M_zone_intervention->getRegion();
            $this->load->view('templates',$data);
        }

        public function insert_opb(){
            $this->load->model('M_op');

            $codeOpb = $this->input->post('code_opb');
            $nomOpb = $this->input->post('nom_opb');
            $dateCreation = $this->input->post('date_creation');
            $statut = $this->input->post('statut');
            $filiereListe = $this->input->post('filieres');
            $formelle = $this->input->post('formelle');
            $representant = $this->input->post('representant');
            $contact = $this->input->post('contact');
            $siege = $this->input->post('id_fokontany');
            $observation = $this->input->post('observation');

            if(isset($nomOpb) && $nomOpb!='') {
                $error = $this->M_op->insertOpb($siege,$codeOpb,$nomOpb,$dateCreation,$statut,$formelle,$representant,$contact,$observation,$filiereListe);
                if(!isset($error)) {
                    redirect('c_parametre/liste_opb');
                }
                else
                    echo $error['message'];
            }
            else redirect('c_parametre/ajout_opb');
        }

        /*
         * Ménage
         */

        public function liste_menage(){
            $this->load->model('M_op');

            $data['titre'] = 'Paramétrage';
            $data['contents'] = 'liste_menage';
            $data['menages'] = $this->M_op->getMenages();
            $this->load->view('templates',$data);
        }

        public function ajout_menage(){
            $this->load->model('M_zone_intervention');
            $this->load->model('M_filiere');
            $this->load->model('M_op');

            $data['titre'] = 'Paramétrage';
            $data['contents'] = 'ajout_menage';
            $data['filieres'] = $this->M_filiere->getFilieres();
            $data['regions'] = $this->M_zone_intervention->getRegion();
            $this->load->view('templates',$data);
        }

        public function insert_menage(){
            $this->load->model('M_op');

            $codeMenage = $this->input->post('code_menage');
            $nomMenage = $this->input->post('nom_menage');
            $surnom = $this->input->post('surnom');
            $sexe = $this->input->post('sexe');
            $typeEaf = $this->input->post('type_eaf');
            $siege = $this->input->post('id_fokontany');
            $filiereListe = $this->input->post('filieres');
            $imf = $this->input->post('imf');

            if(isset($nomMenage) && $nomMenage!='') {
                $error = $this->M_op->insertMenage($siege,$typeEaf,$codeMenage,$nomMenage,$surnom,$sexe,$imf,$filiereListe);
                if(!isset($error)) {
                    redirect('c_parametre/liste_menage');
                }
                else
                    echo $error['message'];
            }
            else redirect('c_parametre/ajout_menage');
        }

	}