<?php

namespace CoreBundle\Entity;

class BookMarkList implements Entity
{
	public $Name;
	public $Owner;
	public $Items;
	
	function __construct(string $name, User $user)
	{
		$this->Name = name;
		$this->Owner = user;
		
		if ($this->Items == null)
		$this->Items = array();
	}
}

?>