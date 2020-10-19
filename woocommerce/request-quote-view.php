<?php
/**
 * Table view to Request A Quote
 *
 * @package YITH Woocommerce Request A Quote
 * @since   1.0.0
 * @version 1.5.3
 * @author  YITH
 *
 * @var $raq_content array
 */
$product_column_colspan = apply_filters( 'ywraq_item_thumbnail', !wp_is_mobile() ) ? 2 : 1;
if ( count( $raq_content ) === 0 ) :
	?>
	<p><?php esc_html_e( 'No products in list', '_themename' ); ?></p>
<?php else : ?>
	<div class="raq-container">
		<h1 class="request-quote__title"><?php esc_html_e( 'Selected Items', '_themename' ); ?></h1>
		<p class="request-quote__text"><?php esc_html_e( 'All prices shown are without the customizable options. Please fill in the form below to send us your request.', '_themename' ); ?></p>
		<form id="yith-ywraq-form" name="yith-ywraq-form" action="<?php echo esc_url( YITH_Request_Quote()->get_raq_page_url( 'update' ) ); ?>" method="post">
		<table  class="shop_table cart  shop_table_responsive" id="yith-ywrq-table-list" cellspacing="0">
			<thead>
				<tr>
					<th class="product-remove">&nbsp;</th>
					<th class="product-name" colspan="<?php echo esc_attr( $product_column_colspan ); ?>"><?php esc_html_e( 'Product', '_themename' ); ?></th>
					<th class="product-quantity"><?php esc_html_e( 'Quantity', '_themename' ); ?></th>
					<th class="product-subtotal"><?php esc_html_e( 'Total', '_themename' ); ?></th>
				</tr>
			</thead>
			<tbody>
		<?php
		foreach ( $raq_content as $key => $raq ) :
			$product_id = ( isset( $raq['variation_id'] ) && '' !== $raq['variation_id'] ) ? $raq['variation_id'] : $raq['product_id'];
			$_product   = wc_get_product( $product_id );
			if ( ! isset( $_product ) || ! is_object( $_product ) ) {
				continue;
			}
			?>
				<tr class="cart_item">

					<td class="product-remove">
						<?php echo apply_filters( 'yith_ywraq_item_remove_link', sprintf( '<a href="#"  data-remove-item="%s" data-wp_nonce="%s"  data-product_id="%d" class="yith-ywraq-item-remove remove" title="%s">&times;</a>', esc_attr( $key ), esc_attr( wp_create_nonce( 'remove-request-quote-' . $product_id ) ), esc_attr( $product_id ), esc_attr__( 'Remove this item', '_themename' ) ), $key ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					</td>

					<td class="product-thumbnail">
						<?php
						$thumbnail = $_product->get_image();

						if ( ! $_product->is_visible() ) {
							echo $thumbnail; //phpcs:ignore
						} else {
							printf( '<a href="%s">%s</a>', $_product->get_permalink(), $thumbnail ); //phpcs:ignore
						}
						?>
					</td>

					<td class="product-name" data-title="Product">
						<?php
						$title = $_product->get_title();

						if ( $_product->get_sku() !== '' && get_option( 'ywraq_show_sku' ) === 'yes' ) {
							$title .= ' ' . apply_filters( 'ywraq_sku_label', __( ' SKU:', '_themename' ) ) . $_product->get_sku();
						}
						?>
						<a href="<?php echo esc_url( $_product->get_permalink() ); ?>"><?php echo wp_kses_post( $title ); ?></a>
						<?php
						// Meta data.

						$item_data = array();

						// Variation data.

						if ( ! empty( $raq['variation_id'] ) && is_array( $raq['variations'] ) ) {

							foreach ( $raq['variations'] as $name => $value ) {
								$label = '';

								if ( '' === $value ) {
									continue;
								}

								$taxonomy = wc_attribute_taxonomy_name( str_replace( 'attribute_pa_', '', urldecode( $name ) ) );

								// If this is a term slug, get the term's nice name.
								if ( taxonomy_exists( $taxonomy ) ) {
									$term = get_term_by( 'slug', $value, $taxonomy );
									if ( ! is_wp_error( $term ) && $term && $term->name ) {
										$value = $term->name;
									}
									$label = wc_attribute_label( $taxonomy );

								} else {

									if ( strpos( $name, 'attribute_' ) !== false ) {
										$custom_att = str_replace( 'attribute_', '', $name );

										if ( '' !== $custom_att ) {
											$label = wc_attribute_label( $custom_att );
										} else {
											$label = $name;
										}
									}
								}

								$item_data[] = array(
									'key'   => $label,
									'value' => $value,
								);
							}
						}

						$item_data = apply_filters( 'ywraq_request_quote_view_item_data', $item_data, $raq, $_product );


						// Output flat or in list format.
						if ( count( $item_data ) > 0 ) {
							foreach ( $item_data as $data ) {
								echo esc_html( $data['key'] ) . ': ' . wp_kses_post( $data['value'] ) . "\n";
							}
						}


						?>
					</td>


					<td class="product-quantity" data-title="Quantity">
						<?php
						$product_quantity = woocommerce_quantity_input(
							array(
								'input_name'  => "raq[{$key}][qty]",
								'input_value' => apply_filters( 'ywraq_quantity_input_value', $raq['quantity'] ),
								'max_value'   => apply_filters( 'ywraq_quantity_max_value', $_product->backorders_allowed() ? '' : $_product->get_stock_quantity(), $_product ),
								'min_value'   => apply_filters( 'ywraq_quantity_min_value', 0, $_product ),
								'step'        => apply_filters( 'ywraq_quantity_step_value', 1, $_product ),
							),
							$_product,
							false
						);

						echo $product_quantity; //phpcs:ignore
						?>
					</td>

					<td class="product-subtotal">
						<?php
						echo wp_kses_post( apply_filters( 'yith_ywraq_hide_price_template', wp_kses_post( WC()->cart->get_product_subtotal( $_product, $raq['quantity'] ) ), $product_id ) );
						?>
					</td>
				</tr>

		<?php endforeach ?>

				<tr>
					<td colspan="5" class="actions">
						<input type="submit" class="button" name="update_raq" value="<?php esc_html_e( 'Update List', '_themename' ); ?>">
						<input type="hidden" id="update_raq_wpnonce" name="update_raq_wpnonce" value="<?php echo esc_attr( wp_create_nonce( 'update-request-quote-quantity' ) ); ?>">
					</td>
				</tr>

				</tbody>
		</table>
		</form>
	</div>
	<?php endif ?>
