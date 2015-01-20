<?php


namespace App\Controller;
use App\Model\Weekday;

class WeekdaysController extends AppController
{
	$Weekday;

	public function __construct(){
		parent::__construct();
		$this->Weekday = new Weekday();		
	}

	public function add($data){

		if(!$data){
			$this->response(400,'error', 'Informacoes Vazias');
		}

		if($this->Weekday->save($data)){	
			$this->response(200,'ok','Salvo com Sucesso');
		}else{
			$this->response(400,'erros',$this->Weekday->validationsErros);
		}

	}
	
}