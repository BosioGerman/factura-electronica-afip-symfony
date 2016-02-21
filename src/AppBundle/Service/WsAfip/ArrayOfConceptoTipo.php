<?php

namespace AppBundle\Service\WsAfip;

class ArrayOfConceptoTipo
{

    /**
     * @var ConceptoTipo[] $ConceptoTipo
     */
    protected $ConceptoTipo = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return ConceptoTipo[]
     */
    public function getConceptoTipo()
    {
      return $this->ConceptoTipo;
    }

    /**
     * @param ConceptoTipo[] $ConceptoTipo
     * @return \AppBundle\Service\WsAfip\ArrayOfConceptoTipo
     */
    public function setConceptoTipo(array $ConceptoTipo = null)
    {
      $this->ConceptoTipo = $ConceptoTipo;
      return $this;
    }

}
