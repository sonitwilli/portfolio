@extends('admin.master')
@section('content')
    <div class="content-header">
        <div class="header-section">
            <h1>{{--<i class="fa fa-spinner fa-3x fa-spin"></i>--}}<i class="gi gi-pencil"></i> Orders<br><small>Detail order</small></h1>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li>Pages</li>
        <li><a href="{!! url('admin/products/orders') !!}">Orders Center</a></li>
    </ul>
    <!-- Order Status -->
    <div class="row text-center">
        <div class="col-sm-6 col-lg-3">
            <div class="widget">
                <div class="widget-extra themed-background-success">
                    <h4 class="widget-content-light"><strong>ORD.{!! $result->id !!}</strong></h4>
                </div>
                <div class="widget-extra-full"><span class="h2 text-success animation-expandOpen">{!! convertDateTime($result->created_at) !!}</span></div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="widget">
                <div class="widget-extra themed-background-success">
                    <h4 class="widget-content-light"><i class="fa fa-paypal"></i> <strong>Payment</strong></h4>
                </div>
                <div class="widget-extra-full"><span class="h2 text-success animation-expandOpen"><i class="fa fa-check"></i></span></div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="widget">
                <div class="widget-extra themed-background-warning">
                    <h4 class="widget-content-light"><i class="fa fa-archive"></i> <strong>Packaging</strong></h4>
                </div>
                <div class="widget-extra-full"><span class="h2 text-warning"><i class="fa fa-refresh fa-spin"></i></span></div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="widget">
                <div class="widget-extra themed-background-muted">
                    <h4 class="widget-content-light"><i class="fa fa-truck"></i> <strong>Delivery</strong></h4>
                </div>
                <div class="widget-extra-full"><span class="h2 text-muted animation-pulse"><i class="fa fa-ellipsis-h"></i></span></div>
            </div>
        </div>
    </div>
    <!-- END Order Status -->

    <!-- Products Block -->
    <div class="block">
        <!-- Products Title -->
        <div class="block-title">
            <h2><i class="fa fa-shopping-cart"></i> <strong>Products</strong></h2>
            <div class="block-options pull-right">
                <a href="javascript:void(0)" class="btn btn-sm btn-alt btn-default" onclick="App.pagePrint();"><i class="fa fa-print"></i> Print</a>
            </div>
        </div>
        <!-- END Products Title -->

        <!-- Products Content -->
        <div class="table-responsive">
            <table class="table table-bordered table-vcenter">
                <thead>
                <tr>
                    <th class="text-center" style="width: 100px;">ID</th>
                    <th>Product Name</th>
                    <th class="text-center">QTY</th>
                    <th class="text-right" style="width: 10%;">UNIT COST</th>
                    <th class="text-right" style="width: 10%;">PRICE</th>
                </tr>
                </thead>
                <tbody>
                @if($order_detail != null)
                    @foreach($order_detail as $detail)
                        <tr>
                            <td class="text-center"><a href="{!! url('admin/products/edit/'.$detail->product_id) !!}"><strong>PID.{!! $detail->product_id !!}</strong></a></td>
                            <td><a href="{!! url('admin/products/edit/'.$detail->product_id) !!}">{!! $detail->productData->name !!}</a></td>
                            <td class="text-center"><strong>{!! $detail->qty !!}</strong></td>
                            <td class="text-right"><strong>${!! number_format($detail->unit_cost, 0, '.', ',') !!}</strong></td>
                            <td class="text-right"><strong>${!! number_format($detail->price, 0, '.', ',') !!}</strong></td>
                        </tr>
                    @endforeach
                @endif
                <tr>
                    <td colspan="4" class="text-right text-uppercase"><strong>Total Price:</strong></td>
                    <td class="text-right"><strong>${!! number_format($result->price, 0, '.', ',') !!}</strong></td>
                </tr>
                <tr>
                    <td colspan="4" class="text-right text-uppercase"><strong>Total Paid:</strong></td>
                    <td class="text-right"><strong>${!! number_format($result->price, 0, '.', ',') !!}</strong></td>
                </tr>
                <tr class="active">
                    <td colspan="4" class="text-right text-uppercase"><strong>Total Due:</strong></td>
                    <td class="text-right"><strong>$0,00</strong></td>
                </tr>
                </tbody>
            </table>
        </div>
        <!-- END Products Content -->
    </div>
    <!-- END Products Block -->

    <!-- Addresses -->
    <div class="row">
        @if($billing != null)
        <div class="col-sm-6">
            <!-- Billing Address Block -->
            <div class="block">
                <!-- Billing Address Title -->
                <div class="block-title">
                    <h2><i class="fa fa-building-o"></i> <strong>Billing</strong> Address</h2>
                </div>
                <!-- END Billing Address Title -->

                <!-- Billing Address Content -->
                <h4><strong>{{ $result->customerData->name }}</strong></h4>
                <address>
                    {{ $billing->address }}<br>
                    {{ $billing->city }}<br>
                    <i class="fa fa-phone"></i> {{ $billing->phone }}<br>
                    <i class="fa fa-envelope-o"></i> <a href="javascript:void(0)">{{ $result->customerData->email }}</a>
                </address>
                <!-- END Billing Address Content -->
            </div>
            <!-- END Billing Address Block -->
        </div>
        @endif
        @if($shipping != null)
        <div class="col-sm-6">
            <!-- Shipping Address Block -->
            <div class="block">
                <!-- Shipping Address Title -->
                <div class="block-title">
                    <h2><i class="fa fa-building-o"></i> <strong>Shipping</strong> Address</h2>
                </div>
                <!-- END Shipping Address Title -->

                <!-- Shipping Address Content -->
                <h4><strong>{{ $result->customerData->name }}</strong></h4>
                <address>
                    {{ $shipping->address }}<br>
                    {{ $shipping->city }}<br>
                    <i class="fa fa-phone"></i> {{ $shipping->phone }}<br>
                    <i class="fa fa-envelope-o"></i> <a href="javascript:void(0)">{{ $result->customerData->email }}</a>
                </address>
                <!-- END Shipping Address Content -->
            </div>
            <!-- END Shipping Address Block -->
        </div>
        @endif
    </div>
    @if($shipping != null)
    <!-- END Addresses -->
    <div class="block">
        <!-- Billing Address Title -->
        <div class="block-title">
            <h2><i class="fa fa-comments-o"></i> <strong>Message</strong></h2>
        </div>
        <!-- END Billing Address Title -->

        <address>
            {{ $shipping->content }}
        </address>
        <!-- END Billing Address Content -->
    </div>
    @endif
@endsection
