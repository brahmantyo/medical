<?php
/** Development Environment **/
// when Set to false, no error will be throw out, but saved in temp/log.txt file.
define ('DEVELOPMENT_ENVIRONMENT',false);

/** Site Root **/
// Domain name of the site (no slash at the end!)
//define('SITE_ROOT' , 'http://You domain name');
define('SITE_ROOT' , 'http://localhost');
define ('DEFAULT_CONTROLLER', 'index');
define ('DEFAULT_ACTION', 'index');

//Time Zone
define('TIME_ZONE','Asia/Jakarta');

//Database
define('DB_ENGINE','Mysql');
define('HOST','localhost');
define('USERNAME','root');
define('PASSWORD','');
define('DB','medical');

define('APP_NAME','e-Medical');
define('APP_TITLE','Sistem Pengolahan Data dan Analisa Kesehatan');
define('PAGE_LENGTH',5);

//DIRECTORIES
define('LIBRARY_PATH',ROOT . DS . 'library' . DS); //Library Directories
define('CONTROLLER_PATH',ROOT . DS . 'controllers' . DS); //Controllers Directories
define('MODEL_PATH',ROOT . DS . 'models' . DS); //Models Directories
define('LIBRARY',ROOT . DS . 'library' . DS); //Library Directories

$path;
