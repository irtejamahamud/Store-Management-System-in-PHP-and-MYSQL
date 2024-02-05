<div class="row row-cols-2 p-4 g-4">
    <div class="">
        <div class="card  shadow border-0 align-items-center justify-content-between">
            <div class="row  g-2 align-items-center p-3">
                <img src="image/pending.png" class="col-5" alt="" style="aspect-ratio:1;object-fit:contain;object-position: center center;">
                <div class="card-body col-7">
                    <h4 class="card-title mb-1">Pending Orders</h5>
                        <h2 class="mb-0 font-18 text-danger ">
                            <?php echo pendingOrders();; ?>
                        </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="">
    <div class="card  shadow border-0 align-items-center justify-content-between">
            <div class="row  g-2 align-items-center p-3">
                <img src="image/customers.png" class="col-5" alt="" style="aspect-ratio:1;object-fit:contain;object-position: center center;">
                <div class="card-body col-7">
                    <h4 class="card-title mb-1">Customers</h5>
                        <h2 class="mb-0 font-18 text-danger ">
                            <?php echo totalCustomer(); ?>
                        </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="">
        <div class="card  shadow border-0 align-items-center justify-content-between">
            <div class="row  g-2 align-items-center p-3">
                <img src="image/sales.png" class="col-5" alt="" style="aspect-ratio:1;object-fit:contain;object-position: center center;">
                <div class="card-body col-7">
                    <h4 class="card-title mb-1">Total Sales</h5>
                        <h2 class="mb-0 font-18 text-danger ">
                            <?php echo totalSales(); ?>
                        </h2>
                </div>
            </div>
        </div>
    </div>
</div>
