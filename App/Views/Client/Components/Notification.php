<?php

namespace App\Views\Client\Components;

use App\Views\BaseView;

class Notification extends BaseView
{
    public static function render($data = null)
    {
        // Kiểm tra xem có thông báo trong session hay không
        if (!empty($_SESSION['success']) || !empty($_SESSION['error'])) :
?>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    // Cấu hình Toastr
                    toastr.options = {
                        "closeButton": true,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": false,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    };

                    // Hiển thị thông báo thành công
                    <?php if (!empty($_SESSION['success'])) : ?>
                        <?php foreach ($_SESSION['success'] as $value) : ?>
                            toastr.success("<?= addslashes($value) ?>", "Thành công");
                        <?php endforeach; 
                         unset($_SESSION['success']); // Xóa thông báo sau khi hiển thị 
                        ?>
                        // Chuyển hướng sau 3 giây nếu có thông báo thành công
                        setTimeout(function() {
                            window.location.href = '/'; // Điều hướng đến trang chủ
                        }, 3000);
                    <?php endif; ?>

                    // Hiển thị thông báo lỗi
                    <?php if (!empty($_SESSION['error'])) : ?>
                        <?php foreach ($_SESSION['error'] as $value) : ?>
                            toastr.error("<?= addslashes($value) ?>", "Lỗi");
                        <?php endforeach; 
                         unset($_SESSION['error']); // Xóa thông báo sau khi hiển thị 
                        ?>
                    <?php endif; ?>
                });
            </script>
<?php
        endif;
    }
}
?>
