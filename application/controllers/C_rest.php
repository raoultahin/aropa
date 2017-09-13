<?php
	class C_rest extends CI_Controller {

        //menages
        public function liste_menage(){
            $this->load->model('M_op');
            $data['menages'] = $this->M_op->getMenages();

            echo json_encode($data['menages']);
        }

        //membre opf
        public function liste_opr(){
            $this->load->model('M_op');
            $data['oprListe'] = $this->M_op->getOprByOpfNull();

            echo json_encode($data['oprListe']);
        }

        //membre opr
        public function liste_opb_and_union($idOpr){
            $this->load->model('M_op');
            $data['opbUnionListe'] = $this->M_op->getOpbUnionListeNotIn($idOpr);

            echo json_encode($data['opbUnionListe']);
        }

        //membre union
        public function liste_opb($idUnion){
            $this->load->model('M_op');
            $data['opbListe'] = $this->M_op->getOpbListeNotIn($idUnion);

            echo json_encode($data['opbListe']);
        }

        //membre opb
        public function liste_eaf($idOpb){
            $this->load->model('M_op');
            $data['eafListe'] = $this->M_op->getEafListeNotIn($idOpb);

            echo json_encode($data['eafListe']);
        }

	}