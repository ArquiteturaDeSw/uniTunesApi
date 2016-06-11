<?php

namespace CoreBundle\Entity;

/**
 * @ORM\Entity
 * @ORM\Table(name="Albums")
 */
class Album extends Entity
{
	/** @ORM\Column(type="string") */
	public $Name;

	//TODO: descobrir se há possibilidade de uma midia nao estar em algum album...
	//pois isso muda a forma como o mapeamento é feito.
	//pode ser one to many uni direcional ou milt direcional
	public $Medias;//TODO: como forçar isso ser: List<Media> ??
	
	function __construct($name){
		$this->Name=$name;
		$this->Medias = new ArrayCollection();
	}
}

?>