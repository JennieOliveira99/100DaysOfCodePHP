<?php

namespace app\models;

use app\classes\Bind;
use app\models\Connection;

abstract class Model {

	protected $connection;

	public function __construct() {
		$this->connection = Bind::get('connection');
	}

	public function all() {
		$sql = "select * from {$this->table}";
		$list = $this->connection->query($sql);
		$list->execute();

		return $list->fetchAll();
	}

}