<?php
if (isset($_FILES['files'])) {
    $errors = array();
    $extensions = array("jpg", "jpeg", "png", "gif");
    
    foreach ($_FILES['files']['tmp_name'] as $key => $tmp_name) {
        $file_name = $_FILES['files']['name'][$key];
        $file_size = $_FILES['files']['size'][$key];
        $file_tmp = $_FILES['files']['tmp_name'][$key];
        $file_type = $_FILES['files']['type'][$key];
        @$file_ext = strtolower(end(explode('.', $_FILES['files']['name'][$key])));
        
        if (in_array($file_ext, $extensions) === false) {
            $errors[] = "$file_name: Allowed file types are JPG, JPEG, PNG, and GIF.";
        }
        
        if ($file_size > 2097152) {
            $errors[] = "$file_name: File size should not exceed 2 MB.";
        }
        
        if (empty($errors) == true) {
            if (!file_exists('images')) {
                mkdir('images', 0777, true);
            }
            move_uploaded_file($file_tmp, "images/" . $file_name);
        }
    }

    if (empty($errors)) {
        echo "Files uploaded successfully";
    } else {
        echo implode(" ", $errors);
    }
}
?>
