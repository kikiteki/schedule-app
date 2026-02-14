@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-8 rounded-xl shadow">

    <form method="POST" action="{{ route('schedules.update', $schedule->id) }}">
        @csrf

        <div class="space-y-4">

            <input type="text"
                name="title"
                value="{{ old('title', $schedule->title) }}"
                class="w-full border rounded p-2">

            <input type="datetime-local"
                name="start_at"
                value="{{ $schedule->start_at->format('Y-m-d\TH:i') }}"
                class="w-full border rounded p-2">

            <input type="datetime-local"
                name="end_at"
                value="{{ optional($schedule->end_at)->format('Y-m-d\TH:i') }}"
                class="w-full border rounded p-2">

            <select name="category_id" class="w-full border rounded p-2">
                @foreach ($categories as $category)
                <option value="{{ $category->id }}"
                    @selected($schedule->category_id == $category->id)>
                    {{ $category->name }}
                </option>
                @endforeach
            </select>

            <div class="flex space-x-3 mt-4">

                {{-- 更新 --}}
                <button class="px-4 py-2 bg-blue-600 text-white rounded">
                    更新
                </button>
            </div>
        </div>
    </form>

    {{-- 完了 --}}
    @if (!$schedule->is_completed)
    <form method="POST"
        action="{{ route('schedules.complete', $schedule->id) }}"
        class="mt-4">
        @csrf
        <button class="px-4 py-2 bg-green-600 text-white rounded">
            完了にする
        </button>
    </form>
    @endif

    {{-- 削除 --}}
    <form method="POST"
        action="{{ route('schedules.delete', $schedule->id) }}"
        onsubmit="return confirm('削除しますか？');"
        class="mt-4">
        @csrf
        <button class="px-4 py-2 bg-red-600 text-white rounded">
            削除
        </button>
    </form>

</div>

@endsection