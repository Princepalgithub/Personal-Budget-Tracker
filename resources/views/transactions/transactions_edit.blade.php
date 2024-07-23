@extends('main.app')
@section('content')
<div class="container">
<div class="card-body">
    <div class="form-header">
    <h1> Update Income</h1>
    <form action="{{route('tration_update')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="type">Type</label>
          <input type="hidden" value="{{$transactions_edit->id}}" name="get_id">
            <select name="type" id="type" class="form-control">
                <option value="">Select Transactions</option>
            <option value="income" {{ $transactions_edit->type == "income" ? 'selected' : '' }}>Income</option>
                <option value="expense" {{ $transactions_edit->type == "expense" ? 'selected' : '' }}>Expense</option>

            </select>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" name="description" value="{{$transactions_edit->description}}" id="description" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" name="date" id="date" value="{{$transactions_edit->date}}"class="form-control" required>
        </div>
        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="number" name="amount" id="amount" value="{{$transactions_edit->amount}}" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
</div>
</div>
@endsection
