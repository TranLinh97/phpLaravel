<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\services\ProcessViewService;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    public function getProductDetail(Request $request, $slug)
    {
        $arraySlug = explode('-',$slug);
        $id = array_pop($arraySlug);
        if($id)
        {
            //1 lay thong tin san pham
            $product = Product::with('category:id,c_name,c_slug','keywords')->findOrFail($id);
            //2 xu ly view
            ProcessViewService::view('products', 'pro_view', 'product', $id);



            $viewData = [
                'product'           => $product,
                'title_page'        => $product->pro_name,
                'productsSuggests'  => $this->getProductSuggests($product->pro_category_id)
            ];
//            dd($product);
            return view('frontend.pages.product_detail.index',$viewData);
        }
        return redirect()->to('/');
    }
    private function getProductSuggests($categoriID)
    {
        $products = Product::where([
            'pro_active'=>1,
            'pro_category_id'=>$categoriID
        ])
            ->orderByDesc('id')
            ->select('id','pro_name','pro_slug','pro_avatar','pro_price','pro_sale')
            ->paginate(12);
        return $products;
    }
}
