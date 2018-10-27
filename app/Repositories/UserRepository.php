<?php

namespace App\Repositories;

class UserRepository
{
    public function __construct()
    {

    }

    public function all()
    {
        $mysqli = $this->getDBConnectionObj();

        $sql = 'SELECT t.DancerID, t.StudioName, t.StudioID, t.FirstName, t.LastName, t.Gender, t.DOB, t.DateCreated
        
                FROM tblstudios AS t';
        $result = $mysqli->query($sql);

        $users = [];
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }

        return $users;
    }

    public function show($id)
    {
        if (!is_numeric($id)) {
            throw new Exception('Please provide a valid numeric user id');
        }

        $mysqli = $this->getDBConnectionObj();

        $sql = 'SELECT t.DancerID, t.StudioName, t.StudioID, t.FirstName, t.LastName, t.Gender, t.DOB, t.DateCreated
        
                FROM tblstudios AS t
                
                WHERE DancerID = ?';

        if (!($stmt = $mysqli->prepare($sql))) {
            return "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
        }

        if (!$stmt->bind_param("i", $id)) {
            return "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
        }

        if (!$stmt->execute()) {
            return "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
        }

        if (!($res = $stmt->get_result())) {
            return "Getting result set failed: (" . $stmt->errno . ") " . $stmt->error;
        }

        if ($res->num_rows === 1) {
            return $res->fetch_assoc();
        } else {
            // redirect user not found
        }
    }

    public function create()
    {
        // create the user
    }

    private function getDBConnectionObj()
    {
        $mysqli = new \mysqli("localhost", "dancebug", "dancebug", "dancebug");
        if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            exit;
        }

        return $mysqli;
    }
}
