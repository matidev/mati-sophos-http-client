<?php

namespace Tests;

use Mati\SophosHttpClient;
use PHPUnit\Framework\TestCase;

class SophosHttpClientTest extends TestCase {
	public function testBypass(): void {
		$sophosUrl = 'http://192.168.1.79:8000';
		$username  = 'username';
		$password  = 'password';
		[ $status, $result ] = SophosHttpClient::bypass( $sophosUrl, $username, $password );

		$this->assertTrue( $status );
		$this->assertNotEmpty( $result );
	}
}
