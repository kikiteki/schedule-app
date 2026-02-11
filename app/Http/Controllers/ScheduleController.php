<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreScheduleRequest;
use App\Models\Schedule;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    // スケジュールの投稿
    public function store(StoreScheduleRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::id();

        Schedule::create($data);
        return redirect()->back()->with('success', '予定を追加しました');
        // return view('pages.dashboard');
    }
}
