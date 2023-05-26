<?php
date_default_timezone_set('Asia/Jakarta');
$now = date("Y-m-d H:i:s");
/**
 * Database connection setup
 */
 if (!$connection = new Mysqli("localhost", "root", "", "tes_bayt")) {
// if (!$connection = new Mysqli("mysql.idhostinger.com", "u502153432_mobil", "calysta", "u502153432_mobil")) {
  echo "<h3>ERROR: Koneksi database gagal!</h3>";
}
/**
 * Page initialize
 */
if (isset($_GET["page"])) {
  // $_PAGE = $_GET["page"];
  $_ADMINPAGE = $_GET["page"];
} else {
  // $_PAGE = "home";
  $_ADMINPAGE = "home";
}
/**
 * Page setup
 * @param page
 * @return page filename
 */
// function page($page) {
//   return "pelanggan/" . $page . ".php";
// }
/**
 * Page setup
 * @param page
 * @return page filename
 */
function adminPage($page) {
  return "page/" . $page . ".php";
}

/**
 * Alert notification
 * @param message, redirection
 * @return alert notify
 */
function alert($msg, $to = null) {
  $to = ($to) ? $to : $_SERVER["PHP_SELF"];
  return "<script>alert('{$msg}');window.location='{$to}';</script>";
}