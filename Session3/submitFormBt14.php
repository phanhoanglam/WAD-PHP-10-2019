<?php
$soDien;
$tienDien;
$gioiTinh = $_POST['gender'] == "Male" ? 'Ông' : 'Bà';
$name = $_POST['name'];
$sinhNhat = $_POST['birthday'];
$diaChi = $_POST['address'];
$tinhThanh = $_POST['city'];
if (isset($_POST['submitRegister'])) {
    $soDien = $_POST['electriclastday'] - $_POST['electricfirstday'];
    if ($soDien <= 100) {
        $tienDien = $soDien * 1500;
    }
    if ($soDien > 100) {
        $tienDien = $soDien * 2100;
    }
    if ($soDien > 300) {
        $tienDien = $soDien * 3500;
    }
}
?>

<div>
    <h3>PHIẾU TÍNH TIỀN ĐIỆN</h3>
    <p><?php echo $gioiTinh ?> : <?php echo $name ?></p>
    <p>Sinh ngày : <?php echo $sinhNhat ?></p>
    <p>Địa chỉ : <?php echo $diaChi ?></p>
    <p>Tỉnh : <?php echo $tinhThanh ?></p>
    <p>Đã sử dụng <?php echo number_format($soDien, 0, ',', '.') ?> số điện</p>
    <p>Số tiền điện cần thanh toán là: <?php echo number_format($tienDien) ?></p>
</div>