@extends('main.app')
@section('content')
<div class="container">
    <div class="card-body">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <br>
    <div style="display:inline">
    <span class="trs">Transactions</span>
    <a href ="{{route('tration_create')}}"><button class="btn btn-button" type="button" style="float: inline-end;">Add</button></a>
    </div>
    
    <table class="table" id="transactions-table">
        <thead>
            <tr>
                <th>S.NO</th>
                <th>Description</th>
                <th>Amount</th>
                <th>Date</th>
                <th>Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; ?> 
            @foreach($transactions as $transaction)
                <tr>
                    <td>{{$i}}</td>
                    <td>{{ $transaction->description }}</td>
                    <td>{{ $transaction->amount }}</td>
                    <td>{{ $transaction->date }}</td>
                    <td>{{ $transaction->type }}</td>
                    <td>
                        <a href="{{ route('edit', $transaction->id) }}" class="btn btn-primary btn-sm">Edit</a>
                     <form action="{{route('delete_data')}}" method="POST" style="display:inline;">
                            @csrf
                            <input type="hidden" value="{{$transaction->id}}" id="id_delete" name="id_delete">
                            <button type="submit" class="btn btn-danger btn-sm" style="color: #fff;">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php $i++ ?>
            @endforeach
          
        </tbody>
    </table>
</div>
</div>
@endsection


