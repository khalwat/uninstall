# Uninstall plugin for Craft CMS

Uninstall misbehaving plugins from the command line.  Usage: `./craft/app/etc/console/yiic uninstall --plugin=<pluginHandle>`

**Installation**

1. Unzip file and place `uninstall` directory into your `craft/plugins` directory
2.  -OR- do a `git clone https://github.com/khalwat/uninstall.git` directly into your `craft/plugins` folder.  You can then update it with `git pull`
3. Install plugin in the Craft Control Panel under Settings > Plugins
4. The plugin folder should be named `uninstall` for Craft to see it.  GitHub recently started appending `-master` (the branch name) to the name of the folder for zip file downloads.

##What's it for?

Occasionally, plugins can malfunction to the point where you can't even access the Admin CP to uninstall them.  Yes, you can just delete the plugin, but that doesn't allow the plugin to clean up after itself, remove any tables it created, etc.

A fairly typical scenario (at least for me) is that you're developing a Craft plugin, and you make a mistake.  Craft is spewing errors, your dog looks at you condescendingly, the place is on fire, and you're looking for an exit.

You'd normally have to either delete the plugin, or go into mysql to do a `mysql> delete from craft_plugins where id = 47;` and then delete the malformed tables your plugin created with `mysql> drop table craft_seomatic_meta;` or what have you.  It gets old fast, and no one wants to get old fast.

The Uninstall plugin lets you trigger the normal Craft uninstall process for a plugin from the command line, so Craft and your plugin can clean up after themselves properly.

It'll work even when the Admin CP isn't working, in most cases.

##Using Uninstall

Using Uninstall is pretty easy; just `ssh` into the server your Craft install is running on, `cd` to the Craft project directory and do:

	./craft/app/etc/console/yiic uninstall --plugin=<pluginHandle>

Note that the `<pluginHandle>` is case sensitive, and is simply [your plugin’s handle](https://craftcms.com/docs/plugins/setting-things-up#your-primary-plugin-class).  This is not the same as the human-readable name of the plugin.  Here's an example of Uninstall in operation:

	vagrant@homestead:~/sites/nystudio107$ ./craft/app/etc/console/yiic uninstall --plugin=Seomatic
	Seomatic uninstalled.  Have a nice day.

This just runs `craft()->plugins->uninstallPlugin();` to give Craft and your plugin a chance to clean up and uninstall properly.

##Multi-environment configs

If you're using Craft on a [multi-environment config](https://craftcms.com/docs/multi-environment-configs) (which presumably you are if you're doing development), keep in mind that the `$_SERVER['SERVER_NAME']` may not match any of your criteria in `craft/config/db.php` when it runs from the command line with `yiic`.

This will cause `yiic` to spew errors when you try to use it.  To alleviate this, just assign some sane defaults to your `'*'` settings in `craft/config/db.php`, such as this:

	'*' => array(
		// The prefix to use when naming tables. This can be no more than 5 characters.
		'tablePrefix' => 'craft',

		// The database server name or IP address. Usually this is 'localhost' or '127.0.0.1'.
		'server' => 'localhost',
	
		// The database username to connect with.
		'user' => 'homestead',
	
		// The database password to connect with.
		'password' => 'secret',
	
		// The name of the database to select.
		'database' => 'nystudio',
	),


## Changelog

### 1.0.0 -- 2015.12.08

* Initial release
