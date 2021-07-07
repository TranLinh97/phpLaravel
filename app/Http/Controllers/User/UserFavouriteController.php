<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserFavouriteController extends Controller
{
    public function index()
    {
        $userID = \Auth::id();
        $products = Product::whereHas('favourite', function ($query) use ($userID){
            $query->where('uf_user_id',$userID);
        }) ->paginate(10);
        return view('user.favourite',compact('products'));
    }

    /**
     * Them san pham yeu thich cua user
     */
    public function addFavourite(Request $request, $id)
    {
        if ($request->ajax()){

            $product = Product::find($id);
            if (!$product) return response(['messages'=>'Không tồn tại sản phẩm']);
            $messages = 'Thêm yêu thích thành công !';
            try{
                \DB::table('user_favourite')
                    ->insert([
                    'uf_product_id' => $id,
                    'uf_user_id'    => \Auth::id()
                ]);
            } catch (\Exception $e){
                $messages = 'Sản phẩm này đã được yêu thích !';
            }
            return response(['messages' => $messages]);
        }
    }
    /**
     * Huy san pham yeu thich cua user
     */
    public function delete($id)
    {
        \DB::table('user_favourite')->where([
            'uf_product_id' => $id,
            'uf_user_id'    => \Auth::id()
        ])->delete();
        return redirect()->back();
    }
}
