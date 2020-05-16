<?php

use \PHPUnit\Framework\TestCase;


class CarcasTest extends TestCase {

    protected $carcases = [];
    
    public function __construct($name = null, array $data = [], $dataName = '') {
        parent::__construct($name, $data, $dataName);

        $files = glob('src/Carcases/*.php');
        foreach ($files as $file) {
            $this->carcases[] = ['\\CowSay\\' . basename($file, '.php')];
        }
    }

    public function carcasClassProvider() {
        return $this->carcases;
    }

    /**
     * @dataProvider carcasClassProvider
     */
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

    public function bearEyesDataProvider() {
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
    public function testBearEyes($param, $expected) {
        $b = new \CowSay\Bear();
        $b->setEyes($param);
        $this->assertStringContainsString($expected, $b->say());
    }
}