<?php 
if (! defined ( 'ABSPATH' ))
	exit (); // Exit if accessed directly

$data = WShop_Temp_Helper::get('atts','templates');

$atts = $data['atts'];
$content = $data['content'];

$product = new WShop_Product($atts['post_id']);
if(!$product->is_load()){
    ?><span style="color:red;">[商品未设置价格或未启用在线支付！]</span><?php
    return;
}

$request_url =null;
if(!is_user_logged_in()&&!WShop::instance()->WP->is_enable_guest_purchase()){
    $request_url=wp_login_url($atts['location']);
    ?><a href="<?php echo $request_url;?>" class="<?php echo isset($atts['class'])?esc_attr($atts['class']):""?>" style="<?php echo isset($atts['style'])?esc_attr($atts['style']):""?>"><?php echo do_shortcode($content);?></a><?php
    return;
}else{ 
    $request = WShop_Async::instance()->shortcode_atts(WShop::instance()->payment->pay_atts(), $atts);
    $request['action']="wshop_checkout";
    $request['post_id'] = $atts['post_id'];
    $request['tab']="add_to_cart_ajax";
    $request_url =WShop::instance()->ajax_url($request,true,true);

    ?><a href="<?php echo $request_url;?>" class="<?php echo isset($atts['class'])?esc_attr($atts['class']):""?>" style="<?php echo isset($atts['style'])?esc_attr($atts['style']):""?>"><?php echo do_shortcode($content);?></a><?php
}