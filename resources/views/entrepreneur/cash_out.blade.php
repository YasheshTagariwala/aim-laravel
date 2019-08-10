@extends('layouts.master')
@section('title', 'Entrepreneur Search')
@section('pagebody')

    <section class="select-bar animated slideInUp">
        <div class="container"></div>
    </section>
    <section class="list-items ddd">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Cash Out History
                        <span class="pull-right">
                            <a href="#" data-target="#cash_out_form" data-toggle="modal" class="btn btn-primary">Cash Out</a>
                        </span>
                    </h1>
                    <h3>Total Amount Available :- ${{ $total_funds_raised - $total_cashed_out }}</h3>
                    <h3>Total Cashed Out :- ${{ $total_cashed_out }}</h3>
                    <hr />
                    <table border="0" style="width: 100%" class="table">
                        <thead>
                        <tr>
                            <td>Amount</td>
                            <td>Type</td>
                            <td>Bank Details</td>
                            <td>Status</td>
                            <td>Description</td>
                            <td>Requested Date</td>
                            <td>Last Updated</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cash_outs as $cash_out)
                            <tr>
                                <td>${{$cash_out->amount}}</td>
                                <td>
                                    @if($cash_out->type == "bank")
                                        Bank Transfer
                                     @elseif($cash_out->type == "cash")
                                        Cash
                                     @else
                                        Cheque
                                    @endif
                                </td>
                                <td>
                                    {{$cash_out->bank_name}}<br>
                                    {{$cash_out->bank_acc_no}}<br>
                                    {{$cash_out->bank_account_holder_name}}<br>
                                    {{$cash_out->bank_account_type}}<br>
                                    {{$cash_out->aba_routing_number}}<br>
                                </td>
                                <td>{{$cash_out->status}}</td>
                                <td>{{$cash_out->description}}</td>
                                <td>{{date('Y-m-d',strtotime($cash_out->created_at))}}</td>
                                <td>{{date('Y-m-d',strtotime($cash_out->updated_at))}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$cash_outs->render()}}
                </div>
            </div>
        </div>
        <div id="cash_out_form" class="modal fade">
            <div class="modal-dialog" style="width: 30%">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">X</span> <span class="sr-only">close</span>
                        </button>
                        <h4 id="modalaTitle" class="modal-title">Cash Out</h4>
                    </div>
                    <div id="modalaBody" class="modal-body">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label>Amount</label>
                                    <div class="control-group">
                                        <input name="amount" id="amount" type="number" min="0" max="{{$total_funds_raised}}" required class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Type</label>
                                    <div class="control-group">
                                        <select name="type" id="type" required class="form-control" onchange="showBank(this.value)">
                                            <option value="cash">Cash</option>
                                            <option value="Cheque">Cheque</option>
                                            <option value="bank">Bank Transfer</option>
                                        </select>
                                    </div>
                                </div>
                                <div id="bank_details" style="display: none">
                                    <div class="form-group">
                                        <label>Bank Name</label>
                                        <div class="control-group">
                                            <input name="bank_name" id="bank_name" type="text" required class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Bank Account Number</label>
                                        <div class="control-group">
                                            <input name="bank_acc_no" id="bank_acc_no" type="text" required class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Account Holder Name</label>
                                        <div class="control-group">
                                            <input name="bank_account_holder_name" id="bank_account_holder_name" type="text" required class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Type</label>
                                        <div class="control-group">
                                            <select name="bank_account_type" id="bank_account_type" required class="form-control">
                                                <option value="current">Current</option>
                                                <option value="saving">Saving</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>ABA Routing Number</label>
                                        <div class="control-group">
                                            <input name="aba_routing_number" id="aba_routing_number" type="text" required class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    <div class="control-group">
                                        <textarea name="description" id="description" required class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="button" onclick="saveCashout()" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
        <font class="text-left"></font>
    </section>

    <script>
        var total = '{{$total_funds_raised}}';
        function showBank(val) {
            if(val == "bank") {
                $('#bank_details').show();
            }else {
                $('#bank_details').hide();
            }
        }

        function saveCashout() {
            var amount = $('#amount').val();
            var type = $('#type').val();
            var bank_name = $('#bank_name').val();
            var bank_acc_no = $('#bank_acc_no').val();
            var bank_account_holder_name = $('#bank_account_holder_name').val();
            var bank_account_type = $('#bank_account_type').val();
            var aba_routing_number = $('#aba_routing_number').val();
            var description = $('#description').val();
            if(amount > total) {
                alert('amount must be less than the available amount');
                return;
            }
            $.ajax({
                url: '{{url('/entrepreneur/cash-out')}}',
                type: 'post',
                data : {
                    _token : '{{csrf_token()}}',
                    amount : amount,
                    type : type,
                    bank_name : bank_name,
                    bank_acc_no : bank_acc_no,
                    bank_account_holder_name : bank_account_holder_name,
                    bank_account_type : bank_account_type,
                    aba_routing_number : aba_routing_number,
                    description : description,
                },
                success : function() {
                    window.location.reload();
                }
            })
        }
    </script>
@endsection
