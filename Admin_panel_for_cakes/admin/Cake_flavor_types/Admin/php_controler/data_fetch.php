<?php
//database connection
include("../../Module/DB_conn.php");
?>

<?php
$cat_name = $cat_code = "";

//decrypt cake id
$encrition_id = $_POST["encrition_id"]; //encrition_id = cake id
$ciphering = "AES-128-CTR";
$encription_key = "1413348874";
$option = 0;
$encrition_iv = "1988406007151846";
//id = cake id
$id = openssl_decrypt($encrition_id, $ciphering, $encription_key, $option, $encrition_iv);

//this query for fecth data from database and sent to shows.php
$sqle = "SELECT * FROM cake_flavor_info WHERE cake_id =$id";
$exequtee = mysqli_query($conn, $sqle);
if ($exequtee) {

    while ($row = mysqli_fetch_assoc($exequtee)) {
        $db_data[] = $row;
    }

    echo json_encode($db_data);
} else {
    echo "id: $id";
    echo  " don't exequte";
}

?>