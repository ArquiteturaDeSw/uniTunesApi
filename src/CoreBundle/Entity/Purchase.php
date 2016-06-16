<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="purchases")
 */
class Purchase extends Entity
{
    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="purchases")
     */
    public $buyer;

    //TODO: VER COMO VAMOS FAZER AQUI...POIS, MEDIA É UMA CLASSE ABSTRATA...
    //EM C# EU USARIA DISCRIMINATOR PARA AGRUPAR TODOS OS TIPOS DE MIDIA NUMA UNICA TABELA,
    // DAÍ NAÕ TERIA PROBLEMA RELACIONADO A AQUI USARMOS UMA VARIAVEL DO TIPO DA CLASSE PAI....
    /** @ORM\OneToOne(targetEntity="Media") */
    public $media;

    function __construct($buyer, $media)
    {
        $this->buyer = $buyer;
        $this->media = $media;
    }
}

?>