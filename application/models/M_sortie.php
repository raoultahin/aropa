<?php
	class M_sortie extends CI_Model {

        public function getTabOpb($annee){
            $result = null;
            $this->db->select('NOM_REGION,NOM_DISTRICT,NOM_COMMUNE,NOM_OPF,NOM_OPR,NOM_UNION,NOM_OPB,opb.ID_OPB,NOM_FILIERE,filieres.ID_FILIERE,SUM(SUPERFICIE) SUPERFICIE, SUM(QTE_PRODUITE) QTE_PRODUITE, SUM(QTE_COMMERCIALISEE) QTE_COMMERCIALISEE, SUM(MONTANT) MONTANT');
            $this->db->from('opb');
            $this->db->join('union_opb','union_opb.ID_OPB = opb.ID_OPB','left');
            $this->db->join('tab_union','tab_union.ID_UNION = union_opb.ID_UNION','left');
            $this->db->join('opr_opb','opr_opb.ID_OPB = opb.ID_OPB','left');
            $this->db->join('opr','opr.ID_OPR = tab_union.ID_OPR OR opr.ID_OPR = opr_opb.ID_OPR','left');
            $this->db->join('opf','opf ON opf.ID_OPF = opr.ID_OPF','left');
            $this->db->join('zone_intervention','zone_intervention.ID_FOKONTANY = opb.ID_FOKONTANY','left');
            $this->db->join('opb_filieres','opb.ID_OPB = opb_filieres.ID_OPB','left');
            $this->db->join('filieres','filieres.ID_FILIERE = opb_filieres.ID_FILIERE','left');
            $this->db->join('campagnes_opb','campagnes_opb.ID_OPB = opb.ID_OPB AND campagnes_opb.ID_FILIERE = filieres.ID_FILIERE','left');
            $this->db->where('YEAR(DATE_COLLECTE)',$annee);
            $this->db->or_where('YEAR(DATE_COLLECTE)',null);
            $this->db->group_by('NOM_REGION,NOM_DISTRICT,NOM_COMMUNE,NOM_OPF,NOM_OPR,NOM_UNION,NOM_OPB,opb.ID_OPB,NOM_FILIERE,filieres.ID_FILIERE');

            $sql = $this->db->get_compiled_select();

            $result = $this->db->query($sql)->result();
            $t = sizeof($result);
            for($i=0;$i<$t;$i++){
                $nbr = getNbrEafByIdOpb($result[$i]->ID_OPB);
                $result[$i]->NB_EAF = $nbr['nb'];
                $result[$i]->NB_H = $nbr['H'];
                $result[$i]->NB_F = $nbr['F'];
                $result[$i]->EAF_1 = $nbr['eaf1'];
                $result[$i]->EAF_2 = $nbr['eaf2'];
                $result[$i]->EAF_3 = $nbr['eaf3'];
                $this->setNbAppui($result[$i],$annee);
            }


            return $result;

        }

        public function setNbAppui($obj,$annee){
            $this->db->select('count(*) nb,ID_TYPE');
            $this->db->from('detail_appui_opb');
            $this->db->where('ID_OP',$obj->ID_OPB);
            $this->db->where('YEAR(DATE_COLLECTE)',$annee);
            $this->db->group_by('ID_TYPE');
            $result = $this->db->get()->result();

            $obj->APPUI_TECHNIQUE = 0;
            $obj->INTRANT = 0;
            $obj->EQUIPEMENT = 0;
            $obj->INFRASTRUCTURE = 0;
            $obj->CONSEILS = 0;
            $obj->STRUCTURATION = 0;
            $obj->FORMATION = 0;

            foreach($result as $r){
                if($r->ID_TYPE==1) $obj->APPUI_TECHNIQUE = $r->nb;
                if($r->ID_TYPE==2) $obj->INTRANT = $r->nb;
                if($r->ID_TYPE==3) $obj->EQUIPEMENT = $r->nb;
                if($r->ID_TYPE==4) $obj->INFRASTRUCTURE = $r->nb;
                if($r->ID_TYPE==5) $obj->CONSEILS = $r->nb;
                if($r->ID_TYPE==6) $obj->STRUCTURATION = $r->nb;
                if($r->ID_TYPE==7) $obj->FORMATION = $r->nb;
            }
        }

	}