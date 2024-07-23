@extends('main.app')
@section('content')
<div class="container">
<div class="card-body">
    <div class="form-header">
    <h1>Add Income</h1>
    <form action="{{route('tration_post')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="type">Type</label>
            <select name="type" id="type" class="form-control" required>
            <option value="">Select Transactions</option>
                <option value="income" >Income</option>
                <option value="expense">Expense</option>
            </select>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" name="description" id="description" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" name="date" id="date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="number" name="amount" id="amount" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
</div>
</div>
@endsection
