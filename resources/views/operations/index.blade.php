@extends('layouts.app')

@section('css')
    <style>
        #save-container
        {
            margin-top: 20px;
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
                    <form action="/link-operations" method="POST">
                        {!! csrf_field() !!}
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th width="15%">#</th>
                                    <th width="35%">Name</th>
                                    <th width="35%">Operations</th>
                                    <th width="15%">Last Updated</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($accounts as $account)
                                    <tr>
                                        <th scope="row">{{$account->number}}</th>
                                        <td>{{$account->name}}</td>
                                        <td>
                                            <select multiple="multiple" name="operations[{{$account->id}}]" class="multiselect" style="width: 100%">
                                                @foreach($operations as $operation)
                                                    @if ($account->operations->contains('id', $operation->id))
                                                        <option selected data-account="{{$account->id}}" value="{{$operation->id}}">{{$operation->name}}</option>
                                                    @else
                                                        <option data-account="{{$account->id}}" value="{{$operation->id}}">{{$operation->name}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>{{$account->updated_at->diffForHumans()}}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">
                                            <p>No accounts have been added so far, <a style="color: #f47d30;" href="/add-account">add account here.</a> </p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <div class="row" id="save-container" hidden>
                            <div align="right" class="col-xs-12">
                                <button type="submit" class="btn btn-primary">Save changes</button>
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
        $('.multiselect').multiselect();

        $('label.checkbox').click(function () {
            $('#save-container').show();
        })
    });
</script>
@endsection
