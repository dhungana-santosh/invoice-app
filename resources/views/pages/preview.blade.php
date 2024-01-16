@extends('master')
@section('contents')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{__('lang.pages.invoice_preview.title')}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('invoice.index')}}">{{__('lang.pages.invoice_preview.bread_crumb.invoice')}}</a></li>
              <li class="breadcrumb-item active">{{__('lang.pages.invoice_preview.bread_crumb.preview')}}</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
      <div class="row no-print">
        <div class="col-12">
          <a href="{{ route("invoice.generate.pdf", $invoice->id) }}" rel="noopener" target="_blank" class="btn btn-success float-right">
            <i class="fas fa-download"></i> {{__('lang.pages.invoice_preview.download')}}
          </a>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> {{__('lang.pages.invoice_preview.invoice_title')}}
                    <small class="float-right">{{__('lang.pages.invoice_preview.deadline')}}: {{$invoice->parsed_deadline}}</small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-6 invoice-col">
                    {{__('lang.pages.invoice_preview.customer_no')}} {{$invoice->customer->code}}
                  <address>
                    <strong>{{$invoice->customer->name}}</strong><br>
                    {{$invoice->customer->address}}<br>
                    {{__('lang.pages.invoice_preview.postal_code')}} {{$invoice->customer->postal_code}}<br>
                    {{__('lang.pages.invoice_preview.phone_number')}} {{$invoice->customer->phone_number}}<br>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-6 invoice-col">
                  <br>
                  <address>
                    <strong>{{$invoice->company->name}}</strong><br>
                    {{$invoice->company->address}}<br>
                    {{__('lang.pages.invoice_preview.postal_code')}} {{$invoice->company->postal_code}}<br>
                    {{__('lang.pages.invoice_preview.phone_number')}} {{$invoice->company->phone_number}}<br>
                    {{__('lang.pages.invoice_preview.bank_name')}} {{$invoice->company->bank_name}}<br>
                    {{__('lang.pages.invoice_preview.account_number')}} {{$invoice->company->bank_account_number}}<br>
                    {{__('lang.pages.invoice_preview.registration_number')}} {{$invoice->company->registration_number}}<br>
                  </address>
                </div>
                <!-- /.col -->
                <!-- /.col -->
              </div>
              <div class="row invoice-info">
                <div class="col-sm-6 invoice-col">
                  {{__('lang.pages.invoice_preview.thank_you_text')}}<br>
                  {{__('lang.pages.invoice_preview.thank_you_text2')}}
                </div>
                <!-- /.col -->
                <div class="col-sm-6 invoice-col">
                  {{__('lang.pages.invoice_preview.notice_text')}}
                </div>
                <!-- /.col -->
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-bordered">
                    <thead>
                    <tr>
                      <th class="text-center">{{__('lang.pages.invoice_preview.table_1.last_billed_amount')}}</th>
                      <th class="text-center">{{__('lang.pages.invoice_preview.table_1.deposit_amount')}}</th>
                      <th class="text-center">{{__('lang.pages.invoice_preview.table_1.carry_over')}}</th>
                      <th class="text-center">{{__('lang.pages.invoice_preview.table_1.purchase_amount')}}</th>
                      <th class="text-center">{{__('lang.pages.invoice_preview.table_1.consumption_amount')}}</th>
                      <th class="text-center">{{__('lang.pages.invoice_preview.table_1.purchase_total')}}</th>
                      <th class="text-center">{{__('lang.pages.invoice_preview.table_1.current_billing_amount')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td class="text-right">{{$invoice->parsed_previous_amount}}</td>
                      <td class="text-right">{{$invoice->parsed_received_amount}}</td>
                      <td class="text-right">{{$invoice->parsed_carried_over}}</td>
                      <td class="text-right">{{$invoice->purchased_amount}}</td>
                      <td class="text-right">{{$invoice->consumption_tax}}</td>
                      <td class="text-right">{{$invoice->total_purchase}}</td>
                      <td class="text-right">{{$invoice->current_purchase_amount}}</td>
                    </tr>
                    </tbody>
                  </table>
                </div>

                <div class="col-12 table-responsive">
                  <table class="table custom-table">
                    <thead>
                    <tr>
                      <th class="text-center">{{__('lang.pages.invoice_preview.table_2.voucher_date')}}</th>
                      <th class="text-center">{{__('lang.pages.invoice_preview.table_2.voucher_no')}}</th>
                      <th class="text-center">{{__('lang.pages.invoice_preview.table_2.item_code')}}.{{__('lang.pages.invoice_preview.table_2.item_name')}}</th>
                      <th class="text-center">{{__('lang.pages.invoice_preview.table_2.quantity')}}</th>
                      <th class="text-center">{{__('lang.pages.invoice_preview.table_2.unit')}}</th>
                      <th class="text-center">{{__('lang.pages.invoice_preview.table_2.unit_price')}}</th>
                      <th class="text-center">{{__('lang.pages.invoice_preview.table_2.purchase_price')}}</th>
                    </tr>
                    </thead>
                    <tbody>

                    @php
                      $previousVoucherDate = null;
                    @endphp

                    @foreach($invoice->items as $item)
                    <tr>
                      @if($item->voucher_date != $previousVoucherDate)
                        <td rowspan="{{ $invoice->items->where('voucher_date', $item->voucher_date)->count() }}">
                          {{ $item->parsed_voucher_date }}
                        </td>
                        @php
                          $previousVoucherDate = $item->voucher_date;
                        @endphp
                      @endif
                      <td class="text-right">{{$item->voucher_no}}</td>
                      <td class="text-right">{{$item->item_code.$item->item_name}}</td>
                      <td class="text-right">{!! $item->reduced_tax?__('lang.pages.invoice_preview.notice_symbol')."&nbsp;".$item->quantity:$item->quantity !!}</td>
                      <td class="text-right">{{$item->unit}}</td>
                      <td class="text-right">{{$item->parsed_unit_price}}</td>
                      <td class="text-right">{{$item->parsed_purchase_price}}</td>
                    </tr>
                    @endforeach
                    <tr>
                      <td class="text-right"></td>
                      <td class="text-right"></td>
                      <td class="text-right">
                          {{__('lang.pages.invoice_preview.total')}}<br>
                        10% {{__('lang.pages.invoice_preview.target_tax')}}<br>
                        8% {{__('lang.pages.invoice_preview.target_tax')}}<br>
                      </td>
                      <td class="text-right">
                        {{$invoice->purchased_amount  }}<br>
                        {{$invoice->regular_taxable_amount}}<br>
                        {{$invoice->reduced_taxable_amount}}<br>
                      </td>
                      <td class="text-right"></td>
                      <td class="text-right">
                        {{__('lang.pages.invoice_preview.consumption_tax')}}<br>
                        {{__('lang.pages.invoice_preview.consumption_tax')}}<br>
                        {{__('lang.pages.invoice_preview.consumption_tax')}}<br>
                      </td>

                      <td class="text-right">
                        {{$invoice->consumption_tax}}<br>
                        {{$invoice->regular_tax_amount}}<br>
                        {{$invoice->reduced_tax_amount}}<br>
                      </td>
                    </tr>

                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
