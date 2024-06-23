<?php
session_start();

// Cek apakah user memilih logout
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: login.php');
    exit;
}

// mndtkn URL halaman sebelumnya
$referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'javascript:history.go(-1)';
?>

<script>
function confirmLogout() {
    if (confirm("Apakah Anda yakin ingin logout?")) {
        window.location.href = "?logout";
    } else {
        window.location.href = "<?php echo $referer; ?>";
    }
}
</script>

<?php echo '<script>confirmLogout();</script>';?>