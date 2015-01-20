<?php

namespace App\Controller;

use App\Model\Article;

/**
 * Controller for test, dont't care about.
 */
class ArticlesController extends AppController
{

	function __construct()
	{
		parent::__construct();
		$this->Article = new Article;
	}

	public function index()
	{

		$data = ['title' => 'title aqui', 'idade' => 5, 'password' => '123', 'confirm_password' => '10'];

		if ($this->Article->save($data)) {
			$this->response(201, ['status' => 'ok', 'message' => 'Dados salvos com sucesso.']);
		} else {
			$this->response(400, ['status' => 'Erro na validação dos dados', 'message' => $this->Article->validationErrors]);
		}
	}
}

?>