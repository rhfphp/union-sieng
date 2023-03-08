<?php

class Propostas_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function listar_propostas()
    {
        $this->db->select('
        propostas.id,
        propostas.identificacao,
        propostas.dataCadastro,
        propostas.cliente,
        clientes.nome AS cliente_nome,
        usuarios.nome AS vendedor_nome,
        equipamentos.nome AS equipamento_nome
        ');
        $this->db->join('clientes', 'clientes.id = propostas.cliente');
        $this->db->join('usuarios', 'usuarios.id = propostas.vendedor');
        $this->db->join('equipamentos', 'equipamentos.id = propostas.equipamento');
        return $this->db->get('propostas')->result();
    }

    public function proposta($id){
        
        $this->db->select('
        propostas.id,
        propostas.identificacao,
        propostas.dataCadastro,
        propostas.cliente,
        clientes.nome AS cliente_nome,
        usuarios.nome AS vendedor_nome,
        equipamentos.nome AS equipamento_nome
        ');
        $this->db->join('clientes', 'clientes.id = propostas.cliente');
        $this->db->join('usuarios', 'usuarios.id = propostas.vendedor');
        $this->db->join('equipamentos', 'equipamentos.id = propostas.equipamento');
        $this->db->where('propostas.id', $id);
        $proposta = $this->db->get('propostas')->result();
        
        return $proposta[0];
    }


}
