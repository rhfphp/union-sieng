<?php

class Baterias_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function listar_banco_baterias($id)
    {
        $this->db->select('quantidade');
        $this->db->where('equipamento', (int)$id);
        return $this->db->get('equipamentos_banco_de_baterias')->result();
    }
    
    


}
