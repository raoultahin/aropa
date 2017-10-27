<?php
	class C_resultat extends CI_Controller {

        public function liste_resultat(){
            if (isset($this->session->user)) {
                $this->load->model('M_resultat');

                $page = intval($this->input->get('page'));
                if (empty($page)) $page = 1;

                $annee = $this->input->get('annee');
                $op = $this->input->get('op');

                $data['titre'] = 'Gestion des résultats';
                $data['contents'] = 'liste_resultat';
                $data['anneeListe'] = $this->M_resultat->getAnneeListe();
                $data['resultatListe'] = [];
                if ($op != '') {
                    $data['op'] = $op;
                    $data['resultatTotal'] = count($this->M_resultat->getResultatListe($annee, $op));
                    $data['resultatListe'] = $this->M_resultat->getResultatListe($annee, $op, $page);
                }
                $this->load->view('templates', $data);
            }
            else redirect('c_login');
        }

        public function choisir_opb(){
            if (isset($this->session->user)) {
                $this->load->model('M_zone_intervention');
                $this->load->model('M_op');

                $column = 'ID_OPB,CODE_OPB,NOM_OPB, NOM_REGION, NOM_DISTRICT, NOM_COMMUNE, NOM_FOKONTANY';

                $data['titre'] = 'Gestion des résultats';
                $data['regions'] = $this->M_zone_intervention->getRegion();
                $data['opbListe'] = $this->M_op->getOp('opb', $column);
                $data['contents'] = 'new_resultat';

                $this->load->view('templates', $data);
            }
            else redirect('c_login');
        }

        public function new_resultat($id){
            if (isset($this->session->user)) {
                $this->load->model('M_op');
                $this->load->model('M_filiere');

                $data['titre'] = 'Gestion des résultats';
                $data['contents'] = 'form_resultat';
                $data['id'] = $id;
                $data['opb'] = $this->M_op->getOpById('opb', $id, 'ID_OPB ID_OP,CODE_OPB,NOM_OPB');
                $data['filieres'] = $this->M_filiere->getObpFiliere($id);
                $this->load->view('templates', $data);
            }
            else redirect('c_login');
        }

        public function ajout_resultat(){
            if (isset($this->session->user)) {
                $this->load->model('M_resultat');

                $idOpb = $this->input->post('id_opb');
                $idFiliere = $this->input->post('id_filiere');
                $numCampagne = $this->input->post('campagne');
                $annee = $this->input->post('annee');
                $dateCollecte = $this->input->post('date_collecte');

                $membres = $this->input->post('membres');

                if ($idOpb != '' && $idFiliere != '' && $numCampagne != '' && $annee != '' && $dateCollecte != '') {
                    $this->M_resultat->insertCampagne($idOpb, $idFiliere, $numCampagne, $annee, $dateCollecte, $membres);
                    redirect('c_resultat/liste_resultat');
                }
            }
            else redirect('c_login');
        }

        public function fiche_resultat($annee,$op){
            if (isset($this->session->user)) {
                $this->load->model('M_resultat');

                $id = $this->input->get('id');
                $idFiliere = $this->input->get('filiere');
                $campagne = $this->input->get('campagne');
                if ($id != '' && $id != null && is_numeric($id) && $idFiliere != '' && $idFiliere != null && is_numeric($idFiliere) && $campagne != '' && $campagne != null && is_numeric($campagne)) {
                    $data['titre'] = 'Gestion des résultats';
                    $data['contents'] = 'fiche_resultat';
                    $data['id'] = $id;
                    $data['op'] = $op;
                    $data['fiche'] = $this->M_resultat->getFicheResultat($op, $id, $annee, $idFiliere, $campagne);
                    $this->load->view('templates', $data);
                }
            }
            else redirect('c_login');
        }

	}