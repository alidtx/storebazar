<style>
@media screen and (min-width: 1200px) and (max-width: 1400px) {
    .numbers p { font-size:12px !important}
    .numbers h5 { font-size:12px !important}
}
</style>
<div class="seller-panel">
    <div class="table-dashed-border">
        <div class="row">
            <div class="col-12 col-lg-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-12 col-lg-9">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">মোট পণ্য</p>
                                    <h5 class="font-weight-bolder">{{ count($products) }}</h5>
                                </div>
                            </div>
                            <div class="col-12 col-lg-3 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                    <i class="fas fa-th  text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-12 col-lg-9">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">মোট অর্ডার</p>
                                    <h5 class="font-weight-bolder">{{ count($sellerOrderLists) }}</h5>
                                </div>
                            </div>
                            <div class="col-12 col-lg-3 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                    <i class="fas fa-shopping-cart text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-12 col-lg-9 pe-0">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">সর্বমোট উপার্জন (টাকা)</p>
                                    <h5 class="font-weight-bolder">{{ $sellerTotalEarning }}</h5>
                                </div>
                            </div>
                            <div class="col-12 col-lg-3 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                    <i class="fas fa-dollar text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>