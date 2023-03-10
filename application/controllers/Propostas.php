<?php
class Propostas extends CI_Controller {
    public function __construct() {
        parent::__construct();
        
        $this->load->model('Propostas_model');
        $this->load->model('Equipamentos_model');
        $this->load->model('Baterias_model');
        $this->load->model('Filtros_model');
        $this->load->model('Curvacsb_model');
        $this->load->model('Curvabateria_model');

        $this->equipamentos = $this->Equipamentos_model->listar();
    }

    public function index() {
        $this->propostas = $this->Propostas_model->listar_propostas();

        $this->load->view('propostas/listar', $this);
    }

    public function nova() {
        //$calcA = 0;
        //$calcB = 0;
        //$calcC = 0;
        //$calcD = 0;
        //$potencia_link_dc_w = 0;
       // $potencia_link_dc_w_fe = 0;
    
        $this->alterado_com_sucesso = false;
    
        $this->quantidade_de_baterias = $this->Baterias_model->listar_banco_baterias( $this->input->get('equipamento') );
    
        $this->equipamento_select = $this->Equipamentos_model->equipamento_select( $this->input->get('equipamento') );
    
        $this->filtro_tensao_de_carga = $this->Filtros_model->filtro_select('tensao_de_descarga');
        $this->filtro_autonomia = $this->Filtros_model->filtro_select('autonomia');
        $this->filtro_fator_de_envelhecimento = $this->Filtros_model->filtro_select('fator_de_envelhecimento');
    
        $potencia = (int)$this->input->get('potencia');
        $fatorPotencia = (int)$this->input->get('fator_potencia');
        $rendimento = (float)$this->input->get('rendimento');
        $numeroDeBaterias = (int)$this->input->get('numero_de_baterias');
    
        if (isset($rendimento) && $rendimento != 0 && $numeroDeBaterias != 0) {
            @$this->potencia_link_dc_w = ((($potencia * 1000) * $fatorPotencia) / $rendimento) / $numeroDeBaterias;

            $_GET['potencia_link_DC_W_FE'] = round($this->potencia_link_dc_w * (float)$this->input->get('fator_de_envelhecimento'), 2);

            @$bateria = $this->input->get('potencia_link_DC_W_FE');
            @$bateria2 = $this->input->get('potencia_link_DC_W_FE')/2;
            @$bateria3 = $this->input->get('potencia_link_DC_W_FE')/3;
            @$bateria4 = $this->input->get('potencia_link_DC_W_FE')/4;
            @$bateria5 = $this->input->get('potencia_link_DC_W_FE')/5;
        } else {
            $this->potencia_link_dc_w = 0;
        }
    
        if ($this->input->get('tensao_final_de_carga') !== null || $this->input->get('potencia_link_DC_W_FE') !== null || $this->input->get('autonomia') !== null ) {
            @$this->curva_csb = $this->Curvacsb_model->curva($this->input->get('autonomia'), $this->input->get('tensao_final_de_carga'), $this->input->get('potencia_link_DC_W_FE'));
            @$this->curva_csb_2 = $this->Curvacsb_model->curva($this->input->get('autonomia'), $this->input->get('tensao_final_de_carga'), $bateria2);
            @$this->curva_csb_3 = $this->Curvacsb_model->curva($this->input->get('autonomia'), $this->input->get('tensao_final_de_carga'), $bateria3);
            @$this->curva_csb_4 = $this->Curvacsb_model->curva($this->input->get('autonomia'), $this->input->get('tensao_final_de_carga'), $bateria4);
            @$this->curva_csb_5 = $this->Curvacsb_model->curva($this->input->get('autonomia'), $this->input->get('tensao_final_de_carga'), $bateria5);

            $bateria = null;
            if ($this->curva_csb !== null) {
                @$this->baterias_csb_banco_01 = $this->curva_csb[0]->bateria;
                @$this->baterias_csb_banco_02 = $this->curva_csb_2[0]->bateria;
                @$this->baterias_csb_banco_03 = $this->curva_csb_3[0]->bateria;
                @$this->baterias_csb_banco_04 = $this->curva_csb_4[0]->bateria;
                @$this->baterias_csb_banco_05 = $this->curva_csb_5[0]->bateria;

                @$this->bateria = $this->Curvabateria_model->listar_baterias($this->curva_csb[0]->bateria);
                @$this->bateria2 = $this->Curvabateria_model->listar_baterias($this->curva_csb_2[0]->bateria);
                @$this->bateria3= $this->Curvabateria_model->listar_baterias($this->curva_csb_3[0]->bateria);
                @$this->bateria4= $this->Curvabateria_model->listar_baterias($this->curva_csb_4[0]->bateria);
                @$this->bateria5= $this->Curvabateria_model->listar_baterias($this->curva_csb_5[0]->bateria);
            }
        }
    
        $this->load->view('propostas/layout-padrao-propostas', $this);
    }
    
}
