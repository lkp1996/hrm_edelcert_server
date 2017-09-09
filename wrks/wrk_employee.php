<?php

class WrkEmployee
{
    private $connection;

    public function get_employees_list(DBConnection $db_connection)
    {
        $this->connection = mysqli_connect($db_connection->get_server(), $db_connection->get_username(), $db_connection->get_password(), $db_connection->get_dbname());
        mysqli_set_charset($this->connection, "utf8");
        if (!$this->connection) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "SELECT pk_employee, lastName, firstName, phone, email, currentTitle FROM employee";
        $result = mysqli_query($this->connection, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $emparray[] = $row;
            }
        } else {
            echo "No employees available";
        }
        mysqli_close($this->connection);
        return json_encode($emparray);
    }

    public function get_employee_administration(DBConnection $db_connection, $pk_employee)
    {
        $this->connection = mysqli_connect($db_connection->get_server(), $db_connection->get_username(), $db_connection->get_password(), $db_connection->get_dbname());
        mysqli_set_charset($this->connection, "utf8");
        if (!$this->connection) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "SELECT pk_employee, lastName, firstName, birthDate, address,postCode, location, avs, phone, email, picture, currentTitle, comingToOfficeDate, currentHourlyWage, cv, criminalRecord FROM employee WHERE pk_employee = " . $pk_employee;
        $result = mysqli_query($this->connection, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $emparray = $row;
            }
        } else {
            echo "No employee administration available";
        }
        mysqli_close($this->connection);
        return json_encode($emparray);
    }

    public function get_employee_formation(DBConnection $db_connection, $pk_employee)
    {
        $this->connection = mysqli_connect($db_connection->get_server(), $db_connection->get_username(), $db_connection->get_password(), $db_connection->get_dbname());
        mysqli_set_charset($this->connection, "utf8");
        if (!$this->connection) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "SELECT * FROM formation WHERE fk_employee = " . $pk_employee;
        $result = mysqli_query($this->connection, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $emparray[] = $row;
            }
        } else {
            //echo "[]";
        }
        mysqli_close($this->connection);
        return json_encode($emparray);
    }

    public function get_employee_professionnalexperience(DBConnection $db_connection, $pk_employee)
    {
        $this->connection = mysqli_connect($db_connection->get_server(), $db_connection->get_username(), $db_connection->get_password(), $db_connection->get_dbname());
        mysqli_set_charset($this->connection, "utf8");
        if (!$this->connection) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "SELECT * FROM professionnalexperience WHERE fk_employee = " . $pk_employee;
        $result = mysqli_query($this->connection, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $emparray[] = $row;
            }
        } else {
            //echo "[]";
        }
        mysqli_close($this->connection);
        return json_encode($emparray);
    }

    public function get_employee_consultingexperience(DBConnection $db_connection, $pk_employee)
    {
        $this->connection = mysqli_connect($db_connection->get_server(), $db_connection->get_username(), $db_connection->get_password(), $db_connection->get_dbname());
        mysqli_set_charset($this->connection, "utf8");
        if (!$this->connection) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "SELECT * FROM consultingexperience WHERE fk_employee = " . $pk_employee;
        $result = mysqli_query($this->connection, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $emparray[] = $row;
            }
        } else {
            //echo "[]";
        }
        mysqli_close($this->connection);
        return json_encode($emparray);
    }

    public function get_employee_auditexperience(DBConnection $db_connection, $pk_employee)
    {
        $this->connection = mysqli_connect($db_connection->get_server(), $db_connection->get_username(), $db_connection->get_password(), $db_connection->get_dbname());
        mysqli_set_charset($this->connection, "utf8");
        if (!$this->connection) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "SELECT * FROM auditexperience WHERE fk_employee = " . $pk_employee;
        $result = mysqli_query($this->connection, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $emparray[] = $row;
            }
        } else {
            echo "No employee audit experience available";
        }
        mysqli_close($this->connection);
        return json_encode($emparray);
    }

    public function get_employee_auditobservation(DBConnection $db_connection, $pk_employee)
    {
        $this->connection = mysqli_connect($db_connection->get_server(), $db_connection->get_username(), $db_connection->get_password(), $db_connection->get_dbname());
        mysqli_set_charset($this->connection, "utf8");
        if (!$this->connection) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "SELECT * FROM auditobservation WHERE fk_employee = " . $pk_employee;
        $result = mysqli_query($this->connection, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $emparray[] = $row;
            }
        } else {
            echo "No employee audit observation available";
        }
        mysqli_close($this->connection);
        return json_encode($emparray);
    }

    public function get_employee_objective(DBConnection $db_connection, $pk_employee)
    {
        $this->connection = mysqli_connect($db_connection->get_server(), $db_connection->get_username(), $db_connection->get_password(), $db_connection->get_dbname());
        mysqli_set_charset($this->connection, "utf8");
        if (!$this->connection) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "SELECT * FROM objective WHERE fk_employee = " . $pk_employee;
        $result = mysqli_query($this->connection, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                if ($row["validate"] == 0) {
                    $row["validate"] = false;
                } else {
                    $row["validate"] = true;
                }
                $emparray[] = $row;
            }
        } else {
            echo "No employee objective available";
        }
        mysqli_close($this->connection);
        return json_encode($emparray);
    }

    public function get_employee_mandatesheet(DBConnection $db_connection, $pk_employee)
    {
        $this->connection = mysqli_connect($db_connection->get_server(), $db_connection->get_username(), $db_connection->get_password(), $db_connection->get_dbname());
        mysqli_set_charset($this->connection, "utf8");
        if (!$this->connection) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "SELECT * FROM mandatesheet WHERE fk_employee = " . $pk_employee;
        $result = mysqli_query($this->connection, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $emparray[] = $row;
            }
        } else {
            echo "No employee mandatesheet available";
        }
        mysqli_close($this->connection);
        return json_encode($emparray);
    }

    public function add_employee(DBConnection $db_connection, $employee)
    {
        $this->connection = mysqli_connect($db_connection->get_server(), $db_connection->get_username(), $db_connection->get_password(), $db_connection->get_dbname());
        mysqli_set_charset($this->connection, "utf8");
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }

        $sql = "INSERT INTO employee (pk_employee, lastName, firstName, birthDate, address, postCode, location, avs, phone, email, picture, currentTitle, comingToOfficeDate, currentHourlyWage, cv, criminalRecord)
            VALUES (NULL, '" . $employee->lastName . "', '" . $employee->firstName . "', '" . $employee->birthDate . "', '" . $employee->address . "', '" . $employee->postCode . "', '"
            . $employee->location . "', '" . $employee->avs . "', '" . $employee->phone . "', '" . $employee->email . "', '" . $employee->picture . "', '" . $employee->currentTitle
            . "', '" . $employee->comingToOfficeDate . "', '" . $employee->currentHourlyWage . "', '" . $employee->cv . "', '" . $employee->criminalRecord . "')";
        if ($this->connection->query($sql)) {
            $last_id = $this->connection->insert_id;
        } else {
            $last_id = null;
        }

        $this->connection->close();
        $this->create_dirs($last_id);
        return $last_id;
    }

    public function delete_employee(DBConnection $db_connection, $pk_employee)
    {
        $this->connection = mysqli_connect($db_connection->get_server(), $db_connection->get_username(), $db_connection->get_password(), $db_connection->get_dbname());
        mysqli_set_charset($this->connection, "utf8");
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }

        $sql = "DELETE FROM employee WHERE employee.pk_employee = $pk_employee";
        if ($this->connection->query($sql)) {
            $message = "OK";
        } else {
            $message = "KO";
        }

        $this->connection->close();
        return $message;
    }

    public function update_employee_admin(DBConnection $db_connection, $employee)
    {
        $this->connection = mysqli_connect($db_connection->get_server(), $db_connection->get_username(), $db_connection->get_password(), $db_connection->get_dbname());
        mysqli_set_charset($this->connection, "utf8");
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }

        $sql = "UPDATE employee SET lastName = '$employee->lastName', firstName = '$employee->firstName', birthDate = '$employee->birthDate', 
                  address = '$employee->address', postCode = '$employee->postCode', location = '$employee->location', avs = '$employee->avs', 
                  phone = '$employee->phone', email = '$employee->email', currentTitle = '$employee->currentTitle', comingToOfficeDate = '$employee->comingToOfficeDate', 
                  currentHourlyWage = '$employee->currentHourlyWage', cv = '$employee->cv', criminalRecord = '$employee->criminalRecord' WHERE employee.pk_employee = $employee->pk_employee";
        if ($this->connection->query($sql)) {
            $message = "OK";
        } else {
            $message = "KO";
        }

        $this->connection->close();
        return $message;
    }

    public function update_employee_formations(DBConnection $db_connection, $employee_formations)
    {
        $message = "";
        $this->connection = mysqli_connect($db_connection->get_server(), $db_connection->get_username(), $db_connection->get_password(), $db_connection->get_dbname());
        mysqli_set_charset($this->connection, "utf8");
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }

        $sql = "SELECT * FROM formation WHERE formation.fk_employee = " . $employee_formations[0]->fk_employee;
        $result = mysqli_query($this->connection, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $oldFormations[] = $row;
            }
        }

        foreach ($employee_formations as $updatedFormation) {
            if ($updatedFormation->pk_formation == null) {
                //if there's new formations (insert)
                $sql = "INSERT INTO formation (pk_formation, formativeOrganization, fk_formationType, EAScope, fromDate, toDate, attachement, fk_employee) 
                      VALUES (NULL, '$updatedFormation->formativeOrganization', '$updatedFormation->fk_formationType', '$updatedFormation->EAScope', 
                      '$updatedFormation->fromDate', '$updatedFormation->toDate', '$updatedFormation->attachement', '$updatedFormation->fk_employee')";
                if ($this->connection->query($sql)) {
                    $message .= "New formation « $updatedFormation->formativeOrganization » added \n";
                } else {
                    $message .= "Error while adding new formation « $updatedFormation->formativeOrganization » \n";
                }
            } else {
                //if formation already exist (update)
                $sql = "UPDATE formation SET formativeOrganization = '$updatedFormation->formativeOrganization', 
                          fk_formationType = '$updatedFormation->fk_formationType', EAScope = '$updatedFormation->EAScope', 
                          fromDate = '$updatedFormation->fromDate', toDate = '$updatedFormation->toDate', 
                          attachement = '$updatedFormation->attachement' WHERE formation.pk_formation = $updatedFormation->pk_formation";
                if ($this->connection->query($sql)) {
                    $message .= "Formation with pk $updatedFormation->pk_formation updated \n";
                } else {
                    $message .= "Error while updating formation with pk $updatedFormation->pk_formation \n";
                }
            }
        }
        foreach ($oldFormations as $oldFormation) {
            $stillExist = false;
            foreach ($employee_formations as $updatedFormation) {
                $message .= "updated pk" . $updatedFormation->pk_formation . "\n" . "old pk " . $oldFormation["pk_formation"] . "\n";
                if ($updatedFormation->pk_formation == $oldFormation["pk_formation"]) {

                    $stillExist = true;
                }
            }
            if (!$stillExist) {
                $sql = "DELETE FROM formation WHERE formation.pk_formation = " . $oldFormation["pk_formation"];
                if ($this->connection->query($sql)) {
                    $message .= "Formation with pk " . $oldFormation["pk_formation"] . " deleted \n";
                } else {
                    $message .= "Error while deleting formation with pk " . $oldFormation["pk_formation"] . "\n";
                }
            }
        }

        $this->connection->close();
        return $message;
    }

    public function empty_employee_formations(DBConnection $db_connection, $pk_employee)
    {
        $message = "";
        $this->connection = mysqli_connect($db_connection->get_server(), $db_connection->get_username(), $db_connection->get_password(), $db_connection->get_dbname());
        mysqli_set_charset($this->connection, "utf8");
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }

        $sql = "DELETE FROM formation WHERE formation.fk_employee = " . $pk_employee;
        if ($this->connection->query($sql)) {
            $message .= "Formations with fk employee " . $pk_employee . " deleted \n";
        } else {
            $message .= "Error while deleting formations with fk employee " . $pk_employee . "\n";
        }

        $this->connection->close();
        return $message;
    }

    public function update_employee_professionnalExperiences(DBConnection $db_connection, $employee_professionnalExperience)
    {
        $message = "";
        $this->connection = mysqli_connect($db_connection->get_server(), $db_connection->get_username(), $db_connection->get_password(), $db_connection->get_dbname());
        mysqli_set_charset($this->connection, "utf8");
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }

        $sql = "SELECT * FROM professionnalexperience WHERE professionnalexperience.fk_employee = " . $employee_professionnalExperience[0]->fk_employee;
        $result = mysqli_query($this->connection, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $oldProfessionnalExperiences[] = $row;
            }
        }

        foreach ($employee_professionnalExperience as $updatedProfExp) {
            if ($updatedProfExp->pk_professionnalExperience == null) {
                //if there's new profexp (insiert)
                $sql = "INSERT INTO professionnalexperience (pk_professionnalExperience, organizationName, organizationActivity, fonction, EAScope, fromDate, toDate, attachement, fk_employee) 
                      VALUES (NULL, '$updatedProfExp->organizationName', '$updatedProfExp->organizationActivity', '$updatedProfExp->fonction', 
                      '$updatedProfExp->EAScope', '$updatedProfExp->fromDate', '$updatedProfExp->toDate', '$updatedProfExp->attachement', '$updatedProfExp->fk_employee')";
                if ($this->connection->query($sql)) {
                    $message .= "New professionnal experience « $updatedProfExp->organizationName » added \n";
                } else {
                    $message .= "Error while adding new professionnal experience « $updatedProfExp->organizationName » \n";
                }
            } else {
                //if profexp already exist (update)
                $sql = "UPDATE professionnalexperience SET organizationName = '$updatedProfExp->organizationName', 
                          organizationActivity = '$updatedProfExp->organizationActivity', fonction = '$updatedProfExp->fonction', 
                          EAScope = '$updatedProfExp->EAScope', fromDate = '$updatedProfExp->fromDate', 
                          toDate = '$updatedProfExp->toDate', attachement = '$updatedProfExp->attachement' WHERE professionnalexperience.pk_professionnalExperience = $updatedProfExp->pk_professionnalExperience";
                if ($this->connection->query($sql)) {
                    $message .= "Professionnal experience with pk $updatedProfExp->pk_professionnalExperience updated \n";
                } else {
                    $message .= "Error while updating professionnal experience with pk $updatedProfExp->pk_professionnalExperience \n";
                }
            }
        }
        foreach ($oldProfessionnalExperiences as $oldProfessionnalExperience) {
            $stillExist = false;
            foreach ($employee_professionnalExperience as $updatedProfExp) {
                $message .= "updated pk" . $updatedProfExp->pk_professionnalExperience . "\n" . "old pk " . $oldProfessionnalExperience["pk_professionnalExperience"] . "\n";
                if ($updatedProfExp->pk_professionnalExperience == $oldProfessionnalExperience["pk_professionnalExperience"]) {

                    $stillExist = true;
                }
            }
            if (!$stillExist) {
                $sql = "DELETE FROM professionnalexperience WHERE professionnalexperience.pk_professionnalExperience = " . $oldProfessionnalExperience["pk_professionnalExperience"];
                if ($this->connection->query($sql)) {
                    $message .= "Professionnal experience with pk " . $oldProfessionnalExperience["pk_professionnalExperience"] . " deleted \n";
                } else {
                    $message .= "Error while deleting professionnal experience with pk " . $oldProfessionnalExperience["pk_professionnalExperience"] . "\n";
                }
            }
        }

        $this->connection->close();
        return $message;
    }

    public function empty_employee_professionnalExperiences(DBConnection $db_connection, $pk_employee)
    {
        $message = "";
        $this->connection = mysqli_connect($db_connection->get_server(), $db_connection->get_username(), $db_connection->get_password(), $db_connection->get_dbname());
        mysqli_set_charset($this->connection, "utf8");
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }

        $sql = "DELETE FROM professionnalexperience WHERE professionnalexperience.fk_employee = " . $pk_employee;
        if ($this->connection->query($sql)) {
            $message .= "Professionnal experiences with fk employee " . $pk_employee . " deleted \n";
        } else {
            $message .= "Error while deleting professionnal experiences with fk employee " . $pk_employee . "\n";
        }

        $this->connection->close();
        return $message;
    }

    public function update_employee_consultingExperiences(DBConnection $db_connection, $employee_consultingExperiences)
    {
        $message = "";
        $this->connection = mysqli_connect($db_connection->get_server(), $db_connection->get_username(), $db_connection->get_password(), $db_connection->get_dbname());
        mysqli_set_charset($this->connection, "utf8");
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }

        $sql = "SELECT * FROM consultingexperience WHERE consultingexperience.fk_employee = " . $employee_consultingExperiences[0]->fk_employee;
        $result = mysqli_query($this->connection, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $oldConsultingExperiences[] = $row;
            }
        }

        foreach ($employee_consultingExperiences as $updatedConExp) {
            if ($updatedConExp->pk_consultingExperience == null) {
                //if there's new conexp (insiert)
                $sql = "INSERT INTO consultingexperience (pk_consultingExperience, organizationName, organizationActivity, fk_NMSStandard, EAScope, organization, year, fk_employee) 
                      VALUES (NULL, '$updatedConExp->organizationName', '$updatedConExp->organizationActivity', '$updatedConExp->fk_NMSStandard', 
                      '$updatedConExp->EAScope', '$updatedConExp->organization', '$updatedConExp->year', '$updatedConExp->fk_employee')";
                if ($this->connection->query($sql)) {
                    $message .= "New consulting experience « $updatedConExp->organizationName » added \n";
                } else {
                    $message .= "Error while adding new consulting experience « $updatedConExp->organizationName » \n";
                }
            } else {
                //if conexp already exist (update)
                $sql = "UPDATE consultingexperience SET organizationName = '$updatedConExp->organizationName', 
                          organizationActivity = '$updatedConExp->organizationActivity', fk_NMSStandard = '$updatedConExp->fk_NMSStandard', 
                          EAScope = '$updatedConExp->EAScope', organization = '$updatedConExp->organization', 
                          year = '$updatedConExp->year' WHERE consultingexperience.pk_consultingExperience = $updatedConExp->pk_consultingExperience";
                if ($this->connection->query($sql)) {
                    $message .= "Consulting experience with pk $updatedConExp->pk_consultingExperience updated \n";
                } else {
                    $message .= "Error while updating consulting experience with pk $updatedConExp->pk_consultingExperience \n";
                }
            }
        }
        foreach ($oldConsultingExperiences as $oldConsultingExperience) {
            $stillExist = false;
            foreach ($employee_consultingExperiences as $updatedConExp) {
                $message .= "updated pk" . $updatedConExp->pk_consultingExperience . "\n" . "old pk " . $oldConsultingExperience["pk_consultingExperience"] . "\n";
                if ($updatedConExp->pk_consultingExperience == $oldConsultingExperience["pk_consultingExperience"]) {

                    $stillExist = true;
                }
            }
            if (!$stillExist) {
                $sql = "DELETE FROM consultingexperience WHERE consultingexperience.pk_consultingExperience = " . $oldConsultingExperience["pk_consultingExperience"];
                if ($this->connection->query($sql)) {
                    $message .= "Consulting experience with pk " . $oldConsultingExperience["pk_consultingExperience"] . " deleted \n";
                } else {
                    $message .= "Error while deleting consulting experience with pk " . $oldConsultingExperience["pk_consultingExperience"] . "\n";
                }
            }
        }

        $this->connection->close();
        return $message;
    }

    public function empty_employee_consultingExperiences(DBConnection $db_connection, $pk_employee)
    {
        $message = "";
        $this->connection = mysqli_connect($db_connection->get_server(), $db_connection->get_username(), $db_connection->get_password(), $db_connection->get_dbname());
        mysqli_set_charset($this->connection, "utf8");
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }

        $sql = "DELETE FROM consultingexperience WHERE consultingexperience.fk_employee = " . $pk_employee;
        if ($this->connection->query($sql)) {
            $message .= "Consulting experiences with fk employee " . $pk_employee . " deleted \n";
        } else {
            $message .= "Error while deleting consulting experiences with fk employee " . $pk_employee . "\n";
        }

        $this->connection->close();
        return $message;
    }

    public function create_dirs($pk_employee)
    {
        mkdir("../attachements/auditobservation/$pk_employee");
        mkdir("../attachements/criminalrecord/$pk_employee");
        mkdir("../attachements/cv/$pk_employee");
        mkdir("../attachements/formation/$pk_employee");
        mkdir("../attachements/internalqualification/$pk_employee");
        mkdir("../attachements/mandatesheet/$pk_employee");
        mkdir("../attachements/picture/$pk_employee");
        mkdir("../attachements/professionnalexperience/$pk_employee");
    }
}

?>