<?php

namespace Mati;

use Exception;
use RobThree\Auth\TwoFactorAuth;

class TwoFactor {
	/**
	 * @param $tfaSecret
	 *
	 * @return array
	 */
	public static function getCode( $tfaSecret ): array {
		if ( empty( $tfaSecret ) ) {
			return [ false, 'Invalid Secret Code.' ];
		}

		if ( !class_exists( TwoFactorAuth::class ) ) {
			return [ false, 'Missing required vendor.' ];
		}

		try {
			$tfa  = new TwoFactorAuth();
			$code = $tfa->getCode( $tfaSecret );
			if ( empty( $code ) ) {
				return [ false, "Could not get code from secret: $tfaSecret" ];
			}

			return [ true, $code ];
		} catch ( Exception $e ) {
			return [ false, $e->getMessage() ];
		}
	}
}
