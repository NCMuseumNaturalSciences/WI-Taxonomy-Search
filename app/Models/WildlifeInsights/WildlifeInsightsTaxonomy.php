<?php

namespace App\Models\WildlifeInsights;

use Illuminate\Database\Eloquent\Model;
use ScoutElastic\Searchable;
use App\WildlifeInsightsTaxonomyIndexConfigurator;

class WildlifeInsightsTaxonomy extends Model
{
    use Searchable;
    protected $table = 'wi_taxonomy';

    /**
     * @var string
     */
    protected $indexConfigurator = WildlifeInsightsTaxonomyIndexConfigurator::class;

    /**
     * @var array
     */
    protected $searchRules = [
        //
    ];

    /**
     * @var array
     */
    protected $mapping = [
        "properties" => [
            "_order" => [
                "type" => "text"
            ],
            "class" => [
                "type" => "text"
            ],
            "commonNameEnglish" => [
                "type" => "text"
            ],
            "family" => [
                "type" => "text"
            ],
            "genus" => [
                "type" => "text"
            ],
            "species" => [
                "type" => "text"
            ],
            "subspecies" => [
                "type" => "text"
            ],
            "value" => [
                "type" => "text"
            ]
        ]
    ];

    public function searchableAs()
    {
        return 'taxonomy_idx';
    }


    public function toSearchableArray()
    {
        $array = $this->toArray();
        return array(
            'id' => $array['id'],
            'class' => $array['class'],
            '_order' => $array['_order'],
            'family' => $array['family'],
            'genus' => $array['genus'],
            'species' => $array['species'],
            'subspecies' => $array['subspecies'],
            'commonNameEnglish' => $array['commonNameEnglish'],
        );
    }
}
