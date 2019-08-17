<?php

namespace Opmvpc\Constructs\Threes\SearchThrees;

use Opmvpc\Constructs\Contracts\SearchContract;
use Opmvpc\Constructs\Contracts\ThreeContract;
use Opmvpc\Constructs\Threes\Three;

class LinkedSearchThree extends Three implements SearchContract
{
    private function __construct()
    {
        $this->root = null;
    }

    public static function make(): ThreeContract
    {
        return new LinkedSearchThree();
    }

    /**
     * L'arbre doit avoir ses clés triées par ordre croissant
     * si on effectue un parcours infixe
     *
     * @return boolean
     */
    public function repOk(): bool
    {
        $array = $this->keysArray();
        $arrayToSort = $array;
        sort($arrayToSort);

        for ($i=0; $i < count($array); $i++) {
            if ($array[$i] !== $arrayToSort[$i]) {
                return false;
            }
        }

        return true;
    }
}
