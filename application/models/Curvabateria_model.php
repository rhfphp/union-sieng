<?php

class Curvabateria_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function listar_baterias($id)
    {
        $this->db->select('modelo');
        $this->db->where('id', (int)$id);
        $bateria = $this->db->get('baterias')->row();
        return $bateria;
    }
    
    


}
