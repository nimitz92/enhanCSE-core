<?php 
require_once('../../../../services/init.php');
require_once(SBKERNEL);
require_once(SBCOMLOADER);

$cl = new ComponentLoader();
$op = $cl->load("user.authenticate", ECROOT);

$kernel = new ServiceKernel();
$kernel->start($op);

?>
