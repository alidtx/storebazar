<div class="table-responsive buyer-panel">
    <div class="table-dashed-border">
        <table class="table border-dashed" id="pendingOrderRequests">
            <thead class="bg-light">
                <tr>
                    <th>
                        <span class="font-weight-bold"> অর্ডার আইডি </span>
                    </th>
                    <th>
                        অনুরোধের তারিখ
                    </th>
                    <th>
                        পণ্যের নাম
                    </th>

                    <th>
                        পণ্যের মূল্য (টাকা)
                    </th>

                    <th>
                        পরিমাণ <br><small style="font-size:10px"> (ক্যারেট পণ্য x ক্যারেট পরিমান)</small>
                    </th>

                    <th>
                        অর্ডার মূল্য (টাকা)
                    </th>
                    <th>
                        বিডিং মূল্য (টাকা)
                    </th>

                    <th>
                        আপডেটেড মূল্য (টাকা)
                    </th>

                    <th class="text-center">
                        একশন
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($sellerOrderLists as $orderList)
                @if($orderList['order_status']!="pending" && $orderList['order_status']!="processing")
                @continue
                @endif

                <tr>
                    <td> <span class="font-weight-bold"> {{ $orderList['orderId'] }} </span> </td>
                    <td> {{ $orderList['requested_at'] ?? "" }} </td>
                    <td> {{ $orderList['product_name'] ?? "" }} </td>
                    <td> {{ $orderList['price'] ?? "" }} </td>
                    <td> {{ $orderList['quantity'] ?? "" }} </td>
                    <td> {{ $orderList['total_price'] ?? "" }} </td>
                    <td> {{ ($orderList['bidding_price']=="" || $orderList['bidding_price']=="0") ? "N/A" : $orderList['bidding_price'] }} </td>
                    <td class="text-center" style="width: 150px;">
                        @if($orderList['order_status']=="processing" && $orderList['updated_price']!="" && $orderList['updated_price']!="0")
                        {{ $orderList['updated_price'] }}
                        @else
                        <div class="input-group input-group-sm">
                            <span class="input-group-text" id="basic-addon1">টাকা</span>
                            <input type="number" class="form-control" id="finalPrice" name="finalPrice">
                            <button class="btn btn-secondary submit_update_price" 
                                customername='{{$orderList["customer_name"]}}'
                                customerphone='{{$orderList["customer_phone"]}}'
                                orders_table_id='{{ $orderList["order_table_id"] }}' 
                                updating_product_id='{{ $orderList["product_id"] }}' 
                                type="button" id="submit_update_price"
                            >
                                <i class="fas fa-check-circle"></i> 
                            </button>
                        </div>
                        @endif

                    </td>
                    <td class="text-center" style="width: 150px;">
                        <a href="#." 
                            order_table_id="{{ $orderList['order_table_id'] }}" 
                            updating_product_id='{{ $orderList["product_id"] }}' 
                            customername='{{$orderList["customer_name"]}}'
                            customerphone='{{$orderList["customer_phone"]}}'
                            customerShippingAddress='{{$orderList["customer_shipping_address"]}}'
                            class="btn btn-sm btn-secondary me-1 my-1 customer_details" 
                            title="{{ __('frontError.See customer details') }}"
                        >
                            <i class="fas fa-address-card"></i>
                        </a>
                        <a title="Click to set order as Delivered" href="#." order_table_id="{{ $orderList['order_table_id'] }}" updating_product_id='{{ $orderList["product_id"] }}' class="btn btn-sm btn-confirm-success me-1 my-1 confirm_order">
                        <i class="fas fa-paper-plane"></i>
                        </a>
                        <a title="Click to Cancel the order" href="#." order_table_id="{{ $orderList['order_table_id'] }}" updating_product_id='{{ $orderList["product_id"] }}' class="btn btn-sm btn-danger cancel my-1 cancel_order">
                        <i class="fas fa-times"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>