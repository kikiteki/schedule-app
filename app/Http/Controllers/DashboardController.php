<?php

namespace App\Http\Controllers;

use App\Models\Category;
// use Illuminate\Http\Request;

/**
 * ダッシュボードコントローラー
 * ユーザーがログイン後にアクセスするページを管理するコントローラー 
 */
class DashboardController extends Controller
{
    
    public function index()
    {
        // カテゴリーを全件取得
        $categories = Category::all();

        return view('pages.dashboard', compact('categories'));
    }
}
