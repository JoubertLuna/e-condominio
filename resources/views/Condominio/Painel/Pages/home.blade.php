@extends('adminlte::page')

@section('title', 'e-condomínio')

@section('content_header')
    <div align="right">
        <h6 id="time"></h6>
    </div>
    <h1>e-condomínio..</h1>

@stop

@section('content')
    <p>e-condomínio....</p>

@stop

@section('js')
    <script>
        var timeDisplay = document.getElementById("time");

        function refreshTime() {
            var dateString = new Date().toLocaleString("en-US", {
                timeZone: "America/Sao_Paulo"
            });
            var formattedString = dateString.replace(", ", " - ");
            timeDisplay.innerHTML = formattedString;
        }

        setInterval(refreshTime, 1000);
    </script>
@stop
