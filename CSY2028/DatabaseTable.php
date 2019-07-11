<?php
namespace CSY2028;
use \Exception;

class DatabaseTable {
	private $pdo;
	private $table;
	private $primaryKey;

	public function __construct($pdo, $table, $primaryKey) {
		$this->pdo = $pdo;
		$this->table = $table;
		$this->primaryKey = $primaryKey;
	}

	public function find($field, $value) {
		$stmt = $this->pdo->prepare('SELECT * FROM ' . $this->table . ' WHERE ' . $field . ' = :value');

		$criteria = [
			'value' => $value
		];
		$stmt->execute($criteria);

		return $stmt->fetchAll();
	}


	public function findDistinct($field, $value) {
		$stmt = $this->pdo->prepare('SELECT DISTINT ' . $field . ' FROM ' . $this->table);

		$stmt->execute();

		return $stmt->fetchAll();
	}

	public function findSearch($name, $artist, $max, $min) {
		$stmt = $this->pdo->prepare('SELECT * FROM ' . $this->table . ' WHERE name LIKE :name AND artist LIKE :artist AND start_amount BETWEEN :max AND :min');

		$criteria = [
			'name' => '%'.$name.'%',
			'artist' => '%'.$artist.'%',
			'min' => $min,
			'max' => $max
		];

		$stmt->execute($criteria);

		return $stmt->fetchAll();
	}


	public function findRowCount($field, $sort) {
		$stmt = $this->pdo->prepare('SELECT '.$field.', count(*) FROM '.$this->table.' GROUP BY '.$field.' ORDER BY count(*) '.$sort);

		$stmt->execute();

		return $stmt->fetchAll();
	}

	public function findBetween($field, $start, $end) {
		$stmt = $this->pdo->prepare('SELECT * FROM ' . $this->table . ' WHERE ' . $field . ' BETWEEN :start AND :end ORDER BY ' . $field);

		$criteria = [
			'start' => $start,
			'end' => $end
		];
		$stmt->execute($criteria);

		return $stmt->fetchAll();
	}

	public function findLike($field, $value) {
		$stmt = $this->pdo->prepare('SELECT * FROM ' . $this->table . ' WHERE ' . $field . ' LIKE :value');

		$criteria = [
			'value' => '%'.$value.'%',
		];

		$stmt->execute($criteria);

		return $stmt->fetchAll();
	}

	public function findAll() {
		$stmt = $this->pdo->prepare('SELECT * FROM ' . $this->table);

		$stmt->execute();

		return $stmt->fetchAll();
	}

	public function findSort($field, $value, $sort, $order) {
		$stmt = $this->pdo->prepare('SELECT * FROM ' . $this->table . ' WHERE ' . $field . ' = :value' . 'ORDER BY ' . $sort);

		$criteria = [
			'value' => $value
		];
		$stmt->execute($criteria);

		return $stmt->fetchAll();
	}

	public function findAllSort($sort, $order) {
		$stmt = $this->pdo->prepare('SELECT * FROM ' . $this->table . 'ORDER BY :value');

		$criteria = [
			'value' => $sort
		];

		$stmt->execute($criteria);

		return $stmt->fetchAll();
	}

	public function insert($record) {
	        $keys = array_keys($record);

	        $values = implode(', ', $keys);
	        $valuesWithColon = implode(', :', $keys);

	        $query = 'INSERT INTO ' . $this->table . ' (' . $values . ') VALUES (:' . $valuesWithColon . ')';

	        $stmt = $this->pdo->prepare($query);

	        $stmt->execute($record);
	}

	public function delete($id) {
		$stmt = $this->pdo->prepare('DELETE FROM ' . $this->table . ' WHERE ' . $this->primaryKey . ' = :id');
		$criteria = [
			'id' => $id
		];
		$stmt->execute($criteria);
	}

	public function save($record) {
		try{
			$this->insert($record);
		} catch(Exception $e){
			$this->update($record);
		}
	}

	public function update($record) {

	         $query = 'UPDATE ' . $this->table . ' SET ';

	         $parameters = [];
	         foreach ($record as $key => $value) {
	                $parameters[] = $key . ' = :' .$key;
	         }

	         $query .= implode(', ', $parameters);
	         $query .= ' WHERE ' . $this->primaryKey . ' = :primaryKey';

	         $record['primaryKey'] = $record[$this->primaryKey];

	         $stmt = $this->pdo->prepare($query);

	         $stmt->execute($record);
	}

	public function getLastInsertID() {
		return $this->pdo->lastInsertId();
	}

}
