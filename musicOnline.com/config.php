<?php

define('SERVER', 'LOCALHOST');
define('USERNAME', 's2264629');
define('PASSWORD', 'QfO3spxx');
define('DBNAME', 's2264629_musicOnline'); 
                    //define('USERNAME', 's2264629');
                    //define('PWRD', 'securepassword');
                    //define('HOSTNAME', 'LOCALHOST');
                    //define('DBNAME', 's2264629_EqDesign');


$dbConnect = @mysqli_connect(SERVER, USERNAME, PASSWORD, DBNAME) OR die('could not connect'. mysqli_connect_error());

?>