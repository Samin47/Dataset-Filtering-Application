<?php

namespace App\Http\Controllers;

use App\Models\Dataset;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redis;


class DatasetController extends Controller
{

    public function index(Request $request)
    {
        if ($request->filled(['birth_year']) || $request->filled(['birth_month'])) { //for filter

                // Initialize cache key
                $filteredCacheKey = '';
        
                $filteredCacheKey = 'filtered_data_' . md5(serialize($request->only(['birth_year', 'birth_month']))) . '_page_' . $request->input('page', 1);
        
                if (!empty($filteredCacheKey) && Redis::exists($filteredCacheKey)) {

                    $dataset = unserialize(Redis::get($filteredCacheKey)); // if data exists in cache, retrieve it 
                    
                } else {
                    
                    $query = Dataset::query();
        
                    if ($request->has('birth_year') && $request->input('birth_year') !== null) {
                        $query->whereYear('date_of_birth', $request->input('birth_year'));
                    }
        
                    if ($request->has('birth_month') && $request->input('birth_month') !== null) {
                        $query->whereMonth('date_of_birth', $request->input('birth_month'));
                    }
        
                    $dataset = $query->orderBy('date_of_birth')->paginate(20);
        
                    // Store paginated data in cache for 60 seconds
                    if (!empty($filteredCacheKey)) {
                        Redis::setex($filteredCacheKey, 60, serialize($dataset));
                    }
                }
            }

        else { //without filter

            $initialCacheKey = 'initial_dataset' . '_page_' . $request->input('page', 1);

            if (Redis::exists($initialCacheKey)) {
                $dataset = unserialize(Redis::get($initialCacheKey));  // if data exists in cache, retrieve it 
            } else {
                $dataset = Dataset::orderBy('date_of_birth')->paginate(20);
            
                Redis::setex($initialCacheKey, 60, serialize($dataset)); // else store dataset in cache for 60 seconds
            }
        }

        return view('dataset.index', compact('dataset'));
    }



}
