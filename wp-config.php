<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en « wp-config.php » et remplir les
 * valeurs.
 *
 * Ce fichier contient les réglages de configuration suivants :
 *
 * Réglages MySQL
 * Préfixe de table
 * Clés secrètes
 * Langue utilisée
 * ABSPATH
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'lmkt1763_chalets_et_caviar' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'lmkt1763_gaetan' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', 'Oracle$1986' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/**
 * Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define( 'DB_COLLATE', '' );

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'E>YKFxcPvq`BS#J22 :WZ~C5Ly[ll-?at[x7SJ@^aL5oj^oGJugs=+E<*RIPAhmD' );
define( 'SECURE_AUTH_KEY',  'N7wRD?4uE+#/+K$^EjFnM(uU= H8~lM{2+^YWD<HL]MrqYG/]BVA,Tu$!4v9mW`e' );
define( 'LOGGED_IN_KEY',    'j*xQL1$;SDbEd2h-s>y8S`R&F$J<yiTHB3`@*mDTTueOYVNgW@64{h[Ri-6,rB?*' );
define( 'NONCE_KEY',        '0}vwwh&7{&g9/tlGUQI.9}eiFU<F_9Sk(G4KVT0!~G3}V4i=6*Y@>=S$o+mzH-tN' );
define( 'AUTH_SALT',        '7/<&cp`?QSw%&ZM$W=/NT;oiEQzQ5xNVK{Zr<D10l4Q;,;^JXmm;iUz{&0Y+tjQT' );
define( 'SECURE_AUTH_SALT', ' /H&AY- S|7Nc7[e|ljX6=Vrr S:CM@f#V4ZA*v9gO&g,44#4~T>rb 9Jv#KiDqq' );
define( 'LOGGED_IN_SALT',   '`(n^<H8HV-R$=+s*Sw][=YDCqTD![(@9zZ}j]Z/`.aU,u,0:%rP[iza?T[c`_|kB' );
define( 'NONCE_SALT',       '({|rc]N~@]bw7LU]V>%NP,oI7a~P=}v^UFF-F+-c@/Kb<~:+J42Mh~ XN9~!L+gi' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wpv_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );
