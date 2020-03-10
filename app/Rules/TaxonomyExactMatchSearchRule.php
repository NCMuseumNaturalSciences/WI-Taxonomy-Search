<?php

namespace App\Rules;

use ScoutElastic\SearchRule;

class TaxonomyExactMatchSearchRule extends SearchRule

{
    /**
     * @inheritdoc
     */
    public function buildHighlightPayload()
    {

    }

    /**
     * @inheritdoc
     */
    public function buildQueryPayload()
    {
        return [
            'must' => [
                'multi_match' => [
                    'query' => $this->builder->query,
                    'operator' => 'and'
                ]
            ]
        ];
    }
}
