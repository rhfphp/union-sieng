<?php

class Banco_de_baterias_model  extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function listar_banco_baterias($id)
    {
        $this->db->select('
        equipamentos_banco_de_baterias.id,
        equipamentos_banco_de_baterias.equipamento,
        equipamentos_banco_de_baterias.quantidade,
        equipamentos.id,
        ');
    
        $this->db->join('equipamentos', 'equipamentos.id = propostas.equipamento');
        $this->db->join('equipamentos_banco_de_baterias', 'equipamentos_banco_de_baterias.equipamentos = equipamentos.id');
        $this->db->where('equipamentos_banco_de_baterias.equipamento', $id);
        $banco_baterias = $this->db->get('equipamentos_banco_de_baterias')->result();


        //$this->proposta = $this->Propostas_model->proposta($id);
         // return $this->db->get('equipamentos_banco_de_baterias')->result();
    }


}
