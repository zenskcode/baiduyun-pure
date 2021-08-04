<?php

const programVersion = '2.1.9.1';
if (!defined('init')) {
	http_response_code(403); header('Content-Type: text/plain; charset=utf-8'); header('Refresh: 3;url=./');
	die("HTTP 403 禁止访问！\r\n此文件是 百度网盘直链解析 PHP 语言版项目版本 " . programVersion . " 的配置文件！\r\n禁止直接访问！");
}
if (!function_exists('curl_init')) {
	http_response_code(503);
	header('Content-Type: text/plain; charset=utf-8');
	die("HTTP 503 服务不可用！\r\n您未安装或未启用 Curl 扩展，此程序无法运行！");
}

const Sitename = '百度云解析';

const BDUSS = '此处填入普通账号BDUSS，用于获取文件信息';
const STOKEN = '此处填入普通账号STOKEN，用于获取文件信息';
const SVIP_BDUSS = '此处填入SVIP账号BDUSS，用于获取高速下载直链';
const SVIP_STOKEN = '此处填入SVIP账号STOKEN，用于监测SVIP账号状态，可不填';

const IsCheckPassword = false;
const Password = '';
const Footer = <<<'FoOtEr'
FoOtEr;
const APP_ID = '250528';
const DEBUG = false; //默认关闭DEBUG模式

const USING_DB = true;
const DbConfig = array("servername" => "127.0.0.1", "username" => "baiduyun", "DBPassword" => "baiduyun", "dbname" => "baiduyun", "dbtable" => "bdwp");

const ADMIN_PASSWORD = '960304';
const DownloadTimes = 5; //请勿在此修改，移步settings.php页面
const DownloadLinkAvailableTime = 2;
const IsConfirmDownload = true;
const SVIPSwitchMod = 0; //请勿在此修改，移步settings.php页面
