<?php
	class C_appui extends CI_Controller {

		public function appui_opb($id=''){
			$this->load->model('M_zone_intervention');

			$data['titre']= 'Gestion des appuis';

            if($id=='') {
                $data['regions'] = $this->M_zone_intervention->getRegion();
                $data['contents'] = 'new_appui_opb';

                $this->load->view('templates', $data);
            }
            else {
                $data['contents'] = 'fiche_appui_opb';

                $this->load->view('templates', $data);
            }
		}


		public function fiche($id=""){
			$this->load->model('Stud_model');
			$data['records'] = $this->Stud_model->fiche($id);

			$data['contents']= 'fiche_views';

			$this->load->view('templates',$data);
		}
	}