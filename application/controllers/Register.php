<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('plan_model');
        $this->load->database();
    }

    public function index() {
        $plans = $this->plan_model->get_subscription_plans();

        // Carrega a view subscription_plans e passa os dados dos planos
        $data['plans'] = $plans;
        $this->load->view('header');
        $this->load->view('register', $data);
        $this->load->view('footer');
    }

    public function save() {

    $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email|is_unique[users.email]');
    $this->form_validation->set_rules('password', 'Senha', 'required|min_length[6]');
    $this->form_validation->set_rules('password_confirm', 'Confirme a Senha', 'required|matches[password]');
    $this->form_validation->set_rules('plan_id', 'Plano', 'required');

    if ($this->form_validation->run() == FALSE) {
        $data['plans'] = $this->plan_model->get_subscription_plans();
        $data['validation_errors'] = validation_errors();
        $this->load->view('header');
        $this->load->view('register', $data);
        $this->load->view('footer');
    } else {
        $plans = $this->plan_model->get_subscription_plans();


        $data['plans'] = $plans;
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        $plan_id = $this->input->post('plan_id');



        $user_data = array(
            'email' => $email,
            'password' => $password,
            'plan_id' => $plan_id,
            'name' => $name,

        );

        $user_id = $this->user_model->add_user($user_data);
		$this->session->set_flashdata('success_msg', 'Cadastrado com sucesso');
        redirect('login');
    }
}

}
