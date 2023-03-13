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

    public function equipamento_select($id)
    {
        $this->db->where('id', $id);
        $equipamento = $this->db->get('equipamentos')->result();
        if (count($equipamento) > 0) {
            return $equipamento[0];
        } else {
            return null; // ou lançar uma exceção, dependendo da sua necessidade
        }
    }
    


}
