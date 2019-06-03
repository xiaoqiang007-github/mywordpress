<?php
//Begin Really Simple SSL Server variable fix
$_SERVER["HTTPS"] = "on";
//END Really Simple SSL

//Begin Really Simple SSL Load balancing fix
if ((isset($_ENV["HTTPS"]) && ("on" == $_ENV["HTTPS"]))
|| (isset($_SERVER["HTTP_X_FORWARDED_SSL"]) && (strpos($_SERVER["HTTP_X_FORWARDED_SSL"], "1") !== false))
|| (isset($_SERVER["HTTP_X_FORWARDED_SSL"]) && (strpos($_SERVER["HTTP_X_FORWARDED_SSL"], "on") !== false))
|| (isset($_SERVER["HTTP_CF_VISITOR"]) && (strpos($_SERVER["HTTP_CF_VISITOR"], "https") !== false))
|| (isset($_SERVER["HTTP_CLOUDFRONT_FORWARDED_PROTO"]) && (strpos($_SERVER["HTTP_CLOUDFRONT_FORWARDED_PROTO"], "https") !== false))
|| (isset($_SERVER["HTTP_X_FORWARDED_PROTO"]) && (strpos($_SERVER["HTTP_X_FORWARDED_PROTO"], "https") !== false))
) {
$_SERVER["HTTPS"] = "on";
}
//END Really Simple SSL

/**
 * WordPress基础配置文件。
 *
 * 这个文件被安装程序用于自动生成wp-config.php配置文件，
 * 您可以不使用网站，您需要手动复制这个文件，
 * 并重命名为“wp-config.php”，然后填入相关信息。
 *
 * 本文件包含以下配置选项：
 *
 * * MySQL设置
 * * 密钥
 * * 数据库表名前缀
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/zh-cn:%E7%BC%96%E8%BE%91_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL 设置 - 具体信息来自您正在使用的主机 ** //
/** WordPress数据库的名称 */
define('DB_NAME', 'xibushuju257257');

/** MySQL数据库用户名 */
define('DB_USER', 'xibushuju257257');

/** MySQL数据库密码 */
define('DB_PASSWORD', 'ZWQ257257');

/** MySQL主机 */
define('DB_HOST', 'localhost');

/** 创建数据表时默认的文字编码 */
define('DB_CHARSET', 'utf8');

/** 数据库整理类型。如不确定请勿更改 */
define('DB_COLLATE', '');

/**#@+
 * 身份认证密钥与盐。
 *
 * 修改为任意独一无二的字串！
 * 或者直接访问{@link https://api.wordpress.org/secret-key/1.1/salt/
 * WordPress.org密钥生成服务}
 * 任何修改都会导致所有cookies失效，所有用户将必须重新登录。
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '/zfn+kJ&<`J)^S4I,MfB<DO>chnO17$kDMTKuEcc2Fu*sZ`%{;Jt_=!?`]-TaT$&');
define('SECURE_AUTH_KEY',  'aN&DPJ2%mJm-@dy}@%oi I!3aB*057.H([|zo}t!E@_)%?ci,TP(_2?B+{JGh1o6');
define('LOGGED_IN_KEY',    '`QAk58,FeU=P43g4(t=ykQZu(C9/8S,a&Ix8p]]~q (aDh,rsoeIZkEbuq<wU8]O');
define('NONCE_KEY',        'vW;y)Hd*Eu@>Y`+Zm#F*j&G;*Z>jfkv_8<S*X,F@XVa&}{IVD;XAXPxKfaN#OB)|');
define('AUTH_SALT',        'c|o:d3(n1*/c/[9<O!RuF:O[{!nYk44*_o$D&[x3`@lXMZYi.{wQQTm $}]B7[af');
define('SECURE_AUTH_SALT', 'XAKFONvY1vg.X&qk:UuXDt>YNur(2_Q`n, +Gf%=v%XdSoe95>s0^m-iko=:y&`$');
define('LOGGED_IN_SALT',   'g>Kq~x?dWK=5Q5QzWn`ZuIn2BP~B,{&Lt,QLVGs}XbNn/&8uh2/e aSx8b!9)ObA');
define('NONCE_SALT',       'tK*uNg )>32R,3t.@t|bl;~.6c%&;[=)YcdNKC<|Pjs.LCzl>d9:P-|XJ9ldv{y9');

/**#@-*/

/**
 * WordPress数据表前缀。
 *
 * 如果您有在同一数据库内安装多个WordPress的需求，请为每个WordPress设置
 * 不同的数据表前缀。前缀名只能为数字、字母加下划线。
 */
$table_prefix  = 'wp_';

/**
 * 开发者专用：WordPress调试模式。
 *
 * 将这个值改为true，WordPress将显示所有用于开发的提示。
 * 强烈建议插件开发者在开发环境中启用WP_DEBUG。
 *
 * 要获取其他能用于调试的信息，请访问Codex。
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/**
 * zh_CN本地化设置：启用ICP备案号显示
 *
 * 可在设置→常规中修改。
 * 如需禁用，请移除或注释掉本行。
 */
define('WP_ZH_CN_ICP_NUM', true);

/* 好了！请不要再继续编辑。请保存本文件。使用愉快！ */

/** WordPress目录的绝对路径。 */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** 设置WordPress变量和包含文件。 */
require_once(ABSPATH . 'wp-settings.php');
