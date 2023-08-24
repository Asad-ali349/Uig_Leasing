<!DOCTYPE html>
<html lang="en">
@include('employee.manager.includes.head')

    <link rel="stylesheet" type="text/css" href="{{asset('public/plugins/select2/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/plugins/table/datatable/datatables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/plugins/table/datatable/custom_dt_html5.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/plugins/table/datatable/dt-global_style.css')}}">
    <link rel="stylesheet" href="{{asset('public/plugins/font-icons/fontawesome/css/regular.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('public/plugins/font-icons/fontawesome/css/fontawesome.css')}}">
    <link href="{{asset('public/assets/css/components/cards/card.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{asset('public/assets/css/forms/theme-checkbox-radio.css')}}">
    <link href="{{asset('public/plugins/flatpickr/flatpickr.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('public/plugins/noUiSlider/nouislider.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('public/plugins/flatpickr/custom-flatpickr.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('public/plugins/noUiSlider/custom-nouiSlider.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('public/plugins/bootstrap-range-Slider/bootstrap-slider.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('public/assets/css/dashboard/dash_2.css')}}" rel="stylesheet" type="text/css" />
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
            <div class="layout-px-spacing">
                        <!-- <div class="col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                            <h3>Dealer</h3>
                        </div> -->
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                            <a class="btn btn-primary" data-toggle="modal" data-target="#modal" style="">Filter</a>

                            <div class="modal md" id="modal" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" style="color:#3b3f5c;font-weight: 50px; font-size: 30px;">Filter Invoices</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{url('employee/manager/filter_invoices')}}" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-12 mt-2">
                                                    <label for="">Date Range</label>    
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="">To</label> 
                                                    <input type="date" class="form-control" id="fromdate" name="fromdate">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="">From</label> 
                                                    <input type="date" class="form-control" id="todate" name="todate">
                                                </div>
                                                <div class="col-md-4 mt-4">
                                                    <div class="n-chk">
                                                        <label class="new-control new-radio">
                                                        <input type="radio" class="new-control-input" name="filters" value="all" onchange="handleChange1('','');" checked>
                                                        <span class="new-control-indicator"></span>All
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mt-4">
                                                
                                                    <div class="n-chk">
                                                        <label class="new-control new-radio">
                                                        <input type="radio" value="dealers" class="new-control-input" name="filters"  onchange="handleChange1('dealers','customer');" >
                                                        <span class="new-control-indicator"></span>Dealer
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mt-4">
                                                    <div class="n-chk">
                                                        <label class="new-control new-radio">
                                                        <input type="radio" class="new-control-input" name="filters" value="customers"  onchange="handleChange1('customer','dealers');">
                                                        <span class="new-control-indicator"></span>Customer
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-12" >
                                                    <div id='dealers' style="display:none">
                                                        <select name='dealer' id="dealerval" class="form-control ">
                                                            <option value="">Select dealer</option>
                                                            <!-- <option value="0">All Dealers</option> -->
                                                            @foreach($dealers as $dealer)
                                                                <option value="{{$dealer->id}}">{{$dealer->owner_name}}</option>

                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div id='customer' style="display:none">
                                                        <select name='customer' id='customerval' class="form-control ">
                                                            <option value="">Select Customer</option>
                                                            <!-- <option value="0">All Customers</option> -->
                                                            @foreach($customers as $customer)
                                                                <option value="{{$customer->id}}">{{$customer->name}}</option>

                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-success" type="submit">Apply</button>
                                        </div>
                                    </form>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if($filter=="all" || $filter=="dealers")
                        <div class="col-lg-12 col-12 layout-spacing">
                            <div class="row" id="dealer_filter">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                                    <h3>
                                        Dealer
                                    </h3>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 layout-spacing">
                                    <div class="widget widget-one_hybrid widget-followers">
                                        <div class="widget-heading">
                                            <div class="w-title">
                                                <div class="w-icon">
                                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                                </div>
                                                <div class="">
                                                    <p class="w-value" id="dealer_total_contract">{{$contract_count}}</p>
                                                    <h5 class="">Total Contracts</h5>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 layout-spacing">
                                    <div class="widget widget-one_hybrid widget-followers">
                                        <div class="widget-heading">
                                            <div class="w-title">
                                                <div class="w-icon">
                                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                                </div>
                                                <div class="">
                                                    <p class="w-value" id="dealer_paid_count">{{$dealer_paid_counts}}</p>
                                                    <h5 class="">Paid Invoices</h5>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 layout-spacing">
                                    <div class="widget widget-one_hybrid widget-followers">
                                        <div class="widget-heading">
                                            <div class="w-title">
                                                <div class="w-icon">
                                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                                </div>
                                                <div class="">
                                                    <p class="w-value" id="dealer_unpaid_count">{{$dealer_unpaid_counts}}</p>
                                                    <h5 class="">Pending Invoices</h5>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                                    <div class="widget widget-one_hybrid widget-followers">
                                        <div class="widget-heading">
                                            <div class="w-title">
                                                <div class="w-icon">
                                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                                </div>
                                                <div class="">
                                                    <p class="w-value" id="dealer_paid_sum">${{$dealer_paid_sum}}</p>
                                                    <h5 class="">Paid Amount</h5>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                                    <div class="widget widget-one_hybrid widget-followers">
                                        <div class="widget-heading">
                                            <div class="w-title">
                                                <div class="w-icon">
                                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                                </div>
                                                <div class="">
                                                    <p class="w-value" id="dealer_unpaid_sum">${{$dealer_unpaid_sum}}</p>
                                                    <h5 class=""> Pending Amount</h5>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        @endif

                        @if($filter=="all" || $filter=="customers")
                        <div class="col-lg-12 col-12 layout-spacing">
                            <div class="row" id="customer_filter">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                                    <h3>
                                        Customer
                                    </h3>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 layout-spacing">
                                    <div class="widget widget-one_hybrid widget-followers">
                                        <div class="widget-heading">
                                            <div class="w-title">
                                                <div class="w-icon">
                                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                                </div>
                                                <div class="">
                                                    <p class="w-value" id="customer_total_contract">{{$contract_count}}</p>
                                                    <h5 class="">Total Contracts</h5>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 layout-spacing">
                                    <div class="widget widget-one_hybrid widget-followers">
                                        <div class="widget-heading">
                                            <div class="w-title">
                                                <div class="w-icon">
                                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                                </div>
                                                <div class="">
                                                    <p class="w-value" id="customer_paid_count">{{$customer_paid_counts}}</p>
                                                    <h5 class="">Paid Invoices</h5>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 layout-spacing">
                                    <div class="widget widget-one_hybrid widget-followers">
                                        <div class="widget-heading">
                                            <div class="w-title">
                                                <div class="w-icon">
                                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                                </div>
                                                <div class="">
                                                    <p class="w-value" id="customer_unpaid_count">{{$customer_unpaid_counts}}</p>
                                                    <h5 class="">Pending Invoices</h5>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                                    <div class="widget widget-one_hybrid widget-followers">
                                        <div class="widget-heading">
                                            <div class="w-title">
                                                <div class="w-icon">
                                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                                </div>
                                                <div class="">
                                                    <p class="w-value" id="customer_paid_sum">${{$customer_paid_sum}}</p>
                                                    <h5 class="">Paid Amount</h5>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                                    <div class="widget widget-one_hybrid widget-followers">
                                        <div class="widget-heading">
                                            <div class="w-title">
                                                <div class="w-icon">
                                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                                </div>
                                                <div class="">
                                                    <p class="w-value" id="customer_unpaid_sum">${{$customer_unpaid_sum}}</p>
                                                    <h5 class=""> Pending Amount</h5>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        @endif
                        <div class="col-lg-12 col-12 layout-spacing mb-5">
                            
                            <div class=" widget-content widget-content-area br-6">
                                <div class="widget-header ml-4 mt-2">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h2>Contracts </h2>
                                        </div>                                                                        
                                    </div>
                                </div>
                                <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Customer Name</th>
                                        <th>Dealer Name</th>
                                        <th>Invoice Number</th>
                                        <th class="dt-no-sorting">Contract Type</th>
                                        <th class="dt-no-sorting">Contract Amount</th>
                                        <th class="dt-no-sorting">Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody id="ctable">
                                    <?php
                                        $count=1;
                                    ?>
                                     @foreach($contracts as $contract)
                                        <tr>
                                            <td>{{$count}}</td>
                                            <td>{{$contract->customer->name}}</td>
                                            <td>{{$contract->dealer->owner_name}}</td>
                                            <td>{{$contract->invoice_number}}</td>
                                            <td>{{$contract->contract_type->name}}</td>
                                            <td>${{$contract->amount}}</td>
                                            <td>
                                                <a href="{{Url('employee/manager/contract_detail/'.$contract->id)}}" data-toggle="tooltip" data-placement="top" title="Contract Detail"><i class="far fa-list-alt" style="color: green; font-size: 18px;margin-right: 10px" aria-hidden="true"></i></a>

                                                <a href="{{url('employee/manager/contract_invoice_customer/'.$contract->id)}}" data-toggle="tooltip" data-placement="top" title="Customer Invoices"><svg xmlns="http://www.w3.org/2000/svg" style="margin-right: 10px" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="blue" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg></a>

                                                <a href="{{url('employee/manager/contract_invoice_dealer/'.$contract->id)}}" data-toggle="tooltip" data-placement="top" title="Dealer Invoices"><svg viewBox="0 0 24 24" width="22" height="22" stroke="orange" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><polyline points="17 11 19 13 23 9"></polyline></svg></a>
                                            </td>
                                            
                                        </tr>
                                        <!-- Modal -->
                                        <?php
                                            $count++;
                                        ?>
                                    @endforeach
                                    
                                    
                                </tbody>
                            </table>
                                
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

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script >
       
        $(document).ready(function() {
            $('.select2').select2();
        });
        
        setTimeout(()=> {
            $('#alert').hide('slow')
        }, 5000)
        function handleChange1(sh,hi){
            if(sh!="" && hi!=""){
                $('#contract').css('display','block');
                $('#'+sh).css('display','block');
                $('#'+hi).css('display','none');
            }else{
                $('#contract').css('display','none');
                $('#dealers').css('display','none');
                $('#customer').css('display','none');
            }
            
            
        }

        
    </script>
    <script src="{{asset('public/plugins/highlight/highlight.pack.js')}}"></script>
    <script src="{{asset('public/assets/js/custom.js')}}"></script>
    <script src="{{asset('public/assets/js/scrollspyNav.js')}}"></script>

    <script src="{{asset('public/plugins/table/datatable/datatables.js')}}"></script>
    <!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
    <script src="{{asset('public/plugins/table/datatable/button-ext/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('public/plugins/table/datatable/button-ext/jszip.min.js')}}"></script>    
    <script src="{{asset('public/plugins/table/datatable/button-ext/buttons.html5.min.js')}}"></script>
    <script src="{{asset('public/plugins/table/datatable/button-ext/buttons.print.min.js')}}"></script>

    <script>
        $('#html5-extension').DataTable( {
            "dom": "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
        "<'table-responsive'tr>" +
        "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
            buttons: {
                buttons: [
                    { extend: 'copy', className: 'btn btn-sm' },
                    { extend: 'csv', className: 'btn btn-sm' },
                    { extend: 'excel', className: 'btn btn-sm' },
                    { extend: 'print', className: 'btn btn-sm' }
                ]
            },
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
               "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 20 
        } );
    </script>
    
    <script src="{{asset('public/plugins/flatpickr/flatpickr.js')}}"></script>
    <script src="{{asset('public/plugins/noUiSlider/nouislider.min.js')}}"></script>

    <script src="{{asset('public/plugins/flatpickr/custom-flatpickr.js')}}"></script>
    <script src="{{asset('public/plugins/noUiSlider/custom-nouiSlider.js')}}"></script>
    <script src="{{asset('public/plugins/bootstrap-range-Slider/bootstrap-rangeSlider.js')}}"></script>
    <script src="{{asset('public/assets/js/dashboard/dash_2.js')}}"></script>
</body>
</html>