<?php
/**
 * @package     Joomla.Site
 * @subpackage  com__frecom
 *
 * @copyright   Copyright (C) {{OWNER}} {{YEAR}}.
 * @license     MIT License; see LICENSE.md
 */

#use Joomla\CMS\Factory;
#use Joomla\CMS\Language\Multilanguage;
#use Joomla\CMS\Language\Text;
#use Joomla\CMS\Layout\FileLayout;
#use Joomla\CMS\Layout\LayoutHelper;
#use Joomla\CMS\Router\Route;
#use Joomla\CMS\Session\Session;
#use Joomla\Component\Fields\Administrator\Helper\FieldsHelper;

defined('_JEXEC') or die;
?>
<h1><?php echo $this->msg; ?></h1>