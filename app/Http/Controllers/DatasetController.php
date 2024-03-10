<?php

namespace App\Http\Controllers;

use App\Models\Dataset;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redis;


class DatasetController extends Controller
{

    // public function index(Request $request)
    // {
        
    //     $cacheKey = 'filtered_data_' . md5(serialize($request->only(['birth_year', 'birth_month'])));


    //     // Check if data exists in cache
    //     if (Redis::exists($cacheKey)) {
    //         echo "<br>"."hello";
    //         // Retrieve data from cache
    //         $dataset = unserialize(Redis::get($cacheKey));
    //     } else {

    //         $query = Dataset::query();
        
    //         if ($request->has('birth_year') && $request->input('birth_year') !== null) {
    //             $query->whereYear('date_of_birth', $request->input('birth_year'));
    //         }
            

    //         if ($request->has('birth_month') && $request->input('birth_month') !== null) {
    //             $query->whereMonth('date_of_birth', $request->input('birth_month'));
    //         }

    //         // Paginate the dataset before storing it in the cache
    //         $dataset = $query->orderBy('date_of_birth')->paginate(20);

    //         // Store paginated data in cache for 60 seconds
    //         Redis::setex($cacheKey, 60, serialize($dataset));
    //     }

    //     return view('dataset.index', compact('dataset'));
    // }
//     public function index(Request $request)
// {
//     // Initialize cache key variable
//     $cacheKey = '';

//     // Check if filtering parameters are present in the request
//     if ($request->has(['birth_year', 'birth_month'])) {
//         // Construct cache key with filtering parameters and current page
//         $cacheKey = 'filtered_data_' . md5(serialize($request->only(['birth_year', 'birth_month']))) . '_page_' . $request->input('page', 1);
//     }

//     // Check if data exists in cache
//     if (!empty($cacheKey) && Redis::exists($cacheKey)) {
//         // Retrieve data from cache
//         echo "a";
//         $dataset = unserialize(Redis::get($cacheKey));
//     } else {
//         // Retrieve dataset from the database based on filtering parameters
//         $query = Dataset::query();

//         if ($request->has('birth_year') && $request->input('birth_year') !== null) {
//             $query->whereYear('date_of_birth', $request->input('birth_year'));
//         }

//         if ($request->has('birth_month') && $request->input('birth_month') !== null) {
//             $query->whereMonth('date_of_birth', $request->input('birth_month'));
//         }

//         // Paginate the dataset before storing it in the cache
//         $dataset = $query->orderBy('date_of_birth')->paginate(20);

//         // Store paginated data in cache for 60 seconds
//         if (!empty($cacheKey)) {
//             Redis::setex($cacheKey, 60, serialize($dataset));
//         }
//     }

//     return view('dataset.index', compact('dataset'));
// }

// public function index(Request $request)
// {
//     $initialCacheKey = 'initial_dataset';

//     // Check if data exists in cache for the initial dataset
//     if (Redis::exists($initialCacheKey)) {
//         echo "initial";
//         $dataset = unserialize(Redis::get($initialCacheKey));
//     } else {

//         $dataset = Dataset::orderBy('date_of_birth')->paginate(20);

//         Redis::setex($initialCacheKey, 60, serialize($dataset));
//     }

//     // Initialize cache key variable for the filtered dataset
//     $filteredCacheKey = '';

//     // Check if filtering parameters are present in the request
//     if ($request->has(['birth_year', 'birth_month'])) {
//         // Construct cache key with filtering parameters and current page
//         $filteredCacheKey = 'filtered_data_' . md5(serialize($request->only(['birth_year', 'birth_month']))) . '_page_' . $request->input('page', 1);
//     }

//     // Check if data exists in cache for the filtered dataset
//     if (!empty($filteredCacheKey) && Redis::exists($filteredCacheKey)) {
//         // Retrieve data from cache for the filtered dataset
//         echo "filter";
//         $dataset = unserialize(Redis::get($filteredCacheKey));
//     } else {
//         // Retrieve dataset from the database based on filtering parameters
//         $query = Dataset::query();

//         if ($request->has('birth_year') && $request->input('birth_year') !== null) {
//             $query->whereYear('date_of_birth', $request->input('birth_year'));
//         }

//         if ($request->has('birth_month') && $request->input('birth_month') !== null) {
//             $query->whereMonth('date_of_birth', $request->input('birth_month'));
//         }

//         // Paginate the dataset before storing it in the cache
//         $dataset = $query->orderBy('date_of_birth')->paginate(20);

//         // Store paginated data in cache for 60 seconds
//         if (!empty($filteredCacheKey)) {
//             Redis::setex($filteredCacheKey, 60, serialize($dataset));
//         }
//     }

//     return view('dataset.index', compact('dataset'));
// }

// public function index(Request $request)
// {
//     // Initialize cache key variables
//     $initialCacheKey = 'initial_dataset';
//     $filteredCacheKey = '';

//     // Retrieve initial dataset from cache or database
//     $dataset = Redis::get($initialCacheKey);

//     if (!$dataset) {
//         // Retrieve initial dataset without any filters
//         $dataset = Dataset::orderBy('date_of_birth')->paginate(20);

//         // Store initial dataset in cache for 60 seconds
//         Redis::setex($initialCacheKey, 60, serialize($dataset));
//     } else {
//         // Unserialize dataset from cache
//         $dataset = unserialize($dataset);
//     }

//     // Check if filtering parameters are present in the request
//     if ($request->filled(['birth_year', 'birth_month'])) {
//         // Construct cache key with filtering parameters and current page
//         $filteredCacheKey = 'filtered_data_' . md5(serialize($request->only(['birth_year', 'birth_month']))) . '_page_' . $request->input('page', 1);
//     }

//     // Check if filtered dataset exists in cache
//     if ($filteredCacheKey && ($filteredDataset = Redis::get($filteredCacheKey))) {
//         // Unserialize filtered dataset from cache
//         $dataset = unserialize($filteredDataset);
//     } elseif ($request->filled(['birth_year', 'birth_month'])) {
//         // Retrieve dataset from the database based on filtering parameters
//         $query = Dataset::query();

//         if ($request->filled('birth_year')) {
//             $query->whereYear('date_of_birth', $request->input('birth_year'));
//         }

//         if ($request->filled('birth_month')) {
//             $query->whereMonth('date_of_birth', $request->input('birth_month'));
//         }

//         // Paginate the dataset before storing it in the cache
//         $dataset = $query->orderBy('date_of_birth')->paginate(20);

//         // Store paginated filtered dataset in cache for 60 seconds
//         Redis::setex($filteredCacheKey, 60, serialize($dataset));
//     }

//     return view('dataset.index', compact('dataset'));
// }

// public function index(Request $request)
// {
//     // Initialize cache key variables
//     $initialCacheKey = 'initial_dataset';
//     $filteredCacheKey = '';

//     // Retrieve initial dataset from cache or database
//     $dataset = Redis::get($initialCacheKey);

//     if (!$dataset) {
//         // Retrieve initial dataset without any filters
//         $dataset = Dataset::orderBy('date_of_birth')->paginate(20);

//         // Store initial dataset in cache for 60 seconds
//         Redis::setex($initialCacheKey, 60, serialize($dataset));
//     } else {
//         // Unserialize dataset from cache
//         $dataset = unserialize($dataset);
//     }

//     // Check if filtering parameters are present in the request
//     if ($request->filled(['birth_year', 'birth_month'])) {
//         // Construct cache key with filtering parameters and current page
//         $filteredCacheKey = 'filtered_data_' . md5(serialize($request->only(['birth_year', 'birth_month']))) . '_page_' . $request->input('page', 1);
//     }

//     // Check if filtered dataset exists in cache
//     if ($filteredCacheKey && ($filteredDataset = Redis::get($filteredCacheKey))) {
//         // Unserialize filtered dataset from cache
//         $dataset = unserialize($filteredDataset);
//     } elseif ($request->filled(['birth_year', 'birth_month'])) {
//         // Retrieve dataset from the database based on filtering parameters
//         $query = Dataset::query();

//         if ($request->filled('birth_year')) {
//             $query->whereYear('date_of_birth', $request->input('birth_year'));
//         }

//         if ($request->filled('birth_month')) {
//             $query->whereMonth('date_of_birth', $request->input('birth_month'));
//         }

//         // Paginate the dataset before storing it in the cache
//         $dataset = $query->orderBy('date_of_birth')->paginate(20);

//         // Store paginated filtered dataset in cache for 60 seconds
//         Redis::setex($filteredCacheKey, 60, serialize($dataset));
//     }

//     return view('dataset.index', compact('dataset'));
// }

    // 


    // public function index(Request $request)
    // {
    //     // Initialize cache key for the initial dataset
    //     $initialCacheKey = 'initial_dataset';

    //     if (Redis::exists($initialCacheKey)) {
    //         echo "initial";
    //         $dataset = unserialize(Redis::get($initialCacheKey));  // if data exists in cache, retrieve it 
    //     } else {
    //         $dataset = Dataset::orderBy('date_of_birth')->paginate(20);
        
    //         Redis::setex($initialCacheKey, 60, serialize($dataset)); // else store initial dataset in cache for 60 seconds
    //     }

    //     // Initialize cache key for the filtered dataset
    //     $filteredCacheKey = '';

    //     if ($request->has(['birth_year', 'birth_month'])) {

    //         $filteredCacheKey = 'filtered_data_' . md5(serialize($request->only(['birth_year', 'birth_month']))) . '_page_' . $request->input('page', 1);
    //     }


    //     if (!empty($filteredCacheKey) && Redis::exists($filteredCacheKey)) {
    //         echo "filter";
    //         $dataset = unserialize(Redis::get($filteredCacheKey)); // if data exists in cache, retrieve it 
    //     } else {
            
    //         $query = Dataset::query();

    //         if ($request->has('birth_year') && $request->input('birth_year') !== null) {
    //             $query->whereYear('date_of_birth', $request->input('birth_year'));
    //         }

    //         if ($request->has('birth_month') && $request->input('birth_month') !== null) {
    //             $query->whereMonth('date_of_birth', $request->input('birth_month'));
    //         }

    //         $dataset = $query->orderBy('date_of_birth')->paginate(20);

    //         // Store paginated data in cache for 60 seconds
    //         if (!empty($filteredCacheKey)) {
    //             Redis::setex($filteredCacheKey, 60, serialize($dataset));
    //         }
    //     }

    //     return view('dataset.index', compact('dataset'));
    // }

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
