<?php
	class M_zone_intervention extends CI_Model {

        //region
        public function getRegion(){
            $query = $this->db->get("regions");
            return $query->result();
        }

        public function insertRegion($codeRegion, $nomRegion){
            $data = array(
                'code_region' => $codeRegion,
                'nom_region' => $nomRegion
            );
            $this->db->insert('regions', $data);
        }

        public function updateRegion($idRegion,$codeRegion, $nomRegion){
            $data = array(
                'code_region' => $codeRegion,
                'nom_region' => $nomRegion
            );

            if(! $this->db->update('regions', $data, "id_region = " . $idRegion)) {
                return $this->db->error();
            }
        }

        public function deleteRegion($idRegion){
            if(! $this->db->delete('regions',"id_region = " . $idRegion)) {
                return $this->db->error();
            }
        }

        //district
        public function getDistrict(){
            $query = $this->db->get("districts");
            return $query->result();
        }

        public function getDistrictByRegion($idRegion){
            $query = $this->db->get_where('districts', array('id_region' => $idRegion));
            return $query->result();
        }

        public function insertDistrict($idRegion,$codeDistrict, $nomDistrict){
            $data = array(
                'id_region' => $idRegion,
                'code_district' => $codeDistrict,
                'nom_district' => $nomDistrict
            );
            if(! $this->db->insert('districts', $data)){
                return $this->db->error();
            }
        }

        public function updateDistrict($idDistrict,$idRegion,$codeDistrict, $nomDistrict){
            $data = array(
                'id_region' => $idRegion,
                'code_district' => $codeDistrict,
                'nom_district' => $nomDistrict
            );

            if(! $this->db->update('districts', $data, "id_district = " . $idDistrict)) {
                return $this->db->error();
            }
        }

        public function deleteDistrict($idDistrict){
            if(! $this->db->delete('districts',"id_district = " . $idDistrict)) {
                return $this->db->error();
            }
        }

        //commune
        public function getCommune(){
            $query = $this->db->get("communes");
            return $query->result();
        }

        public function getCommuneByDistrict($idDistrict){
            $query = $this->db->get_where('communes', array('id_district' => $idDistrict));
            return $query->result();
        }

        public function insertCommune($idDistrict,$codeCommune, $nomCommune){
            $data = array(
                'id_district' => $idDistrict,
                'code_commune' => $codeCommune,
                'nom_commune' => $nomCommune
            );
            if(! $this->db->insert('communes', $data)){
                return $this->db->error();
            }
        }

        public function updateCommune($idCommune,$idDistrict,$codeCommune, $nomCommune){
            $data = array(
                'id_district' => $idDistrict,
                'code_commune' => $codeCommune,
                'nom_commune' => $nomCommune
            );

            if(! $this->db->update('communes', $data, "id_commune = " . $idCommune)) {
                return $this->db->error();
            }
        }

        public function deleteCommune($idCommune){
            if(! $this->db->delete('communes',"id_commune = " . $idCommune)) {
                return $this->db->error();
            }
        }

        //fokontany
        public function getFokontany(){
            $query = $this->db->get("fokontany");
            return $query->result();
        }

        public function getFokontanyByCommune($idCommune){
            $query = $this->db->get_where('fokontany', array('id_commune' => $idCommune));
            return $query->result();
        }

        public function insertFokontany($idCommune,$codeFokontany, $nomFokontany){
            $data = array(
                'id_commune' => $idCommune,
                'code_fokontany' => $codeFokontany,
                'nom_fokontany' => $nomFokontany
            );
            if(! $this->db->insert('fokontany', $data)){
                return $this->db->error();
            }
        }

        public function updateFokontany($idFokontany,$idCommune,$codeFokontany, $nomFokontany){
            $data = array(
                'id_commune' => $idCommune,
                'code_fokontany' => $codeFokontany,
                'nom_fokontany' => $nomFokontany
            );

            if(! $this->db->update('fokontany', $data, "id_fokontant = " . $idFokontany)) {
                return $this->db->error();
            }
        }

        public function deleteFokontany($idFokontany){
            if(! $this->db->delete('fokontany',"id_fokontany = " . $idFokontany)) {
                return $this->db->error();
            }
        }

        public function getZoneInterventionByIdFkt($idFkt){
            $query = $this->db->get_where('zone_intervention', array('id_fokontany' =>$idFkt));
            return $query->row();
        }

	}