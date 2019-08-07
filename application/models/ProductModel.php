<?php

use Core\general\Model;


class ProductModel extends Model
{
    protected $table = 'products';


    public function getAllProducts() {
        $this->db->select('products.id,products.name,products.price,product_category.name as category_name');
        $this->db->from($this->table);
        $this->db->join('product_category', 'product_category.id = products.category_id', 'left');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getProductInByPrimaryKeys(array $primaryKeys) {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where_in('id',$primaryKeys);
        $query = $this->db->get();

        return $query->result_array();
    }
}