<?php
// ADD THE ACTION HOOK WP LOADED TO REGISTER THE NEW FILE INFO
add_action('wp_loaded','mdocs_register_example');
// THE FUNCTION TIED TO THE HOOK
function mdocs_register_example() {
	// EXAMPLE ADD, UPDATE AND DELETE
	// ADD FILE INFO
	// Add Function Parameters (Array Key, Args)
	/*Arg Values:
	 *text => (string) Column Title,
	 *icon => (string) Font Awesome Icon,
	 *color => (string) Text Color,
	 *func => (string) Callback Function,
	 *order => (int) Position in table,
	 *width => (int) Width in Percentage,
	 *show => (boolean) Show By Default,
	 */
	mdocs_add_file_info('thumbnails', array(
		'text' => 'Thumbnails',
		'func' => 'mdocs_display_thumbnail',
		'order' =>11,
		'width' => 9
	));
	// UPDATE FILE INFO
	// Update Function Parameters (Array Key, Args)
	/*Arg Values:
	 *text => (string) Column Title,
	 *icon => (string) Font Awesome Icon,
	 *color => (string) Text Color,
	 *func => (string) Callback Function,
	 *order => (int) Position in table,
	 *width => (int) Width in Percentage,
	 *show => (boolean) Show By Default,
	 */
	/*
	mdocs_update_file_info('thumbnails', array(
		'text' => 'Thumbnails',
		'func' => 'mdocs_display_thumbnail',
		'order' =>11,
		'width' => 9
	));
	// DELETE FILE INFO
	mdocs_delete_file_info('thumbnails');
	*/
	
}
// CALLBACK FOR THE NEW COLUMN
function mdocs_display_thumbnail($the_mdoc) {
	if(get_option('mdocs-box-view-key') != '' && get_option('mdocs-preview-type') == 'box') {
		$boxview = new mdocs_box_view();
		?>
		<img class="img-thumbnail mdocs-img-preview img-responsive" src="<?php $boxview->getThumbnail($the_mdoc['box-view-id'], $the_mdoc); ?>" alt="<?php echo $the_mdoc['filename']; ?>" />
		<?php
	} else {
		?>
		<img class="img-thumbnail mdocs-img-preview img-responsive" src="<?php echo site_url(); ?>/?mdocs-img-preview=<?php echo $the_mdoc['filename']; ?>" />
		<?php
	}
}
?>