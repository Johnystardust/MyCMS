<?php
/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 10/22/2015
 * Time: 10:10 AM
 */

class User {

    private $db;

    public function __construct($conn){
        $this->db = $conn;
    }

    /*
    |------------------------------------------------------------
    |   Login function
    |
    |   @params: $username, $userPassword
    |
    |   This function logs the user in.
    |------------------------------------------------------------
    */
    public function login($username, $userPassword){
        try {
            $sql = "SELECT * FROM users WHERE username = :username";
            $q = $this->db->prepare($sql);

            $q->execute(array(':username' => $username));
            $userRow = $q->fetch(PDO::FETCH_ASSOC);

            if(count($q) > 0){
                if($userRow['password'] === $userPassword){
                    $_SESSION['user_session'] = $userRow['id'];
                    return true;
                }
                else {
                    return false;
                }
            }
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    /*
    |------------------------------------------------------------
    |   Logout function
    |
    |   This function logs the user out by destroying the
    |   session. It will also unset the 'user_session'.
    |------------------------------------------------------------
    */
    public function logout()
    {
        session_destroy();
        unset($_SESSION['user_session']);
        return true;
    }

    /*
    |------------------------------------------------------------
    |   Create function
    |
    |   @params: $username, $userPassword, $userEmail
    |
    |   This function creates a new admin user.
    |------------------------------------------------------------
    */
    public function create($username, $userPassword, $userEmail){
        try {
            $sql = "INSERT INTO users SET username = :username, password = :userPassword, email = :userEmail";
            $q = $this->db->prepare($sql);

            $q->execute(array(':username' => $username, ':userPassword' => $userPassword, ':userEmail' => $userEmail));

            return $q;
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function update(){

    }

    public function destroy(){

    }

    /*
    |------------------------------------------------------------
    |   Redirect function
    |
    |   @params: $url
    |
    |   This function redirects the user to a page after.
    |------------------------------------------------------------
    */
    public function redirect($url){
        header('location:'.$url);
    }

    /*
    |------------------------------------------------------------
    |   Is Logged In function
    |
    |   This function checks if a user is logged in and returns
    |   true if it is.
    |------------------------------------------------------------
    */
    public function is_loggedin()
    {
        if(isset($_SESSION['user_session']))
        {
            return true;
        }
    }
}