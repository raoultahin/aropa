<?php
	class M_filiere extends CI_Model
    {

        public function getFilieres(){
            $query = $this->db->get("filieres");
            return $query->result();
        }

        public function getObpFiliere($idOpb){
            $this->db->select('filieres.ID_FILIERE, NOM_FILIERE');
            $this->db->from('opb');
            $this->db->join('opb_filieres','opb.ID_OPB = opb_filieres.ID_OPB');
            $this->db->join('filieres','filieres.ID_FILIERE = opb_filieres.ID_FILIERE');
            $this->db->where('opb.ID_OPB',$idOpb);
            return $this->db->get()->result();
        }

    }