<!--echo OK if deleted and FAIL if not-->
<?php
ob_end_clean();
echo $result ? 'OK' : 'FAIL';
die();
