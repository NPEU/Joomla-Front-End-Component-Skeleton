<?php
/**
 * @package     Joomla.Site
 * @subpackage  com__frecom
 *
 * @copyright   Copyright (C) {{OWNER}} {{YEAR}}.
 * @license     MIT License; see LICENSE.md
 */

defined('_JEXEC') or die;

/**
 * Removes component entry in the admin menu, as it's front-end only.
 */
class com__frecomInstallerScript
{
    /**
     * This method is called after a component is installed.
     *
     * @param  \stdClass $parent - Parent object calling this method.
     *
     * @return void
     */
    public function install($parent)
    {
    }

    /**
     * This method is called after a component is uninstalled.
     *
     * @param  \stdClass $parent - Parent object calling this method.
     *
     * @return void
     */
    public function uninstall($parent)
    {
    }

    /**
     * This method is called after a component is updated.
     *
     * @param  \stdClass $parent - Parent object calling object.
     *
     * @return void
     */
    public function update($parent)
    {
    }

    /**
     * Runs just before any installation action is preformed on the component.
     * Verifications and pre-requisites should run in this function.
     *
     * @param  string    $type   - Type of PreFlight action. Possible values are:
     *                           - * install
     *                           - * update
     *                           - * discover_install
     * @param  \stdClass $parent - Parent object calling object.
     *
     * @return void
     */
    public function preflight($type, $parent)
    {
    }

    /**
     * Runs right after any installation action is preformed on the component.
     *
     * @param  string    $type   - Type of PostFlight action. Possible values are:
     *                           - * install
     *                           - * update
     *                           - * discover_install
     * @param  \stdClass $parent - Parent object calling object.
     *
     * @return void
     */
    public function postflight($type, $parent)
    {
        if ($type != 'install') {
            return;
        }


        $manifest = $parent->getParent()->getManifest();
        $name = (string) $manifest->name;

        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
        $query->select('id');
        $query->from('#__menu');
        $query->where('title = "' . strtoupper($name) . '_MENU"');
        $db->setQuery($query);
        $ids = $db->loadColumn();

        $db = JFactory::getDbo();
        $table = JTable::getInstance('menu');

        if ($error = $db->getErrorMsg())
        {
            return false;
        }
        elseif (!empty($ids))
        {
            // Iterate the items to delete each one.
            foreach ($ids as $menu_id)
            {
                if (!$table->delete((int) $menu_id))
                {
                    return false;
                }
            }
            // Rebuild the whole tree
            $table->rebuild();
        }
        return true;
    }
}