<?php
/**
 * This file is using a WooCommerce Hook to add assembly products for picking/shipping 
 * information after order is complete.
 * Author: Wonkasoft
 * Author URI: https://wonkasoft.com
 * 4/11/2018
 * @package bestfriendservices
 * @since 2.0.0 Site Upgrades
 */

$order = new WC_Order( $order_id );
$order_id = $order->get_id();
$order_items = $order->get_items();

foreach ($order_items as $item_id => $item) :

  // if product requires photoholder add photoholder
  $photoholder_check = get_post_meta($item->get_product_id(), 'photoholder', true);
  if ( $photoholder_check === 'yes' ) :

    foreach ( $item->get_meta_data() as $meta ) :

      $key_check = strtolower( wp_strip_all_tags( $meta->key ) );

      if ( $key_check == 'pa_size' ) :
        $size_value = trim( strtolower( wp_strip_all_tags( $meta->value ) ) );
        switch ($size_value) :
          case 'small':
          // needs product id for small photoholder
          $add_product = wc_get_product(41861);
          $qty = $item->get_quantity();

          $order->add_product( $add_product, $qty);
          break;

          case 'medium':
          // needs product id for medium photoholder
          $add_product = wc_get_product(5230);
          $qty = $item->get_quantity();

          $order->add_product( $add_product, $qty);
          break;

          case 'large':
          // needs product id for large photoholder
          $add_product = wc_get_product(5228);
          $qty = $item->get_quantity();

          $order->add_product( $add_product, $qty);
          break;
        endswitch;
      endif; // $key_check

    endforeach;
  endif;

  // if product requires bumpon add bumpon
  $bumpon_check = get_post_meta($item->get_product_id(), 'bumpon', true);
  if ( $bumpon_check === 'yes' ) :

    /*
    * needs product id for bumpon
    * wc_get_product(BUMPON ID)
    * @since 2.0.0 [<Site upgrades>]
    */
    $add_product = wc_get_product(41863);
    $qty = $item->get_quantity();
    $order->add_product( $add_product, $qty);
  endif;

  $magnet_check = get_post_meta($item->get_product_id(), 'magnets', true);
  // if product requires magnets add magnets
  if ( $magnet_check === 'yes' ) :
    /**
    * needs product id for photo magnets
    * wc_get_product(PHOTO MAGNETS ID)
    * @since 2.0.0 [<Site upgrades>]
    */
    $add_product = wc_get_product(41862);
    $qty = $item->get_quantity();

    $order->add_product( $add_product, $qty);
  endif;
endforeach;

return;