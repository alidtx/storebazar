<!-- ক্রয় ইতিহাস -->
<div class="table-responsive">
    <div class="table-dashed-border">
        <table class="table" id="purchaseHistory">
            <thead class="bg-light">
                <tr>
                    <th>অর্ডার আইডি</th>
                    <th>অনুরোধের তারিখ</th>
                    <th>পণ্যের নাম</th>
                    <th>পণ্যের মূল্য (টাকা)</th>
                    <th>পরিমাণ <br><small style="font-size:10px"> (ক্যারেট পণ্য x ক্যারেট পরিমান)</small></th>
                    <th>মোট মূল্য (টাকা)</th>
                    <th>বিডিং মূল্য (টাকা)</th>
                    <th>আপডেটেড মূল্য (টাকা)</th>
                    <th>স্ট্যাটাস</th>
                    <th class="text-center">একশন</th>
                </tr>
            </thead>
            <tbody>
                @foreach($customerOrderLists as $orderList)
                <tr>
                    <td><span class="font-weight-bold">{{ $orderList['orderId'] }}</span></td>
                    <td> {{ $orderList['requested_at'] ?? "" }} </td>
                    <td> {{ $orderList['product_name'] ?? "" }} </td>
                    <td> {{ $orderList['price'] ?? "" }} </td>
                    <td> {{ $orderList['quantity'] ?? "" }} </td>
                    <td> {{ $orderList['total_price'] ?? "" }} </td>
                    <td> {{ ($orderList['bidding_price']=="" || $orderList['bidding_price']=="0") ? "N/A" : $orderList['bidding_price'] }} </td>
                    <td> {{ $orderList['updated_price'] !="0" && $orderList['updated_price'] !='' ? $orderList['updated_price'] : "N/A" }} </td>
                    <td>
                        @if($orderList['order_status']=='pending')
                        <span class="badge bg-soft-primary"> Pending </span>
                        @elseif($orderList['order_status']=='processing')
                        <span class="badge bg-soft-warning"> Waiting for delivery </span>
                        @elseif($orderList['order_status']=='delivered')
                        <span class="badge bg-soft-success"> Delivered </span>
                        @elseif($orderList['order_status']=='cancelled')
                        <span class="badge bg-soft-danger"> Cancelled </span>
                        @endif
                    </td>

                    <td class="text-center">
                        @if($orderList['order_status']=="cancelled")
                        <a href="#." class="text-success addToCart" productId='{{ $orderList["product_id"] }}' paymentStatus='{{$orderList["payment_status"]}}'> <i class="fas fa-paper-plane"></i></a>
                        @else
                        <a href="#." class="text-secondary" disabled="disabled" paymentStatus='{{$orderList["payment_status"]}}' data-bs-toggle="tooltip" data-bs-placement="top" title="Request Again"> 
                            <i class="fas fa-paper-plane"></i>
                        </a>
                        @endif
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>