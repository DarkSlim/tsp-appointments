<?php
/*
 * TSP Appointments for CS-Cart
 *
 * @package		TSP Appointments for CS-Cart
 * @filename	admin.post.php
 * @version		1.0.0
 * @author		Sharron Denice, The Software People, LLC on 2013/02/09
 * @copyright	Copyright © 2013 The Software People, LLC (www.thesoftwarepeople.com). All rights reserved
 * @license		Creative Commons Attribution-NonCommercial-NoDerivs 3.0 Unported (http://creativecommons.org/licenses/by-nc-nd/3.0/)
 * @brief		Admin post permissions for menus
 * 
 */

if ( !defined('AREA') ) { die('Access denied'); }

$schema['appointments'] = array (
	'permissions' => 'manage_appointments',
);
$schema['tools']['modes']['update_status']['param_permissions']['table_names']['addon_tsp_appointments'] = 'manage_aappointments';

?>