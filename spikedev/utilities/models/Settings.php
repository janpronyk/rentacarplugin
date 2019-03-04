<?php 

namespace Spikedev\Utilities\Models;

use Model;

class Settings extends Model
{
    public $implement = ['System.Behaviors.SettingsModel'];

    // A unique code
    public $settingsCode = 'spikedev_utilities_settings';

    // Reference to field configuration
    public $settingsFields = 'fields.yaml';

    public function __construct()
    {
        parent::__construct();


        // BackendMenu::setContext('October.System', 'system', 'settings');
        // SettingsManager::setContext('spikedev.utilities', 'settings');
    }
}