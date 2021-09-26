 <?php
include "../../conn2.php";
//$id ='';
//$id = base64_encode($_GET["Id"]);
    # code...
    $rowCount = count($_POST["id"]);
    $user = $_POST['user'];
    for($i=0;$i<$rowCount;$i++) {
        $sql="UPDATE unit SET deleted_by ='$user', deleted_at = now() WHERE id='".$_POST["id"][$i]."' ";
        //$sql="DELETE FROM folders WHERE fac_id='".$_POST["faculties"][$i]."' ";
        $conn->query($sql);
        echo "<script>alert('Unit (s) successfully deleted');</script>";
        echo "<script>window.open('../unit.php', '_SELF')</script>";
    }

?>