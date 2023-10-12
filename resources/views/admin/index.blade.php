@extends('admin.admin_master')
@section('admin')
@php
$date = date('d F Y');
$today = App\Models\Order::where('order_date',$date)->sum('amount');

$month = date('F');
$monthly_sale = App\Models\Order::where('order_month',$month)->sum('amount');

$year = date('Y');
$yearly_sale = App\Models\Order::where('order_year',$year)->sum('amount');

$pending_order = App\Models\Order::where('status','pending')->get();

    @endphp
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xl-3 col-6">
            <div class="box overflow-hidden pull-up">
                <div class="box-body">
                    <div class="icon bg-primary-light rounded w-60 h-60">
                        <i class="text-primary mr-0 font-size-24 mdi mdi-account-multiple"></i>
                    </div>
                    <div>
                        <p class="text-mute mt-20 mb-0 font-size-16">Today's Sale</p>
                        <h3 class="text-white mb-0 font-weight-500">${{ $today }} <small class="text-success"><i class="fa fa-caret-up"></i> USD</small></h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-6">
            <div class="box overflow-hidden pull-up">
                <div class="box-body">
                    <div class="icon bg-warning-light rounded w-60 h-60">
                        <i class="text-warning mr-0 font-size-24 mdi mdi-car"></i>
                    </div>
                    <div>
                        <p class="text-mute mt-20 mb-0 font-size-16">Monthly Sale</p>
                        <h3 class="text-white mb-0 font-weight-500">${{ $monthly_sale }} <small class="text-success"><i class="fa fa-caret-up"></i> USD</small></h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-6">
            <div class="box overflow-hidden pull-up">
                <div class="box-body">
                    <div class="icon bg-info-light rounded w-60 h-60">
                        <i class="text-info mr-0 font-size-24 mdi mdi-sale"></i>
                    </div>
                    <div>
                        <p class="text-mute mt-20 mb-0 font-size-16">Yearly Sale</p>
                        <h3 class="text-white mb-0 font-weight-500">${{ $yearly_sale }} <small class="text-danger"><i class="fa fa-caret-down"></i> USD</small></h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-6">
            <div class="box overflow-hidden pull-up">
                <div class="box-body">
                    <div class="icon bg-danger-light rounded w-60 h-60">
                        <i class="text-danger mr-0 font-size-24 mdi mdi-phone-incoming"></i>
                    </div>
                    <div>
                        <p class="text-mute mt-20 mb-0 font-size-16">Number of Pending Order's</p>
                        <h3 class="text-white mb-0 font-weight-500">{{ count($pending_order) }} <small class="text-danger"><i class="fa fa-caret-up"></i> Order</small></h3>
                    </div>
                </div>
            </div>
        </div>




        <div class="col-12">
            <div class="box">
                <div class="box-header">
                    <h4 class="box-title align-items-start flex-column">
                        All Recent Order

                    </h4>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table no-border">
                            <thead>
                            <tr class="text-uppercase bg-lightest">
                                <th style="min-width: 250px"><span class="text-white">Name</span></th>
                                <th style="min-width: 100px"><span class="text-fade">Order Date</span></th>
                                <th style="min-width: 100px"><span class="text-fade">Invoice</span></th>
                                <th style="min-width: 150px"><span class="text-fade">Payment Type</span></th>
                                <th style="min-width: 130px"><span class="text-fade">Amount</span></th>
                                <th style="min-width: 130px"><span class="text-fade">Order Date</span></th>
                                <th style="min-width: 130px"><span class="text-fade">Status</span></th>
                                <th style="min-width: 120px"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $orders = App\Models\Order::where('status','pending')->latest()->get();
                             @endphp
                            @foreach( $orders as $order )
                            <tr>
                                <td class="pl-0 py-8">
                                    <span class="text-fade font-weight-600 d-block font-size-16">
													{{ $order->name }}

                                </td>
                                <td>
												<span class="text-fade font-weight-600 d-block font-size-16">
													{{ $order->order_date }}
												</span>

                                </td>
                                <td>
												<span class="text-fade font-weight-600 d-block font-size-16">
													{{ $order->invoice_number }}
												</span>

                                </td>
                                <td>
												<span class="text-fade font-weight-600 d-block font-size-16">
													{{ $order->payment_method  }}
												</span>

                                </td>
                                <td>
												<span class="text-fade font-weight-600 d-block font-size-16">
													{{ $order->amount  }}
												</span>

                                </td>
                                <td>
												<span class="text-fade font-weight-600 d-block font-size-16">
													{{ $order->order_date  }}
												</span>

                                </td>
                                <td>
												<span class="text-fade font-weight-600 d-block font-size-16">
													{{ $order->status   }}
												</span>

                                </td>

                                <td class="text-right">
                                    <a href="#" class="waves-effect waves-light btn btn-info btn-circle mx-5"><span class="mdi mdi-bookmark-plus"></span></a>
                                    <a href="#" class="waves-effect waves-light btn btn-info btn-circle mx-5"><span class="mdi mdi-arrow-right"></span></a>
                                </td>
                            </tr>

                            @endforeach



                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
