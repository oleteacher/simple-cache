<?php
$cache_ext   = '.html'; //The cached file extension - can be htom or php
$cache_time   = 3600;  //Cache file expiry in seconds (1 hr = 3600 sec)
$cache_folder   = 'cache/'; //Folder to store the cache files
$dynamic_url   = 'https://'.$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . $_SERVER['QUERY_STRING']; // Requested full dynamic page URL
$cache_file   = $cache_folder.md5($dynamic_url).$cache_ext; // Construct a cache file
if (file_exists($cache_file) && time() - $cache_time < filemtime($cache_file)) { //Check Cache file exist and it's not expired.
  ob_start('ob_gzhandler'); //Turn on output buffering with "ob_gzhandler" for compressed page with gzip.
  readfile($cache_file); //Read Cache file
  echo '<!-- qiksoft.com cached page - '.date('l jS \of F Y h:i:s A', filemtime($cache_file)).', Page : '.$dynamic_url.' -->';
  ob_end_flush(); //Flush and turn off output buffering
  exit(); //No need to proceed further, exit the flow.
}
ob_start('ob_gzhandler'); //Turn on output buffering with gzip compression.
?>
