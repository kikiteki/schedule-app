<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Schedule;
use Illuminate\Support\Facades\Auth;

/**
 * ダッシュボードコントローラー
 * ユーザーがログイン後にアクセスするページを管理するコントローラー 
 */
class DashboardController extends Controller
{
    /**
     * ダッシュボード表示   
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // 日付取得（なければ今日）
        $date = $request->query('date')
            ? Carbon::parse($request->query('date'))->toDateString()
            : Carbon::today()->toDateString();

        // ログインユーザーのその日の予定取得
        $schedules = Schedule::where('user_id', Auth::id())
            ->whereDate('start_at', $date)
            ->with('category')
            ->orderBy('start_at')
            ->get();

        // カテゴリー取得
        $categories = Category::all();

        return view('pages.dashboard', compact(
            'categories',
            'schedules',
            'date'
        ));
    }
}
