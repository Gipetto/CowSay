<?php

use PHPUnit\Framework\Attributes\DataProvider;
use \PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Test;


class CarcasTest extends TestCase {    
    public static function carcasClassProvider() {
        $carcases = [];

        $files = glob('src/Carcases/*.php');
        foreach ($files as $file) {
            $carcases[] = ['\\CowSay\\' . basename($file, '.php')];
        }

        return $carcases;
    }


    /**
     * @dataProvider carcasClassProvider
     */
	#[Test]
	#[DataProvider('carcasClassProvider')]
    public function testAllCarcases($className) {
        $expected = '  -----------------
< This is a carcass >
  -----------------';

        $c = new $className("This is a carcass");
        $supportedTraits = $c->getSupportedTraits();
                
        $this->assertStringContainsString($expected, $c->say());

        if (in_array('CowSay\\Eyes', $supportedTraits)) {
            $c->setEyes('e');
            $this->assertStringContainsString('e', $c->say());
        }

        if (in_array('CowSay\\Poop', $supportedTraits)) {
            $c->setPoop('uu');
            $this->assertStringContainsString('uu', $c->say());
        }

        if (in_array('CowSay\\Tongue', $supportedTraits)) {
            $c->setTongue('k');
            $this->assertStringContainsString('k', $c->say());
        }

        if (in_array('CowSay\\Udder', $supportedTraits)) {
            $c->setUdder('Z');
            $this->assertStringContainsString('Z', $c->say());
        }
    }

    public static function bearEyesDataProvider() {
        return [
            ['e', 'e e'],
            ['e e', 'e e'],
            ['e-e', 'e-e'],
            ['eeee', 'eee']
        ];
    }

    /**
     * @dataProvider bearEyesDataProvider
     */
	#[Test]
	#[DataProvider('bearEyesDataProvider')]
    public function testBearEyes($param, $expected) {
        $b = new \CowSay\Bear();
        $b->setEyes($param);
        $this->assertStringContainsString($expected, $b->say());
    }
}