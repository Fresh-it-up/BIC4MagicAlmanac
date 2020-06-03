@extends('layouts.app')


@section('content')
    <section class="section">
        <div class="container">
            <kind :one-kind="{{$kind}}"></kind>
        </div>
    </section>
@endsection
