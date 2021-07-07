<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Product;
use App\Models\Slide;
use App\Models\Category;
use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        //San pham moi
        $productsNew = Product::where('pro_active',1)
            ->orderByDesc('id')
            ->select('id','pro_name','pro_slug','pro_avatar','pro_price','pro_sale')
            ->limit(4)
            ->get();
        //san pham hot
        $productsHot = Product::where([
            'pro_active' => 1,
            'pro_hot' => 1,
        ])
            ->orderByDesc('id')
            ->select('id','pro_name','pro_slug','pro_avatar','pro_price','pro_sale')
            ->limit(4)
            ->get();
        //san pham mua nhieu
        $productsPay = Product::where('pro_active',1)
            ->where('pro_pay','>',0)
            ->orderByDesc('pro_pay')
            ->limit(10)
            ->select('id','pro_name','pro_slug','pro_sale','pro_avatar','pro_price')
            ->get();
        //Lấy slide trang chủ
        $slides = Slide::where('sd_active',1)
            ->orderBy('sd_sort','asc')
            ->get();
        //Lay even hien thi
       $event1 = Event::where('e_position_1',1)
           ->first();
       $event2 = Event::where('e_position_2',1)
           ->first();
       $event3 = Event::where('e_position_3',1)
            ->first();

       // Sản phẩm thuộc danh mục hot

        $categoriesHot = Category::with([
            'products' => function($q) {
                $q->where('pro_active',1)
                    ->select('id','pro_name','pro_slug','pro_category_id','pro_sale','pro_avatar','pro_price','pro_review_total','pro_review_star')
                    ->limit(20)
                    ->orderByDesc('id')
                    ->get();
            }
        ])
            ->where([
                'c_hot'      => 1,
                'c_status'   => 1
            ])->get();


        $articlesHot = Article::where([
            'a_active' => 1,
            'a_hot'    => 1
        ])
            ->select('id','a_name','a_slug','a_description','a_avatar','created_at')
            ->orderByDesc('id')
            ->limit(4)
            ->get();

        $viewData = [
            'productsNew' => $productsNew,
            'productsHot' => $productsHot,
            'productsPay' => $productsPay,
            'categoriesHot'=>$categoriesHot,
            'articlesHot' => $articlesHot,
            'slides'      => $slides,
            'event1'      => $event1,
            'event2'      => $event2,
            'event3'      => $event3,
            'title_page'  => 'Dự án dịch'
        ];
        return view('frontend.pages.home.index',$viewData);
    }
}
