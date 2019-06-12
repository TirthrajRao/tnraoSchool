<?php
$module_info = array(
	'base'         => 'albumsview2',
	'name'         => 'albumsview2',
	'title'        => 'AlbumsView 2',
	'version'      => '1.2',
	'author'       => 'GalleryCreator',
	'description'  => 'Splash Gallery for your Albums, Categories, Tags in a the grid mode. Ajax based, no dependecies from other JS libraries. Fast, customizible and flexible.',
	'type'         => 'gallery',
	'branch'       => '1',
	'status'       => 'premium',
	'price'        => '$20',
	'demo'         => '',
	'download'     => '',
	'dependencies' => ''
);
if (preg_match('#' . basename(dirname(__FILE__)) . '/' . basename(__FILE__) . '#', $_SERVER['PHP_SELF'])) {
	if (isset($_GET['info'])) {
		echo '<pre>' . print_r($module_info, true) . '</pre>';
	} else {
		header("Location: {$module_info['demo']}");
		die();
	}
}