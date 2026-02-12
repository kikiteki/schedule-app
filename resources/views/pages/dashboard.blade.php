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

        @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
        @endif

        <div class="bg-white p-6 rounded-xl shadow">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-bold">予定一覧</h2>
                <span class="text-sm text-gray-500">
                    {{ $date ?? now()->toDateString() }}
                </span>
            </div>

            @if ($schedules->isEmpty())
            <div class="p-6 bg-gray-50 text-gray-400 rounded-lg border text-sm text-center">
                予定はありません
            </div>
            @else
            <ul class="space-y-4">
                @foreach ($schedules as $schedule)
                <li class="p-5 bg-white border rounded-xl shadow-sm hover:shadow-md transition">
                    <div class="flex justify-between items-start">

                        {{-- 左側：メイン情報 --}}
                        <div class="space-y-2">
                            <div class="text-base font-semibold">
                                {{ $schedule->title }}
                            </div>

                            <div class="flex items-center text-sm text-gray-500 space-x-2">
                                <span>
                                    {{ \Carbon\Carbon::parse($schedule->start_at)->format('H:i') }}
                                    @if ($schedule->end_at)
                                    〜 {{ \Carbon\Carbon::parse($schedule->end_at)->format('H:i') }}
                                    @endif
                                </span>
                            </div>
                        </div>

                        {{-- 右側：状態エリア --}}
                        <div class="flex flex-col items-end space-y-2">
                            <span class="text-xs px-3 py-1 bg-blue-100 text-blue-700 rounded-full">
                                {{ $schedule->category->name ?? '未分類' }}
                            </span>

                            @if ($schedule->is_completed)
                            <span class="text-xs px-3 py-1 bg-green-100 text-green-700 rounded-full">
                                完了
                            </span>
                            @endif
                        </div>

                    </div>
                </li>
                @endforeach
            </ul>
            @endif
        </div>



        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-lg font-semibold mb-4">予定を追加</h2>

            <form method="POST" action="{{ route('schedules.store') }}" class="space-y-4">
                @csrf

                {{-- タイトル --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        タイトル
                    </label>
                    <input type="text"
                        name="title"
                        value="{{ old('title') }}"
                        required
                        class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200">
                </div>

                {{-- カテゴリ --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        カテゴリ
                    </label>
                    <select name="category_id"
                        required
                        class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200">
                        <option value="">選択してください</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                {{-- 開始日時 --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        開始日時
                    </label>
                    <input type="datetime-local"
                        name="start_at"
                        value="{{ old('start_at') }}"
                        required
                        class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200">
                </div>

                {{-- 終了日時 --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        終了日時
                    </label>
                    <input type="datetime-local"
                        name="end_at"
                        value="{{ old('end_at') }}"
                        class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200">
                </div>

                {{-- 送信ボタン --}}
                <div class="pt-2">
                    <button type="submit"
                        class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition">
                        追加する
                    </button>
                </div>
            </form>
        </div>

    </div>

</div>

@endsection