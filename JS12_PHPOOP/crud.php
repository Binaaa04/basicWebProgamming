<?php
require_once 'database.php';  

class crud {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    // Create
    public function create($position, $keterangan) {
        $query = "INSERT INTO position (position, keterangan) VALUES ('$position', '$keterangan')";
        $result = $this->db->conn->query($query);
        return $result;
    }

    // Read
    public function read() {
        $query = "SELECT * FROM position";
        $result = $this->db->conn->query($query);
        $data = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        } 
        return $data;
    }

    public function readById($id) {
        $query = "SELECT * FROM position WHERE id = $id";
        $result = $this->db->conn->query($query);
        
        if ($result->num_rows == 1) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    // Update
    public function update($id, $position, $keterangan) {
        $query = "UPDATE position SET position = '$position', keterangan = '$keterangan' WHERE id = $id";
        $result = $this->db->conn->query($query);
        return $result;
    }

    // Delete
    public function delete($id) {
        $query = "DELETE FROM position WHERE id = $id";
        $result = $this->db->conn->query($query);
        return $result;
    }
}
?>
