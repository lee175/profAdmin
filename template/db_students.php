<?php 

require_once 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  if ($stmt = $db->prepare("SELECT id, name, designation, title, description, is_active FROM students WHERE degree=? ORDER BY id")) {
    $stmt->bind_param('s', $_GET['payload']);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
      $rows = $result->fetch_all(MYSQLI_ASSOC);
      echo json_encode($rows);
      $result->free_result();
    }
  }
}

unset($rows);
$db->close();
?>