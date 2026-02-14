<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreScheduleRequest;
use App\Models\Schedule;
use App\Models\Category;
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

    /**
     * スケジュールの詳細を表示
     */
    public function show($id)
    {
        $schedule = Schedule::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $categories = Category::all();

        return view('schedules.show', compact('schedule', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $schedule = Schedule::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $schedule->update($request->validate([
            'title' => 'required|string|max:255',
            'start_at' => 'required|date',
            'end_at' => 'nullable|date|after_or_equal:start_at',
            'category_id' => 'required|exists:categories,id',
        ]));

        return redirect()
            ->route('schedules.show', $id)
            ->with('success', '更新しました');
    }

    public function complete($id)
    {
        $schedule = Schedule::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $schedule->update([
            'is_completed' => true
        ]);

        return back();
    }

    public function destroy($id)
    {
        $schedule = Schedule::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $schedule->delete();

        return redirect()->route('dashboard');
    }

}
