<?php
/* Elder Test cases generated on: 2012-04-20 15:37:49 : 1334929069*/
App::uses('Elder', 'Model');

/**
 * Elder Test Case
 *
 */
class ElderTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.elder', 'app.kid', 'app.elders_kid');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Elder = ClassRegistry::init('Elder');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Elder);

		parent::tearDown();
	}

}
