<?php

namespace CoreBundle\Entity;

class Album implements Entity
{
	
	public $Name;
	public $Medias;//TODO: como forçar isso ser: List<Media> ??
	
	function __construct($name){
		$this->Name=$name;
		$this->Medias = array();
	}
}

?>