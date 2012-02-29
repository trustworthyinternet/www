<?php

// File Location: /lib/config.php

/** 
 * Assign configuration variables
 *
 * @author Abdullah Yahya <abdullah747@gmail.com>
 *
 */

/* assign php configuration variables */
ini_set("track_errors", "1");                          // error tracking

/* assign base system constants */
define("SITE_URL", "");     						   // base site url
define("SITE_DIR", "/");                               // base site directory
define("BASE_DIR", $_SERVER["DOCUMENT_ROOT"]);         // base file directory
define("SELF", $_SERVER["PHP_SELF"]);                  // self file directive
define("FILEMAX", 1500000);                            // file size max

/* assign instance variables */
$ERRORS = array();                                     // errors array
$MESSAGES = array();                                   // messages array

?>
