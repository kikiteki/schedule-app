@extends('layouts.app')

@section('content')

<div class="grid grid-cols-1 md:grid-cols-10 gap-6">

    {{-- 左カラム（3） --}}
    <div class="md:col-span-3">
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-lg font-semibold mb-4">カレンダー</h2>
            <div id="calendar"></div>
        </div>
    </div>

    {{-- 右カラム（7） --}}
    <div class="md:col-span-7 space-y-6">

        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-lg font-semibold mb-4">予定一覧</h2>
            <p class="text-sm text-gray-500 mb-4">
                表示中の日付：{{ $date ?? now()->toDateString() }}
            </p>

            <ul class="space-y-2">
                <li class="p-3 bg-gray-50 rounded border">
                    サンプル予定
                </li>
            </ul>
        </div>

        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-lg font-semibold mb-4">予定を追加</h2>

            <form method="GET" action="/">
                <input type="date"
                       name="date"
                       value="{{ $date ?? now()->toDateString() }}"
                       class="border rounded px-3 py-2 w-full">
            </form>
        </div>

    </div>

</div>

@endsection
