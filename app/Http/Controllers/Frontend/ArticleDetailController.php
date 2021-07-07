<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\BlogBaseController;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleDetailController extends BlogBaseController
{
    public function index(Request $request, $slug)
    {
        $arraySlug = explode('-',$slug);
        $id = array_pop($arraySlug);
        if ($id){
            $article = Article::find($id);
            $viewData = [
                'article'               => $article,
                'articlesHot'           => $this->getArticle(),
                'productTopPay'         => $this->getProductTop(),
                'articlesHotSidebarTop' => $this->getArticlehotpay(),
                'title_page'            => $article->a_name
            ];
            return view('frontend.pages.article_detail.index',$viewData);
        }
        return redirect()->to('/');
    }
}
