<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Product;
use Illuminate\Http\Request;

class BlogBaseController extends Controller
{
    public function getProductTop()
    {
        //Sản phẩm mua nhiều
        $productsPay = Product::with('category:id,c_name,c_slug')
            ->where([
                'pro_active' => 1,
            ])
            ->where('pro_pay','>',0)
            ->orderByDesc('pro_pay')
            ->limit(5)
            ->select('id','pro_name','pro_slug','pro_sale','pro_avatar','pro_price','pro_category_id')
            ->get();
        return $productsPay;
    }
    //bai viet noi bat
    public function getArticle()
    {
        $articlesHot = Article::where([
            'a_active'=> 1,
            'a_hot'=>1,
        ])
            ->select('id','a_name','a_slug','a_description','a_avatar')
            ->orderByDesc('id')
            ->get(6);
        return $articlesHot;
    }
    //bai viet hot
    public function getArticlehotpay()
    {
        $articlesHotSidebarTop = Article::where([
            'a_active'      => 1,
            'a_position_2'  => 1
        ])
            ->select('id','a_name','a_slug','a_description','a_avatar')
            ->orderByDesc('id')
            ->limit(5)
            ->get();
        return $articlesHotSidebarTop;
    }
}
