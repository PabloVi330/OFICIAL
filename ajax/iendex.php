 <!-- plugin css -->
 <link href="assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />

 <div class="page-content">
     <div class="container-fluid">

         <!-- start page title -->
         <div class="row">
             <div class="col-12">
                 <div class="page-title-box d-sm-flex align-items-center
                    justify-content-between">
                     <h4 class="mb-sm-0 font-size-18">Dashboard</h4>

                     <div class="page-title-right">
                         <ol class="breadcrumb m-0">
                             <li class="breadcrumb-item"><a href="javascript:
                                    void(0);">Minia</a></li>
                             <li class="breadcrumb-item active">Dashboard</li>
                         </ol>
                     </div>

                 </div>
             </div>
         </div>
         <!-- end page title -->

         <div class="row">
             <div class="col-xl-3 col-md-6">
                 <!-- card -->
                 <div class="card card-h-100">
                     <!-- card body -->
                     <div class="card-body ">
                         <div class="row align-items-center">
                             <div class="col-6">
                                 <h4 class="mb-3">
                                     <span>Usuarios</span>
                                 </h4>
                                 <h4 class="mb-3">
                                     <span class="counter-value text-center" data-target="6">0</span>
                                 </h4>
                             </div>

                             <div class="col-6">
                                 <div id="mini-chart1" data-colors='[" #ffffff"
                                    ]' class="apex-charts mb-2"></div>
                             </div>
                         </div>
                         <div class="text-nowrap">
                             <span class="badge bg-soft-success text-success">+$20.9k</span>
                             <span class="ms-1 text-muted font-size-13">Since
                                 last week</span>
                         </div>
                     </div><!-- end card body -->
                 </div><!-- end card -->
             </div><!-- end col -->

             <div class="col-xl-3 col-md-6">
                 <!-- card -->
                 <div class="card card-h-100">
                     <!-- card body -->
                     <div class="card-body">
                         <div class="row align-items-center">
                             <div class="col-6">
                                 <h4 class="mb-3">
                                     <span>Grupos</span>
                                 </h4>
                                 <h4 class="mb-3">
                                     <span class="counter-value" data-target="8">0</span>
                                 </h4>
                             </div>
                             <div class="col-6">
                                 <div id="mini-chart2" data-colors='[" #5156be"
                                    ]' class="apex-charts mb-2"></div>
                             </div>
                         </div>
                         <div class="text-nowrap">
                             <span class="badge bg-soft-danger text-danger">-29
                                 Trades</span>
                             <span class="ms-1 text-muted font-size-13">Since
                                 last week</span>
                         </div>
                     </div><!-- end card body -->
                 </div><!-- end card -->
             </div><!-- end col-->

             <div class="col-xl-3 col-md-6">
                 <!-- card -->
                 <div class="card card-h-100">
                     <!-- card body -->
                     <div class="card-body">
                         <div class="row align-items-center">
                             <div class="col-6">
                                 <h4 class="mb-3">
                                     <span>Clientes</span>
                                 </h4>
                                 <h4 class="mb-3">
                                     <span class="counter-value" data-target="3"></span>
                                 </h4>
                             </div>
                             <div class="col-6">
                                 <div id="mini-chart3" data-colors='[" #5156be"
                                    ]' class="apex-charts mb-2"></div>
                             </div>
                         </div>
                         <div class="text-nowrap">
                             <span class="badge bg-soft-success text-success">+
                                 $2.8k</span>
                             <span class="ms-1 text-muted font-size-13">Since
                                 last week</span>
                         </div>
                     </div><!-- end card body -->
                 </div><!-- end card -->
             </div><!-- end col -->

             <div class="col-xl-3 col-md-6">
                 <!-- card -->
                 <div class="card card-h-100">
                     <!-- card body -->
                     <div class="card-body">
                         <div class="row align-items-center">
                             <div class="col-6">
                                 <h4 class="mb-3">
                                     <span>Proveedores</span>
                                 </h4>
                                 <h4 class="mb-3">
                                     <span class="counter-value" data-target="9">9</span>
                                 </h4>
                             </div>
                             <div class="col-6">
                                 <div id="mini-chart4" data-colors='[" #5156be"
                                    ]' class="apex-charts mb-2"></div>
                             </div>
                         </div>
                         <div class="text-nowrap">
                             <span class="badge bg-soft-success text-success">+2.95%</span>
                             <span class="ms-1 text-muted font-size-13">Since
                                 last week</span>
                         </div>
                     </div><!-- end card body -->
                 </div><!-- end card -->
             </div><!-- end col -->
         </div><!-- end row-->











         <div class="row">
             <div class="col-xl-5">
                 <!-- card -->
                 <div class="card card-h-100">
                     <!-- card body -->
                     <div class="card-body">
                         <div class="d-flex flex-wrap align-items-center mb-4">
                             <h5 class="card-title me-2">Según Categoria</h5>
                         </div>

                         <div class="row align-items-center">
                             <div class="col-sm-12 col-lg-12">
                                 <div id="wallet-balance" class="apex-charts"></div>
                             </div>
                             <div class="col-sm align-self-center">
                                 <div class="mt-4 mt-sm-0" id="categoria-info"></div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <!-- end col -->
             <div class="col-xl-7">
                 <div class="row">
                     <div class="col-lg-12">
                         <div id="invested-overview" data-colors='[" #5156be" ," #34c38f"]' class="apex-charts"></div>
                     </div>
                 </div>
                 <!-- end row -->
             </div>
             <!-- end col -->
         </div> <!-- end row-->

         <div class="row">
             <div class="col-xl-8">
                 <!-- card -->
                 <div class="card">
                     <!-- card body -->
                     <div class="card-body">
                         <div class="d-flex flex-wrap align-items-center mb-4">
                             <h5 class="card-title me-2">Market Overview</h5>
                             <div class="ms-auto">
                                 <div>
                                     <button type="button" class="btn btn-soft-primary btn-sm">
                                         ALL
                                     </button>
                                     <button type="button" class="btn btn-soft-secondary btn-sm">
                                         1M
                                     </button>
                                     <button type="button" class="btn btn-soft-secondary btn-sm">
                                         6M
                                     </button>
                                     <button type="button" class="btn btn-soft-secondary btn-sm active">
                                         1Y
                                     </button>
                                 </div>
                             </div>
                         </div>

                         <div class="row align-items-center">
                             <div class="col-xl-8">
                                 <div>
                                     <div id="market-overview" data-colors='["#5156be" ," #34c38f"]' class="apex-charts"></div>
                                 </div>
                             </div>
                             <div class="col-xl-4">
                                 <div class="p-4" id="coin-list-container">
                                     <!-- Aquí se añadirá la lista de monedas dinámicamente -->
                                 </div>
                             </div>
                         </div>
                     </div>
                     <!-- end card -->
                 </div>

                 <!-- end col -->
             </div>
             <!-- end row-->

             <div class="col-xl-4">
                 <!-- card -->
                 <div class="card">
                     <!-- card body -->
                     <div class="card-body">
                         <div class="d-flex flex-wrap align-items-center mb-4">
                             <h5 class="card-title me-2">Sales by Locations</h5>
                             <div class="ms-auto">
                                 <div class="dropdown">
                                     <a class="dropdown-toggle text-reset" href="#" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                         <span class="text-muted font-size-12">Sort
                                             By:</span> <span class="fw-medium">World<i class="mdi mdi-chevron-down
                                                ms-1"></i></span>
                                     </a>

                                     <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                                         <a class="dropdown-item" href="#">USA</a>
                                         <a class="dropdown-item" href="#">Russia</a>
                                         <a class="dropdown-item" href="#">Australia</a>
                                     </div>
                                 </div>
                             </div>
                         </div>

                         <div id="sales-by-locations" data-colors='[" #5156be" ]' style="height: 250px"></div>

                         <div class="px-2 py-2">
                             <p class="mb-1">USA <span class="float-end">75%</span></p>
                             <div class="progress mt-2" style="height: 6px;">
                                 <div class="progress-bar progress-bar-striped
                                    bg-primary" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="75">
                                 </div>
                             </div>

                             <p class="mt-3 mb-1">Russia <span class="float-end">55%</span></p>
                             <div class="progress mt-2" style="height: 6px;">
                                 <div class="progress-bar progress-bar-striped
                                    bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="55">
                                 </div>
                             </div>

                             <p class="mt-3 mb-1">Australia <span class="float-end">85%</span></p>
                             <div class="progress mt-2" style="height: 6px;">
                                 <div class="progress-bar progress-bar-striped
                                    bg-primary" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="85">
                                 </div>
                             </div>
                         </div>
                     </div>
                     <!-- end card body -->
                 </div>
                 <!-- end card -->
             </div>
             <!-- end col -->
         </div>
         <!-- end row-->

         <div class="row">
             <div class="col-xl-4">
                 <div class="card">
                     <div class="card-header align-items-center d-flex">
                         <h4 class="card-title mb-0 flex-grow-1">Trading</h4>
                         <div class="flex-shrink-0">
                             <ul class="nav nav-tabs-custom card-header-tabs" role="tablist">
                                 <li class="nav-item">
                                     <a class="nav-link active" data-bs-toggle="tab" href="#buy-tab" role="tab">Buy</a>
                                 </li>
                                 <li class="nav-item">
                                     <a class="nav-link" data-bs-toggle="tab" href="#sell-tab" role="tab">Sell</a>
                                 </li>
                             </ul>
                         </div>
                     </div><!-- end card header -->

                     <div class="card-body">
                         <div class="tab-content">
                             <div class="tab-pane active" id="buy-tab" role="tabpanel">
                                 <div class="float-end ms-2">
                                     <h5 class="font-size-14"><i class="bx
                                            bx-wallet text-primary font-size-16
                                            align-middle me-1"></i> <a href="#!" class="text-reset
                                            text-decoration-underline">$4335.23</a></h5>
                                 </div>
                                 <h5 class="font-size-14 mb-4">Buy Coins</h5>
                                 <div>
                                     <div class="form-group mb-3">
                                         <label>Payment method :</label>
                                         <select class="form-select">
                                             <option>Direct Bank Payment</option>
                                             <option>Credit / Debit Card</option>
                                             <option>Paypal</option>
                                             <option>Payoneer</option>
                                             <option>Stripe</option>
                                         </select>
                                     </div>

                                     <div>
                                         <label>Add Amount :</label>
                                         <div class="input-group mb-3">
                                             <label class="input-group-text">Amount</label>
                                             <select class="form-select" style="max-width: 90px;">
                                                 <option value="BT" selected>BTC</option>
                                                 <option value="ET">ETH</option>
                                                 <option value="LT">LTC</option>
                                             </select>
                                             <input type="text" class="form-control" placeholder="0.00121255">
                                         </div>

                                         <div class="input-group mb-3">
                                             <label class="input-group-text">Price</label>
                                             <input type="text" class="form-control" placeholder="$58,245">
                                             <label class="input-group-text">$</label>
                                         </div>

                                         <div class="input-group mb-3">
                                             <label class="input-group-text">Total</label>
                                             <input type="text" class="form-control" placeholder="$36,854.25">
                                         </div>
                                     </div>

                                     <div class="text-center">
                                         <button type="button" class="btn
                                            btn-success w-md">Buy Coin</button>
                                     </div>
                                 </div>
                             </div>
                             <!-- end tab pane -->
                             <div class="tab-pane" id="sell-tab" role="tabpanel">
                                 <div class="float-end ms-2">
                                     <h5 class="font-size-14"><i class="bx
                                            bx-wallet text-primary font-size-16
                                            align-middle me-1"></i> <a href="#!" class="text-reset
                                            text-decoration-underline">$4235.23</a></h5>
                                 </div>
                                 <h5 class="font-size-14 mb-4">Sell Coins</h5>
                                 <div>

                                     <div class="form-group mb-3">
                                         <label>Wallet ID :</label>
                                         <input type="email" class="form-control" placeholder="1cvb254ugxvfcd280ki">
                                     </div>

                                     <div>
                                         <label>Add Amount :</label>
                                         <div class="input-group mb-3">
                                             <label class="input-group-text">Amount</label>
                                             <select class="form-select" style="max-width: 90px;">
                                                 <option value="BT" selected>BTC</option>
                                                 <option value="ET">ETH</option>
                                                 <option value="LT">LTC</option>
                                             </select>
                                             <input type="text" class="form-control" placeholder="0.00121255">
                                         </div>

                                         <div class="input-group mb-3">

                                             <label class="input-group-text">Price</label>
                                             <input type="text" class="form-control" placeholder="$23,754.25">

                                             <label class="input-group-text">$</label>
                                         </div>

                                         <div class="input-group mb-3">
                                             <label class="input-group-text">Total</label>
                                             <input type="text" class="form-control" placeholder="$6,852.41">
                                         </div>
                                     </div>

                                     <div class="text-center">
                                         <button type="button" class="btn
                                            btn-danger w-md">Sell Coin</button>
                                     </div>
                                 </div>
                             </div>
                             <!-- end tab pane -->
                         </div>
                         <!-- end tab content -->
                     </div>
                     <!-- end card body -->
                 </div>
                 <!-- end card -->
             </div>
             <!-- end col -->

             <div class="col-xl-4">
                 <div class="card">
                     <div class="card-header align-items-center d-flex">
                         <h4 class="card-title mb-0 flex-grow-1">Transactions</h4>
                         <div class="flex-shrink-0">
                             <ul class="nav justify-content-end nav-tabs-custom
                                rounded card-header-tabs" role="tablist">
                                 <li class="nav-item">
                                     <a class="nav-link active" data-bs-toggle="tab" href="#transactions-all-tab" role="tab">
                                         All
                                     </a>
                                 </li>
                                 <li class="nav-item">
                                     <a class="nav-link" data-bs-toggle="tab" href="#transactions-buy-tab" role="tab">
                                         Buy
                                     </a>
                                 </li>
                                 <li class="nav-item">
                                     <a class="nav-link" data-bs-toggle="tab" href="#transactions-sell-tab" role="tab">
                                         Sell
                                     </a>
                                 </li>
                             </ul>
                             <!-- end nav tabs -->
                         </div>
                     </div><!-- end card header -->

                     <div class="card-body px-0">
                         <div class="tab-content">
                             <div class="tab-pane active" id="transactions-all-tab" role="tabpanel">
                                 <div class="table-responsive px-3" data-simplebar style="max-height: 352px;">
                                     <table class="table align-middle
                                        table-nowrap table-borderless">
                                         <tbody>
                                             <tr>
                                                 <td style="width: 50px;">
                                                     <div class="font-size-22
                                                        text-success">
                                                         <i class="bx
                                                            bx-down-arrow-circle
                                                            d-block"></i>
                                                     </div>
                                                 </td>

                                                 <td>
                                                     <div>
                                                         <h5 class="font-size-14
                                                            mb-1">Buy BTC</h5>
                                                         <p class="text-muted
                                                            mb-0 font-size-12">14
                                                             Mar, 2021</p>
                                                     </div>
                                                 </td>

                                                 <td>
                                                     <div class="text-end">
                                                         <h5 class="font-size-14
                                                            mb-0">0.016 BTC</h5>
                                                         <p class="text-muted
                                                            mb-0 font-size-12">Coin
                                                             Value</p>
                                                     </div>
                                                 </td>

                                                 <td>
                                                     <div class="text-end">
                                                         <h5 class="font-size-14
                                                            text-muted mb-0">$125.20</h5>
                                                         <p class="text-muted
                                                            mb-0 font-size-12">Amount</p>
                                                     </div>
                                                 </td>
                                             </tr>

                                             <tr>
                                                 <td>
                                                     <div class="font-size-22
                                                        text-danger">
                                                         <i class="bx
                                                            bx-up-arrow-circle
                                                            d-block"></i>
                                                     </div>
                                                 </td>

                                                 <td>
                                                     <div>
                                                         <h5 class="font-size-14
                                                            mb-1">Sell ETH</h5>
                                                         <p class="text-muted
                                                            mb-0 font-size-12">15
                                                             Mar, 2021</p>
                                                     </div>
                                                 </td>

                                                 <td>
                                                     <div class="text-end">
                                                         <h5 class="font-size-14
                                                            mb-0">0.56 ETH</h5>
                                                         <p class="text-muted
                                                            mb-0 font-size-12">Coin
                                                             Value</p>
                                                     </div>
                                                 </td>

                                                 <td>
                                                     <div class="text-end">
                                                         <h5 class="font-size-14
                                                            text-muted mb-0">$112.34</h5>
                                                         <p class="text-muted
                                                            mb-0 font-size-12">Amount</p>
                                                     </div>
                                                 </td>
                                             </tr>

                                             <tr>
                                                 <td>
                                                     <div class="font-size-22
                                                        text-success">
                                                         <i class="bx
                                                            bx-down-arrow-circle
                                                            d-block"></i>
                                                     </div>
                                                 </td>

                                                 <td>
                                                     <div>
                                                         <h5 class="font-size-14
                                                            mb-1">Buy LTC</h5>
                                                         <p class="text-muted
                                                            mb-0 font-size-12">16
                                                             Mar, 2021</p>
                                                     </div>
                                                 </td>

                                                 <td>
                                                     <div class="text-end">
                                                         <h5 class="font-size-14
                                                            mb-0">1.88 LTC</h5>
                                                         <p class="text-muted
                                                            mb-0 font-size-12">Coin
                                                             Value</p>
                                                     </div>
                                                 </td>

                                                 <td>
                                                     <div class="text-end">
                                                         <h5 class="font-size-14
                                                            text-muted mb-0">$94.22</h5>
                                                         <p class="text-muted
                                                            mb-0 font-size-12">Amount</p>
                                                     </div>
                                                 </td>
                                             </tr>

                                             <tr>
                                                 <td>
                                                     <div class="font-size-22
                                                        text-success">
                                                         <i class="bx
                                                            bx-down-arrow-circle
                                                            d-block"></i>
                                                     </div>
                                                 </td>

                                                 <td>
                                                     <div>
                                                         <h5 class="font-size-14
                                                            mb-1">Buy ETH</h5>
                                                         <p class="text-muted
                                                            mb-0 font-size-12">17
                                                             Mar, 2021</p>
                                                     </div>
                                                 </td>

                                                 <td>
                                                     <div class="text-end">
                                                         <h5 class="font-size-14
                                                            mb-0">0.42 ETH</h5>
                                                         <p class="text-muted
                                                            mb-0 font-size-12">Coin
                                                             Value</p>
                                                     </div>
                                                 </td>

                                                 <td>
                                                     <div class="text-end">
                                                         <h5 class="font-size-14
                                                            text-muted mb-0">$84.32</h5>
                                                         <p class="text-muted
                                                            mb-0 font-size-12">Amount</p>
                                                     </div>
                                                 </td>
                                             </tr>

                                             <tr>
                                                 <td>
                                                     <div class="font-size-22
                                                        text-danger">
                                                         <i class="bx
                                                            bx-up-arrow-circle
                                                            d-block"></i>
                                                     </div>
                                                 </td>

                                                 <td>
                                                     <div>
                                                         <h5 class="font-size-14
                                                            mb-1">Sell BTC</h5>
                                                         <p class="text-muted
                                                            mb-0 font-size-12">18
                                                             Mar, 2021</p>
                                                     </div>
                                                 </td>

                                                 <td>
                                                     <div class="text-end">
                                                         <h5 class="font-size-14
                                                            mb-0">0.018 BTC</h5>
                                                         <p class="text-muted
                                                            mb-0 font-size-12">Coin
                                                             Value</p>
                                                     </div>
                                                 </td>

                                                 <td>
                                                     <div class="text-end">
                                                         <h5 class="font-size-14
                                                            text-muted mb-0">$145.80</h5>
                                                         <p class="text-muted
                                                            mb-0 font-size-12">Amount</p>
                                                     </div>
                                                 </td>
                                             </tr>

                                             <tr>
                                                 <td style="width: 50px;">
                                                     <div class="font-size-22
                                                        text-success">
                                                         <i class="bx
                                                            bx-down-arrow-circle
                                                            d-block"></i>
                                                     </div>
                                                 </td>

                                                 <td>
                                                     <div>
                                                         <h5 class="font-size-14
                                                            mb-1">Buy BTC</h5>
                                                         <p class="text-muted
                                                            mb-0 font-size-12">14
                                                             Mar, 2021</p>
                                                     </div>
                                                 </td>

                                                 <td>
                                                     <div class="text-end">
                                                         <h5 class="font-size-14
                                                            mb-0">0.016 BTC</h5>
                                                         <p class="text-muted
                                                            mb-0 font-size-12">Coin
                                                             Value</p>
                                                     </div>
                                                 </td>

                                                 <td>
                                                     <div class="text-end">
                                                         <h5 class="font-size-14
                                                            text-muted mb-0">$125.20</h5>
                                                         <p class="text-muted
                                                            mb-0 font-size-12">Amount</p>
                                                     </div>
                                                 </td>
                                             </tr>

                                             <tr>
                                                 <td>
                                                     <div class="font-size-22
                                                        text-danger">
                                                         <i class="bx
                                                            bx-up-arrow-circle
                                                            d-block"></i>
                                                     </div>
                                                 </td>

                                                 <td>
                                                     <div>
                                                         <h5 class="font-size-14
                                                            mb-1">Sell ETH</h5>
                                                         <p class="text-muted
                                                            mb-0 font-size-12">15
                                                             Mar, 2021</p>
                                                     </div>
                                                 </td>

                                                 <td>
                                                     <div class="text-end">
                                                         <h5 class="font-size-14
                                                            mb-0">0.56 ETH</h5>
                                                         <p class="text-muted
                                                            mb-0 font-size-12">Coin
                                                             Value</p>
                                                     </div>
                                                 </td>

                                                 <td>
                                                     <div class="text-end">
                                                         <h5 class="font-size-14
                                                            text-muted mb-0">$112.34</h5>
                                                         <p class="text-muted
                                                            mb-0 font-size-12">Amount</p>
                                                     </div>
                                                 </td>
                                             </tr>
                                         </tbody>
                                     </table>
                                 </div>
                             </div>
                             <!-- end tab pane -->
                             <div class="tab-pane" id="transactions-buy-tab" role="tabpanel">
                                 <div class="table-responsive px-3" data-simplebar style="max-height: 352px;">
                                     <table class="table align-middle
                                        table-nowrap table-borderless">
                                         <tbody>
                                             <tr>
                                                 <td style="width: 50px;">
                                                     <div class="font-size-22
                                                        text-success">
                                                         <i class="bx
                                                            bx-down-arrow-circle
                                                            d-block"></i>
                                                     </div>
                                                 </td>

                                                 <td>
                                                     <div>
                                                         <h5 class="font-size-14
                                                            mb-1">Buy BTC</h5>
                                                         <p class="text-muted
                                                            mb-0 font-size-12">14
                                                             Mar, 2021</p>
                                                     </div>
                                                 </td>

                                                 <td>
                                                     <div class="text-end">
                                                         <h5 class="font-size-14
                                                            mb-0">0.016 BTC</h5>
                                                         <p class="text-muted
                                                            mb-0 font-size-12">Coin
                                                             Value</p>
                                                     </div>
                                                 </td>

                                                 <td>
                                                     <div class="text-end">
                                                         <h5 class="font-size-14
                                                            text-muted mb-0">$125.20</h5>
                                                         <p class="text-muted
                                                            mb-0 font-size-12">Amount</p>
                                                     </div>
                                                 </td>
                                             </tr>

                                             <tr>
                                                 <td>
                                                     <div class="font-size-22
                                                        text-success">
                                                         <i class="bx
                                                            bx-down-arrow-circle
                                                            d-block"></i>
                                                     </div>
                                                 </td>

                                                 <td>
                                                     <div>
                                                         <h5 class="font-size-14
                                                            mb-1">Buy BTC</h5>
                                                         <p class="text-muted
                                                            mb-0 font-size-12">18
                                                             Mar, 2021</p>
                                                     </div>
                                                 </td>

                                                 <td>
                                                     <div class="text-end">
                                                         <h5 class="font-size-14
                                                            mb-0">0.018 BTC</h5>
                                                         <p class="text-muted
                                                            mb-0 font-size-12">Coin
                                                             Value</p>
                                                     </div>
                                                 </td>

                                                 <td>
                                                     <div class="text-end">
                                                         <h5 class="font-size-14
                                                            text-muted mb-0">$145.80</h5>
                                                         <p class="text-muted
                                                            mb-0 font-size-12">Amount</p>
                                                     </div>
                                                 </td>
                                             </tr>

                                             <tr>
                                                 <td>
                                                     <div class="font-size-22
                                                        text-success">
                                                         <i class="bx
                                                            bx-down-arrow-circle
                                                            d-block"></i>
                                                     </div>
                                                 </td>

                                                 <td>
                                                     <div>
                                                         <h5 class="font-size-14
                                                            mb-1">Buy LTC</h5>
                                                         <p class="text-muted
                                                            mb-0 font-size-12">16
                                                             Mar, 2021</p>
                                                     </div>
                                                 </td>

                                                 <td>
                                                     <div class="text-end">
                                                         <h5 class="font-size-14
                                                            mb-0">1.88 LTC</h5>
                                                         <p class="text-muted
                                                            mb-0 font-size-12">Coin
                                                             Value</p>
                                                     </div>
                                                 </td>

                                                 <td>
                                                     <div class="text-end">
                                                         <h5 class="font-size-14
                                                            text-muted mb-0">$94.22</h5>
                                                         <p class="text-muted
                                                            mb-0 font-size-12">Amount</p>
                                                     </div>
                                                 </td>
                                             </tr>

                                             <tr>
                                                 <td>
                                                     <div class="font-size-22
                                                        text-success">
                                                         <i class="bx
                                                            bx-down-arrow-circle
                                                            d-block"></i>
                                                     </div>
                                                 </td>

                                                 <td>
                                                     <div>
                                                         <h5 class="font-size-14
                                                            mb-1">Buy ETH</h5>
                                                         <p class="text-muted
                                                            mb-0 font-size-12">15
                                                             Mar, 2021</p>
                                                     </div>
                                                 </td>

                                                 <td>
                                                     <div class="text-end">
                                                         <h5 class="font-size-14
                                                            mb-0">0.56 ETH</h5>
                                                         <p class="text-muted
                                                            mb-0 font-size-12">Coin
                                                             Value</p>
                                                     </div>
                                                 </td>

                                                 <td>
                                                     <div class="text-end">
                                                         <h5 class="font-size-14
                                                            text-muted mb-0">$112.34</h5>
                                                         <p class="text-muted
                                                            mb-0 font-size-12">Amount</p>
                                                     </div>
                                                 </td>
                                             </tr>

                                             <tr>
                                                 <td>
                                                     <div class="font-size-22
                                                        text-success">
                                                         <i class="bx
                                                            bx-down-arrow-circle
                                                            d-block"></i>
                                                     </div>
                                                 </td>

                                                 <td>
                                                     <div>
                                                         <h5 class="font-size-14
                                                            mb-1">Buy ETH</h5>
                                                         <p class="text-muted
                                                            mb-0 font-size-12">17
                                                             Mar, 2021</p>
                                                     </div>
                                                 </td>

                                                 <td>
                                                     <div class="text-end">
                                                         <h5 class="font-size-14
                                                            mb-0">0.42 ETH</h5>
                                                         <p class="text-muted
                                                            mb-0 font-size-12">Coin
                                                             Value</p>
                                                     </div>
                                                 </td>

                                                 <td>
                                                     <div class="text-end">
                                                         <h5 class="font-size-14
                                                            text-muted mb-0">$84.32</h5>
                                                         <p class="text-muted
                                                            mb-0 font-size-12">Amount</p>
                                                     </div>
                                                 </td>
                                             </tr>

                                             <tr>
                                                 <td>
                                                     <div class="font-size-22
                                                        text-success">
                                                         <i class="bx
                                                            bx-down-arrow-circle
                                                            d-block"></i>
                                                     </div>
                                                 </td>

                                                 <td>
                                                     <div>
                                                         <h5 class="font-size-14
                                                            mb-1">Buy ETH</h5>
                                                         <p class="text-muted
                                                            mb-0 font-size-12">15
                                                             Mar, 2021</p>
                                                     </div>
                                                 </td>

                                                 <td>
                                                     <div class="text-end">
                                                         <h5 class="font-size-14
                                                            mb-0">0.56 ETH</h5>
                                                         <p class="text-muted
                                                            mb-0 font-size-12">Coin
                                                             Value</p>
                                                     </div>
                                                 </td>

                                                 <td>
                                                     <div class="text-end">
                                                         <h5 class="font-size-14
                                                            text-muted mb-0">$112.34</h5>
                                                         <p class="text-muted
                                                            mb-0 font-size-12">Amount</p>
                                                     </div>
                                                 </td>
                                             </tr>

                                             <tr>
                                                 <td style="width: 50px;">
                                                     <div class="font-size-22
                                                        text-success">
                                                         <i class="bx
                                                            bx-down-arrow-circle
                                                            d-block"></i>
                                                     </div>
                                                 </td>

                                                 <td>
                                                     <div>
                                                         <h5 class="font-size-14
                                                            mb-1">Buy BTC</h5>
                                                         <p class="text-muted
                                                            mb-0 font-size-12">14
                                                             Mar, 2021</p>
                                                     </div>
                                                 </td>

                                                 <td>
                                                     <div class="text-end">
                                                         <h5 class="font-size-14
                                                            mb-0">0.016 BTC</h5>
                                                         <p class="text-muted
                                                            mb-0 font-size-12">Coin
                                                             Value</p>
                                                     </div>
                                                 </td>

                                                 <td>
                                                     <div class="text-end">
                                                         <h5 class="font-size-14
                                                            text-muted mb-0">$125.20</h5>
                                                         <p class="text-muted
                                                            mb-0 font-size-12">Amount</p>
                                                     </div>
                                                 </td>
                                             </tr>


                                         </tbody>
                                     </table>
                                 </div>
                             </div>
                             <!-- end tab pane -->
                             <div class="tab-pane" id="transactions-sell-tab" role="tabpanel">
                                 <div class="table-responsive px-3" data-simplebar style="max-height: 352px;">
                                     <table class="table align-middle
                                        table-nowrap table-borderless">
                                         <tbody>
                                             <tr>
                                                 <td>
                                                     <div class="font-size-22
                                                        text-danger">
                                                         <i class="bx
                                                            bx-up-arrow-circle
                                                            d-block"></i>
                                                     </div>
                                                 </td>

                                                 <td>
                                                     <div>
                                                         <h5 class="font-size-14
                                                            mb-1">Sell ETH</h5>
                                                         <p class="text-muted
                                                            mb-0 font-size-12">15
                                                             Mar, 2021</p>
                                                     </div>
                                                 </td>

                                                 <td>
                                                     <div class="text-end">
                                                         <h5 class="font-size-14
                                                            mb-0">0.56 ETH</h5>
                                                         <p class="text-muted
                                                            mb-0 font-size-12">Coin
                                                             Value</p>
                                                     </div>
                                                 </td>

                                                 <td>
                                                     <div class="text-end">
                                                         <h5 class="font-size-14
                                                            text-muted mb-0">$112.34</h5>
                                                         <p class="text-muted
                                                            mb-0 font-size-12">Amount</p>
                                                     </div>
                                                 </td>
                                             </tr>

                                             <tr>
                                                 <td style="width: 50px;">
                                                     <div class="font-size-22
                                                        text-danger">
                                                         <i class="bx
                                                            bx-up-arrow-circle
                                                            d-block"></i>
                                                     </div>
                                                 </td>

                                                 <td>
                                                     <div>
                                                         <h5 class="font-size-14
                                                            mb-1">Sell BTC</h5>
                                                         <p class="text-muted
                                                            mb-0 font-size-12">14
                                                             Mar, 2021</p>
                                                     </div>
                                                 </td>

                                                 <td>
                                                     <div class="text-end">
                                                         <h5 class="font-size-14
                                                            mb-0">0.016 BTC</h5>
                                                         <p class="text-muted
                                                            mb-0 font-size-12">Coin
                                                             Value</p>
                                                     </div>
                                                 </td>

                                                 <td>
                                                     <div class="text-end">
                                                         <h5 class="font-size-14
                                                            text-muted mb-0">$125.20</h5>
                                                         <p class="text-muted
                                                            mb-0 font-size-12">Amount</p>
                                                     </div>
                                                 </td>
                                             </tr>

                                             <tr>
                                                 <td>
                                                     <div class="font-size-22
                                                        text-danger">
                                                         <i class="bx
                                                            bx-up-arrow-circle
                                                            d-block"></i>
                                                     </div>
                                                 </td>

                                                 <td>
                                                     <div>
                                                         <h5 class="font-size-14
                                                            mb-1">Sell BTC</h5>
                                                         <p class="text-muted
                                                            mb-0 font-size-12">18
                                                             Mar, 2021</p>
                                                     </div>
                                                 </td>

                                                 <td>
                                                     <div class="text-end">
                                                         <h5 class="font-size-14
                                                            mb-0">0.018 BTC</h5>
                                                         <p class="text-muted
                                                            mb-0 font-size-12">Coin
                                                             Value</p>
                                                     </div>
                                                 </td>

                                                 <td>
                                                     <div class="text-end">
                                                         <h5 class="font-size-14
                                                            text-muted mb-0">$145.80</h5>
                                                         <p class="text-muted
                                                            mb-0 font-size-12">Amount</p>
                                                     </div>
                                                 </td>
                                             </tr>

                                             <tr>
                                                 <td>
                                                     <div class="font-size-22
                                                        text-danger">
                                                         <i class="bx
                                                            bx-up-arrow-circle
                                                            d-block"></i>
                                                     </div>
                                                 </td>

                                                 <td>
                                                     <div>
                                                         <h5 class="font-size-14
                                                            mb-1">Sell ETH</h5>
                                                         <p class="text-muted
                                                            mb-0 font-size-12">15
                                                             Mar, 2021</p>
                                                     </div>
                                                 </td>

                                                 <td>
                                                     <div class="text-end">
                                                         <h5 class="font-size-14
                                                            mb-0">0.56 ETH</h5>
                                                         <p class="text-muted
                                                            mb-0 font-size-12">Coin
                                                             Value</p>
                                                     </div>
                                                 </td>

                                                 <td>
                                                     <div class="text-end">
                                                         <h5 class="font-size-14
                                                            text-muted mb-0">$112.34</h5>
                                                         <p class="text-muted
                                                            mb-0 font-size-12">Amount</p>
                                                     </div>
                                                 </td>
                                             </tr>

                                             <tr>
                                                 <td>
                                                     <div class="font-size-22
                                                        text-danger">
                                                         <i class="bx
                                                            bx-up-arrow-circle
                                                            d-block"></i>
                                                     </div>
                                                 </td>

                                                 <td>
                                                     <div>
                                                         <h5 class="font-size-14
                                                            mb-1">Sell LTC</h5>
                                                         <p class="text-muted
                                                            mb-0 font-size-12">16
                                                             Mar, 2021</p>
                                                     </div>
                                                 </td>

                                                 <td>
                                                     <div class="text-end">
                                                         <h5 class="font-size-14
                                                            mb-0">1.88 LTC</h5>
                                                         <p class="text-muted
                                                            mb-0 font-size-12">Coin
                                                             Value</p>
                                                     </div>
                                                 </td>

                                                 <td>
                                                     <div class="text-end">
                                                         <h5 class="font-size-14
                                                            text-muted mb-0">$94.22</h5>
                                                         <p class="text-muted
                                                            mb-0 font-size-12">Amount</p>
                                                     </div>
                                                 </td>
                                             </tr>

                                             <tr>
                                                 <td>
                                                     <div class="font-size-22
                                                        text-danger">
                                                         <i class="bx
                                                            bx-up-arrow-circle
                                                            d-block"></i>
                                                     </div>
                                                 </td>

                                                 <td>
                                                     <div>
                                                         <h5 class="font-size-14
                                                            mb-1">Sell ETH</h5>
                                                         <p class="text-muted
                                                            mb-0 font-size-12">17
                                                             Mar, 2021</p>
                                                     </div>
                                                 </td>

                                                 <td>
                                                     <div class="text-end">
                                                         <h5 class="font-size-14
                                                            mb-0">0.42 ETH</h5>
                                                         <p class="text-muted
                                                            mb-0 font-size-12">Coin
                                                             Value</p>
                                                     </div>
                                                 </td>

                                                 <td>
                                                     <div class="text-end">
                                                         <h5 class="font-size-14
                                                            text-muted mb-0">$84.32</h5>
                                                         <p class="text-muted
                                                            mb-0 font-size-12">Amount</p>
                                                     </div>
                                                 </td>
                                             </tr>



                                             <tr>
                                                 <td style="width: 50px;">
                                                     <div class="font-size-22
                                                        text-danger">
                                                         <i class="bx
                                                            bx-up-arrow-circle
                                                            d-block"></i>
                                                     </div>
                                                 </td>

                                                 <td>
                                                     <div>
                                                         <h5 class="font-size-14
                                                            mb-1">Sell BTC</h5>
                                                         <p class="text-muted
                                                            mb-0 font-size-12">14
                                                             Mar, 2021</p>
                                                     </div>
                                                 </td>

                                                 <td>
                                                     <div class="text-end">
                                                         <h5 class="font-size-14
                                                            mb-0">0.016 BTC</h5>
                                                         <p class="text-muted
                                                            mb-0 font-size-12">Coin
                                                             Value</p>
                                                     </div>
                                                 </td>

                                                 <td>
                                                     <div class="text-end">
                                                         <h5 class="font-size-14
                                                            text-muted mb-0">$125.20</h5>
                                                         <p class="text-muted
                                                            mb-0 font-size-12">Amount</p>
                                                     </div>
                                                 </td>
                                             </tr>
                                         </tbody>
                                     </table>
                                 </div>
                             </div>
                             <!-- end tab pane -->
                         </div>
                         <!-- end tab content -->
                     </div>
                     <!-- end card body -->
                 </div>
                 <!-- end card -->
             </div>
             <!-- end col -->

             <div class="col-xl-4">
                 <div class="card">
                     <div class="card-header align-items-center d-flex">
                         <h4 class="card-title mb-0 flex-grow-1">Recent Activity</h4>
                         <div class="flex-shrink-0">
                             <select class="form-select form-select-sm mb-0
                                my-n1">
                                 <option value="Today" selected="">Today</option>
                                 <option value="Yesterday">Yesterday</option>
                                 <option value="Week">Last Week</option>
                                 <option value="Month">Last Month</option>
                             </select>
                         </div>
                     </div><!-- end card header -->

                     <div class="card-body px-0">
                         <div class="px-3" data-simplebar style="max-height:
                            352px;">
                             <ul class="list-unstyled activity-wid mb-0">

                                 <li class="activity-list activity-border">
                                     <div class="activity-icon avatar-md">
                                         <span class="avatar-title
                                            bg-soft-warning text-warning
                                            rounded-circle">
                                             <i class="bx bx-bitcoin
                                                font-size-24"></i>
                                         </span>
                                     </div>
                                     <div class="timeline-list-item">
                                         <div class="d-flex">
                                             <div class="flex-grow-1
                                                overflow-hidden me-4">
                                                 <h5 class="font-size-14 mb-1">24/05/2021,
                                                     18:24:56</h5>
                                                 <p class="text-truncate
                                                    text-muted font-size-13">0xb77ad0099e21d4fca87fa4ca92dda1a40af9e05d205e53f38bf026196fa2e431</p>
                                             </div>
                                             <div class="flex-shrink-0 text-end
                                                me-3">
                                                 <h6 class="mb-1">+0.5 BTC</h6>
                                                 <div class="font-size-13">$178.53</div>
                                             </div>

                                             <div class="flex-shrink-0 text-end">
                                                 <div class="dropdown">
                                                     <a class="text-muted
                                                        dropdown-toggle
                                                        font-size-24" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                                         <i class="mdi
                                                            mdi-dots-vertical"></i>
                                                     </a>

                                                     <div class="dropdown-menu
                                                        dropdown-menu-end">
                                                         <a class="dropdown-item" href="#">Action</a>
                                                         <a class="dropdown-item" href="#">Another
                                                             action</a>
                                                         <a class="dropdown-item" href="#">Something
                                                             else here</a>
                                                         <div class="dropdown-divider"></div>
                                                         <a class="dropdown-item" href="#">Separated
                                                             link</a>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </li>

                                 <li class="activity-list activity-border">
                                     <div class="activity-icon avatar-md">
                                         <span class="avatar-title
                                            bg-soft-primary text-primary
                                            rounded-circle">
                                             <i class="mdi mdi-ethereum
                                                font-size-24"></i>
                                         </span>
                                     </div>
                                     <div class="timeline-list-item">
                                         <div class="d-flex">
                                             <div class="flex-grow-1
                                                overflow-hidden me-4">
                                                 <h5 class="font-size-14 mb-1">24/05/2021,
                                                     18:24:56</h5>
                                                 <p class="text-truncate
                                                    text-muted font-size-13">0xb77ad0099e21d4fca87fa4ca92dda1a40af9e05d205e53f38bf026196fa2e431</p>
                                             </div>
                                             <div class="flex-shrink-0 text-end
                                                me-3">
                                                 <h6 class="mb-1">-20.5 ETH</h6>
                                                 <div class="font-size-13">$3541.45</div>
                                             </div>

                                             <div class="flex-shrink-0 text-end">
                                                 <div class="dropdown">
                                                     <a class="text-muted
                                                        dropdown-toggle
                                                        font-size-24" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                                         <i class="mdi
                                                            mdi-dots-vertical"></i>
                                                     </a>

                                                     <div class="dropdown-menu
                                                        dropdown-menu-end">
                                                         <a class="dropdown-item" href="#">Action</a>
                                                         <a class="dropdown-item" href="#">Another
                                                             action</a>
                                                         <a class="dropdown-item" href="#">Something
                                                             else here</a>
                                                         <div class="dropdown-divider"></div>
                                                         <a class="dropdown-item" href="#">Separated
                                                             link</a>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </li>

                                 <li class="activity-list activity-border">
                                     <div class="activity-icon avatar-md">
                                         <span class="avatar-title
                                            bg-soft-warning text-warning
                                            rounded-circle">
                                             <i class="bx bx-bitcoin
                                                font-size-24"></i>
                                         </span>
                                     </div>
                                     <div class="timeline-list-item">
                                         <div class="d-flex">
                                             <div class="flex-grow-1
                                                overflow-hidden me-4">
                                                 <h5 class="font-size-14 mb-1">24/05/2021,
                                                     18:24:56</h5>
                                                 <p class="text-truncate
                                                    text-muted font-size-13">0xb77ad0099e21d4fca87fa4ca92dda1a40af9e05d205e53f38bf026196fa2e431</p>
                                             </div>
                                             <div class="flex-shrink-0 text-end
                                                me-3">
                                                 <h6 class="mb-1">+0.5 BTC</h6>
                                                 <div class="font-size-13">$5791.45</div>
                                             </div>

                                             <div class="flex-shrink-0 text-end">
                                                 <div class="dropdown">
                                                     <a class="text-muted
                                                        dropdown-toggle
                                                        font-size-24" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                                         <i class="mdi
                                                            mdi-dots-vertical"></i>
                                                     </a>

                                                     <div class="dropdown-menu
                                                        dropdown-menu-end">
                                                         <a class="dropdown-item" href="#">Action</a>
                                                         <a class="dropdown-item" href="#">Another
                                                             action</a>
                                                         <a class="dropdown-item" href="#">Something
                                                             else here</a>
                                                         <div class="dropdown-divider"></div>
                                                         <a class="dropdown-item" href="#">Separated
                                                             link</a>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </li>

                                 <li class="activity-list activity-border">
                                     <div class="activity-icon avatar-md">
                                         <span class="avatar-title
                                            bg-soft-primary text-primary
                                            rounded-circle">
                                             <i class="mdi mdi-litecoin
                                                font-size-24"></i>
                                         </span>
                                     </div>
                                     <div class="timeline-list-item">
                                         <div class="d-flex">
                                             <div class="flex-grow-1
                                                overflow-hidden me-4">
                                                 <h5 class="font-size-14 mb-1">24/05/2021,
                                                     18:24:56</h5>
                                                 <p class="text-truncate
                                                    text-muted font-size-13">0xb77ad0099e21d4fca87fa4ca92dda1a40af9e05d205e53f38bf026196fa2e431</p>
                                             </div>
                                             <div class="flex-shrink-0 text-end
                                                me-3">
                                                 <h6 class="mb-1">-1.5 LTC</h6>
                                                 <div class="font-size-13">$5791.45</div>
                                             </div>

                                             <div class="flex-shrink-0 text-end">
                                                 <div class="dropdown">
                                                     <a class="text-muted
                                                        dropdown-toggle
                                                        font-size-24" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                                         <i class="mdi
                                                            mdi-dots-vertical"></i>
                                                     </a>

                                                     <div class="dropdown-menu
                                                        dropdown-menu-end">
                                                         <a class="dropdown-item" href="#">Action</a>
                                                         <a class="dropdown-item" href="#">Another
                                                             action</a>
                                                         <a class="dropdown-item" href="#">Something
                                                             else here</a>
                                                         <div class="dropdown-divider"></div>
                                                         <a class="dropdown-item" href="#">Separated
                                                             link</a>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </li>


                                 <li class="activity-list activity-border">
                                     <div class="activity-icon avatar-md">
                                         <span class="avatar-title
                                            bg-soft-warning text-warning
                                            rounded-circle">
                                             <i class="bx bx-bitcoin
                                                font-size-24"></i>
                                         </span>
                                     </div>
                                     <div class="timeline-list-item">
                                         <div class="d-flex">
                                             <div class="flex-grow-1
                                                overflow-hidden me-4">
                                                 <h5 class="font-size-14 mb-1">24/05/2021,
                                                     18:24:56</h5>
                                                 <p class="text-truncate
                                                    text-muted font-size-13">0xb77ad0099e21d4fca87fa4ca92dda1a40af9e05d205e53f38bf026196fa2e431</p>
                                             </div>
                                             <div class="flex-shrink-0 text-end
                                                me-3">
                                                 <h6 class="mb-1">+0.5 BTC</h6>
                                                 <div class="font-size-13">$5791.45</div>
                                             </div>

                                             <div class="flex-shrink-0 text-end">
                                                 <div class="dropdown">
                                                     <a class="text-muted
                                                        dropdown-toggle
                                                        font-size-24" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                                         <i class="mdi
                                                            mdi-dots-vertical"></i>
                                                     </a>

                                                     <div class="dropdown-menu
                                                        dropdown-menu-end">
                                                         <a class="dropdown-item" href="#">Action</a>
                                                         <a class="dropdown-item" href="#">Another
                                                             action</a>
                                                         <a class="dropdown-item" href="#">Something
                                                             else here</a>
                                                         <div class="dropdown-divider"></div>
                                                         <a class="dropdown-item" href="#">Separated
                                                             link</a>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </li>

                                 <li class="activity-list">
                                     <div class="activity-icon avatar-md">
                                         <span class="avatar-title
                                            bg-soft-primary text-primary
                                            rounded-circle">
                                             <i class="mdi mdi-litecoin
                                                font-size-24"></i>
                                         </span>
                                     </div>
                                     <div class="timeline-list-item">
                                         <div class="d-flex">
                                             <div class="flex-grow-1
                                                overflow-hidden me-4">
                                                 <h5 class="font-size-14 mb-1">24/05/2021,
                                                     18:24:56</h5>
                                                 <p class="text-truncate
                                                    text-muted font-size-13">0xb77ad0099e21d4fca87fa4ca92dda1a40af9e05d205e53f38bf026196fa2e431</p>
                                             </div>
                                             <div class="flex-shrink-0 text-end
                                                me-3">
                                                 <h6 class="mb-1">+.55 LTC</h6>
                                                 <div class="font-size-13">$91.45</div>
                                             </div>

                                             <div class="flex-shrink-0 text-end">
                                                 <div class="dropdown">
                                                     <a class="text-muted
                                                        dropdown-toggle
                                                        font-size-24" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                                         <i class="mdi
                                                            mdi-dots-vertical"></i>
                                                     </a>

                                                     <div class="dropdown-menu
                                                        dropdown-menu-end">
                                                         <a class="dropdown-item" href="#">Action</a>
                                                         <a class="dropdown-item" href="#">Another
                                                             action</a>
                                                         <a class="dropdown-item" href="#">Something
                                                             else here</a>
                                                         <div class="dropdown-divider"></div>
                                                         <a class="dropdown-item" href="#">Separated
                                                             link</a>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </li>
                             </ul>
                         </div>
                     </div>
                     <!-- end card body -->
                 </div>
                 <!-- end card -->
             </div>
             <!-- end col -->
         </div><!-- end row -->
     </div>
     <!-- container-fluid -->
 </div>
 <!-- End Page-content -->

 <!-- apexcharts -->
 <script src="assets/libs/apexcharts/apexcharts.min.js"></script>

 <!-- Plugins js-->
 <script src="assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
 <script src="assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js"></script>
 <!-- dashboard init -->
 <script src="assets/js/pages/dashboard.init.js"></script>

 <script type="text/javascript">
     function initCounterNumber() {
         var counter = document.querySelectorAll('.counter-value');
         var speed = 250; // The lower the slower
         counter.forEach(function(counter_value) {
             function updateCount() {
                 var target = +counter_value.getAttribute('data-target');
                 var count = +counter_value.innerText;
                 var inc = target / speed;
                 if (inc < 1) {
                     inc = 1;
                 }
                 // Check if target is reached
                 if (count < target) {
                     // Add inc to count and output in counter_value
                     counter_value.innerText = (count + inc).toFixed(0);
                     // Call function every ms
                     setTimeout(updateCount, 1);
                 } else {
                     counter_value.innerText = target;
                 }
             };
             updateCount();
         });
     }

     $(document).ready(function() {
         initCounterNumber();
     });
 </script>
 <script>
     function crearGrafico(datosCategoria) {
         // Mapea los datos recibidos para obtener las etiquetas (labels) y las series
         var etiquetas = datosCategoria.map(function(categoria) {
             return categoria.nombre_C;
         });

         var series = datosCategoria.map(function(categoria) {
             return parseInt(categoria.cantidad_productos) / 4;
         });

         // Define el objeto "datosGrafico" con los datos mapeados
         var datosGrafico = {
             series: series,
             chart: {
                 type: 'donut'
             },
             labels: etiquetas
         };

         var options = {
             colors: ["#887aca", "#5776be", "#a877da"]
         };

         // Inicializa el gráfico
         var chart = new ApexCharts(document.querySelector("#wallet-balance"), datosGrafico, options);
         chart.render();
     }

     // Función para realizar la solicitud AJAX
     function realizarSolicitudAjax() {
         $.ajax({
             url: './controllers/ArticulosControllers.php?action=productosPorCategoria',
             method: "GET",
             dataType: "json",
             success: function(data) {
                 console.log(data);

                 // Llama a la función para inicializar el gráfico

                 crearGrafico(data);
             },
             error: function(xhr, textStatus, errorThrown) {
                 console.error("Error en la solicitud AJAX: " + errorThrown);
             }
         });
     }

     // Llama a la función para realizar la solicitud AJAX al cargar la página
     realizarSolicitudAjax();


     // Supongamos que tienes datos dinámicos, por ejemplo:
     const dataPoints = [10, 20, 30, 40, 50];

     // Configuración del gráfico ApexCharts
     const options1 = {
         chart: {
             type: 'line',
         },
         series: [{
             name: 'Invested Overview',
             data: dataPoints,
         }],
         colors: ['#5156be', '#34c38f'],
     };

     // Inicializar el gráfico con ApexCharts
     const chart1 = new ApexCharts(document.querySelector("#invested-overview"), options1);
     chart1.render();

     // Supongamos que tienes nuevos datos dinámicos, por ejemplo:
     const newDataPoints = [15, 25, 35, 45, 55];

     // Actualizar el gráfico con los nuevos datos
     chart1.updateSeries([{
         data: newDataPoints,
     }]);



     // Datos de ejemplo para el gráfico
     const marketOverviewData = {
         series: [{
             name: 'Market Overview',
             data: [30, 40, 35, 50, 49, 60, 70, 91, 125],
         }],
     };

     // Configuración del gráfico ApexCharts
     const marketOverviewOptions = {
         chart: {
             type: 'line',
         },
         series: marketOverviewData.series,
         colors: ['#5156be', '#34c38f'],
     };

     // Inicializar el gráfico con ApexCharts
     const marketOverviewChart = new ApexCharts(document.querySelector("#market-overview"), marketOverviewOptions);
     marketOverviewChart.render();

     // Datos de ejemplo para la lista de monedas
     const coinListData = [{
             name: 'Coinmarketcap',
             change: '+2.5%'
         },
         {
             name: 'Binance',
             change: '+8.3%'
         },
         {
             name: 'Coinbase',
             change: '-3.6%'
         },
         {
             name: 'Yobit',
             change: '+7.1%'
         },
         {
             name: 'Bitfinex',
             change: '-0.9%'
         },
     ];

     // Función para generar la lista de monedas dinámicamente
     function generateCoinList(data) {
         const container = document.getElementById('coin-list-container');
         container.innerHTML = '';

         data.forEach((coin, index) => {
             const html = `
            <div class="mt-3">
                <div class="d-flex align-items-center">
                    <div class="avatar-sm m-auto">
                        <span class="avatar-title rounded-circle bg-soft-light text-dark font-size-16">
                            ${index + 1}
                        </span>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <span class="font-size-16">${coin.name}</span>
                    </div>
                    <div class="flex-shrink-0">
                        <span class="badge rounded-pill badge-soft-success font-size-12 fw-medium">${coin.change}</span>
                    </div>
                </div>
            </div>
        `;

             container.innerHTML += html;
         });
     }

     // Llamar a la función para generar la lista de monedas con los datos de ejemplo
     generateCoinList(coinListData);
 </script>