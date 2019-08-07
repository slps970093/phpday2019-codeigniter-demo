<?php


class ProductModel extends CI_Model
{

    private $table = 'products';


    public function append($data) {
        return $this->db->insert($this->table, $data);
    }
}