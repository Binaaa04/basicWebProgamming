<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <td>No</td>
            <td>Name</td>
            <td>Gender</td>
            <td>Address</td>
            <td>Phone</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
    <?php
    include 'connection.php';
    $no = 1;
    $query = "SELECT * FROM anggota ORDER BY id DESC";
    $sql = $db1->prepare($query);
    $sql->execute();
    $res1 = $sql->get_result();

    if ($res1->num_rows > 0) {
        while ($row = $res1->fetch_assoc()) {
            $id = $row['id'];
            $name = $row['name'];
            $gender = ($row['gender'] == 'm') ? 'Male' : 'Female';
            $address = $row['address'];
            $phone = $row['phone'];
    ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $name; ?></td>
            <td><?php echo $gender; ?></td>
            <td><?php echo $address; ?></td>
            <td><?php echo $phone; ?></td>
            <td>
                <button id="<?php echo $id; ?>" class="btn btn-success btn-sm edit_data">
                    <i class="fa fa-edit"></i> Edit
                </button>
                <button id="<?php echo $id; ?>" class="btn btn-danger btn-sm remove_data">
                    <i class="fa fa-trash"></i> Remove
                </button>
            </td>
        </tr>
    <?php
        }
    } else {
    ?>
        <tr>
            <td colspan="7">No data found</td>
        </tr>
    <?php } ?>
    </tbody>
</table>

<script type="text/javascript">
$(document).ready(function() {
    // Initialize DataTable
    $('#example').DataTable();

    // Function to reset error messages (if using validation error handling)
    function reset() {
        document.getElementById("err_name").innerHTML = "";
        document.getElementById("err_gender").innerHTML = "";
        document.getElementById("err_address").innerHTML = "";
        document.getElementById("err_phone").innerHTML = "";
    }

    // Edit data event
    $(document).on('click', '.edit_data', function() {
        $('html, body').animate({ scrollTop: 0 }, 'slow');  // Scroll to top
        var id = $(this).attr('id');  // Get ID of the selected row

        $.ajax({
            type: 'POST',
            url: 'get_data.php',  // Server-side script to retrieve data
            data: { id: id },
            dataType: 'json',
            success: function(response) {
                reset();  // Reset any error messages

                // Populate form fields with retrieved data
                $('html, body').animate({ scrollTop: 30 }, 'slow');  // Scroll down slightly
                document.getElementById("id").value = response.id;
                document.getElementById("name").value = response.name;
                document.getElementById("address").value = response.address;
                document.getElementById("phone").value = response.phone;

                // Set radio button for jenis_kelamin
                if (response.gender === "m") {
                    document.getElementById("gender1").checked = true;
                } else {
                    document.getElementById("gender2").checked = true;
                }
            },
            error: function(response) {
                console.log(response.responseText);  // Log errors if any
            }
        });
    });

    $(document).on('click', '.remove_data', function() {
    var id = $(this).attr('id');  // Get the ID of the row to delete

    $.ajax({
        type: 'POST',
        url: 'remove_data.php',  // The server-side script to handle deletion
        data: { id: id },
        success: function() {
            $('.data').load('data.php');  // Reload the data display area
        },
        error: function(response) {
            console.log(response.responseText);  // Log any errors for debugging
        }
        });
    });
});
</script>
