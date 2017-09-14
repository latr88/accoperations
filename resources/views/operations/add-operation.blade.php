@extends('layouts.app')

@section('css')
    <style>
        .form-check-label
        {
            margin-bottom: 5px;
        }
    </style>
@stop
@section('content')
<div class="container">
    <div class="row">
        @if (session('status'))
            <div class="alert alert-{{session('status')}}">
                {!! session('message') !!}
            </div>
        @endif
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                    <p style="margin-bottom: 0"><a href="/accounts">accounts</a></p>
                    <p style="margin-bottom: 0"><a href="/operations">operations</a></p>
                    <p><a style="" href="/add-account">add account</a></p>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Accounts</div>

                <div class="panel-body">
                    <form action="/add-operation" method="POST">
                        {!! csrf_field() !!}
                        <div class="row">
                            <div class="col-xs-8 form-group">
                                <label for=name">Name</label>
                                <input type="name" required class="form-control" name="name" id="name" aria-describedby="account name" placeholder="Enter operation name">
                            </div>
                            <div class="col-xs-4 form-group">
                                <label for=group">Group Number</label>
                                <input type="number" required class="form-control" name="group" id="group" aria-describedby="group number" placeholder="Enter group number">
                            </div>
                            <div class="col-xs-12 form-group">
                                <label for=name">Description</label>
                                <textarea class="form-control" name="description" id="description" aria-describedby="operation description" placeholder="Enter operation description"></textarea>
                            </div>
                            <div align="right" class="col-xs-12">
                                <button type="submit" class="btn btn-primary">Add operation</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {

    });
</script>
@endsection
