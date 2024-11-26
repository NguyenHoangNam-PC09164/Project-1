<?php

namespace App\Models;

class Category extends BaseModel
{
    protected $table = 'categories';
    protected $id = 'id';

    public function getAllCategory()
    {
        return $this->getAll();
    }
    public function getOneCategory($id)
    {
        return $this->getOne($id);
    }

    public function createCategory($data)
    {
        return $this->create($data);
    }
    public function updateCategory($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteCategory($id)
    {
        return $this->delete($id);
    }
    public function getAllCategoryByStatus()
    {
        return $this->getAllByStatus();
    }
    public function getOneCategoryByName($name)
    {
        return $this->getOneByName($name);
    }
    public function countTotalCategory(){
        return $this->countTotal();
    }
    public function get3Category()
    {
        $result = [];
        try {
            $sql = "SELECT * FROM $this->table limit 3";
            $result = $this->_conn->MySQLi()->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị tất cả dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }
    
}
