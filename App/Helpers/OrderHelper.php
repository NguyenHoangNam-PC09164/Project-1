<?php

namespace App\Helpers;

class OrderHelper
{
    // Lấy tên tỉnh/thành phố từ mã
    public static function getProvinceNameByCode($code)
    {
        $url = "https://provinces.open-api.vn/api/p/$code";
        $response = file_get_contents($url);
        $province = json_decode($response, true);
        return $province['name'] ?? 'Không rõ';
    }

    // Lấy tên quận/huyện từ mã
    public static function getDistrictNameByCode($code)
    {
        $url = "https://provinces.open-api.vn/api/d/$code";
        $response = file_get_contents($url);
        $district = json_decode($response, true);
        return $district['name'] ?? 'Không rõ';
    }
}
