<?php

	define( 'DEBUG', false );
	define( 'LIBS', 'libs/' );
	define( 'CORE', 'core/' );
	define( 'MODULES', 'modules/' );
	define( 'TEMPLATES', 'templates/' );
	define( 'TXT_FILES', 'txt_files/' );

	include('module.class.php');
	
	foreach( array(LIBS, CORE, MODULES) as $DIR_PATH ) {
		if( is_dir( $DIR_PATH ) )	{
			if ( $DIR = opendir( $DIR_PATH ) ) {
				while( ( $FILE = readdir($DIR) ) !== false ) {
					if( $FILE != '.' && $FILE != '..' )
					include( $DIR_PATH . $FILE );
				}
				
				closedir( $DIR );
			}
		}
	}
	
	$MODULES = ARRAY();
	
	foreach( get_declared_classes() as $CLASS ) {
		if( get_parent_class( $CLASS ) == 'MODULE' ) {
			$MODULES[$CLASS] = new $CLASS;
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
		print_r( $_SESSION );
		print '</pre>';
	}
	
	foreach( $_GET as $MODULE => $PARAMS ) {
		if( isSet( $MODULES[ $MODULE ] ) ) {
			$MODULES[ $MODULE ]->run();
		}
	}
	
	$Template->render();

?>