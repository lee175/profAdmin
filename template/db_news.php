<?php 

require_once 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  $stmt = "SELECT title, authors, description, place, date FROM publications WHERE type='news' ORDER BY date DESC;";
  $result = $db->query($stmt);
  if ($result->num_rows > 0) {
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    foreach ($rows as &$row) {
      $date = date_create($row['date']);
      $row['date'] = date_format($date, "M, Y");
    }
    echo json_encode($rows);
  }
}

unset($rows, $date);
$result->free_result();
?>