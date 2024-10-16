<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="upload.css">
        <title>Upload File Document</title>
    </head>
    <body>
    <body>
    <div class="upload-form-container">
        <h2>Unggah File Dokumen</h2>
        <form id="upload-form" action="upload_ajax.php" method="post" enctype="multipart/form-data">
        <div class="file-input-container">
                <input type="file" name="file" id="file" class="file-input">
                <label for="file">Select File</label>
            </div>
            <button type="submit" name="submit" class="upload-button" id="upload-button" disabled>Upload</button>
        </form>
        <div id="upload-status" class="upload-status"></div>
    </div>
        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
        <script src="upload.js"></script>
    </body>
</html>
