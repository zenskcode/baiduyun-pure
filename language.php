<?php

/**
 * 功能描述：为一些页面添加必要的语言翻译
 */

$lang = [
	"zh-CN" => [
		"LanguageName" => "Chinese",
		"ConfirmTitle" => "继续解析？",
		"ConfirmText" => "为保证服务稳定，每个IP每天有" . DownloadTimes . "次免费解析次数，是否继续？",
		"ConfirmmButtonText" => "确定",
		"IndexButton" => "首页",
		"HelpButton" => "使用帮助",
		"TipTitle" => "提示",
		"TimeoutTip" => "当前页面已失效，请刷新重新获取。",
		"AllFiles" => "全部文件",
		"PasswordError" => "密码错误",
		"AccountError" => "账户错误",
		"NoChance" => "免费次数不足",
		"SwitchWait" => "请稍后，正在切换账号中~",
		"DownloadLinkError" => "获取下载链接失败",
		"DatabaseError" => "数据库错误",
		"DownloadLinkSuccess" => "获取下载链接成功",
		"DownloadLink" => "下载链接",
		"Close" => "关闭",
		"IndexTitle" => "百度网盘直链解析",
		"ShareLink" => "请输入分享链接(可输入带提取码链接)",
		"SharePassword" => "请输入提取码(没有留空)",
		"PassWord" => "请输入密码",
		"PassWordVerified" => "您的设备在短期内已经验证过，无需再次输入密码。",
		"Submit" => "提交",
		"HelpPage" => '
	<div class="row justify-content-center">
		<div class="col-md-7 col-sm-8 col-11">
			<div class="alert alert-primary" role="alert">
				<h5 class="alert-heading">下载提示</h5>
				<hr />
				<p class="card-text">因百度限制，需修改浏览器 User Agent 后下载。你可以在下方选择你喜欢的方式进行下载。<br />
					<div class="page-inner">
						<section class="normal" id="section-">
							<div id="IDM"><a class="anchor" href="#IDM"></a>
								<h4>IDM (推荐)</h4>
							</div>
							<ol>
								<li>选项 -> 下载 -> 手动添加任务时使用的用户代理（UA）-> 填入 <b>netdisk</b></li>
								<li><b>右键复制下载链接</b>（如果 直接点击 或 右键调用IDM 将传入浏览器的 UA 导致下载失败），在 IDM 新建任务，粘贴链接即可下载。</li>
							</ol>
							<div id="Chrome"><a class="anchor" href="#Chrome"></a>
								<h4>Chrome 浏览器</h4>
							</div>
							<ol>
								<li>安装浏览器扩展程序 <a href="https://chrome.google.com/webstore/detail/user-agent-switcher-for-c/djflhoibgkdhkhhcedjiklpkjnoahfmg" target="_blank">User-Agent Switcher for Chrome</a></li>
								<li>右键点击扩展图标 -> 选项, New User-Agent String 填入 <b>netdisk</b></li>
								<li>Group 填入 百度网盘, Append? 选择 Replace, Indicator Flag 填入 Log，点击 Add 保存</li>
								<li>保存后点击扩展图标，出现“百度网盘”，进入并选择后下载。</li>
							</ol>
						</section>
						<script>
							$(".anchor").attr("target", "_self").prepend(`<svg viewBox="0 0 16 16" version="1.1" width="16" height="16"><path fill-rule="evenodd" d="M7.775 3.275a.75.75 0 001.06 1.06l1.25-1.25a2 2 0 112.83 2.83l-2.5 2.5a2 2 0 01-2.83 0 .75.75 0 00-1.06 1.06 3.5
							3.5 0 004.95 0l2.5-2.5a3.5 3.5 0 00-4.95-4.95l-1.25 1.25zm-4.69 9.64a2 2 0 010-2.83l2.5-2.5a2 2 0 012.83 0 .75.75 0 001.06-1.06 3.5 3.5 0 00-4.95 0l-2.5 2.5a3.5 3.5 0 004.95 4.95l1.25-1.25a.75.75 0 00-1.06-1.06l-1.25 1.25a2 2 0 01-2.83 0z"/></svg>`);
						</script>
					</div>
				</p>
			</div>
		</div>
	</div>'
	],
];

$lang['zh'] = $lang['zh-CN']; // 将 zh 的值设为和 zh-CN 相同

define('BrowserLanguage', $_SERVER["HTTP_ACCEPT_LANGUAGE"]); // 浏览器传入的语言（Accept-Language）（一个字符串）

function setLanguage()
{
	global $lang; // 支持的语言列表
	$languages = []; // 排序后的浏览器语言列表
	$qs = []; // 临时变量

	define('BrowserLanguages', explode(",", BrowserLanguage)); // 浏览器传入的语言列表（Accept-Language）一个 Array
	foreach (BrowserLanguages as &$value) { // 遍历浏览器语言列表
		if (preg_match('#([A-Za-z0-9\-]{1,8});q=(\d(.\d{1,3})?)#', $value, $matches)) { // 判断是否有优先级（;q=x.x）
			$qs[$matches[2]] = $matches[1]; // 如果有，加入临时变量 qs
		} else {
			array_push($languages, $value); // 如果没有，直接加入排序后语言列表
		}
	}
	krsort($qs); // 排序 qs
	foreach (array_values($qs) as &$value) { // 遍历 qs
		array_push($languages, $value); // 将 qs 的值一个个加入语言列表
	}
	unset($qs); // 删除 qs

	foreach ($languages as &$value) { // 遍历排序后的浏览器支持语言列表
		if (array_key_exists($value, $lang)) { // 当发现第一个支持的
			define('Lang', $value); // 定义 Lang 为选择的语言
			break; // 停止遍历
		}
	}
}

setLanguage(); // 自动决定语言

if (!defined('Lang')) { // 如果没有支持的语言
	define('Lang', 'zh-CN'); // 设为中文
	echo "<div>该项目不支持您的语言，以下为中文版本。</div>"; // 输出没有支持的语言提示
}

define("Language", $lang[Lang]); // 定义使用的语言
header('Content-Language: ' . Lang); // 输出响应头