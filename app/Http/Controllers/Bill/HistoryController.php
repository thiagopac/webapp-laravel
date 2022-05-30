<?php

namespace App\Http\Controllers\Bill;

use App\DataTables\BillHistoryDataTable;
use App\Http\Controllers\Controller;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BillHistoryDataTable $dataTable)
    {
//        $invoices = auth()->user()->invoices;
        return $dataTable->render('pages.bill.history.index');
    }
}
