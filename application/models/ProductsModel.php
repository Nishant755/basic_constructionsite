<?php

class ProductsModel extends CI_Model{

    //get Data from database 
    public function get_products(){
        if(!empty($this->input->get("search")))//if user want to seach anything then and if they do not want filter then all data is fetch{
          $this->db->like('title', $this->input->get("search"));//to fetch tittle from db
          $this->db->or_like('description', $this->input->get("search"));//descrription 
        
        $query = $this->db->get("products");
        return $query->result();
    }

    public function insert_product()
    {    //simple for insertion 
        $data = array(
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description')
        );
        return $this->db->insert('products', $data);
    }

 public function update_product($id) 
    {//if user want update by id whether not given id
        $data=array(
            'title' => $this->input->post('title'),
            'description'=> $this->input->post('description')
        );
        if($id==0){
            return $this->db->insert('products',$data);
        }else{
            $this->db->where('id',$id);
            return $this->db->update('products',$data);
        }        
    }
}
























?>