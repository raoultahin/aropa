<?php
	class M_op extends CI_Model {

        //opf
        public function getOpf(){
            return null;
        }

        public function insertOpf($idFokontany,$codeOpf,$nomOpf,$dateCreation,$statut,$formelle,$representant,$contact,$observation,$filiereListe){
            $data = array(
                'id_fokontany' => $idFokontany,
                'code_opf' => $codeOpf,
                'nom_opf' => $nomOpf,
                'date_creation' => $dateCreation,
                'statut' => $statut,
                'formelle' => $formelle,
                'representant' => $representant,
                'contact' => $contact,
                'observation' => $observation
            );
            if(! $this->db->insert('opf', $data)){
                return $this->db->error();
            }
            return $this->insertOpfFilieres($this->db->insert_id(),$filiereListe);
        }

        public function insertOpfFilieres($idOpf,$filiereListe){
            if(isset($filiereListe) && count($filiereListe)!=0) {
                foreach ($filiereListe as $idFiliere) {
                    $data = array(
                        'id_opf' => $idOpf,
                        'id_filiere' => $idFiliere
                    );
                    if(! $this->db->insert('opf_filieres', $data)){
                        return $this->db->error();
                    }
                }
            }
        }

        //opr
        public function getOpr(){
            return null;
        }

        public function insertOpr($idFokontany,$codeOpr,$nomOpr,$dateCreation,$statut,$formelle,$representant,$contact,$observation,$filiereListe){
            $data = array(
                'id_fokontany' => $idFokontany,
                'code_opr' => $codeOpr,
                'nom_opr' => $nomOpr,
                'date_creation' => $dateCreation,
                'statut' => $statut,
                'formelle' => $formelle,
                'representant' => $representant,
                'contact' => $contact,
                'observation' => $observation
            );
            if(! $this->db->insert('opr', $data)){
                return $this->db->error();
            }
            return $this->insertOprFilieres($this->db->insert_id(),$filiereListe);
        }

        public function insertOprFilieres($idOpr,$filiereListe){
            if(isset($filiereListe) && count($filiereListe)!=0) {
                foreach ($filiereListe as $idFiliere) {
                    $data = array(
                        'id_opr' => $idOpr,
                        'id_filiere' => $idFiliere
                    );
                    if(! $this->db->insert('opr_filieres', $data)){
                        return $this->db->error();
                    }
                }
            }
        }

        //UNION
        public function getUnion(){
            return null;
        }

        public function insertUnion($idFokontany,$codeUnion,$nomUnion,$dateCreation,$statut,$formelle,$representant,$contact,$observation,$filiereListe){
            $data = array(
                'id_fokontany' => $idFokontany,
                'code_union' => $codeUnion,
                'nom_union' => $nomUnion,
                'date_creation' => $dateCreation,
                'statut' => $statut,
                'formelle' => $formelle,
                'representant' => $representant,
                'contact' => $contact,
                'observation' => $observation
            );
            if(! $this->db->insert('tab_union', $data)){
                return $this->db->error();
            }
            return $this->insertUnionFilieres($this->db->insert_id(),$filiereListe);
        }

        public function insertUnionFilieres($idUnion,$filiereListe){
            if(isset($filiereListe) && count($filiereListe)!=0) {
                foreach ($filiereListe as $idFiliere) {
                    $data = array(
                        'id_union' => $idUnion,
                        'id_filiere' => $idFiliere
                    );
                    if(! $this->db->insert('union_filieres', $data)){
                        return $this->db->error();
                    }
                }
            }
        }

        //OPB
        public function getOPB(){
            return null;
        }

        public function insertOpb($idFokontany,$codeOpb,$nomOpb,$dateCreation,$statut,$formelle,$representant,$contact,$observation,$filiereListe){
            $data = array(
                'id_fokontany' => $idFokontany,
                'code_opb' => $codeOpb,
                'nom_opb' => $nomOpb,
                'date_creation' => $dateCreation,
                'statut' => $statut,
                'formelle' => $formelle,
                'representant' => $representant,
                'contact' => $contact,
                'observation' => $observation
            );
            if(! $this->db->insert('opb', $data)){
                return $this->db->error();
            }
            return $this->insertOpbFilieres($this->db->insert_id(),$filiereListe);
        }

        public function insertOpbFilieres($idOpb,$filiereListe){
            if(isset($filiereListe) && count($filiereListe)!=0) {
                foreach ($filiereListe as $idFiliere) {
                    $data = array(
                        'id_opb' => $idOpb,
                        'id_filiere' => $idFiliere
                    );
                    if(! $this->db->insert('opb_filieres', $data)){
                        return $this->db->error();
                    }
                }
            }
        }

        //Ménages
        public function getMenages(){
            $query = $this->db->get("menages");
            return $query->result() ;
        }

        public function insertMenage($idFokontany,$type,$codeMenage,$nomMenage,$surnom,$sexe,$imf,$filiereListe){
            $data = array(
                'id_fokontany' => $idFokontany,
                'type' => $type,
                'code_menage' => $codeMenage,
                'nom_menage' => $nomMenage,
                'surnom' => $surnom,
                'sexe' => $sexe,
                'imf' => $imf
            );
            if(! $this->db->insert('menages', $data)){
                return $this->db->error();
            }
            return $this->insertMenageFilieres($this->db->insert_id(),$filiereListe);
        }

        public function insertMenageFilieres($idMenage,$filiereListe){
            if(isset($filiereListe) && count($filiereListe)!=0) {
                foreach ($filiereListe as $idFiliere) {
                    $data = array(
                        'id_menage' => $idMenage,
                        'id_filiere' => $idFiliere
                    );
                    if(! $this->db->insert('menages_filieres', $data)){
                        return $this->db->error();
                    }
                }
            }
        }
	}