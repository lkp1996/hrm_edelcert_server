<?php

class WrkInternalQualification
{
    private $connection;

    public function get_internal_qualification_list(DBConnection $db_connection, $employee)
    {
        $this->connection = mysqli_connect($db_connection->get_server(), $db_connection->get_username(), $db_connection->get_password(), $db_connection->get_dbname());
        mysqli_set_charset($this->connection, "utf8");
        if (!$this->connection) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "SELECT internalqualification.pk_internalQualifications, internalqualification.process, internalqualification_employee.yesno, internalqualification_employee.fk_employee, internalqualification_employee.result, internalqualification_employee.validationDate, internalqualification_employee.attachement FROM internalqualification inner join internalqualification_employee on internalqualification.pk_internalQualifications = internalqualification_employee.fk_internalQualification where internalqualification_employee.fk_employee =" . $employee;
        $result = mysqli_query($this->connection, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                if ($row["yesno"] == 0) {
                    $row["yesno"] = false;
                } else {
                    $row["yesno"] = true;
                }
                $emparray[] = $row;
            }
        } else {
            echo "No formationType available";
        }
        mysqli_close($this->connection);
        return json_encode($emparray);
    }

    public function add_default_internal_qualification(DBConnection $db_connection, $pk_employee)
    {
        $this->connection = mysqli_connect($db_connection->get_server(), $db_connection->get_username(), $db_connection->get_password(), $db_connection->get_dbname());
        mysqli_set_charset($this->connection, "utf8");
        if (!$this->connection) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "INSERT INTO internalqualification_employee (fk_internalQualification, fk_employee, yesno, result, validationDate, attachement) VALUES ('1', '" . $pk_employee . "', '0', '', NULL, NULL), ('2', '" . $pk_employee . "', '0', '', NULL, NULL), ('3', '" . $pk_employee . "', '0', '', NULL, NULL), ('4', '" . $pk_employee . "', '0', '', NULL, NULL), ('5', '" . $pk_employee . "', '0', '', NULL, NULL), ('6', '" . $pk_employee . "', '0', '', NULL, NULL), ('7', '" . $pk_employee . "', '0', '', NULL, NULL), ('8', '" . $pk_employee . "', '0', '', NULL, NULL), ('9', '" . $pk_employee . "', '0', '', NULL, NULL)";
        if ($this->connection->query($sql)) {
            $message = "OK";
        } else {
            $message = "KO";
        }

        $this->connection->close();
        return $message;
    }

    public function update_internal_qualifications(DBConnection $db_connection, $internalQualifications)
    {
        $message = "";
        $this->connection = mysqli_connect($db_connection->get_server(), $db_connection->get_username(), $db_connection->get_password(), $db_connection->get_dbname());
        mysqli_set_charset($this->connection, "utf8");
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }

        foreach ($internalQualifications as $updatedIntQual) {
            if($updatedIntQual->yesno == false){
                $updatedIntQual->yesno = 0;
            }else{
                $updatedIntQual->yesno = 1;
            }
            $sql = "UPDATE internalqualification_employee SET yesno = '$updatedIntQual->yesno', result = '$updatedIntQual->result', validationDate = '$updatedIntQual->validationDate', attachement = '$updatedIntQual->attachement' WHERE internalqualification_employee.fk_internalQualification = $updatedIntQual->pk_internalQualifications AND internalqualification_employee.fk_employee = $updatedIntQual->fk_employee";
            if ($this->connection->query($sql)) {
                $message .= "Internal qualification_employee with pk $updatedIntQual->pk_internalQualifications updated \n";
            } else {
                $message .= "Error while updating internal qualification_employee with fk internal qualification $updatedIntQual->pk_internalQualifications and fk employee $updatedIntQual->fk_employee \n";
            }
        }

        $this->connection->close();
        return $message;

    }
}

?>