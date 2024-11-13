<!DOCTYPE html>
<html>
<head>
    <title> Add Member Data</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2> Add Member Data</h2>
        <form action="process.php?action=adding" method="post">
            <div class="form-group">
            <label for="name">Name :</label>
            <input type="text" class="form-control" name="name" id="name" required>
            </div>
            <div class="form-group">
            <label for="gender">Gender :</label>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="gender" value="m" id="male" required>
                <label class="form-check-label" for="male">Male</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="gender" value="f" id="female" required>
                <label class="form-check-label" for="female">Female</label>
            </div>
            </div>
            <br>
            <class="form-group">
            <label for="address">Address :</label>
            <input type="text" class="form-control" name="address" id="address" required>
            <br>
            <div class="form-group">
            <label for="phone">Phone Number :</label>
            <input type="text" class="form-control" name="phone" id="phone" required>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </for>
            <a href="index.php" class="btn btn-secondary mt-2">Back</a>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
