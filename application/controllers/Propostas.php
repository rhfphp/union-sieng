<?php
class Propostas extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Propostas_model');
    }

    public function index() {
        $data['propostas'] = $this->Propostas_model->listar_propostas();

        $this->load->view('propostas/listar', $data);
    }

  	public function create() {
      // Obtém o limite de clínicas do plano de assinatura atual do usuário
      $clinic_limit = $this->plan_model->get_clinic_limit_by_user_id($this->session->userdata('user_id'));
      // Obtém o número de clínicas existentes do usuário
      $clinic_count = $this->clinic_model->count_clinics_by_user_id($this->session->userdata('user_id'));

      if ($clinic_count >= $clinic_limit) {
          // O usuário atingiu o limite de clínicas
          $this->session->set_flashdata('error', 'Você atingiu o limite de clínicas permitido pelo seu plano de assinatura.');
          redirect('dashboard');
      }

      // Obtém os dados do formulário
      $data = array(
          'user_id' => $this->session->userdata('user_id'),
          'name' => $this->input->post('name'),
          'rent' => $this->input->post('rent'),
          'condominium' => $this->input->post('condominium'),
          // Adicione os demais campos de acordo com a estrutura da tabela "clinics"
      );

      // Insere os dados na tabela "clinics"
      $this->db->insert('clinics', $data);

      // Redireciona o usuário para uma página de sucesso
      redirect('clinics/success');
  }




  public function success() {
    echo "Clínica criada com sucesso!";
  }
}
