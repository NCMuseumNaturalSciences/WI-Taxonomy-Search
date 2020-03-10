<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StaticArray extends Model
{
    public static $testTerms = [
        'cooperii',
        'Abrocomidae',
        'Abrocoma bennettii',
        'Cisticolidae',
        'Soricidae',
        'Psittacidae',
        'Psittacidae',
        'Dasyuromorphia',
        'Podomys',
        'Cremnomys',
        'Chlorornis',
        'scheepmakeri',
        'altarium',
        'chalconota',
        'pyrrhoptera',
        'macleari',
        'Black-faced Prinia',
        'Oriental Magpie-Robin',
        'Scaly-tailed Squirrel',
        'Brown Gerygone',
        'Ground Squirrel'
    ];
    public static $searchRemovals = [
        'Unknown',
        'unknown',
        'Small',
        'small',
        'Large',
        'large',
        'Species',
        'species',
        'Unlabeled',
        'unlabeled',
        'Unidentified',
        'unidentified',
        'Empty',
        'empty'
    ];
}
