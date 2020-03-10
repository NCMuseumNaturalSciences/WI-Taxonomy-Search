<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\StaticArray;
use DB;
use Response;
use App\Models\WildlifeInsights\WildlifeInsightsTaxonomy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Rules\TaxonomyScoreSearchRule;
use App\Rules\TaxonomyExactMatchSearchRule;

class WildlifeInsightsTaxonomyController extends Controller
{

    public function searchElasticTaxonomy(Request $request)
    {
        $terms = $request->get('terms');
        $type = $request->get('search_type');
        $termsA = str_replace("_", ' ', $terms);
        $termsB = str_replace("\n", ',', $termsA);
        $removals = StaticArray::$searchRemovals;
        $termArray = explode(",",$termsB);
        $results = array();

        foreach($termArray as $value) {
            $v = str_replace($removals,'',$value);
            if($type == 'exact') {
                $result = WildlifeInsightsTaxonomy::search($v)
                    ->rule(TaxonomyExactMatchSearchRule::class)
                    ->from(0)
                    ->take(250)
                    ->get();
            }
            else if($type == 'fuzzy') {
                $result = WildlifeInsightsTaxonomy::search($v)
                    ->rule(TaxonomyScoreSearchRule::class)
                    ->from(0)
                    ->take(250)
                    ->get();
            }
            else {
                $results = array('error', 'Search Error');
            };
            $results[] = array(
                'term' => $v,
                'matches' => $result,
                'matchesCount' => $result->count()
            );
        }
        $response = array(
            'data' => $results,
            'terms' => $termArray
        );
        //    $response = $results;
        return Response::json($response);
    }


    public function getWildlifeInsightsTaxonomyPaginate()
    {
        try {
            $statusCode = 200;
            $response = [
                'results'  => []
            ];

            $data = WildlifeInsightsTaxonomy::select([
                'wi_id',
                'class',
                '_order',
                'suborder',
                'superfamily',
                'family',
                'subfamily',
                'genus',
                'species',
                'subspecies',
                'taxonLevel',
                'authority',
                'commonNameEnglish',
                'taxonomyType',
                'iucnCategoryId',
                'scientificName',
                'uniqueIdentifier'
                ]);
            $response = array($data->paginate(48));
        }
        catch (Exception $e) {
            $statusCode = 400;
        }
        finally {
            return Response::json($response, $statusCode, array(), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        }
    }


    public function getTaxonomyData(Request $request)
    {

        try {
            $statusCode = 200;
            $data = WildlifeInsightsTaxonomy::select([
                'id',
                'class',
                '_order',
                'family',
                'genus',
                'species',
                'taxonLevel',
                'commonNameEnglish',
                'taxonomyType',
                'uniqueIdentifier',
                'authority'])
                ->search($request->get('q'))
                ->get();
            $cnt = $data->count();
            if($cnt > 0) {
                $response = $data;
            }
            else {
                $response = ['error' => 'Please try again'];
            }
        }
        catch (Exception $e) {
            $statusCode = 400;
        }
        finally {
            return Response::json($response, $statusCode, array(), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        }
    }



}
