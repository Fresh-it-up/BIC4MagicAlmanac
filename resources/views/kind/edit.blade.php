@extends('layouts.app')


@section('content')
    <section class="section">
        <div class="container">
            <create-kind :is-editable="true" :current-kind="{{ $kind }}"></create-kind>
        </div>
    </section>
@endsection
