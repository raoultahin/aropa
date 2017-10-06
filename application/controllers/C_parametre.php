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
            $data['zoneIntervention'] = $this->M_zone_intervention->getZoneIntervention();
            $data['nb'] = new stdClass();
            $data['nb']->NB_DISTRICT = count($this->M_zone_intervention->getDistrict());
            $data['nb']->NB_COMMUNE = count($this->M_zone_intervention->getCommune());
            $data['nb']->NB_FOKONTANY = count($this->M_zone_intervention->getFokontany());

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

            if($codeRegion!='' && $nomRegion!='') {
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

            if($codeRegion!='' && $nomRegion!='') {
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

            if($idRegion!='') {
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

            if($codeDistrict!='' && $nomDistrict!='' && $idRegion!='') {
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

            if($codeDistrict!=''&& $nomDistrict!='' && $idRegion!='') {
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

            if($idDistrict!='') {
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

            if($codeCommune!='' && $nomCommune!='' && $idDistrict!='') {
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

            if($codeCommune!='' && $nomCommune!='' && $idDistrict!='') {
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

            if($idCommune!='') {
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

            if($codeFokontany!='' && $nomFokontany!='' && $idCommune!='') {
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

            if($codeFokontany!='' && $nomFokontany!='' && $idCommune!='') {
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

            if($idFokontany!='') {
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

        public function importer_fokontany(){
            $this->load->model('M_zone_intervention');

            $file = fopen($_FILES['csv']['tmp_name'], 'r');
            $temp = null;
            $add = 0;
            while (($data = fgetcsv($file, 1000, ";")) !== FALSE) {
                if($data[0]!=$temp) {
                    $add = 0;
                    $commune = $this->M_zone_intervention->getCommuneByCode($data[0]);
                }
                $add++;
                $error=$this->M_zone_intervention->insertFokontany($commune->ID_COMMUNE,$data[0].$add,$data[1]);
                if(isset($error)) {
                    echo $error['message'];
                    break;
                }
                $temp=$data[0];
            }
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

            $nomOpf = $this->input->post('nom_opf');
            $dateCreation = $this->input->post('date_creation');
            $statut = $this->input->post('statut');
            $filiereListe = $this->input->post('filieres');
            $formelle = $this->input->post('formelle');
            $representant = $this->input->post('representant');
            $contact = $this->input->post('contact');
            $siege = $this->input->post('id_fokontany');
            $observation = $this->input->post('observation');
            if($representant=='') $representant=null;
            if($nomOpf!='') {
                $error = $this->M_op->insertOpf($siege,$nomOpf,$dateCreation,$statut,$formelle,$representant,$contact,$observation,$filiereListe);
                if(!isset($error)) {
                    redirect('c_parametre/liste_opf');
                }
                else
                    echo $error['message'];
            }
            else redirect('c_parametre/ajout_opf');

        }

        public function delete_opf(){
            $this->load->model('M_op');

            $idOpf = $this->input->post('id_opf');

            if($idOpf!='') {
                $error = $this->M_op->deleteOpf($idOpf);
                if(!isset($error))
                    redirect('c_parametre/liste_opf');
                else
                    echo $error['message'];
            }
            else redirect('c_parametre/liste_opf');
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

            $nomOpr = $this->input->post('nom_opr');
            $dateCreation = $this->input->post('date_creation');
            $statut = $this->input->post('statut');
            $filiereListe = $this->input->post('filieres');
            $formelle = $this->input->post('formelle');
            $representant = $this->input->post('representant');
            $contact = $this->input->post('contact');
            $siege = $this->input->post('id_fokontany');
            $observation = $this->input->post('observation');
            if($representant=='') $representant=null;
            if(isset($nomOpr) && $nomOpr!='') {
                $error = $this->M_op->insertOpr($siege,$nomOpr,$dateCreation,$statut,$formelle,$representant,$contact,$observation,$filiereListe);
                if(!isset($error)) {
                    redirect('c_parametre/liste_opr');
                }
                else
                    echo $error['message'];
            }
            else redirect('c_parametre/ajout_opr');
        }

        public function delete_opr(){
            $this->load->model('M_op');

            $idOpr = $this->input->post('id_opr');

            if($idOpr!='') {
                $error = $this->M_op->deleteOpr($idOpr);
                if(!isset($error))
                    redirect('c_parametre/liste_opr');
                else
                    echo $error['message'];
            }
            else redirect('c_parametre/liste_opr');
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

            $nomUnion = $this->input->post('nom_union');
            $dateCreation = $this->input->post('date_creation');
            $statut = $this->input->post('statut');
            $filiereListe = $this->input->post('filieres');
            $formelle = $this->input->post('formelle');
            $representant = $this->input->post('representant');
            $contact = $this->input->post('contact');
            $siege = $this->input->post('id_fokontany');
            $observation = $this->input->post('observation');
            if($representant=='') $representant=null;
            if(isset($nomUnion) && $nomUnion!='') {
                $error = $this->M_op->insertUnion($siege,$nomUnion,$dateCreation,$statut,$formelle,$representant,$contact,$observation,$filiereListe);
                if(!isset($error)) {
                    redirect('c_parametre/liste_union');
                }
                else
                    echo $error['message'];
            }
            else redirect('c_parametre/ajout_union');
        }

        public function delete_union(){
            $this->load->model('M_op');

            $idUnion = $this->input->post('id_union');

            if($idUnion!='') {
                $error = $this->M_op->deleteUnion($idUnion);
                if(!isset($error))
                    redirect('c_parametre/liste_union');
                else
                    echo $error['message'];
            }
            else redirect('c_parametre/liste_union');
        }

        /*
         * opb
         */

        public function liste_opb(){
            $this->load->model('M_op');

            $data['titre'] = 'Paramétrage';
            $data['contents'] = 'liste_opb';
            $data['opbListe'] = $this->M_op->getOpb();
            $this->load->view('templates',$data);
        }

        public function ajout_opb(){
            $this->load->model('M_zone_intervention');
            $this->load->model('M_filiere');
            $this->load->model('M_appui');

            $data['titre'] = 'Paramétrage';
            $data['contents'] = 'ajout_opb';
            $data['filieres'] = $this->M_filiere->getFilieres();
            $data['regions'] = $this->M_zone_intervention->getRegion();
            $data['catOp'] = $this->M_appui->getCatOp();
            $this->load->view('templates',$data);
        }

        public function insert_opb(){
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
            if($representant=='') $representant=null;
            if(isset($nomOpb) && $nomOpb!='') {
                $error = $this->M_op->insertOpb($siege,$nomOpb,$dateCreation,$statut,$formelle,$representant,$contact,$observation,$filiereListe,$type);
                if(!isset($error)) {
                    redirect('c_parametre/liste_opb');
                }
                else
                    echo $error['message'];
            }
            else redirect('c_parametre/ajout_opb');
        }

        public function delete_opb(){
            $this->load->model('M_op');

            $idOpb = $this->input->post('id_opb');

            if($idOpb!='') {
                $error = $this->M_op->deleteOpb($idOpb);
                if(!isset($error))
                    redirect('c_parametre/liste_opb');
                else
                    echo $error['message'];
            }
            else redirect('c_parametre/liste_opb');
        }

        public function importer_opb(){
            $this->load->model('M_zone_intervention');
            $this->load->model('M_op');

            $file = fopen($_FILES['csv']['tmp_name'], 'r');
            $temp = null;
            while (($data = fgetcsv($file, 1000, ";")) !== FALSE) {
                if($data[0]!=$temp) {
                    $fokontany = $this->M_zone_intervention->getFokontanyByCode($data[0]);
                }
                $date = date('Y-m-d',strtotime($data[2]));
                if($data[2]=='') $date = null;
                $filiereListe = array_filter(explode(',',$data[3]));
//                $error = $this->M_op->insertOpb($fokontany->ID_FOKONTANY,$data[1],$date,null,null,null,null,null,$filiereListe,$data[4]);
                echo count($filiereListe).'<br>';
                if(isset($error)) {
                    echo $error['message'];
                    break;
                }
                $temp=$data[0];
            }
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

            $nomMenage = $this->input->post('nom_menage');
            $surnom = $this->input->post('surnom');
            $sexe = $this->input->post('sexe');
            $typeEaf = $this->input->post('type_eaf');
            $siege = $this->input->post('id_fokontany');
            $filiereListe = $this->input->post('filieres');
            $imf = $this->input->post('imf');

            if(isset($nomMenage) && $nomMenage!='') {
                $error = $this->M_op->insertMenage($siege,$typeEaf,$nomMenage,$surnom,$sexe,$imf,$filiereListe);
                if(!isset($error)) {
                    redirect('c_parametre/liste_menage');
                }
                else
                    echo $error['message'];
            }
            else redirect('c_parametre/ajout_menage');
        }

        /*
         * autre
         */

        public function fiche_op($op,$id){
            $this->load->model('M_op');

            $data['titre'] = 'Paramétrage';
            $data['contents'] = 'fiche_op';
            if(isset($op) && isset($id)) {
                $data['op'] = $op;
                $column='ID_'.$op.' ID_OP, CODE_'.$op.' CODE_OP, NOM_'.$op.' NOM_OP, NOM_REGION, NOM_DISTRICT, NOM_COMMUNE, NOM_FOKONTANY, DATE_CREATION, STATUT, FORMELLE, NOM_MENAGE,CONTACT, OBSERVATION';
                $data['ficheOp'] = $this->M_op->getOpById($op,$id,$column);
                $data['filieres'] = $this->M_op->getOpFiliere($id,$op);

                if($op=='opf') $data['membres'] = $this->M_op->getOpfMembres($id);
                if($op=='opr') $data['membres'] = $this->M_op->getOprMembres($id);
                if($op=='union') $data['membres'] = $this->M_op->getUnionMembres($id);
                if($op=='opb') {
                    $data['membres'] = $this->M_op->getOpbMembres($id);
                }
                $this->load->view('templates', $data);
            }
        }

        public function edit_op($op,$id){
            $this->load->model('M_op');
            $this->load->model('M_filiere');
            $this->load->model('M_zone_intervention');

            $data['titre'] = 'Paramétrage';
            $data['contents'] = 'edit_op';
            if(isset($op) && isset($id)) {
                $data['op'] = $op;
                $column='ID_'.$op.' ID_OP, CODE_'.$op.' CODE_OP, NOM_'.$op.' NOM_OP, NOM_REGION, NOM_DISTRICT, NOM_COMMUNE, zone_intervention.ID_FOKONTANY, NOM_FOKONTANY, DATE_CREATION, STATUT, FORMELLE, NOM_MENAGE,CONTACT, OBSERVATION';
                $data['ficheOp'] = $this->M_op->getOpById($op,$id,$column);
                $data['fil'] = $this->M_op->getOpFiliere($id,$op);
                $data['filieres'] = $this->M_filiere->getFilieres();
                $data['regions'] = $this->M_zone_intervention->getRegion();

                $this->load->view('templates', $data);
            }
        }

        public function update_op($op,$id){
            $this->load->model('M_op');

            $nomOp = $this->input->post('nom_op');
            $dateCreation = $this->input->post('date_creation');
            $statut = $this->input->post('statut');
            $filiereListe = $this->input->post('filieres');
            $formelle = $this->input->post('formelle');
            if($op=='opb') $type = $this->input->post('type_op');
            $representant = $this->input->post('representant');
            $contact = $this->input->post('contact');
            $siege = $this->input->post('id_fokontany');
            $observation = $this->input->post('observation');
            if($representant=='') $representant=null;
            if(isset($nomOp) && $nomOp!='') {
                $error = null;
                if($op=='opf')
                    $error = $this->M_op->updateOpf($siege,$nomOp,$dateCreation,$statut,$formelle,$representant,$contact,$observation,$filiereListe,$id);
                if($op=='opr')
                    $error = $this->M_op->updateOpr($siege,$nomOp,$dateCreation,$statut,$formelle,$representant,$contact,$observation,$filiereListe,$id);
                if($op=='union')
                    $error = $this->M_op->updateUnion($siege,$nomOp,$dateCreation,$statut,$formelle,$representant,$contact,$observation,$filiereListe,$id);
                if($op=='opb')
                    $error = $this->M_op->updateOpb($siege,$nomOp,$dateCreation,$statut,$formelle,$representant,$contact,$observation,$filiereListe,$type,$id);

                if(!isset($error)) {
                    redirect('c_parametre/liste_'.$op);
                }
                else
                    echo $error['message'];
            }
            else redirect('c_parametre/edit_op/'.$op.'/'.$id);
        }

        public function ajout_membre($op,$id){
            $this->load->model('M_op');
            $data['titre'] = 'Paramétrage';
            $column='ID_'.$op.' ID_OP, CODE_'.$op.' CODE_OP, NOM_'.$op.' NOM_OP';
            $data['ficheOp'] = $this->M_op->getOpById($op,$id,$column);
            if($op=='opf')$data['contents'] = 'ajout_membre_opf';
            if($op=='opr')$data['contents'] = 'ajout_membre_opr';
            if($op=='union')$data['contents'] = 'ajout_membre_union';
            if($op=='opb') {
                $data['contents'] = 'ajout_membre_opb';
                $data['fonctions'] = $this->M_op->getMenageFonctions();
            }
            $this->load->view('templates', $data);
        }

        public function insert_opf_membre() {
            $this->load->model('M_op');

            $idOpf = $this->input->post('id_op');
            $membres = array_filter($this->input->post('membres'));
            if($idOpf!='' && sizeof($membres)!=0) {
                $this->M_op->setOprOpf($idOpf,$membres);
                redirect('c_parametre/fiche_op/opf/'.$idOpf.'/#liste_membre');
            }
            else redirect('c_parametre/fiche_op/opf/'.$idOpf.'/#liste_membre');
        }

        public function insert_opr_membre() {
            $this->load->model('M_op');

            $idOpr = $this->input->post('id_op');
            $membres = array_filter($this->input->post('membres'));
            if($idOpr!='' && sizeof($membres)!=0) {
                $this->M_op->insertOprMembre($idOpr,$membres);
                redirect('c_parametre/fiche_op/opr/'.$idOpr.'/#liste_membre');
            }
            else redirect('c_parametre/fiche_op/opr/'.$idOpr.'/#liste_membre');
        }

        public function insert_union_membre() {
            $this->load->model('M_op');

            $idUnion = $this->input->post('id_op');
            $membres = array_filter($this->input->post('membres'));
            if($idUnion!='' && sizeof($membres)!=0) {
                $this->M_op->insertUnionMembre($idUnion,$membres);
                redirect('c_parametre/fiche_op/union/'.$idUnion.'/#liste_membre');
            }
            else redirect('c_parametre/fiche_op/union/'.$idUnion.'/#liste_membre');
        }

        public function insert_opb_membre() {
            $this->load->model('M_op');

            $idOpb = $this->input->post('id_op');
            $membres = $this->input->post('membres');

            if($idOpb!='') {
                $this->M_op->insertOpbMembre($idOpb,$membres);
                redirect('c_parametre/fiche_op/opb/'.$idOpb.'/#liste_membre');
            }
            else redirect('c_parametre/fiche_op/opb/'.$idOpb.'/#liste_membre');
        }

	}