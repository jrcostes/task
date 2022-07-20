@extends('layouts.app', ['activePage' => 'tasks', 'titlePage' => __('index')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="row">
            <div class="col-12 text-left">
                <a href="{{ route('tasks.create')}}" class="btn btn-info">Create </a>
            </div>
        </div>
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Simple Table</h4>
            <p class="card-category"> Here is a subtitle for this table</p>
          </div>
          <div class="card-body">
            @if ($message = Session::get('success'))
                <div class="row">
                    <div class="col-sm-12">
                        <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show">
                            <div class="alert alert-success alert block">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <i class="material-icons">close</i>
                                </button>
                                <span>{{ $message }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>ID</th>
                  <th>Task Name</th>
                  <th>Description</th>
                  <th>Actions</th>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <td>{{$task->id}}</td>
                            <td>{{$task->task}}</td>
                            <td>{{$task->description}}</td>
                            <td>
                                <form action="{{ route('tasks.destroy', $task->id) }}" method="post">
                                    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit" onclick="return confirm('{{ __('Are you sure you want to delete?') }}')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
              {{ $tasks->onEachSide(1)->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
