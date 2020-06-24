@extends('layouts.app')


@section('content')
    <section class="section">
        <div class="container">
            <index-spells :spells="{{ $spells }}"></index-spells>
        </div>
    </section>
@endsection
