<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class UserTransactionController extends Controller
{
    public function index(Request $request)
    {
        $transactions = Transaction::whereRaw(1)->where('tst_user_id',\Auth::id());
        //kiem tra xem id co ton tai va tim theo id
        if($request->id) $transactions->where('id',$request->id);
        //kiem tra xem mail co ton tai va tim theo mail
        if ($email = $request->email) $transactions->where('tst_email','like','%'.$email.'%');
        //kiem tra xem tim theo nhom khach hang
        if ($status = $request->type){
            if ($status == 1)
            {
                $transactions ->where('tst_user_id','<>',0);
            }else{
                $transactions ->where('tst_user_id',0);
            }
        }
        //tim theo trang thai don hang
        if ($status = $request->status){
            $transactions->where('tst_status',$status);
        }
        $transactions = $transactions->orderByDesc('id')->paginate(10);
        if ($request->export){
            return \Excel::download(new TransactionExport($transactions), 'don-hang.xlsx');
        }

        $viewData = [
            'transactions'  => $transactions,
            'query'         => $request->query()
        ];

        return view('user.transaction',$viewData);
    }
}
