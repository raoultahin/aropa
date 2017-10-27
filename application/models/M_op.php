<?php
	class M_op extends CI_Model {

        public function getTotal($table)
        {
            return $this->db->count_all($table);
        }

        public function getOp($op,$column){
            $table = $op;
            if($op=='union') $table = 'tab_'.$op;
            $this->db->select($column);
            $this->db->from($table);
            $this->db->join('zone_intervention', 'zone_intervention.id_fokontany = '.$table.'.id_fokontany','left');
            $query = $this->db->get();
            return $query->result();
        }

        public function getOpById($op,$id,$column){
            $array = $this->getOp($op,$column);
            foreach ($array as $ligne){
                if($ligne->ID_OP == $id) return $ligne;
            }
            return null;
        }

        public function getOpFiliere($id,$op){
            $this->db->select('GROUP_CONCAT( NOM_FILIERE SEPARATOR "," )  FILIERES');
            $this->db->from($op.'_filieres');
            $this->db->join('filieres','filieres.ID_FILIERE = '.$op.'_filieres.ID_FILIERE','left');
            $this->db->where('ID_'.$op,$id);
            $this->db->group_by('ID_'.$op);
            $query = $this->db->get();
            return $query->row();
        }

        //opf
        public function getOpf($page = ''){
            if(!empty($page)){
                $skip = ($page * 20)-20;
                $this->db->limit(20,$skip);
            }
            $this->db->select('opf.ID_OPF,opf.CODE_OPF,opf.NOM_OPF,opf.STATUT,opf.FORMELLE,opf.REPRESENTANT,GROUP_CONCAT( NOM_FILIERE SEPARATOR "," )  FILIERES');
            $this->db->from('opf');
            $this->db->join('opf_filieres','opf_filieres.ID_OPF = opf.ID_OPF','left');
            $this->db->join('filieres','filieres.ID_FILIERE = opf_filieres.ID_FILIERE','left');
            $this->db->group_by('opf.ID_OPF,opf.CODE_OPF,opf.NOM_OPF,opf.STATUT,opf.FORMELLE,opf.REPRESENTANT');
            $query = $this->db->get();
            return $query->result();
        }

        public function insertOpf($idFokontany,$nomOpf,$dateCreation,$statut,$formelle,$representant,$contact,$observation,$filiereListe,$active){
            if($active==null) $active = 1;
            $count = $this->db->count_all('opf')+1;
            if($count != 1) {
                $last = $this->db->order_by('CODE_OPF',"desc")
                    ->limit(1)
                    ->get('opf')
                    ->row();
                $count = intval(substr($last->CODE_OPF,3))+1;
            }
            $codeOpf = 'OPF'.str_pad($count,2,0,STR_PAD_LEFT);
            $data = array(
                'id_fokontany' => $idFokontany,
                'code_opf' => $codeOpf,
                'nom_opf' => $nomOpf,
                'date_creation' => $dateCreation,
                'statut' => $statut,
                'formelle' => $formelle,
                'representant' => $representant,
                'contact' => $contact,
                'observation' => $observation,
                'active' => $active
            );
            if(! $this->db->insert('opf', $data)){
                return $this->db->error();
            }
            return $this->insertOpfFilieres($this->db->insert_id(),$filiereListe);
        }

        public function updateOpf($idFokontany,$nomOpf,$dateCreation,$statut,$formelle,$representant,$contact,$observation,$filiereListe,$id){
            $data = array(
                'id_fokontany' => $idFokontany,
                'nom_opf' => $nomOpf,
                'date_creation' => $dateCreation,
                'statut' => $statut,
                'formelle' => $formelle,
                'representant' => $representant,
                'contact' => $contact,
                'observation' => $observation
            );
            $this->db->where('ID_OPF',$id);
            if(! $this->db->update('opf', $data)){
                return $this->db->error();
            }
            return $this->updateOpfFilieres($id,$filiereListe);
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

        public function updateOpfFilieres($idOpf,$filiereListe){
            if(isset($filiereListe) && count($filiereListe)!=0) {
                $this->db->delete('opf_filieres', array('ID_OPF' => $idOpf));
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

        public function getOpfMembres($idOpf){
            $this->db->select('opr.ID_OPR ID_OP,CODE_OPR CODE_OP,NOM_OPR NOM_OP,NOM_FOKONTANY,NOM_COMMUNE,NOM_DISTRICT,NOM_REGION');
            $this->db->from('opr');
            $this->db->join('zone_intervention', 'zone_intervention.ID_FOKONTANY = opr.ID_FOKONTANY');
            $this->db->where('ID_OPF',$idOpf);
            $query = $this->db->get();
            return $query->result();
        }

        public function deleteOpf($idOpf){
            try {
                $this->db->trans_begin();

                $res = $this->db->query('UPDATE opr SET ID_OPF = NULL WHERE ID_OPF = '.$idOpf);
                if(!$res) throw new Exception($this->db->error()['message']);

                $res = $this->db->query('DELETE FROM opf_filieres WHERE ID_OPF = '.$idOpf);
                if(!$res) throw new Exception($this->db->error()['message']);

                $res = $this->db->query('DELETE FROM opf WHERE ID_OPF = '.$idOpf);
                if(!$res) throw new Exception($this->db->error()['message']);

                $this->db->trans_commit();
            }
            catch(Exception $e) {
                $this->db->trans_rollback();
                return $e->getMessage();
            }

        }

        //opr
        public function getOpr($page = ''){
            if(!empty($page)){
                $skip = ($page * 20)-20;
                $this->db->limit(20,$skip);
            }
            $this->db->select('opr.ID_OPR,CODE_OPR,NOM_OPR,STATUT,FORMELLE,REPRESENTANT,GROUP_CONCAT( NOM_FILIERE SEPARATOR "," )  FILIERES');
            $this->db->from('opr');
            $this->db->join('opr_filieres','opr_filieres.ID_OPR = opr.ID_OPR','left');
            $this->db->join('filieres','filieres.ID_FILIERE = opr_filieres.ID_FILIERE','left');
            $this->db->group_by('opr.ID_OPR,CODE_OPR,NOM_OPR,STATUT,FORMELLE,REPRESENTANT');
            $query = $this->db->get();
            return $query->result();
        }

        public function getOprByOpfNull(){
            $this->db->select('opr.ID_OPR,CODE_OPR,NOM_OPR');
            $this->db->from('opr');
            $this->db->where('ID_OPF',null);
            $query = $this->db->get();
            return $query->result();
        }

        public function insertOpr($idFokontany,$nomOpr,$dateCreation,$statut,$formelle,$representant,$contact,$observation,$filiereListe,$active){
            if($active==null) $active = 1;
            $count = $this->db->count_all('opr')+1;
            if($count != 1) {
                $last = $this->db->order_by('CODE_OPR',"desc")
                    ->limit(1)
                    ->get('opr')
                    ->row();
                $count = intval(substr($last->CODE_OPR,3))+1;
            }
            $codeOpr = 'OPR'.str_pad($count,2,0,STR_PAD_LEFT);
            $result = array();
            $data = array(
                'id_fokontany' => $idFokontany,
                'code_opr' => $codeOpr,
                'nom_opr' => $nomOpr,
                'date_creation' => $dateCreation,
                'statut' => $statut,
                'formelle' => $formelle,
                'representant' => $representant,
                'contact' => $contact,
                'observation' => $observation,
                'active' => $active
            );
            if(! $this->db->insert('opr', $data)){
                $result['error'] = $this->db->error();
                return $result;
            }
            $result['idOpr'] = $this->db->insert_id();
            $result['error'] = $this->insertOprFilieres($this->db->insert_id(),$filiereListe);
            return $result;
        }

        public function updateOpr($idFokontany,$nomOpr,$dateCreation,$statut,$formelle,$representant,$contact,$observation,$filiereListe,$id){
            $data = array(
                'id_fokontany' => $idFokontany,
                'nom_opr' => $nomOpr,
                'date_creation' => $dateCreation,
                'statut' => $statut,
                'formelle' => $formelle,
                'representant' => $representant,
                'contact' => $contact,
                'observation' => $observation
            );
            $this->db->where('ID_OPR',$id);
            if(! $this->db->update('opr', $data)){
                return $this->db->error();
            }
            return $this->updateOprFilieres($id,$filiereListe);
        }

        public function insertOprMembre($idOpr,$membres){
            foreach($membres as $membre) {
                $temp = explode(':',$membre);
                if($temp[0][0]=='U') {
                    $union = $this->getUnionByCode(trim($temp[0]));
                    $this->db->set('ID_OPR', $idOpr);
                    $this->db->where('ID_UNION', $union->ID_UNION);
                    $this->db->update('tab_union');
                }
                else {
                    $opb = $this->getOpbByCode(trim($temp[0]));
                    $data = array(
                        'ID_OPR' => $idOpr,
                        'ID_OPB' => intval($opb->ID_OPB)
                    );
                    $this->db->insert('opr_opb', $data);
                }
            }
        }

        public function insertOprMembreIdOpb($idOpr,$idOpb){
            $data = array(
                'ID_OPR' => $idOpr,
                'ID_OPB' => $idOpb
            );
            $this->db->insert('opr_opb', $data);

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

        public function updateOprFilieres($idOpr,$filiereListe){
            if(isset($filiereListe) && count($filiereListe)!=0) {
                $this->db->delete('opr_filieres', array('ID_OPR' => $idOpr));

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

        public function setOprOpf($idOpf,$membres){
            foreach($membres as $membre) {
                $this->db->set('ID_OPF', $idOpf);
                $this->db->where('id_opr', $membre);
                $this->db->update('opr');
            }
        }

        public function setOprIdOpf($idOpf,$idOpr){
            $this->db->set('ID_OPF', $idOpf);
            $this->db->where('id_opr', $idOpr);
            $this->db->update('opr');
        }

        public function getOprMembres($idOpr){
            $this->db->select('opb.ID_OPB ID_OP,CODE_OPB CODE_OP,NOM_OPB NOM_OP,TYPE,NOM_FOKONTANY,NOM_COMMUNE,NOM_DISTRICT,NOM_REGION');
            $this->db->from('opr_opb');
            $this->db->join('opb', 'opb.ID_OPB = opr_opb.ID_OPB');
            $this->db->join('zone_intervention', 'zone_intervention.ID_FOKONTANY = opb.ID_FOKONTANY');
            $this->db->where('ID_OPR',$idOpr);
            $opb = $this->db->get_compiled_select();

            $this->db->select('ID_UNION ID_OP,CODE_UNION CODE_OP,NOM_UNION NOM_OP,TYPE,NOM_FOKONTANY,NOM_COMMUNE,NOM_DISTRICT,NOM_REGION');
            $this->db->from('tab_union');
            $this->db->join('zone_intervention', 'zone_intervention.ID_FOKONTANY = tab_union.ID_FOKONTANY');
            $this->db->where('ID_OPR',$idOpr);
            $union = $this->db->get_compiled_select();
            return $this->db->query($opb . ' UNION ' . $union)->result();
        }

        public function deleteOpr($idOpr){
            try {
                $this->db->trans_begin();

                $res = $this->db->query('UPDATE tab_union SET ID_OPR = NULL WHERE ID_OPR = '.$idOpr);
                if(!$res) throw new Exception($this->db->error()['message']);

                $res = $this->db->query('DELETE FROM opr_filieres WHERE ID_OPR = '.$idOpr);
                if(!$res) throw new Exception($this->db->error()['message']);

                $res = $this->db->query('DELETE FROM opr_opb WHERE ID_OPR = '.$idOpr);
                if(!$res) throw new Exception($this->db->error()['message']);

                $res = $this->db->query('DELETE FROM opr WHERE ID_OPR = '.$idOpr);
                if(!$res) throw new Exception($this->db->error()['message']);

                $this->db->trans_commit();
            }
            catch(Exception $e) {
                $this->db->trans_rollback();
                return $e->getMessage();
            }

        }

        //UNION
        public function getUnion($page = ''){
            if(!empty($page)){
                $skip = ($page * 20)-20;
                $this->db->limit(20,$skip);
            }
            $this->db->select('tab_union.ID_UNION,CODE_UNION,NOM_UNION,STATUT,FORMELLE,REPRESENTANT,GROUP_CONCAT( NOM_FILIERE SEPARATOR "," )  FILIERES');
            $this->db->from('tab_union');
            $this->db->join('union_filieres','union_filieres.ID_UNION = tab_union.ID_UNION','left');
            $this->db->join('filieres','filieres.ID_FILIERE = union_filieres.ID_FILIERE','left');
            $this->db->group_by('tab_union.ID_UNION,CODE_UNION,NOM_UNION,STATUT,FORMELLE,REPRESENTANT');
            $query = $this->db->get();
            return $query->result();
        }

        public function getUnionByCode($code){
            $this->db->select('ID_UNION');
            $this->db->from('tab_union');
            $this->db->where('CODE_UNION',$code);
            $query = $this->db->get();
            return $query->row();
        }

        public function insertUnion($idFokontany,$idOpr,$nomUnion,$dateCreation,$statut,$formelle,$representant,$contact,$observation,$filiereListe,$active){
            if($active == null) $active = 1;
            $count = $this->db->count_all('tab_union')+1;
            if($count != 1) {
                $last = $this->db->order_by('CODE_UNION',"desc")
                    ->limit(1)
                    ->get('tab_union')
                    ->row();
                $count = intval(substr($last->CODE_UNION,1))+1;
            }
            $codeUnion = 'U'.str_pad($count,2,0,STR_PAD_LEFT);
            $data = array(
                'id_fokontany' => $idFokontany,
                'id_opr' => $idOpr,
                'code_union' => $codeUnion,
                'nom_union' => $nomUnion,
                'date_creation' => $dateCreation,
                'statut' => $statut,
                'formelle' => $formelle,
                'representant' => $representant,
                'contact' => $contact,
                'observation' => $observation,
                'active' => $active
            );
            if(! $this->db->insert('tab_union', $data)){
                return $this->db->error();
            }
            return $this->insertUnionFilieres($this->db->insert_id(),$filiereListe);
        }

        public function updateUnion($idFokontany,$nomUnion,$dateCreation,$statut,$formelle,$representant,$contact,$observation,$filiereListe,$id){
            $data = array(
                'id_fokontany' => $idFokontany,
                'nom_union' => $nomUnion,
                'date_creation' => $dateCreation,
                'statut' => $statut,
                'formelle' => $formelle,
                'representant' => $representant,
                'contact' => $contact,
                'observation' => $observation
            );
            $this->db->where('ID_UNION',$id);
            if(! $this->db->update('tab_union', $data)){
                return $this->db->error();
            }
            return $this->updateUnionFilieres($id,$filiereListe);
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

        public function updateUnionFilieres($idUnion,$filiereListe){
            if(isset($filiereListe) && count($filiereListe)!=0) {
                $this->db->delete('union_filieres', array('ID_UNION' => $idUnion));
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

        public function insertUnionMembre($idUnion,$membres){
            foreach($membres as $membre) {
                $temp = explode(':',$membre);
                $opb = $this->getOpbByCode(trim($temp[0]));
                $data = array(
                    'ID_UNION' => $idUnion,
                    'ID_OPB' => $opb->ID_OPB
                );
                $this->db->insert('union_opb', $data);
            }
        }

        public function insertUnionMembreIdOpb($idUnion,$idOpb){
            $data = array(
                'ID_UNION' => $idUnion,
                'ID_OPB' => $idOpb
            );
            $this->db->insert('union_opb', $data);

        }

        public function getUnionMembres($idUnion){
            $this->db->select('opb.ID_OPB ID_OP,CODE_OPB CODE_OP,NOM_OPB NOM_OP,TYPE,NOM_FOKONTANY,NOM_COMMUNE,NOM_DISTRICT,NOM_REGION');
            $this->db->from('union_opb');
            $this->db->join('opb', 'opb.ID_OPB = union_opb.ID_OPB');
            $this->db->join('zone_intervention', 'zone_intervention.ID_FOKONTANY = opb.ID_FOKONTANY');
            $this->db->where('ID_UNION',$idUnion);
            return $this->db->get()->result();
        }

        public function deleteUnion($idUnion){
            try {
                $this->db->trans_begin();


                $res = $this->db->query('DELETE FROM union_filieres WHERE ID_UNION = '.$idUnion);
                if(!$res) throw new Exception($this->db->error()['message']);

                $res = $this->db->query('DELETE FROM union_opb WHERE ID_UNION = '.$idUnion);
                if(!$res) throw new Exception($this->db->error()['message']);

                $res = $this->db->query('DELETE FROM tab_union WHERE ID_UNION = '.$idUnion);
                if(!$res) throw new Exception($this->db->error()['message']);

                $this->db->trans_commit();
            }
            catch(Exception $e) {
                $this->db->trans_rollback();
                return $e->getMessage();
            }

        }

        //OPB
        public function getOpb($page = ''){
            if(!empty($page)){
                $skip = ($page * 20)-20;
                $this->db->limit(20,$skip);
            }
            $this->db->select('opb.ID_OPB,CODE_OPB,NOM_OPB,STATUT,FORMELLE,REPRESENTANT,NOM_FOKONTANY,NOM_COMMUNE,NOM_DISTRICT,NOM_REGION,GROUP_CONCAT( NOM_FILIERE SEPARATOR "," )  FILIERES');
            $this->db->from('opb');
            $this->db->join('opb_filieres','opb_filieres.ID_OPB = opb.ID_OPB','left');
            $this->db->join('filieres','filieres.ID_FILIERE = opb_filieres.ID_FILIERE','left');
            $this->db->join('zone_intervention','zone_intervention.ID_FOKONTANY = opb.ID_FOKONTANY','left');
            $this->db->group_by('opb.ID_OPB,CODE_OPB,NOM_OPB,STATUT,FORMELLE,REPRESENTANT,NOM_FOKONTANY,NOM_COMMUNE,NOM_DISTRICT,NOM_REGION');
            $query = $this->db->get();
            return $query->result();
        }

        public function getOpbByCode($code){
            $this->db->select('ID_OPB');
            $this->db->from('opb');
            $this->db->where('CODE_OPB',$code);
            $query = $this->db->get();
            return $query->row();
        }

        public function insertOpb($idFokontany,$nomOpb,$dateCreation,$statut,$formelle,$representant,$contact,$observation,$filiereListe,$type,$active){
            if($active==null) $active = 1;
            $count = $this->db->count_all('opb')+1;
            if($count != 1) {
                $last = $this->db->order_by('CODE_OPB',"desc")
                    ->limit(1)
                    ->get('opB')
                    ->row();
                $count = intval(substr($last->CODE_OPB,3))+1;
            }
            $codeOpb = 'OPB'.str_pad($count,5,0,STR_PAD_LEFT);
            $result = array();
            $data = array(
                'id_fokontany' => $idFokontany,
                'code_opb' => $codeOpb,
                'nom_opb' => $nomOpb,
                'date_creation' => $dateCreation,
                'statut' => $statut,
                'formelle' => $formelle,
                'representant' => $representant,
                'contact' => $contact,
                'observation' => $observation,
                'type' => $type,
                'active' => $active
            );
            if(! $this->db->insert('opb', $data)){
                $result['error'] = $this->db->error();
                return $result;
            }
            $result['idOpb'] = $this->db->insert_id();
            $result['error'] = $this->insertOpbFilieres($this->db->insert_id(),$filiereListe);
            return $result;
        }

        public function updateOpb($idFokontany,$nomOpb,$dateCreation,$statut,$formelle,$representant,$contact,$observation,$filiereListe,$type,$id){
            $data = array(
                'id_fokontany' => $idFokontany,
                'nom_opb' => $nomOpb,
                'date_creation' => $dateCreation,
                'statut' => $statut,
                'formelle' => $formelle,
                'representant' => $representant,
                'contact' => $contact,
                'observation' => $observation,
                'type' => $type
            );
            $this->db->where('ID_OPB', $id);
            if(! $this->db->update('opb', $data)){
                return $this->db->error();
            }
            return $this->updateOpbFilieres($id,$filiereListe);
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

        public function updateOpbFilieres($idOpb,$filiereListe){
            if(isset($filiereListe) && count($filiereListe)!=0) {
                $this->db->delete('opb_filieres', array('ID_OPB' => $idOpb));
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

        public function getOpbListeNotIn($idUnion){
            $query = $this->db->query('SELECT opb.ID_OPB, CODE_OPB, NOM_OPB FROM union_opb RIGHT JOIN opb ON opb.ID_OPB = union_opb.ID_OPB WHERE ID_UNION IS NULL OR ID_UNION !='.$idUnion);
            return $query->result();
        }

        public function insertOpbMembre($idOpb,$membres){
            foreach($membres as $membre) {
                if($membre['id'] != '') {
                    $data = array(
                        'ID_MENAGE' => $membre['id'],
                        'ID_FONCTION' => $membre['fonction'],
                        'ID_OPB' => $idOpb,
                        'DATE_ADHESION' => $membre['date_adhesion']
                    );
                    $this->db->insert('opb_menages', $data);
                }
            }
        }

        public function insertOpbMembreDet($idOpb,$idMenage,$idFonction,$date){
            $data = array(
                'ID_MENAGE' => $idMenage,
                'ID_FONCTION' => $idFonction,
                'ID_OPB' => $idOpb,
                'DATE_ADHESION' => $date
            );
            $this->db->insert('opb_menages', $data);
        }

        public function getOpbMembres($idOpb){
            $this->db->select('menages.ID_MENAGE,CODE_MENAGE,NOM_MENAGE,SURNOM,TYPE,NOM_FONCTION,SEXE,DATE_ADHESION,IMF');
            $this->db->from('opb_menages');
            $this->db->join('menages', 'menages.ID_MENAGE = opb_menages.ID_MENAGE','left');
            $this->db->join('fonctioninop', 'fonctioninop.ID_FONCTION = opb_menages.ID_FONCTION','left');
            $this->db->where('ID_OPB',$idOpb);
            return $this->db->get()->result();
        }

        public function deleteOpb($idOpb){
            try {
                $this->db->trans_begin();


                $res = $this->db->query('DELETE FROM opb_filieres WHERE ID_OPB = '.$idOpb);
                if(!$res) throw new Exception($this->db->error()['message']);

                $res = $this->db->query('DELETE FROM campagnes_opb WHERE ID_OPB = '.$idOpb);
                if(!$res) throw new Exception($this->db->error()['message']);

                $res = $this->db->query('DELETE FROM union_opb WHERE ID_OPB = '.$idOpb);
                if(!$res) throw new Exception($this->db->error()['message']);

                $res = $this->db->query('DELETE FROM opr_opb WHERE ID_OPB = '.$idOpb);
                if(!$res) throw new Exception($this->db->error()['message']);

                $res = $this->db->query('DELETE FROM opb_menages WHERE ID_OPB = '.$idOpb);
                if(!$res) throw new Exception($this->db->error()['message']);

                $res = $this->db->query('DELETE FROM opb WHERE ID_OPB = '.$idOpb);
                if(!$res) throw new Exception($this->db->error()['message']);

                $this->db->trans_commit();
            }
            catch(Exception $e) {
                $this->db->trans_rollback();
                return $e->getMessage();
            }

        }

        //opb union
        public function getOpbUnionListeNotIn($idOpr){
            $query = $this->db->query('SELECT opb.ID_OPB ID_OP, CODE_OPB CODE_OP, NOM_OPB NOM_OP FROM opr_opb RIGHT JOIN opb ON opb.ID_OPB = opr_opb.ID_OPB WHERE ID_OPR IS NULL OR ID_OPR != '.$idOpr.' UNION SELECT ID_UNION, CODE_UNION, NOM_UNION FROM tab_union WHERE ID_OPR IS NULL');
            return $query->result();
        }

        //Ménages
        public function getMenages($page = ''){
            if(!empty($page)){
                $skip = ($page * 20)-20;
                $this->db->limit(20,$skip);
            }
            $this->db->select('menages.ID_MENAGE,CODE_MENAGE,NOM_MENAGE,SURNOM,SEXE,IMF,GROUP_CONCAT( NOM_FILIERE SEPARATOR "," )  FILIERES,NOM_FOKONTANY,NOM_COMMUNE,NOM_DISTRICT,NOM_REGION');
            $this->db->from('menages');
            $this->db->join('menages_filieres','menages_filieres.ID_MENAGE = menages.ID_MENAGE','left');
            $this->db->join('filieres','filieres.ID_FILIERE = menages_filieres.ID_FILIERE','left');
            $this->db->join('zone_intervention','zone_intervention.ID_FOKONTANY = menages.ID_FOKONTANY','left');
            $this->db->group_by('menages.ID_MENAGE,CODE_MENAGE,NOM_MENAGE,SURNOM,SEXE,IMF,NOM_FOKONTANY,NOM_COMMUNE,NOM_DISTRICT,NOM_REGION');
            $query = $this->db->get();
            return $query->result();
        }

        public function getMenageById($id){
            $query = $this->db->query("SELECT * FROM menages WHERE ID_MENAGE=".$id);
            return $query->row() ;
        }

        public function insertMenage($idFokontany,$type,$nomMenage,$surnom,$sexe,$imf,$filiereListe,$active){
            if($active==null) $active = 1;
            $count = $this->db->count_all('menages')+1;
            if($count != 1) {
                $last = $this->db->order_by('CODE_MENAGE', "desc")
                    ->limit(1)
                    ->get('menages')
                    ->row();
                $count = intval(substr($last->CODE_MENAGE, 3)) + 1;
            }

            $codeMenage = 'EAF'.str_pad($count,6,0,STR_PAD_LEFT);
            $result = array();
            $data = array(
                'id_fokontany' => $idFokontany,
                'type' => $type,
                'code_menage' => $codeMenage,
                'nom_menage' => $nomMenage,
                'surnom' => $surnom,
                'sexe' => $sexe,
                'imf' => $imf,
                'active' => $active
            );
            if(! $this->db->insert('menages', $data)){
                $result['error'] = $this->db->error();
                return $result;
            }
            $result['idMenage'] = $this->db->insert_id();
            $result['error'] = $this->insertMenageFilieres($this->db->insert_id(),$filiereListe);
            return $result;
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

        public function deleteMenage($idMenage){
            try {
                $this->db->trans_begin();

                $res = $this->db->query('DELETE FROM menages_filieres WHERE ID_MENAGE = '.$idMenage);
                if(!$res) throw new Exception($this->db->error()['message']);

                $res = $this->db->query('DELETE FROM campagnes_opb WHERE ID_MENAGE = '.$idMenage);
                if(!$res) throw new Exception($this->db->error()['message']);

                $res = $this->db->query('DELETE FROM appui_menage WHERE ID_MENAGE = '.$idMenage);
                if(!$res) throw new Exception($this->db->error()['message']);

                $res = $this->db->query('DELETE FROM opb_menages WHERE ID_MENAGE = '.$idMenage);
                if(!$res) throw new Exception($this->db->error()['message']);

                $res = $this->db->query('DELETE FROM menages WHERE ID_MENAGE = '.$idMenage);
                if(!$res) throw new Exception($this->db->error()['message']);

                $this->db->trans_commit();
            }
            catch(Exception $e) {
                $this->db->trans_rollback();
                return $e->getMessage();
            }

        }




        public function getEafListeNotIn($idOpb){
            $query = $this->db->query('SELECT menages.ID_MENAGE, CODE_MENAGE, menages.NOM_MENAGE, menages.SURNOM FROM opb_menages RIGHT JOIN menages ON menages.ID_MENAGE = opb_menages.ID_MENAGE WHERE ID_OPB IS NULL OR ID_OPB != '.$idOpb);
            return $query->result();
        }

        public function getMenageFonctions(){
            return $this->db->get('fonctioninop')->result();
        }

        public function getNbrOpbByIdMenage($idMenage){
            $this->db->select('ID_OPB_MENAGE');
            $this->db->from('opb_menages');
            $this->db->where('ID_MENAGE',$idMenage);
            return $this->db->get()->result();
        }

        public function getOpbEafByIdOpb($idOpb){
            $query = $this->db->query('SELECT SEXE,menages.TYPE FROM opb_menages JOIN menages ON menages.ID_MENAGE = opb_menages.ID_MENAGE WHERE ID_OPB = '.$idOpb);
            return $query->result();
        }

        public function getUnionOpbByIdUnion($idUnion){
            $query = $this->db->query('SELECT ID_OPB FROM union_opb WHERE ID_UNION = '.$idUnion);
            return $query->result();
        }

        public function getOprMembreByIdOpr($idOpr){
            $this->db->select('opb.ID_OPB ID_OP,CODE_OPB CODE_OP');
            $this->db->from('opr_opb');
            $this->db->join('opb', 'opb.ID_OPB = opr_opb.ID_OPB');
            $this->db->where('ID_OPR',$idOpr);
            $opb = $this->db->get_compiled_select();

            $this->db->select('ID_UNION ID_OP,CODE_UNION CODE_OP');
            $this->db->from('tab_union');
            $this->db->where('ID_OPR',$idOpr);
            $union = $this->db->get_compiled_select();
            return $this->db->query($opb . ' UNION ' . $union)->result();
        }

        public function findOpb($critere,$page = '') {
            if(!empty($page)){
                $skip = ($page * 20)-20;
                $this->db->limit(20,$skip);
            }
            $this->db->select('opb.ID_OPB,CODE_OPB,NOM_OPB,STATUT,FORMELLE,REPRESENTANT,NOM_FOKONTANY,NOM_COMMUNE,NOM_DISTRICT,NOM_REGION,GROUP_CONCAT( NOM_FILIERE SEPARATOR "," )  FILIERES');
            $this->db->from('opb');
            $this->db->join('opb_filieres','opb_filieres.ID_OPB = opb.ID_OPB','left');
            $this->db->join('filieres','filieres.ID_FILIERE = opb_filieres.ID_FILIERE','left');
            $this->db->join('zone_intervention','zone_intervention.ID_FOKONTANY = opb.ID_FOKONTANY','left');
            $this->db->group_by('opb.ID_OPB,CODE_OPB,NOM_OPB,STATUT,FORMELLE,REPRESENTANT,NOM_FOKONTANY,NOM_COMMUNE,NOM_DISTRICT,NOM_REGION');

            if(!empty($critere['idRegion'])) $this->db->where('ID_REGION',$critere['idRegion']);
            if(!empty($critere['idDistrict'])) $this->db->where('ID_DISTRICT',$critere['idDistrict']);
            if(!empty($critere['idCommune'])) $this->db->where('ID_COMMUNE',$critere['idCommune']);
            if(!empty($critere['idFokontany'])) $this->db->where('opb.ID_FOKONTANY',$critere['idFokontany']);

            if(!empty($critere['codeOp'])) $this->db->like('CODE_OPB',$critere['codeOp']);
            if(!empty($critere['nomOp'])) $this->db->like('NOM_OPB',$critere['nomOp']);
            if(!empty($critere['filiere'])) $this->db->like('NOM_FILIERE',$critere['filiere']);
            if(!empty($critere['representant'])) $this->db->like('REPRESENTANT',$critere['representant']);

            if($critere['formelle']!=null) {
                $this->db->where('FORMELLE',$critere['formelle']);
            }

//            $union = $this->db->get_compiled_select();
//            $this->db->query($union);
//            var_dump($this->db);

            return $this->db->get()->result();
        }
	}