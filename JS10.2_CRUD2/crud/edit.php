<!DOCTYPE html>
<html>
<head>
    <title>Edit Member Data</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <?php
    include('connection.php');
    $id = $_GET['id']; 
    $query = "SELECT * FROM anggota WHERE id = $id";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);
    mysqli_close($connection);
    ?>
    
    <div class="container mt-4">
        <h2>Edit Member Data</h2>
        <form action="process.php?action=edit" method="post">
            <input type="hidden" name="id" value=<?php echo $row['id']; ?>">
            <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="name" id="name" value="<?php echo $row['name']; ?>" required>
            </div>
            <div class="form-group">
            <label for="gender">Gender:</label>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="gender" value="m" id="male" <?php if ($row['gender'] == 'm') echo 'checked'; ?> required>
                <label class="form-check-label" for="male">Male</label>
            </div>
                
            <div class="form-check">
                <input type="radio" class="form-check-input" name="gender" value="f" id="female" <?php if ($row['gender'] == 'f') echo 'checked'; ?> required>
                <label class="form-check-label" for="female">Female</label>
            </div>
            </div>
            
            <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" class="form-control" name="address" id="address" value="<?php echo $row['address']; ?>" required>
            </div>

            <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $row['phone']; ?>" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Save Changes</button>
            </form>
            <a href="index.php" class="btn btn-secondary mt-2">Back</a>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
