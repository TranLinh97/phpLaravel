<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\BlogBaseController;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Menu;
use Illuminate\Http\Request;

class BlogMenuController extends BlogBaseController
{
    public function getArticleByMenu(Request $request, $slug)
    {
        $arraySlug = explode('-',$slug);
        $id = array_pop($arraySlug);
        if ($id){
            $articles = Article::where([
                'a_active'=> 1,
                'a_menu_id'=>$id
            ])
                ->select('id','a_name','a_slug','a_description','a_avatar')
                ->orderByDesc('id')
                ->paginate(10);

            $menu = Menu::find($id);
            $viewData = [
                'articles'      => $articles,
                'menu'          => $menu,
                'articlesHot'   => $this->getArticle(),
                'productTopPay' => $this->getProductTop(),
                'articlesHotSidebarTop'=>$this->getArticlehotpay(),
                'title_page'    => $menu ->mn_name
            ];
            return view('frontend.pages.article.index',$viewData);
        }
        return redirect()->to('/');
    }
}
