
<!-- me -->
the entry point of my project is the public/index.php.
its allow me to handle the middleweres and routing system.

the .htaccess file pass all requests to public/index.php
the index.php require configs/config.php and app/helpers/helpers.php and routing/web.php.

the routing system place in /routes/web.php. handle the all requests to load the pages.
routing system send a request to controller and controller require the model of each tables that need and send data to views and load them.
