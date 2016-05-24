<?php
class ApiController extends CI_Controller {
	public function __construct() {
        parent::__construct();

        $this->load->model('Benefit');
        $this->load->model('Career');
        $this->load->model('Team');
        $this->load->model('SlideImage');
        $this->load->model('GalleryAlbum');
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
    	echo json_encode($this->Benefit->api_get_all());
    }

    public function api_allCareer(){
    	echo json_encode($this->Career->api_get_all());
    }

    public function api_allTeam(){
    	echo json_encode($this->Team->api_get_all());
    }

    public function api_imageSlider(){
        echo json_encode($this->SlideImage->api_get_all());
    }

    public function api_galleries(){
        echo json_encode($this->GalleryAlbum->api_get_all());
    }
    //end get all data


}
?>