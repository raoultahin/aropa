<?php
	class C_resultat extends CI_Controller {

        public function liste_resultat(){
            $this->load->model('M_resultat');

            $data['titre'] = 'Gestion des résultats';
            $data['contents'] = 'liste_resultat';
            $data['resutatListe'] = $this->M_resultat->getResultatListe();
            $this->load->view('templates',$data);
        }

        public function choisir_opb(){
            $this->load->model('M_zone_intervention');
            $this->load->model('M_op');

            $column='ID_OPB,CODE_OPB,NOM_OPB, NOM_REGION, NOM_DISTRICT, NOM_COMMUNE, NOM_FOKONTANY';

            $data['titre'] = 'Gestion des résultats';
            $data['regions'] = $this->M_zone_intervention->getRegion();
            $data['opbListe'] = $this->M_op->getOp('opb',$column);
            $data['contents'] = 'new_resultat';

            $this->load->view('templates',$data);
        }

        public function new_resultat($id){
            $this->load->model('M_op');

            $data['titre'] = 'Gestion des résultats';
            $data['contents'] = 'form_resultat';
            $data['id'] = $id;
            $data['opb'] = $this->M_op->getOpById('opb',$id,'ID_OPB ID_OP,CODE_OPB,NOM_OPB');
            $this->load->view('templates',$data);
        }

	}