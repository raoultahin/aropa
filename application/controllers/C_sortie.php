<?php
	class C_sortie extends CI_Controller {

        public function index(){
            $this->load->model('M_sortie');

            $data['titre'] = 'Accueil';
            $data['contents'] = 'dashboard';

            $this->load->view('templates',$data);
        }

        public function detail_opb(){
            $this->load->model('M_sortie');

            $data['titre'] = 'Accueil';
            $data['contents'] = 'detail_opb_resultat_appui';
            $data['detailOpb'] = $this->M_sortie->getTabOpb('2017');

            $this->load->view('templates',$data);
        }

        public function export_detail_opb(){
            $this->load->model('M_sortie');
            $this->load->helper('download');

            $temp = fopen('php://output', 'w');
            fwrite($temp,'REGION;DISTRICT;COMMUNE;OPF;OPR;UNION;OPB;BENEFICIAIRE;SEXE (H);SEXE (F);EAF 1;EAF 2;EAF 3;FILIERE;SUPERFICIE;QTE PRODUITE;QTE COMMERCIALISEE;MONTANT;APPUI TECHNIQUE;INTRANTS ET PETITS MATERIELS;EQUIPEMENTS;INFRASTRUCTURE;APPUIS CONSEILS;STRUCTURATION;FORMATION');
            $detailOpb = $this->M_sortie->getTabOpb('2017');
            foreach($detailOpb as $detail){
                fwrite($temp,PHP_EOL);
                fwrite($temp,$detail->NOM_REGION.';');
                fwrite($temp,$detail->NOM_DISTRICT.';');
                fwrite($temp,$detail->NOM_COMMUNE.';');
                fwrite($temp,$detail->NOM_OPF.';');
                fwrite($temp,$detail->NOM_OPR.';');
                fwrite($temp,$detail->NOM_UNION.';');
                fwrite($temp,$detail->NOM_OPB.';');
                fwrite($temp,$detail->NB_EAF.';');
                fwrite($temp,$detail->NB_H.';');
                fwrite($temp,$detail->NB_F.';');
                fwrite($temp,$detail->EAF_1.';');
                fwrite($temp,$detail->EAF_2.';');
                fwrite($temp,$detail->EAF_3.';');
                fwrite($temp,$detail->NOM_FILIERE.';');
                fwrite($temp,$detail->SUPERFICIE.';');
                fwrite($temp,$detail->QTE_PRODUITE.';');
                fwrite($temp,$detail->QTE_COMMERCIALISEE.';');
                fwrite($temp,$detail->MONTANT.';');
                fwrite($temp,$detail->APPUI_TECHNIQUE.';');
                fwrite($temp,$detail->INTRANT.';');
                fwrite($temp,$detail->EQUIPEMENT.';');
                fwrite($temp,$detail->INFRASTRUCTURE.';');
                fwrite($temp,$detail->CONSEILS.';');
                fwrite($temp,$detail->STRUCTURATION.';');
                fwrite($temp,$detail->FORMATION.';');
            }
            fclose($temp);

            $data = file_get_contents('php://output');
            $name = 'detail_appui_resultat.csv';

            // Build the headers to push out the file properly.
            header('Pragma: public');     // required
            header('Expires: 0');         // no cache
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Cache-Control: private',false);
            header('Content-Disposition: attachment; filename="'.basename($name).'"');  // Add the file name
            header('Content-Transfer-Encoding: binary');
            header('Connection: close');
            exit();

            force_download($name,$data);
        }

	}