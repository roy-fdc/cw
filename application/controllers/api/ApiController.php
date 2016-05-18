<?php
class ApiController extends CI_Controller {
	public function __construct() {
        parent::__construct();

        $this->load->model('Benefit');
        $this->load->model('Career');
        $this->load->model('Team');
    }
    // single data query
    public function api_benefit(){
    	echo json_encode($this->Benefit->single_data());
    }

    public function api_career(){
    	echo json_encode($this->Career->single_data());
    }

    public function api_team(){
    	echo json_encode($this->Team->single_data());
    }
    //end single data query


    //get all data
    public function api_allBenefit(){
    	echo json_encode($this->Benefit->get_all());
    }

    public function api_allCareer(){
    	echo json_encode($this->Career->get_all());
    }

    public function api_allTeam(){
    	echo json_encode($this->Team->get_all());
    }
    //end get all data


}
?>