<?php 


namespace App\Controller;


use App\Model\Card;

class CardsController extends AppController
{
	
	
	public $Card;

	function __construct()
	{
		parent::__construct();					
		$this->Card = new Card;		
	}

	

	public function view($id = null){
		
		if (!$id) {
			$this->response(400,'error', 'Voce nao informou o ID do card');
		}

		$select = $this->Card->find();
		$select
			->cols(['User.name', 'Card.start_date', 'Card.end_date','Card.goal', 'Card.obs'])
			->join('INNER','users as User', 'Card.user_id = User.id')			
    		->where('Card.id = :id')
    		->bindValues(['id' => $id]);

		$card = $this->Card->all($select);
     
		$this->response(200,'ok',$card);
	}
}