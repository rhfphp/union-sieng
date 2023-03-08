<?php

class Propostas_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function listar_propostas()
    {
        return $this->db->get('propostas')->result();
    }


}
