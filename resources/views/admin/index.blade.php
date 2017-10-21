@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Links</div>
                    <div class="panel-body">
                        <a href="{{ url('/admin/teams') }}" class="btn btn-success btn-sm">
                            Teams
                        </a>
                        <br /><br />
                        <a href="{{ url('/admin/players') }}" class="btn btn-success btn-sm">
                            Players
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
