@extends('layouts/default')

@section('header-text')
    Add new class
@endsection

@section('content')
    <div class="container">
        @if($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <div class="col col-md-6">
                <form action="" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Input class name ...">
                    </div>

                    <div class="form-group">
                        <label for="year">Year:</label>
                        <input type="number" class="form-control" name="year" id="year" placeholder="Input year of class ...">
                    </div>

                    <div class="form-group">
                        <label for="holder_name">Holder Name:</label>
                        <input type="text" class="form-control" name="holder_name" id="holder_name" placeholder="Input the holder name ...">
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
