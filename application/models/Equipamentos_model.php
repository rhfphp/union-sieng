<?php

class Equipamentos_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function listar()
    {
        return $this->db->get('equipamentos')->result();
    }


}
