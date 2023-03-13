<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('clinic_model');
        $this->load->model('plan_model');
        $this->load->model('user_model');
    }

   public function index() {
       // Verifica se o usuário está logado
       if (!$this->session->userdata('user_id')) {
           redirect('login');
       }

       // Verifica se o usuário é administrador
       if ($this->session->userdata('is_admin')) {
           // Carrega as informações de todas as clínicas
           $clinics = $this->clinic_model->get_clinics_by_user_id($this->session->userdata('user_id'));

           // Carrega a view dashboard_admin e passa as informações das clínicas
           $data['clinics'] = $clinics;
           $this->load->view('header');
           $this->load->view('dashboard_admin', $data);
           $this->load->view('footer');
       } else {
           // Obtem o ID do usuário
           $user_id = $this->session->userdata('user_id');

           // Obtem o plano do usuário
           $user_plan = $this->user_model->get_subscription_plan_by_user_id($user_id);
           $plan_clinic_limit = $user_plan->clinic_limit;

			if (!$user_plan) {
                // Se o usuário não possui uma assinatura, redireciona para uma página informando o erro
                redirect('dashboard/error');
            }
           // Obtem a quantidade de clínicas cadastradas pelo usuário
           $user_clinic_count = $this->clinic_model->count_user_clinics($user_id);

           // Verifica se o usuário já atingiu o limite de clínicas permitido pelo plano
           if ($user_clinic_count >= $plan_clinic_limit) {
               // Se o usuário atingiu o limite, redireciona para uma página informando o erro
               redirect('dashboard/error');
           }

           // Carrega as informações da clínica do usuário
           $user_name = $this->session->userdata('name');
           $clinic = $this->clinic_model->get_clinic_by_user_id($user_id);

           if (!$clinic) {
               // Se o usuário não possui uma clínica cadastrada, redireciona para a página de criação
               redirect('clinic/create');
           } else {
               // Carrega a view dashboard_user e passa as informações da clínica
               $data['clinic'] = $clinic;
               $data['user_name'] = $user_name;
               $this->load->view('header');
               $this->load->view('dashboard_user', $data);
               $this->load->view('footer');
           }
       }
   }




	public function admin()
	{
	if (!$this->session->userdata('logged_in')) {
    			redirect('login');
    		}
		// Verifica se o usuário é administrador
		if (!$this->session->userdata('is_admin')) {
			redirect('dashboard');
		}

		$user_id = $this->session->userdata('user_id');
		$user_plan = $this->plan_model->get_subscription_plan_by_user_id($user_id);
		$plano_id = $user_plan->subscription_plan_id;

		if ($user_plan && $subscription_plan_id != -1) {
			$clinics_count = $this->clinic_model->get_clinic_by_user_id($user_id);

			if ($clinics_count >= $user_plan->clinic_limit) {
				$this->session->set_flashdata('error_msg', 'Você atingiu o limite de clínicas permitido pelo seu plano.');
				redirect('dashboard');
			}
		}

		// Carrega as informações de todas as clínicas

		$clinics = $this->clinic_model->get_clinics_by_user_id($user_id);

		// Carrega a view dashboard_admin e passa as informações das clínicas


        $data['clinics'] = $clinics;
        $this->load->view('header');
        $this->load->view('dashboard_admin', $data);
        $this->load->view('footer');

	}


	public function user()
	{
		$user_data = $this->session->userdata();
		// Verifica se o usuário está logado
		if (!$this->session->userdata('logged_in')) {
			redirect('login');
		}
		// Carrega as informações da clínica do usuário
		$user_id = $this->session->userdata('user_id');
		$users = $this->session->userdata('name');
		$clinic = $this->clinic_model->get_clinic_by_user_id($user_id);
		$user_name = $this->session->userdata('name');



		// Carrega a view dashboard_user e passa as informações da clínica
		//$data['clinic'] = $clinic;
		$data['name'] = $user_name;
		$this->load->view('header');
		$this->load->view('dashboard_user', $data);
		$this->load->view('footer');
	}

    public function create_clinic() {
        // Verifica se o usuário é admin
        if (!$this->session->userdata('is_admin')) {
            redirect('dashboard');
        }

        // Carrega as views
        $this->load->view('header');
        $this->load->view('sidebar');
        $this->load->view('create_clinic');
        $this->load->view('footer');

        // Validação do formulário
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Nome da clínica', 'required');
        $this->form_validation->set_rules('monthly_rent', 'Aluguel Mensal', 'required');
        $this->form_validation->set_rules('monthly_condominium', 'Condomínio Mensal', 'required');
        $this->form_validation->set_rules('annual_garbage_fee', 'Taxas de Lixo (Anual)', 'required');
        $this->form_validation->set_rules('annual_iptu', 'IPTU (Anual)', 'required');
        $this->form_validation->set_rules('annual_council_fee', 'Anuidade de Conselhos (Anual)', 'required');
        $this->form_validation->set_rules('annual_permits_fee', 'Alvarás (Anual)', 'required');
        $this->form_validation->set_rules('annual_digital_certificate_fee', 'Certificado Digital (Anual)', 'required');
        $this->form_validation->set_rules('number_of_rooms', 'Número de Salas de Atendimento', 'required');
        $this->form_validation->set_rules('technical_equipment_total_cost', 'Valor total de investimento em equipamentos técnicos', 'required');
        $this->form_validation->set_rules('furniture_and_general_equipment_total_cost', 'Valor total de investimento em móveis e equipamentos Gerais', 'required');

        if ($this->form_validation->run() == TRUE) {
            $clinic_data = array(
                'name' => $this->input->post('name'),
                'rent' => $this->input->post('rent'),
                'condominium' => $this->input->post('condominium'),
                'garbage_collection_fee' => $this->input->post('garbage_collection_fee'),
                'property_tax' => $this->input->post('property_tax'),
                'council_annuity' => $this->input->post('council_annuity'),
                'permits' => $this->input->post('permits'),
                'digital_certificate' => $this->input->post('digital_certificate'),
                'number_of_rooms' => $this->input->post('number_of_rooms'),
                'technical_equipment_investment' => $this->input->post('technical_equipment_investment'),
                'general_equipment_investment' => $this->input->post('general_equipment_investment'),
                'user_id' => $this->session->userdata('user_id')
            );

            $this->clinic_model->add_clinic($clinic_data);

            redirect('dashboard');
        } else {
            $this->load->view('dashboard/header');
            $this->load->view('dashboard/create_clinic');
            $this->load->view('dashboard/footer');
        }
}
}
