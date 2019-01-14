// Deactivate sub-licensee.
	$( '#products-list' ).on( 'click', '.deactivate-sublicensee-button', function( event ) {
		
		event.preventDefault();

		var sublicensee_id = $( this ).data( 'sub_id' );

		var product_id = $( this ).data( 'license_id' );	// Select correct "Chosen License ID".

		var deactivate_sublicensee_data = {
			action: 'ajax_deactivate_sublicensee',
			security: IBA.ajax_nonce,
			deactivate_sublicensee: sublicensee_id,
			chosen_license: product_id
		};

		var context = this,
			button_text = $( this ).html();

		$( context ).addClass( 'spinner' );
		
		// Clear old messages.
		$( this ).siblings( '.error-bg' ).remove();

		$.ajax( {
			type: 'post',
			url: IBA.ajaxurl,
			data: deactivate_sublicensee_data,
			success: function( response ) {

				response = JSON.parse( response );

				if ( response.status === 'fail' ) {

					$( context ).after( '<div class="message-box error-bg error-red">' + response.message + '</div>' );

					$( context ).removeClass( 'spinner' );
					
					$( context ).html( button_text );
					
				} else if ( response.status === 'deactivated' ) {

					$( '.licenses-used-' + response.product_id ).text( response.licenses_used );

					if ( response.licenses_available < 1 ) {
						
						$( '.product-item.' + response.product_id ).find( '.purchase-more' ).show();
						
						$( '.product-item.' + response.product_id ).find( '.sublicensee-forms-wrapper' ).hide();
						
					} else {
						
						$( '.product-item.' + response.product_id ).find( '.purchase-more' ).hide();
						
						$( '.product-item.' + response.product_id ).find( '.sublicensee-forms-wrapper' ).show();
						
					}
					
					// Hide and then remove sub-licensee row.
					$( context ).parent().hide( 'slow', function() {
						
						$( context ).parent().remove();
						
					} );

				} else {

					$( context ).removeClass( 'spinner' );
					
					$( context ).html( button_text );
					
					console.log( response );

				}

			},
			error: function( response, textStatus, errorThrown ) {

				$( context ).removeClass( 'spinner' );
				
				$( context ).html( button_text );
				
				console.log( response );

				console.log( textStatus );

				$( context ).after( '<span class="message-box error-bg error-red">AJAX error! Please, refresh the page and try again or contact our support team.</span>' );

			}

		} );

	} );