<?php
class Propostas extends CI_Controller {
    public function __construct() {
        parent::__construct();
        
        $this->load->model('Propostas_model');
        $this->load->model('Equipamentos_model');

        $this->equipamentos = $this->Equipamentos_model->listar();
    }

    public function index() {
        $this->propostas = $this->Propostas_model->listar_propostas();

        $this->load->view('propostas/listar', $this);
    }

    public function nova() {

        $this->alterado_com_sucesso = false;
        
        $this->load->view('propostas/layout-padrao-propostas', $this);
    }

    public function editar($id) {

        $this->alterado_com_sucesso = false;
        
       
        if(!$_POST){
            $id = base64_decode($id);
            $this->proposta = $this->Propostas_model->proposta($id);
        }else{
            $this->alterado_com_sucesso = true;
            $this->Propostas_model->atualizar($id);
        }
        
        $this->load->view('propostas/layout-padrao-propostas', $this);
    }




  public function success() {
    echo "Clínica criada com sucesso!";
  }
}
