<?php
/*
Plugin Name: Inline QRCodes
Plugin URI: http://techlister.com
Description: Inline Qrcodes
Version: 1.3
Author: Savoul Pelister
Author URI: http://anim.me
*/

// No direct call
if( !defined( 'YOURLS_ABSPATH' ) ) die();

//include qrcode library
require_once( dirname(__FILE__).'/phpqrcode/qrlib.php' );


//set QRCode images Directory
$QRC_DIR = dirname(__FILE__).'/images/';

//check for the first time if the directory exists, if not lets create it.
create_imgdir( $QRC_DIR );

//add the filters and action to trigger the QRcode generation.		
yourls_add_action( 'html_head', 'inline_qr_js' );
yourls_add_filter( 'add_new_link', 'inline_qr_add_url' );
yourls_add_filter ( 'pre_edit_link' , 'inline_qr_edit_url' );
yourls_add_action ( 'delete_link' , 'inline_qr_delete_url' );
yourls_add_filter( 'share_box_data', 'inline_qr_sharebox' );

//insert the JS and CSS files to head.
function inline_qr_js( ) {
	
	$md5hash = "<script src=\"". yourls_plugin_url( dirname( __FILE__ ) ). "/jquery.md5.js\" type=\"text/javascript\"></script>" ;
	$qrcodejs = "<script src=\"". yourls_plugin_url( dirname( __FILE__ ) ). "/inline-qrcode.js\" type=\"text/javascript\"></script>" ;
	$customcss = "<link rel=\"stylesheet\" href=\"". yourls_plugin_url( dirname( __FILE__ ) ) . "/custom.css\" type=\"text/css\" />";

	echo $md5hash;
	echo $qrcodejs; 
	echo $customcss;

}

//Generate QR Code for shorturls generated before plugin installation.
function inline_qr_sharebox( $data ) {
            
			$shorturl = $data['shorturl'];
            			
			$QRC_DIR = dirname(__FILE__).'/images/';
			
				create_imgdir( $QRC_DIR );
				
			$filename = $QRC_DIR.'qrc'.md5($shorturl).'.png';
			
			$imgname = yourls_plugin_url( dirname( __FILE__ ) ).'/images/'.basename( $filename );
			
			$data['qrcimg'] = $imgname;
			
			if ( !file_exists( $filename ) )
				QRcode::png( $shorturl, $filename, 'H', 5, 2 );
			
			// required for direct call to yourls_add_new_link() which does not fire the javascript - lets do it manually
			$data['qrimage'] = "<script>inline_qr_code( '$imgname' );</script>";		
			
            return $data;
} 

//Generate QRCode for new url added.
function inline_qr_add_url( $data ) {
            
			$shorturl = $data['shorturl'];
			
			$QRC_DIR = dirname(__FILE__).'/images/';
			
				create_imgdir( $QRC_DIR );

			$filename = $QRC_DIR.'qrc'.md5($shorturl).'.png';
			
			$imgname = yourls_plugin_url( dirname( __FILE__ ) ).'/images/'.basename( $filename );
			
			$data['qrcimg'] = $imgname;
			
			QRcode::png( $shorturl, $filename, 'H', 5, 2 );
			
			$data['html'] .= "<script>inline_qr_code( '$imgname' );</script>";
			
			// required for direct call to yourls_add_new_link() which does not fire the javascript - lets do it manually
			$data['qrimage'] = "<script>inline_qr_code( '$imgname' );</script>";
						
            return $data;
}


//Generate new QRCode when the shorturl is edited.
function inline_qr_edit_url( $data ) {
		
		$keyword = $data[1];
		$newkeyword = $data[2];
		
		$QRC_DIR = dirname(__FILE__).'/images/';
			
				create_imgdir( $QRC_DIR );

			$oldfilename = $QRC_DIR.'qrc'.md5( YOURLS_SITE.'/'.$keyword ).'.png';
			if ( file_exists( $oldfilename ))
					unlink( $oldfilename );
				
			$filename = $QRC_DIR.'qrc'.md5( YOURLS_SITE.'/'.$newkeyword ).'.png';
			
			$imgname = yourls_plugin_url( dirname( __FILE__ ) ).'/images/'.basename( $filename );
			
		QRcode::png( YOURLS_SITE.'/'.$newkeyword, $filename, 'H', 5, 2 );
		
		return $data;
}


//Delete the QRCode when url is deleted.
function inline_qr_delete_url( $data ) {

		$keyword = $data[0];
		
		$QRC_DIR = dirname(__FILE__).'/images/';
		
		$filename = $QRC_DIR.'qrc'.md5( YOURLS_SITE.'/'.$keyword ).'.png';

		if ( file_exists( $filename ))
					unlink( $filename );		
			
		return $data;
}

function create_imgdir( $QRC_DIR ) {	
	
	if ( !file_exists( $QRC_DIR ) ) {
		mkdir( $QRC_DIR );
		chmod( $QRC_DIR, 0777 );
	}
	else
		return;
}
