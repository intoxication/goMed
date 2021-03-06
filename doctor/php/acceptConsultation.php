<?php
include("../config/conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $doctorId = $_POST["DoctorId"];
    $visitorId = $_POST["VisitorId"];
    $dataToSend = array();

    try {
        $sql = "UPDATE chat SET AcceptedBy=? WHERE Visitor_Id=?";

        $stmt = $conn->prepare($sql);

        $stmt->execute([$doctorId, $visitorId]);

        $dataToSend = ["result" => true];
    } catch (PDOException $e) {
        $dataToSend = ["result" => $e->getMessage()];
    }

    $conn = null;

    echo json_encode($dataToSend);
}
