@extends('layouts.app')



@section('content')
    <section class="section">
        <div class="container">
            <h1>List kinds</h1>
            <Kinder>

            </Kinder>
            Route::get('user/{id}', 'UserController@show');
        </div>
    </section>
@endsection
