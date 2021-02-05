Joomla Front End Component Skeleton
===================================

A starting point for a front-end Joomla component.

This component should make it easier to start creating a front-end only component.
The idea is that you want to show something on the front end and don't need any admin facility.

Data is assumed to come from an API of some sort via PHP, but it could just as easily come from a different database, or you not need any data ata all.

For example, if you just want to show some complex HTML that would be difficult in an Article, or you want some Javascript to load stuff via AJAX, this component will start you off nicely.
If you don't need the model, you can delete that.


PHP-CLI
-------

You'll need PHP-CLI installed to run the build script.


Windows
-------

Currently, there's a .bat file to allow you enter the arguments for the build script.
If you're not using windows you can use the PHP-CLI directly by replacing the placeholders in this command:
`php -f _build-new-frecom/index.php owner=%Ow% name=%Nm% description=%Ds%`


About the `com__frecom.script.php` file
-----------------------------------------

As this is a front-end comnponent, we don't need (or want) a menu item showing up in the 'Components' Admin menu.
This script removes that menu item for you on installation.