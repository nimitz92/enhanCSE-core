<?php 
require_once('../../init.php');
require_once(SBKERNEL);
require_once(SBCOMLOADER);

$cl = new ComponentLoader();
$op = $cl->load("session.get", ECROOT);

$kernel = new ServiceKernel();
$kernel->start($op);

?>