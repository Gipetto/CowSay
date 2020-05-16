<?php

use \PHPUnit\Framework\TestCase;
use \CowSay\Cow;

class CowTest extends TestCase {

	/**
	 * @param $expected
	 * @param $message
	 */
	protected function assertCow(string $expected, string $message) {
		$c = new Cow($message);
		$this->assertEquals($expected, $c->say());
	}

	public function testSingleLine() {
		$message = 'I output a single line';
		$expected = '  ----------------------
< I output a single line >
  ----------------------
          \   ^__^
           \  (oo)\_______
              (__)\       )\/\
                  ||----w |
                  ||     || ';
		$this->assertCow($expected, $message);
	}

	public function testToString() {
		$message = 'I output a single line';
		$c = new Cow($message);

		ob_start();
		echo($c);
		$expected = ob_get_contents();
		ob_end_clean();

		$this->assertEquals($expected, $c->say());
	}

	public function testMultipleLineWrap() {
		$message = 'I am text that will wrap to two lines because I am long.';
		$expected = '  --------------------------------------------------
/ I am text that will wrap to two lines because I am \
\ long.                                              /
  --------------------------------------------------
          \   ^__^
           \  (oo)\_______
              (__)\       )\/\
                  ||----w |
                  ||     || ';
		$this->assertCow($expected, $message);
	}

	public function testMultipleLineBreak() {
		$message = 'I am line one.' . PHP_EOL .
			'I am line two.' . PHP_EOL .
			'I am line three.';
		$expected = '  ----------------
/ I am line one.   \
| I am line two.   |
\ I am line three. /
  ----------------
          \   ^__^
           \  (oo)\_______
              (__)\       )\/\
                  ||----w |
                  ||     || ';
		$this->assertCow($expected, $message);
	}

	public function testUnicodeLineLength() {
		$message = 'Ünícødé íß mågïcål';
		$expected = '  ------------------
< Ünícødé íß mågïcål >
  ------------------
          \   ^__^
           \  (oo)\_______
              (__)\       )\/\
                  ||----w |
                  ||     || ';
		$this->assertCow($expected, $message);
	}

	public function testCowTraits() {
		$message = 'I output a single line';
		$expected = '  ----------------------
< I output a single line >
  ----------------------
          \   ^__^
           \  (ee)\_______
              (__)\       )\/\
               k  ||----Z |
                  ||     || uu';

		$c = new Cow($message);
		$c->setEyes('e');
		$c->setTongue('k');
		$c->setUdder('Z');
		$c->setPoop('uu');

		$this->assertSame($expected, $c->say());
	}

	public function testEyesTruncation() {
		$message = 'I output a single line';
		$expected = '  ----------------------
< I output a single line >
  ----------------------
          \   ^__^
           \  (ee)\_______
              (__)\       )\/\
                  ||----w |
                  ||     || ';

		$c = new Cow($message);
		$c->setEyes('eee');

		$this->assertSame($expected, $c->say());
	}
}