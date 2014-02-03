<?php

$dir = realpath(dirname( __FILE__ ) . '/uploads');

if ( !empty( $_FILES ) ) {

    $tempPath = $_FILES[ 'file' ][ 'tmp_name' ];
    $uploadPath = $dir . '/' . $_FILES[ 'file' ][ 'name' ];

    if(strpos($uploadPath, $dir) === -1) {
        header("HTTP/1.0 400 Bad Request");
        exit;
    }
    
    move_uploaded_file( $tempPath, $uploadPath );

    $answer = array( 'answer' => 'File transfer completed' );
    $json = json_encode( $answer );

    echo $json;

} else {

    echo 'No files';

}

?>