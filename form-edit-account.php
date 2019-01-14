<?php
/**
 * Edit account form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.0
 */

defined( 'ABSPATH' ) || exit;	// Exit if accessed directly.

?>

<figure class="account-details">

<?php do_action( 'woocommerce_before_edit_account_form' ); ?>

	<form class="woocommerce-EditAccountForm edit-account" action="" method="post">

		<?php do_action( 'woocommerce_edit_account_form_start' ); ?>

		<h4><?php _e( 'Personal Details', 'woocommerce' ); ?></h4>

		<div class="white-bg-content account-section-wrap">

			<section class="details-show" style="display: block">

				<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
					<label for="account_first_name"><?php _e( 'First name', 'woocommerce' ); ?> <span class="required">*</span></label>
					<input type="text" class="input-text disabled" value="<?php echo esc_attr( $user->first_name ); ?>" disabled="disabled"/>
				</p>
				<p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">
					<label for="account_last_name"><?php _e( 'Last name', 'woocommerce' ); ?> <span class="required">*</span></label>
					<input type="text" class="input-text disabled" value="<?php echo esc_attr( $user->last_name ); ?>" disabled="disabled"/>
				</p>
				<div class="clear"></div>

				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<label for="account_email"><?php _e( 'Email address', 'woocommerce' ); ?> <span class="required">*</span></label>
					<input type="email" class="input-text disabled" value="<?php echo esc_attr( $user->user_email ); ?>" disabled="disabled" />
				</p>

				<div class="top20">
					<a class="button medium light edit-account-button"><?php _e( 'Edit', 'woocommerce' ); ?></a>
				</div>

			</section>

			<section class="details-edit" style="display: none">

				<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
					<label for="account_first_name"><?php _e( 'First name', 'woocommerce' ); ?> <span class="required">*</span></label>
					<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_first_name" id="account_first_name" value="<?php echo esc_attr( $user->first_name ); ?>" required />
				</p>
				<p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">
					<label for="account_last_name"><?php _e( 'Last name', 'woocommerce' ); ?> <span class="required">*</span></label>
					<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_last_name" id="account_last_name" value="<?php echo esc_attr( $user->last_name ); ?>" required />
				</p>
				<div class="clear"></div>

				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<label for="account_email"><?php _e( 'Email address', 'woocommerce' ); ?> <span class="required">*</span></label>
					<input type="email" class="woocommerce-Input woocommerce-Input--email input-text" name="account_email" id="account_email" value="<?php echo esc_attr( $user->user_email ); ?>" required />
				</p>

				<div class="top20">
					<button type="submit" id="save_account_details" class="woocommerce-Button button medium text-title" title="<?php esc_attr_e( 'Save changes', 'woocommerce' ); ?>"></button>
					<a class="button medium light cancel-edit-account-button"><?php _e( 'Cancel', 'woocommerce' ); ?></a>
				</div>

			</section>

		</div>


		<h4 class="top30"><?php _e( 'Password Change', 'woocommerce' ); ?></h4>

		<div class="white-bg-content account-section-wrap">

			<section class="details-show" style="display: block">

				<div class="top20">
					<a class="button medium light edit-account-button"><?php _e( 'Change Password', 'woocommerce' ); ?></a>
				</div>

			</section>

			<section class="details-edit" style="display: none">

				<fieldset>

					<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
						<label for="password_current"><?php _e( 'Current password', 'woocommerce' ); ?></label>
						<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_current" id="password_current" />
					</p>
					<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
						<label for="password_1"><?php _e( 'New password', 'woocommerce' ); ?></label>
						<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_1" id="password_1" />
					</p>
					<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
						<label for="password_2"><?php _e( 'Confirm new password', 'woocommerce' ); ?></label>
						<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_2" id="password_2" />
					</p>

				</fieldset>
				<div class="clear"></div>

				<?php do_action( 'woocommerce_edit_account_form' ); ?>

				<div class="top20">
					<button type="submit" id="save_account_password" class="woocommerce-Button button medium text-title" title="<?php esc_attr_e( 'Save changes', 'woocommerce' ); ?>"></button>
					<a class="button medium light cancel-edit-account-button"><?php _e( 'Cancel', 'woocommerce' ); ?></a>
					<input type="hidden" name="action" value="save_account_details" />
				</div>

			</section>

			<?php do_action( 'woocommerce_edit_account_form_end' ); ?>

		</div>
	</form>

<?php do_action( 'woocommerce_after_edit_account_form' );


$saved_methods = wc_get_customer_saved_methods_list( get_current_user_id() );
$has_methods   = (bool) $saved_methods;
$types         = wc_get_account_payment_methods_types();

do_action( 'woocommerce_before_account_payment_methods', $has_methods ); ?>

<h4><?php _e( 'Payment Methods', 'woocommerce' ); ?></h4>

<div class="white-bg-content payment-methods">

	<?php if ( $has_methods ) : ?>

		<table class="woocommerce-MyAccount-paymentMethods shop_table shop_table_responsive account-payment-methods-table">
			<thead>
				<tr>
					<?php foreach ( wc_get_account_payment_methods_columns() as $column_id => $column_name ) : ?>
						<th class="woocommerce-PaymentMethod woocommerce-PaymentMethod--<?php echo esc_attr( $column_id ); ?> payment-method-<?php echo esc_attr( $column_id ); ?>"><span class="nobr"><?php echo esc_html( $column_name ); ?></span></th>
					<?php endforeach; ?>
				</tr>
			</thead>
			<?php foreach ( $saved_methods as $type => $methods ) : ?>
				<?php foreach ( $methods as $method ) : ?>
					<tr class="payment-method<?php echo ! empty( $method['is_default'] ) ? ' default-payment-method' : '' ?>">
						<?php foreach ( wc_get_account_payment_methods_columns() as $column_id => $column_name ) : ?>
							<td class="woocommerce-PaymentMethod woocommerce-PaymentMethod--<?php echo esc_attr( $column_id ); ?> payment-method-<?php echo esc_attr( $column_id ); ?>" data-title="<?php echo esc_attr( $column_name ); ?>">
								<?php
								if ( has_action( 'woocommerce_account_payment_methods_column_' . $column_id ) ) {
									do_action( 'woocommerce_account_payment_methods_column_' . $column_id, $method );
								} elseif ( 'method' === $column_id ) {
									if ( ! empty( $method['method']['last4'] ) ) {
										/* translators: 1: credit card type 2: last 4 digits */
										echo sprintf( __( '%1$s ending in %2$s', 'woocommerce' ), esc_html( wc_get_credit_card_type_label( $method['method']['brand'] ) ), esc_html( $method['method']['last4'] ) );
									} else {
										echo esc_html( wc_get_credit_card_type_label( $method['method']['brand'] ) );
									}
								} elseif ( 'expires' === $column_id ) {
									echo esc_html( $method['expires'] );
								} elseif ( 'actions' === $column_id ) {
									foreach ( $method['actions'] as $key => $action ) {
										echo '<a href="' . esc_url( $action['url'] ) . '" class="button medium light ' . sanitize_html_class( $key ) . '">' . esc_html( $action['name'] ) . '</a>&nbsp;';
									}
								}
								?>
							</td>
						<?php endforeach; ?>
					</tr>
				<?php endforeach; ?>
			<?php endforeach; ?>
		</table>

	<?php else : ?>

		<p class="message-box neutral-bg neutral-blue"><?php esc_html_e( 'No saved methods found.', 'woocommerce' ); ?></p>

	<?php endif; ?>

	<div>
		<a class="button alt medium" href="<?php echo esc_url( wc_get_account_endpoint_url( 'add-payment-method' ) ); ?>">Add Payment Method</a>
	</div>

	<?php do_action( 'woocommerce_after_account_payment_methods', $has_methods ); ?>

	</div>


	<h4 class="top30">Billing Address</h4>

	<div class="billing-address white-bg-content account-section-wrap">

		<section class="details-show">

			<?php

			$customer_id = get_current_user_id();

			if ( ! wc_ship_to_billing_address_only() && wc_shipping_enabled() ) {
				$get_addresses = apply_filters( 'woocommerce_my_account_get_addresses', array(
						'billing' => __( 'Billing address', 'woocommerce' ),
						'shipping' => __( 'Shipping address', 'woocommerce' ),
				), $customer_id );
			} else {
				$get_addresses = apply_filters( 'woocommerce_my_account_get_addresses', array(
						'billing' => __( 'Billing address', 'woocommerce' ),
				), $customer_id );
			}

			$oldcol = 1;
			$col    = 1;
			?>

			<p class="top10">
				<?php echo apply_filters( 'woocommerce_my_account_my_address_description', __( 'The following addresses will be used on the checkout page by default.', 'woocommerce' ) ); ?>
			</p>

			<?php if ( ! wc_ship_to_billing_address_only() && wc_shipping_enabled() ) : ?>
				<div class="u-columns woocommerce-Addresses col2-set addresses">
			<?php endif; ?>

			<?php foreach ( $get_addresses as $name => $title ) : ?>

				<div class="u-column<?php echo ( ( $col = $col * -1 ) < 0 ) ? 1 : 2; ?> col-<?php echo ( ( $oldcol = $oldcol * -1 ) < 0 ) ? 1 : 2; ?> woocommerce-Address">

					<address class="top10">
						<?php
						$address = wc_get_account_formatted_address( $name );
						echo $address ? wp_kses_post( $address ) : esc_html_e( 'You have not set up this type of address yet.', 'woocommerce' );
						?>
					</address>

				</div>

			<?php endforeach; ?>

			<?php if ( ! wc_ship_to_billing_address_only() && wc_shipping_enabled() ) : ?>
				</div>
			<?php endif; ?>

			<div>
				<a class="button medium light edit-account-button"><?php _e( 'Edit', 'woocommerce' ); ?></a>
			</div>

		</section>

		<section class="details-edit" style="display: none">

			<?php

			$load_address = 'billing';

			$current_user = wp_get_current_user();
			$load_address = sanitize_key( $load_address );

			$address = WC()->countries->get_address_fields( get_user_meta( get_current_user_id(), $load_address . '_country', true ), $load_address . '_' );

			// Enqueue scripts.
			wp_enqueue_script( 'wc-country-select' );
			wp_enqueue_script( 'wc-address-i18n' );

			// Prepare values.
			foreach ( $address as $key => $field ) {

				$value = get_user_meta( get_current_user_id(), $key, true );

				if ( ! $value ) {
					switch ( $key ) {
						case 'billing_email':
						case 'shipping_email':
							$value = $current_user->user_email;
							break;
						case 'billing_country':
						case 'shipping_country':
							$value = WC()->countries->get_base_country();
							break;
						case 'billing_state':
						case 'shipping_state':
							$value = WC()->countries->get_base_state();
							break;
					}
				}

				$address[ $key ]['value'] = apply_filters( 'woocommerce_my_account_edit_address_field_value', $value, $key, $load_address );
			}
			?>

			<form id="billing_address_form" method="post">

				<div class="woocommerce-address-fields">
					<?php do_action( "woocommerce_before_edit_address_form_{$load_address}" ); ?>

					<div class="woocommerce-address-fields__field-wrapper">
						<?php
						foreach ( $address as $key => $field ) {
							if ( isset( $field['country_field'], $address[ $field['country_field'] ] ) ) {
								$field['country'] = wc_get_post_data_by_key( $field['country_field'], $address[ $field['country_field'] ]['value'] );
							}
							woocommerce_form_field( $key, $field, wc_get_post_data_by_key( $key, $field['value'] ) );
						}
						?>
					</div>

					<?php do_action( "woocommerce_after_edit_address_form_{$load_address}" ); ?>

					<div class="top20">
						<button class="button medium text-title" id="save_billing_address" title="<?php esc_attr_e( 'Save address', 'woocommerce' ); ?>"></button>
						<a class="button medium light cancel-edit-account-button"><?php _e( 'Cancel', 'woocommerce' ); ?></a>
					</div>
				</div>

			</form>

		</section>

	</div>

</figure>