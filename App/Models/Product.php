<?php

namespace App\Models;

class Product extends BaseModel
{
    protected $table = 'products';
    protected $id = 'product_id';

    public function getAllProduct()
    {
        return $this->getAll();
    }
    public function getOneProduct($id)
    {
        return $this->getOne($id);
    }

    public function createProduct($data)
    {
        return $this->create($data);
    }
    public function updateProduct($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteProduct($id)
    {
        return $this->delete($id);
    }
    public function getAllProductByStatus()
    {
        $result = [];
        try {
            $sql = "SELECT products.* FROM `products` INNER JOIN categories ON products.category_id=categories.id 
        WHERE products.status=" . self::STATUS_ENABLE . " and categories.status=" . self::STATUS_ENABLE;
            $result = $this->_conn->MySQLi()->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị tất cả dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }

    public function getOneProductByName($name)
    {
        return $this->getOneByName($name);
    }

    public function getAllProductJoinCategory()
    {
        $result = [];
        try {
            $sql = "SELECT products.*,categories.name as category_name FROM products 
            INNER JOIN categories on products.category_id=categories.id;";
            $result = $this->_conn->MySQLi()->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị tất cả dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }

    public function getAllProductByCategoryAndStatus(int $id)
    {
        $result = [];
        try {
            $sql = "SELECT products.*,categories.name as category_name FROM `products` INNER JOIN categories ON products.category_id=categories.id 
            WHERE products.status=" . self::STATUS_ENABLE . " AND categories.status=" . self::STATUS_ENABLE . " AND products.category_id=?";
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);

            $stmt->bind_param('i', $id);
            $stmt->execute();
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }

    public function getAllProductByCategory(int $id)
    {
        $result = [];
        try {
            $sql = "SELECT products.*,categories.name as category_name FROM `products` INNER JOIN categories ON products.category_id=categories.id 
            WHERE products.category_id=?";
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);

            $stmt->bind_param('i', $id);
            $stmt->execute();
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }


    public function getOneProductByStatus(int $id)
    {
        $result = [];
        try {
            $sql = "SELECT products.*,categories.name as category_name FROM `products` INNER JOIN categories ON products.category_id=categories.id 
            WHERE products.status=" . self::STATUS_ENABLE . " AND categories.status=" . self::STATUS_ENABLE . " AND products.product_id=?";
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);

            $stmt->bind_param('i', $id);
            $stmt->execute();
            return $stmt->get_result()->fetch_assoc();
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị chi tiết dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }
    public function countTotalProduct()
    {
        return $this->countTotal();
    }

    public function countProductByCategory()
    {
        $result = [];
        try {
            $sql = "SELECT COUNT(*) as count, categories.name FROM products 
            INNER JOIN categories ON products.category_id=categories.id 
            GROUP BY products.category_id";
            $result = $this->_conn->MySQLi()->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị tất cả dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }

    public function getAllProductByCategoryAndStatusAndIsFeature()
    {
        $result = [];
        try {
            $sql = "SELECT * FROM products WHERE products.status=" . self::STATUS_ENABLE . " AND products.is_feature=" . self::STATUS_ENABLE . "";
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }

    public function get5ProductNew()
    {
        $result = [];
        try {
            $sql = "SELECT * FROM products WHERE products.status=" . self::STATUS_ENABLE . " ORDER by date DESC LIMIT 4";
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }
    public function getSearch($keyword)
    {
        $result = [];
        try {
            $sql = "SELECT * FROM `products` WHERE `name` LIKE ?";
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);
            $searchTerm = '%' . $keyword . '%';
            $stmt->bind_param('s', $searchTerm);
            $stmt->execute();
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi tìm kiếm sản phẩm: ' . $th->getMessage());
            return $result;
        }
    }
    // sản phẩm liên quan
    public function getProductCategoryRelate()
    {
        $result = [];
        try {
            $sql = "SELECT * FROM `products`  WHERE category_id=1";
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th){
            error_log('Lỗi khi hiển thị dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }


    public function getAllManyViews()
    {
        $result = [];
        try {
            $sql = "SELECT * FROM `products` ORDER BY view desc limit 4;";
            $result = $this->_conn->MySQLi()->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị tất cả dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }
    public function getAllManyView()
    {
        $result = [];
        try {
            $sql = "SELECT * FROM `products` ORDER BY view desc";
            $result = $this->_conn->MySQLi()->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị tất cả dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }

    // lọc giá tiền

    public function getProductByPriceRange($minPrice, $maxPrice)
    {
        try {
            $conn = $this->getConnection(); // Sử dụng getConnection
            $stmt = $conn->prepare("SELECT * FROM `products` WHERE price BETWEEN ? AND ?");
            $stmt->bind_param("ii", $minPrice, $maxPrice);
            $stmt->execute();

            $result = $stmt->get_result();
            return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
        } catch (\Throwable $th) {
            error_log("Error in getProductByPriceRange(): " . $th->getMessage());
            return [];
        }
    }

    public function getSkuByProductAndVariant(int $id) {
        $result=[];
        try{
            $sql="SELECT skus.*, products.product_id as product_id, products.name as product_name, products.image as product_image, products.quantity as products_quantity, product_variants.name as product_variant_name, product_variant_options.name as product_variant_options_name 
            FROM `skus` INNER JOIN products ON products.product_id = skus.product_id INNER JOIN product_variant_options ON skus.variant_option_id = product_variant_options.id 
            INNER JOIN product_variants ON product_variant_options.product_variant_id = product_variants.id WHERE products.product_id=?";
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);

            $stmt->bind_param('i', $id);
            $stmt->execute();
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        }catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị tất cả dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }
}
