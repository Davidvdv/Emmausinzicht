<?php
/* Group Test cases generated on: 2012-04-20 15:59:09 : 1334930349*/
App::uses('Group', 'Model');

/**
 * Group Test Case
 *
 */
class GroupTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.group', 'app.kid', 'app.elder', 'app.elders_kid');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Group = ClassRegistry::init('Group');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Group);

		parent::tearDown();
	}

}
