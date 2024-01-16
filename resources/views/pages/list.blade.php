@extends('master')
@section('contents')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{__('lang.pages.invoice_list.title')}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('invoice.index')}}">{{__('lang.pages.invoice_list.bread_crumb.invoice')}}</a></li>
              <li class="breadcrumb-item active">{{__('lang.pages.invoice_list.bread_crumb.list')}}</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table text-nowrap">
                  <thead>
                  <tr>
                    <th>{{__('lang.pages.invoice_list.table.invoice_number')}}</th>
                    <th>{{__('lang.pages.invoice_list.table.customer')}}</th>
                    <th>{{__('lang.pages.invoice_list.table.carried_over')}}</th>
                    <th>{{__('lang.pages.invoice_list.table.total_purchase')}}</th>
                    <th>{{__('lang.pages.invoice_list.table.current_amount')}}</th>
                    <th>{{__('lang.pages.invoice_list.table.action')}}</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($invoices as $invoice)
                    <tr class="no-border-row">
                      <td>{{$invoice->invoice_number}}</td>
                      <td>{{$invoice->customer->name}}</td>
                      <td>{{$invoice->carried_over}}</td>
                      <td>{{$invoice->total_purchase}}</td>
                      <td>{{$invoice->current_purchase_amount}}</td>
                      <td>
{{--                        <a href="{{$invoice->detail_url}}}"><label class="primary">{{__('lang.pages.invoice_list.table.view_action')}}</label></a>--}}
                        <a href="{{ $invoice->detail_url }}" class="btn btn-primary btn-sm">
                          {{ __('lang.pages.invoice_list.table.view_action') }}
                        </a>
                      </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
                @include('layouts.pagination')

              </div>


              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <!-- /.content-wrapper -->
@endsection

