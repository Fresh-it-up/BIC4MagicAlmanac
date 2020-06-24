@extends('layouts.app')


@section('content')
    <section class="section">
        <div class="container">
            <h1>Search spell</h1>
            <search :inc-spells="{{ $spells }}"></search>
        </div>
    </section>
@endsection
