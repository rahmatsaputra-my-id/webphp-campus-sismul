<?php 
 
class Mlogin extends CI_Model{	
	
	function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}
  function cek_register($data){   
    $this->db->insert('user',$data);
  }
	public function login($username,$password){
    $this->db->select('*');
    $this->db->from('user');
    $this->db->where('username',$username);
    $this->db->where('password',$password);
    $this->db->limit(1);
    
    $query = $this->db->get();
    if($query->num_rows()==1){
      return $query->result();
      $sess_array = array();
        foreach ($result as $row) {
          $sess_array = array( 
            'user_id' => $row->user_id,
            'username' => $row->username,
            'password' => $row->password,

          );
        /*$data_session = array(
          'nama' => $user_id,
          'status' => "Login"
          );
   */
        $this->session->set_userdata($sess_array);
        }
    } else {
      return false;
    }
  }	
}