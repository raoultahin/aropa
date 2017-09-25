<?php
	class M_resultat extends CI_Model {

        public function getResultatListe($annee,$op){
            if($annee!='tous' && $annee!='' && $annee!=null){
                if($op=='opb'){
                    $this->db->select('opb.ID_OPB ID_OP,CODE_OPB CODE_OP,NOM_OPB NOM_OP,ANNEE,NOM_FOKONTANY,NOM_COMMUNE,NOM_DISTRICT,NOM_REGION');
                    $this->db->from('campagnes_opb');
                    $this->db->join('opb','opb.ID_OPB = campagnes_opb.ID_OPB');
                    $this->db->join('zone_intervention','zone_intervention.ID_FOKONTANY = opb.ID_FOKONTANY');
                    $this->db->group_by('opb.ID_OPB,CODE_OPB,NOM_OPB,ANNEE,NOM_FOKONTANY,NOM_COMMUNE,NOM_DISTRICT,NOM_REGION');
                    $this->db->where('annee',$annee);
                    return $this->db->get()->result();
                }
            }
            else{
                if($op=='opb'){
                    $this->db->select('opb.ID_OPB ID_OP,CODE_OPB CODE_OP,NOM_OPB NOM_OP,ANNEE,NOM_FOKONTANY,NOM_COMMUNE,NOM_DISTRICT,NOM_REGION');
                    $this->db->from('campagnes_opb');
                    $this->db->join('opb','opb.ID_OPB = campagnes_opb.ID_OPB');
                    $this->db->join('zone_intervention','zone_intervention.ID_FOKONTANY = opb.ID_FOKONTANY');
                    $this->db->group_by('opb.ID_OPB,CODE_OPB,NOM_OPB,ANNEE,NOM_FOKONTANY,NOM_COMMUNE,NOM_DISTRICT,NOM_REGION');
                    return $this->db->get()->result();
                }
            }
            return null;
        }

        public function getAnneeListe(){
            $this->db->select('ANNEE');
            $this->db->from('campagnes_opb');
            $this->db->group_by('annee');
            return $this->db->get()->result();
        }

        public function insertCampagne($idOpb,$idFiliere,$numCampagne,$annee,$dateCollecte,$membres){
            foreach($membres as $membre){
                if($membre['id'] != '') {
                    $data = array(
                        'ID_OPB' => $idOpb,
                        'ID_FILIERE' => $idFiliere,
                        'ID_MENAGE' => $membre['id'],
                        'NUM_CAMPAGNE' => $numCampagne,
                        'SUPERFICIE' => $membre['superficie'],
                        'QTE_PRODUITE' => $membre['qte_produite'],
                        'QTE_COMMERCIALISEE' => $membre['qte_com'],
                        'MONTANT' => $membre['montant'],
                        'ANNEE' => $annee,
                        'DATE_COLLECTE' => $dateCollecte,
                        'DATE_SAISIE' => date("Y-m-d")
                    );

                    $this->db->insert('campagnes_opb', $data);
                }
            }
        }

        public function getFicheResultatBy($op,$idOp,$annee){
            if($op=='opb') return $this->getFicheResultatByOpb($idOp,$annee);
        }

        public function getFicheResultatByOpb($idOpb,$annee){
            $this->db->select('opb.ID_OPB ID_OP,CODE_OPB CODE_OP,NOM_OPB NOM_OP,NOM_FILIERE,NUM_CAMPAGNE,CODE_MENAGE,NOM_MENAGE,SURNOM,SUPERFICIE,QTE_PRODUITE,QTE_COMMERCIALISEE,MONTANT,ANNEE,DATE_COLLECTE');
            $this->db->from('campagnes_opb');
            $this->db->join('opb','opb.ID_OPB = campagnes_opb.ID_OPB');
            $this->db->join('filieres','filieres.ID_FILIERE = campagnes_opb.ID_FILIERE');
            $this->db->join('menages','menages.ID_MENAGE = campagnes_opb.ID_MENAGE');
            $this->db->where('opb.ID_OPB',$idOpb);
            $this->db->where('annee',$annee);
            return $this->db->get()->result();
        }
	}