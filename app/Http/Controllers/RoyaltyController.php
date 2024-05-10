<?php

namespace App\Http\Controllers;

use App\Models\Royalty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;


class RoyaltyController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sortByColumn = preg_replace("/-/", '', $request->sort);

        // $columns = Schema::getColumnListing((new Royalty())->getTable());

        $result = QueryBuilder::for(Royalty::class)

            // ---- 01 ---- using help of scopeFilter with AlllowedFilter::class from model
            ->allowedFilters(['id', "YTD_avg_discount_%", AllowedFilter::scope('search')])

            // ---- 02 ---- using help of scopeFilter from model
            // ->search($request, $columns)

            // ---- 03 ---- filter through ALL columns
            // ->where(function ($query) use ($request, $columns) {
            //     foreach ($columns as $column) {
            //         $query->orWhere($column, 'like', "%$request->search%");
            //     }
            // })

            // ---- 04 ---- filter through selected columns
            // ->where(function ($query) use ($request) {
            //     $query->where('market', 'like', "%$request->search%")
            //         ->orWhere('publisher_name', 'like', "%$request->search%")
            //         ->orWhere('isbn', 'like', "%$request->search%")
            //         ->orWhere('sku', 'like', "%$request->search%")
            //         ->orWhere('title', 'like', "%$request->search%")
            //         ->orWhere('author', 'like', "%$request->search%");
            // })

            // sorting with desired field
            ->allowedSorts([$sortByColumn])
            ->get();

        // return response($result);
        return response()->json($result, 200);
    }

    public function store(Request $request)
    {
        $all_rows = $request->all();
        $duplicates = [];
        $imported = 0;
        $columns_not_found = [];

        DB::transaction(function () use ($all_rows, &$duplicates, &$imported) {
            collect($all_rows)->map(function ($obj_, $index) use (&$duplicates, &$imported) {
            //    'per_row is DB Row/Column
            $per_row = [];
            foreach ($obj_ as $key => $value) {
                switch ($key) {

                    case 'market': //Sales_Comp
                    case 'SalesTerritory': //BSIG                           
                        $per_row['market'] = $value;
                        break;

                    case 'parent_isbn': //Sales_Comp
                    case 'MainProductID#': //BSIG
                        $per_row['isbn'] = $value;
                        break;
                        
                    case 'title': //Sales_Comp
                    case 'ProductTitle': //BSIG                            
                        $per_row['title'] = $value;
                        break;
                            
                    case 'author': //Sales_Comp
                    case 'ProductAuthor(s)': //BSIG                            
                        $per_row['author'] = $value;
                        break;
                            
                    case 'binding_type' : //Sales_Comp
                    case 'ProductFormat': //BSIG
                        $per_row['format'] = $value;
                        break;

                    case 'list_price' : //Sales_Comp
                    case 'UnitPrice': //BSIG  
                        $per_row['list_price'] = $value;
                        break;

                    case 'PTD_avg_wholesale_price' : //Sales_Comp
                    //case '': //BSIG
                        $per_row['wholesale_price'] = $value;
                        break;

                    case 'PTD_Quantity' : //Sales_Comp
                    case 'GrossSoldQuantity': //BSIG  
                        $per_row['quantity_sold'] = $value;
                        break;

                    case 'PTD_return_quantity' : //Sales_Comp
                    case 'ReturnedRefundedQuantity': //BSIG  
                        $per_row['quantity_returns'] = $value;
                        break;                        
                
                    case 'PTD_gross_pub_comp' : //Sales_Comp
                    case 'GrossSoldValue': //BSIG  
                        $per_row['total_gross_sales'] = $value;
                        break;                             
                        
                    case 'PTD_net_pub_comp' : //Sales_Comp
                    case 'NetValueBeforeFees': //BSIG  
                        $per_row['total_net_sales'] = $value;
                        break;
                    
                    // case '' : //Sales_Comp
                    // case '': //BSIG  
                        // $per_row['agency_price'] = $value;
                        // break;                        

                    default:
                        // $per_row[$key] = $value;
                        break;
                    }
                };
                $duplicate = Royalty::where('isbn', $per_row['isbn'])->first();

                if ($duplicate) {
                    $duplicates[] = $index;
                } else {
                    Royalty::create($per_row);
                    $imported++;
                }
            });
        });

        return response([
            "imported" => $imported,
            "duplicates" => $duplicates,
            "non existing columns" => $columns_not_found
            ,
        ], 201);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // return is_null($id) ? Royalty::all() : Royalty::find($id);
        return Royalty::find($id);
    }

    public function chooseFilter(Request $request)
    {
        $sortByColumn = preg_replace("/-/", '', $request->sort);
        $result = QueryBuilder::for(Royalty::class)
            // ->allowedFilters(['result'])

            // searching with desired field
            ->allowedFilters(array_keys($request->filter))

            // sorting with desired field
            ->allowedSorts([$sortByColumn])
            ->get();
        // return response($result);
        return response()->json([$result], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
