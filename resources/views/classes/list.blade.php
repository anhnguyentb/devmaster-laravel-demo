@extends('layouts/default')

@section('header-text')
    List classes
@endsection

@section('content')
    <div class="container">
        <div class="row mb-3">
            <a href="/class/add" class="btn btn-primary">Add Class</a>
        </div>
        <div class="row">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Year</th>
                    <th>Holder Name</th>
                </tr>
                </thead>
                <tbody>
                @foreach($classes as $class)
                    <tr>
                        <td>{{ $class->id }}</td>
                        <td>{{ $class->name }}</td>
                        <td>{{ $class->year }}</td>
                        <td>{{ $class->holder_name }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="row justify-content-center">
            <nav>
                <ul class="pagination">
                    @for($i = 1; $i <= $numberOfPage; $i++)
                        <li class="page-item {{ ($page == $i) ? 'active' : '' }}">
                            <a class="page-link" href="/class/{{ $i }}">{{ $i }}</a>
                        </li>
                    @endfor
                </ul>
            </nav>
        </div>
    </div>
@endsection
