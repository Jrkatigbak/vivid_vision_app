<?php
include_once 'Db.php';

class Login {
    private $conn;
    private $table = "user";

    public function __construct($db) {
        $this->conn = $db;
    }

    // Verify login by checking email and password
    public function verify($email, $password) {
        // Query to check if user exists
        $query = "SELECT * FROM " . $this->table . " WHERE email = :email LIMIT 1";

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean and bind parameters
        $email = htmlspecialchars(strip_tags($email));
        $stmt->bindParam(':email', $email);

        // Execute the query
        $stmt->execute();

        // Check if user exists
        if ($stmt->rowCount() > 0) {
            // Fetch user data
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // Verify the password using password_verify() (assuming password is hashed)
            if (password_verify($password, $user['password'])) {

                // Data to be set as session variables
                $session_data = array(
                    'id_user' => $user['id'],
                    'name' => $user['name'],
                    'email' => $user['email']
                );
                // Loop through the data and set session variables in bulk
                foreach ($session_data as $key => $value) {
                    $_SESSION[$key] = $value;
                }

                // Login successful
                return [
                    'status' => true,
                    'message' => "'Login Successfully','Welcome to Vivid Vision App','success'"
                ];
            } else {
                // Invalid password
                return [
                    'status' => false,
                    'message' => "'Wrong your password','','error'"
                ];
            }
        } else {
            // Invalid email
            return [
                'status' => false,
                'message' => "'Invalid Email Address','','error'"
            ];
        }
    }

}
?>
