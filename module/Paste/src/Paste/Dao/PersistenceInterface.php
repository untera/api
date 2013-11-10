<?php 
namespace Paste\Dao;

interface PersistenceInterface
{
	public function save( $data);
	public function update( $data);
	public function delete($id);
	public function fetch($id);
	public function fetchAll();
}