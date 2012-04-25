<?php
/* EldersKid Test cases generated on: 2012-04-23 23:58:04 : 1335218284*/
App::uses('EldersKid', 'Model');

/**
 * EldersKid Test Case
 *
 */
class EldersKidTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.elders_kid', 'app.elder', 'app.kid', 'app.group');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->EldersKid = ClassRegistry::init('EldersKid');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EldersKid);

		parent::tearDown();
	}

}
