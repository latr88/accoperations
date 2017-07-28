@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                    <p style="margin-bottom: 0"><a style="color: #f47d30;" href="/add-account">add account</a></p>
                    <p><a style="color: #f47d30" href="/add-operation">add operation</a></p>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Accounts</div>

                <div class="panel-body">
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
                                        <select multiple="multiple" class="multiselect" style="width: 100%">
                                            @foreach($operations as $operation)
                                                @if ($account->operations->contains('id', $operation->id))
                                                    <option selected value="{{$operation->id}}">{{$operation->name}}</option>
                                                @else
                                                    <option value="{{$operation->id}}">{{$operation->name}}</option>
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
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('.multiselect').multiselect();
    });
</script>
@endsection
