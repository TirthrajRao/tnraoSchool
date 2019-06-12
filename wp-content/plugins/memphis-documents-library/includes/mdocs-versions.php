<?php
function mdocs_versions() {
<<<<<<< HEAD
	$the_mdoc = mdocs_get_file_by($_REQUEST['mdocs-id'], 'id');
	$upload_dir = wp_upload_dir();
	$date_format = get_option('mdocs-date-format');
	$the_date = mdocs_format_unix_epoch($the_mdoc['modified'], true);
	$the_mdoc = mdocs_get_file_by($_POST['mdocs-id'], 'id');
	if(mdocs_check_file_rights($the_mdoc)) {
?>
	<script>
		mdocs_delete_version();
		mdocs_update_to_revision();
	</script>
	<h1 class="text-primary"><?php echo __('Versions','memphis-documents-library'); ?></h1>
	<h2 class="text-success"><?php echo stripcslashes($the_mdoc['name']); ?> - <i><small><?php echo $the_mdoc['filename']; ?></small></i></h2>
	<form enctype="multipart/form-data" action="" method="POST" id="mdocs-update-to-revision-form" data-folder="<?php echo $_REQUEST['folder']; ?>" data-sort="<?php echo $_REQUEST['sort']; ?>" data-sort-type="<?php echo $_REQUEST['sort-type']; ?>" data-is-dashboard="<?php echo $_REQUEST['is-dashboard']; ?>" >
		<input type="hidden" name="mdocs-id" value="<?php echo $the_mdoc['id']; ?>" />
		<table  class="table table-striped">
			<thead>
				<tr>
					<th scope="col" class="manage-column column-name" ><?php _e('File','memphis-documents-library'); ?></th>
					<th scope="col" class="manage-column column-name" ><?php _e('Version','memphis-documents-library'); ?></th>
					<th scope="col" class="manage-column column-name" ><?php _e('Date Modified','memphis-documents-library'); ?></th>
					<th scope="col" class="manage-column column-name" ><?php _e('Download','memphis-documents-library'); ?></th>
					<th scope="col" class="manage-column column-name" ><?php _e('Delete','memphis-documents-library'); ?></th>
					<th scope="col" class="manage-column column-name" ><?php _e('Current','memphis-documents-library'); ?></th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th scope="col" class="manage-column column-name" ><?php _e('File','memphis-documents-library'); ?></th>
					<th scope="col" class="manage-column column-name" ><?php _e('Version','memphis-documents-library'); ?></th>
					<th scope="col" class="manage-column column-name" ><?php _e('Date Modified','memphis-documents-library'); ?></th>
					<th scope="col" class="manage-column column-name" ><?php _e('Download','memphis-documents-library'); ?></th>
					<th scope="col" class="manage-column column-name" ><?php _e('Delete','memphis-documents-library'); ?></th>
					<th scope="col" class="manage-column column-name" ><?php _e('Current','memphis-documents-library'); ?></th>
				</tr>
			</tfoot>
			<tbody id="the-list">
					<tr>
						<td class="mdocs-blue" id="file" ><?php echo $the_mdoc['filename']; ?></td>
						<td class="mdocs-green" id="version" ><?php echo $the_mdoc['version']; ?></td>
						<td class="mdocs-red" id="date"><?php  echo $the_date['formated-date']; ?></td>
						<td id="download"><input type="button" id="mdocs-download" onclick="mdocs_download_current_version('<?php echo $the_mdoc['id']; ?>')" class="btn btn-primary" value=<?php _e("Download", 'memphis-documents-library'); ?>  /></td>
						<td></td>
						<td><input type="radio" name="mdocs-update-to-revision-radio" value="current" checked data-file="<?php echo $the_mdoc['filename']; ?>" data-version="<?php echo $the_mdoc['version']; ?>" data-mdocs-id="<?php echo $the_mdoc['id']; ?>" /></td>
					</tr>
				</tr>
			<?php
				foreach( array_reverse($the_mdoc['archived']) as $key => $archive ){
					$file = substr($archive, 0, strrpos($archive, '-'));
					$version = substr(strrchr($archive, '-'), 2 );
					if(file_exists($upload_dir['basedir'].'/mdocs/'.$archive) || file_exists($upload_dir['basedir'].'/mdocs/'.strtolower($archive))) {
						if(file_exists($upload_dir['basedir'].'/mdocs/'.strtolower($archive))) $archive = strtolower($archive);
						$archive_date_modified = date($date_format, filemtime($upload_dir['basedir'].'/mdocs/'.$archive)+MDOCS_TIME_OFFSET);
						?>
						<tr >
							<td class="mdocs-blue" id="file" ><?php echo $file; ?></td>
							<td class="mdocs-green" id="version" ><?php echo $version; ?></td>
							<td class="mdocs-red" id="date"><?php  echo $archive_date_modified; ?></td>
							<td id="download"><input onclick="mdocs_download_version('<?php echo $the_mdoc['id']; ?>', '<?php echo $archive; ?>')" type="button" id="mdocs-download" name="<?php echo $key; ?>" class="btn btn-primary" value="<?php _e("Download"); ?>"  /></td>
							<td id="delete-version">
								<input type="button" class="btn btn-danger" name="mdocs-delete-version-btn" value="<?php _e('Delete', 'memphis-documents-library'); ?>" data-archive="<?php echo $archive; ?>" data-mdocs-id="<?php echo $the_mdoc['id']; ?>"/>
							</td>
							<td><input type="radio" name="mdocs-update-to-revision-radio" value="" data-file="<?php echo $file; ?>" data-version="<?php echo $version; ?>" data-mdocs-id="<?php echo $the_mdoc['id']; ?>"  /></td>
						</tr>
						<?php
					}
				}
				?>
			</tbody>
		</table>
		<br/>
		<script>
			mdocs_refresh_table();
		</script>
		<input type="submit" class="btn btn-primary" value="<?php _e('Update To Revision') ?>" />
		<!--<button id="mdocs-manage-version-close-btn" type="button" class="btn btn-default " data-dismiss="modal" data-folder="<?php echo $_REQUEST['folder']; ?>" data-sort="<?php echo $_REQUEST['sort']; ?>" data-sort-type="<?php echo $_REQUEST['sort-type']; ?>" data-is-dashboard="<?php echo $_REQUEST['is-dashboard']; ?>" ><?php _e('Close','memphis-documents-library'); ?></button>-->
		<button type="button" class="btn btn-default" data-dismiss="modal"><?php _e('Close','memphis-documents-library'); ?></button>
	</form>
=======
	$cats = get_option('mdocs-cats');
	$mdocs = get_option('mdocs-list');
	$mdocs = mdocs_array_sort();
	$mdoc_index = mdocs_sanitize_string($_GET['mdocs-index']);
	$upload_dir = wp_upload_dir();
	if(isset($_GET['mdocs-cat'])) $current_cat = mdocs_sanitize_string($_GET['mdocs-cat']);
	else $current_cat = $current_cat = key($cats);
	$the_mdoc = $mdocs[$mdoc_index];
	$date_format = get_option('mdocs-date-format');
	$the_date = mdocs_format_unix_epoch($the_mdoc['modified'], true);
	//$the_mdoc_date_modified = gmdate($date_format, filemtime($upload_dir['basedir'].'/mdocs/'.$the_mdoc['fliename'])+MDOCS_TIME_OFFSET);
	if(mdocs_check_file_rights($the_mdoc)) {
?>
<div class="mdocs-uploader-bg"></div>
<div class="mdocs-uploader">
	<a href="<?php echo 'admin.php?page=memphis-documents.php&mdocs-cat='.$current_cat; ?>" type="button" class="close" id="mdocs-version-close"><span aria-hidden="true">&times;</span><span class="sr-only"><?php _e('Close','memphis-documents-library'); ?></span></a>
	<div class="page-header">
		<h1 id="mdocs-version-header"><?php echo __('Versions','memphis-documents-library'); ?> <small><?php echo $the_mdoc['filename']; ?></h1>
	</div>
	<div class="mdocs-ds-container">
		<div class="mdocs-uploader-content">
			<form class="mdocs-uploader-form" enctype="multipart/form-data" action="#" method="POST">
				<input type="hidden" name="mdocs-nonce" value="<?php echo MDOCS_NONCE; ?>" />
				<input type="hidden" name="mdocs-index" value="<?php echo $mdoc_index; ?>" />
				<input type="hidden" name="action" value="mdocs-update-revision" />
				<table  class="wp-list-table widefat plugins">
					<thead>
						<tr>
							<th scope="col" class="manage-column column-name" ><?php _e('File','memphis-documents-library'); ?></th>
							<th scope="col" class="manage-column column-name" ><?php _e('Version','memphis-documents-library'); ?></th>
							<th scope="col" class="manage-column column-name" ><?php _e('Date Modified','memphis-documents-library'); ?></th>
							<th scope="col" class="manage-column column-name" ><?php _e('Download','memphis-documents-library'); ?></th>
							<th scope="col" class="manage-column column-name" ><?php _e('Delete','memphis-documents-library'); ?></th>
							<th scope="col" class="manage-column column-name" ><?php _e('Current','memphis-documents-library'); ?></th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th scope="col" class="manage-column column-name" ><?php _e('File','memphis-documents-library'); ?></th>
							<th scope="col" class="manage-column column-name" ><?php _e('Version','memphis-documents-library'); ?></th>
							<th scope="col" class="manage-column column-name" ><?php _e('Date Modified','memphis-documents-library'); ?></th>
							<th scope="col" class="manage-column column-name" ><?php _e('Download','memphis-documents-library'); ?></th>
							<th scope="col" class="manage-column column-name" ><?php _e('Delete','memphis-documents-library'); ?></th>
							<th scope="col" class="manage-column column-name" ><?php _e('Current','memphis-documents-library'); ?></th>
						</tr>
					</tfoot>
					<tbody id="the-list">
							<tr class="mdocs-bg-odd">
								<td class="mdocs-blue" id="file" ><?php echo $the_mdoc['filename']; ?></td>
								<td class="mdocs-green" id="version" ><?php echo $the_mdoc['version']; ?></td>
								<td class="mdocs-red" id="date"><?php  echo $the_date['formated-date']; ?></td>
								<td id="download"><input type="button" id="mdocs-download" onclick="mdocs_download_current_version('<?php echo $the_mdoc['id']; ?>')" class="btn btn-primary" value=<?php _e("Download", 'memphis-documents-library'); ?>  /></td>
								<td></td>
								<td id="current"><input type="radio" name="mdocs-version" value="<?php echo 'current'; ?>" checked /></td>
							</tr>
						</tr>
					<?php
						$bgcolor = 'mdocs-bg-even';
						foreach( array_reverse($the_mdoc['archived']) as $key => $archive ){
							//$archive = strtolower($archive);
							$file = substr($archive, 0, strrpos($archive, '-'));
							$version = substr(strrchr($archive, '-'), 2 );
							if(file_exists($upload_dir['basedir'].'/mdocs/'.$archive) || file_exists($upload_dir['basedir'].'/mdocs/'.strtolower($archive))) {
								if(file_exists($upload_dir['basedir'].'/mdocs/'.strtolower($archive))) $archive = strtolower($archive);
								$archive_date_modified = date($date_format, filemtime($upload_dir['basedir'].'/mdocs/'.$archive)+MDOCS_TIME_OFFSET);
								?>
								<tr class="<?php echo $bgcolor; ?>">
									<td class="mdocs-blue" id="file" ><?php echo $file; ?></td>
									<td class="mdocs-green" id="version" ><?php echo $version; ?></td>
									<td class="mdocs-red" id="date"><?php  echo $archive_date_modified; ?></td>
									<td id="download"><input onclick="mdocs_download_version('<?php echo $the_mdoc['id']; ?>', '<?php echo $archive; ?>')" type="button" id="mdocs-download" name="<?php echo $key; ?>" class="btn btn-primary" value=<?php _e("Download"); ?>  /></td>
									<td id="download"><input onclick="mdocs_delete_version('<?php echo $archive; ?>','<?php echo $mdoc_index; ?>','<?php echo $current_cat; ?>','<?php echo MDOCS_NONCE; ?>')" type="button" id="mdocs-delete" name="<?php echo $key; ?>" class="btn btn-primary" value=<?php _e("Delete"); ?>  /></td>
									<td id="current"><input type="radio" name="mdocs-version" value="<?php echo count($the_mdoc['archived'])-$key-1; ?>" /></td>
								</tr>
								<?php
								if($bgcolor == "mdocs-bg-even") $bgcolor = "mdocs-bg-odd";
								else $bgcolor = "mdocs-bg-even";
							}
						}
						?>
					</tbody>
				</table>
				<br/>
				<input type="submit" class="btn btn-primary" value="<?php _e('Update To Revision') ?>" /><br/>
			</form>
		</div>
	</div>
</div>
>>>>>>> 416b05e6266477d87b7bcf7ec2d9ef98abab386e
<?php
	}
}

function mdocs_delete_version() {
<<<<<<< HEAD
	$mdocs = mdocs_array_sort();
	$the_mdoc = mdocs_get_file_by($_POST['mdocs-id'], 'id');
	$the_mdocs_index = mdocs_get_file_index_by($_POST['mdocs-id'], 'id');
	$upload_dir = wp_upload_dir();
	$archive_index = array_search($_POST['archive'], $the_mdoc['archived']);
	$version_file = $the_mdoc['archived'][$archive_index];
	unset($the_mdoc['archived'][$archive_index]);
	$the_mdoc['archived'] = array_values($the_mdoc['archived']);
	$mdocs[$the_mdocs_index] = $the_mdoc;
	mdocs_save_list($mdocs);
	unlink($upload_dir['basedir'].'/mdocs/'.$version_file);	
	$thumbnail_search = substr($version_file, 0, strrpos($version_file, '-', -1));
	$thumbnail_search = substr($thumbnail_search, 0, strrpos($thumbnail_search, '.', -1));
	$thumbnails = glob($upload_dir['basedir'].'/mdocs/'.$thumbnail_search.'-*');
	foreach($thumbnails as $thumbnail) unlink($thumbnail);	
}

function mdocs_update_to_revision() {
	if($_REQUEST['current'] != 'current') {
		global $current_user;
		$_REQUEST['file'] = sanitize_text_field($_REQUEST['file']);
		$mdocs = mdocs_array_sort();
		$the_mdoc = mdocs_get_file_by($_REQUEST['mdocs-id'], 'id');
		$the_mdoc_index = mdocs_get_file_index_by($_REQUEST['mdocs-id'], 'id');
		$upload_dir = wp_upload_dir();
		$file_type = wp_check_filetype($_REQUEST['file']);
		// RENAME OLD FILE TO REVISION
		$old_revision_name = $the_mdoc['filename'].'-v'.preg_replace('/ /','',$the_mdoc['version']);
		rename($upload_dir['basedir'].'/mdocs/'.$the_mdoc['filename'],$upload_dir['basedir'].'/mdocs/'.$old_revision_name);
		$the_file = explode('.',$the_mdoc['filename']);
		foreach(glob($upload_dir['basedir'].'/mdocs/'.$the_file[0].'-*.'.$the_file[1]) as $filename) {
			unlink($filename);
		}
		// RENAME REVISION TO NEW FILE
		$the_revision_file =  $_REQUEST['file'].'-v'.$_REQUEST['version'];
		$the_revision_file_type =  $file_type['ext'];
		$archive_index = array_search($the_revision_file, $the_mdoc['archived']);
		unset($mdocs[$the_mdoc_index]['archived'][$archive_index]);
		$mdocs[$the_mdoc_index]['archived'] = array_values($mdocs[$the_mdoc_index]['archived']);
		rename($upload_dir['basedir'].'/mdocs/'.$the_revision_file, $upload_dir['basedir'].'/mdocs/'.$_REQUEST['file']);
		// UPDATE MDOCS LIST
		$mdocs[$the_mdoc_index]['filename'] = $_REQUEST['file'];
		$mdocs[$the_mdoc_index]['name'] = $the_mdoc['name'];
		$mdocs[$the_mdoc_index]['version'] = mdocs_increase_minor_version($the_mdoc['version']);
		$mdocs[$the_mdoc_index]['type'] = (string)$the_revision_file_type;
		$mdocs[$the_mdoc_index]['size'] = (string)filesize($upload_dir['basedir'].'/mdocs/'.$_REQUEST['file']);
		$the_date = mdocs_format_unix_epoch(time());
		$mdocs[$the_mdoc_index]['modified'] = $the_date['gmdate'];
		array_push($mdocs[$the_mdoc_index]['archived'], $old_revision_name);
		mdocs_save_list($mdocs);
		// UPDATE WORDPRESS PAGES
		$date = mdocs_format_date(time());
		$mdocs_post = array(
			'ID' => $the_mdoc['parent'],
			'post_author' => $current_user->ID,
			'post_date' => $date['wp-date'],
			'post_date_gmt' => $date['wp-gmdate'],
		);
		$mdocs_post_id = wp_update_post( $mdocs_post );
		$attachment = array(
			'ID' => $the_mdoc['id'],
			'post_mime_type' => $file_type['type'],
			'post_title' => $the_mdoc['name'],
			'post_author' => $current_user->ID,
			'post_date' => $date['wp-date'],
			'post_date_gmt' => $date['wp-gmdate'],
		 );
		update_attached_file( $the_mdoc['id'], $upload_dir['basedir'].'/mdocs/'.$_REQUEST['file'] );
		$mdocs_attach_id = wp_update_post( $attachment );
		$mdocs_attach_data = wp_generate_attachment_metadata( $mdocs_attach_id, $upload_dir['basedir'].'/mdocs/'.$_REQUEST['file'] );
		wp_update_attachment_metadata( $mdocs_attach_id, $mdocs_attach_data );
		mdocs_versions();
	} else {
		mdocs_versions();
		?>
		<br>
		<div class="alert alert-info text-center"><?php _e('You are already at the most recent version of this document.', 'memphis-documents-library'); ?></div>
		<?php
	}
	
=======
	if ($_GET['mdocs-nonce'] == MDOCS_NONCE || get_option('mdocs-disable-sessions') == true) {
		$index = mdocs_sanitize_string($_GET['mdocs-index']);
		$version_file = mdocs_sanitize_string($_GET['version-file']);
		$mdocs = get_option('mdocs-list');
		$mdocs = mdocs_array_sort();
		$the_mdoc = $mdocs[$index];
		$upload_dir = wp_upload_dir();
		foreach($the_mdoc['archived'] as $i => $file) {
			if(strcasecmp($version_file, $file) == 0) { $archive_index = $i;  }
		}
		unset($the_mdoc['archived'][$archive_index]);
		$the_mdoc['archived'] = array_values($the_mdoc['archived']);
		$mdocs[$index] = $the_mdoc;
		mdocs_save_list($mdocs);
		unlink($upload_dir['basedir'].'/mdocs/'.$version_file);
	} else mdocs_errors(MDOCS_ERROR_4,'error');
		
}

function mdocs_update_revision() {
	//MDOCS NONCE VERIFICATION
	if ($_REQUEST['mdocs-nonce'] == MDOCS_NONCE || get_option('mdocs-disable-sessions') == true) {
		if($_POST['mdocs-version'] != 'current') {
			global $current_user;
			$mdocs = get_option('mdocs-list');
			$date_format = get_option('mdocs-date-format');
			$mdocs = mdocs_array_sort();
			$mdocs_index = $_POST['mdocs-index'];
			$upload_dir = wp_upload_dir();
			$the_mdoc = $mdocs[$mdocs_index];
			$the_update =  substr($the_mdoc['archived'][$_POST['mdocs-version']], 0, strrpos($the_mdoc['archived'][$_POST['mdocs-version']], '-'));
			$the_update_type =  substr(strrchr($the_update, '.'), 1 );
			$old_doc_name = $the_mdoc['filename'].'-v'.preg_replace('/ /','',$the_mdoc['version']);
			if(in_array($old_doc_name, $the_mdoc['archived'])) $old_doc_name = $old_doc_name.'.'.time();
			$name = substr($the_mdoc['filename'], 0, strrpos($the_mdoc['filename'], '.') );
			$filename = $name.'.'.$the_update_type;
			rename($upload_dir['basedir'].'/mdocs/'.$the_mdoc['filename'],$upload_dir['basedir'].'/mdocs/'.$old_doc_name);
			copy($upload_dir['basedir'].'/mdocs/'.$the_mdoc['archived'][$_POST['mdocs-version']], $upload_dir['basedir'].'/mdocs/'.$the_update);
			$mdocs[$mdocs_index]['filename'] = $the_update;
			$mdocs[$mdocs_index]['name'] = $the_mdoc['name'];
			$mdocs[$mdocs_index]['desc'] = $the_mdoc['desc'];
			$mdocs[$mdocs_index]['version'] = mdocs_increase_minor_version($the_mdoc['version']);
			$mdocs[$mdocs_index]['type'] = (string)$the_update_type;
			$mdocs[$mdocs_index]['cat'] = $the_mdoc['cat'];
			$mdocs[$mdocs_index]['owner'] = $mdocs_user = $current_user->user_login;
			$mdocs[$mdocs_index]['size'] = (string)filesize($upload_dir['basedir'].'/mdocs/'.$the_update);
			$the_date = mdocs_format_unix_epoch(time());
			$mdocs[$mdocs_index]['modified'] = $the_date['gmdate'];
			array_push($mdocs[$mdocs_index]['archived'], $old_doc_name);
			$mdocs = mdocs_array_sort($mdocs);
			mdocs_save_list($mdocs);
			$date = mdocs_format_date(time());
			$wp_filetype = wp_check_filetype($upload_dir['basedir'].'/mdocs/'.$filename, null );
			$mdocs_post = array(
				'ID' => $the_mdoc['parent'],
				'post_author' => $current_user->ID,
				'post_date' => $date['wp-date'],
				'post_date_gmt' => $date['wp-gmdate'],
			);
			$mdocs_post_id = wp_update_post( $mdocs_post );
			$attachment = array(
				'ID' => $the_mdoc['id'],
				'post_mime_type' => $wp_filetype['type'],
				'post_title' => $the_mdoc['name'],
				'post_author' => $current_user->ID,
				'post_date' => $date['wp-date'],
				'post_date_gmt' => $date['wp-gmdate'],
			 );
			update_attached_file( $the_mdoc['id'], $upload_dir['basedir'].'/mdocs/'.$filename );
			$mdocs_attach_id = wp_update_post( $attachment );
			$mdocs_attach_data = wp_generate_attachment_metadata( $mdocs_attach_id, $upload_dir['basedir'].'/mdocs/'.$filename );
			wp_update_attachment_metadata( $mdocs_attach_id, $mdocs_attach_data );
			//wp_set_post_tags( $mdocs_post_id, $the_mdoc['name'].', '.$the_mdoc['cat'].', memphis documents library, '.$wp_filetype['type'] );
			//wp_set_post_tags($mdocs_post_id, $_POST['mdocs-tags']);
		
		} else mdocs_errors('You are already at the most recent version of this document.');
	} else mdocs_errors(MDOCS_ERROR_4,'error');
>>>>>>> 416b05e6266477d87b7bcf7ec2d9ef98abab386e
}

?>