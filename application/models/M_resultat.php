<?php
	class M_resultat extends CI_Model {

        public function getResultatListe($annee,$op){
            if($annee!='tous' && $annee!='' && $annee!=null){
                if($op=='opb'){
                    $this->db->select('opb.ID_OPB ID_OP,CODE_OPB CODE_OP,NOM_OPB NOM_OP,ANNEE,filieres.ID_FILIERE,NUM_CAMPAGNE,NOM_FILIERE,NOM_FOKONTANY,NOM_COMMUNE,NOM_DISTRICT,NOM_REGION');
                    $this->db->from('campagnes_opb');
                    $this->db->join('opb','opb.ID_OPB = campagnes_opb.ID_OPB');
                    $this->db->join('filieres','filieres.ID_FILIERE = campagnes_opb.ID_FILIERE');
                    $this->db->join('zone_intervention','zone_intervention.ID_FOKONTANY = opb.ID_FOKONTANY');
                    $this->db->group_by('opb.ID_OPB,CODE_OPB,NOM_OPB,ANNEE,filieres.ID_FILIERE,NOM_FILIERE,NUM_CAMPAGNE,NOM_FOKONTANY,NOM_COMMUNE,NOM_DISTRICT,NOM_REGION');
                    $this->db->where('annee',$annee);
                    return $this->db->get()->result();
                }
                if($op=='union'){
                    $this->db->select('tab_union.ID_UNION ID_OP,CODE_UNION CODE_OP,NOM_UNION NOM_OP,ANNEE,filieres.ID_FILIERE,NUM_CAMPAGNE,NOM_FILIERE,NOM_FOKONTANY,NOM_COMMUNE,NOM_DISTRICT,NOM_REGION');
                    $this->db->from('campagnes_opb');
                    $this->db->join('filieres','filieres.ID_FILIERE = campagnes_opb.ID_FILIERE');
                    $this->db->join('union_opb','campagnes_opb.ID_OPB = union_opb.ID_OPB');
                    $this->db->join('tab_union','tab_union.ID_UNION = union_opb.ID_UNION');
                    $this->db->join('zone_intervention','zone_intervention.ID_FOKONTANY = tab_union.ID_FOKONTANY');
                    $this->db->group_by('tab_union.ID_UNION,CODE_UNION,NOM_UNION,ANNEE,filieres.ID_FILIERE,NUM_CAMPAGNE,NOM_FILIERE,NOM_FOKONTANY,NOM_COMMUNE,NOM_DISTRICT,NOM_REGION');
                    $this->db->where('annee',$annee);
                    return $this->db->get()->result();
                }
                if($op=='opr'){
                    $this->db->select('opr.ID_OPR ID_OP,CODE_OPR CODE_OP,NOM_OPR NOM_OP,ANNEE,filieres.ID_FILIERE,NUM_CAMPAGNE,NOM_FILIERE,NOM_FOKONTANY,NOM_COMMUNE,NOM_DISTRICT,NOM_REGION');
                    $this->db->from('campagnes_opb');
                    $this->db->join('filieres','filieres.ID_FILIERE = campagnes_opb.ID_FILIERE');
                    $this->db->join('union_opb','campagnes_opb.ID_OPB = union_opb.ID_OPB');
                    $this->db->join('tab_union','tab_union.ID_UNION = union_opb.ID_UNION');
                    $this->db->join('opr','opr.ID_OPR = tab_union.ID_OPR');
                    $this->db->join('zone_intervention','zone_intervention.ID_FOKONTANY = opr.ID_FOKONTANY');
                    $this->db->group_by('opr.ID_OPR,CODE_OPR,NOM_OPR,ANNEE,filieres.ID_FILIERE,NOM_FILIERE,NUM_CAMPAGNE,NOM_FOKONTANY,NOM_COMMUNE,NOM_DISTRICT,NOM_REGION');
                    $this->db->where('annee',$annee);
                    $union = $this->db->get_compiled_select();

                    $this->db->select('opr.ID_OPR ID_OP,CODE_OPR CODE_OP,NOM_OPR NOM_OP,ANNEE,filieres.ID_FILIERE,NUM_CAMPAGNE,NOM_FILIERE,NOM_FOKONTANY,NOM_COMMUNE,NOM_DISTRICT,NOM_REGION');
                    $this->db->from('campagnes_opb');
                    $this->db->join('filieres','filieres.ID_FILIERE = campagnes_opb.ID_FILIERE');
                    $this->db->join('opr_opb','campagnes_opb.ID_OPB = opr_opb.ID_OPB');
                    $this->db->join('opr','opr.ID_OPR = opr_opb.ID_OPR');
                    $this->db->join('zone_intervention','zone_intervention.ID_FOKONTANY = opr.ID_FOKONTANY');
                    $this->db->group_by('opr.ID_OPR,CODE_OPR,NOM_OPR,ANNEE,filieres.ID_FILIERE,NOM_FILIERE,NUM_CAMPAGNE,NOM_FOKONTANY,NOM_COMMUNE,NOM_DISTRICT,NOM_REGION');
                    $this->db->where('annee',$annee);
                    $opb = $this->db->get_compiled_select();

                    return $this->db->query($opb . ' UNION ' . $union)->result();
                }
                if($op=='opf'){
                    $this->db->select('opf.ID_OPF ID_OP,CODE_OPF CODE_OP,NOM_OPF NOM_OP,ANNEE,filieres.ID_FILIERE,NUM_CAMPAGNE,NOM_FILIERE,NOM_FOKONTANY,NOM_COMMUNE,NOM_DISTRICT,NOM_REGION');
                    $this->db->from('campagnes_opb');
                    $this->db->join('filieres','filieres.ID_FILIERE = campagnes_opb.ID_FILIERE');
                    $this->db->join('union_opb','campagnes_opb.ID_OPB = union_opb.ID_OPB');
                    $this->db->join('tab_union','tab_union.ID_UNION = union_opb.ID_UNION');
                    $this->db->join('opr','opr.ID_OPR = tab_union.ID_OPR');
                    $this->db->join('opf','opf.ID_OPF = opr.ID_OPF');
                    $this->db->join('zone_intervention','zone_intervention.ID_FOKONTANY = opf.ID_FOKONTANY');
                    $this->db->group_by('opr.ID_OPR,CODE_OPR,NOM_OPR,ANNEE,filieres.ID_FILIERE,NOM_FILIERE,NUM_CAMPAGNE,NOM_FOKONTANY,NOM_COMMUNE,NOM_DISTRICT,NOM_REGION');
                    $this->db->where('annee',$annee);
                    $union = $this->db->get_compiled_select();

                    $this->db->select('opf.ID_OPF ID_OP,CODE_OPF CODE_OP,NOM_OPF NOM_OP,ANNEE,filieres.ID_FILIERE,NUM_CAMPAGNE,NOM_FILIERE,NOM_FOKONTANY,NOM_COMMUNE,NOM_DISTRICT,NOM_REGION');
                    $this->db->from('campagnes_opb');
                    $this->db->join('filieres','filieres.ID_FILIERE = campagnes_opb.ID_FILIERE');
                    $this->db->join('opr_opb','campagnes_opb.ID_OPB = opr_opb.ID_OPB');
                    $this->db->join('opr','opr.ID_OPR = opr_opb.ID_OPR');
                    $this->db->join('opf','opf.ID_OPF = opr.ID_OPF');
                    $this->db->join('zone_intervention','zone_intervention.ID_FOKONTANY = opf.ID_FOKONTANY');
                    $this->db->group_by('opr.ID_OPR,CODE_OPR,NOM_OPR,ANNEE,filieres.ID_FILIERE,NOM_FILIERE,NUM_CAMPAGNE,NOM_FOKONTANY,NOM_COMMUNE,NOM_DISTRICT,NOM_REGION');
                    $this->db->where('annee',$annee);
                    $opb = $this->db->get_compiled_select();

                    return $this->db->query($opb . ' UNION ' . $union)->result();
                }
            }
            else{
                if($op=='opb'){
                    $this->db->select('opb.ID_OPB ID_OP,CODE_OPB CODE_OP,NOM_OPB NOM_OP,ANNEE,filieres.ID_FILIERE,NOM_FILIERE,NUM_CAMPAGNE,NOM_FOKONTANY,NOM_COMMUNE,NOM_DISTRICT,NOM_REGION');
                    $this->db->from('campagnes_opb');
                    $this->db->join('opb','opb.ID_OPB = campagnes_opb.ID_OPB');
                    $this->db->join('filieres','filieres.ID_FILIERE = campagnes_opb.ID_FILIERE');
                    $this->db->join('zone_intervention','zone_intervention.ID_FOKONTANY = opb.ID_FOKONTANY');
                    $this->db->group_by('opb.ID_OPB,CODE_OPB,NOM_OPB,ANNEE,filieres.ID_FILIERE,NOM_FILIERE,NUM_CAMPAGNE,NOM_FOKONTANY,NOM_COMMUNE,NOM_DISTRICT,NOM_REGION');
                    return $this->db->get()->result();
                }
                if($op=='union'){
                    $this->db->select('tab_union.ID_UNION ID_OP,CODE_UNION CODE_OP,NOM_UNION NOM_OP,ANNEE,NUM_CAMPAGNE,filieres.ID_FILIERE,NOM_FILIERE,NOM_FOKONTANY,NOM_COMMUNE,NOM_DISTRICT,NOM_REGION');
                    $this->db->from('campagnes_opb');
                    $this->db->join('filieres','filieres.ID_FILIERE = campagnes_opb.ID_FILIERE');
                    $this->db->join('union_opb','campagnes_opb.ID_OPB = union_opb.ID_OPB');
                    $this->db->join('tab_union','tab_union.ID_UNION = union_opb.ID_UNION');
                    $this->db->join('zone_intervention','zone_intervention.ID_FOKONTANY = tab_union.ID_FOKONTANY');
                    $this->db->group_by('tab_union.ID_UNION,CODE_UNION,NOM_UNION,ANNEE,NUM_CAMPAGNE,filieres.ID_FILIERE,NOM_FILIERE,NOM_FOKONTANY,NOM_COMMUNE,NOM_DISTRICT,NOM_REGION');
                    return $this->db->get()->result();
                }
                if($op=='opr'){
                    $this->db->select('opr.ID_OPR ID_OP,CODE_OPR CODE_OP,NOM_OPR NOM_OP,ANNEE,NUM_CAMPAGNE,filieres.ID_FILIERE,NOM_FILIERE,NOM_FOKONTANY,NOM_COMMUNE,NOM_DISTRICT,NOM_REGION');
                    $this->db->from('campagnes_opb');
                    $this->db->join('filieres','filieres.ID_FILIERE = campagnes_opb.ID_FILIERE');
                    $this->db->join('union_opb','campagnes_opb.ID_OPB = union_opb.ID_OPB');
                    $this->db->join('tab_union','tab_union.ID_UNION = union_opb.ID_UNION');
                    $this->db->join('opr','opr.ID_OPR = tab_union.ID_OPR');
                    $this->db->join('zone_intervention','zone_intervention.ID_FOKONTANY = opr.ID_FOKONTANY');
                    $this->db->group_by('opr.ID_OPR,CODE_OPR,NOM_OPR,ANNEE,NUM_CAMPAGNE,filieres.ID_FILIERE,NOM_FILIERE,NOM_FOKONTANY,NOM_COMMUNE,NOM_DISTRICT,NOM_REGION');
                    $union = $this->db->get_compiled_select();

                    $this->db->select('opr.ID_OPR ID_OP,CODE_OPR CODE_OP,NOM_OPR NOM_OP,ANNEE,NUM_CAMPAGNE,filieres.ID_FILIERE,NOM_FILIERE,NOM_FOKONTANY,NOM_COMMUNE,NOM_DISTRICT,NOM_REGION');
                    $this->db->from('campagnes_opb');
                    $this->db->join('filieres','filieres.ID_FILIERE = campagnes_opb.ID_FILIERE');
                    $this->db->join('opr_opb','campagnes_opb.ID_OPB = opr_opb.ID_OPB');
                    $this->db->join('opr','opr.ID_OPR = opr_opb.ID_OPR');
                    $this->db->join('zone_intervention','zone_intervention.ID_FOKONTANY = opr.ID_FOKONTANY');
                    $this->db->group_by('opr.ID_OPR,CODE_OPR,NOM_OPR,ANNEE,NUM_CAMPAGNE,filieres.ID_FILIERE,NOM_FILIERE,NOM_FOKONTANY,NOM_COMMUNE,NOM_DISTRICT,NOM_REGION');
                    $opb = $this->db->get_compiled_select();

                    return $this->db->query($opb . ' UNION ' . $union)->result();
                }
                if($op=='opf'){
                    $this->db->select('opf.ID_OPF ID_OP,CODE_OPF CODE_OP,NOM_OPF NOM_OP,ANNEE,NUM_CAMPAGNE,filieres.ID_FILIERE,NOM_FILIERE,NOM_FOKONTANY,NOM_COMMUNE,NOM_DISTRICT,NOM_REGION');
                    $this->db->from('campagnes_opb');
                    $this->db->join('filieres','filieres.ID_FILIERE = campagnes_opb.ID_FILIERE');
                    $this->db->join('union_opb','campagnes_opb.ID_OPB = union_opb.ID_OPB');
                    $this->db->join('tab_union','tab_union.ID_UNION = union_opb.ID_UNION');
                    $this->db->join('opr','opr.ID_OPR = tab_union.ID_OPR');
                    $this->db->join('opf','opf.ID_OPF = opr.ID_OPF');
                    $this->db->join('zone_intervention','zone_intervention.ID_FOKONTANY = opf.ID_FOKONTANY');
                    $this->db->group_by('opr.ID_OPR,CODE_OPR,NOM_OPR,ANNEE,NUM_CAMPAGNE,filieres.ID_FILIERE,NOM_FILIERE,NOM_FOKONTANY,NOM_COMMUNE,NOM_DISTRICT,NOM_REGION');
                    $union = $this->db->get_compiled_select();

                    $this->db->select('opf.ID_OPF ID_OP,CODE_OPF CODE_OP,NOM_OPF NOM_OP,ANNEE,NUM_CAMPAGNE,filieres.ID_FILIERE,NOM_FILIERE,NOM_FOKONTANY,NOM_COMMUNE,NOM_DISTRICT,NOM_REGION');
                    $this->db->from('campagnes_opb');
                    $this->db->join('filieres','filieres.ID_FILIERE = campagnes_opb.ID_FILIERE');
                    $this->db->join('opr_opb','campagnes_opb.ID_OPB = opr_opb.ID_OPB');
                    $this->db->join('opr','opr.ID_OPR = opr_opb.ID_OPR');
                    $this->db->join('opf','opf.ID_OPF = opr.ID_OPF');
                    $this->db->join('zone_intervention','zone_intervention.ID_FOKONTANY = opf.ID_FOKONTANY');
                    $this->db->group_by('opr.ID_OPR,CODE_OPR,NOM_OPR,ANNEE,NUM_CAMPAGNE,filieres.ID_FILIERE,NOM_FILIERE,NOM_FOKONTANY,NOM_COMMUNE,NOM_DISTRICT,NOM_REGION');
                    $opb = $this->db->get_compiled_select();

                    return $this->db->query($opb . ' UNION ' . $union)->result();
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

        public function getFicheResultat($op,$idOp,$annee,$idFiliere,$campagne){
            if($op=='opb') return $this->getFicheResultatByOpb($idOp,$annee,$idFiliere,$campagne);
            if($op=='union') return $this->getFicheResultatByUnion($idOp,$annee,$idFiliere,$campagne);
            if($op=='opr') return $this->getFicheResultatByOpr($idOp,$annee,$idFiliere,$campagne);
            if($op=='opf') return $this->getFicheResultatByOpf($idOp,$annee,$idFiliere,$campagne);
        }

        public function getFicheResultatByOpb($idOpb,$annee,$idFiliere,$campagne){
            $this->db->select('opb.ID_OPB ID_OP,CODE_OPB CODE_OP,NOM_OPB NOM_OP,filieres.ID_FILIERE,NOM_FILIERE,NUM_CAMPAGNE,CODE_MENAGE,NOM_MENAGE,SURNOM,SUPERFICIE,QTE_PRODUITE,QTE_COMMERCIALISEE,MONTANT,ANNEE,DATE_COLLECTE');
            $this->db->from('campagnes_opb');
            $this->db->join('opb','opb.ID_OPB = campagnes_opb.ID_OPB');
            $this->db->join('filieres','filieres.ID_FILIERE = campagnes_opb.ID_FILIERE');
            $this->db->join('menages','menages.ID_MENAGE = campagnes_opb.ID_MENAGE');
            $this->db->where('opb.ID_OPB',$idOpb);
            $this->db->where('annee',$annee);
            $this->db->where('filieres.ID_FILIERE',$idFiliere);
            $this->db->where('NUM_CAMPAGNE',$campagne);
            return $this->db->get()->result();
        }

        public function getFicheResultatByUnion($idUnion,$annee,$idFiliere,$campagne){
            $this->db->select('tab_union.ID_UNION ID_OP,CODE_UNION CODE_OP,NOM_UNION NOM_OP,CODE_OPB,NOM_OPB,ANNEE,NOM_FILIERE,SUM(SUPERFICIE) SUPERFICIE,SUM(QTE_PRODUITE) QTE_PRODUITE,SUM(QTE_COMMERCIALISEE) QTE_COMMERCIALISEE,SUM(MONTANT) MONTANT,');
            $this->db->from('campagnes_opb');
            $this->db->join('opb','opb.ID_OPB = campagnes_opb.ID_OPB');
            $this->db->join('union_opb','union_opb.ID_OPB = opb.ID_OPB');
            $this->db->join('tab_union','tab_union.ID_UNION = union_opb.ID_UNION');
            $this->db->join('filieres','filieres.ID_FILIERE = campagnes_opb.ID_FILIERE');
            $this->db->group_by('tab_union.ID_UNION,CODE_UNION,NOM_UNION,opb.ID_OPB,NOM_OPB,ANNEE,NOM_FILIERE');

            $this->db->where('tab_union.ID_UNION',$idUnion);
            $this->db->where('annee',$annee);
            $this->db->where('filieres.ID_FILIERE',$idFiliere);
            $this->db->where('NUM_CAMPAGNE',$campagne);

            return $this->db->get()->result();
        }

        public function getFicheResultatByOpr($idOpr,$annee,$idFiliere,$campagne){
            $this->db->select('opr.ID_OPR ID_OP,CODE_OPR CODE_OP,NOM_OPR NOM_OP,CODE_UNION,NOM_UNION,ANNEE,NOM_FILIERE,SUM(SUPERFICIE) SUPERFICIE,SUM(QTE_PRODUITE) QTE_PRODUITE,SUM(QTE_COMMERCIALISEE) QTE_COMMERCIALISEE,SUM(MONTANT) MONTANT,');
            $this->db->from('campagnes_opb');
            $this->db->join('union_opb','union_opb.ID_OPB = campagnes_opb.ID_OPB');
            $this->db->join('tab_union','tab_union.ID_UNION = union_opb.ID_UNION');
            $this->db->join('opr','opr.ID_OPR = tab_union.ID_OPR');
            $this->db->join('filieres','filieres.ID_FILIERE = campagnes_opb.ID_FILIERE');
            $this->db->group_by('opr.ID_OPR,CODE_OPR,NOM_OPR,tab_union.ID_UNION,NOM_UNION,ANNEE,NOM_FILIERE');

            $this->db->where('opr.ID_OPR',$idOpr);
            $this->db->where('annee',$annee);
            $this->db->where('filieres.ID_FILIERE',$idFiliere);
            $this->db->where('NUM_CAMPAGNE',$campagne);
            $union = $this->db->get_compiled_select();

            $this->db->select('opr.ID_OPR ID_OP,CODE_OPR CODE_OP,NOM_OPR NOM_OP,CODE_OPB,NOM_OPB,ANNEE,NOM_FILIERE,SUM(SUPERFICIE) SUPERFICIE,SUM(QTE_PRODUITE) QTE_PRODUITE,SUM(QTE_COMMERCIALISEE) QTE_COMMERCIALISEE,SUM(MONTANT) MONTANT,');
            $this->db->from('campagnes_opb');
            $this->db->join('opb','opb.ID_OPB = campagnes_opb.ID_OPB');
            $this->db->join('opr_opb','opr_opb.ID_OPB = opb.ID_OPB');
            $this->db->join('opr','opr.ID_OPR = opr_opb.ID_OPR');
            $this->db->join('filieres','filieres.ID_FILIERE = campagnes_opb.ID_FILIERE');
            $this->db->group_by('opr.ID_OPR,CODE_OPR,NOM_OPR,opb.ID_OPB,NOM_OPB,ANNEE,NOM_FILIERE');

            $this->db->where('opr.ID_OPR',$idOpr);
            $this->db->where('annee',$annee);
            $this->db->where('filieres.ID_FILIERE',$idFiliere);
            $this->db->where('NUM_CAMPAGNE',$campagne);
            $opb = $this->db->get_compiled_select();

            return $this->db->query($opb . ' UNION ' . $union)->result();
        }

        public function getFicheResultatByOpf($idOpf,$annee,$idFiliere,$campagne){
            $this->db->select('opf.ID_OPF ID_OP,CODE_OPF CODE_OP,NOM_OPF NOM_OP,CODE_OPR,NOM_OPR,ANNEE,NOM_FILIERE,SUM(SUPERFICIE) SUPERFICIE,SUM(QTE_PRODUITE) QTE_PRODUITE,SUM(QTE_COMMERCIALISEE) QTE_COMMERCIALISEE,SUM(MONTANT) MONTANT');
            $this->db->from('campagnes_opb');
            $this->db->join('union_opb','union_opb.ID_OPB = campagnes_opb.ID_OPB');
            $this->db->join('tab_union','tab_union.ID_UNION = union_opb.ID_UNION');
            $this->db->join('opr','opr.ID_OPR = tab_union.ID_OPR');
            $this->db->join('opf','opf.ID_OPF = opr.ID_OPF');
            $this->db->join('filieres','filieres.ID_FILIERE = campagnes_opb.ID_FILIERE');
            $this->db->group_by('opf.ID_OPF,CODE_OPF,NOM_OPF,opr.ID_OPR,NOM_OPR,ANNEE,NOM_FILIERE');

            $this->db->where('opf.ID_OPF',$idOpf);
            $this->db->where('annee',$annee);
            $this->db->where('filieres.ID_FILIERE',$idFiliere);
            $this->db->where('NUM_CAMPAGNE',$campagne);
            $union = $this->db->get_compiled_select();

            $this->db->select('opf.ID_OPF ID_OP,CODE_OPF CODE_OP,NOM_OPF NOM_OP,CODE_OPR,NOM_OPR,ANNEE,NOM_FILIERE,SUM(SUPERFICIE) SUPERFICIE,SUM(QTE_PRODUITE) QTE_PRODUITE,SUM(QTE_COMMERCIALISEE) QTE_COMMERCIALISEE,SUM(MONTANT) MONTANT');
            $this->db->from('campagnes_opb');
            $this->db->join('opb','opb.ID_OPB = campagnes_opb.ID_OPB');
            $this->db->join('opr_opb','opr_opb.ID_OPB = opb.ID_OPB');
            $this->db->join('opr','opr.ID_OPR = opr_opb.ID_OPR');
            $this->db->join('opf','opf.ID_OPF = opr.ID_OPF');
            $this->db->join('filieres','filieres.ID_FILIERE = campagnes_opb.ID_FILIERE');
            $this->db->group_by('opf.ID_OPF,CODE_OPF,NOM_OPF,opr.ID_OPR,NOM_OPR,ANNEE,NOM_FILIERE');

            $this->db->where('opf.ID_OPF',$idOpf);
            $this->db->where('annee',$annee);
            $this->db->where('filieres.ID_FILIERE',$idFiliere);
            $this->db->where('NUM_CAMPAGNE',$campagne);
            $opb = $this->db->get_compiled_select();

            $query = $this->db->query('SELECT ID_OP,CODE_OP,NOM_OP,CODE_OPR,NOM_OPR,ANNEE,NOM_FILIERE,SUM(SUPERFICIE) SUPERFICIE,SUM(QTE_PRODUITE) QTE_PRODUITE,SUM(QTE_COMMERCIALISEE) QTE_COMMERCIALISEE,SUM(MONTANT) MONTANT FROM (('.$opb . ') UNION (' . $union.')) as q GROUP BY ID_OP,CODE_OP,NOM_OP,CODE_OPR,NOM_OPR,ANNEE,NOM_FILIERE');
            return $query->result();
        }
	}