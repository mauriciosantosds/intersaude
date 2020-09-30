<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/pt-br:Editando_wp-config.php
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'planoint_wp');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'root');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', '3421');

/** Nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Charset do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8mb4');

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '78eWs([WGo-9O I<t/f;,ofJzIi,?AF0B7]MRCL=;P! hgCdenymT%6z}:o}Z_uH');
define('SECURE_AUTH_KEY',  'h}n;v!9Xderwn?-ysmf4i>|^{<UWn&y<jqylo8.Jii`YuarsD*sRyDhSHv2ZX6]g');
define('LOGGED_IN_KEY',    'b.nttP9)YNACSPMJ(@`3|FqfQk*>3h2IcJSj^*~BP<NH.oZ*cv)`O{>|LA2nMVx-');
define('NONCE_KEY',        '[`YJIf6!`hfZr&Y;Vg]V,6na!{U`mMrj5<TS$T^~ual!i &pPnzxJlLmSVWYw^0w');
define('AUTH_SALT',        '8}}{&G/cgc1uDbOxD]Njq<zgW$bh{.&0-v}9|SxT3@O@tg`lKD:l }3]m.%.UcPI');
define('SECURE_AUTH_SALT', 'P<,olZ.2@(ER<6 F44-i+ON2:$baNV ^_gt:aMeGT:mRGC?i3Oy:Is{N@bl>RVRs');
define('LOGGED_IN_SALT',   '=mc)],u=h&b~;M M<$oZ9GsEgw%e2l74AzAO(HxjriDdm0e+a|J!O[X6?.c[B}Zv');
define('NONCE_SALT',       'HC^lYoA(OV42r*_iC</v_8h_B$:/s[elRh6`5~EY*:S8evM.wj!^&lU=Z/=E5O|[');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wp_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://codex.wordpress.org/pt-br:Depura%C3%A7%C3%A3o_no_WordPress
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Configura as variáveis e arquivos do WordPress. */
require_once(ABSPATH . 'wp-settings.php');
