@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            @include('profil.show',['user' => $users])
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">{{$user->name}}</div>
                    <div class="card-body conversations">


                        <form action="" method="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <textarea name="content"placeholder="Ecrivez votre message" class="form-control {{$errors->has('content') ? 'is-invalid' : ''}}"></textarea>
                            </div>
                            @if($errors->has('content'))
                                <div class="invalid-feedback">
                                    {{implode(',',$errors->get('content'))}}
                                </div>
                            @endif
                            <button class="btn btn-primary" type="submit">Envoyer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection