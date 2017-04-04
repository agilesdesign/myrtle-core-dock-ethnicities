<?php

namespace Myrtle\Core\Docks;

use Myrtle\Ethnicities\Models\Ethnicity;
use Myrtle\Ethnicities\Policies\EthnicityPolicy;

class EthnicitiesDock extends Dock
{
    /**
     * Description for Dock
     *
     * @var string
     */
    public $description = 'Makes ethnicities available to the Users Dock';

    /**
     * Explicit Gate definitions
     *
     * @var array
     */
    public $gateDefinitions = [
        'ethnicities.admin' => EthnicityPolicy::class . '@admin'
    ];

    /**
     * Policy mappings
     *
     * @var array
     */
    public $policies = [
        Ethnicity::class => EthnicityPolicy::class,
        EthnicityPolicy::class => EthnicityPolicy::class,
    ];

    /**
     * List of config file paths to be loaded
     *
     * @return array
     */
    public function configPaths()
    {
        return [
            'docks.' . self::class => dirname(__DIR__, 2) . '/config/docks/ethnicities.php',
            'abilities' => dirname(__DIR__, 2) . '/config/abilities.php',
        ];
    }

    /**
     * List of migration file paths to be loaded
     *
     * @return array
     */
    public function migrationPaths()
    {
        return [
            dirname(__DIR__, 2) . '/database/migrations',
        ];
    }

    /**
     * List of routes file paths to be loaded
     *
     * @return array
     */
    public function routes()
    {
        return [
            'admin' => dirname(__DIR__, 2) . '/routes/admin.php',
        ];
    }
}
