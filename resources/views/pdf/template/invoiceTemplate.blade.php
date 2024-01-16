
<h4>
  <i class="fas fa-globe"></i> {{__('lang.pages.invoice_preview.invoice_title')}}
  <small style="float:right">{{__('lang.pages.invoice_preview.deadline')}}: {{$invoice->parsed_deadline}}</small>
</h4>

<!-- Info row -->
<table class="no-border-table">
  <tr>
    <td width="50%">
      <strong>{{__('lang.pages.invoice_preview.customer_no')}}</strong> {{ $invoice->customer->code }}<br>
      <strong>{{$invoice->customer->name}}</strong><br>
      {{$invoice->customer->address}}<br>
      {{__('lang.pages.invoice_preview.postal_code')}} {{$invoice->customer->postal_code}}<br>
      {{__('lang.pages.invoice_preview.phone_number')}} {{$invoice->customer->phone_number}}<br>
    </td>
    <td width="50%">
      <br>
      <strong>{{$invoice->company->name}}</strong><br>
      {{$invoice->company->address}}<br>
      {{__('lang.pages.invoice_preview.postal_code')}} {{$invoice->company->postal_code}}<br>
      {{__('lang.pages.invoice_preview.phone_number')}} {{$invoice->company->phone_number}}<br>
      {{__('lang.pages.invoice_preview.bank_name')}} {{$invoice->company->bank_name}}<br>
      {{__('lang.pages.invoice_preview.account_number')}} {{$invoice->company->bank_account_number}}<br>
      {{__('lang.pages.invoice_preview.registration_number')}} {{$invoice->company->registration_number}}<br>
    </td>
  </tr>
</table>

<table class="no-border-table">
  <tr>
    <td width="50%">
      {{__('lang.pages.invoice_preview.thank_you_text')}}<br>
      {{__('lang.pages.invoice_preview.thank_you_text2')}}
    </td>
    <td width="50%">
      {{__('lang.pages.invoice_preview.notice_text')}}
    </td>
  </tr>
</table>

<!-- Table row -->
<div class="table-responsive">
  <table>
    <thead>
    <tr>
      <th>{{__('lang.pages.invoice_preview.table_1.last_billed_amount')}}</th>
      <th>{{__('lang.pages.invoice_preview.table_1.deposit_amount')}}</th>
      <th>{{__('lang.pages.invoice_preview.table_1.carry_over')}}</th>
      <th>{{__('lang.pages.invoice_preview.table_1.purchase_amount')}}</th>
      <th>{{__('lang.pages.invoice_preview.table_1.consumption_amount')}}</th>
      <th>{{__('lang.pages.invoice_preview.table_1.purchase_total')}}</th>
      <th>{{__('lang.pages.invoice_preview.table_1.current_billing_amount')}}</th>
    </tr>
    </thead>
    <tbody>
    @if($page == 1)
    <tr>
      <td >{{ $invoice->previous_amount }}</td>
      <td >{{ $invoice->received_amount }}</td>
      <td >{{ $invoice->carried_over }}</td>
      <td >{{ $invoice->purchased_amount }}</td>
      <td >{{ $invoice->consumption_tax }}</td>
      <td >{{ $invoice->total_purchase }}</td>
      <td >{{ $invoice->current_purchase_amount }}</td>
    </tr>
    @else
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
    @endif
    </tbody>
  </table>
</div>
<div class="table-responsive">
  <table >
    <thead>
    <tr>
      <th>{{__('lang.pages.invoice_preview.table_2.voucher_date')}}</th>
      <th>{{__('lang.pages.invoice_preview.table_2.voucher_no')}}</th>
      <th>{{__('lang.pages.invoice_preview.table_2.item_code')}}.{{__('lang.pages.invoice_preview.table_2.item_name')}}</th>
      <th class="text-center">{{__('lang.pages.invoice_preview.table_2.quantity')}}</th>
      <th>{{__('lang.pages.invoice_preview.table_2.unit')}}</th>
      <th>{{__('lang.pages.invoice_preview.table_2.unit_price')}}</th>
      <th>{{__('lang.pages.invoice_preview.table_2.purchase_price')}}</th>
    </tr>
    </thead>
    <tbody>
    @php $previousVoucherDate = null; @endphp
    @foreach($items as $item)
      <tr @if(!$loop->last)class="no-bottom-border" @endif>
        <td >{{ $item->voucher_date != $previousVoucherDate ? $item->parsed_voucher_date  : '' }}</td>
        <td >{{ $item->voucher_no }}</td>
        <td >{{ $item->item_code . $item->item_name }}</td>
        <td >{!! $item->reduced_tax?__('lang.pages.invoice_preview.notice_symbol')."&nbsp;".$item->quantity:$item->quantity !!}</td>
        <td >{{ $item->unit }}</td>
        <td >{{ $item->parsed_unit_price }}</td>
        <td >{{ $item->parsed_purchase_price }}</td>
      </tr>
      @php $previousVoucherDate = $item->voucher_date; @endphp
    @endforeach

    @if($page ==1)
    <tr>
      <td></td>
      <td></td>
      <td >
        {{__('lang.pages.invoice_preview.total')}}<br>
        10% {{__('lang.pages.invoice_preview.target_tax')}}<br>
        8% {{__('lang.pages.invoice_preview.target_tax')}}<br>
      </td>
      <td >
        {{$invoice->purchased_amount  }}<br>
        {{$invoice->regular_taxable_amount}}<br>
        {{$invoice->reduced_taxable_amount}}<br>
      </td>
      <td ></td>
      <td >
        {{__('lang.pages.invoice_preview.consumption_tax')}}<br>
        {{__('lang.pages.invoice_preview.consumption_tax')}}<br>
        {{__('lang.pages.invoice_preview.consumption_tax')}}<br>
      </td>

      <td >
        {{$invoice->consumption_tax}}<br>
        {{$invoice->regular_tax_amount}}<br>
        {{$invoice->reduced_tax_amount}}<br>
      </td>
    </tr>
    @endif
    </tbody>
  </table>
</div>