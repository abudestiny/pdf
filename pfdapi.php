<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['file'])) {
  $file = $_GET['file'];
  $filepath = 'files/test.pdf';
  var_dump($_GET); // Debugging line
  if (file_exists($filepath)) {
    header('Content-Type: application/pdf');
    header('Content-Disposition: inline; filename="' . basename($file) . '"');
    header('Content-Length: ' . filesize($file));
    readfile($file);
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
