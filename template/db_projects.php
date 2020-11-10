<?php 

require_once 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  $stmt = "SELECT title, place, role, duration, date_start, date_end date FROM projects ORDER BY date DESC;";
  $result = $db->query($stmt);
  if ($result->num_rows > 0) {
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    foreach ($rows as &$row) {
      $date = new DateTime($row['date']);
      $row['date_start'] = date_format($date, "M, Y");
      $row['date_end'] = date_format($date, "M, Y");
    }
    $result->free_result();
    echo json_encode($rows);
  }
}

unset($rows, $date);
$db->close();
?>