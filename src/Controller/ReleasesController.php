<?php 


namespace App\Controller;

use App\Model\Release;

class ReleasesController extends AppController
{
	
	public $Release;

	function __construct()
	{
		parent::__construct();
		$this->Release = new Release;		
	}


	public function index(){
		$select = $this->Release->find();
		$select
			->cols(['id', 'title', 'created']);

		$releases = $this->Release->all($select);

		$this->response(200, 'ok', $releases);
	}

	public function view($id = null){
		if (!$id) {
			$this->response(400,'error', 'Você não informou o ID do releases');
		}

		$select = $this->Release->find();
		$select
			->cols(['id', 'title', 'created'])
    		->where(['id = :id'])
    		->bindValues(['id' => $id]);

		$release = $this->Release->all($select);
     
		$this->response(200,'ok',$release);
	}
}