<?php
/*
 * TSP Appointments for CS-Cart
 *
 * @package		TSP Appointments for CS-Cart
 * @filename	install.php
 * @version		2.0.8
 * @author		Sharron Denice, The Software People, LLC on 2013/02/09
 * @copyright	Copyright © 2013 The Software People, LLC (www.thesoftwarepeople.com). All rights reserved
 * @license		Creative Commons Attribution-NonCommercial-NoDerivs 3.0 Unported (http://creativecommons.org/licenses/by-nc-nd/3.0/)
 * @brief		Script to copy addon files to their respective locations
 * 
 */

$source_loc			= '.';
$target_loc 		= '';
$theme_folder_name  = '';

$addon_name 		= 'tsp_appointments';
$addon_dir			= 'app/addons';
$theme_backend_dir	= 'design/backend';


$source_theme_frontend_dir	= 'design/themes/basic';
$source_theme_var_dir		= 'var/themes_repository/basic';

$target_theme_frontend_dir	= 'design/themes/'.$theme_folder_name;
$target_theme_var_dir		= 'var/themes_repository/'.$theme_folder_name;

if (empty( $target_loc ))
{
	echo "You must specify a target location on line #16 of this script.";
}//end if
elseif (!file_exists( $target_loc ))
{
	echo "The $target_loc (target location) specified does not exist on line #16 of this script.";
}//end elseif
elseif (empty( $theme_folder_name ))
{
	echo "You must specify a theme folder name location (ie `basic`) on line #17 of this script.";
}//end elseif
elseif(!file_exists( "$target_loc/$target_theme_frontend_dir" ))
{
	echo "The $target_theme_frontend_dir (target theme) specified does not exist on line #17 of this script.";
}//end elseif
else
{
	// Copy files from addons directory to the target addons directory
	shell_exec( " cp -R -v -a $source_loc/$addon_dir/$addon_name $target_loc/$addon_dir/ " );

	// Copy files from theme backend directory to the target backend directory
	shell_exec( " cp -R -v -a $source_loc/$theme_backend_dir/css/addons/$addon_name $target_loc/$theme_backend_dir/css/addons/ " );
	
	shell_exec( "mkdir -p $target_loc/$theme_backend_dir/mail/templates/addons/suppliers/overrides/common" );
	shell_exec( " cp -R -v -a $source_loc/$theme_backend_dir/mail/templates/addons/suppliers/overrides/common/options_info.tpl $target_loc/$theme_backend_dir/mail/templates/addons/suppliers/overrides/common/options_info.tpl" );
	
	shell_exec( " cp -R -v -a $source_loc/$theme_backend_dir/mail/templates/addons/$addon_name $target_loc/$theme_backend_dir/mail/templates/addons/ " );
	shell_exec( " cp -R -v -a $source_loc/$theme_backend_dir/media/images/addons/$addon_name $target_loc/$theme_backend_dir/media/images/addons/ " );
	shell_exec( " cp -R -v -a $source_loc/$theme_backend_dir/templates/addons/$addon_name $target_loc/$theme_backend_dir/templates/addons/ " );

	// Copy files from theme frontend directory to the target frontend directory
	shell_exec( " cp -R -v -a $source_loc/$source_theme_frontend_dir/css/addons/$addon_name $target_loc/$target_theme_frontend_dir/css/addons/ " );
	shell_exec( " cp -R -v -a $source_loc/$source_theme_frontend_dir/mail/templates/addons/$addon_name $target_loc/$target_theme_frontend_dir/mail/templates/addons/ " );
	shell_exec( " cp -R -v -a $source_loc/$source_theme_frontend_dir/templates/addons/$addon_name $target_loc/$target_theme_frontend_dir/templates/addons/ " );

	// Copy files from theme frontend directory to the target var/ directory
	shell_exec( " cp -R -v -a $source_loc/$source_theme_var_dir/css/addons/$addon_name $target_loc/$target_theme_var_dir/css/addons/ " );
	shell_exec( " cp -R -v -a $source_loc/$source_theme_var_dir/mail/templates/addons/$addon_name $target_loc/$target_theme_var_dir/mail/templates/addons/ " );
	shell_exec( " cp -R -v -a $source_loc/$source_theme_var_dir/templates/addons/$addon_name $target_loc/$target_theme_var_dir/templates/addons/ " );
}//end else
?>