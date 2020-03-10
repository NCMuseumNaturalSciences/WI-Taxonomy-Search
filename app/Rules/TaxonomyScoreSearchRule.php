<?php

namespace App\Rules;

use ScoutElastic\SearchRule;

class TaxonomyScoreSearchRule extends SearchRule
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
                    'fuzziness' => 'auto',
//                    'fuzziness' => 1,
                    'operator' => 'and'
                ]
            ]
        ];
    }
}
