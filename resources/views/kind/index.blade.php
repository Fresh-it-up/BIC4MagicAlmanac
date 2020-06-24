@extends('layouts.app')


@section('content')
    <section class="section">
        <div class="container">
            <index-kinds :kinds="{{ $kinds }}"></index-kinds>
        </div>
    </section>
@endsection
