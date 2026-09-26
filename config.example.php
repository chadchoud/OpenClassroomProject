<?php
// Copy this file to config.php and set your InfinityFree database credentials.
session_start();
header('Content-Type: text/html; charset=utf-8');
const DB_HOST = 'YOUR_DB_HOST';
const DB_NAME = 'YOUR_DB_NAME';
const DB_USER = 'YOUR_DB_USER';
const DB_PASS = 'YOUR_DB_PASSWORD';
try { $pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8mb4', DB_USER, DB_PASS, [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC]); } catch (Throwable $e) { exit('تعذر الاتصال بقاعدة البيانات. راجع config.php'); }
if (empty($_SESSION['csrf'])) $_SESSION['csrf']=bin2hex(random_bytes(32));
function e($v){return htmlspecialchars((string)$v,ENT_QUOTES,'UTF-8');}
function csrf(){return $_SESSION['csrf'];}
function verify_csrf(){if(!hash_equals($_SESSION['csrf'],$_POST['csrf']??'')) exit('طلب غير صالح');}
function user(){global $pdo; static $u; if($u!==null)return $u; if(empty($_SESSION['uid']))return null; $s=$pdo->prepare('SELECT id,name,email,role FROM users WHERE id=?');$s->execute([$_SESSION['uid']]);return $u=$s->fetch()?:null;}
function login_required(){if(!user()){header('Location: index.php');exit;}}
function role_required($roles){login_required();if(!in_array(user()['role'],$roles,true))exit('لا تملك الصلاحية');}
function header_html($title){?><!doctype html><html lang="ar" dir="rtl"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title><?=e($title)?></title><link rel="stylesheet" href="assets/style.css"></head><body><nav><b>حلقات القرآن</b><?php if(user()): ?><a href="dashboard.php">لوحة التحكم</a><a href="circles.php">الحلقات</a><a href="upload.php">المواد</a><span></span><a href="logout.php">خروج</a><?php endif; ?></nav><main><h1><?=e($title)?></h1><?php }
function footer_html(){?></main><footer>نظام إدارة الحلقات القرآنية</footer></body></html><?php }
?>