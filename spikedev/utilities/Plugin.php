<?php

namespace spikedev\utilities;
use System\Classes\PluginBase;
use \Cms\Models\ThemeData;

class Plugin extends PluginBase
{

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name' => 'Spikedev Utilities',
            'description' => 'Provides additional cms features',
            'author' => 'Spikedevelopment',
            'icon' => 'icon-leaf'
        ];
    }


    /**
     * Set up plugin.
     *
     * @return void
     */

    public function boot()
    {
    
    }


    /**
     * Register settings.
     *
     * @return array
     */

    public function registerSettings()
    {
        return [
            'settings' => [
                'label'       => 'Site Settings',
                'description' => 'Manage site settings.',
                'category'    => 'Site',
                'icon'        => 'icon-cog',
                'class'       => 'Spikedev\Utilities\Models\Settings',
                'order'       => 500,
                'keywords'    => 'security location',
                'permissions' => ['spikedev.users.access_settings']
            ]
        ];
    }

}