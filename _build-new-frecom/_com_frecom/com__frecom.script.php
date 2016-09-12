<?php
class com__frecomInstallerScript
{
	/**
	 * Constructor
	 *
	 * @param   JAdapterInstance  $adapter  The object responsible for running this script
	 */
	/*public function __constructor(JAdapterInstance $adapter)
	{
	}*/

	/**
	 * Called before any type of action
	 *
	 * @param   string  $route  Which action is happening (install|uninstall|discover_install)
	 * @param   JAdapterInstance  $adapter  The object responsible for running this script
	 *
	 * @return  boolean  True on success
	 */
	/*public function preflight($route, JAdapterInstance $adapter)
	{

	}*/

	/**
	 * Called after any type of action
	 *
	 * Removes the entry from the admin menu as this is a front-end only
	 * component.
	 *
	 * @param   string  $route  Which action is happening (install|uninstall|discover_install)
	 * @param   JAdapterInstance  $adapter  The object responsible for running this script
	 *
	 * @return  boolean  True on success
	 */
	public function postflight($route, JAdapterInstance $adapter)
	{
		if ($route != 'install') {
			return;
		}

		$manifest = $adapter->getParent()->getManifest();
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

	/**
	 * Called on installation
	 *
	 * @param   JAdapterInstance  $adapter  The object responsible for running this script
	 *
	 * @return  boolean  True on success
	 */
	/*public function install(JAdapterInstance $adapter)
	{
			echo "<pre>\n"; var_dump('install'); echo "</pre>\n";
	}*/

	/**
	 * Called on update
	 *
	 * @param   JAdapterInstance  $adapter  The object responsible for running this script
	 *
	 * @return  boolean  True on success
	 */
	/*public function update(JAdapterInstance $adapter)
	{

	}*/

	/**
	 * Called on uninstallation
	 *
	 * @param   JAdapterInstance  $adapter  The object responsible for running this script
	 */
	/*public function uninstall(JAdapterInstance $adapter)
	{

	}*/
}
?>