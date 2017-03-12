@extends('layouts.master')

@section('title')
 Welcome to Social App!
@endsection

@section('content')
   @include('includes.msg-block')
    <div class="row">
        <div class="col-md-6">
        <h3>Sign Up</h3>
            <form action="/signup" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="email">Your E-mail</label>
                    <input class="form-control" type="text" name="email" id="email">
                </div>
                 <div class="form-group">
                    <label for="first_name">Your First Name</label>
                    <input class="form-control" type="text" name="first_name" id="first_name">
                </div>
                 <div class="form-group">
                    <label for="password">Your Password</label>
                    <input class="form-control" type="password" name="password" id="password">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

            <div class="col-md-6">
            <h3>Sign In</h3>
            <form action="/signin" method="post">
            {{csrf_field()}}
                <div class="form-group">
                    <label for="email">Your E-mail</label>
                    <input class="form-control" type="text" name="email" id="email">
                </div>
                 <div class="form-group">
                    <label for="password">Your Password</label>
                    <input class="form-control" type="password" name="password" id="password">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection