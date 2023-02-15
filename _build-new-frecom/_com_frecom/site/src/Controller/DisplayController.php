<?php
/**
 * @package     Joomla.Site
 * @subpackage  com__frecom
 *
 * @copyright   Copyright (C) {{OWNER}} {{YEAR}}.
 * @license     MIT License; see LICENSE.md
 */

namespace {{OWNER}}\Component\_Frecom\Site\Controller;

defined('_JEXEC') or die;

use Joomla\CMS\MVC\Controller\BaseController;
use Joomla\CMS\Factory;


/**
 * _Frecom Component Controller
 * @since  0.0.2
 */
class DisplayController extends BaseController {

    public function display($cachable = false, $urlparams = array()) {
        $document = Factory::getDocument();
        $viewName = $this->input->getCmd('view', 'login');
        $viewFormat = $document->getType();

        $view = $this->getView($viewName, $viewFormat);

        $view->document = $document;
        $view->display();
    }

}