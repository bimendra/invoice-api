<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
use App\Models\Invoice;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\InvoiceResource;
use App\Http\Resources\V1\InvoiceCollection;
use Illuminate\Http\Request;
use App\Filters\V1\InvoiceFilter;
use Illuminate\Support\Arr;
use App\Http\Requests\V1\BulkStoreInvoiceRequest;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new InvoiceFilter();
        $queryItems = $filter->transform($request);
        if(count($queryItems) == 0) {
            return new InvoiceCollection(Invoice::paginate());
        }
        return new InvoiceCollection(Invoice::where($queryItems)->paginate()->appends($request->query()));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInvoiceRequest $request)
    {
        //
    }

    public function bulkStore(BulkStoreInvoiceRequest $request) 
    {
        $bulk = collect($request->all())->map(function($arr, $key) {
            return Arr::except($arr, ['customerId', 'billedDate', 'paidDate']);
        });

        Invoice::insert($bulk->toArray());
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice)
    {
        return new InvoiceResource($invoice);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInvoiceRequest $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
