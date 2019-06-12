<?php
$default_options = array(
    // Splash Page
    'splashPreloaderColor' => '3498db',
	'coverHeight' => '300',
	'coverWidth' => '500',
	'labelForNextButtonAlbum' => 'NEXT ALBUM',
	'labelForPrevButtonAlbum' => 'PREVIOUS ALBUM',
	'labelForNextButtonCategory' => 'NEXT CATEGORY',
	'labelForPrevButtonCategory' => 'PREVIOUS CATEGORY',
    'coverTitleFontSize' => '20',
    'coverTitleTextColor' => 'rgba(255, 255, 255, 1)',
    'coverTitleTextColor2' => 'rgba(52, 152, 219,1)',
    'coverTitleBgColor' => 'rgba(0, 0, 0, 0.7)',
    'coverDescriptionTextColor' => 'rgba(255, 255, 255, 1)',
    'coverDescriptionFontSize' => '14',
    'coverTagsTextColor' => 'ffffff',
    'coverTagsBgColor' => '3498db',
    'coverTagsBgColor2' => '1b84db',
    // Collection Page
    'collectionBgColor' => 'f4f4f4',
    'collectionHeaderBgColor' => 'ffffff',
    'collectionPreloaderColor' => '3498db',
    'collectionHeaderTitleTextColor' => '3498db',
    'collectionHeaderTextColor' => '000000',
	'collectionShareButtons' => '1',
    'collectionShareButtonsIconColor'  => 'rgba(52, 152, 219, 1)',
    'collectionShareButtonsIconHoverColor' => 'rgba(25, 118, 179, 1)',
    //Tags Cloud
    'tagsFilter' => '1',
    'tagCloudAll' => 'All',
    'tagCloudTextColor' => '000000',
    'tagCloudBgColor' => 'eeeeee',
    //Thumbnails
    'collectionThumbRecomendedWidth' => '300',
    'thumbSpacing' => '10',
    'collectionThumbHoverColor' => 'rgba(0, 0, 0, .7)',
    'collectionThumbContentBGColor' => 'rgba(245,245,245,1)',
    'collectionThumbTitleShow' => '1',
    'collectionThumbTitleColor' => 'rgba(255,255,255,1)',
    'collectionThumbFontSize' => '18',
    //Thumbnails Submenu
    'collectionThumbSubMenuBackgroundColor' => 'rgba(0, 0, 0, 0)',
    'collectionThumbSubMenuBackgroundColorOver' => 'rgba(0, 0, 0, 0.7)',
    'collectionThumbSubMenuIconColor'  => 'rgba(255, 255, 255, 1)',
    'collectionThumbSubMenuIconHoverColor' => 'rgba(255, 255, 255, 1)',
    'collectionInfoEnable'=>'1',
    'collectionItemDownload'=>'1',
    'collectionItemDiscuss'=>'1',
    'collectionSocialShareEnabled'=>'1',
    'collectionLikesEnabled'=>'1',
    //Modal Window
    'modaBgColor'=> 'rgba(0,0,0,0.9)',
    'modalInfoBoxBgColor' => 'rgba(255,255,255,1)',
    'modalInfoBoxTitleTextColor' => '000000',
    'shareTitlePlaceHolder' => 'Share',
    'modalInfoBoxTextColor' => '333333',
    'infoBarExifEnable'=> '1',
    'infoBarCountersEnable'=> '1',
    'infoBarDateInfoEnable'=> '1',
    // Slider Page
    'lightBoxEnable' => '1',
    'sliderPreloaderColor' =>'ffffff',
    'sliderBgColor' => 'rgba(0,0,0,1)',
    'sliderHeaderFooterBgColor' => '000000',
    'sliderNavigationColor' => 'rgba(0,0,0,1)',
    'sliderNavigationIconColor' => 'rgba(255,255,255,1)',
    'sliderItemTitleFontSize' => '24',
    'sliderItemTitleTextColor' => 'ffffff',
    'sliderThumbBarEnable' => '1',
    'sliderThumbBarHoverColor' => 'ffffff',
    'sliderThumbSubMenuBackgroundColor' => 'rgba(0,0,0,1)',
    'sliderThumbSubMenuBackgroundColorOver' => 'rgba(255,255,255,1)',
    'sliderThumbSubMenuIconColor' => 'rgba(255,255,255,1)',
    'sliderThumbSubMenuIconHoverColor' => 'rgba(0,0,0,1)',
    'sliderInfoEnable' => '1',
    'sliderItemDownload' => '1',
    'sliderItemDiscuss' => '1',
    'sliderSocialShareEnabled' => '1',
    'sliderLikesEnabled' => '1',
    // Custom CSS
    'customCSS' => ''
);
$options_tree = array(
    array('label' => 'Splash page (page with covers)',
        'fields' => array(
            'splashPreloaderColor' => array('label' => 'Preloader Color',
                'tag' => 'input',
                'attr' => 'type="text" data-type="color"',
                'text' => ''
            ),
            'coverHeight' => array('label' => 'Collection Cover Height',
		        'tag' => 'input',
		        'attr' => 'type="number" min="150" max="800"',
		        'text' => ''
	        ),
	        'coverWidth' => array('label' => 'Minimum Collection Cover Width',
		        'tag' => 'input',
		        'attr' => 'type="number" min="150" max="1500"',
		        'text' => ''
	        ),
        	'labelForNextButtonCategory' => array('label' => 'Label for Next Button (Categories List)',
		        'tag'   => 'input',
		        'attr'  => '',
		        'text'  => ''
	        ),
	        'labelForPrevButtonCategory' => array('label' => 'Label for Previous Button (Categories List)',
		        'tag'   => 'input',
		        'attr'  => '',
		        'text'  => ''
	        ),
	        'labelForNextButtonAlbum' => array('label' => 'Label for Next Button (Albums List)',
		        'tag'   => 'input',
		        'attr'  => '',
		        'text'  => ''
	        ),
	        'labelForPrevButtonAlbum' => array('label' => 'Label for Previous Button (Albums List)',
		        'tag'   => 'input',
		        'attr'  => '',
		        'text'  => ''
	        ),
            'coverTitleFontSize' => array('label' => 'Cover Title - font size',
                'tag' => 'input',
                'attr' => 'type="number" min="14" max="36" step="1"',
                'text' => ''
            ),
            'coverTitleTextColor' => array('label' => 'Cover Title - text color',
                'tag' => 'input',
                'attr' => 'type="text" data-type="rgba"',
                'text' => 'For Albums / Categories covers'
            ),
            'coverTitleTextColor2' => array('label' => 'Cover Title - counter color',
                'tag' => 'input',
                'attr' => 'type="text" data-type="rgba"',
                'text' => 'For Albums / Categories covers'
            ),
            'coverTitleBgColor' => array('label' => 'Cover Title - background color',
                'tag' => 'input',
                'attr' => 'type="text" data-type="rgba"',
                'text' => 'For Albums / Categories covers'
            ),
	        'coverDescriptionFontSize' => array('label' => 'Cover Description - font size',
		        'tag' => 'input',
		        'attr' => 'type="number" min="10" max="20" step="1"',
		        'text' => ''
	        ),
            'coverDescriptionTextColor' => array('label' => 'Cover Description - text color',
                'tag' => 'input',
                'attr' => 'type="text" data-type="rgba"',
                'text' => 'For Albums / Categories covers'
            ),
            'coverTagsTextColor' => array('label' => 'Tag Title - text color',
                'tag' => 'input',
                'attr' => 'type="text" data-type="color"',
                'text' => 'For Tags covers'
            ),
            'coverTagsBgColor' => array('label' => 'Tag Background color',
                'tag' => 'input',
                'attr' => 'type="text" data-type="color"',
                'text' => 'For Tags covers'
            ),
            'coverTagsBgColor2' => array('label' => 'Tag Background hover color',
                'tag' => 'input',
                'attr' => 'type="text" data-type="color"',
                'text' => 'For Tags covers'
            )
        )
    ),
    array('label' => 'Collection Page Settings',
        'fields' => array(
            'collectionBgColor' => array('label' => 'Collection Window color',
                'tag' => 'input',
                'attr' => 'type="text" data-type="color"',
                'text' => ''
            ),
            'collectionHeaderBgColor' => array('label' => 'Header background color',
                'tag' => 'input',
                'attr' => 'type="text" data-type="color"',
                'text' => ''
            ),
            'collectionPreloaderColor' => array('label' => 'Preloader Color',
                'tag' => 'input',
                'attr' => 'type="text" data-type="color"',
                'text' => 'Set custom color for gallery'
            ),
            'collectionHeaderTitleTextColor' => array('label' => 'Header Title - text color',
                'tag' => 'input',
                'attr' => 'type="text" data-type="color"',
                'text' => ''
            ),
            'collectionHeaderTextColor' => array('label' => 'Header description - text color',
                'tag' => 'input',
                'attr' => 'type="text" data-type="color"',
                'text' => ''
            ),
	        'collectionShareButtons' => array('label' => 'Show Share Buttons',
		        'tag' => 'checkbox',
		        'attr' => 'data-watch="change"',
		        'text' => ''
	        ),
            'collectionShareButtonsIconColor' => array('label' => 'Share button Icon color',
                'tag' => 'input',
                'attr' => 'type="text" data-type="rgba" data-collectionShareButtons="is:1"',
                'text' => ''
            ),
            'collectionShareButtonsIconHoverColor' => array('label' => 'Share button Icon Hover color',
                'tag' => 'input',
                'attr' => 'type="text" data-type="rgba" data-collectionShareButtons="is:1"',
                'text' => ''
            ),
        )
    ),
    array('label' => 'Tags Filter',
        'fields' => array(
            'tagsFilter' => array('label' => 'Tags Cloud enable',
                'tag' => 'checkbox',
                'attr' => 'data-watch="change"',
                'text' => 'Add tags filter for selected collection'
            ),
            'tagCloudAll' => array('label' => 'Tag ALL - name',
                'tag' => 'input',
                'attr' => 'data-tagsFilter="is:1"',
                'text' => ''
            ),
            'tagCloudTextColor' => array('label' => 'Text color',
                'tag' => 'input',
                'attr' => 'type="text" data-type="color" data-tagsFilter="is:1"',
                'text' => 'Tag button'
            ),
            'tagCloudBgColor' => array('label' => 'Background color',
                'tag' => 'input',
                'attr' => 'type="text" data-type="color" data-tagsFilter="is:1"',
                'text' => 'Tag button'
            )
        )
    ),
    array('label' => 'Collection Thumbnails Settings',
        'fields' => array(
            'collectionThumbRecomendedWidth' => array('label' => 'Thumbnail - desired Width',
                'tag' => 'input',
                'attr' => 'type="number" min="100" max="500"',
                'text' => ''
            ),
            'thumbSpacing' => array('label' => 'Space between thumbnails',
                'tag' => 'input',
                'attr' => 'type="number" min="0" max="100"',
                'text' => ''
            ),
            'collectionThumbHoverColor' => array('label' => 'Hover color',
                'tag' => 'input',
                'attr' => 'type="text" data-type="rgba"',
                'text' => ''
            ),
            'collectionThumbTitleShow' => array('label' => 'Title',
                'tag' => 'checkbox',
                'attr' => 'data-watch="change"',
                'text' => ''
            ),
            'collectionThumbTitleColor' => array('label' => 'Title Text color',
                'tag' => 'input',
                'attr' => 'type="text" data-type="rgba" data-collectionThumbTitleShow="is:1"',
                'text' => ''
            ),
            'collectionThumbFontSize' => array('label' => 'Title Font size',
                'tag' => 'input',
                'attr' => 'type="number" min="11" max="24" step="1" data-collectionThumbTitleShow="is:1"',
                'text' => ''
            ),
            'collectionThumbSubMenuBackgroundColor' => array('label' => 'Submenu button color',
                'tag' => 'input',
                'attr' => 'type="text" data-type="rgba"',
                'text' => ''
            ),
            'collectionThumbSubMenuIconColor' => array('label' => 'Submenu button Icon color',
                'tag' => 'input',
                'attr' => 'type="text" data-type="rgba"',
                'text' => ''
            ),
            'collectionThumbSubMenuBackgroundColorOver' => array('label' => 'Submenu button Hover color',
                'tag' => 'input',
                'attr' => 'type="text" data-type="rgba"',
                'text' => ''
            ),
            'collectionThumbSubMenuIconHoverColor' => array('label' => 'Submenu button Icon Hover color',
                'tag' => 'input',
                'attr' => 'type="text" data-type="rgba"',
                'text' => ''
            ),
            'collectionInfoEnable' => array('label' => 'Info Button',
                'tag' => 'checkbox',
                'attr' => '',
                'text' => ''
            ),
            'collectionItemDownload' => array('label' => 'Download Button',
                'tag' => 'checkbox',
                'attr' => '',
                'text' => ''
            ),
            'collectionItemDiscuss' => array('label' => 'Discuss Button',
                'tag' => 'checkbox',
                'attr' => '',
                'text' => ''
            ),
            'collectionSocialShareEnabled' => array('label' => 'Share Button',
                'tag' => 'checkbox',
                'attr' => '',
                'text' => ''
            ),
            'collectionLikesEnabled' => array('label' => 'Likes Button',
                'tag' => 'checkbox',
                'attr' => '',
                'text' => ''
            )
        )
    ),
    array('label' => 'Modal Window Settings (Item Info & Share)',
        'fields' => array(
            'modaBgColor' => array('label' => 'Overlap Color',
                'tag' => 'input',
                'attr' => 'type="text" data-type="rgba"',
                'text' => ''
            ),
            'modalInfoBoxBgColor' => array('label' => 'Info Bar Color',
                'tag' => 'input',
                'attr' => 'type="text" data-type="rgba"',
                'text' => ''
            ),
            'modalInfoBoxTitleTextColor' => array('label' => 'Info Bar Title text Color',
                'tag' => 'input',
                'attr' => 'type="text" data-type="color"',
                'text' => ''
            ),
            'shareTitlePlaceHolder' => array('label' => 'Share bar name',
                'tag' => 'input',
                'attr' => '',
                'text' => ''
            ),
            'modalInfoBoxTextColor' => array('label' => 'Info Bar Text Color',
                'tag' => 'input',
                'attr' => 'type="text" data-type="color"',
                'text' => ''
            ),
            'infoBarExifEnable' => array('label' => 'Show Exif Data',
                'tag' => 'checkbox',
                'attr' => 'data-watch="change"',
                'text' => ''
            ),
            'infoBarCountersEnable' => array('label' => 'Show View/Likes/Comments',
                'tag' => 'checkbox',
                'attr' => 'data-watch="change"',
                'text' => ''
            ),
            'infoBarDateInfoEnable' => array('label' => 'Show item date',
                'tag' => 'checkbox',
                'attr' => 'data-watch="change"',
                'text' => ''
            )
        )
    ),
    array('label' => 'Lightbox Settings',
        'fields' => array(
            'lightBoxEnable' => array('label' => 'Lightbox',
                'tag' => 'checkbox',
                'attr' => '',
                'text' => 'Show the item in the Lightbox by clicking on the thumbnail'
            ),
            'sliderPreloaderColor' => array('label' => 'Preloader Color',
                'tag' => 'input',
                'attr' => 'type="text" data-type="color"',
                'text' => ''
            ),
            'sliderBgColor' => array('label' => 'Background color',
                'tag' => 'input',
                'attr' => 'type="text" data-type="rgba"',
                'text' => ''
            ),
            'sliderHeaderFooterBgColor' => array('label' => 'Header & Footer background color',
                'tag' => 'input',
                'attr' => 'type="text" data-type="color"',
                'text' => 'Gradient color'
            ),
            'sliderNavigationColor' => array('label' => 'Navigation button color',
                'tag' => 'input',
                'attr' => 'type="text" data-type="rgba"',
                'text' => ''
            ),
            'sliderNavigationIconColor' => array('label' => 'Navigation button Icons color',
                'tag' => 'input',
                'attr' => 'type="text" data-type="rgba"',
                'text' => ''
            ),
            'sliderItemTitleFontSize' => array('label' => 'Item Title - font Size',
                'tag' => 'input',
                'attr' => 'type="number" min="11" max="34" step="1"',
                'text' => ''
            ),
            'sliderItemTitleTextColor' => array('label' => 'Item Title text color',
                'tag' => 'input',
                'attr' => 'type="text" data-type="color"',
                'text' => ''
            ),
            'sliderThumbBarEnable' => array('label' => 'Show Items Thumbnails',
                'tag' => 'checkbox',
                'attr' => 'data-watch="change"',
                'text' => ''
            ),
            'sliderThumbBarHoverColor' => array('label' => 'Thumbnails Border Color (select mode)',
                'tag' => 'input',
                'attr' => 'type="text" data-type="color" data-sliderThumbBarEnable="is:1"',
                'text' => ''
            ),
            'sliderThumbSubMenuBackgroundColor' => array('label' => 'Item Submenu Button color',
                'tag' => 'input',
                'attr' => 'type="text" data-type="rgba"',
                'text' => ''
            ),
            'sliderThumbSubMenuIconColor' => array('label' => 'Item Submenu Button Icon color',
                'tag' => 'input',
                'attr' => 'type="text" data-type="rgba"',
                'text' => ''
            ),
            'sliderThumbSubMenuBackgroundColorOver' => array('label' => 'Item Submenu Button color (over)',
                'tag' => 'input',
                'attr' => 'type="text" data-type="rgba"',
                'text' => ''
            ),
            'sliderThumbSubMenuIconHoverColor' => array('label' => 'Item Submenu Button Icon color (over)',
                'tag' => 'input',
                'attr' => 'type="text" data-type="rgba"',
                'text' => ''
            ),
            'sliderInfoEnable' => array('label' => 'Item Info button',
                'tag' => 'checkbox',
                'attr' => 'data-watch="change"',
                'text' => ''
            ),
            'sliderItemDownload' => array('label' => 'Item Download button',
                'tag' => 'checkbox',
                'attr' => 'data-watch="change"',
                'text' => ''
            ),
            'sliderItemDiscuss' => array('label' => 'Item Discuss button',
                'tag' => 'checkbox',
                'attr' => 'data-watch="change"',
                'text' => ''
            ),
            'sliderSocialShareEnabled' => array('label' => 'Item Share button',
                'tag' => 'checkbox',
                'attr' => 'data-watch="change"',
                'text' => ''
            ),
            'sliderLikesEnabled' => array('label' => 'Item Like button',
                'tag' => 'checkbox',
                'attr' => 'data-watch="change"',
                'text' => ''
            )
        )
    ),
    array('label' => 'Advanced Settings',
        'fields' => array('customCSS' => array('label' => 'Custom CSS',
            'tag' => 'textarea',
            'attr' => 'cols="20" rows="10"',
            'text' => 'You can enter custom style rules into this box if you\'d like. IE: <i>a{color: red !important;}</i>
                                                                      <br />This is an advanced option! This is not recommended for users not fluent in CSS... but if you do know CSS, 
                                                                      anything you add here will override the default styles'
        )
            /*,
            'loveLink' => array(
                'label' => 'Display LoveLink?',
                'tag' => 'checkbox',
                'attr' => '',
                'text' => 'Selecting "Yes" will show the lovelink icon (codeasily.com) somewhere on the gallery'
            )*/
        )
    )
);