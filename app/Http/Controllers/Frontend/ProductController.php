<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $parmAtbSearch = $request->except('price','page','k','country');
        $parmAtbSearch = array_values($parmAtbSearch);
        $products=Product::where('pro_active',1);
        if(!empty($parmAtbSearch)){
            $products->whereHas('attributes',function ($query) use($parmAtbSearch){
               $query->whereIn('pa_attribute_id',$parmAtbSearch);
            });
        }
        if ($name = $request->k) $products->where('pro_name','like','%'.$name.'%');
        if ($country = $request->country) $products->where('pro_country',$country);

        if ($request->price) {
            $price =  $request->price;
            switch ($price)
            {
                case '1':
                    $products->where('pro_price','<',2000000);
                    break;

                case '2':
                    $products->whereBetween('pro_price',[2000000,5000000]);
                    break;

                case '3':
                    $products->whereBetween('pro_price',[5000000,10000000]);
                    break;

                case '4':
                    $products->whereBetween('pro_price',[10000000,20000000]);
                    break;

                case '5':
                    $products->where('pro_price','>',20000000);
                    break;
            }
        }
        $attributes = $this->syncAttributeGroup();

        $modelProduct = new Product();

        $products = $products->orderByDesc('id')
            ->select('id','pro_name','pro_slug','pro_avatar','pro_price','pro_sale')
            ->paginate(12);
        $viewData = [
            'attributes' => $attributes,
            'products'   => $products,
            'query'      => $request->query(),
            'country'    => $modelProduct->country,
        ];
        return view('frontend.pages.product.index',$viewData);
    }
    public function syncAttributeGroup()
    {
        $attributes = Attribute::get();
        $groupAttribute = [];
        foreach ($attributes as $key =>$attribute)
        {
            $key = $attribute->gettype($attribute->atb_name)['name'];
            $groupAttribute[$key][] = $attribute->toArray();
        }
        return $groupAttribute;
    }
}
