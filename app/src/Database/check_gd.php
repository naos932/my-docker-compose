<?php
// 检查是否启用了 GD 扩展
if (extension_loaded('gd') && function_exists('gd_info')) {
    echo 'GD 扩展已启用';
} else {
    echo 'GD 扩展未启用';
}

?>