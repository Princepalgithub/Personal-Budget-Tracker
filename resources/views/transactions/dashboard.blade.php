@extends('main.app')
@section('content')
<div class="container">
    <div class="card-body">
       
        <div class="dashboard" style="display: flex;">
        <div class="col md-4">
        <div class="dashboard-card">
        <h3>Total Expense</h3>
        <span>{{$expense_Amount}}</span>
        </div>
        </div>
        <div class="col md-4" style="margin-left: 20px;">
        <div class="dashboard-card">
        <h3>Total Income</h3>
        <span>{{$income_totalAmount}}</span>
        </div>
        </div>
        <div class="col md-4" style="margin-left: 20px;">
        <div class="dashboard-card">
        <h3>Balance</h3>
        <span>{{$income_totalAmount - $expense_Amount }}</span>
        </div>
        </div>
    </div>
</div>


@endsection