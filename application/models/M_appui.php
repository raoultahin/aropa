<?php
	class M_appui extends CI_Model {

        public function getAppuiListe(){
            if(!empty($page)){
                $skip = ($page * 20)-20;
                $query = $this->db->query('SELECT * FROM appui_opf UNION SELECT * FROM appui_opr UNION SELECT * FROM appui_union UNION SELECT * FROM appui_opb ORDER BY DATE_SAISIE DESC LIMIT '.$skip.',20');
                return $query->result();
            }
            $query = $this->db->query('SELECT * FROM appui_opf UNION SELECT * FROM appui_opr UNION SELECT * FROM appui_union UNION SELECT * FROM appui_opb ORDER BY DATE_SAISIE DESC');
            return $query->result();
        }

        public function getAppuiEafListe(){
            $this->db->select('*');
            $this->db->from('appui_menage');
            $this->db->join('menages','appui_menage.ID_MENAGE = menages.ID_MENAGE');
            $this->db->join('detail_formation','detail_formation.ID_FORMATION = appui_menage.ID_FORMATION','LEFT');
            $this->db->order_by('DATE_SAISIE','DESC');
            $query = $this->db->get();
            return $query->result();
        }

        public function getAppuiOpById($id){
            $this->db->select('*');
            $this->db->from('appui_op');
            $this->db->join('details_appui','details_appui.ID_DETAIL = appui_op.ID_DETAIL','left');
            $this->db->where('id_appui_op',$id);
            $query = $this->db->get();
            return $query->row();
        }

        public function getAppuiEafById($id){
            $query = $this->db->get_where('appui_menage', array('id_appui_menage' => $id));
            return $query->row();
        }

        public function getOpByAppui($appui){
            if($appui->TYPE_OP==1){ //OPF
                $this->db->select('ID_OPF ID_OP, CODE_OPF CODE_OP, NOM_OPF NOM_OP');
                $query = $this->db->get_where('opf', array('id_opf' => $appui->ID_OP));
                return $query->row();
            }
            if($appui->TYPE_OP==2){ //OPR
                $this->db->select('ID_OPR ID_OP, CODE_OPR CODE_OP, NOM_OPR NOM_OP');
                $query = $this->db->get_where('opr', array('id_opr' => $appui->ID_OP));
                return $query->row();
            }
            if($appui->TYPE_OP==3){ //UNION
                $this->db->select('ID_UNION ID_OP, CODE_UNION CODE_OP, NOM_UNION NOM_OP');
                $query = $this->db->get_where('tab_union', array('id_union' => $appui->ID_OP));
                return $query->row();
            }
            if($appui->TYPE_OP==4){ //OPB
                $this->db->select('ID_OPB ID_OP, CODE_OPB CODE_OP, NOM_OPB NOM_OP');
                $query = $this->db->get_where('opb', array('id_opb' => $appui->ID_OP));
                return $query->row();
            }
        }

        //mecanisme
        public function getMecanisme(){
            $query = $this->db->get("mecanisme");
            return $query->result();
        }

        public function getMecanismeById($id){
            $query = $this->db->get_where('mecanisme', array('id_mecanisme' =>$id));
            return $query->row();
        }

        //type_appui
        public function getTypeAppui(){
            $query = $this->db->get("type_appui");
            return $query->result();
        }

        public function getTypeAppuiById($id){
            $query = $this->db->get_where('type_appui', array('id_type' =>$id));
            return $query->row();
        }

        //cat_op
        public function getCatOp(){
            $query = $this->db->get("cat_op");
            return $query->result();
        }

        public function getCatOpById($id){
            $query = $this->db->get_where('cat_op', array('id_cat_op' =>$id));
            return $query->row();
        }

        //details_appui
        public function insertDetailAppui($idFiliere,$dateFinancement,$montant){
            $data = array(
                'id_filiere' => $idFiliere,
                'date_financement' => $dateFinancement,
                'montant' => $montant
            );
            if(! $this->db->insert('details_appui', $data)){
                return $this->db->error();
            }
        }

        public function getDetailAppuiById($id){
            $this->db->select('*');
            $this->db->from('details_appui');
            $this->db->join('filieres', 'filieres.id_filiere = details_appui.id_filiere','left');
            $this->db->where('id_detail', $id);
            $query = $this->db->get();
            return $query->row();
        }

        //formation
        public function insertFormation($idFokontany,$theme,$dateDebut,$dateFin){
            $data = array(
                'id_fokontany' => $idFokontany,
                'theme' => $theme,
                'date_debut' => $dateDebut,
                'date_fin' => $dateFin
            );
            if(! $this->db->insert('detail_formation', $data)){
                return $this->db->error();
            }
        }

        public function getFormationById($id){
            $query = $this->db->get_where('detail_formation', array('id_formation' =>$id));
            return $query->row();
        }

        //mecanisme
        public function insertMecanisme($mecanisme){
            $data = array(
                'libelle' => $mecanisme
            );
            if (!$this->db->insert('mecanisme', $data)) {
                return $this->db->error();
            }
        }

        //cat_op
        public function insertCatOp($catOp){
            $data = array(
                'libelle' => $catOp
            );
            if (!$this->db->insert('cat_op', $data)) {
                return $this->db->error();
            }
        }

        //ajout_appui
        public function ajoutAppui($idFiliere,$dateFinancement,$montant,$idFokontany,$theme,$dateDebut,$dateFin,$idMecanisme,$autreMec,$idCatOp,$autreCat,$idParent,$idType,$typeOp,$idOp,$description,$objetNature,$qte,$unite,$dateCollecte){
            $this->db->trans_begin();

            $this->insertDetailAppui($idFiliere,$dateFinancement,$montant);
            $idDetail = $this->db->insert_id();
            $idFormation = null;
            if($theme!='') {
                $this->insertFormation($idFokontany, $theme, $dateDebut, $dateFin);
                $idFormation = $this->db->insert_id();
            }
            if($idMecanisme==''){
                $idMecanisme = null;
                if($autreMec!=null) {
                    $this->insertMecanisme($autreMec);
                    $idMecanisme = $this->db->insert_id();
                }
            }
            if($idCatOp==''){
                $idCatOp = null;
                if($autreCat!=null) {
                    $this->insertCatOp($autreCat);
                    $idCatOp = $this->db->insert_id();
                }
            }

            $data = array(
                'id_detail' => $idDetail,
                'id_formation' => $idFormation,
                'id_mecanisme' => $idMecanisme,
                'id_cat_op' => $idCatOp,
                'id_parent' => $idParent,
                'id_type' => $idType,
                'type_op' => $typeOp,
                'id_op' => $idOp,
                'description' => $description,
                'objet_nature' => $objetNature,
                'qte' => $qte,
                'unite' => $unite,
                'date_collecte' => $dateCollecte,
                'date_saisie' => date("Y-m-d h:i:s")

            );
            $this->db->insert('appui_op', $data);
            if ($this->db->trans_status() === FALSE)
            {
                var_dump($this->db->error);
                $this->db->trans_rollback();
            }
            else
            {
                $this->db->trans_commit();
            }
            return $this->db->trans_complete();

        }

        public function ajoutAppuiEaf($idFokontany,$theme,$dateDebut,$dateFin,$idParent,$idEaf,$objetNature,$qte,$unite,$dateCollecte){
            $this->db->trans_begin();

            $idFormation = null;
            if($theme!='' && $theme!=null) {
                $this->insertFormation($idFokontany, $theme, $dateDebut, $dateFin);
                $idFormation = $this->db->insert_id();
            }
            $data = array(
                'id_menage' => $idEaf,
                'id_parent' => $idParent,
                'id_formation' => $idFormation,
                'objet_nature' => $objetNature,
                'qte' => $qte,
                'unite' => $unite,
                'date_collecte' => $dateCollecte,
                'date_saisie' => date("Y-m-d h:i:s")
            );
            $this->db->insert('appui_menage', $data);
            if ($this->db->trans_status() === FALSE)
            {
                var_dump($this->db->error);
                $this->db->trans_rollback();
            }
            else
            {
                $this->db->trans_commit();
                return $this->db->trans_complete();
            }
        }

        public function getBeneficiaireById($id){
            $query = $this->db->get_where('appui_op', array('id_parent' => $id));
            return $query->result();
        }

        public function getEafBeneficiaireById($id){
            $this->db->select('*');
            $this->db->from('appui_menage');
            $this->db->join('menages','appui_menage.ID_MENAGE = menages.ID_MENAGE');
            $this->db->join('detail_formation','detail_formation.ID_FORMATION = appui_menage.ID_FORMATION','LEFT');
            $this->db->where('id_parent',$id);
            $query = $this->db->get();
            return $query->result();
        }

        public function getNbEafAppuieByIdAppuiOpb($idAppui){
            $this->db->select('*');
            $this->db->from('appui_menage');
            $this->db->join('menages','menages.ID_MENAGE=appui_menage.ID_MENAGE');
            $this->db->where('ID_PARENT',$idAppui);
            return $this->db->get()->result();
        }

        public function findAppui($critere,$page = '') {
            $sql = 'SELECT * FROM appui_op LEFT JOIN ( SELECT * FROM appui_opf UNION SELECT * FROM appui_opr UNION SELECT * FROM appui_union UNION SELECT * FROM appui_opb ) vue ON vue.ID_APPUI_OP = appui_op.ID_APPUI_OP LEFT JOIN zone_intervention ON zone_intervention.ID_FOKONTANY = vue.ID_FOKONTANY';

            if(!empty($critere['idRegion'])) $sql = $sql.' WHERE (ID_REGION = '.$critere['idRegion'];
            if(!empty($critere['idDistrict'])) $sql = $sql.' AND ID_DISTRICT = '.$critere['idDistrict'];
            if(!empty($critere['idCommune'])) $sql = $sql.' AND ID_COMMUNE = '.$critere['idCommune'];
            if(!empty($critere['idFokontany'])) $sql = $sql.' AND ID_FOKONTANY = '.$critere['idFokontany'];

            if(!empty($critere['idRegion'])) $sql = $sql.')';

            if(!empty($critere['typeOp'])) {
                if (strpos($sql, 'WHERE') !== false) $sql = $sql.' AND (';
                if (strpos($sql, 'WHERE') === false) $sql = $sql.' WHERE (';
                foreach ($critere['typeOp'] as $type) {
                    if (strpos($sql, 'TYPE_OP') !== false) {
                        $sql = $sql.' OR TYPE_OP = ' . $type;
                    }
                    else{
                        $sql = $sql.' TYPE_OP = ' . $type;
                    }
                }
                $sql = $sql.')';
            }

            if(!empty($critere['typeAppui'])) {
                if (strpos($sql, 'WHERE') !== false) $sql = $sql.' AND (';
                if (strpos($sql, 'WHERE') === false) $sql = $sql.' WHERE (';
                foreach ($critere['typeAppui'] as $type) {
                    if (strpos($sql, 'ID_TYPE') !== false) {
                        $sql = $sql.' OR ID_TYPE = ' . $type;
                    }
                    else{
                        $sql = $sql.' ID_TYPE = ' . $type;
                    }
                }
                $sql = $sql.')';
            }

            if(!empty($critere['dateFDebut'])) {
                if (strpos($sql, 'WHERE') !== false) $sql = $sql.' AND (';
                if (strpos($sql, 'WHERE') === false) $sql = $sql.' WHERE (';
                if(!empty($critere['dateFFin'])) {
                    $sql = $sql.'DATE_FINANCEMENT BETWEEN \''.$critere['dateFDebut'].'\' AND \''.$critere['dateFFin'].'\'';
                }
                if(empty($critere['dateFFin'])) {
                    $sql = $sql.'DATE_FINANCEMENT BETWEEN \''.$critere['dateFDebut'].'\' AND \''.date('Y-m-d').'\'';
                }
                $sql = $sql.')';
            }

            if(!empty($critere['dateCDebut'])) {
                if (strpos($sql, 'WHERE') !== false) $sql = $sql.' AND (';
                if (strpos($sql, 'WHERE') === false) $sql = $sql.' WHERE (';
                if(!empty($critere['dateCFin'])) {
                    $sql = $sql.'DATE_COLLECTE BETWEEN \''.$critere['dateCDebut'].'\' AND \''.$critere['dateCFin'].'\'';
                }
                if(empty($critere['dateCFin'])) {
                    $sql = $sql.'DATE_COLLECTE BETWEEN \''.$critere['dateCDebut'].'\' AND \''.date('Y-m-d').'\'';
                }
                $sql = $sql.')';
            }

            if(!empty($page)){
                $skip = ($page * 20)-20;

                $sql = $sql.' LIMIT '.$skip.',20';
            }

            $query = $this->db->query($sql);
            return $query->result();

        }

	}