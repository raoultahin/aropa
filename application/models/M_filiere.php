<?php
	class M_filiere extends CI_Model
    {

        public function getFilieres(){
            $query = $this->db->get("filieres");
            return $query->result();
        }

    }