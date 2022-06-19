<?php

namespace Tests;

use Mati\TwoFactor;
use PHPUnit\Framework\TestCase;
use RobThree\Auth\TwoFactorAuth;
use RobThree\Auth\TwoFactorAuthException;

class TwoFactorTest extends TestCase {
	/**
	 * @throws TwoFactorAuthException
	 */
	public function testBypass(): void {
		$tfaSecret = ( new TwoFactorAuth() )->createSecret();
		[ $status, $result ] = TwoFactor::getCode( $tfaSecret );

		$this->assertTrue( $status );
		$this->assertNotEmpty( $result, "Code: $result" );
	}
}
