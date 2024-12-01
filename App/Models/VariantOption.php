<?php

namespace App\Models;

class VariantOption extends BaseModel
{
    protected $table = 'product_variant_options';
    protected $id = 'id';

    public function getAllVariantOption()
    {
        return $this->getAll();
    }
    public function getOneVariantOption($id)
    {
        return $this->getOne($id);
    }

    public function createVariantOption($data)
    {
        return $this->create($data);
    }
    public function updateVariantOption($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteVariantOption($id)
    {
        return $this->delete($id);
    }
    public function getOneVariantOptionByName($name)
    {
        return $this->getOneByName($name);
    }
    public function countTotalVariantOption()
    {
        return $this->countTotal();
    }

    public function getVariantOptionById()
    {
        // Giả sử bạn đã kết nối đến database
        $product_variant_id = $_GET['product_variant_id'] ?? null;

        if ($product_variant_id) {
            // Lấy dữ liệu từ database
            // $variant_options = []; // Thay bằng query thực tế từ DB
            // Ví dụ:
            // $stmt = $pdo->prepare("SELECT * FROM variant_option WHERE product_variant_id = ?");
            // $stmt->execute([$product_variant_id]);
            // $variant_options = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // echo json_encode($variant_options);
            $result = [];
            try {
                $sql = "SELECT *, product_variants.name AS product_variants_name 
                FROM `product_variant_options` 
                WHERE product_variant_id = ?";
                $conn = $this->_conn->MySQLi();
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('i', $product_variant_id);
                $stmt->execute();
                return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
            } catch (\Throwable $th) {
                error_log('Lỗi khi hiển thị tất cả dữ liệu: ' . $th->getMessage());
                return $result;
            }
        }
    }
}
