<?php

/**
 * Plugin Name: Hostinger
 * Plugin URI: https://www.hostinger.com
 * Description: Hostinger WordPress plugin.
 * Version: 1.0
 * Author: Hostinger
 * Author URI: https://www.hostinger.com
 *
 */

add_filter('astra_get_pro_url', 'astra_pro_affiliate_link', 10, 2);
function astra_pro_affiliate_link($astra_pro_url, $url)
{
    return add_query_arg('bsf', '5643', $url);
}
