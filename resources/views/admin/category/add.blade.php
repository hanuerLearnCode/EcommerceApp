@extends('admin.home')

@section('content')
    <div class="main-panel">
        <div class="container mt-3">
            <h1 class="header">
                Adding New Category
            </h1>
            @if(session('error'))
                <div class="session mt-3">
                    <div class="alert alert-danger">
                        {{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    </div>
                </div>
            @endif
            <form action="{{route('categories.doAdd')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Category Name</label>
                    <input style="color: #FFFFFF;" type="text" class="form-control" id="name" name="name"
                           placeholder="Enter your category's name">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea style="color: #FFFFFF;" class="form-control" id="description" name="description"
                              placeholder="Enter some description"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
@endsection
