<?php
class Clinic_model extends CI_Model {

    public function add_clinic($clinic_data) {
        // Adicionar uma nova clínica
    }

    public function get_clinic_details($clinic_id) {
        // Obter os detalhes de uma clínica específica pelo ID
    }

    public function get_clinic_by_user_id($user_id) {
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('clinics');
        return $query->row();
    }

    public function get_clinics_by_user_id($user_id) {
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('clinics');
        return $query->result();
    }

 public function get_all_clinics($user_id = null) {
     if ($user_id) {
         $this->db->where('user_id', $user_id);
     }
     $query = $this->db->get('clinics');
     return $query->result();
 }

 public function get_clinic_count_by_user_id($user_id) {
   return $this->db->where('user_id', $user_id)->count_all_results('clinics');
 }

 public function count_clinics_by_user_id($user_id) {
     $query = $this->db->select('COUNT(*) as total')->from('clinics')->where('user_id', $user_id)->get();
     return $query->row()->total;
 }







}
