<?php 

namespace App\Controller;

use App\Model\Service;

class ServicesController extends AppController
{

	public $Service;
	
	function __construct(){
		parent::__construct();
		$this->Service = new Service();
	}

	public function index(){
		$select = $this->Service->find();
		$select
			->cols(['id','name']);

		$services = $this->Service->all($select);	
		$this->response(200, 'ok', $services);

	}


	public function view($id = null){

		if (!$id) {
			$this->response(400,'error', 'Você não informou o ID do Servico');		
		}

		$select = $this->Service->find();
		$select
			->cols(['Service.description','Service.begin_service','Service.end_service','Weekday.weekday'])
			->join('INNER','services_weekdays as ServicesWeekday', 'Service.id = ServicesWeekday.service_id')			
			->join('INNER','weekdays as Weekday', 'Weekday.id = ServicesWeekday.weekday_id')
			->where('Service.id = :id')
    		->bindValues(['id' => $id]);			

    	$service = $this->Service->all($select);
     
		$this->response(200,'ok',$service);	
	}
}