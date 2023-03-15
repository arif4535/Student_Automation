<?php
/**
 * WordPress için başlangıç ayar dosyası.
 *
 * Bu dosya kurulum sırasında wp-config.php dosyasının oluşturulabilmesi için
 * kullanılır. İsterseniz bu dosyayı kopyalayıp, ismini "wp-config.php" olarak değiştirip,
 * değerleri girerek de kullanabilirsiniz.
 *
 * Bu dosya şu ayarları içerir:
 * 
 * * MySQL ayarları
 * * Gizli anahtarlar
 * * Veritabanı tablo ön eki
 * * ABSPATH
 * 
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL ayarları - Bu bilgileri servis sağlayıcınızdan alabilirsiniz ** //
/** WordPress için kullanılacak veritabanının adı */
define( 'DB_NAME', 'polo' );

/** MySQL veritabanı kullanıcısı */
define( 'DB_USER', 'polo' );

/** MySQL veritabanı parolası */
define( 'DB_PASSWORD', '123456' );

/** MySQL sunucusu */
define( 'DB_HOST', 'localhost' );

/** Yaratılacak tablolar için veritabanı karakter seti. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Veritabanı karşılaştırma tipi. Herhangi bir şüpheniz varsa bu değeri değiştirmeyin. */
define( 'DB_COLLATE', '' );

/**#@+
 * Eşsiz doğrulama anahtarları ve tuzlar.
 *
 * Her anahtar farklı bir karakter kümesi olmalı!
 * {@link http://api.wordpress.org/secret-key/1.1/salt WordPress.org secret-key service} servisini kullanarak yaratabilirsiniz.
 * Çerezleri geçersiz kılmak için istediğiniz zaman bu değerleri değiştirebilirsiniz. Bu tüm kullanıcıların tekrar giriş yapmasını gerektirecektir.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '_#9l<:~oeB2`v4m5La2PM?)B4(wMko%5PH5)hi=?.Bsb}]Y6R3Oz5OAoC1ce)QlH' );
define( 'SECURE_AUTH_KEY',  '(!5XL)k<e@+}KyDy%l#T~2W<T4(B$O2|lUOc#)indq/z-*fJOKm-n-?/ut5Ft>~|' );
define( 'LOGGED_IN_KEY',    '?4)x^#rQ7;?#aHjhF;<?;d;gI[!uJFh;7wHdQu|aw2#*7*1jEvlo-$M?`Fa(L9l$' );
define( 'NONCE_KEY',        'RDo&u~ }v*_lMGvktgek9GIuIF}I>JT17[NL^zmtkJ!iluKWU[XuI|r()WJ@mcvX' );
define( 'AUTH_SALT',        '>as>$m_6mkP/*OQnj%;v`C[<~>kw^rbLdt@|eS}}pAr$-mV}kNdB>/{)_K}RD~jg' );
define( 'SECURE_AUTH_SALT', 'bvqOT~ol@$1*);rXky~ae<jPu,,xQDgcbM6jG|&a-GMp*G>;NL2oZA0O 7c#UaDG' );
define( 'LOGGED_IN_SALT',   'NZ,*?Rn?<E1dAX}4+ty;+2:<#^!3XlrYU9Zt<(b+MT]fRav2)2`i+SnNT6ooi$S_' );
define( 'NONCE_SALT',       '|;hLQxZ^H5*l1tC)ntKs#t8a@UkI@?;YKr.gql(a|[=tCl.yKdlt|GK1(9<Vq;>I' );

/**#@-*/

/**
 * WordPress veritabanı tablo ön eki.
 *
 * Tüm kurulumlara ayrı bir önek vererek bir veritabanına birden fazla kurulum yapabilirsiniz.
 * Sadece rakamlar, harfler ve alt çizgi lütfen.
 */
$table_prefix = 'wp_';

/**
 * Geliştiriciler için: WordPress hata ayıklama modu.
 *
 * Bu değeri "true" yaparak geliştirme sırasında hataların ekrana basılmasını sağlayabilirsiniz.
 * Tema ve eklenti geliştiricilerinin geliştirme aşamasında WP_DEBUG
 * kullanmalarını önemle tavsiye ederiz.
 * 
 * Hata ayıklama için kullanabilecek diğer sabitler ile ilgili daha fazla bilgiyi
 * belgelerden edinebilirsiniz.
 * 
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Hepsi bu kadar. Mutlu bloglamalar! */

/** WordPress dizini için mutlak yol. */
if ( ! defined( 'ABSPATH' ) ) {
    define( 'ABSPATH', __DIR__ . '/' );
}

/** WordPress değişkenlerini ve yollarını kurar. */
require_once ABSPATH . 'wp-settings.php';