<?php
class Propostas extends CI_Controller {
    public function __construct() {
        parent::__construct();
        
        $this->load->model('Propostas_model');
        $this->load->model('Equipamentos_model');
        $this->load->model('Baterias_model');
        $this->load->model('Filtros_model');

        $this->equipamentos = $this->Equipamentos_model->listar();
    }

    public function index() {
        $this->propostas = $this->Propostas_model->listar_propostas();

        $this->load->view('propostas/listar', $this);
    }

    public function nova() {

        $this->alterado_com_sucesso = false;

        $this->quantidade_de_baterias = $this->Baterias_model->listar_banco_baterias( $this->input->get('equipamento') );

        $this->equipamento_select = $this->Equipamentos_model->equipamento_select( $this->input->get('equipamento') );

        $this->filtro_tensao_de_carga = $this->Filtros_model->filtro_select('tensao_de_descarga');
        $this->filtro_autonomia = $this->Filtros_model->filtro_select('autonomia');
        $this->filtro_fator_de_envelhecimento = $this->Filtros_model->filtro_select('fator_de_envelhecimento');
        
        $this->load->view('propostas/layout-padrao-propostas', $this);
    }
}
