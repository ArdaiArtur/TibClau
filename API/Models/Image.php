<?php
class Image {
    private $conn;
    private $table = 'post_images';

    public $id;
    public $post_id;
    public $image_url;
    public $created_at;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Read all images for a specific post
    public function read($post_id) {
        $query = 'SELECT id, post_id, image_url, created_at FROM ' . $this->table . ' WHERE post_id = ?';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $post_id);
        $stmt->execute();
        return $stmt;
    }

    // Read a single image
    public function readOne($post_id) {
        $query = 'SELECT id, post_id, image_url, created_at FROM ' . $this->table . ' WHERE post_id = ? LIMIT 1';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $post_id);
        $stmt->execute();
        return $stmt;
    }

    // Create a new image
    public function create() {
        $query = 'INSERT INTO ' . $this->table . ' (post_id, image_url) VALUES (?, ?)';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->post_id);
        $stmt->bindParam(2, $this->image_url);
        if($stmt->execute()) {
            return true;
        }
        printf("Error: %s.\n", $stmt->error);
        return false;
    }

    // Update an existing image (if needed)
    
    public function update() {
        // Ensure that post_id is set
        if (!isset($this->id) || !isset($this->post_id)) {
            return false;
        }
    
        // Prepare the update query
        $query = 'UPDATE ' . $this->table . ' SET image_url = :image_url WHERE id = :id AND post_id = :post_id';
    
        // Prepare the statement
        $stmt = $this->conn->prepare($query);
    
        // Clean data
        $this->image_url = htmlspecialchars(strip_tags($this->image_url));
    
        // Bind parameters
        $stmt->bindParam(':image_url', $this->image_url);
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':post_id', $this->post_id);
    
        // Execute the query
        if ($stmt->execute()) {
            return true;
        }
    
        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);
    
        return false;
    }
    

    // Delete an image
    public function delete() {
        $query = 'DELETE FROM ' . $this->table . ' WHERE post_id = ?';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->post_id);
        if($stmt->execute()) {
            return true;
        }
        printf("Error: %s.\n", $stmt->error);
        return false;
    }
}
?>
