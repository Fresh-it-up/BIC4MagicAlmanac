@extends('layouts.app')


@section('content')
    <section class="section">
        <div class="container">
            <index-spells :spell="{{ $spell }}" ></index-spells>
        </div>
    </section>
@endsection
