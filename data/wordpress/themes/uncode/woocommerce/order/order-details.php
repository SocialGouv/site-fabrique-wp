<?php
/**
 * Order details
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/order-details.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 8.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! $order = wc_get_order( $order_id ) ) { // phpcs:ignore WordPress.WP.GlobalVariablesOverride.OverrideProhibited
	return;
}
$order_items           = $order->get_items( apply_filters( 'woocommerce_purchase_order_item_types', 'line_item' ) );
$show_purchase_note    = $order->has_status( apply_filters( 'woocommerce_purchase_note_order_statuses', array( 'completed', 'processing' ) ) );
$show_customer_details = is_user_logged_in() && $order->get_user_id() === get_current_user_id();
$downloads             = $order->get_downloadable_items();

if ( $show_downloads ) { // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
	wc_get_template( 'order/order-downloads.php', array( 'downloads' => $downloads, 'show_title' => true ) );
}
?>
<div class="order-details">
	<?php do_action( 'woocommerce_order_details_before_order_table', $order ); ?>
	<h3><?php esc_html_e( 'Order details', 'woocommerce' ); ?></h3>
	<table class="shop_table order_details">
		<thead>
			<tr>
				<th class="product-name"><?php esc_html_e( 'Product', 'woocommerce' ); ?></th>
				<th class="product-total"><?php esc_html_e( 'Total', 'woocommerce' ); ?></th>
			</tr>
		</thead>
		<tbody>
			<?php do_action( 'woocommerce_order_details_before_order_table_items', $order ); ?>
			<?php
				foreach( $order_items as $item_id => $item ) {
					$product = apply_filters( 'woocommerce_order_item_product', $item->get_product(), $item );

					wc_get_template( 'order/order-details-item.php', array(
						'order'			     => $order,
						'item_id'		     => $item_id,
						'item'			     => $item,
						'show_purchase_note' => $show_purchase_note,
						'purchase_note'	     => $product ? $product->get_purchase_note() : '',
						'product'	         => $product,
					) );
				}
			?>
			<?php do_action( 'woocommerce_order_details_after_order_table_items', $order ); ?>
		</tbody>
		<tfoot>
			<?php
				foreach ( $order->get_order_item_totals() as $key => $total ) {
					?>
					<tr>
						<th scope="row"><?php echo wp_kses_post( $total['label'] ); ?></th>
						<td><?php echo wp_kses_post( $total['value'] ); ?></td>
					</tr>
					<?php
				}
			?>
			<?php if ( $order->get_customer_note() ) : ?>
				<tr>
					<th><?php _e( 'Note:', 'woocommerce' ); ?></th>
					<td><?php echo wp_kses_post( nl2br( wptexturize( $order->get_customer_note() ) ) ); ?></td>
				</tr>
			<?php endif; ?>
		</tfoot>
	</table>

	<?php do_action( 'woocommerce_order_details_after_order_table', $order ); ?>

	<?php
	/**
	 * Action hook fired after the order details.
	 *
	 * @since 4.4.0
	 * @param WC_Order $order Order data.
	 */
	do_action( 'woocommerce_after_order_details', $order );
	?>

	<?php if ( $show_customer_details && apply_filters( 'uncode_woocommerce_show_customer_details', true ) ) : ?>
		<?php wc_get_template( 'order/order-details-customer.php', array( 'order' =>  $order ) ); ?>
	<?php endif; ?>
</div>
<div class="clear"></div>
