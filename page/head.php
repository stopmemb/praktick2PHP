<?
session_start();
include('include/connection.php');
if ($_SESSION['USER']) {
    $user_id = $_SESSION['USER'];
    $sql = "SELECT * FROM `userrr` WHERE `id`='$user_id'";
    $USER = $connect->query($sql)->fetch();
}
if(isset($_GET['exit'])){
    unset($_SESSION['USER']);
    echo '<script>document.location.href="?page=registration"</script>';
}