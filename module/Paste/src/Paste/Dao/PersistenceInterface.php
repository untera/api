<?php 
namespace Paste\Dao;

interface PersistenceInterface
{
	public function save(array $data);
	public function update(array $data);
	public function delete($id);
	public function fetch($id);
	public function fetchAll();
}