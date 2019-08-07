<?php


namespace Core\general;


abstract class Model extends \CI_Model
{
    protected $table;

    /**
     * 新增資料
     * @param $data
     * @param bool $returnPrimary
     * @return bool | int
     */
    public function append($data,$returnPrimary = false)
    {
        $res = $this->db->insert($this->table,$data);

        if($returnPrimary) {
            return $this->db->insert_id();
        }

        return $res;
    }


    /**
     * 多筆資料寫入
     * @param $data
     * @return mixed
     */
    public function multi_append($data) {
        $res = $this->db->insert_batch($this->table,$data);

        return $res;
    }

    /**
     * 更新資料
     * @param $data
     * @param $where
     * @return bool
     */
    public function update($data,$where)
    {
        $res = $this->db->update($this->table,$data,$where);

        return $res;
    }

    /**
     * 取得指定資料
     * @param array $where
     * @param int | null $limit
     * @param int | null $offset
     * @return array
     */
    public function getWhere(array $where,$limit = null, $offset = null)
    {
        $query = $this->db->get_where($this->table,$where,$limit,$offset);

        if ($limit == 1) {
            return $query->row_array();
        }

        return $query->result_array();
    }

    /**
     * 刪除所有資料
     * @return bool
     */
    public function truncate()
    {
        return $this->db->truncate($this->table);
    }
}