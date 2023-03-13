<?php

class Curvacsb_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }


    public function curva($minutos, $tensao, $valor)
    {
        if(is_null($valor)){
            $valor = 99999999999999999999999;
        }
        $this->db->where('minutos', $minutos);
        $this->db->where('tensao_final', $tensao);
        $this->db->where('valor >=', $valor); // arredonda o valor para um número inteiro

        //$this->db->where('valor >', (double)$valor); // alteração
        $this->db->order_by('valor', 'ASC'); // adicionado
        $this->db->limit(1);
        $resultado = $this->db->get('curvas_csb')->result();
       // $valorMaisProximo = ceil($resultado->valor);

        return $resultado;
    }
    


}
