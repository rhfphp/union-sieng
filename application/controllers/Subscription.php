<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Subscription extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Carrega o model plan_model
        $this->load->model('plan_model');
    }

    public function index() {
        // Obtém os planos de assinatura
        $plans = $this->plan_model->get_subscription_plans();

        // Carrega a view subscription_plans e passa os dados dos planos
        $data['plans'] = $plans;
        $this->load->view('header');
        $this->load->view('subscription_plans', $data);
        $this->load->view('footer');
    }

    public function subscribe() {
        // Verifica se o formulário foi submetido
        if ($this->input->post()) {
            // Recupera os dados do formulário
            $data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'plan_id' => $this->input->post('plan_id')
            );

            // Salva o usuário no banco de dados
            $this->load->model('user_model');
            $user_id = $this->user_model->save_user($data);

            // Verifica se o usuário foi salvo com sucesso
            if ($user_id) {
                // Redireciona para a página de sucesso
                redirect(base_url('subscription/success'));
            } else {
                // Exibe uma mensagem de erro
                $data['error'] = 'Não foi possível salvar o usuário. Tente novamente mais tarde.';
            }
        }

        // Obtém os planos de assinatura
        $plans = $this->plan_model->get_subscription_plans();

        // Carrega a view de registro de assinatura
        $data['plans'] = $plans;
        $this->load->view('header');
        $this->load->view('register', $data);
        $this->load->view('footer');
    }

}
