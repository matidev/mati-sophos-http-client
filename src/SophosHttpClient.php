<?php

namespace Mati;

use Exception;
use Goutte\Client;
use Symfony\Component\HttpClient\HttpClient;

class SophosHttpClient {
	/**
	 * @param $sophosUrl
	 * @param $username
	 * @param $password
	 * @param array $additionalData
	 *
	 * @return array
	 */
	public static function bypass( $sophosUrl, $username, $password, array $additionalData = [] ): array {
		if ( empty( $sophosUrl ) || empty( $username ) ) {
			return [ false, 'Missing parameter(s).' ];
		}

		if ( ! class_exists( Client::class ) || ! class_exists( HttpClient::class ) ) {
			return [ false, 'Missing required vendor(s).' ];
		}

		try {
			$client = new Client( HttpClient::create( [
				'verify_peer' => false,
				'verify_host' => false,
			] ) );

			$requestData = [
				'mode'        => 191,
				'username'    => $username,
				'password'    => $password,
				'a'           => microtime(),
				'producttype' => 0,
			];

			if ( ! empty( $additionalData ) && is_array( $additionalData ) ) {
				$requestData = array_merge( $requestData, $additionalData );
			}

			$browser = $client->request( 'POST', $sophosUrl, $requestData );

			if ( $browser === null ) {
				return [ false, "Failed to login $username with password: $password on $sophosUrl" ];
			}

			return [ true, "Logged-in $username with password: $password on $sophosUrl" ];
		} catch ( Exception $e ) {
			return [ false, $e->getMessage() ];
		}
	}
}
