<?php
	class M_op extends CI_Model {

        public function getOp($op,$column){
            $table = $op;
            if($op=='union') $table = 'tab_'.$op;
            $this->db->select($column);
            $this->db->from($table);
            $this->db->join('zone_intervention', 'zone_intervention.id_fokontany = '.$table.'.id_fokontany','left');
            $this->db->join('menages', 'menages.id_menage = '.$table.'.id_representant','left');
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
            $table = $op;
            if($op=='union') $table = 'tab_'.$op;
            $this->db->select('GROUP_CONCAT( NOM_FILIERE SEPARATOR "," )  FILIERES');
            $this->db->from($op.'_filieres');
            $this->db->join('filieres','filieres.ID_FILIERE = '.$op.'_filieres.ID_FILIERE','left');
            $this->db->where('ID_'.$op,$id);
            $this->db->group_by('ID_'.$op);
            $query = $this->db->get();
            return $query->row();
        }

        //opf
        public function getOpf(){
            $this->db->select('opf.ID_OPF,opf.CODE_OPF,opf.NOM_OPF,opf.STATUT,opf.FORMELLE,opf.ID_REPRESENTANT,GROUP_CONCAT( NOM_FILIERE SEPARATOR "," )  FILIERES');
            $this->db->from('opf');
            $this->db->join('opf_filieres','opf_filieres.ID_OPF = opf.ID_OPF');
            $this->db->join('filieres','filieres.ID_FILIERE = opf_filieres.ID_FILIERE');
            $this->db->group_by('opf.ID_OPF,opf.CODE_OPF,opf.NOM_OPF,opf.STATUT,opf.FORMELLE,opf.ID_REPRESENTANT');
            $query = $this->db->get();
            return $query->result();
        }

        public function insertOpf($idFokontany,$nomOpf,$dateCreation,$statut,$formelle,$representant,$contact,$observation,$filiereListe){
            $count = $this->db->count_all('opf')+1;
            $codeOpf = 'OPF'.str_pad($count,2,0,STR_PAD_LEFT);
            $data = array(
                'id_fokontany' => $idFokontany,
                'code_opf' => $codeOpf,
                'nom_opf' => $nomOpf,
                'date_creation' => $dateCreation,
                'statut' => $statut,
                'formelle' => $formelle,
                'id_representant' => $representant,
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

        public function getOpfMembres($idOpf){
            $this->db->select('opr.ID_OPR ID_OP,CODE_OPR CODE_OP,NOM_OPR NOM_OP,NOM_FOKONTANY,NOM_COMMUNE,NOM_DISTRICT,NOM_REGION');
            $this->db->from('opr');
            $this->db->join('zone_intervention', 'zone_intervention.ID_FOKONTANY = opr.ID_FOKONTANY');
            $this->db->where('ID_OPF',$idOpf);
            $query = $this->db->get();
            return $query->result();
        }

        //opr
        public function getOpr(){
            $this->db->select('opr.ID_OPR,CODE_OPR,NOM_OPR,STATUT,FORMELLE,ID_REPRESENTANT,GROUP_CONCAT( NOM_FILIERE SEPARATOR "," )  FILIERES');
            $this->db->from('opr');
            $this->db->join('opr_filieres','opr_filieres.ID_OPR = opr.ID_OPR');
            $this->db->join('filieres','filieres.ID_FILIERE = opr_filieres.ID_FILIERE');
            $this->db->group_by('opr.ID_OPR,CODE_OPR,NOM_OPR,STATUT,FORMELLE,ID_REPRESENTANT');
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

        public function insertOpr($idFokontany,$nomOpr,$dateCreation,$statut,$formelle,$representant,$contact,$observation,$filiereListe){
            $count = $this->db->count_all('opr')+1;
            $codeOpr = 'OPR'.str_pad($count,2,0,STR_PAD_LEFT);
            $data = array(
                'id_fokontany' => $idFokontany,
                'code_opr' => $codeOpr,
                'nom_opr' => $nomOpr,
                'date_creation' => $dateCreation,
                'statut' => $statut,
                'formelle' => $formelle,
                'id_representant' => $representant,
                'contact' => $contact,
                'observation' => $observation
            );
            if(! $this->db->insert('opr', $data)){
                return $this->db->error();
            }
            return $this->insertOprFilieres($this->db->insert_id(),$filiereListe);
        }

        public function insertOprMembre($idOpr,$membres){
            foreach($membres as $membre) {
                $codeId = explode(":",$membre);
                if($membre[0]=='U') {
                    $this->db->set('ID_OPR', $idOpr);
                    $this->db->where('ID_UNION', $codeId[1]);
                    $this->db->update('tab_union');
                }
                else {
                    $data = array(
                        'ID_OPR' => $idOpr,
                        'ID_OPB' => intval($codeId[1])
                    );
                    $this->db->insert('opr_opb', $data);
                }
            }
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

        public function setOprOpf($idOpf,$membres){
            foreach($membres as $membre) {
                $this->db->set('ID_OPF', $idOpf);
                $this->db->where('id_opr', $membre);
                $this->db->update('opr');
            }
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

        //UNION
        public function getUnion(){
            $this->db->select('tab_union.ID_UNION,CODE_UNION,NOM_UNION,STATUT,FORMELLE,ID_REPRESENTANT,GROUP_CONCAT( NOM_FILIERE SEPARATOR "," )  FILIERES');
            $this->db->from('tab_union');
            $this->db->join('union_filieres','union_filieres.ID_UNION = tab_union.ID_UNION');
            $this->db->join('filieres','filieres.ID_FILIERE = union_filieres.ID_FILIERE');
            $this->db->group_by('tab_union.ID_UNION,CODE_UNION,NOM_UNION,STATUT,FORMELLE,ID_REPRESENTANT');
            $query = $this->db->get();
            return $query->result();
        }

        public function insertUnion($idFokontany,$nomUnion,$dateCreation,$statut,$formelle,$representant,$contact,$observation,$filiereListe,$type){
            $count = $this->db->count_all('tab_union')+1;
            $codeUnion = 'U'.str_pad($count,2,0,STR_PAD_LEFT);
            $data = array(
                'id_fokontany' => $idFokontany,
                'code_union' => $codeUnion,
                'nom_union' => $nomUnion,
                'date_creation' => $dateCreation,
                'statut' => $statut,
                'formelle' => $formelle,
                'id_representant' => $representant,
                'contact' => $contact,
                'observation' => $observation,
                'type' => $type
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

        public function insertUnionMembre($idUnion,$membres){
            foreach($membres as $membre) {
                $data = array(
                    'ID_UNION' => $idUnion,
                    'ID_OPB' => $membre
                );
                $this->db->insert('union_opb', $data);
            }
        }

        public function getUnionMembres($idUnion){
            $this->db->select('opb.ID_OPB ID_OP,CODE_OPB CODE_OP,NOM_OPB NOM_OP,TYPE,NOM_FOKONTANY,NOM_COMMUNE,NOM_DISTRICT,NOM_REGION');
            $this->db->from('union_opb');
            $this->db->join('opb', 'opb.ID_OPB = union_opb.ID_OPB');
            $this->db->join('zone_intervention', 'zone_intervention.ID_FOKONTANY = opb.ID_FOKONTANY');
            $this->db->where('ID_UNION',$idUnion);
            return $this->db->get()->result();
        }

        //OPB
        public function getOPB(){
            $this->db->select('opb.ID_OPB,CODE_OPB,NOM_OPB,STATUT,FORMELLE,ID_REPRESENTANT,GROUP_CONCAT( NOM_FILIERE SEPARATOR "," )  FILIERES');
            $this->db->from('opb');
            $this->db->join('opb_filieres','opb_filieres.ID_OPB = opb.ID_OPB');
            $this->db->join('filieres','filieres.ID_FILIERE = opb_filieres.ID_FILIERE');
            $this->db->group_by('opb.ID_OPB,CODE_OPB,NOM_OPB,STATUT,FORMELLE,ID_REPRESENTANT');
            $query = $this->db->get();
            return $query->result();
        }

        public function insertOpb($idFokontany,$nomOpb,$dateCreation,$statut,$formelle,$representant,$contact,$observation,$filiereListe,$type){
            $count = $this->db->count_all('opb')+1;
            $codeOpb = 'OPB'.str_pad($count,5,0,STR_PAD_LEFT);
            $data = array(
                'id_fokontany' => $idFokontany,
                'code_opb' => $codeOpb,
                'nom_opb' => $nomOpb,
                'date_creation' => $dateCreation,
                'statut' => $statut,
                'formelle' => $formelle,
                'id_representant' => $representant,
                'contact' => $contact,
                'observation' => $observation,
                'type' => $type
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

        public function getOpbMembres($idOpb){
            $this->db->select('menages.ID_MENAGE,CODE_MENAGE,NOM_MENAGE,SURNOM,TYPE,NOM_FONCTION,SEXE,DATE_ADHESION,IMF');
            $this->db->from('opb_menages');
            $this->db->join('menages', 'menages.ID_MENAGE = opb_menages.ID_MENAGE');
            $this->db->join('fonctioninop', 'fonctioninop.ID_FONCTION = opb_menages.ID_FONCTION');
            $this->db->where('ID_OPB',$idOpb);
            return $this->db->get()->result();
        }

        //opb union
        public function getOpbUnionListeNotIn($idOpr){
            $query = $this->db->query('SELECT opb.ID_OPB ID_OP, CODE_OPB CODE_OP, NOM_OPB NOM_OP FROM opr_opb RIGHT JOIN opb ON opb.ID_OPB = opr_opb.ID_OPB WHERE ID_OPR IS NULL OR ID_OPR != '.$idOpr.' UNION SELECT ID_UNION, CODE_UNION, NOM_UNION FROM tab_union WHERE ID_OPR IS NULL');
            return $query->result();
        }

        //Ménages
        public function getMenages(){
            $query = $this->db->query("SELECT * FROM menages JOIN zone_intervention ON menages.ID_FOKONTANY= zone_intervention.ID_FOKONTANY");
            return $query->result() ;
        }

        public function getMenageById($id){
            $query = $this->db->query("SELECT * FROM menages WHERE ID_MENAGE=".$id);
            return $query->row() ;
        }

        public function insertMenage($idFokontany,$type,$nomMenage,$surnom,$sexe,$imf,$filiereListe){
            $count = $this->db->count_all('menages')+1;
            $codeMenage = 'EAF'.str_pad($count,5,0,STR_PAD_LEFT);
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
            $query = $this->db->query('SELECT SEXE FROM opb_menages JOIN menages ON menages.ID_MENAGE = opb_menages.ID_MENAGE WHERE ID_OPB = '.$idOpb);
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
	}