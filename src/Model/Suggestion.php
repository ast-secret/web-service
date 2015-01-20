<?php 

namespace App\Model;

class Suggestion extends AppModel
{

	public $tableName = "suggestions";

	public $validations = [
		'text' => [
			'required',
			'alphaNum',
			['lengthMax', 600],
			['lengthMin', 3],			
		],

		'customer_id' => [
			'required',
			'numeric'
		]
	];

}