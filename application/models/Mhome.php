<?php defined('BASEPATH') or exit('No direct script access allowed');
class Mhome extends CI_Model{

  function __construct(){
    parent::__construct();
    $this->load->database();
  }

  public function getData($condition = NULL, $selection = NULL, $table, $singleRowResult =  FALSE){
    if ($condition != NULL) {
      foreach ($condition as $key => $value) {
        $this->db->where($key, $value);
      }
    }

    if ($selection != NULL) {
      foreach ($selection as $key => $value) {
        $this->db->select($value);
      }
    }

    $query =  $this->db->get($table);

    if ($singleRowResult === TRUE) {
      return $query->row_array();
    }else {
      return $query->result_array();
    }
  }

  public function inputData($table, $items){
    return $this->db->insert($table, $items);
  }


  public function updateData($condition, $data, $table){
    if($condition != NULL){
      foreach ($condition as $key => $value) {
      $this->db->where($key, $value);
      }
    }

    $this->db->set($data);

    return $this->db->update($table);
  }

  public function deleteData($detailContent, $table){
    foreach ($detailContent as $key => $value) {
      $this->db->where($key, $value);
    }

    $this->db->delete($table);
  }


}
