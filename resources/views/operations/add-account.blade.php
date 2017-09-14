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
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                    <p style="margin-bottom: 0"><a href="/accounts">view accounts</a></p>
                    <p><a style="" href="/add-operation">add operation</a></p>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Accounts</div>

                <div class="panel-body">
                    <form action="/add-account" method="POST">
                        {!! csrf_field() !!}
                        <div class="row">
                            <div class="col-xs-4 form-group">
                                <label for=number">Number</label>
                                <input type="number" required class="form-control" name="number" id="number" aria-describedby="account number" placeholder="Enter account number">
                            </div>
                            <div class="col-xs-8 form-group">
                                <label for=name">Name</label>
                                <input type="name" required class="form-control" name="name" id="name" aria-describedby="account name" placeholder="Enter account name">
                            </div>
                            <div class="col-xs-12 form-group">
                                <label for=name">Description</label>
                                <textarea class="form-control" name="description" id="description" aria-describedby="account description" placeholder="Enter account description"></textarea>
                            </div>
                            <div class="col-xs-12 form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="isActive">
                                    Active
                                </label>
                            </div>
                            <div align="right" class="col-xs-12">
                                <button type="submit" class="btn btn-primary">Add account</button>
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
