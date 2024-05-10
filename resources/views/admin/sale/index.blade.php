@extends('admin.home')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            {{--            list of sales--}}
            <div class="header d-inline-flex">
                <h2 class="heading_center">Sales</h2>
                <a class="ml-4 p-2 d-flex btn btn-outline-twitter justify-content-center align-items-lg-center"
                   href="{{route('sales.add')}}">Add</a>
            </div>
            @if(session('success'))
                <div class="session mt-3">
                    <div class="alert alert-success">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    </div>
                </div>
            @endif
            @if(session('error'))
                <div class="session mt-3">
                    <div class="alert alert-danger">
                        {{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    </div>
                </div>
            @endif
            <div class="table-container">
                <table class="table" id="dataTable">
                    <thead>
                    <tr>
                        <td>#</td>
                        <td>Sale percentage</td>
                        <td colspan="2">Action</td>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $count = 0;
                    @endphp

                    @foreach($sales as $sale)
                        @php
                            $count++;
                        @endphp
                        <tr>
                            <td>{{$count}}</td>
                            <td>{{$sale->percentage}}</td>
                            <td><a href="{{route('sales.edit', $sale->id)}}">Edit</a></td>
                            <td><a href="{{route('sales.delete', $sale->id)}}">Delete</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
