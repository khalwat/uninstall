<?php
namespace Craft;

class UninstallPlugin extends BasePlugin
{
    function getName()
    {
        return Craft::t('Uninstall Plugin');
    }

    public function getDescription()
    {
        return 'Uninstall misbehaving plugins from the command line.  Usage: ./craft/app/etc/console/yiic uninstall --plugin=<pluginHandle>';
    }
    
    public function getDocumentationUrl()
    {
        return 'https://github.com/khalwat/uninstall/blob/master/README.md';
    }
    
    public function getReleaseFeedUrl()
    {
        return 'https://raw.githubusercontent.com/khalwat/uninstall/master/releases.json';
    }
    
    public function getVersion()
    {
        return '1.0.0';
    }

    public function getSchemaVersion()
    {
        return '1.0.0';
    }

    function getDeveloper()
    {
        return 'nystudio107';
    }

    function getDeveloperUrl()
    {
        return 'http://nystudio107';
    }

    public function hasCpSection()
    {
        return false;
    }
} /* -- UninstallPlugin */