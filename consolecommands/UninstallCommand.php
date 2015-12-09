<?php
namespace Craft;

class UninstallCommand extends BaseCommand
{
	
public function actionIndex($plugin="")
	{
	if ($plugin)
	{
		echo craft()->plugins->uninstallPlugin($plugin);
		echo $plugin . " uninstalled.  Have a nice day.\n";
	}
	else
		echo "No plugin handle given.  Usage: ./craft/app/etc/console/yiic uninstall --plugin=<pluginHandle>\n";
	} /* -- actionIndex */
} /* -- class PluginCommand */
?>