<?php namespace Uit\MinifyMe\Models;

use Model;

class Settings extends Model
{
    public $implement = ['System.Behaviors.SettingsModel'];

    // A unique code
    public $settingsCode = 'uit_minifyme_settings';

    // Reference to field configuration
    public $settingsFields = 'fields.yaml';
}