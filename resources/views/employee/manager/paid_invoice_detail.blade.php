<!DOCTYPE html>
<html lang="en">
    @include('employee.manager.includes.head')

    <link href="{{asset('public/assets/css/apps/invoice-preview.css')}}" rel="stylesheet" type="text/css" />
    <style>
        .border{
            border:1px solid grey;
            padding: 5px;
            text-align:center;
        }
    </style>
<body>
    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div>
</div></div>
    <!--  END LOADER -->

    @include('employee.manager.includes.topbar')

    

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

      
    @include('employee.manager.includes.navbar')
        
        
        <!--  BEGIN CONTENT PART content -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing mb-5">
                <div class="row invoice layout-top-spacing layout-spacing">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        
                        <div class="doc-container">

                            <div class="row">

                                <div class="col-xl-9">

                                    <div class="invoice-container">
                                        <div class="invoice-inbox">
                                            
                                            <div id="ct" class="">
                                                
                                                <div class="invoice-00001">
                                                    <div class="content-section">
    
                                                        <div class="inv--head-section inv--detail-section">
                                                        
                                                            <div class="row">
                                                            
                                                                <div class="col-sm-12 col-12 mr-auto">
                                                                    <div class="d-flex">
                                                                    <img class="company-logo" src="{{asset('public/logo.png')}}"  alt="company" style="width:150px">
                                                                        
                                                                    </div>
                                                                </div>
                                                            
                                                            </div>
                                                            
                                                        </div>
    
                                                        <div class="inv--detail-section inv--customer-detail-section">
                                                            <div class="row">
        
                                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 align-self-center">
                                                                    <p class="inv-to">Invoice From</p>
                                                                </div>

                                                                
                                                                <div class="col-xl-8 col-lg-7 col-md-6 col-sm-6">
                                                                    <p class="inv-customer-name">UIG-Leasing</p>
                                                                    <p class="inv-street-addr">1200 Gulf Freeway #544 Houston, TX 77034</p>
                                                                    <p class="inv-email-address">DoNotReply@UIGLeasing.com</p>
                                                                </div>
                                                                <div class="col-xl-4 col-lg-5 col-md-6 col-sm-6 col-12 order-sm-0 order-1">
                                                                    <div class="inv--payment-info">
                                                                        <table style="float:right;width:100%">
                                                                            <tr>
                                                                                <td class="border"><span style="color:black;"><b> Invoice Number:</b></span></td>
                                                                                <td class="border"><span style="color:black;"> uig-2202121</span></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="border"><span style="color:black;"><b> Invoice Status:</b></span></td>
                                                                                <td class="border"><span style="color:green;"><b> Paid</b></span></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="border"><span style="color:black;"><b> Invoice Date:</b></span></td>
                                                                                <td class="border"><span style="color:black;"> {{$invoice->due_date}}</span></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="border"><span style="color:black;"><b> Total Amount:</b></span></td>
                                                                                <td class="border"><span style="color:black;"> {{$invoice->total_amount_to_pay}}</span></td>
                                                                            </tr>
                                                                        </table>
                                                                        
                                                                        

                                                                    </div>
                                                                </div>
                                                                

                                                            </div>
                                                            <div class="row">
    
                                                                <div class="col-xl-8 col-lg-7 col-md-6 col-sm-12 align-self-center">
                                                                    <p class="inv-to">Invoice To</p>
                                                                </div>
                                                                <div class="col-xl-8 col-lg-7 col-md-6 col-sm-12">
                                                                    <p class="inv-customer-name">{{$invoice->customer->name}}</p>
                                                                    <p class="inv-street-addr">{{$invoice->customer->street.",".$invoice->customer->city.",".$invoice->customer->country}}</p>
                                                                    <p class="inv-email-address">{{$invoice->customer->email}}</p>
                                                                    <p class="inv-email-address">+1 {{$invoice->customer->contact}}</p>
                                                                </div>
                                                                
                                                                

                                                            </div>
                                                            
                                                        </div>

                                                        <div class="inv--product-table-section">
                                                            <div class="table-responsive">
                                                                <table class="table">
                                                                    <thead class="">
                                                                        <tr>
                                                                            <th scope="col">S.No</th>
                                                                            <th scope="col">Items</th>
                                                                            <th class="text-right" scope="col">Qty</th>
                                                                            <th class="text-right" scope="col">Price</th>
                                                                            
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        
                                                                        <!-- <tr>
                                                                            <td>1</td>
                                                                            <td>Contract Installment</td>
                                                                            <td class="text-right">1</td>
                                                                            <td class="text-right">1</td>
                                                                        </tr> -->
                                                                        
                                                                        
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="inv--total-amounts">
                                                        
                                                            <div class="row mt-4">
                                                                <div class="col-sm-5 col-12 order-sm-0 order-1">
                                                                </div>
                                                                <div class="col-sm-7 col-12 order-sm-1 order-0">
                                                                    <div class="text-sm-right">
                                                                        <div class="row">
                                                                            <div class="col-sm-3 col-8">

                                                                            </div>
                                                                            <div class="col-sm-9 col-8">
                                                                                <table style="float:right;width:100%">
                                                                                    <tr>
                                                                                        <td class="border "><span style="color:black;"> Sub Total:</span></td>
                                                                                        <td class="border"><span style="color:black;"> ${{$invoice->amount}}</span></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="border"><span style="color:black;"> Sales-Tax:</span></td>
                                                                                        <td class="border"><span style="color:black;"> ${{$invoice->sales_tax}}</span></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="border"><span style="color:black;"> Late-fee:</span></td>
                                                                                        <td class="border"><span style="color:black;"> ${{$invoice->late_fee}}</span></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="border"><span style="color:black;"> Grand Total:</span></td>
                                                                                        <td class="border"><span style="color:black;"> ${{$invoice->total_amount_to_pay+$invoice->late_fee}}</span></td>
                                                                                    </tr>
                                                                                    
                                                                                </table>
                                                                            </div>
                                                                           
                                                                            <!-- <div class="col-sm-8 col-7">
                                                                                <p class="">Sub Total: </p>
                                                                            </div>
                                                                            <div class="col-sm-4 col-5">
                                                                                <p class="">0</p>
                                                                            </div>
                                                                            
                                                                            <div class="col-sm-8 col-7 grand-total-title">
                                                                                <h4 class="">Grand Total : </h4>
                                                                            </div>
                                                                            <div class="col-sm-4 col-5 grand-total-amount">
                                                                                <h4 class="">0</h4>
                                                                            </div> -->
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        
    
                                                    </div>
                                                </div> 
                                                
                                            </div>
    
    
                                        </div>
    
                                    </div>

                                </div>

                                <div class="col-xl-3">

                                    <div class="invoice-actions-btn">

                                        <div class="invoice-action-btn">

                                            <div class="row">
                                                
                                                <div class="col-xl-12 col-md-3 col-sm-6">
                                                    <a href="javascript:void(0);" class="btn btn-secondary btn-print  action-print">Print</a>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                </div>


                            </div>
                            
                            
                        </div>

                    </div>
                </div>
            </div>
            @include('employee.manager.includes.footer')

        </div>
        <!--  END CONTENT PART  -->

    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{asset('public/assets/js/libs/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('public/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('public/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('public/assets/js/app.js')}}"></script>
    
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="{{asset('public/assets/js/custom.js')}}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="{{asset('public/assets/js/apps/invoice-preview.js')}}"></script>

    
</body>
</html>