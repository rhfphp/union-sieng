<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function get_plans() {
        $query = $this->db->get('subscription_plans');
        return $query->result();
    }

	public function add_user($user_data) {
		$this->db->trans_start();

		// Obtem o plano selecionado pelo usuário
		$plan = $this->db->get_where('subscription_plans', array('id' => $user_data['plan_id']))->row();

		// Define a data de início da assinatura
		$start_date = date('Y-m-d H:i:s');

		// Define a data de término do período de teste (se houver)
		$trial_end_date = null;
		if ($plan->trial_period_days > 0) {
			$trial_end_date = date('Y-m-d H:i:s', strtotime("+{$plan->trial_period_days} days"));
		}

		// Adiciona o usuário
		$this->db->insert('users', $user_data);
		$user_id = $this->db->insert_id();

		$plan_id = $this->input->post('plan_id');
		$plan = $this->plan_model->get_subscription_plan($plan_id); // obter detalhes do plano usando o ID
		$clinic_limit = $plan['clinic_limit']; // obter o limite da clínica do plano selecionado

		// Cria a inscrição do usuário
		$subscription_data = array(
			'user_id' => $user_id,
			'subscription_plan_id' => $user_data['plan_id'],
			'trial_start_date' => $start_date,
			'trial_end_date' => $trial_end_date,
			'clinic_limit' => $clinic_limit
		);
		$this->db->insert('subscriptions', $subscription_data);

		$this->db->trans_complete();

		return $user_id;
}



    
    public function login($email, $password) {
    // Verifica se o e-mail existe na tabela de usuários
    $this->db->where('email', $email);
    $query = $this->db->get('users');
    $user = $query->row_array();

    if ($user) {
        // Verifica se a senha está correta
        if (password_verify($password, $user['password'])) {
            // Retorna os dados do usuário
            unset($user['password']);

            return $user;
            //print_r($user);
        }

    }

    return FALSE;
}

//public function get_subscription_plan_by_user_id($user_id) {
    //$this->db->select('*');
    //$this->db->from('subscriptions');
    //$this->db->join('subscription_plans', 'subscriptions.plan_id = subscription_plans.id');
    //$this->db->where('user_id', $user_id);
    //$query = $this->db->get();
    //return $query->row();
//}

public function get_subscription_plan_by_user_id($user_id) {
    $this->db->select('*');
    $this->db->from('subscriptions');
    $this->db->join('subscription_plans', 'subscriptions.plan_id = subscription_plans.id');
    $this->db->where('user_id', $user_id);
    $query = $this->db->get();
    return $query->row();
}





}
