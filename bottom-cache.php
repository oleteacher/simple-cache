<?php
if (!is_dir($cache_folder)) { //Create the cace folder if not already created
    mkdir($cache_folder);
}
$fp = fopen($cache_file, 'w');  //Open file for writing
fwrite($fp, ob_get_contents()); //Write contents of the output buffer in cache file
fclose($fp); //Close file pointer
ob_end_flush(); //Flush and turn off output buffering
?>
