<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\BlogBaseController;
use App\Models\Article;
use Illuminate\Http\Request;

class BlogController extends BlogBaseController
{
    public function index()
    {
        //Danh sach bai viet
        $articles = Article::where([
            'a_active'=> 1
        ])
            ->select('id','a_name','a_slug','a_description','a_avatar')
            ->orderByDesc('id')
            ->paginate(10);

        $articlesHotTop = Article::where([
            'a_active'    => 1,
            'a_position_1' =>1
        ])
            ->select('id','a_name','a_slug','a_description','a_avatar')
            ->orderByDesc('id')
            ->limit(5)
            ->get();

        $viewData = [
            'articles'              => $articles,
            'articlesHotSidebarTop' => $this->getArticlehotpay(),
            'articlesHot'           => $this->getArticle(),
            'productTopPay'         => $this->getProductTop(),
            'articlesHotTop'         => $articlesHotTop,

        ];

        return view('frontend.pages.article.index',$viewData);
    }
}
