<?php

namespace CoreBundle\Entity;

class BookMarkList extends Entity
{
	public $Name;
	public $Owner;
	public $Items;
	
	function __construct($name, $user)
	{
		$this->Name = name;
		$this->Owner = user;
		
		if ($this->Items == null)
		$this->Items = array();
	}
}

?>