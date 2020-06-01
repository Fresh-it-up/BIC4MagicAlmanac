@extends('layouts.app')


@section('content')
    <section class="section">
        <div class="container">
            <h1>Edit spell</h1>
            <edit-spell v-bind:spell="spell"/>
        </div>
    </section>
@endsection
