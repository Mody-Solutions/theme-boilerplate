# Installation
- Install WordPress
- `cd /path/to/wordpress/public/directory` where you find the `wp-content` directory and `wp-config.php` file.
- `git clone git@github.com:Mody-Solutions/website.git web`
- `cd web`
- `composer install`
- `yarn`
- `yarn build`
- Edit your `wp-config.php` file to have the following lines just above the comment `/* That's all, stop editing! Happy publishing. */`:
```
define('WP_CONTENT_FOLDERNAME', 'web');
define('WP_CONTENT_DIR', ABSPATH . WP_CONTENT_FOLDERNAME);
define('WP_CONTENT_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/' . WP_CONTENT_FOLDERNAME);
```
