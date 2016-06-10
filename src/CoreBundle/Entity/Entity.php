<?php

namespace CoreBundle\Entity;

use DateTime;

abstract class Entity
{
	/**
	 * @Id @Column(type="integer")
	 * @GeneratedValue
	 **/
	public $Id;

	/** @Column(type="datetime") */
	public $CreationDate;

	/** @Column(type="boolean") */
	public $Deleted;

	function __construct()
	{
		date_default_timezone_set('UTC');

		$this->CreationDate = new DateTime();
		//$this->CreationDate = new DateTime(); //TODO: verificar se isto retorna a mesma coisa que DateTime.Now

		$this->Deleted = false;
	}
}
?>
