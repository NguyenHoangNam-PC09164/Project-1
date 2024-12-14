<?php

namespace App\Controllers\Admin;

use App\Helpers\NotificationHelper;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Validations\OrderValidation;
use App\Views\Admin\Layouts\Footer;
use App\Views\Admin\Layouts\Header;
use App\Views\Admin\Components\Notification;
use App\Views\Admin\Pages\Order\Detail;
use App\Views\Admin\Pages\Order\Edit;
use App\Views\Admin\Pages\Order\Index;

class OrderController
{
    // hiển thị danh sách
    public static function index()
    {
        $order = new Order();
        $data = $order->getAll();

        Header::render();
        Notification::render();
        NotificationHelper::unset();
        // hiển thị giao diện danh sách
        Index::render($data);
        Footer::render();
    }

    // // hiển thị giao diện form sửa
    public static function edit(int $id)
    {
        $order = new Order();
        $data = $order->getOneOrderAndOrderDetailById($id);

        if (!$data) {
            NotificationHelper::error('edit', 'Không thể xem đơn hàng này');
            header('location: /admin/orders');
            exit;
        }
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        // hiển thị form sửa
        Edit::render($data);
        Footer::render();
    }



    // // xử lý chức năng sửa (cập nhật)
    public static function update(int $id)
    {
        //Validation cac truong du lieu
        $is_valid = OrderValidation::edit();
        if (!$is_valid) {

            NotificationHelper::error('update', 'Cập nhật đơn hàng thất bại');
            header("location: /admin/orders/$id");
            exit;
        }
        $order = new Order();
        //      //thuc hien them cap nhat
        $data = [
            'name' => $_POST['username'],
            'phone' => $_POST['phone'],
            'address' => $_POST['address'],
            'status' => $_POST['status']
        ];

        $result = $order->updateOrder($id, $data);
        if ($result) {
            NotificationHelper::success('update', 'Cập nhật đơn hàng thành công');
            header('location: /admin/orders');
            exit;
        } else {
            NotificationHelper::error('update', 'Cập nhật đơn hàng thất bại');
            header("location: /admin/orders/$id");
        }
    }

    public static function detail(int $id)
    {
        $order = new Order();
        $data = $order->getAllOrderAndOrderDetailById($id);

        if (!$data) {
            NotificationHelper::error('edit', 'Không thể xem đơn hàng này');
            header("location: /admin/orders/detail/$id");
            exit;
        }
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        Detail::render($data);
        Footer::render();
    }

    public static function deleteOrderDetail(int $id)
    {
        $orderDetail = new OrderDetail();
        $result = $orderDetail->deleteOrderDetail($id);

        if ($result) {
            NotificationHelper::success('deleteDetail', 'Xoá đơn hàng thành công');
            header("location: /admin/orders/detail/$id");
        } else {
            NotificationHelper::error('deleteDetail', 'Xoá đơn hàng thất bại');
            header("location: /admin/orders/detail/$id");
        }
    }


    // thực hiện xoá
    public static function delete(int $id)
    {
        $order = new Order();
        $result = $order->deleteOrder($id);

        if ($result) {
            NotificationHelper::success('delete', 'Xoá đơn hàng thành công');
            header('location: /admin/orders');
        } else {
            NotificationHelper::error('delete', 'Xoá đơn hàng thất bại');
            header('location: /admin/orders');
        }
    }
}
