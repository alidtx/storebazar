<div class="table-responsive seller-panel">
    <div class="table-dashed-border">
        <table class="table border-dashed" id="productListsTable">
            <thead class="bg-light">
                <tr>
                    <th><span class="font-weight-bold"> পণ্যের নাম </span></th>
                    <th>দাম (টাকা)</th>
                    <th>পরিমাণ</th>
                    <th>ক্যারেট প্রতি পণ্য</th>
                    <th>ক্যাটাগরি</th>
                    <th>পণ্যের ধরন</th>
                    <th>উপাদানের ধরন</th>
                    <th>তালিকাভুক্ত</th>
                    <th>একশন</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product['name'] }} </td>
                    <td>{{ $product['price'] }} </td>
                    <td>{{ $product['quantity'] }} </td>
                    <td>{{ $product['min_order_quantity'] }} </td>
                    <td>{{ $product['category'] }} </td>
                    <td>{{ $product['commodity_type'] ?? "" }} </td>
                    <td>{{ $product['material_type'] ?? "" }}</td>
                    <td>{{ $product['created_at'] ?? "" }}</td>
                    <td style="min-width:100px">
                        <a href="{{ route('store.product.details',$product['url_key']) }}" class="btn btn-sm btn-soft-success py-1 me-1 my-1" data-bs-toggle="tooltip" data-bs-placement="top" title="View" data-bs-animation='false'>
                            <i class="fa fa-eye"> </i>
                        </a>
                        <a href="#." id="edit_product" class="btn btn-sm btn-soft-primary py-1 me-1 my-1 edit_product" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-id="{{ $product['id'] }}" data-bs-animation='false'>
                            <i class="fa fa-pencil"> </i>
                        </a>
                        <a productid="{{ $product['id'] }}" href="#." id="delete_product" class="btn btn-sm btn-soft-danger py-1 me-1 my-1 delete_product" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-bs-animation='false'>
                            <i class="fa fa-trash"> </i>
                        </a>

                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>