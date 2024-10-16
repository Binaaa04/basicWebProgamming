<?php
if (isset($_FILES['file'])) {
         $errors = array();
         $file_name = $_FILES['file']['name'];
         $file_size = $_FILES['file']['size'];
         $file_tmp = $_FILES['file']['tmp_name'];
         $file_type = $_FILES['file']['type'];
         @$file_ext = strtolower(end(explode('.', $_FILES['file']['name'])));
         $extensions = array("pdf", "doc", "docx", "txt");
    
         if (in_array($file_ext, $extensions) === false) {
             $errors[] = "Allowed file extensions are PDF, DOC, DOCX, or TXT";
         }
    
         if ($file_size > 2097152) {
             $errors[] = 'File size should not exceed 2 MB';
         }
    
         if (empty($errors) == true) {
             move_uploaded_file($file_tmp, "documents/" . $file_name);
             echo "file uploaded successfully";
         } else {
             echo implode(" ", $errors);
         }
        }
?>