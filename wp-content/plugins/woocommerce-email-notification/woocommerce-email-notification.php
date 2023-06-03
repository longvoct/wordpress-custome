<?php

/**
 * Plugin Name: Woocommerce Email Notification
 * Description: Sends an email notification to the customer after a successful payment on Woocommerce.
 * Version: 1.0
 * Author: Your Name
 * Author URI: http://mywordpress.vn
 */

defined('ABSPATH') or die('No script kiddies please!');

add_action('woocommerce_order_status_completed', 'send_email_on_order_completion');

function send_email_on_order_completion($order_id)
{
  // Get the order object
  $order = wc_get_order($order_id);

  // Get the customer email
  $to = $order->get_billing_email();

  // Set the email subject
  $subject = 'Thank you for your order!';

  // Set the email body
  $body = 'Dear ' . $order->get_billing_first_name() . ',<br><br>';
  $body .= 'Thank you for your order #' . $order_id . '.<br><br>';
  $body .= 'We are processing your order and will notify you as soon as it ships.<br><br>';
  $body .= 'Thank you for shopping with us!<br><br>';
  $body .= 'Best regards,<br>';
  $body .= 'Your Company Name';

  // Set the email headers
  $headers = array(
    'Content-Type: text/html; charset=UTF-8',
    'From: Your Company Name <20521577@gm.uit.edu.vn>',
    'Reply-To: Your Company Name <20521577@gm.uit.edu.vn>',
  );

  // Send the email
  wp_mail($to, $subject, $body, $headers);
}