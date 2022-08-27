<?php

use Gilclei\CheckCns\CheckCNS;
use PHPUnit\Framework\TestCase;

class CnsTest extends TestCase
{


    public function testValidaCnsProvisorio()
    {
        $cns = '703404696479515';
        $this->assertEquals(CheckCNS::isValid($cns), true);
    }

    public function testValidaCnsProvisorioInvalidShort()
    {
        $cns = '255';
        $this->assertEquals(CheckCNS::isValid($cns), false);
    }


    public function testValidaCnsInvalidZero()
    {
        $cns = '000000000000000';
        $this->assertEquals(CheckCNS::isValid($cns), false);
    }


    public function testValidaCnsPrincipal()
    {
        $cns = '249107011960001';
        $this->assertEquals(CheckCNS::isValid($cns), true);
    }

    public function testValidaCnsPrincipalInvalid()
    {
        $cns = '24910701196000';
        $this->assertEquals(CheckCNS::isValid($cns), false);
    }
}
