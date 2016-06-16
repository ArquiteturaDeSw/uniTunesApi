<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Albums")
 */
class Album extends Entity
{
    /** @ORM\Column(type="string") */
    public $name;

    //TODO: descobrir se há possibilidade de uma midia nao estar em algum album...
    //pois isso muda a forma como o mapeamento é feito.
    //pode ser one to many uni direcional ou milt direcional
    public $medias;//TODO: como forçar isso ser: List<Media> ??

    function __construct($name)
    {
        $this->name = $name;
        $this->medias = new ArrayCollection();
    }
}

?>