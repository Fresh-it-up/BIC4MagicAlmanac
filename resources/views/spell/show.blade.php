@extends('layouts.app')


@section('content')
    <section class="section">
        <div class="container">
            <spell :one-spell="{{$spell}}"></spell>
        </div>
    </section>
@endsection
