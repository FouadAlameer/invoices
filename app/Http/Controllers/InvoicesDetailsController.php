<?php

namespace App\Http\Controllers;
use App\Models\Invoice;
use App\Models\invoices_details;
use App\Models\invoice_attachments;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class InvoicesDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(invoices_details $invoices_details)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $invoices = Invoice::where('id',$id)->first();
        $details  = invoices_Details::where('id_Invoice',$id)->get();
        $attachments  = invoice_attachments::where('invoice_id',$id)->get();

        return view('invoices.details_invoice',compact('invoices','details','attachments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, invoices_details $invoices_details)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $invoices = invoice_attachments::findOrFail($request->id_file);
        $invoices->delete();
        Storage::disk('public_uploads')->delete($request->invoice_number.'/'.$request->file_name);
        session()->flash('delete', 'تم حذف المرفق بنجاح');
        return back();
    }
    // public function get_file($invoice_number,$file_name)

    // {
    //     $contents= Storage::disk('public_uploads')->getDriver()->getAdapter()->applyPathPrefix($invoice_number.'/'.$file_name);
    //     return response()->download( $contents);
    // }

    // public function open_file($invoice_number,$file_name)

    // {
    //     $files = Storage::disk('public_uploads')->getDriver()->getAdapter()
    //     ->applyPathPrefix($invoice_number.'/'.$file_name);
    //     return response()->file($files);
    // }
}
