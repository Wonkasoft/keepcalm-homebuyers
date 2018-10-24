<?php
/**
 * This file is using a WooCommerce Hook to add engraving information to the order notes after
 * order is complete.
 * Author: Wonkasoft
 * Author URI: https://wonkasoft.com
 * 4/11/2018
 * @package bestfriendservices
 * @since 2.0.0 Site Upgrades
 */
// Load the order object
$order = new WC_Order( $order_id );
$orderItems = $order->get_items();
$note = '';

foreach ( $orderItems as $item_id => $item ) {
  foreach ( $item->get_formatted_meta_data() as $meta_id => $meta ) {
    $result = strtolower( wp_kses_post( $meta->display_key ) );
    if ( strpos( $result, 'engraving' ) !== false ) {
      $i++;
      if ( $i === 1 ) {
        $note .= 'Engraving Information' . PHP_EOL;
      }
      $note .= 'Line ' . $i . ': ' . wp_kses_post( strip_tags( $meta->display_value ) ) . PHP_EOL;
    }
    if ( strpos( $result,'text' ) !== false ) {
      $i++;
      if ( $i === 1 ) {
        $note .= 'Text Information' . PHP_EOL;
      }
      $note .= 'Line ' . $i . ': ' . wp_kses_post( strip_tags( $meta->display_value ) ) . PHP_EOL;
    }
  }
}

// Add the note
// Loading order object for testing make sure to update
if ($note !== '') {
  $order->add_order_note( $note );
  $customer_notes = $order->customer_message;
  $new_customer_note = $customer_notes.PHP_EOL.$note;
  $order_data = array(
    'order_id' => $order_id,
    'customer_note' => $new_customer_note,
  );
  // Update order and save to database
  wc_update_order( $order_data );
}