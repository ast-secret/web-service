<?php 


namespace App\Controller;

use App\Model\Suggestion;

class SuggestionsController extends AppController
{
	
	public $Suggestion;

	function __construct()
	{
		parent::__construct();
		$this->Suggestion = new Suggestion;		
	}


	public function add(){

		$data = ['text' => 'xxt', 'customer_id' => 1, 'created' => '2015-01-10 10:00:00'];

		if($this->Suggestion->save($data)){	
			$this->response(200,'ok','Salvo com Sucesso');
		}else{
			$this->response(400,'erros',$this->Suggestion->validationsErros);
		}


	}
}