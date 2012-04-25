<?php
/* Kid Test cases generated on: 2012-04-20 15:55:05 : 1334930105*/
App::uses('Kid', 'Model');

/**
 * Kid Test Case
 *
 */
class KidTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.kid', 'app.group', 'app.elder', 'app.elders_kid');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Kid = ClassRegistry::init('Kid');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Kid);

		parent::tearDown();
	}

}
