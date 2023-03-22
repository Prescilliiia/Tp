<?php

namespace App\Service;

use Doctrine\ORM\Query\Expr\Func;

class TvaService
{

    public function calcul(float $prix)
    {

        return $prix * 1.2;
    }
}
