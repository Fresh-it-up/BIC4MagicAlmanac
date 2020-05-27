@extends('layouts.app')


@section('content')
    <section class="section">
        <div class="container">
            <edit-kind v-bind:kind="kind"/>
        </div>
    </section>
@endsection
