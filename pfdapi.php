<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['file'])) {
  $file = $_GET['file'];
  $filepath = 'files/' . $file;
  if (file_exists($filepath)) {
    header('Content-Type: application/pdf');
    header('Content-Disposition: inline; filename="' . basename($filepath) . '"');
    header('Content-Length: ' . filesize($filepath));
    readfile($filepath);
    exit;
  }
  else {
    http_response_code(404);
    echo "File not found.";
  }
}
else {
  http_response_code(400);
  echo "Bad request.";
}
?>
