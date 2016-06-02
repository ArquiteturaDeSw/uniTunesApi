<?php

namespace CoreBundle\Entity;

abstract class Entity
{
	public $Id;
	public $CreationDate;
	public $Deleted;
	
	function __construct()
	{
		$this->CreationDate = new DateTime(); //TODO: verificar se isto retorna a mesma coisa que DateTime.Now
	}
}
?>