<?php

namespace Gilclei\CheckCns;

/**
 * Validar CNS
 *
 * @category Validation
 * @package  check-cns
 * @author   Gilclei Araujo <gilclei@gmail.com>
 * @license https://opensource.org/licenses/MIT MIT Licence
 * @link     https://github.com/gilclei/seach-cns
 */
class CheckCNS
{
    /**
     * Valida um numero de CNS
     *
     * @param string                 $cns                 numero do CNS do usuario
     *
     * @return bool
     */
    public static function isValid(string $_cns): bool
    {
        $num = substr($_cns, 0, 1);
        if ($_cns == '000000000000000') {
            return false;
        } elseif (($num == 1) || ($num == 2)) {
            return self::validaCnsPrincipal($_cns);
        } else {
            return self::validaCnsProvisorio($_cns);
        }
    }

    /**
     * Valida um numero de CNS principal
     *
     * @param string                 $cns                 numero do CNS do usuario
     *
     * @return bool
     */
    private static function validaCnsPrincipal(string $_cns): bool
    {
        if ((strlen(trim($_cns))) != 15) {
            return false;
        }
        $pis = substr($_cns, 0, 11);
        $soma = (((substr($pis, 0, 1)) * 15) +
                ((substr($pis, 1, 1)) * 14) +
                ((substr($pis, 2, 1)) * 13) +
                ((substr($pis, 3, 1)) * 12) +
                ((substr($pis, 4, 1)) * 11) +
                ((substr($pis, 5, 1)) * 10) +
                ((substr($pis, 6, 1)) * 9) +
                ((substr($pis, 7, 1)) * 8) +
                ((substr($pis, 8, 1)) * 7) +
                ((substr($pis, 9, 1)) * 6) +
                ((substr($pis, 10, 1)) * 5));
        $resto = fmod($soma, 11);
        $dv = 11  - $resto;
        if ($dv == 11) {
            $dv = 0;
        }
        if ($dv == 10) {
            $soma = ((((substr($pis, 0, 1)) * 15) +
                ((substr($pis, 1, 1)) * 14) +
                ((substr($pis, 2, 1)) * 13) +
                ((substr($pis, 3, 1)) * 12) +
                ((substr($pis, 4, 1)) * 11) +
                ((substr($pis, 5, 1)) * 10) +
                ((substr($pis, 6, 1)) * 9) +
                ((substr($pis, 7, 1)) * 8) +
                ((substr($pis, 8, 1)) * 7) +
                ((substr($pis, 9, 1)) * 6) +
                ((substr($pis, 10, 1)) * 5)) + 2);
            $resto = fmod($soma, 11);
            $dv = 11  - $resto;
            $resultado = $pis . "001" . $dv;
        } else {
            $resultado = $pis . "000" . $dv;
        }
        if ($_cns != $resultado) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Valida um numero de CNS provisorio
     *
     * @param string                 $cns                 numero do CNS do usuario
     *
     * @return bool
     */
    private static function validaCnsProvisorio($_cns)
    {
        if ((strlen(trim($_cns))) != 15) {
            return false;
        }
        $soma = (((substr($_cns, 0, 1)) * 15) +
        ((substr($_cns, 1, 1)) * 14) +
        ((substr($_cns, 2, 1)) * 13) +
        ((substr($_cns, 3, 1)) * 12) +
        ((substr($_cns, 4, 1)) * 11) +
        ((substr($_cns, 5, 1)) * 10) +
        ((substr($_cns, 6, 1)) * 9) +
        ((substr($_cns, 7, 1)) * 8) +
        ((substr($_cns, 8, 1)) * 7) +
        ((substr($_cns, 9, 1)) * 6) +
        ((substr($_cns, 10, 1)) * 5) +
        ((substr($_cns, 11, 1)) * 4) +
        ((substr($_cns, 12, 1)) * 3) +
        ((substr($_cns, 13, 1)) * 2) +
        ((substr($_cns, 14, 1)) * 1));
        $resto = fmod($soma, 11);
        if ($resto != 0) {
            return false;
        } else {
            return true;
        }
    }
}
