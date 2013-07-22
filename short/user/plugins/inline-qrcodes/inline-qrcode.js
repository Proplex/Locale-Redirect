
function inline_qr_code( url ) {
        

		if ( !( typeof url === 'undefined' ) || url ) {
			var qrcimg = url;
		}
		else {
			url = ( url == null ? $( '#copylink' ).val() : url );
			var baseurl = urlofdoc();
			var qrcimg =  baseurl + 'images/qrc' + $.md5(url) + '.png';
		}
		
		//var mybaseurl = $(location).attr('protocol') + "//" + $(location).attr('host');
		//feedback( 'My url ' + qrcimg, 'success' ); 
                    
		var insertimg = "<div id='qrcode' class='share'><img id='myid' src='" + qrcimg + "' /></div>"
					
		if ( $( '#qrcode' ).length > 0 )
			$( '#qrcode' ).remove( );
					
			$( "#shareboxes" ).append( insertimg );        // Append new elements
			$( "div#qrcode img" ).css( "width", "100px" );
			$( "div#qrcode img" ).css( "height", "100px" );
}

function urlofdoc ( ) {

			var scriptElements = document.getElementsByTagName('script');
			var i, element, myfile;

			for( i = 0; element = scriptElements[i]; i++ ) {
			
				myfile = element.src;
				
				if( myfile.indexOf('inline-qrcode.js') >= 0 ) {
								var myurl = myfile.substring( 0, myfile.indexOf( 'inline-qrcode.js' ) );
				}
			}
		return myurl;
}
						
			
$(document).ready( function( ){
    // Share button behavior
    $( '.button_share' ).click( function( ){
        inline_qr_code( );
    });
					
	// Tab behavior on stats page
    $('a[href=#stat_tab_share]').click( function( ){
        inline_qr_code( );
    });
                  
    //inline_qr_code();
});

