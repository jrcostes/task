@extends('tasks.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 5.7 CRUD Example from scratch</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('tasks.create') }}"> Create New Task</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show">
            <div class="alert alert-success alert block">
                <p>{{ $message }}</p>
            </div>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($tasks as $task)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $task->task }}</td>
            <td>{{ $task->description }}</td>
            <td>
                <form action="{{ route('tasks.destroy',$task->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('tasks.show',$task->id) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('tasks.edit',$task->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger" onclick="return confirm('{{ __('Are you sure you want to delete?') }}')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $tasks->links() !!}

@endsection
