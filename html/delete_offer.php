<?php  
 $BDD = array();
    $BDD['host'] = "localhost";
    $BDD['user'] = "root";
    $BDD['pass'] = "";
    $BDD['db'] = "project";

    $mysqli = mysqli_connect($BDD['host'], $BDD['user'], $BDD['pass'], $BDD['db']);

    if (!$mysqli) {
        echo "Connection not established: " . mysqli_connect_error();
        exit;
    }
// التحقق من وجود معرف العرض في الطلب
if(isset($_GET['id']) && !empty($_GET['id'])) {
    // استخراج معرف العرض من الطلب
    $id_offer = $_GET['id'];
    
    // استعد قيامة SQL لحذف العرض
    $sql = "DELETE FROM offre WHERE id_offer = ?";
    
    // تحضير البيانات لتنفيذ الاستعلام
    $stmt = $mysqli->prepare($sql);
    if ($stmt) {
        // ربط قيمة معرّف العرض
        $stmt->bind_param("i", $id_offer);
        // تنفيذ الاستعلام
        if ($stmt->execute()) {
            // echo "Offer deleted successfully.";
            $email = $_GET['email'];
            $ChaineRedirect = "Location: /project2024l3/html/historiqueoffer.php?email=" . $email;
            header($ChaineRedirect);
            exit();
        } else {
            echo "An error occurred while deleting the offer.";
        }
        // إغلاق البيانات المحضّرة
        $stmt->close();
    } else {
        echo "An error occurred while preparing the statement.";
    }
} else {
    echo "Offer ID is missing or empty.";
}


   mysqli_close($mysqli);
    ?>