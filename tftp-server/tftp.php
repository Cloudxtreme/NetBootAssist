<?php
date_default_timezone_set('Europe/Amsterdam');

require_once("lib/tftpserver.php");

class FileTFTPServer extends TFTPServer
{
  private $_root;
  private $_debug;

  function __construct($server_url, $root = null, $rw = false, $debug = false)
  {
    parent::__construct($server_url);
    $this->_root = $root;
    $this->_rw = $rw;
    $this->_debug = $debug;
  }

  private function log($peer, $level, $message)
  {
    echo
      date("H:i:s") . " " .
      $level . " " .
      $peer . " " .
      $message . "\n";
  }

  public function log_debug($peer, $message)
  {
    if(!$this->_debug)
      return;

    $this->log($peer, "D", $message);
  }

  public function log_info($peer, $message)
  {
    $this->log($peer, "I", $message);
  }

  public function log_warning($peer, $message)
  {
    $this->log($peer, "W", $message);
  }

  public function log_error($peer, $message)
  {
    $this->log($peer, "E", $message);
  }

  private function resolv_path($path)
  {
    if(strstr($path, "../") != false ||
       strstr($path, "/..") != false)
      return false;

    $abs = "{$this->_root}/$path";
    if(substr($abs, 0, strlen($this->_root)) != $this->_root)
      return false;

    return $abs;
  }

  public function exists($peer, $filename)
  {
	return true;
	/*
    $path = $this->resolv_path($filename);
    if($path === false)
      return false;

    if(!file_exists($path))
      return false;

    return true;
	*/
  }

  public function readable($peer, $filename)
  {
	return true;
    /*$path = $this->resolv_path($filename);
    if($path === false)
      return false;

    if(!file_exists($path))
      return false;

    if(!is_readable($path))
      return false;

    return true;*/
  }

  public function get($peer, $filename, $mode)
  {
    //$path = $this->resolv_path($filename);
    //if($path === false)
    //  return false;

   // $content = @file_get_contents($path);
   // if($content === false)
   //   return false;
		return file_get_contents('/home/netbootassist/tftp-server/files/undionly.kpxe');

    return false;
  }

  public function writable($peer, $filename)
  {
    //if(!$this->_rw)
    return false;
/*
    $path = $this->resolv_path($filename);
    if($path === false)
      return false;

    if(!file_exists($path))
      $path = dirname($path);

    if(!is_writable($path))
      return false;

    return true;*/
  }

  public function put($peer, $filename, $mode, $content)
  {
//    if(!$this->_rw)
      return false;

    /*$path = $this->resolv_path($filename);
    if($path === false)
      return false;

    @file_put_contents($path, $content);
	*/
  }
}

$ini_array = parse_ini_file("/home/netbootassist/settings.ini");
echo ;

$server = new FileTFTPServer("udp://".$ini_array['Hostname'].":69", "files/", false, false);
if(!$server->loop($error, null))
	die("$error\n");
/*
if(count($_SERVER["argv"]) < 3)
  die("Usage: {$_SERVER["argv"][0]} server_url root [user] [rw] [debug]\n");

$user = null;
if(isset($_SERVER["argv"][3]))
  $user = posix_getpwnam($_SERVER["argv"][3]);
$rw = false;
if(isset($_SERVER["argv"][4]))
  $rw = (bool)$_SERVER["argv"][4];
$debug = false;
if(isset($_SERVER["argv"][5]))
  $debug = (bool)$_SERVER["argv"][5];

$server = new FileTFTPServer($_SERVER["argv"][1],
			     $_SERVER["argv"][2],
			     $rw, $debug);
if(!$server->loop($error, $user))
  die("$error\n");

*/
