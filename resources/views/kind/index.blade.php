@extends('layouts.app')


@section('content')
    <section class="section">
        <div class="container">
            <index-kinds :kind="{{ $kind }}" ></index-kinds>
        </div>
    </section>
@endsection
