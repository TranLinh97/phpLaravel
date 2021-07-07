<?php

namespace App\Http\Controllers\Admin;

use App\HelpersClass\Date;
use App\Http\Controllers\Controller;
use App\Mail\TransactionSuccess;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;

class AdminStatisticalController extends Controller
{
    public function index()
    {
        //tong don hang
        $totalProduct = \DB::table('transactions')->select('id')->count();
        //tong user
        $totalUser  = \DB::table('users')->select('id')->count();
        //Tong bai viet
        $totalAriticel = \DB::table('articles')->select('id')->count();

        //danh sach don hang moi nhat
        $transactions = Transaction::orderByDesc('id')
            ->limit(10)
            ->get();
        //Top san pham xem nhieu
        $topViewProducts = Product::orderByDesc('id')
            ->limit(10)
            ->get();
        //top san pham mua nhieu
        $topPayProducts = Product::orderByDesc('pro_pay')
            ->limit(10)
            ->get();
        //Thống kê trạng thái đơn hàng
        //tiep nhan don hang
        $transactionsDefault = Transaction::where('tst_status',1)->select('id')->count();
        //dang van chuyen
        $transactionsSuccess = Transaction::where('tst_status',2)->select('id')->count();
        //da ban giao
        $transactionsInfo = Transaction::where('tst_status',3)->select('id')->count();
        //Huy
        $transactionsDanger = Transaction::where('tst_status',4)->select('id')->count();

        $statusTransaction = [
            [
                'Tiếp nhận',$transactionsDefault,false
            ],
            [
                'Đang vận chuyển',$transactionsSuccess,false
            ],
            [
                'Đã bàn giao',$transactionsInfo,false
            ],
            [
                'Hủy',$transactionsDanger,false
            ]
        ];
//        $listDay = Date::getListDayInMonth();

        $viewData = [
            'totalProduct'      =>$totalProduct,
            'totalUser'         =>$totalUser,
            'totalAriticel'     =>$totalAriticel,
            'transactions'      =>$transactions,
            'topViewProducts'   =>$topViewProducts,
            'topPayProducts'    =>$topPayProducts,
            'statusTransaction' =>json_encode($statusTransaction),
//            'listDay'           =>json_encode($listDay)
        ];
        return view('admin.statistical.index',$viewData);
    }
}
