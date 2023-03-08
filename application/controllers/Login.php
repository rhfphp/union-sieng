<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
    }



       public function login()
       {
           $data['title'] = 'Login';

           $this->form_validation->set_rules('email', 'E-mail', 'required');
           $this->form_validation->set_rules('password', 'Senha', 'required');

           if ($this->form_validation->run() === FALSE)
           {
               $this->load->view('header');
               $this->load->view('login', $data);
               $this->load->view('footer');
           }
           else
           {
               $email = $this->input->post('email');
               $password = $this->input->post('password');

               $user = $this->User_model->login($email, $password);
				print_r($user);
               if ($user)
               {
                  $user_data = array(
                      'user_id' => $user['id'],
                      'name' => $user['name'],
                      'email' => $user['email'],
                      'is_admin' => $user['is_admin'],
                      'logged_in' => true
                  );


                   $this->session->set_userdata($user_data);
                   $this->session->set_flashdata('success_msg', 'Você fez login com sucesso');

                   // Acessa os dados do usuário da sessão e passa o nome para a view
                   $data['name'] = $this->session->userdata('name');

                   // Verifica se o usuário é administrador
                   if ($user_data['is_admin']) {
                       redirect('dashboard/admin');
                   } else {
                       redirect('dashboard/user');
                   }
               }
               else
               {
                   $this->session->set_flashdata('error_msg', 'E-mail ou senha incorretos, tente novamente');
                   redirect('login');
               }
           }
       }



       public function logout()
       {
           $this->session->unset_userdata('logged_in');
           $this->session->unset_userdata('user_id');
           $this->session->unset_userdata('name');
           $this->session->unset_userdata('email');
           $this->session->set_flashdata('success_msg', 'Você fez logout com sucesso');
           redirect('login');
       }

   }
