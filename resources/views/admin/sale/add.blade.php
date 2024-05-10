@extends('admin.home')

@section('content')
    <div class="main-panel">
        <div class="container mt-3">
            <h1 class="header">
                Adding New Sale
            </h1>
            @if(session('error'))
                <div class="session mt-3">
                    <div class="alert alert-danger">
                        {{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    </div>
                </div>
            @endif
            <form action="{{route('sales.doAdd')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="percentage" class="form-label">Sale percentage</label>
                    <input style="color: #FFFFFF;" type="text" class="form-control" id="percentage" name="percentage"
                           placeholder="Enter your Sale's percentage">
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
@endsection
