<?php

namespace App;

use ScoutElastic\IndexConfigurator;
use ScoutElastic\Migratable;

class WildlifeInsightsTaxonomyIndexConfigurator extends IndexConfigurator
{
    use Migratable;
    protected $name = 'taxonomy_idx';

    /**
     * @var array
     */
    protected $settings = [
    ];
}
