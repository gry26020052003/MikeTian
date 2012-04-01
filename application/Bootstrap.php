<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap{
	
	protected function _initDb()
	{
		$db = Zend_Db::factory('Pdo_Mysql', array(
   		'host' => 'hci.cs.sfsu.edu',
 	    'username' => 'dat',
 	    'password' => 'tiantian',
    	'dbname'   => 'dat' ));	 	
	 	Zend_Registry::set('my_db', $db);
		Zend_Db_Table_Abstract::setDefaultAdapter($db);
	}
	
	
	protected function _initAutoload()
  {
		$autoloader = new Zend_Application_Module_Autoloader(array(
    			        'namespace' => 'Default_',
            			'basePath'  => APPLICATION_PATH,
     ));
    return $autoloader;
  }
}

