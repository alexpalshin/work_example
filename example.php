	/**
	 * AJAX Handler for deactivating sublicensees
	 *
	 * @return object $response
	 */
	public function ajax_deactivate_sublicensee() {

		check_ajax_referer( 'ib-ajax-safe-manage-sublicensees', 'security' );

		ob_start();
		
		$response = new stdClass();

		global $current_user;

		if ( empty( $current_user ) ) {

			$current_user = get_current_user();

		}

		//get user extensions
		$user_extensions = self::get_user_active_extensions( $current_user->ID );

		//license id is extensions id that it's signed with
		$chosen_license_id = false;

		if ( ! empty( $_POST[ 'chosen_license' ] ) ) {

			$chosen_license_id = $_POST[ 'chosen_license' ];

		}

		// -1 is the license ID for IB
		if ( '-1' === $chosen_license_id ) {

			//get number of licenses for IB subscription
			$total_number_of_licenses = self::get_total_number_of_licenses( $current_user->ID );

		} else if ( ! empty( $chosen_license_id ) ) {

			$total_number_of_licenses = $user_extensions[ $chosen_license_id ][ 'qty' ];

		} else {

			$total_number_of_licenses = 0;

		}

		$sublicensees = self::get_user_sublicensees( $current_user->ID, $chosen_license_id );

		$licenses_available = $total_number_of_licenses - count( $sublicensees );

		//Actions with licenses

		//Deactivate sublicensee if requested
		if ( ! empty( $_POST[ 'deactivate_sublicensee' ] ) ) {

			$deactivate_id = intval( $_POST[ 'deactivate_sublicensee' ] );

			//check if requested user is really current user's sublicensee (it's in array already, so we don't have to query the DB again)
			if ( ! empty( $deactivate_id ) && ! empty( $sublicensees ) ) {

				$deactivate = false;

				foreach ( $sublicensees as $key => $sublicensee ) {

					if ( $sublicensee->ID == $deactivate_id ) {

						$deactivate = true;

						break;

					}

				}

				if ( true === $deactivate ) {

					$deactivated = self::deactivate_sublicensee( $current_user->ID, $deactivate_id, $chosen_license_id );

					if ( true === $deactivated ) {

						unset( $sublicensees[ $key ] );

						$licenses_available++;

						$response->status = 'deactivated';

						$response->product_id = $chosen_license_id;

						$response->sublicensee_id = $deactivate_id;

						$response->licenses_used = count( $sublicensees );

						ob_get_clean();
						
						wp_send_json( json_encode( $response ) );

					} else {

						$response->status = 'fail';

						$response->message = __( 'Something went wrong during deactivation! Please, contact site admin.', 'ib-woocommerce' );

						ob_get_clean();
						
						wp_send_json( json_encode( $response ) );
					}

				} else {

					$response->status = 'fail';

					$response->message = __( 'User you tried to deactivate is not your sub-licensee!', 'ib-woocommerce' );

				}

			}

		}

		$response->status = 'fail';

		$response->message = __( 'Something went wrong during deactivation! Please, contact site admin.', 'ib-woocommerce' );

		ob_get_clean();
		
		wp_send_json( json_encode( $response ) );

	}