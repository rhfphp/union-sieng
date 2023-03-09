<?php

class Filtros_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }


    public function filtro_select($nome)
    {
        $this->db->where('nome', $nome);
        $filtro = $this->db->get('filtros')->result();
        return $filtro;
    }


}
