<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\TransactionSuccess;
use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ShoppingCartController extends Controller
{
    public function index()
    {
        $shopping = \Cart::content();

        $viewData = [
            'shopping'  => $shopping,
            'title_page'=> 'Danh sách giỏ hàng',
        ];
        return view('frontend.pages.shopping.index',$viewData);
    }

    /**
     * Them don hang
     */
    public function add($id)
    {
        $product = Product::find($id);
        //1 kiem tra san pham
        if(!$product) return redirect()->to('/');
        //2 kiem tra so luong san pham
        //3 them san pham vao gio hang
        \Cart::add([
            'id' => $product->id,
            'name' => $product->pro_name,
            'qty' => 1,
            'price' => number_price($product->pro_price, $product->pro_sale),
            'weight'=>1,
            'options' => [
                'sale' => $product->pro_sale,
                'price_old' => $product->pro_price,
                'image'=> $product->pro_avatar
            ]
        ]);
            \Session::flash('toastr',[
                'type'=>'success',
                'message'=>"Bỏ vào giỏ hàng thành công"
            ]);
        return redirect()->back();
    }
    public function postPay(Request $request)
    {
        $data = $request->except("_token");
        if(isset(\Auth::user()->id)){
            $data['tst_user_id'] = \Auth::user()->id;
        }
        $data['tst_total_money'] = str_replace(',', '', \Cart::subtotal(0));
        $data['created_at'] = Carbon::now();
        $transactionID = Transaction::insertGetId($data);

        if($transactionID){
            $shopping = \Cart::content();
            Mail::to($request->tst_email)->send(new TransactionSuccess($shopping));

            /*Luu chi tiet don hang*/
            foreach ( $shopping as $key =>$item ) {

                //Luu chi tiet don hang
                Order::insert([
                    'od_transaction_id' => $transactionID,
                    'od_product_id'     => $item->id,
                    'od_sale'           => $item->options->sale,
                    'od_qty'            => $item->qty,
                    'od_price'          => $item->price,
                    'created_at'        => Carbon::now(),
                ]);

                //Tang pay(so luot mua)
                \DB::table('products')
                    ->where('id',$item->id)
                    ->increment("pro_pay");
            }
        }
        \Cart::destroy();
        return redirect()->to('/');
    }

    /**
     * Xử lý update giỏ hàng
     */
    public function update(Request $request, $id)
    {
        if ($request->ajax()) {

            //1.Lấy tham số
            $qty       = $request->qty ?? 1;
            $idProduct = $request->idProduct;
            $product   = Product::find($idProduct);

            //2. Kiểm tra tồn tại sản phẩm
            if (!$product) return response(['messages' => 'Không tồn tại sản sản phẩm cần update']);

            //3. Kiểm tra số lượng sản phẩm còn ko
            if ($product->pro_number < $qty) {
                return response([
                    'messages' => 'Số lượng cập nhật không đủ',
                    'error'    => true
                ]);
            }

            //4. Update
            \Cart::update($id, $qty);

            return response([
                'messages'   => 'Cập nhật thành công',
                'totalMoney' => \Cart::subtotal(0),
                'totalItem'  => number_format(number_price($product->pro_price, $product->pro_sale) * $qty, 0, ',', '.')
            ]);
        }
    }


    /**
     * Xoa don hang
     */
    public function delete($rowId)
    {
        \Cart::remove($rowId);
        \Session::flash('toastr',[
            'type'=>'success',
            'message'=>"xóa giỏ hàng thành công"
        ]);
        return redirect()->back();
    }

}
