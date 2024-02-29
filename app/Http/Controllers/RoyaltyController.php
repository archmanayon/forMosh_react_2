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
            //     $query->where('publisher_number', 'like', "%$request->search%")
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
        return response()->json([$result, $request->search], 200);
    }

    public function store(Request $request)
    {
        $all_rows = $request->all();
        $duplicates = [];
        $imported = 0;

        DB::transaction(function () use ($all_rows, &$duplicates, &$imported) {
            collect($all_rows)->map(function ($obj_) use (&$duplicates, &$imported) {
                $per_row = [];
                foreach ($obj_ as $key => $value) {
                    $per_row[$key] = $value;
                };
                $duplicate = Royalty::where('isbn', $per_row['isbn'])->first();
                if ($duplicate) {
                    $duplicates[] = $per_row;
                } else {
                    Royalty::create($per_row);
                    $imported++;
                }
            });
        });
        logger([$duplicates, $imported]);

        return response([
            "imported" => $imported,
            "duplicates" => $duplicates
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
