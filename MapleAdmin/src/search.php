<?php
require_once("../config/database.php");
//get search term
$searchTerm = $_GET['term'];
//get matched data from skills table
$query = $mysqli->query("SELECT * FROM characters WHERE name LIKE '%".$searchTerm."%' ORDER BY name ASC");
while ($row = $query->fetch_assoc()) {
    $data[] = $row['name'];
}
//return json data
echo json_encode($data);
?>