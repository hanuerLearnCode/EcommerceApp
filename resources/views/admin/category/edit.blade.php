@extends('admin.category.index')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            {{--            list of categories--}}
            <div class="header d-inline-flex">
                <h2 class="heading_center">Categories</h2>
                <a class="ml-4 p-2 d-flex btn btn-outline-twitter justify-content-center align-items-lg-center" href="">Add</a>
            </div>

            <div class="table-container">
                <table class="table" id="dataTable">
                    <thead>
                    <tr>
                        <td>#</td>
                        <td>Name</td>
                        <td>Description</td>
                        <td colspan="2">Action</td>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $count = 0;
                    @endphp

                    @foreach($categories as $category)
                        @php
                            $count++;
                        @endphp
                    @endforeach
                    <td>{{$count}}</td>
                    <td>{{$category->name}}</td>
                    <td>{{$category->description}}</td>
                    <td><a href="{{route('categories.edit', $category->id)}}">Edit</a></td>
                    <td><a href="">Delete</a></td>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
