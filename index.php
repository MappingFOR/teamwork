<?php

	define('DEBUG', true );
	define('MODULES', 'modules/' );
	define('TXT_FILES', 'txt_files/' );

	include('module.class.php');
	
	if( is_dir( MODULES ) )
	{
		if ( $DIR = opendir( MODULES ) )
		{
			while( ( $FILE = readdir($DIR) ) !== false )
			{
				if( $FILE != '.' && $FILE != '..' )
				include( MODULES . $FILE );
			}
			
			closedir( $DIR );
		}
	}
	
	$MODULES = ARRAY();
	
	foreach( get_declared_classes() as $CLASS ) {
		if( get_parent_class( $CLASS ) == 'MODULE' ) {
			$MODULES[] = new $CLASS;
		}
	}
	
	foreach( $MODULES as $MODULE ) {
		$MODULE->register();
	}
	
	if( DEBUG ) {
		$LOG = array();
		
		foreach( $MODULES as $MODULE ) {
			$LOG[ get_class( $MODULE ) ] = $MODULE->getLog();
		}
		
		print '<pre>';
		print_r( $LOG );
		print '</pre>';
	}

?>