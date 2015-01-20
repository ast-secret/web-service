<?php 

namespace App\Model;

class Release extends AppModel
{

	public $tableName = "releases";

	public $validations = [
		/*'text' => [
			'required',
			'alphaNum',
			['lengthMax', 600],
			['lengthMin', 3],			
		],

		'customer_id' => [
			'required',
			'numeric'
		]*/
	];

}