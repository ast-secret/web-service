<?php 


namespace App\Controller;

use App\Model\CardsExercise;
use App\Model\Card;

class CardsExercisesController extends AppController
{
	
	public $CardsExercise;
	public $Card;

	function __construct()
	{
		parent::__construct();
		$this->CardsExercise = new CardsExercise;				
		$this->Card = new Card;		
	}


	public function index(){
		$select = $this->Card->find();

		$select
			->cols(['id'])
			->where('current = 1');

		$card = $this->Card->one($select);

		$select = $this->CardsExercise->find();
		$select
			->cols(['*'])
			->join('INNER','cards as Card', 'CardsExercise.card_id = Card.id')
			->join('INNER','exercises as Exercise', 'CardsExercise.exercise_id = Exercise.id')
			->join('INNER','exercises_groups as ExerciseGroup', 'CardsExercise.exercises_group_id = ExerciseGroup.id')
			->join('INNER','machines as Machine', 'CardsExercise.machine_id = Machine.id')
			->where('CardsExercise.card_id = :id')
    		->bindValues(['id' => $card->id]);


		$exercices_from_card = $this->CardsExercise->all($select);

		print_r($exercices_from_card);
		exit();

		$this->response(200, 'ok', $releases);
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