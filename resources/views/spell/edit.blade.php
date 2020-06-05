@extends('layouts.app')


@section('content')
    <section class="section">
        <div class="container">
            <create-spell :is-editable="true" :current-spell="{{$spell}}"></create-spell>
        </div>
    </section>
@endsection
