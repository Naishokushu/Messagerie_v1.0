@extends('layouts.app')


@section('content')
    <div class="container">
        @include('profil.edit',['user' => $user])
    </div>
@endsection