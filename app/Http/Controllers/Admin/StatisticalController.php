<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\GoodDeliveryNote;
use App\Models\GoodReceivedNote;
use App\Models\InvoiceDetail;
use App\Models\Product;
use Illuminate\Contracts\View\View;

class StatisticalController extends Controller
{
    public function index() : View  {
        $productCount = Product::count();
        $TongDoanhSo =  Bill::sum('total_money');
        $TongVonDauTu =  GoodReceivedNote::sum('total_cost');
        $LoiNhuan = $TongDoanhSo - $TongVonDauTu;
        
        return view('admin.statistical.index', compact([
            'productCount',
            'TongDoanhSo',
            'TongVonDauTu',
            'LoiNhuan'
        ]));
    }

}