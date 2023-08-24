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
                        
                        
                <div id="tabsIcons" class="col-lg-12 col-12 layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>Contract Invoices</h4>
                                </div>
                            </div>
                        </div>
                        <ul class="nav nav-tabs  mb-3 mt-3" id="iconTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="icon-home-tab" data-toggle="tab" href="#icon-home" role="tab" aria-controls="icon-home" aria-selected="true"> All</a>
                            </li>
                           <li class="nav-item">
                                <a class="nav-link" id="icon-profile-tab" data-toggle="tab" href="#icon-profile" role="tab" aria-controls="icon-profile" aria-selected="true"> Pending</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="icon-completed-tab" data-toggle="tab" href="#icon-completed" role="tab" aria-controls="icon-completed" aria-selected="false"> Paid</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="iconTabContent-1">
                            <div class="tab-pane fade show active p-2" id="icon-home" role="tabpanel" aria-labelledby="icon-home-tab" >
                                <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Dealer Name</th>
                                            <th class="dt-no-sorting">Contract Type</th>
                                            <th class="dt-no-sorting">Contract Amount</th>
                                            <th class="dt-no-sorting">Contract Duration</th>
                                            <th class="dt-no-sorting">Amount to pay</th>
                                            <th class="dt-no-sorting">Status</th>
                                            <th class="dt-no-sorting">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $count=1;
                                        @endphp
                                    @foreach($invoices as $invoice)
                                        <tr>
                                            <td>{{$count}}</td>
                                            <td>{{$invoice->dealer->owner_name}}</td>
                                            <td>{{$invoice->contract->contract_type->name}}</td>
                                            <td>${{$invoice->contract->amount}}</td>
                                            <td>{{$invoice->contract->total_years}} years</td>
                                            <td>${{$invoice->amount}}</td>
                                            <td>
                                                @if($invoice->status=='1')
                                                <span class="shadow-none badge badge-success ">Paid
                                                @else
                                                <span class="shadow-none badge badge-danger ">Pending
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{Url('employee/manager/dealer_invoice_detail/'.$invoice->id)}}"><i class="far fa-list-alt" style="color: green; font-size: 18px;margin-right: 10px" aria-hidden="true"></i></a>
                                            </td>
                                            
                                        </tr>
                                        @php
                                            $count++;
                                        @endphp
                                        @endforeach 
                                    </tbody>
                                </table>      
                            </div>
                            <div class="tab-pane fade p-2" id="icon-profile" role="tabpanel" aria-labelledby="icon-profile-tab">
                                
                                <table id="html6-extension" class="table table-hover non-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Dealer Name</th>
                                            <th class="dt-no-sorting">Contract Type</th>
                                            <th class="dt-no-sorting">Contract Amount</th>
                                            <th class="dt-no-sorting">Contract Duration</th>
                                            <th class="dt-no-sorting">Amount to pay</th>
                                            <th class="dt-no-sorting">Status</th>
                                            <th class="dt-no-sorting">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         @php
                                            $count1=1;
                                        @endphp
                                        @foreach($invoices as $invoice)
                                        @if($invoice->status=='0')
                                        <tr>
                                            <td>{{$count}}</td>
                                            <td>{{$invoice->dealer->owner_name}}</td>
                                            <td>{{$invoice->contract->contract_type->name}}</td>
                                            <td>${{$invoice->contract->amount}}</td>
                                            <td>{{$invoice->contract->total_years}} years</td>
                                            <td>${{$invoice->amount}}</td>
                                            <td>
                                                <span class="shadow-none badge badge-danger ">Pending
                                            </td>
                                            <td>
                                                <a href="{{Url('employee/manager/dealer_invoice_detail/'.$invoice->id)}}"><i class="far fa-list-alt" style="color: green; font-size: 18px;margin-right: 10px" aria-hidden="true"></i></a>
                                            </td>
                                            
                                        </tr>
                                        @php
                                            $count1++;
                                        @endphp
                                        @endif
                                        @endforeach 
                                    </tbody>
                                </table>   
                                
                            </div>
                            
                            
                            <div class="tab-pane fade p-2" id="icon-completed" role="tabpanel" aria-labelledby="icon-completed-tab">
                                <table id="html9-extension" class="table table-hover non-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Dealer Name</th>
                                            <th class="dt-no-sorting">Contract Type</th>
                                            <th class="dt-no-sorting">Contract Amount</th>
                                            <th class="dt-no-sorting">Contract Duration</th>
                                            <th class="dt-no-sorting">Amount to pay</th>
                                            <th class="dt-no-sorting">Status</th>
                                            <th class="dt-no-sorting">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $count2=1;
                                        @endphp
                                        @foreach($invoices as $invoice)
                                        @if($invoice->status=='1')
                                        <tr>
                                            <td>{{$count}}</td>
                                            <td>{{$invoice->dealer->owner_name}}</td>
                                            <td>{{$invoice->contract->contract_type->name}}</td>
                                            <td>${{$invoice->contract->amount}}</td>
                                            <td>{{$invoice->contract->total_years}} years</td>
                                            <td>${{$invoice->amount}}</td>
                                            <td>
                                                <span class="shadow-none badge badge-success ">Paid
                                            </td>
                                            <td>
                                                <a href="{{Url('employee/manager/dealer_invoice_detail/'.$invoice->id)}}"><i class="far fa-list-alt" style="color: green; font-size: 18px;margin-right: 10px" aria-hidden="true"></i></a>
                                            </td>
                                            
                                        </tr>
                                        @php
                                            $count2++;
                                        @endphp
                                        @endif
                                        @endforeach 
                                    </tbody>
                                </table>   
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

<script>
        $('#html6-extension').DataTable( {
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
    <script>
        $('#html7-extension').DataTable( {
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
    <script>
        $('#html9-extension').DataTable( {
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
</body>
</html>