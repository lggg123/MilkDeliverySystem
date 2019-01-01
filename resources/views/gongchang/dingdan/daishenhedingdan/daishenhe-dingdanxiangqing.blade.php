@extends('gongchang.layout.master')
@section('css')
    <link href="<?=asset('css/pages/order_detail_product.css')?>" rel="stylesheet">
    <style>
        #save_sub_addr {
            display: none;
        }
    </style>
@endsection
@section('content')
    @include('gongchang.theme.sidebar')
    <div id="page-wrapper" class="white-bg dashbard-1">
        @include('gongchang.theme.header')
        <div class="row border-bottom">
            <ol class="breadcrumb gray-bg" style="padding:5px 0 5px 50px;">
                <li>
                    <a href="">订单管理</a>
                </li>
                <li>
                    <a href={{URL::to('/gongchang/dingdan/daishenhedingdan')}}><strong>待审核订单</strong></a>
                </li>
                <li class="active">
                    <strong>待审核-订单详情</strong>
                </li>
            </ol>
        </div>
        <br>
        <div class="row white-bg">
            <div class="col-md-12 gray-bg">
                <label class="col-sm-10">订单信息</label>
            </div>
            <div class="feed-element col-md-12">
                <label class="col-md-2">订单号:</label>
                <label>{{$order->number}}</label>
            </div>
            <div class="feed-element col-md-12">
                <label class="col-md-2">订单状态:</label>
                <label>{{$order->status_name}}</label>
            </div>
            <div class="col-md-12 gray-bg">
                <label class="col-sm-10">客户信息</label>
            </div>
            <div class="feed-element col-md-12">
                <label class="col-md-2">订单性质:</label>
                <label>{{$order->order_property_name}}</label>
            </div>
            <div class="feed-element col-md-12">
                <label class="control-label col-md-2">收货人:</label>
                <label>{{$order->customer_name}}</label>
            </div>
            <div class="feed-element col-md-12">
                <label class="control-label col-md-2">电话:</label>
                <label>{{$order->phone}}</label>
            </div>
            <div class="feed-element col-md-12">
                <label class="col-md-2">收货地址:</label>
                <label>{{$order->main_address}}</label>
                <input id="sub_addr" data-origin="{{$order->getAddrHouseNumber()}}" type="text" disabled name="change_sub_addr"
                       value="{{$order->getAddrHouseNumber()}}"/>
                <button id="change_sub_addr" type="button" class="btn btn-success btn-outline"><i
                            class="fa fa-pencil"></i>修改
                </button>
                <button id="save_sub_addr" type="button" class="btn btn-success btn-outline"><i class="fa fa-save"></i>保存
                </button>
            </div>

            <div class="col-md-12 gray-bg">
                <label class="col-sm-10">奶站信息</label>
            </div>
            <div class="feed-element col-md-12">
                <label class="control-label col-md-2">奶站:</label>
                <label>{{$order->delivery_station_name}}</label>
            </div>
            <div class="feed-element col-md-12">
                <label class="control-label col-md-2">配送员:</label>
                <label>{{$order->milkman_name}}</label>
            </div>
            <div class="feed-element col-md-12">
                <label class="control-label col-md-2">征订员:</label>
                <label>{{$order->order_checker_name}}</label>
            </div>
            <div class="feed-element col-md-12">
                <label class="control-label col-md-2">票据号:</label>
                <label>{{$order->receipt_number}}</label>
            </div>
            <div class="feed-element col-md-12">
                <div class="col-md-offset-2">
                    @if($order->receipt_path)
                        <img id="ticket" src="<?=asset('img/order/' . $order->receipt_path)?>" class="img-responsive"/>
                    @endif
                </div>
            </div>

            <div class="col-md-12 gray-bg">
                <label class="col-md-12">订单内容</label>
            </div>
            <div class="feed-element col-md-12">
                <label class="control-label col-md-2">起送日期:</label>
                <label>{{$order->start_at}}</label>
            </div>
            <div class="feed-element col-md-12">
                <label class="control-label col-md-2">奶箱安装:</label>
                <label>{{$order->milk_box_install_label}}</label>
            </div>
            <div class="feed-element col-md-12">
                <label class="control-label col-md-2">支付方式:</label>
                <label>{{$order->payment_type_name}}</label>
            </div>
            <div class="col-md-12">
                <div class="ibox-content">
                    <table id="product_table" class="table table-bordered">
                        <thead>
                        <tr>
                            <th data-sort-ignore="true">序号</th>
                            <th data-sort-ignore="true">奶品</th>
                            <th data-sort-ignore="true">订单类型</th>
                            <th data-sort-ignore="true">数量</th>
                            <th data-sort-ignore="true">剩余量</th>
                            <th data-sort-ignore="true">起送日期</th>
                            <th data-sort-ignore="true">单数</th>
                            <th data-sort-ignore="true">瓶/次</th>
                            <th data-sort-ignore="true">配送规则</th>
                            <th data-sort-ignore="true">订单余额</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($order_products))
                            @for ($i =0; $i< count($order_products); $i++)
                                <tr>
                                    <td>{{$i+1}}</td>
                                    <td>{{$order_products[$i]->product_simple_name}}</td>
                                    <td>{{$order_products[$i]->order_type_name}}</td>
                                    <td>{{$order_products[$i]->total_count}}</td>
                                    <td>{{$order_products[$i]->remain_count}}</td>
                                    <td>{{$order_products[$i]->start_at}}</td>
                                    <td>{{$order_products[$i]->avg}}</td>
                                    <td>{{$order_products[$i]->count_per_day}}</td>
                                    <td>
                                        <button class="btn btn-outline show_delivery_date" data-type="{{$order_products[$i]->delivery_type}}">
                                            {{$order_products[$i]->delivery_type_name}}
                                        </button>

                                        <!-- 日期 -->
                                        @if ($order_products[$i]->delivery_type != \App\Model\DeliveryModel\DeliveryType::DELIVERY_TYPE_EACH_TWICE_DAY &&
                                            $order_products[$i]->delivery_type != \App\Model\DeliveryModel\DeliveryType::DELIVERY_TYPE_EVERY_DAY)
                                            <div class="calendar_show show_only">
                                                <div class="input-group date picker">
                                                    <input type="text" class="form-control delivery_dates" name="delivery_dates[]"
                                                           value="{{$order_products[$i]->custom_order_dates}}" />
                                                    <span class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </span>
                                                </div>
                                            </div>
                                        @endif
                                    </td>
                                    <td>{{$order_products[$i]->total_amount}}</td>
                                </tr>
                            @endfor
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>


            <div class="feed-element col-md-12">
                <div class="col-md-4 col-md-offset-4">
                    @if ($order->status == \App\Model\OrderModel\Order::ORDER_WAITING_STATUS ||
                        $order->status == \App\Model\OrderModel\Order::ORDER_NEW_WAITING_STATUS)
                        <button type="button" class="btn btn-success col-sm-5" id="pass_order"
                                data-orderid="{{$order->id}}"><i class="fa fa-play" area-hidden="true"></i> 审核通过
                        </button>
                    @else
                        <button type="button" disabled class="btn btn-success col-sm-5" id="pass_order"
                                data-orderid="{{$order->id}}"><i class="fa fa-play" area-hidden="true"></i> 审核通过
                        </button>
                    @endif

                    @if ($order->status == \App\Model\OrderModel\Order::ORDER_WAITING_STATUS ||
                        $order->status == \App\Model\OrderModel\Order::ORDER_NEW_WAITING_STATUS)
                        <button type="button" class="btn btn-warning col-sm-5 col-sm-offset-2" id="no_pass_order"
                                data-orderid="{{$order->id}}"><i class="fa fa-pause" area-hidden="true"></i> 审核未通过
                        </button>
                    @else
                        <button disabled type="button" class="btn btn-warning col-sm-5 col-sm-offset-2"
                                id="no_pass_order"
                                data-orderid="{{$order->id}}"><i class="fa fa-pause" area-hidden="true"></i> 审核未通过
                        </button>
                    @endif

                </div>
            </div>
            <br>
            <br>
            <div class="col-md-12 gray-bg">
                <label class="col-sm-10">配送明细</label>
            </div>
            <div class="ibox-content">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th data-sort-ignore="true">序号</th>
                        <th data-sort-ignore="true">配送时间</th>
                        <th data-sort-ignore="true">奶品</th>
                        <th data-sort-ignore="true">数量</th>
                        <th data-sort-ignore="true">状态</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($grouped_plans_per_product))
                        <?php $i = 0;?>
                        @foreach($grouped_plans_per_product as $gpp)
                            <tr data-planid="{{$gpp->id}}">
                                <td>{{$i + $grouped_plans_per_product->firstItem()}}</td>
                                <td>{{$gpp->deliver_at}}</td>
                                <td>{{$gpp->getProductSimpleName()}}</td>
                                @if($gpp['status'] == \App\Model\DeliveryModel\MilkManDeliveryPlan::MILKMAN_DELIVERY_PLAN_STATUS_FINNISHED )
                                    <td>{{$gpp['count']}} (余 {{$gpp['remain']}}）</td>
                                @else
                                    <td>
                                        <label> {{$gpp['count']}}(余{{$gpp['remain']}})</label>
                                    </td>
                                @endif
                                <td>{{$gpp->getStatusName()}}</td>
                            </tr>
                            <?php $i++; ?>
                        @endforeach
                    @endif

                    </tbody>
                </table>

                <ul id="pagination_data" class="pagination-sm pull-right"></ul>

            </div>
        </div>
    </div>

    <!-- 添加奶瓶object js, 这个要比datepicker早加载 -->
    <script type="text/javascript" src="<?=asset('js/pages/order/order_bottle.js') ?>"></script>

@endsection

@section('script')
    <script type="text/javascript">

        // 全局变量
        var gnTotalPage = '{{$grouped_plans_per_product->lastPage()}}';
        var gnCurrentPage = '{{$grouped_plans_per_product->currentPage()}}';

        gnTotalPage = parseInt(gnTotalPage);
        gnCurrentPage = parseInt(gnCurrentPage);

    </script>

    <script type="text/javascript" src="<?=asset('js/plugins/pagination/jquery.twbsPagination.min.js')?>"></script>
    <script type="text/javascript" src="<?=asset('js/pages/gongchang/pagination.js')?>"></script>

    <script src="<?=asset('js/pages/gongchang/order_pending.js') ?>"></script>
    <script src="<?=asset('js/pages/gongchang/order_detail_product.js') ?>"></script>

@endsection