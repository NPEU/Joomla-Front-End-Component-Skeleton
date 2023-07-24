<?php
/**
 * @package     Joomla.Site
 * @subpackage  com__frecom
 *
 * @copyright   Copyright (C) {{OWNER}} {{YEAR}}.
 * @license     MIT License; see LICENSE.md
 */

namespace {{OWNER}}\Component\_Frecom\Site\View\_Frecom;

defined('_JEXEC') or die;

#use Joomla\CMS\Factory;
use Joomla\CMS\MVC\View\HtmlView as BaseHtmlView;
use Joomla\CMS\Log\Log;
#use Joomla\CMS\Uri\Uri;
#use Joomla\CMS\Helper\TagsHelper;
#use Joomla\CMS\Language\Text;
#use Joomla\CMS\Router\Route;
#use Joomla\CMS\Plugin\PluginHelper;
#use Joomla\Event\Event;

/**
 * _Frecom Component HTML View
 */
class HtmlView extends BaseHtmlView {


    public function display($template = null)
    {
        // Assign data to the view
        $this->msg = 'Get from API';

        // Check for errors.
        $errors = $this->get('Errors', false);

        if (!empty($errors)) {
            Log::add(implode('<br />', $errors), Log::WARNING, 'jerror');

            return false;
        }

        // Call the parent display to display the layout file
        parent::display($template);
    }

}