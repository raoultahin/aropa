<?php
	class M_user extends CI_Model
    {

        public function getUserById($id){
            $this->db->select('*');
            $this->db->from('users');
            $this->db->join('user_region','user_region.ID_USER = users.ID_USER');
            $this->db->where('users.ID_USER',$id);
            return $this->db->get()->result();
        }

        public function countUser($username,$mdp){
            $this->db->select('ID_USER');
            $this->db->from('users');
            $this->db->where('USERNAME',$username);
            $this->db->where('MDP',$mdp);
            return $this->db->get()->result();
        }

        public function getOpfFiliere($idOpf){
            $this->db->select('filieres.ID_FILIERE, NOM_FILIERE');
            $this->db->from('opf');
            $this->db->join('opf_filieres','opf.ID_OPF = opf_filieres.ID_OPF');
            $this->db->join('filieres','filieres.ID_FILIERE = opf_filieres.ID_FILIERE');
            $this->db->where('opf.ID_OPF',$idOpf);
            return $this->db->get()->result();
        }

        public function getOprFiliere($idOpr){
            $this->db->select('filieres.ID_FILIERE, NOM_FILIERE');
            $this->db->from('opr');
            $this->db->join('opr_filieres','opr.ID_OPR = opr_filieres.ID_OPR');
            $this->db->join('filieres','filieres.ID_FILIERE = opr_filieres.ID_FILIERE');
            $this->db->where('opr.ID_OPR',$idOpr);
            return $this->db->get()->result();
        }

        public function getUnionFiliere($idUnion){
            $this->db->select('filieres.ID_FILIERE, NOM_FILIERE');
            $this->db->from('tab_union');
            $this->db->join('union_filieres','tab_union.ID_UNION = union_filieres.ID_UNION');
            $this->db->join('filieres','filieres.ID_FILIERE = union_filieres.ID_FILIERE');
            $this->db->where('tab_union.ID_UNION',$idUnion);
            return $this->db->get()->result();
        }

        public function getOpbFiliere($idOpb){
            $this->db->select('filieres.ID_FILIERE, NOM_FILIERE');
            $this->db->from('opb');
            $this->db->join('opb_filieres','opb.ID_OPB = opb_filieres.ID_OPB');
            $this->db->join('filieres','filieres.ID_FILIERE = opb_filieres.ID_FILIERE');
            $this->db->where('opb.ID_OPB',$idOpb);
            return $this->db->get()->result();
        }

    }