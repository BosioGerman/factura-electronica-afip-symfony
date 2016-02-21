<?php
/**
 * Created by PhpStorm.
 * User: felipe
 * Date: 17/11/15
 * Time: 15:22
 */

namespace AppBundle\Utility\DataFill;

use AppBundle\Entity\Factura;

interface iFillable
{

    public function fill(Factura $entity);


}