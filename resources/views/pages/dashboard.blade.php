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