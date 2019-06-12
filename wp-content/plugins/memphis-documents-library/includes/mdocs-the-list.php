<?php
<<<<<<< HEAD
function mdocs_the_list($att=null, $refresh=false) {
	global $post;
	
	//$file_info = get_option('mdocs-displayed-file-info');
	//var_dump($file_info);
	
	$sortbar_data = array();
	if(!isset($_REQUEST['type']) || $_REQUEST['type'] == 'none') ob_start();
	if(mdocs_check_read_write() == false) mdocs_errors(__('Unable to create the directory "mdocs" which is needed by Memphis Documents Library. Its parent directory is not writable by the server?','memphis-documents-library'),'error');
	$disable_user_sort = get_option('mdocs-disable-user-sort');
	$sortbar_data['orderby'] = get_option('mdocs-sort-type');
	$sortbar_data['sort-type'] = get_option('mdocs-sort-style');
	if(isset($_COOKIE['mdocs-sort-type']) && $disable_user_sort == false && get_option('mdocs-hide-sortbar') == false) $sortbar_data['orderby'] = $_COOKIE['mdocs-sort-type'];
	if(isset($_COOKIE['mdocs-sort-range']) && $disable_user_sort == false && get_option('mdocs-hide-sortbar') == false) $sortbar_data['sort-type'] = $_COOKIE['mdocs-sort-range'];
	if($sortbar_data['sort-type'] == 'desc') $sortbar_data['sort-icon'] = ' <i class="fa fa-chevron-down" aria-hidden="true"></i>';		
	else $sortbar_data['sort-icon'] = ' <i class="fa fa-chevron-up" aria-hidden="true"></i>';
	
	if(isset($att['folder']) && isset($att['hide_folder']) && isset($att['sort_value']) && isset($att['is_descending'])) {
		mdocs_list_header(false);
		$current_folder = $att['folder'];
		$sortbar_data['current-folder'] = $att['folder'];
		$folder = mdocs_recursive_search(get_option('mdocs-cats'),$att['folder']);
		if($att['sort_value'] != 'default') $sortbar_data['orderby'] = $att['sort_value'];
		if(mdocs_convert_to_boolean($att['is_descending']) == false)  {
			$sortbar_data['sort-icon'] = ' <i class="fa fa-chevron-up" aria-hidden="true"></i>';
			$sortbar_data['sort-type'] = 'asc';
		} else {
			$sortbar_data['sort-icon'] = ' <i class="fa fa-chevron-down" aria-hidden="true"></i>';	
			$sortbar_data['sort-type'] = 'desc';
		}
		$mdocs = mdocs_sort_array($sortbar_data['orderby'], $sortbar_data['sort-type']);
		if(is_admin()) $sortbar_data['is-dashboard'] = true;
		else $sortbar_data['is-dashboard'] = false;
		if(mdocs_convert_to_boolean($att['hide_folder'])) $sortbar_data['hide-folder'] = true;
		else $sortbar_data['hide-folder'] = false;
		$sortbar_data['hide-main-folder'] = true;
	// AJAX
	} elseif(isset($_REQUEST['type']) && $_REQUEST['type'] == 'refresh-table') {
		$current_folder = $_REQUEST['folder'];
		$sortbar_data['current-folder'] = $_REQUEST['folder'];
		$folder = mdocs_recursive_search(get_option('mdocs-cats'),$_REQUEST['folder']);
		$sortbar_data['orderby'] = $_REQUEST['sort'];
		if($_REQUEST['sort-type'] == 'asc')  {
			$sortbar_data['sort-icon'] = ' <i class="fa fa-chevron-up" aria-hidden="true"></i>';
			$sortbar_data['sort-type'] = 'asc';
		} else {
			$sortbar_data['sort-icon'] = ' <i class="fa fa-chevron-down" aria-hidden="true"></i>';	
			$sortbar_data['sort-type'] = 'desc';
		}
		$mdocs = mdocs_sort_array($sortbar_data['orderby'], $sortbar_data['sort-type']);
		/*
		if(isset($_REQUEST['hide-folder'])) $sortbar_data['hide-folder'] = $_REQUEST['hide-folder'];
		else $sortbar_data['hide-folder'] = false;
		if(isset($_REQUEST['hide-main-folder'])) $sortbar_data['hide-main-folder'] = $_REQUEST['hide-main-folder'];
		else $sortbar_data['hide-main-folder'] = false;
		*/
		
		$sortbar_data['is-dashboard'] = mdocs_convert_to_boolean($_REQUEST['is-dashboard']);
		$sortbar_data['hide-folder'] = mdocs_convert_to_boolean($_REQUEST['hide-folder']);
		$sortbar_data['hide-main-folder'] = mdocs_convert_to_boolean($_REQUEST['hide-main-folder']);
		if(mdocs_convert_to_boolean($_REQUEST['is-dashboard'])) {
			$sortbar_data['is-dashboard'] = true;
			mdocs_list_header(true,$sortbar_data);
		} elseif(mdocs_convert_to_boolean($_REQUEST['hide-main-folder']) == false) {
			mdocs_list_header(true,$sortbar_data);
		} else {
			$sortbar_data['is-dashboard'] = false;
			mdocs_list_header(false, $sortbar_data);
		}
		
	} else {
		if(isset($att['cat']) && $att['cat'] != 'All Files') $folder = mdocs_get_the_folder($att, $att['cat']);
		elseif(isset($att['cat']) && $att['cat'] == 'All Files') $folder['slug'] = 'all';
		elseif(isset($att['folder']) && $att['folder'] != 'all') $folder = mdocs_get_the_folder($att, $att['folder']);
		elseif(isset($att['folder']) && $att['folder'] == 'all') $folder['slug'] = 'all';
		else $folder = mdocs_get_the_folder($att);
		$current_folder = $folder['slug'];
		$sortbar_data['current-folder'] =$folder['slug'];
		$mdocs = mdocs_sort_array($sortbar_data['orderby'], $sortbar_data['sort-type']);
		if(is_admin()) $sortbar_data['is-dashboard'] = true;
		else $sortbar_data['is-dashboard'] = false;
		if($att == null) {
			$sortbar_data['hide-main-folder'] = false;
			$sortbar_data['hide-folder'] = false;
			mdocs_list_header(true, $sortbar_data);
		} elseif(isset($att['cat'])) {
			$sortbar_data['hide-main-folder'] = true;
			//var_dump(mdocs_convert_to_boolean($att['hide_folder']));
			if(isset($att['hide_folder']) && mdocs_convert_to_boolean($att['hide_folder']) == false) $sortbar_data['hide-folder'] = false;
			else $sortbar_data['hide-folder'] = true;
			mdocs_list_header(false, $sortbar_data);
		} else {
			$sortbar_data['hide-main-folder'] = true;
			$sortbar_data['hide-folder'] = true;
			mdocs_list_header(false, $sortbar_data);
		}
		
		
		if(isset($att['cat']) && $att['cat'] == 'All Files') {
			$sortbar_data['current-folder'] = 'all';
		}
		//else if(!isset($att['cat'])) mdocs_list_header(true, $sortbar_data);
		//else mdocs_list_header(false, $sortbar_data);
	}
	?><div class="mdocs-container"><?php
	if(isset($att['header'])) echo '<p>'.__($att['header']).'</p>';
	?><table class="table table-hover table-condensed" id="mdocs-list-table"><?php
	if(get_option('mdocs-hide-sortbar') == false && !isset($att['single-file'])) { 	?>
	<thead>
	<?php $num_tds = mdocs_build_sortbar($sortbar_data); ?>
=======

function mdocs_the_list($att=null) {
	global $post;
	ob_start();
	//mdocs_load_modals();
	if(mdocs_check_read_write() == false) mdocs_errors(__('Unable to create the directory "mdocs" which is needed by Memphis Documents Library. Its parent directory is not writable by the server?','memphis-documents-library'),'error');
	$mdocs = get_option('mdocs-list');
	$mdocs = mdocs_array_sort();
	if(isset($att['cat'])) $current_cat_array = mdocs_get_the_folder($att, $att['cat']);
	else $current_cat_array = mdocs_get_the_folder($att);
	$current_cat = $current_cat_array['slug'];
	if(isset($att['cat']) && $att['cat'] == 'All Files' || isset($att['single-file'])) { $current_cat = 'all'; mdocs_list_header(false); }
	else if(!isset($att['cat'])) mdocs_list_header(true);
	else mdocs_list_header(false);
	$permalink = mdocs_get_permalink($post);
	if(isset($_GET['mdocs-att'])) $the_folder = mdocs_sanitize_string($_GET['mdocs-att']);
	else $the_folder = 'none';
	$permalink = $permalink.$current_cat_array['slug'].'&mdocs-att='.$the_folder;
	$mdocs_sort_type = get_option('mdocs-sort-type');
	$mdocs_sort_style = get_option('mdocs-sort-style');
	$disable_user_sort = get_option('mdocs-disable-user-sort');
	if(isset($_COOKIE['mdocs-sort-type']) && $disable_user_sort == false && get_option('mdocs-hide-sortbar') == false) $mdocs_sort_type = $_COOKIE['mdocs-sort-type'];
	if(isset($_COOKIE['mdocs-sort-range']) && $disable_user_sort == false && get_option('mdocs-hide-sortbar') == false) $mdocs_sort_style = $_COOKIE['mdocs-sort-range'];
	if($mdocs_sort_style == 'desc') $mdocs_sort_style_icon = ' <i class="fa fa-chevron-down" aria-hidden="true"></i>';		
	else $mdocs_sort_style_icon = ' <i class="fa fa-chevron-up" aria-hidden="true"></i>';
?><div class="mdocs-container"><?php
	if(isset($att['header'])) echo '<p>'.__($att['header']).'</p>';
		$num_tds = 1;
	?>
	<table class="table table-hover table-condensed" id="mdocs-list-table">
	<?php
	if(get_option('mdocs-hide-sortbar') == false && !isset($att['single-file'])) { ?>
	<thead>
	<tr class="hidden-sm hidden-xs">
		<?php if(is_admin()) { ?> <th id="batch"><input type="checkbox" name="mdocs-batch-select-all" id="mdocs-batch-select-all"/></th> <?php  $num_tds++; } ?>
		<th class="mdocs-sort-option" data-disable-user-sort="<?php echo $disable_user_sort; ?>" data-sort-type="name" data-current-cat="<?php echo $current_cat; ?>" data-permalink="<?php echo $permalink; ?>"><?php _e('Name','memphis-documents-library'); ?><?php if($mdocs_sort_type == 'name') echo $mdocs_sort_style_icon; ?></th>
		<?php
		foreach(get_option('mdocs-displayed-file-info') as $key => $option) {
			if(isset($option['show']) && $option['show']) {
				$num_tds++; ?>
				<th class="mdocs-sort-option" data-disable-user-sort="<?php echo $disable_user_sort; ?>" data-sort-type="<?php echo $option['slug']; ?>" data-current-cat="<?php echo $current_cat; ?>" data-permalink="<?php echo $permalink; ?>"><?php mdocs_local($option['text']); ?><?php if($mdocs_sort_type ==$option['slug']) echo $mdocs_sort_style_icon; ?></th>
			<?php } 
		}
		?>
	</tr>
>>>>>>> 416b05e6266477d87b7bcf7ec2d9ef98abab386e
	</thead>
	<?php
		if(get_option('mdocs-hide-footer') == false) { ?>
		<tfoot>
<<<<<<< HEAD
		<?php $num_tds = mdocs_build_sortbar($sortbar_data); ?>
=======
		<tr class="hidden-sm hidden-xs">
			<?php if(is_admin()) { ?> <th id="batch"><input type="checkbox" name="mdocs-batch-select-all" id="mdocs-batch-select-all"/></th> <?php } ?>
			<th class="mdocs-sort-option" data-disable-user-sort="<?php echo $disable_user_sort; ?>" data-sort-type="name" data-current-cat="<?php echo $current_cat; ?>" data-permalink="<?php echo $permalink; ?>"><?php _e('Name','memphis-documents-library'); ?><?php if($mdocs_sort_type == 'name') echo $mdocs_sort_style_icon; ?></th>
			<?php
			foreach(get_option('mdocs-displayed-file-info') as $key => $option) {
				if(isset($option['show']) && $option['show']) {
					$num_tds++; ?>
					<th class="mdocs-sort-option" data-disable-user-sort="<?php echo $disable_user_sort; ?>" data-sort-type="<?php echo $option['slug']; ?>" data-current-cat="<?php echo $current_cat; ?>" data-permalink="<?php echo $permalink; ?>"><?php _e($option['text'], 'memphis-documents-library'); ?><?php if($mdocs_sort_type ==$option['slug']) echo $mdocs_sort_style_icon; ?></th>
				<?php } 
			}?>
		</tr>
>>>>>>> 416b05e6266477d87b7bcf7ec2d9ef98abab386e
		</tfoot>
		<?php
		}
	}
	// SUB CATEGORIES
<<<<<<< HEAD
	if($sortbar_data['hide-folder'] == false) {
		$hide_sub_folders = get_option('mdocs-hide-subfolders');
		$hide_all_sub_folder = get_option('mdocs-hide-all-subfolders');
		if(!isset($att['cat']) && $hide_all_sub_folder == false) mdocs_display_folders($folder, $sortbar_data); 
		elseif(isset($folder['children']) && $hide_sub_folders == false && isset($att['cat'])) mdocs_display_folders($folder, $sortbar_data);
=======
	if(!isset($att['single-file'])) {
		$hide_sub_folders = get_option('mdocs-hide-subfolders');
		$hide_all_sub_folder = get_option('mdocs-hide-all-subfolders');
		if(!isset($att['cat']) && $hide_all_sub_folder == false) mdocs_display_sub_folders($current_cat_array, 'null'); 
		elseif(isset($current_cat_array['children']) && $hide_sub_folders == false && isset($att['cat'])) mdocs_display_sub_folders($current_cat_array, $att['cat']);
>>>>>>> 416b05e6266477d87b7bcf7ec2d9ef98abab386e
	}
	// LOAD FILES
	$has_one_file = false;
	if(isset($att['single-file'])) {
<<<<<<< HEAD
		$the_mdoc = get_the_mdoc_by($att['single-file'], 'id');
		if($the_mdoc == null ) $the_mdoc = get_the_mdoc_by($att['single-file'], 'filename');
		if(mdocs_check_file_rights($the_mdoc)) {
			$has_one_file = true;
			$mdocs_post = get_post($the_mdoc['parent']);
			mdocs_display_file_info($the_mdoc, 0, $current_folder);
		}
	} else {
		foreach($mdocs as $index => $the_mdoc) {
			if($the_mdoc['cat'] == $current_folder || $current_folder == 'all' ) {
				$show_file = true;
				if($the_mdoc['file_status'] == 'hidden') $show_file = false;
				if(get_option( 'mdocs-hide-all-files' ) == true) $show_file = false;
				if(get_option( 'mdocs-hide-all-files-non-members') && is_user_logged_in() == false) $show_file = false;
				if(current_user_can( 'manage_options' )) $show_file = true;
				$current_user = wp_get_current_user();
				if($current_user->user_login == $the_mdoc['owner']) $show_file = true;
=======
		$the_mdoc = get_the_mdoc_by($att['single-file'], 'filename');
		if(mdocs_check_file_rights($the_mdoc)) {
			$has_one_file = true;
			$mdocs_post = get_post($the_mdoc['parent']);
			mdocs_display_file_info($the_mdoc, 0, $current_cat);
		}
	} else {	
		foreach($mdocs as $index => $the_mdoc) {
			if($the_mdoc['cat'] == $current_cat || $current_cat == 'all') {
				$show_file = true;
				if($the_mdoc['file_status'] == 'hidden') $show_file = false;
				if(get_option( 'mdocs-hide-all-files' ) === false) $show_file = false;
				if(current_user_can( 'manage_options' )) $show_file = true;
				$current_user = wp_get_current_user();
>>>>>>> 416b05e6266477d87b7bcf7ec2d9ef98abab386e
				if(is_array($the_mdoc['contributors'])) {
					foreach($the_mdoc['contributors'] as $index => $role) {
						if($current_user->user_login == $role) $show_file = true;
						if(in_array($role, $current_user->roles)) $show_file = true;
					}
				}
				if($show_file) {
					$has_one_file = true;
					$mdocs_post = get_post($the_mdoc['parent']);
<<<<<<< HEAD
					mdocs_display_file_info($the_mdoc, $index, $current_folder, $sortbar_data);
=======
					mdocs_display_file_info($the_mdoc, $index, $current_cat);
>>>>>>> 416b05e6266477d87b7bcf7ec2d9ef98abab386e
				}
			} 
		}
	}
	if($has_one_file == false && get_option('mdocs-show-no-file-found')) {
<<<<<<< HEAD
		if(isset($att['single-file'])) $num_tds = 1;
=======
>>>>>>> 416b05e6266477d87b7bcf7ec2d9ef98abab386e
		?><tr><td colspan="<?php echo $num_tds; ?>"><p class="mdocs-nofiles" ><?php _e('No files found in this folder.','memphis-documents-library'); ?></p></td></tr><?php
	}
	
	?></table></div></div><?php
<<<<<<< HEAD
	if(!isset($_REQUEST['type']) || $_REQUEST['type'] == 'none') {
		$the_list = ob_get_clean();
	} else $the_list = null;
	return $the_list;
}
function mdocs_build_sortbar($data) {
	$num_tds = 1;
	?>
	<tr>
		<?php
		if($data['is-dashboard']) { 
			$num_tds++;
			?>
			<th id="batch"><input type="checkbox" name="mdocs-batch-select-all" id="mdocs-batch-select-all"/></th>
			<?php
		}
			if(get_option('mdocs-disable-user-sort')) {
				foreach(mdocs_sort_file_info() as $key => $option) {
					if(isset($option['show']) && $option['show']) {
						$num_tds++; ?>
						<th><?php mdocs_local($option['text']);  if($data['orderby'] ==$option['slug']) echo $data['sort-icon']; ?></th>
					<?php
					}
				}
			} else {
			foreach(mdocs_sort_file_info() as $key => $option) {
				if(isset($option['show']) && $option['show']) {
					$num_tds++; ?>
					<th class="<?php echo 'mdocs-'.$option['slug']; ?> mdocs-sort-option" data-folder="<?php echo $data['current-folder']; ?>" data-sort="<?php echo $option['slug']; ?>" data-sort-type="<?php echo $data['sort-type']; ?>" data-current-sort="<?php echo $data['orderby']; ?>" data-current-sort-type="<?php echo $data['sort-type']; ?>" data-is-dashboard="<?php echo $data['is-dashboard']; ?>" data-hide-folder="<?php echo $data['hide-folder']; ?>" data-hide-main-folder="<?php echo $data['hide-main-folder']; ?>" ><?php mdocs_local($option['text']);  if($data['orderby'] ==$option['slug']) echo $data['sort-icon']; ?></th>
				<?php
				}
			}
		}
		?>
	</tr>
	<?php
	return $num_tds;
}
=======
	$the_list = ob_get_clean();
	return $the_list;
}
>>>>>>> 416b05e6266477d87b7bcf7ec2d9ef98abab386e
?>