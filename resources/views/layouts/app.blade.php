<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Dashboard')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
</head>

<body class="bg-gray-100 text-gray-800">

    {{-- Header --}}
    @include('components.header')

    {{-- Main --}}
    <main class="max-w-7xl mx-auto px-4 py-8 pt-24">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('components.footer')

    <div id="calendar"
        data-date="{{ $date ?? now()->toDateString() }}">
    </div>

</body>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        var calendarEl = document.getElementById('calendar');

        var selectedDate = @json($date);

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            initialDate: selectedDate,
            locale: 'ja',
            height: 400,
            headerToolbar: {
                left: 'prev,next',
                center: 'title',
                right: ''
            },

            dateClick: function(info) {
                window.location.href = '/?date=' + info.dateStr;
            },

            events: [{
                start: selectedDate,
                display: 'background'
            }]
        });

        calendar.render();
    });
</script>

</html>