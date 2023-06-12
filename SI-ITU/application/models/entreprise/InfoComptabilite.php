<?php
defined('BASEPATH') or exit('No direct script access allowed');

class InfoComptabilite extends CI_Model
{
    public function insert_info_comptabilite($idSociete, $capitale, $NIF, $NSTAT, $NRCS, $idDevise, $scanNIF, $scanNSTAT, $scanNRCS)
    {
        $this->db->insert('infoComptabilite', array(
            'idSociete' => $idSociete,
            'capitale' => $capitale,
            'NIF' => $NIF,
            'NSTAT' => $NSTAT,
            'NRCS' => $NRCS,
            'idDevise' => $idDevise,
        ));

        $id = $this->db->insert_id();

        $this->db->insert('Scan', array(
            'id' => $id,
            'scanNIF' => $scanNIF,
            'scanNSTAT' => $scanNSTAT,
            'scanNRCS' => $scanNRCS,
        ));

        return $id;
    }
    public function update_info_comptabilite($id, $idDevise, $idSociete, $capitale, $NIF, $NSTAT, $NRCS)
    {

        $data = array(
            'NIF' => $NIF,
            'NSTAT' => $NSTAT,
            'capitale' => $capitale,
            'idDevise' => $idDevise,
            'NRCS' => $NRCS,
            'idSociete' => $idSociete,
        );

        $this->db->where('id', $id);
        $this->db->update('infoComptabilite', $data);

    }
}
