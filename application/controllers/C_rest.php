<?php
	class C_rest extends CI_Controller {

        //menages
        public function liste_menage(){
            if (isset($this->session->user)) {
                $this->load->model('M_op');
                $data['menages'] = $this->M_op->getMenages();

                echo json_encode($data['menages']);
            }
            else redirect('c_login');
        }

        //membre opf
        public function liste_opr(){
            if (isset($this->session->user)) {
                $this->load->model('M_op');
                $data['oprListe'] = $this->M_op->getOprByOpfNull();

                echo json_encode($data['oprListe']);
            }
            else redirect('c_login');
        }

        //membre opr
        public function liste_opb_and_union($idOpr){
            if (isset($this->session->user)) {
                $this->load->model('M_op');
                $data['opbUnionListe'] = $this->M_op->getOpbUnionListeNotIn($idOpr);

                echo json_encode($data['opbUnionListe']);
            }
            else redirect('c_login');
        }

        //membre union
        public function membre_union($idUnion){
            if (isset($this->session->user)) {
                $this->load->model('M_op');
                $data['opbListe'] = $this->M_op->getOpbListeNotIn($idUnion);

                echo json_encode($data['opbListe']);
            }
            else redirect('c_login');
        }

        //ajout membre opb
        public function liste_eaf($idOpb){
            if (isset($this->session->user)) {
                $this->load->model('M_op');
                $data['eafListe'] = $this->M_op->getEafListeNotIn($idOpb);

                echo json_encode($data['eafListe']);
            }
            else redirect('c_login');
        }

        //membre opb (campagne)
        public function liste_eaf_membre($idOpb){
            if (isset($this->session->user)) {
                $this->load->model('M_op');
                $data['eafListe'] = $this->M_op->getOpbMembres($idOpb);

                echo json_encode($data['eafListe']);
            }
            else redirect('c_login');
        }

	}