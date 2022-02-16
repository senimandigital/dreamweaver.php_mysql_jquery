<?php require_once('senimandigital_mysql_to_mysqli.php');
ob_start(); // awal script untuk menipu html editor selama proses ngoding, dalam praktek sebenarnya ini; ?>
<link href="http://assets.senimandigital.kom/SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css" />
<link href="http://assets.senimandigital.kom/css/style.css" rel="stylesheet" type="text/css" />
<?php
ob_get_contents(); ob_end_clean();
// $ram = memory_get_usage();
if (!isset($_SESSION)) { session_start(); $session_id =  session_id(); unset($_SESSION['anggota_id']);  }

if (defined('senimandigital')) goto endsenimandigital; define('senimandigital', true);
//$microtime_start = microtime(true);

# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_senimandigital = "localhost";
$database_senimandigital = "database_name";
$username_senimandigital = "root";
$password_senimandigital = "";
$senimandigital = mysql_pconnect($hostname_senimandigital, $username_senimandigital, $password_senimandigital) or trigger_error(mysql_error(), E_USER_ERROR);

// $WEBSITE['SERVER']['USERNAME'] = get_current_user();
// print_r(get_loaded_extensions());
// print_r(get_extension_funcs("xml"));

$_SERVER['BACKEND']['FRAMEWORK']   = 'Senimandigital PHP MySQL';
$_SERVER['BACKEND']['DEVELOPMENT'] = '';

$_SERVER['FRONTEND']['FRAMEWORK']   = 'jQuery UI';
$_SERVER['FRONTEND']['DEVELOPMENT'] = '';

$WEBSITE['HOSTING']['ROOT']              = 'D:/Online/Offline/courier.business/';
$WEBSITE['HOSTING']['ASSETS']            = 'D:/server/php/senimandigital/assets/';
$WEBSITE['HOSTING']['TEMPLATES']         = 'D:/Online/Offline/courier.business/Templates/';

// webtool: http://tool.senimandigital.com/string_perataan.php
// /* start manual domain configuration 
$WEBSITE['DOMAIN']['ROOT']      = 'courier.business/';
$WEBSITE['DOMAIN']['SITE']      = 'http://courier.business/';
$WEBSITE['DOMAIN']['ASSETS']    = 'http://assets.senimandigital.kom/';
$WEBSITE['DOMAIN']['ANGGOTA']   = 'http://courier.business/anggota/';
$WEBSITE['DOMAIN']['GAMBAR']    = 'http://courier.business/gambar/';
$WEBSITE['DOMAIN']['TEMPLATES'] = 'http://courier.business/Templates/';

 $WEBSITE['META']['TITLE']               = 'courier.business';

if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "")
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }
 
  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);
 
  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

//stoping xss,union and clike injection
if  (!function_exists('stripos')) {
     function stripos_clone($haystack, $needle, $offset=0) {
      $return = strpos(strtoupper($haystack), strtoupper($needle), $offset);
      if ($return === false) { return false; } else { return true; }
     }
    }
else{ // But when this is PHP5, we use the original function
     function stripos_clone($haystack, $needle, $offset=0) {
               $return = stripos($haystack, $needle, $offset=0);
                if  ($return === false) { return false; }
                else{ return true; }
              }
   }

if (isset($_SERVER['QUERY_STRING']) && (!stripos_clone($_SERVER['QUERY_STRING'], "ad_click")))
   {
    $queryString = $_SERVER['QUERY_STRING'];
    if (stripos_clone($queryString,'%20union%20') OR stripos_clone($queryString,'/*') OR stripos_clone($queryString,'*/union/*') OR stripos_clone($queryString,'c2nyaxb0') OR stripos_clone($queryString,'+union+') OR (stripos_clone($queryString,'cmd=') AND !stripos_clone($queryString,'&cmd')) OR (stripos_clone($queryString,'exec') AND !stripos_clone($queryString,'execu')) OR stripos_clone($queryString,'concat'))
       {
        die('Illegal Operation');
       }
   }

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck']))
   {
    $_SESSION['PrevUrl'] = $_GET['accesscheck'];
   }

if (isset($_POST['username']))
   {
    $loginUsername = $_POST['username'];
    $password      = md5($_POST['password']);
    $MM_fldUserAuthorization = "";
    $MM_redirectLoginSuccess = "#";
    $MM_redirectLoginFailed  = "#";
    $MM_redirecttoReferrer   = true;
    mysql_select_db($database_senimandigital, $senimandigital);

    $LoginRS__query=sprintf("SELECT anggota_username,
                                    anggota_password
                             FROM   anggota
                             WHERE  anggota_username='%s'
                             AND    anggota_password='%s'",
    get_magic_quotes_gpc() ? $loginUsername : addslashes($loginUsername), get_magic_quotes_gpc() ? $password : addslashes($password));

    $LoginRS        = mysql_query($LoginRS__query, $senimandigital) or die(mysql_error());
    $loginFoundUser = mysql_num_rows($LoginRS);
    if ($loginFoundUser)
       {
         $loginStrGroup = "";
         $_SESSION['MM_Username']  = $loginUsername;
         $_SESSION['MM_UserGroup'] = $loginStrGroup;
         $_SESSION['MM_SessionId'] = $session_id;

         $sessionusername_anggota = "-1";
         if (isset($_SESSION['MM_Username']))
            {
             $sessionusername_anggota = (get_magic_quotes_gpc()) ? $_SESSION['MM_Username'] : addslashes($_SESSION['MM_Username']);
            }
         mysql_select_db($database_senimandigital, $senimandigital);
         $query_anggota = sprintf("SELECT anggota.anggota_id, anggota_level.anggota_level_alias FROM anggota INNER JOIN anggota_level ON anggota_level.anggota_level_id = anggota.anggota_level_id WHERE anggota.anggota_username = '%s'", $sessionusername_anggota);
         $anggota = mysql_query($query_anggota, $senimandigital) or die(mysql_error());
         $row_anggota = mysql_fetch_assoc($anggota);
         $totalRows_anggota = mysql_num_rows($anggota);

         mysql_select_db($database_senimandigital, $senimandigital);
         $query_ambil_tanggal = "SELECT UNIX_TIMESTAMP(DATE_ADD(NOW(), INTERVAL 1 HOUR)) AS kadaluarsa";
         $ambil_tanggal = mysql_query($query_ambil_tanggal, $senimandigital) or die(mysql_error());
         $row_ambil_tanggal = mysql_fetch_assoc($ambil_tanggal);
         $totalRows_ambil_tanggal = mysql_num_rows($ambil_tanggal);

         $sessionid_session = "-1";
         if (isset($session_id))
            {
             $sessionid_session = (get_magic_quotes_gpc()) ? $session_id : addslashes($session_id);
            }
         mysql_select_db($database_senimandigital, $senimandigital);
         $query_session = sprintf("SELECT sessions.session_id FROM sessions WHERE sessions.session_id = '%s'", $sessionid_session);
         $session = mysql_query($query_session, $senimandigital) or die(mysql_error());
         $row_session = mysql_fetch_assoc($session);
         $totalRows_session = mysql_num_rows($session);

         if ($totalRows_session == 0)
            {
             $sessionSQL = "INSERT sessions
                            SET    session_expiration = '". $row_ambil_tanggal['kadaluarsa'] ."',
                                   session_domain     = 'www',
                                   session_id         = '". $session_id ."',
                                   anggota_id         = '". $row_anggota['anggota_id'] ."'
                           ";
            }
         if ($totalRows_session > 0)
            {
             $sessionSQL = "UPDATE sessions
                            SET    session_expiration = '". $row_ambil_tanggal['kadaluarsa'] ."',
                                   session_domain     = 'www',
                                   anggota_id         = '". $row_anggota['anggota_id'] ."'
                            WHERE  session_id         = '". $session_id ."'
                           ";
            }
         mysql_select_db($database_senimandigital, $senimandigital);
         $Result1 = mysql_query($sessionSQL, $senimandigital) or die(mysql_error());
         $_SESSION['MM_UserGroup'] = $row_anggota['anggota_level_alias'];

         if (isset($_SESSION['PrevUrl']) && true)
            {
             $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];
            }
         header("Location: " . $MM_redirectLoginSuccess );
        }
    else{
         header("Location: ". $MM_redirectLoginFailed );
        }
   }

if ((isset($_GET['Logout'])) && ($_GET['Logout']=="true"))
   {
    $sessionusername_anggota_login = "-1";
    if  (isset($_SESSION['MM_Username']))
        {
         $sessionusername_anggota_login = (get_magic_quotes_gpc()) ? $_SESSION['MM_Username'] : addslashes($_SESSION['MM_Username']);
        }
    mysql_select_db($database_senimandigital, $senimandigital);
    $query_anggota_login = sprintf("SELECT anggota.anggota_id FROM anggota WHERE anggota.anggota_username = '%s'", $sessionusername_anggota_login);
    $anggota_login = mysql_query($query_anggota_login, $senimandigital) or die(mysql_error());
    $row_anggota_login = mysql_fetch_assoc($anggota_login);
    $totalRows_anggota_login = mysql_num_rows($anggota_login);

    $deleteSQL = "DELETE
                  FROM  sessions
                  WHERE anggota_id = '". $row_anggota_login['anggota_id'] ."'
                 ";
    mysql_select_db($database_senimandigital, $senimandigital);
    $Result1 = mysql_query($deleteSQL, $senimandigital) or die(mysql_error());

    $_SESSION['MM_Username']  = NULL; unset($_SESSION['MM_Username']);
    $_SESSION['MM_UserGroup'] = NULL; unset($_SESSION['MM_UserGroup']);
    $_SESSION['PrevUrl']      = NULL; unset($_SESSION['PrevUrl']);
    $_SESSION['MM_SessionId'] = NULL; unset($_SESSION['MM_SessionId']);
    $_SESSION['anggota_id']   = NULL; unset($_SESSION['anggota_id']);
    $logoutGoTo = "". $WEBSITE['DOMAIN']['SITE'] ."";
    if ($logoutAction) { $logoutGoTo = $logoutAction; }
    if ($logoutGoTo)   { header("Location: $logoutGoTo"); exit; }
   }

if(isset($_SESSION['MM_Username']) && isset($_SESSION['MM_SessionId']))
  {
   $query_anggota = "SELECT anggota.anggota_id, anggota.anggota_realname
                     FROM   anggota
                     WHERE  anggota.anggota_username = '". $_SESSION['MM_Username'] ."'
                    ";
   mysql_select_db($database_senimandigital, $senimandigital);
   $anggota = mysql_query($query_anggota, $senimandigital) or die(mysql_error());
   $row_anggota = mysql_fetch_assoc($anggota);
   $totalRows_anggota = mysql_num_rows($anggota);

   if($totalRows_anggota > 0)
     {
      $query_session = "SELECT MAX(session_expiration) as session_expiration
                        FROM   sessions
                        WHERE  anggota_id = '". $row_anggota['anggota_id'] ."'
                       ";
      mysql_select_db($database_senimandigital, $senimandigital);
      $session = mysql_query($query_session, $senimandigital) or die(mysql_error());
      $row_session = mysql_fetch_assoc($session);
      $totalRows_session = mysql_num_rows($session);

      $query_session = "SELECT *
                        FROM  sessions
                        WHERE session_id         = '". $_SESSION['MM_SessionId'] ."'
                        AND   session_expiration > UNIX_TIMESTAMP(NOW())
                       ";
      mysql_select_db($database_senimandigital, $senimandigital);
      $session = mysql_query($query_session, $senimandigital) or die(mysql_error());
      $row_session = mysql_fetch_assoc($session);
      $totalRows_session = mysql_num_rows($session);

      if ($totalRows_session == 0)
         {
            unset($_SESSION['MM_Username']);
            unset($_SESSION['MM_UserGroup']);
            unset($_SESSION['PrevUrl']);
            unset($_SESSION['MM_SessionId']);
            $logoutGoTo = "". $WEBSITE['DOMAIN']['SITE'] ."";
            if($logoutGoTo) { header("Location: $logoutGoTo"); exit; }
         }

      if (($totalRows_session > 0) && ($row_session['anggota_id'] == $row_anggota['anggota_id']))
         {
          $query_ambil_tanggal = "SELECT UNIX_TIMESTAMP(DATE_ADD(NOW(), INTERVAL 1 HOUR)) AS kadaluarsa";
          mysql_select_db($database_senimandigital, $senimandigital);
          $ambil_tanggal = mysql_query($query_ambil_tanggal, $senimandigital) or die(mysql_error());
          $row_ambil_tanggal = mysql_fetch_assoc($ambil_tanggal);
          $totalRows_ambil_tanggal = mysql_num_rows($ambil_tanggal);

          $updateSQL = "UPDATE sessions
                        SET    session_expiration = '". $row_ambil_tanggal['kadaluarsa'] ."'
                        WHERE  anggota_id         = '". $row_anggota['anggota_id'] ."'
                       ";
          mysql_select_db($database_senimandigital, $senimandigital);
          $Result1 = mysql_query($updateSQL, $senimandigital) or die(mysql_error());
         }
     $row_anggota_session       = $row_anggota;
     $totalRows_anggota_session = $totalRows_session;
    }
  }

if (strpos($_SERVER['PHP_SELF'], 'Connections/senimandigital.php') > 0) { goto endsenimandigital; exit; }

/* @ Awal - Jika hanya merequest element, untuk kasus external request @ */ 
if     ($_GET['getElementById']) {
ob_start(); 
if (strtolower($_SERVER['SCRIPT_FILENAME']) == strtolower($WEBSITE['HOSTING']['ROOT'] .'index.php')) { 
include $WEBSITE['HOSTING']['TEMPLATES'] .'php/home.php';  } else { include $_SERVER['SCRIPT_FILENAME']; }
$WEBSITE['SCRIPT']['HTML'] = ob_get_contents(); ob_end_clean();
$dom = new DOMDocument();    $dom->loadHTML($WEBSITE['SCRIPT']['HTML']);   $xpath = new DOMXPath($dom);
echo $WEBSITE['SCRIPT']['HTML'] = $dom->getElementById($_GET['getElementById'])->C14N();
exit;
}
elseif ($_GET['getElementsByTagName']) {
ob_start(); 
if (strtolower($_SERVER['SCRIPT_FILENAME']) == strtolower($WEBSITE['HOSTING']['ROOT'] .'index.php')) { 
include $WEBSITE['HOSTING']['TEMPLATES'] .'php/home.php';  } else { include $_SERVER['SCRIPT_FILENAME']; }
$WEBSITE['SCRIPT']['HTML'] = ob_get_contents(); ob_end_clean();
$dom = new DOMDocument();    $dom->loadHTML($WEBSITE['SCRIPT']['HTML']);   $xpath = new DOMXPath($dom);
$WEBSITE['SCRIPT']['HTML'] = $dom->saveHTML($dom->getElementsByTagName('form')->item(0));
echo $WEBSITE['SCRIPT']['HTML'];
exit;
}
/* @ Akhir - Jika hanya merequest element untuk kasus external request @ */

// mendapatkan code pemrograman
if (isset($_GET['file_get_contents']) && $_SESSION['MM_UserGroup'] == 'admin') {
if (file_exists($WEBSITE['HOSTING']['ROOT'] . $_GET['file_get_contents'])) {
if (isset($_GET['htmlentities'])) {
echo htmlentities(file_get_contents($WEBSITE['HOSTING']['ROOT'] . $_GET['file_get_contents'])); 
} else {     echo file_get_contents($WEBSITE['HOSTING']['ROOT'] . $_GET['file_get_contents']); }
}
exit;
}

if (isset($_GET['raw'])) {
include $WEBSITE['HOSTING']['MODUL'] .'raw.php';
exit;
}

if (isset($_GET['TinyMCE'])) {
include $WEBSITE['HOSTING']['ROOT'] .'Templates/TinyMCE/index.php';
exit;
}

// Kita bisa menyuruh javascript untuk melakukan cURL tingkat tinggi tentunya dengan perantara php
if (isset($_GET['cURL'])) {
include $WEBSITE['HOSTING']['ROOT'] .'Templates/php/curl.php';
exit;
}

if (isset($_GET['magic']['shared'])) {
  $PARSE_QUERY_STRING = explode('?', $_GET['magic']['shared'] );;
  if (is_file($WEBSITE['HOSTING']['SHARED'] .'/'. $PARSE_QUERY_STRING[0])) {header('Access-Control-Allow-Origin: *');
	  parse_str($PARSE_QUERY_STRING[1], $_GET); /* trik: mendeklarasikan ulang nilai $_GET agar dapat dimengerti oleh file yang di include */	  
	  include $WEBSITE['HOSTING']['SHARED'] .'/'. $PARSE_QUERY_STRING[0] ;
  } else {  include $WEBSITE['HOSTING']['SHARED'] . key($magic_filename) .'/knowledge.knowledge_type=frontend_storage.php'; }
exit;
}
if ($_GET['magic']['command']) {
    include $WEBSITE['HOSTING']['ROOT'] .'assets/php/command.php';
	exit; 
}

if ($_GET['magic']['context']) {
    include $WEBSITE['HOSTING']['ROOT'] .'Templates/_context_menu/'. $_GET['magic']['context'] .'.php';
	exit; 
}
if (isset($_GET['magic']['dom']['form']['generator']['knowledge_id'])) {
 include $WEBSITE['HOSTING']['CMS'] .'form/insert_text.php'; exit;
}
if (isset($_GET['magic']['dom']['RecursiveDirectoryIterator'])) {
 include $WEBSITE['HOSTING']['ROOT'] .'Templates/php/directory_recursive_to_dom_list.php';
exit;
}
if (isset($_GET['magic']['dom']['list']['database']['schema'])) {
 include $WEBSITE['HOSTING']['ROOT'] .'assets/php/list_database_table.php'; exit;
}
if (isset($_GET['magic']['dom']['list']['command'])) {
 include $WEBSITE['HOSTING']['ROOT'] .'assets/php/dom_list_command.php'; exit;
}
if (isset($_GET['magic']['dom']['option']['table']['schema'])) {
 include $WEBSITE['HOSTING']['ASSETS'] .'option/ajax_option_table.php'; exit;
}
if (isset($_GET['magic']['dom']['option']['column']['schema'])) {
 include $WEBSITE['HOSTING']['ASSETS'] .'option/ajax_option_database_column.php'; exit;
}
if (isset($_GET['magic']['dom']['cms']['control'])) {
 include $WEBSITE['HOSTING']['ROOT'] .'assets/php/dom_cms_versi_element_kontrol_default.php'; exit;
}
if (isset($_GET['magic']['dom']['cms']['query']['select'])) { 
 include $WEBSITE['HOSTING']['ROOT'] .'assets/php/script_php_cms_versi_query.php'; exit;
}
if (isset($_GET['magic']['dom']['option']['cms_versi'])) {
 include $WEBSITE['HOSTING']['ROOT'] .'assets/php/dom_option_cms_versi_'. array_keys($_GET['magic']['dom']['option']['cms_versi'])[0] .'.php'; exit;
}

if (isset($_GET['magic']['image']['description'])) {
echo '<p>Gambar ukuran-nya tidak pasti, jika hanya untuk preview alangkah baiknya jika gambar diperkecil hingga ke-ukuran yang wajar maka loading akan lebih cepat dan bandwith lebih hemat.</p>';
exit;
}
if (isset($_GET['magic']['frontend']['jquery'])) {
echo '<p>Ngapain ngoding jquery secara manual, kita bisa mengenerate kode jquery secara otomatis</p>';
exit;
}
if (isset($_GET['magic']['frontend']['react'])) {
echo '<p>Ngapain ngoding react secara manual, kita bisa mengenerate kode react secara otomatis</p>';
exit;
}
if (isset($_GET['magic']['frontend']['vue'])) {
echo '<p>Ngapain ngoding vue secara manual, kita bisa mengenerate kode vue secara otomatis</p>';
exit;
}

if (isset($_GET['magic']['storage']['mysql']['update']['http_build_query'])) {
if ($_POST['save_style']) {
unset($_POST['save_style']);
parse_str($row_diagrams_contents['diagrams_contents'], $array_diagrams_contents);
$array_diagrams_contents = array_replace($array_diagrams_contents, $_POST);
$updateSQL = sprintf("UPDATE diagrams SET diagrams_contents=%s WHERE diagrams_id=%s",
GetSQLValueString(http_build_query($array_diagrams_contents), "text"),
GetSQLValueString($_GET['diagrams_id'], "int"));

mysql_select_db($database_senimandigital, $senimandigital);
$Result1 = mysql_query($updateSQL, $senimandigital) or die(mysql_error());
} // endif ($_POST) */
 print_r($_POST);
exit;
}

if (isset($_GET['magic']) && $_GET['magic'] == '') {
echo '<p>Anda sedang mencoba menggunakan magic parameter. Magic parameter adalah sebuah URL parameter yang memiliki fungsi khusus. 
Apabila Magic Parameter didefinisikan maka magic parameter ini akan mengambil alih pemroses dan membatalkan pemroses lain-nya.
Magic parameter mengemas ulang dan mendistribusikan css, dom, json dan xml ke browser.
Magic parameter ditulis dengan aturan seperti ini:</p>
<h5>?magic[ajax]</h5>
<p>Magic Ajax adalah situasi dimana kita membuat kontent yang rumit, ajax yang dipanggil juga berisi konsep ajax lagi.</p>

<h5>?magic[curl]</h5>
<p>Kita tentu saja tidak akan mengirimkan username dan password Internet Banking ke Browser, agar pengguna dapat melihat mutasi rekening kita. magic curl ini dimaksudkan
untuk menyediakan system dimana browser bisa memeriksa mutasi rekening hanya saja melalui prantara server. atau hal-hal semacam itulah-ya.</p>

<h5>?magic[dom]</h5>
<p>Magic Dom adalah situasi dimana kita hanya ingin mendapatkan kode html untuk komponen kecil, bisa berupa form, atau list tujuanya di includekan kedalam kode html.</p>

<h5><a href="?magic[html]">?magic[html]</a></h5>
<p>Magic html serupa dengan magic dom, bahkan serupa juga dengan magic iframe. Magic iframe turut serta meload header dan footer</p>

<h5>?magic[json]</h5>
<p>Magic JSON adalah cara mendapatkan kode JSON dari sebuah recordset, Magic JSON tentu saja mengikuti kriteria yang didefinisikan pada recordset apabila orang atau website luar berusaha mengakses kode
JSON melalui magic parameter maka kemungkinan tidak akan berhasil, namun jika menggunakan mode cURL itu dimungkinkan.</p>

<h5>?magic[xml]</h5>
<p>Magic XML adalah cara mendapatkan kode XML dari sebuah recordset,Magic XML tentu saja mengikuti kriteria yang didefinisikan pada recordset apabila orang atau website luar berusaha mengakses kode
JSON melalui magic parameter maka kemungkinan tidak akan berhasil, namun jika menggunakan mode cURL itu dimungkinkan.</p>

<h5>?magic[iframe]</h5>
<p>Magic iframe mungkin adalah yang paling sering digunakan, magic iframe dimaksudkan untuk dipanggil melalui iframe yang terdapat pada jendela popup atau dialog.</p>
	  
  <h5>?magic[webview]</h5>
	  <p>Magic webview dimaksudkan untuk dipanggil melalui webview yang terdapat pada jendela diberbagai aplikasi baik itu aplikasi desktop maupun aplikasi mobile.</p>
	  <p>Magic webview bisa dipanggil melalui jendela webview yang terdapat pada aplikasi Dreamweaver, ini memungkinkan kita bekerja di komputer lokal
	     namun menggunakan berbagai teknologi yang tersedia pada internet.</p>
<h3>Rehat sejanak</h3>
<p>Kenapa kita butuh magic parameter... ? karena sulit berbagi resource antar server bahkan antara subdomain yang satu dengan subdomain lain-nya meski itu pada website yang sama.
Dengan adanya magic parameter, berbagi resource di satu server dengan multi domain menjadi mudah untuk dilakukan. Setidaknya kita tidak dipusingkan dengan konfigurasi permision untuk
mengakses resource dari server kita sendiri.</p>';  exit;
}

// mendapatkan file json dan xml dari database
if ((isset($_GET['filetypejson']) && isset($_GET['tabel']) && is_array($_GET['where']))
or isset($_GET['magic']['json']['table'])
or isset($_GET['magic']['xml']['table'])) {
if ($_GET['magic']['json']['table']) { $_GET['tabel'] = $_GET['magic']['json']['table']; }
if ($_GET['magic']['xml']['table'])  { $_GET['tabel'] = $_GET['magic']['xml']['table']; }

$_SELECT = $_GET['select'] ? '`'. implode('`,`', $_GET['select']) .'`' : '*';
if (in_array($_GET['tabel'], array('cms_versi','knowledge'))) {
foreach($_GET['where'] as $field => $value) { $_WHERE[] = ' `'. $field .'` = \''. $value .'\''; }
if ($_WHERE){ $_WHERE = ' WHERE '. implode(' AND ', $_WHERE); };

mysql_select_db($database_senimandigital,  $senimandigital);
$query_show_datas = "SELECT ". $_SELECT ." FROM ". $_GET['tabel'] . $_WHERE;
$show_datas = mysql_query($query_show_datas, $senimandigital) or die(mysql_error());
$row_show_datas = mysql_fetch_assoc($show_datas);
$totalRows_show_datas = mysql_num_rows($show_datas);
if (isset($_GET['magic']['xml']['table'])) {
$xml = new SimpleXMLElement('<root/>');
do { // } while ($row_show_datas = mysql_fetch_assoc($show_datas));
$user = $xml->addChild( $_GET['magic']['xml']['table'] );
foreach ($row_show_datas as $key => $value) { $user->addChild($key, $value); }
} while ($row_show_datas = mysql_fetch_assoc($show_datas)); $rows = mysql_num_rows($show_datas); if($rows > 0) { mysql_data_seek($show_datas, 0); $row_show_datas = mysql_fetch_assoc($show_datas); }
header('Access-Control-Allow-Origin: *');
print $xml->asXML();
} else { 
do { // } while ($row_show_datas = mysql_fetch_assoc($show_datas));
$array_show_datas[] = $row_show_datas;
} while ($row_show_datas = mysql_fetch_assoc($show_datas)); $rows = mysql_num_rows($show_datas); if($rows > 0) { mysql_data_seek($show_datas, 0); $row_show_datas = mysql_fetch_assoc($show_datas); }
echo json_encode($array_show_datas); }
}
exit;
}

// Javascript tidak mau meload data dari server yang berbeda, dan salah satu cara mengakalinya ialah menggunakan php untuk meload content url yang dibutuhkan
if (isset($_GET['domain']) && isset($_GET['file_get_contents'])) {
   if (in_array(strtoupper($_GET['domain']), array_keys($WEBSITE['DOMAIN'])) ) { echo file_get_contents($WEBSITE['DOMAIN'][strtoupper($_GET['domain'])] . $_GET['file_get_contents']); }
exit;
}

if (isset($_GET['ajax']['options'])) {
if (file_exists($WEBSITE['HOSTING']['ASSETS'] . 'option/' . $_GET['ajax']['options'] )) {
	include $WEBSITE['HOSTING']['ASSETS'] . 'option/' . $_GET['ajax']['options'];
} else {
echo '<option title="file yang diminta tidak ditemukan: attribute [ajax-options] dan [this-options] ditangani dengan cara yang berbeda">-- Ajax Error --</option>';
}
exit; 
} /* if (isset($_GET['ajax']['options'])) { */

if ($_GET['ajax'] == 'insert') {
mysql_select_db($database_senimandigital,  $senimandigital);
$query_show_columns = "SHOW COLUMNS FROM ". $_GET['table'];
$show_columns = mysql_query($query_show_columns, $senimandigital) or die(mysql_error());
$row_show_columns = mysql_fetch_assoc($show_columns);
$totalRows_show_columns = mysql_num_rows($show_columns);

do { // } while ($row_show_columns = mysql_fetch_assoc($show_columns));
if ($row_show_columns['Extra'] == 'auto_increment') {
$auto_increment = $row_show_columns['Field'];
} else {
 $field[] = $row_show_columns['Field'];
 $field_string[] = '%s';
 if ($row_show_columns['Field'] == 'anggota_id') {
   $fiels_variabel[] = GetSQLValueString($_SESSION[$row_show_columns['Field']], "text");
 } else {
   $fiels_variabel[] = GetSQLValueString($_POST[$row_show_columns['Field']], "text");
 }
}
} while ($row_show_columns = mysql_fetch_assoc($show_columns)); $rows = mysql_num_rows($show_columns); if($rows > 0) { mysql_data_seek($show_columns, 0); $row_show_columns = mysql_fetch_assoc($show_columns); }
$fiels_variabel = implode(',', $fiels_variabel);
$_POST['cms_versi_fasilitas_tanggaljam'] = date('Y-m-d H:i:s');
  $insertSQL = "INSERT INTO `". $_GET['table'] ."` (". implode(', ', $field) .") VALUES (". $fiels_variabel .")";

  mysql_select_db($database_senimandigital, $senimandigital);
  $Result1 = mysql_query($insertSQL, $senimandigital) or die(mysql_error());
  
  if ( in_array($_GET['form']['builder'], array("tambah", "insert")) ) {
  $insertGoTo = "index.php?form[builder]=update&table=". $_GET['table'] ."&where[". $auto_increment ."]=". mysql_insert_id();
  header(sprintf("Location: %s", $insertGoTo));
  }
 exit;	
}

if ($_GET['ajax'] == 'edit') {
// ajax edit > start
mysql_select_db($database_senimandigital, $senimandigital);
$show_tables = mysql_query("SHOW TABLES", $senimandigital) or die(mysql_error());
$row_show_tables = mysql_fetch_assoc($show_tables);

if (isset($_REQUEST["table"])) {
do { // } while ($row_show_tables = mysql_fetch_assoc($show_tables));
if ($_REQUEST["table"] != $row_show_tables[key($row_show_tables)]) continue;
$TABLE_NAME = $row_show_tables[key($row_show_tables)];
if (isset($row_show_tables[key($row_show_tables)])) {
$TABLE_NAME = $row_show_tables[key($row_show_tables)];
}
mysql_select_db($database_senimandigital,  $senimandigital);
$query_show_columns = "SHOW COLUMNS FROM ". $TABLE_NAME;
$show_columns = mysql_query($query_show_columns, $senimandigital) or die(mysql_error());
$row_show_columns = mysql_fetch_assoc($show_columns);
$totalRows_show_columns = mysql_num_rows($show_columns);

do { // } while ($row_show_columns = mysql_fetch_assoc($show_columns));
if ($_POST[$row_show_columns['Field']] != '') {
if ($row_show_columns['Extra'] == 'auto_increment' && $_POST[$row_show_columns['Field']] > 0) { 
         $_WHERE[$row_show_columns['Field']] = $_POST[$row_show_columns['Field']];
} else { $_SET[$row_show_columns['Field']] = $_POST[$row_show_columns['Field']] ; }
}
} while ($row_show_columns = mysql_fetch_assoc($show_columns)); $rows = mysql_num_rows($show_columns); if($rows > 0) { mysql_data_seek($show_columns, 0); $row_show_columns = mysql_fetch_assoc($show_columns); }

if (count($_SET) > 0 && count($_WHERE) > 0) {
foreach($_SET as $key => $value) {
$query[] = ' '. $key .'='. GetSQLValueString($_POST[$key], "text") .' ';
}
$query = implode(', ', $query);
foreach($_WHERE as $key => $value) {
$query_where = ' '. $key .'='. GetSQLValueString($_POST[$key], "int") .' ';
}

  $updateSQL = "UPDATE ". $_REQUEST["table"] ." SET ". $query ." WHERE ". $query_where;
  mysql_select_db($database_senimandigital, $senimandigital);
  $Result1 = mysql_query($updateSQL, $senimandigital) or die(mysql_error());
  if ($Result1) {
    if ($_GET['form']['builder']) {
        $insertGoTo = "index.php?". (isset($_GET['popup']) ? "popup&" : '') ."form[builder]=update&table=". $_GET['table'] ."&where[". $_GET['table'] ."_id]=". $_GET['where'][$_GET['table'] .'_id'];
        header(sprintf("Location: %s", $insertGoTo)); 
       } else { echo 'Sukses';  }
  }
  }
} while ($row_show_tables = mysql_fetch_assoc($show_tables)); $rows = mysql_num_rows($show_tables); if($rows > 0) { mysql_data_seek($show_tables, 0); $row_show_tables = mysql_fetch_assoc($show_tables); }
} // ajax edit - end
exit;
} // if ($_GET['ajax'] == 'edit') {
	
if ($_GET['ajax']['count'] != '') {
mysql_select_db($database_senimandigital,  $senimandigital);
$query_ajax_cata_count = "SELECT COUNT(*) as count FROM `". $_GET['ajax']['count'] ."`";
$ajax_cata_count = mysql_query($query_ajax_cata_count, $senimandigital) or die(mysql_error());
$row_ajax_cata_count = mysql_fetch_assoc($ajax_cata_count);
$totalRows_ajax_cata_count = mysql_num_rows($ajax_cata_count);
if (is_numeric($row_ajax_cata_count['count'])) { echo $row_ajax_cata_count['count'];
} else {
echo '<p>Dapada senimandigital cms anda bisa mendapatkan count dari data pada sebuah tabel hanya dengan menuliskan variabel melalui url, contoh: ?ajax[count]=anggota</p>';	
}
exit;
} // endif (isset($_GET['ajax']['count'])) {

if ($_SERVER['PATH_INFO']) {
$included_files = get_included_files();
$_ENV['SCRIPT_FILENAME'][] = $included_files;
foreach ($included_files as $SCRIPT_FILENAME) {
$SCRIPT_FILENAME = str_replace('\\', '/', $SCRIPT_FILENAME);
if ($_SERVER['SCRIPT_FILENAME'] == $SCRIPT_FILENAME) continue;
if (preg_match("/(Connections).*?(senimandigital.php)/", $SCRIPT_FILENAME, $match, PREG_OFFSET_CAPTURE)) continue;
$script  = file_get_contents($SCRIPT_FILENAME); 
$WEBSITE['HOSTING']['SCRIPT_FILENAME'] = $SCRIPT_FILENAME;
}
} 
else {
$script = file_get_contents($_SERVER['SCRIPT_FILENAME']); 
$WEBSITE['HOSTING']['SCRIPT_FILENAME'] = $_SERVER['SCRIPT_FILENAME'];
// if (strtolower($_SERVER['SCRIPT_FILENAME']) == strtolower($WEBSITE['HOSTING']['ROOT'] .'index.php')) {
//$script = file_get_contents($WEBSITE['HOSTING']['TEMPLATES'] .'php/home.php');
//$WEBSITE['HOSTING']['SCRIPT_FILENAME'] = $WEBSITE['HOSTING']['TEMPLATES'] .'php/home.php';
//}
}
 
/* riset untuk sinkronisasi element.
if (isset($_GET['getElementByName']) ) {
$pattern = '%[$a-z]+_'. $_GET['getElementByName'] .'.*?mysql_num_rows\(\$'. $_GET['getElementByName'] .'\);%s';
preg_match_all($pattern, $script, $match);
if (count($match[0]) == 1) {
eval($match[0][0]);
print_r($row_modul_proyek);
print_r($match[0][0]);
}
exit;	
} // */

if (isset($_GET['magic']['json']['recordset']) or isset($_GET['magic']['xml']['recordset'])) {
$SELECTpatterns   = "/(?:[$]maxRows_[^\r\n]*? = ([^\r\n]*?);(?:\r\n|\r(?!\n)|\n)[ \t]*[$]pageNum_[^\r\n]*? = ([^\r\n]*?);(?:\r\n|\r(?!\n)|\n)[ \t]*if \(isset\([$](?:HTTP)?_GET(?:_VARS)?\['pageNum_[^\r\n]*?'\]\)\) \{(?:\r\n|\r(?!\n)|\n)[ \t]*[$]pageNum_[^\r\n]*? = [$](?:HTTP)?_GET(?:_VARS)?\['pageNum_[^\r\n]*?'\];(?:\r\n|\r(?!\n)|\n)[ \t]*\}(?:\r\n|\r(?!\n)|\n)[ \t]*[$]startRow_[^\r\n]*? = [$]pageNum_[^\r\n]*? \* [$]maxRows_[^\r\n]*?;(?:\r\n|\r(?!\n)|\n)[ \t]*(?:\r\n|\r(?!\n)|\n)[ \t]*)?((?:[$][^\r\n]*_[^\r\n]* = [\"][^\r\n]*[\"];(?:\r\n|\r(?!\n)|\n)[ \t]*if \(isset\([^\r\n]*\)\) \{(?:\r\n|\r(?!\n)|\n)[ \t]*[$][^\r\n]*_[^\r\n]* = (?:\(get_magic_quotes_gpc\(\)\) \? [^\r\n]* : addslashes\([^\r\n]*\)|[^\r\n]*);(?:\r\n|\r(?!\n)|\n)[ \t]*\}(?:\r\n|\r(?!\n)|\n)[ \t]*)*?)mysql_select_db\([$]database_([^\r\n]*?), [$][^\r\n]*?\);(?:\r\n|\r(?!\n)|\n)[ \t]*[$]query_([^\r\n]*?) = (?:sprintf\()?[\"]([^\r\n]*?)[\"](?:, ([^\r\n]*?)\))?;(?:\r\n|\r(?!\n)|\n)[ \t]*(?:[$]query_limit_[^\r\n]*? = sprintf\([\"]%s LIMIT %d, %d[\"], [$]query_[^\r\n]*?, [$]startRow_[^\r\n]*?, [$]maxRows_[^\r\n]*?\);(?:\r\n|\r(?!\n)|\n)[ \t]*[$][^\r\n]*? = mysql_query\([$]query_limit_[^\r\n]*?, [$][^\r\n]*?\) or die\(mysql_error\(\)\);(?:\r\n|\r(?!\n)|\n)[ \t]*|[$][^\r\n]*? = mysql_query\([$]query_[^\r\n]*?, [$][^\r\n]*?\) or die\(mysql_error\(\)\);(?:\r\n|\r(?!\n)|\n)[ \t]*)[$]row_[^\r\n]*? = mysql_fetch_assoc\([$][^\r\n]*?\);(?:\r\n|\r(?!\n)|\n)[ \t]*(?:(?:\r\n|\r(?!\n)|\n)[ \t]*if \(isset\([$](?:HTTP)?_GET(?:_VARS)?\['totalRows_[^\r\n]*?'\]\)\) \{(?:\r\n|\r(?!\n)|\n)[ \t]*[$]totalRows_[^\r\n]*? = [$](?:HTTP)?_GET(?:_VARS)?\['totalRows_[^\r\n]*?'\];(?:\r\n|\r(?!\n)|\n)[ \t]*\} else \{(?:\r\n|\r(?!\n)|\n)[ \t]*[$]all_[^\r\n]*? = mysql_query\([$]query_[^\r\n]*?\);(?:\r\n|\r(?!\n)|\n)[ \t]*[$]totalRows_[^\r\n]*? = mysql_num_rows\([$]all_[^\r\n]*?\);(?:\r\n|\r(?!\n)|\n)[ \t]*\}(?:\r\n|\r(?!\n)|\n)[ \t]*[$]totalPages_[^\r\n]* = (?:ceil|\(int\))\([$]totalRows_[^\r\n]*\/[$]maxRows_[^\r\n]*\)(?:-1)?;|[$]totalRows_[^\r\n]*? = mysql_num_rows\([$][^\r\n]*?\);)(?=\r\n|\r|\n|\?>)/i";
preg_match_all($SELECTpatterns, $script, $hasil);
foreach ($hasil[5] as $key =>  $value) {
	if ($value == $_GET['magic'][array_keys($_GET['magic'])[0]]['recordset']) {
     eval($hasil[0][$key]);
	 eval( str_replace('%s', $_GET['magic'][array_keys($_GET['magic'])[0]]['recordset'], '$data[paging]["totalRows"] = $totalRows_%s;'));
     eval( str_replace('%s', $_GET['magic'][array_keys($_GET['magic'])[0]]['recordset'] ,'do { $data["data"][] = $row_%s; } while ($row_%s = mysql_fetch_assoc($%s)); '));

  switch (array_keys($_GET['magic'])[0]) {
	case "json":
	  echo json_encode($data);
    break;
	case "xml":
	  if (!function_exists("array_to_xml")) {
	  function array_to_xml( $data, &$xml_data ) {
		  foreach( $data as $key => $value ) {
			  if( is_array($value) ) {
				  if( is_numeric($key) ){
					  $key = 'item'; //dealing with <0/>..<n/> issues
				  }
				  $subnode = $xml_data->addChild($key);
				  array_to_xml($value, $subnode);
			  } else {
				  $xml_data->addChild("$key", htmlspecialchars("$value"));
			  }
		   }
	  }} // end if (!function_exists("array_to_xml")) {
	  
	  $xml_data = new SimpleXMLElement('<?xml version="1.0"?><data></data>');
	  array_to_xml($data, $xml_data);
	  $domxml = new DOMDocument('1.0'); $domxml->preserveWhiteSpace = false; $domxml->formatOutput = true;
	       $domxml->loadXML($xml_data->asXML());
	  echo $domxml->saveXML();
	  break;
	  }
	}
} // end foreach ($hasil[5] as $key =>  $value) {
exit;
} // endif (isset($_GET['magic']['json']['recordset'])) {

if ( preg_match('%new getID3;%s', $script) ) { require_once( $WEBSITE['HOSTING']['ASSETS'] .'php/getID3/getid3/getid3.php'); }

if ($_POST['MM_insert'] or $_POST['MM_update']) { /* Memindahkan fungsi insert dan update dari script kesini, agar bisa redirect dan membatalkan */
preg_match_all('%function header_execution[\(][\)][\{](.*?)[\}][\}] \/\* end function%s', $script, $match);
foreach ($match[1] as $key => $query_recordset) {
 eval($query_recordset);
}}

preg_match_all('~<.*?rule="tabs".*?id="(.*?)".*?>~', $script, $match);
if (isset($match[1][0])) {
$WEBSITE['SCRIPT']['HEADER'] .= '<script for="tabs"> $(function() { ';
foreach($match[1] as $key => $value) {
$WEBSITE['SCRIPT']['HEADER'] .= ' $("#'. $value .'").tabs(); ';
}
$WEBSITE['SCRIPT']['HEADER'] .= " });\n</script>";
}

preg_match('/<.*?(ng-app).*?>/s', $script, $match);
if ($match[1][0]) {
$WEBSITE['SCRIPT']['HEADER'] .= '<script src="'. $WEBSITE['DOMAIN']['ASSETS'] .'angular/1.7.7/angular.js"></script> ';
}

preg_match_all('%<.*?rule="menu".*?id="(.*?)".*?>%s', $script, $match);
if ($match[1][0]) {
$WEBSITE['SCRIPT']['HEADER'] .= '
<script src="'. $WEBSITE['DOMAIN']['ASSETS'] .'jquery/ui/jquery.ui.core.js"></script>
<script src="'. $WEBSITE['DOMAIN']['ASSETS'] .'jquery/ui/jquery.ui.position.js"></script>
<script src="'. $WEBSITE['DOMAIN']['ASSETS'] .'jquery/ui/jquery.ui.menu.js"></script>
<script> $(function() { ';
foreach($match[1] as $key => $value) {
$WEBSITE['SCRIPT']['HEADER'] .= ' $("#'. $value .'").menu();
';
}
$WEBSITE['SCRIPT']['HEADER'] .= "\n});\n</script>";
}
 
preg_match_all('%<.*?data-transition="fade".*?id="(.*?)".*?>%s', $script, $match);
if ($match[1][0]) { 
$WEBSITE['SCRIPT']['HEADER'] .= "<script>\n$(function() { ";
foreach($match[1] as $key => $value) {
$WEBSITE['SCRIPT']['HEADER'] .= '
$("#'. $value .' > li:gt(0)").hide(); setInterval(function() { 
$("#'. $value .' > li:first").fadeOut(0).next().fadeIn(1000).end().appendTo("#'. $value .'"); }, 10000); ';
}
$WEBSITE['SCRIPT']['HEADER'] .= "});\n</script>";
}
 
preg_match_all('%<.*?data-filter="true".*?id="(.*?)".*?>%s', $script, $match);
if ($match[1][0]) {
$WEBSITE['SCRIPT']['HEADER'] .= '<script> $(function() { ';
foreach($match[1] as $key => $value) {
 $WEBSITE['SCRIPT']['HEADER'] .= ' $( "#'. $value .'_search_input" ).fastLiveFilter( "#'. $value .'" ); ';
}
$WEBSITE['SCRIPT']['HEADER'] .= ' }); </script>';
}

preg_match_all('%<pre.*?data-format="(.*?)".*?name="(.*?)".*?>%s', $script, $match);
if ($match[1][0]) {
if (in_array($match[1][0], array('htm', 'html')))      { $match[1][0] = 'Xml'; }
if (in_array($match[1][0], array('js', 'javascript'))) { $match[1][0] = 'JScript'; }
$WEBSITE['STYLE']['HEADER']  .= '<link type="text/css" rel="stylesheet" href="'. $WEBSITE['DOMAIN']['ASSETS'] .'SyntaxHighlighter/1.5.1/Styles/SyntaxHighlighter.css"></link> ';
$WEBSITE['SCRIPT']['HEADER'] .= '<script language="javascript" src="'. $WEBSITE['DOMAIN']['ASSETS'] .'SyntaxHighlighter/1.5.1/Scripts/shCore.js"></script>  
<script language="javascript" src="'. $WEBSITE['DOMAIN']['ASSETS'] .'SyntaxHighlighter/1.5.1/Scripts/shBrushCSharp.js"></script>  
<script language="javascript" src="'. $WEBSITE['DOMAIN']['ASSETS'] .'SyntaxHighlighter/1.5.1/Scripts/shBrush'. $match[1][0] .'.js"></script> ';

$WEBSITE['SCRIPT']['FOOTER'] .= '<script language="JavaScript" type="text/javascript">  
dp.SyntaxHighlighter.ClipboardSwf = \''. $WEBSITE['DOMAIN']['ASSETS'] .'SyntaxHighlighter/1.5.1/Scripts/clipboard.swf\';';
// foreach($match[1] as $key => $value) { $WEBSITE['SCRIPT']['FOOTER'] .= ' dp.SyntaxHighlighter.HighlightAll(\''. $match[2][$key].'\');  '; }
$WEBSITE['SCRIPT']['FOOTER'] .= "\n</script>";
}

preg_match_all('%jquery="(.*?)".*?>%s', $script, $match);
if ($match[1][0] == 'contextMenu') {
$WEBSITE['STYLE']['HEADER']  .= '<link href="'. $WEBSITE['DOMAIN']['ASSETS'] .'jquery/themes/base/jquery.ui.contextMenu.css" rel="stylesheet" /> ';
$WEBSITE['SCRIPT']['HEADER'] .= '<script src="'. $WEBSITE['DOMAIN']['ASSETS'] .'jquery/ui/jquery.ui.contextMenu.js"></script> ';
}

preg_match_all('%[backend-load-]?jquery-plugin[s]?="(.*?)".*?>%s', $script, $match);
if ($match[1][0]) {
if ($match[1][0] == 'menu_article_dropdown') {
$WEBSITE['STYLE']['HEADER']  .= '<link  href="'. $WEBSITE['DOMAIN']['ASSETS'] .'jquery-plugins/menu_article_dropdown/menu_article_dropdown.css" rel="stylesheet" /> ';
$WEBSITE['SCRIPT']['HEADER'] .= '<script src="'. $WEBSITE['DOMAIN']['ASSETS'] .'jquery-plugins/menu_article_dropdown/menu_article_dropdown.js"></script> '."\n";
}
if ($match[1][0] == 'jstree') {
$WEBSITE['STYLE']['HEADER']  .= '<link href="'. $WEBSITE['DOMAIN']['ASSETS']  .'jquery-plugins/jstree/dist/themes/default/style.css" rel="stylesheet" /> '."\n";
$WEBSITE['SCRIPT']['HEADER'] .= '<script src="'. $WEBSITE['DOMAIN']['ASSETS'] .'jquery-plugins/jstree/dist/jstree.js"></script> '."\n";
}
if ($match[1][0] == 'contextMenu') {
$WEBSITE['STYLE']['HEADER']  .= '<link href="'. $WEBSITE['DOMAIN']['ASSETS'] .'jquery/themes/base/jquery.ui.contextMenu.css" rel="stylesheet" /> ';
$WEBSITE['SCRIPT']['HEADER'] .= '<script src="'. $WEBSITE['DOMAIN']['ASSETS'] .'jquery/ui/jquery.ui.contextMenu.js"></script> ';
}
if ($match[1][0] == 'formBuilder') {
$WEBSITE['SCRIPT']['HEADER'] .= '<script type="text/javascript" src="'. $WEBSITE['DOMAIN']['ASSETS'] .'jquery-plugins/formBuilder/3.1.3/src/js/form-builder.min.js"></script>';
}
if ($match[1][0] == 'dom_line_connect_draggable') {
$WEBSITE['STYLE']['HEADER']  .= '<link href="'. $WEBSITE['DOMAIN']['ASSETS'] .'jquery-plugins/dom_line_connect_draggable/dom_line_connect_draggable.css" rel="stylesheet" /> ';
$WEBSITE['SCRIPT']['HEADER'] .= '<script type="text/javascript" src="'. $WEBSITE['DOMAIN']['ASSETS'] .'jquery-plugins/dom_line_connect_draggable/dom_line_connect_draggable.js"></script>';
}
}

preg_match_all('%<textarea.*?data-format="html" name="(.*?)".*?>%s', $script, $match);
if ($match[1][0] or $_GET['form']['builder'] == 'edit') {
$WEBSITE['SCRIPT']['HEADER'] .= '<script type="text/javascript" src="'. $WEBSITE['DOMAIN']['ASSETS'] .'tinymce/5.0.2/tinymce.js"></script>
<script type="text/javascript">// tinyMCE.init({ mode : "exact", elements : "' . implode(',', $match[1]) . '" }); </script>';
}
 
preg_match_all('%<textarea.*?data-format="markdown" name="(.*?)".*?>%s', $script, $match);
if ($match[1][0] or $_GET['form']['builder'] == 'edit') {
$WEBSITE['SCRIPT']['HEADER'] .= '<link href="'. $WEBSITE['DOMAIN']['ASSETS'] .'jquery-plugins/markdown/markdown.css" type="text/css" rel="stylesheet" />
         <script type="text/javascript" src="'. $WEBSITE['DOMAIN']['ASSETS'] .'jquery-plugins/markdown/markdown.js"></script>';
}
 
preg_match_all('~<textarea.*?data-format="([a-z-]+)".*?mode="(.*?)"~', $script, $match); // print_r($match);
if ($match[1][0]) {
$WEBSITE['SCRIPT']['HEADER'] .= '<link  href="http://assets.senimandigital.kom/codemirror/5.40.0/lib/codemirror.css" rel="stylesheet">
<script src="'. $WEBSITE['DOMAIN']['ASSETS'] .'codemirror/5.40.0/lib/codemirror.js"></script>';
foreach (array_unique($match[1]) as $key => $value) {
if (in_array($match[1][$key], array('htm','html'))) continue;
$WEBSITE['SCRIPT']['HEADER'] .= '<script src="'. $WEBSITE['DOMAIN']['ASSETS'] .'codemirror/5.40.0/mode/'. $match[1][$key] .'/'. $match[1][$key] .'.js"></script> ';
}
$WEBSITE['SCRIPT']['HEADER'] .= '<script src="'. $WEBSITE['DOMAIN']['ASSETS'] .'codemirror/5.40.0/mode/css/css-jsfiddle.js"></script> ';
$WEBSITE['SCRIPT']['HEADER'] .= '<script src="'. $WEBSITE['DOMAIN']['ASSETS'] .'codemirror/5.40.0/mode/javascript/javascript.js"></script> ';
$WEBSITE['SCRIPT']['HEADER'] .= '<script src="'. $WEBSITE['DOMAIN']['ASSETS'] .'codemirror/5.40.0/mode/xml/xml.js"></script> ';
$WEBSITE['SCRIPT']['HEADER'] .= '<script src="'. $WEBSITE['DOMAIN']['ASSETS'] .'codemirror/5.40.0/mode/clike/clike.js"></script> ';
$WEBSITE['SCRIPT']['HEADER'] .= '<script src="'. $WEBSITE['DOMAIN']['ASSETS'] .'codemirror/5.40.0/mode/php/php.js"></script> ';
}

preg_match_all('%rule="(.*?)"%s', $script, $match);
if ($match[1][0] == 'link-bezier') {
$WEBSITE['SCRIPT']['HEADER'] .= '<script src="'. $WEBSITE['DOMAIN']['ASSETS'] .'jquery-plugins/bezier/bezier.js"></script> ';
}

preg_match_all('%leaflet-map-view="(.*?)"%s', $script, $match);
if ($match[1][0]) {
$WEBSITE['SCRIPT']['HEADER'] .= '<link rel="stylesheet" type="text/css"  href="'. $WEBSITE['DOMAIN']['ASSETS'] .'leaflet/leaflet.css">';
$WEBSITE['SCRIPT']['HEADER'] .= '<script src="'. $WEBSITE['DOMAIN']['ASSETS'] .'leaflet/leaflet.js"></script> ';
}

if (!strstr(strtolower($_SERVER['HTTP_USER_AGENT']), 'chrome')) {
preg_match_all('%<input.*?type="date".*?name="(.*?)".*?>%s', $script, $input_date);
$WEBSITE['SCRIPT']['HEADER'] .= '
<link  href="'. $WEBSITE['DOMAIN']['ASSETS'] .'jquery/themes/base/jquery.ui.all.css" rel="stylesheet">
<script src="'. $WEBSITE['DOMAIN']['ASSETS'] .'jquery/ui/jquery.ui.datepicker.js"></script>
<script> $(function() { ';
foreach($input_date[1] as $key => $value) {
//preg_match_all('%min="(.*?)"%s', $value, $min);
//preg_match_all('%max="(.*?)"%s', $value, $max);
$WEBSITE['SCRIPT']['HEADER'] .= ' $("#'. $value .'").datepicker({ showWeek: true, firstDay: 1, dateFormat: "yy-mm-dd"'. $min . $max .'});
';
}
$WEBSITE['SCRIPT']['HEADER'] .= "\n }); \n</script>";
}

function js($ob_get_content) { return '<script> document.write('. $ob_get_content .'); </script>'; }
function bulan_indo($date)      { $date = str_pad($date, 2 ,"0", STR_PAD_LEFT); $bln_array = array ('01'=>'Januari', '02'=>'Februari', '03'=>'Maret', '04'=>'April', '05'=>'Mei', '06'=>'Juni', '07'=>'Juli',    '08'=>'Agustus',  '09'=>'September', '10'=>'Oktober', '11'=>'November', '12'=>'Desember' ); return $bln_array[$date]; }
function tanggal_indo($tanggal) { $array_tanggal = explode('-', $tanggal); return $array_tanggal[2] .' '. bulan_indo($array_tanggal[1]) .' '. $array_tanggal[0]; }
function include_class($class)  { if (!class_exists($class) && file_exists($WEBSITE['HOSTTING']['ASSETS'] .'class/'. $class .'.php')) { include $WEBSITE['HOSTTING']['ASSETS'] .'class/'. $class .'.php';
 // eval('class '.$class.' extends '.$prototype.' {}');
}} // end function include_class
function array_insert_before($key, array &$array, $new_key, $new_value) { if (array_key_exists($key, $array)) { $new = array(); foreach ($array as $k => $value) { if ($k === $key) { $new[$new_key] = $new_value; } $new[$k] = $value; } return $new; } return FALSE; }
function array_insert_after($key, array &$array, $new_key, $new_value) {  if (array_key_exists($key, $array)) { $new = array(); foreach ($array as $k => $value) { $new[$k] = $value; if ($k === $key) { $new[$new_key] = $new_value; } } return $new; } return FALSE; }

/* @ Awal - Jika hanya merequest element, untuk kasus external request @ */
if       (isset($_GET['getElementById']) or isset($_GET['getElementsByTagName'])) {
ob_start();
if (strtolower($_SERVER['SCRIPT_FILENAME']) == strtolower($WEBSITE['HOSTING']['ROOT'] .'index.php')) { 
include $WEBSITE['HOSTING']['TEMPLATES'] .'php/home.php';  } else { include $_SERVER['SCRIPT_FILENAME']; }
$WEBSITE['SCRIPT']['HTML'] = ob_get_contents(); ob_end_clean();
$dom = new DOMDocument(); $dom->formatOutput = true; $dom->loadHTML($WEBSITE['SCRIPT']['HTML']);  
if (isset($_GET['getElementById']))       { echo $WEBSITE['SCRIPT']['HTML'] = $dom->saveHTML($dom->getElementById($_GET['getElementById'])); }
if (isset($_GET['getElementsByTagName'])) { echo $WEBSITE['SCRIPT']['HTML'] = $dom->saveHTML($dom->getElementsByTagName('form')->item(0)); }
exit;
}
/* @ Akhir - Jika hanya merequest element untuk kasus external request @ */

if ($_GET['system']['file'] == 'filemtime') {
 echo date ("Y-m-d H:i:s", filemtime($_SERVER['SCRIPT_FILENAME'])) ;
exit;
}

// /* <-- @ Awal Baris jika ingin memodifikasi html sebelum dikirim ke browser klient
if ($_GET['form']['builder'] == "master") {
ob_start();
echo '<table><tr><td role="article" valign="top"><section><h3>'. $WEBSITE['DOMAIN']['SUB'] . $_SERVER['SCRIPT_NAME'] .'</h3>';
include $WEBSITE['HOSTING']['TEMPLATES'] ."php/data_field_master.php";
echo '</section></td><td role="aside">';
include $WEBSITE['HOSTING']['TEMPLATES'] ."php/menu_samping.php";
echo '</td></tr></table>';
$WEBSITE['SCRIPT']['HTML'] =  ob_get_contents(); ob_end_clean();
define('senimandigital', true); goto sendhtml;
}

if ( in_array($_GET['form']['builder'], array("edit", "update")) ) {
ob_start();

include $WEBSITE['HOSTING']['TEMPLATES'] ."php/data_field_edit.php";
$WEBSITE['SCRIPT']['HTML'] =  ob_get_contents(); ob_end_clean();
define('senimandigital', true); goto sendhtml;
}
if ( in_array($_GET['form']['builder'], array("tambah", "insert")) ) {
ob_start();
echo '<table><tr><td role="article" valign="top"><section><h3>'. $WEBSITE['DOMAIN']['SUB'] . $_SERVER['SCRIPT_NAME'] .'</h3>';
include $WEBSITE['HOSTING']['TEMPLATES'] .'php/deskripsi.php';
include $WEBSITE['HOSTING']['TEMPLATES'] ."php/data_field_tambah.php";
echo '</section></td></tr></table>';
$WEBSITE['SCRIPT']['HTML'] =  ob_get_contents(); ob_end_clean();
define('senimandigital', true); goto sendhtml;
}

define('senimandigital', true);
ob_start();
// if   (strtolower($_SERVER['SCRIPT_FILENAME']) == strtolower($WEBSITE['HOSTING']['ROOT'] .'index.php')) { include $WEBSITE['HOSTING']['TEMPLATES'] .'php/home.php';  } else { include $_SERVER['SCRIPT_FILENAME']; }
include $_SERVER['SCRIPT_FILENAME'];
$WEBSITE['SCRIPT']['HTML'] = ob_get_contents(); ob_end_clean();

if   (file_exists($_SERVER['DOCUMENT_ROOT'] .'/Templates/php/index.php')) {
          include $_SERVER['DOCUMENT_ROOT'] .'/Templates/php/index.php'; }
else { include $WEBSITE['HOSTING']['TEMPLATES'] .'php/index.php'; }

preg_match_all('%<section>\r\n<h3>DESCRIPTION</h3>.*?</section>%s', $WEBSITE['SCRIPT']['HTML'], $replace_html);
if ($replace_html[0][0]) {
$_SERVER['SCRIPT_DIRNAME'] = dirname($_SERVER['SCRIPT_FILENAME']);
if      (file_exists($_SERVER['SCRIPT_DIRNAME'] .'/menu_samping.php')) {
ob_start(); include $_SERVER['SCRIPT_DIRNAME'] . '/menu_samping.php'; $menu_samping = ob_get_contents(); ob_end_clean();
$WEBSITE['SCRIPT']['HTML'] = str_replace($replace_html[0][0], $menu_samping, $WEBSITE['SCRIPT']['HTML']);
} elseif(file_exists($_SERVER['SCRIPT_DIRNAME'] .'/Templates/php/menu_samping.php')) {
ob_start(); include $_SERVER['SCRIPT_DIRNAME'] . '/Templates/php/menu_samping.php'; $menu_samping = ob_get_contents(); ob_end_clean();
$WEBSITE['SCRIPT']['HTML'] = str_replace($replace_html[0][0], $menu_samping, $WEBSITE['SCRIPT']['HTML']);
}
}

preg_match_all('%<section form="komentar">.*?</section>%s', $WEBSITE['SCRIPT']['HTML'], $replace_html);
if ($replace_html[0][0]) {
$_SERVER['SCRIPT_DIRNAME'] = dirname($_SERVER['SCRIPT_FILENAME']);
if      (file_exists($_SERVER['SCRIPT_DIRNAME'] .'/menu_samping.php')) {
ob_start(); include $_SERVER['SCRIPT_DIRNAME'] . '/menu_samping.php'; $menu_samping = ob_get_contents(); ob_end_clean();
$WEBSITE['SCRIPT']['HTML'] = str_replace($replace_html[0][0], $menu_samping, $WEBSITE['SCRIPT']['HTML']);
} elseif(file_exists($_SERVER['SCRIPT_DIRNAME'] .'/Templates/php/menu_samping.php')) {
ob_start(); include $_SERVER['SCRIPT_DIRNAME'] . '/Templates/php/menu_samping.php'; $menu_samping = ob_get_contents(); ob_end_clean();
$WEBSITE['SCRIPT']['HTML'] = str_replace($replace_html[0][0], $menu_samping, $WEBSITE['SCRIPT']['HTML']);
}
}

preg_match_all('%\[rs\]`(cms_versi)`.`(cms_versi_judul)`\[rs\]%s', $WEBSITE['SCRIPT']['HTML'], $replace_html);
foreach($replace_html[0] as $key => $value ){
eval('$replace_html["replace"][$key] = $row_'. $replace_html[1][$key] .'["'. $replace_html[2][$key] .'"];');
if ($replace_html["replace"][$key]) $WEBSITE['SCRIPT']['HTML'] = str_replace($replace_html[0], $replace_html['replace'], $WEBSITE['SCRIPT']['HTML']);
} 

preg_match_all('~<!-- include_form "(.*?)" "(.*?)" -->~', $WEBSITE['SCRIPT']['HTML'], $replace);
if (isset($replace[1][0])) {
foreach($replace[1] as $key => $value) {
ob_start(); include $_SERVER['DOCUMENT_ROOT'] . $value;
  preg_match_all('%<td role="article".*?(<form.*?name="'. $replace[2][$key] .'".*?>)(.*?)(<\/form>).*?<\/td>%s', ob_get_contents(), $FORM); 
  preg_match_all('%name="(.*?)"%s', $FORM[2][0], $INPUT); 
  preg_match_all('%for="(.*?)"%s',  $FORM[2][0], $FOR); 
ob_end_clean();
}
 
$FORMULIR  = $FORM[1][0] . '<table>';
$dom = new DOMDocument();   $dom->loadHTML($FORM[0][0]);   $xpath = new DOMXPath($dom);
foreach(array_intersect($FOR[1], $INPUT[1]) as $key => $value) {
  $FORMULIR .= '<tr><td>'
            .  $dom->saveHTML($xpath->query('//*[@for="'. $value.'"]')->item(0))
            .  $dom->saveHTML($xpath->query('//*[@name="'. $value.'"]')->item(0))
            .  '</td></tr>';
}
$FORMULIR .= $dom->saveHTML($xpath->query('//caption[@align="bottom"]')->item(0));
$FORMULIR .= '</table>' . $FORM[3][0];
$WEBSITE['SCRIPT']['HTML'] = str_replace($replace[0], $FORMULIR, $WEBSITE['SCRIPT']['HTML']);
}

if (isset($_GET['magic']['html']['templates']) && file_exists($WEBSITE['HOSTING']['TEMPLATES'] ."php/". $_GET['magic']['html']['templates'] .".php" )) { ob_start();
   include $WEBSITE['HOSTING']['TEMPLATES'] ."php/". $_GET['magic']['html']['templates'] .".php";
$WEBSITE['SCRIPT']['HTML'] =  ob_get_contents(); ob_end_clean(); define('senimandigital', true);
}

if (isset($_GET['magic']['html']['sitemap'])) { ob_start();
   include $WEBSITE['HOSTING']['TEMPLATES'] ."php/sitemap.php";
$WEBSITE['SCRIPT']['HTML'] =  ob_get_contents(); ob_end_clean(); define('senimandigital', true);
}

if (isset($_GET['magic']['iframe']['komentar'])) { ob_start();
   include $WEBSITE['HOSTING']['ROOT'] .'Templates/php/_floater.php';
$WEBSITE['SCRIPT']['HTML'] =  ob_get_contents(); ob_end_clean(); define('senimandigital', true); 
}

sendhtml: mysql_close($senimandigital);
// Koneksi dengan database berakhir disini, kode selanjutnya dimaksudkan untuk memanipulasi css, dom, json dan xml sebelum dikirim ke browser.

if (isset($_GET['popup'])) {
 $dom = new DOMDocument();     $dom->loadHTML($WEBSITE['SCRIPT']['HTML']);   $xpath = new DOMXPath($dom);
 $WEBSITE['SCRIPT']['HTML']  = str_replace($dom->saveHTML($xpath->query('//td[@role="aside"]')->item(0)), '', $dom->saveHTML($xpath->query('/')->item(0)));
}

if (isset($_GET['dom'])) {
 $dom = new DOMDocument();    $dom->loadHTML($WEBSITE['SCRIPT']['HTML']);   $xpath = new DOMXPath($dom);
 $WEBSITE['SCRIPT']['HTML'] = $dom->saveHTML($xpath->query('//td[@role="article"]')->item(0));
}


if (substr($_SERVER['HTTP_HOST'], -4) == '.kom') {
$WEBSITE['TEMPLATE']['HEADER'] = str_replace('senimandigital.com' , 'senimandigital.kom', $WEBSITE['TEMPLATE']['HEADER']);
$WEBSITE['SCRIPT']['HTML']     = str_replace('senimandigital.com' , 'senimandigital.kom', $WEBSITE['SCRIPT']['HTML']);
$WEBSITE['SCRIPT']['FOOTER']   = str_replace('senimandigital.com' , 'senimandigital.kom', $WEBSITE['SCRIPT']['FOOTER']);
} elseif (substr($_SERVER['HTTP_HOST'], -4) == '.com') {
$WEBSITE['TEMPLATE']['HEADER'] = str_replace('senimandigital.kom' , 'senimandigital.com', $WEBSITE['TEMPLATE']['HEADER']);
$WEBSITE['SCRIPT']['HTML']     = str_replace('senimandigital.kom' , 'senimandigital.com', $WEBSITE['SCRIPT']['HTML']);
$WEBSITE['SCRIPT']['FOOTER']   = str_replace('senimandigital.kom' , 'senimandigital.com', $WEBSITE['SCRIPT']['FOOTER']);
}

/*
preg_match_all('~<textarea.*?data-format="([a-z-]+)".*?mode="(.*?)">~', $WEBSITE['SCRIPT']['HTML'], $match);
if ($match[1][0]) { 
$WEBSITE['SCRIPT']['HEADER'] = '<link  href="http://assets.senimandigital.kom/codemirror/5.40.0/lib/codemirror.css" rel="stylesheet">
<script src="'. $WEBSITE['DOMAIN']['ASSETS'] .'codemirror/5.40.0/lib/codemirror.js"></script>';
foreach (array_unique($match[1]) as $key => $value) {
$WEBSITE['SCRIPT']['HEADER'] .= '<script src="'. $WEBSITE['DOMAIN']['ASSETS'] .'codemirror/5.40.0/mode/'. $match[1][$key] .'/'. $match[1][$key] .'.js"></script> ';
}
$WEBSITE['SCRIPT']['HEADER'] .= '<script src="'. $WEBSITE['DOMAIN']['ASSETS'] .'codemirror/5.40.0/mode/css/css-jsfiddle.js"></script> ';
$WEBSITE['SCRIPT']['HEADER'] .= '<script src="'. $WEBSITE['DOMAIN']['ASSETS'] .'codemirror/5.40.0/mode/javascript/javascript.js"></script> ';
$WEBSITE['SCRIPT']['HEADER'] .= '<script src="'. $WEBSITE['DOMAIN']['ASSETS'] .'codemirror/5.40.0/mode/xml/xml.js"></script> ';
$WEBSITE['SCRIPT']['HEADER'] .= '<script src="'. $WEBSITE['DOMAIN']['ASSETS'] .'codemirror/5.40.0/mode/clike/clike.js"></script> ';
$WEBSITE['SCRIPT']['HEADER'] .= '<script src="'. $WEBSITE['DOMAIN']['ASSETS'] .'codemirror/5.40.0/mode/php/php.js"></script> ';
$WEBSITE['TEMPLATE']['HEADER'] = str_replace('<script position="head"></script>', $WEBSITE['SCRIPT']['HEADER'], $WEBSITE['TEMPLATE']['HEADER']);
} // Akhir baris jika ingin memodifikasi html sebelum dikirim ke browser klient */

foreach ($WEBSITE['DOMAIN'] as $key => $value) { $listdomain[] = '<?php echo $WEBSITE[\'DOMAIN\'][\''. $key .'\']; ?>'; }
if (preg_match_all('%Dreamweaver%s', $_SERVER['HTTP_USER_AGENT'], $match)) {
    echo preg_replace('%<header>.*?</header>%s', '', str_replace($listdomain, $WEBSITE['DOMAIN'],$WEBSITE['TEMPLATE']['HEADER'] . $WEBSITE['SCRIPT']['HTML'] . $WEBSITE['SCRIPT']['FOOTER']));
	//echo $WEBSITE['SCRIPT']['HTML'];
} else {
echo str_replace($listdomain, $WEBSITE['DOMAIN'],$WEBSITE['TEMPLATE']['HEADER'] . $WEBSITE['SCRIPT']['HTML'] . $WEBSITE['TEMPLATE']['FOOTER'] . $WEBSITE['SCRIPT']['FOOTER']);
}
//echo microtime(true) - $microtime_start; echo '<br>'. (memory_get_usage() - $ram) / 1024;

endsenimandigital:
unset($WEBSITE, $script, $match, $replace);
exit;
?>
<?php $source = ob_get_contents(); ob_end_clean(); echo $source;  
mysql_free_result($ajax_cata_count); 
?>
