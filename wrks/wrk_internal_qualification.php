<?php

class WrkInternalQualification
{
    private $connection;

    public function get_internal_qualification_process_list(DBConnection $db_connection, $employee)
    {
        $this->connection = mysqli_connect($db_connection->get_server(), $db_connection->get_username(), $db_connection->get_password(), $db_connection->get_dbname());
        mysqli_set_charset($this->connection, "utf8");
        if (!$this->connection) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "SELECT internalqualificationprocess.pk_internalQualificationsProcess, internalqualificationprocess.process, internalqualificationprocess_employee.yesno, internalqualificationprocess_employee.fk_employee, internalqualificationprocess_employee.result, internalqualificationprocess_employee.validationDate, internalqualificationprocess_employee.attachement FROM internalqualificationprocess inner join internalqualificationprocess_employee on internalqualificationprocess.pk_internalQualificationsProcess = internalqualificationprocess_employee.fk_internalQualificationProcess where internalqualificationprocess_employee.fk_employee =" . $employee;
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
        }
        mysqli_close($this->connection);
        return json_encode($emparray);
    }

    public function get_internal_qualification_capacity_list(DBConnection $db_connection, $employee)
    {
        $this->connection = mysqli_connect($db_connection->get_server(), $db_connection->get_username(), $db_connection->get_password(), $db_connection->get_dbname());
        mysqli_set_charset($this->connection, "utf8");
        if (!$this->connection) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "SELECT internalqualificationcapacity.pk_internalQualificationsCapacity, internalqualificationcapacity.capacity, internalqualificationcapacity_employee.yesno, internalqualificationcapacity_employee.fk_employee, internalqualificationcapacity_employee.result, internalqualificationcapacity_employee.validationDate, internalqualificationcapacity_employee.attachement FROM internalqualificationcapacity inner join internalqualificationcapacity_employee on internalqualificationcapacity.pk_internalQualificationsCapacity = internalqualificationcapacity_employee.fk_internalQualificationCapacity where internalqualificationcapacity_employee.fk_employee =" . $employee;
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
        }
        mysqli_close($this->connection);
        return json_encode($emparray);
    }

    public function add_default_internal_qualification_process(DBConnection $db_connection, $pk_employee)
    {
        $this->connection = mysqli_connect($db_connection->get_server(), $db_connection->get_username(), $db_connection->get_password(), $db_connection->get_dbname());
        mysqli_set_charset($this->connection, "utf8");
        if (!$this->connection) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "INSERT INTO internalqualificationprocess_employee (fk_internalQualificationProcess, fk_employee, yesno, result, validationDate, attachement) VALUES ('1', '" . $pk_employee . "', '0', '', NULL, NULL), 
                ('2', '" . $pk_employee . "', '0', '', NULL, NULL), ('3', '" . $pk_employee . "', '0', '', NULL, NULL), ('4', '" . $pk_employee . "', '0', '', NULL, NULL), ('5', '" . $pk_employee . "', '0', '', NULL, NULL), 
                ('6', '" . $pk_employee . "', '0', '', NULL, NULL), ('7', '" . $pk_employee . "', '0', '', NULL, NULL), ('8', '" . $pk_employee . "', '0', '', NULL, NULL), ('9', '" . $pk_employee . "', '0', '', NULL, NULL)";
        if ($this->connection->query($sql)) {
            $message = "OK";
        } else {
            $message = "KO";
        }

        $this->connection->close();
        return $message;
    }

    public function add_default_internal_qualification_capacity(DBConnection $db_connection, $pk_employee)
    {
        $this->connection = mysqli_connect($db_connection->get_server(), $db_connection->get_username(), $db_connection->get_password(), $db_connection->get_dbname());
        mysqli_set_charset($this->connection, "utf8");
        if (!$this->connection) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "INSERT INTO internalqualificationcapacity_employee (fk_internalQualificationcapacity, fk_employee, yesno, result, validationDate, attachement) VALUES ('1', '" . $pk_employee . "', '0', '', NULL, NULL), 
                ('2', '" . $pk_employee . "', '0', '', NULL, NULL), ('3', '" . $pk_employee . "', '0', '', NULL, NULL), ('4', '" . $pk_employee . "', '0', '', NULL, NULL), ('5', '" . $pk_employee . "', '0', '', NULL, NULL), 
                ('6', '" . $pk_employee . "', '0', '', NULL, NULL), ('7', '" . $pk_employee . "', '0', '', NULL, NULL), ('8', '" . $pk_employee . "', '0', '', NULL, NULL), ('9', '" . $pk_employee . "', '0', '', NULL, NULL),
                ('10', '" . $pk_employee . "', '0', '', NULL, NULL), ('11', '" . $pk_employee . "', '0', '', NULL, NULL)";
        if ($this->connection->query($sql)) {
            $message = "OK";
        } else {
            $message = "KO";
        }

        $this->connection->close();
        return $message;
    }

    public function update_internal_qualifications_process(DBConnection $db_connection, $internalQualificationsProcess)
    {
        $message = "";
        $this->connection = mysqli_connect($db_connection->get_server(), $db_connection->get_username(), $db_connection->get_password(), $db_connection->get_dbname());
        mysqli_set_charset($this->connection, "utf8");
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }

        foreach ($internalQualificationsProcess as $updatedIntQualProcess) {
            if ($updatedIntQualProcess->yesno == false) {
                $updatedIntQualProcess->yesno = 0;
            } else {
                $updatedIntQualProcess->yesno = 1;
            }
            $sql = "UPDATE internalqualificationprocess_employee SET yesno = '$updatedIntQualProcess->yesno', result = '" . addslashes($updatedIntQualProcess->result) . "', validationDate = '$updatedIntQualProcess->validationDate', attachement = '$updatedIntQualProcess->attachement' WHERE internalqualificationprocess_employee.fk_internalQualificationProcess = $updatedIntQualProcess->pk_internalQualificationsProcess AND internalqualificationprocess_employee.fk_employee = $updatedIntQualProcess->fk_employee";
            if ($this->connection->query($sql)) {
                $message .= "Internal qualification_employee with pk $updatedIntQualProcess->pk_internalQualificationsProcess updated \n";
            } else {
                $message .= "Error while updating internal qualification_employee with fk internal qualification $updatedIntQualProcess->pk_internalQualificationsProcess and fk employee $updatedIntQualProcess->fk_employee \n";
            }
        }

        $this->connection->close();
        return $message;
    }

    public function update_internal_qualifications_capacity(DBConnection $db_connection, $internalQualificationsCapacity)
    {
        $message = "";
        $this->connection = mysqli_connect($db_connection->get_server(), $db_connection->get_username(), $db_connection->get_password(), $db_connection->get_dbname());
        mysqli_set_charset($this->connection, "utf8");
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }

        foreach ($internalQualificationsCapacity as $updatedIntQualCapacity) {
            if ($updatedIntQualCapacity->yesno == false) {
                $updatedIntQualCapacity->yesno = 0;
            } else {
                $updatedIntQualCapacity->yesno = 1;
            }
            $sql = "UPDATE internalqualificationcapacity_employee SET yesno = '$updatedIntQualCapacity->yesno', result = '" . addslashes($updatedIntQualCapacity->result) . "', validationDate = '$updatedIntQualCapacity->validationDate', attachement = '$updatedIntQualCapacity->attachement' WHERE internalqualificationcapacity_employee.fk_internalQualificationCapacity = $updatedIntQualCapacity->pk_internalQualificationsCapacity AND internalqualificationcapacity_employee.fk_employee = $updatedIntQualCapacity->fk_employee";
            if ($this->connection->query($sql)) {
                $message .= "Internal qualification_employee with pk $updatedIntQualCapacity->pk_internalQualificationsCapacity updated \n";
            } else {
                $message .= "Error while updating internal qualification_employee with fk internal qualification $updatedIntQualCapacity->pk_internalQualificationsCapacity and fk employee $updatedIntQualCapacity->fk_employee \n";
            }
        }

        $this->connection->close();
        return $message;
    }

}

?>