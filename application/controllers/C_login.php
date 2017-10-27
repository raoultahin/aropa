<?php
	class C_login extends CI_Controller {

        public function index(){

            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');

            $this->load->model('M_user');

            $this->form_validation->set_rules('username', 'Nom d\'utilisateur', 'required');
            $this->form_validation->set_rules('mdp', 'Mot de passe', 'required');

            if ($this->form_validation->run()){
                $mail = $this->input->post('username');
                $mdp = $this->input->post('mdp');

                $user = $this->M_user->countUser($mail, $mdp);
                $i = count($user);

                if ($i==1) {
                    $user = $this->M_user->getUserById($user[0]->ID_USER);
                    $this->session->set_userdata('user', $user[0]);
                    redirect('c_sortie');
                }
                else {
                    $data['error'] = 'Nom d\'utilisateur ou Mot de passe Erroné';
                    $this->load->view('login', $data);
                }
            }
            else {
                $data['error'] = "";
                $this->load->view('login',$data);
            }
        }

        public function logout(){
            $this->session->sess_destroy();
            redirect();
        }

	}