<?php 

require_once 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  $stmt = "SELECT id, title FROM news ORDER BY id";
  $result = $db->query($stmt);
  
  if ($result->num_rows > 0) {
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($rows);
    $result->free_result();
  }
}

unset($rows);
$db->close();
?>