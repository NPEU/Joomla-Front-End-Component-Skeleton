<?php
/**
 * @package     Joomla.Site
 * @subpackage  com__frecom
 *
 * @copyright   Copyright (C) {{OWNER}} {{YEAR}}.
 * @license     MIT License; see LICENSE.md
 */

defined('_JEXEC') or die;

// Import Joomla view library
jimport('joomla.application.component.view');

/**
 * HTML View class for the _Frecom Component
 */
class _FrecomView_Frecom extends JViewLegacy
{
    /**
     * Execute and display a template script.
     *
     * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
     *
     * @return  mixed  A string if successful, otherwise an Error object.
     */
    public function display($tpl = null)
    {
        // Assign data to the view
        $this->msg = 'Get from API';

        // Check for errors.
        if (count($errors = $this->get('Errors')))
        {
            JLog::add(implode('<br />', $errors), JLog::WARNING, 'jerror');

            return false;
        }
        // Display the view
        parent::display($tpl);
    }
}