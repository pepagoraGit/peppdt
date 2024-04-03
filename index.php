<?php
 /*** error reporting on ***/
 error_reporting(0);
 /*** define the site path ***/
 $site_path = realpath(dirname(__FILE__));
  /*** define the www path ***/
 $portalwwwroot='http://www.pepagora.com/';
 define ('__SITE_PATH', $site_path);
 define ('__WWW_PATH', $portalwwwroot);
 /*** include the init.php file ***/
 //include 'includes/webshowcase.php';
 include 'includes/init.php';
 /*** load the router ***/
 $registry->router = new router($registry);
 /*** set the controller path ***/
 $registry->router->setPath (__SITE_PATH . '/controller');
 /*** load up the template ***/
 $registry->template = new template($registry);
 /*** load up the model ***/
 $registry->mod = new mod($registry);
 /*** load the controller ***/
 $registry->router->loader();
?>

