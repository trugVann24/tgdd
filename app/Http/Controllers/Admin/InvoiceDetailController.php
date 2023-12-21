<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InvoiceDetail;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class InvoiceDetailController extends Controller
{
    public function index() : View{
        $invoicedetail = InvoiceDetail::WhereNotIn('code_bill',['admin'])->get();
        return view("admin.invoicedetail.index",compact("invoicedetail"));
    }
    public function create() : View {
        
        return view("");
    }
}
