<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
include("../wrks/wrk.php");
$ctrl = new Ctrl();

if (isset($_GET["employees_list"])) {
    echo $ctrl->display_employees_list();
} else if (isset($_GET["employee_administration"])) {
    echo $ctrl->display_employee_administration($_GET["employee_administration"]);
} else if (isset($_GET["employee_formation"])) {
    echo $ctrl->display_employee_formation($_GET["employee_formation"]);
} else if (isset($_GET["employee_professionnalexperience"])) {
    echo $ctrl->display_employee_professionnalexperience($_GET["employee_professionnalexperience"]);
} else if (isset($_GET["employee_consultingexperience"])) {
    echo $ctrl->display_employee_consultingexperience($_GET["employee_consultingexperience"]);
} else if (isset($_GET["employee_auditexperience"])) {
    echo $ctrl->display_employee_auditexperience($_GET["employee_auditexperience"]);
} else if (isset($_GET["employee_internalqualification"])) {
    echo $ctrl->display_employee_internalqualification($_GET["employee_internalqualification"]);
} else if (isset($_GET["employee_auditobservation"])) {
    echo $ctrl->display_employee_auditobservation($_GET["employee_auditobservation"]);
} else if (isset($_GET["employee_objective"])) {
    echo $ctrl->display_employee_objective($_GET["employee_objective"]);
} else if (isset($_GET["employee_mandatesheet"])) {
    echo $ctrl->display_employee_mandatesheet($_GET["employee_mandatesheet"]);
} else if (isset($_GET["formation_types"])) {
    echo $ctrl->get_formation_types_list();
} else if (isset($_GET["nmsstandards"])) {
    echo $ctrl->get_nmsstandard_list();
} else if (isset($_GET["employee_internalqualifications"])) {
    echo $ctrl->get_internal_qualification_list($_GET["employee_internalqualifications"]);
} else if ($json = json_decode(file_get_contents('php://input'))) {
    echo $ctrl->add_employee($json);
}

class Ctrl
{
    private $wrk;

    public function __construct()
    {
        $this->wrk = new Wrk();
    }

    public function display_employees_list()
    {
        return $this->wrk->get_employees_list();
    }

    public function display_employee_administration($pk_employee)
    {
        return $this->wrk->get_employee_administration($pk_employee);
    }

    public function display_employee_formation($pk_employee)
    {
        return $this->wrk->get_employee_formation($pk_employee);
    }

    public function display_employee_professionnalexperience($pk_employee)
    {
        return $this->wrk->get_employee_professionnalexperience($pk_employee);
    }

    public function display_employee_consultingexperience($pk_employee)
    {
        return $this->wrk->get_employee_consultingexperience($pk_employee);
    }

    public function display_employee_auditexperience($pk_employee)
    {
        return $this->wrk->get_employee_auditexperience($pk_employee);
    }

    public function display_employee_internalqualification($pk_employee)
    {
        return $this->wrk->get_employee_internalqualification($pk_employee);
    }

    public function display_employee_auditobservation($pk_employee)
    {
        return $this->wrk->get_employee_auditobservation($pk_employee);
    }

    public function display_employee_objective($pk_employee)
    {
        return $this->wrk->get_employee_objective($pk_employee);
    }

    public function display_employee_mandatesheet($pk_employee)
    {
        return $this->wrk->get_employee_mandatesheet($pk_employee);
    }

    public function add_employee($employee)
    {
        return $this->wrk->add_employee($employee);
    }

    public function get_formation_types_list()
    {
        return $this->wrk->get_formation_types_list();
    }

    public function get_nmsstandard_list()
    {
        return $this->wrk->get_nmsstandard_list();
    }

    public function get_internal_qualification_list($employee)
    {
        return $this->wrk->get_internal_qualification_list($employee);
    }
}

?>