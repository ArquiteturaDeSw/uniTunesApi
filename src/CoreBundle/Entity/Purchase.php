<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Purchases")
 */
class Purchase extends Entity
{
    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="Purchases")
     */
    public $Buyer;

    //TODO: VER COMO VAMOS FAZER AQUI...POIS, MEDIA É UMA CLASSE ABSTRATA...
    //EM C# EU USARIA DISCRIMINATOR PARA AGRUPAR TODOS OS TIPOS DE MIDIA NUMA UNICA TABELA,
    // DAÍ NAÕ TERIA PROBLEMA RELACIONADO A AQUI USARMOS UMA VARIAVEL DO TIPO DA CLASSE PAI....
    /** @ORM\OneToOne(targetEntity="Media") */
    public $Media;

    function __construct($buyer, $media)
    {
        $this->Buyer = $buyer;
        $this->Media = $media;
    }
}

?>