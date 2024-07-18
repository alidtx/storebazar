<!-- পেন্ডিং ক্রয় অনুরোধ -->
<div class="table-responsive buyer-panel">
    <div class="table-dashed-border">
        <table class="table border-dashed" id="pendingPurchaseRequest">
            <thead class="bg-light">
                <tr>
                    <th><span class="font-weight-bold"> অর্ডার আইডি </span></th>
                    <th>অনুরোধের তারিখ</th>
                    <th>পণ্যের নাম</th>
                    <th>পণ্যের মূল্য (টাকা)</th>
                    <th>পরিমাণ <br><small style="font-size:10px"> (ক্যারেট পণ্য x ক্যারেট পরিমান)</small></th>
                    <th>মোট মূল্য (টাকা)</th>
                    <th>বিডিং মূল্য (টাকা)</th>
                    <th>আপডেটেড মূল্য (টাকা)</th>
                    <th class="text-center">স্ট্যাটাস</th>
                </tr>
            </thead>
            <tbody>
                @foreach($customerOrderLists as $orderList)
                @if($orderList['order_status']!="pending")
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
                    <td> {{ $orderList['updated_price'] !="0" && $orderList['updated_price'] !='' ? $orderList['updated_price'] : "N/A" }} </td>
                    <td class="text-center">
                        <span class="badge bg-soft-danger"> Pending </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>