<?php
/**
 * Form to Request a quote
 *
 * @package YITH Woocommerce Request A Quote
 * @since   1.0.0
 * @version 1.5.3
 * @author  YITH
 */

$current_user = array();
if ( is_user_logged_in() ) {
	$current_user = get_user_by( 'id', get_current_user_id() );
}

$user_name  = ( ! empty( $current_user ) ) ? $current_user->display_name : '';
$user_email = ( ! empty( $current_user ) ) ? $current_user->user_email : '';
?>
<div class="yith-ywraq-mail-form-wrapper">
	<h3 class="request-quote__title"><?php esc_html_e( 'Send the request', '_themename' ); ?></h3>

	<form id="yith-ywraq-mail-form" name="yith-ywraq-mail-form" action="<?php echo esc_url( YITH_Request_Quote()->get_raq_page_url() ); ?>" method="post">

			<p class="form-row form-row-wide validate-required " id="rqa_name_row">
				<label for="rqa-name" class=""><?php esc_html_e( 'Name', '_themename' ); ?>
					<abbr class="required" title="required">*</abbr></label>
				<input type="text" class="input-text " name="rqa_name" id="rqa-name" placeholder="<?php esc_html_e( 'Enter your name here...', '_themename' ); ?>" value="<?php echo esc_attr( $user_name ); ?>" required>
			</p>

			<p class="form-row form-row-wide validate-required" id="rqa_email_row">
				<label for="rqa-email" class=""><?php esc_html_e( 'Email', '_themename' ); ?>
					<abbr class="required" title="required">*</abbr></label>
				<input type="email" class="input-text " name="rqa_email" id="rqa-email" placeholder="<?php esc_html_e( 'Enter your email here...', '_themename' ); ?>" value="<?php echo esc_attr( $user_email ); ?>" required>
			</p>

		<p class="form-row" id="rqa_message_row">
			<label for="rqa-message" class=""><?php esc_html_e( 'Message', '_themename' ); ?></label>
			<textarea name="rqa_message" class="input-text " id="rqa-message" placeholder="<?php esc_html_e( 'Notes on your request...', '_themename' ); ?>" rows="5" cols="5"></textarea>
		</p>

		
		<?php if ( 'yes' === get_option( 'ywraq_add_privacy_checkbox', 'no' ) ) : ?>
			<div class="ywraq-privacy-wrapper">
				<p class="form-row"
				   id="rqa_privacy_description_row"><?php echo wp_kses_post( ywraq_replace_policy_page_link_placeholders( get_option( 'ywraq_privacy_description' ) ) ); ?></p>
				<p class="form-row" id="rqa_privacy_row">
					<input type="checkbox" name="rqa_privacy" id="rqa_privacy" required>
					<label for="rqa_privacy"><?php echo wp_kses_post( ywraq_replace_policy_page_link_placeholders( get_option( 'ywraq_privacy_label' ) ) ); ?>
						<abbr class="required" title="required">*</abbr></label>
				</p>
			</div>
		<?php endif ?>

		<p class="form-row">
			<input type="hidden" id="raq-mail-wpnonce" name="raq_mail_wpnonce" value="<?php echo esc_attr( wp_create_nonce( 'send-request-quote' ) ); ?>">
			<input class="button raq-send-request" type="submit" value="<?php esc_html_e( 'Send Your Request', '_themename' ); ?>">
		</p>

	</form>
</div>
