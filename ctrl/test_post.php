<?php
include("ctrl.php");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");


$test = new TestNTM();
$json = json_decode(file_get_contents('php://input'));
echo $test->add_employee($json);

class TestNTM {
    private $ctrl;

    public function __construct()
    {
        $this->ctrl = new Ctrl();
    }

    public function add_employee($employee)
    {
        return $this->ctrl->add_employee($employee);
    }
}
?>