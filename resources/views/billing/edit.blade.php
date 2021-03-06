@extends('layouts.master')

@section('title')
    Update Invoice
@endsection

@section('content')
<form method="post" action="{{ route('billing.store_edit') }}">
   <div class="row">
      <div class="col">
         @if ($errors->any())
         <div class="alert alert-danger">
            <ul>
               @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
               @endforeach
            </ul>
         </div>
         @endif
         @if (session('success'))
         <div class="alert alert-success">
            {{ session('success') }}
         </div>
         @endif
      </div>
   </div>
   <div class="row justify-content-center">
      <div class="col-md-4">
         <div class="card shadow mb-4">
            <div class="card-header py-3">
               <h6 class="m-0 font-weight-bold text-primary">{{ __('sentence.Informations') }}</h6>
            </div>
            <div class="card-body">
               <div class="form-group">
                  <label for="medicine">{{ __('sentence.Select Patient') }}</label>
                  <select class="form-control select2 select2-hidden-accessible" id="medicine" tabindex="-1" name="patient_id" aria-hidden="true">
                     <option selected value="{{ $billing->Patient->id }}">{{ $billing->Patient->name }}</option>
                     @foreach($patients as $patient)
                     <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                     @endforeach
                  </select>
                  <input type="hidden" class="form-control" id="inputEmail3" name="id" value="{{ $billing->id }}">

                  {{ csrf_field() }}
               </div>
               <div class="form-group">
                  <label for="PaymentMode">{{ __('sentence.Payment Mode') }}</label>
                  <select class="form-control" name="payment_mode" id="PaymentMode">
                     <option selected value="{{ $billing->payment_mode }}">{{ $billing->payment_mode }}</option>
                     <option value="Cash">{{ __('sentence.Cash') }}</option>
                     <option value="UPI">{{ __('sentence.UPI') }}</option>
                  </select>
               </div>
               <div class="form-group">
                  <label for="PaymentMode">{{ __('sentence.Payment Status') }}</label>
                  <select class="form-control" name="payment_status">
                     <option selected value="{{ $billing->payment_status }}">{{ $billing->payment_status }}</option>
                     <option value="Paid">{{ __('sentence.Paid') }}</option>
                     <option value="Unpaid">{{ __('sentence.Unpaid') }}</option>
                     <option value="Balance">{{ __('sentence.Balance/Pending') }}</option>
                  </select>
               </div>
               <div class="form-group">
                  <input type="submit" value="Update Invoice" class="btn btn-warning" align="center">
               </div>
            </div>
         </div>
      </div>
      <div class="col-md-8">
         <div class="card shadow mb-4">
            <div class="card-header py-3">
               <h6 class="m-0 font-weight-bold text-primary">{{ __('sentence.Invoice Details') }}</h6>
            </div>
            <div class="card-body">
                <fieldset class="todos_labels">
                    @foreach ($billing_items as $item)
                    <div class="field-group row">
                        <div class="col">
                            <div class="form-group-custom">
                                <input type="text" id="strength" name="invoice_title[]" value="{{$item->invoice_title}}" class="form-control" placeholder="{{ __('sentence.Invoice Title') }}">
                                <input type="hidden" class="form-control" id="inputEmail3" name="invoice_id[]" value="{{ $item->id }}">
                            
                            </div>
                        </div>

                        <div class="col">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">???</span>
                                </div>
                                <input type="text" class="form-control" value="{{$item->invoice_amount}}" placeholder="{{ __('sentence.Amount') }}" aria-label="Amount" aria-describedby="basic-addon1" name="invoice_amount[]">
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group-custom">
                                <select class="form-control" name="invoice_status[]">
                                    <option value="{{ $item->invoice_status }}">{{ $item->invoice_status }}</option>
                                    <option value="Paid">{{ __('sentence.Paid') }}</option>
                                    <option value="Balance">{{ __('sentence.Balance/Pending') }}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="repeatable"></div>
                    {{-- <div class="form-group">
                        <a type="button" class="btn btn-success add text-white" align="center"><i class='fa fa-plus'></i> {{ __('sentence.Add More') }}</a>
                    </div> --}}
            </fieldset>
            </div>
         </div>
      </div>
   </div>
</form>
@endsection

@section('footer')
<script type="text/template" id="todos_labels">
   <div class="field-group row">
    <div class="col">
       <div class="form-group-custom">
          <input type="text" id="strength" name="invoice_title[]"  class="form-control" placeholder="{{ __('sentence.Invoice Title') }}">
       </div>
    </div>
    <div class="col">
       <div class="input-group mb-3">
          <div class="input-group-prepend">
             <span class="input-group-text" id="basic-addon1">???</span>
          </div>
          <input type="text" class="form-control" placeholder="{{ __('sentence.Amount') }}" aria-label="Amount" aria-describedby="basic-addon1" name="invoice_amount[]">
       </div>
    </div>
    <div class="col">
      <div class="form-group-custom">
         <select class="form-control" name="invoice_status[]">
            <option value="Paid">{{ __('sentence.Paid') }}</option>
            <option value="Balance">{{ __('sentence.Balance/Pending') }}</option>
         </select>
      </div>
   </div>
    
    <div class="col-md-2">
       <a type="button" class="btn btn-sm btn-danger text-white span-2 delete"><i class="fa fa-times-circle"></i> {{ __('sentence.Remove') }}</a>
    </div>
   </div>
</script>
@endsection