<!DOCTYPE html>
<html lang="en">
	@include('customer.includes.head')
	<link href="{{asset('public/assets/css/users/user-profile.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('public/assets/css/components/cards/card.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('public/assetsss/plugins/dropzone/dist/dropzone.css')}}" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="{{asset('public/plugins/table/datatable/datatables.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('public/plugins/table/datatable/custom_dt_html5.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('public/plugins/table/datatable/dt-global_style.css')}}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{asset('public/plugins/font-icons/fontawesome/css/regular.css')}}">
	<link rel="stylesheet" href="{{asset('public/plugins/font-icons/fontawesome/css/fontawesome.css')}}">
	<body>
		<!-- BEGIN LOADER -->
		<div id="load_screen">
			<div class="loader">
				<div class="loader-content">
					<div class="spinner-grow align-self-center"></div>
				</div>
			</div>
		</div>
		<!--  END LOADER -->
		@include('customer.includes.topbar')
		<!--  BEGIN MAIN CONTAINER  -->
		<div class="main-container" id="container">
			@include('customer.includes.navbar')
			<!--  BEGIN CONTENT PART content -->
			<div id="content" class="main-content">
				<div class="layout-px-spacing">
					<div class="row ">
						<div class="col-xl-4 col-lg-6 col-md-5 col-sm-12 layout-top-spacing">
							<div class="user-profile layout-spacing">
								<div class="widget-content widget-content-area">
									<div class="d-flex justify-content-between">
										<h4 class="" style="margin:5px;border-bottom: 2px solid #057485; ">Dealer info</h4>
										
									</div>
									<div class="text-center user-info">
										<img src="{{asset('storage/app/'.$get_contract->dealer->shop_logo)}}" style="width:100px;height:120px" alt="avatar">
										<p class="">{{$get_contract->dealer->owner_name}}</p>
									</div>
									<div class="user-info-list">
										<div class="">
											<ul class="contacts-block list-unstyled">
												<li class="contacts-block__item">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin">
														<path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
														<circle cx="12" cy="10" r="3"></circle>
													</svg>
													{{$get_contract->dealer->shop_address.', '.$get_contract->dealer->shop_city.', '.$get_contract->dealer->shop_state.', '.$get_contract->dealer->shop_zip.', '.$get_contract->dealer->shop_country}}
												</li>
												<li class="contacts-block__item">
													<a href="mailto:example@mail.com">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail">
															<path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
															<polyline points="22,6 12,13 2,6"></polyline>
														</svg>
														{{$get_contract->dealer->email}}
													</a>
												</li>
												<li class="contacts-block__item">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone">
														<path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
													</svg>
													+1 {{$get_contract->dealer->shop_contact}}
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-8 col-lg-6 col-md-7 col-sm-12 layout-top-spacing">
							<div class="row">
								<div class="col-lg-12 col-12 layout-spacing">
									<div class="statbox widget box box-shadow">
										<div class="widget-header">
											<div class="row">
												<div class="col-xl-8 col-md-8 col-sm-8 col-8">
													<h3>Contract Details</h3>
												</div>
                                                <div class="col-xl-2 col-md-2 col-sm-2 col-2">
                                                    <span class="shadow-none badge badge-primary "><a href="{{Url('customer/invoice_detail_page/'.$get_contract->id)}}" style="color:white">View Inoices</a>
												</div>
                                                <div class="col-xl-2 col-md-2 col-sm-2 col-2">
                                                    <span class="shadow-none badge badge-primary "><a href="{{url('customer/contract_pdf/'.$get_contract->id)}}" style="color:white">View Contract</a>
												</div>  

											</div>
										</div>
										<div class="ml-2 row">
											<div class="col-md-6">
												<span><strong style="color:black">Contract Type</strong>: {{$get_contract->contract_type->name}}</span>
											</div>
											<div class="col-md-6">
												<span><strong style="color:black">Started date</strong>: 
												@php
													$t=strtotime($get_contract->created_at);
													$start_date=date('m/d/Y',$t)
												@endphp
												{{$start_date}}
												</span>
											</div>
											<div class="col-md-6">
												<span><strong style="color:black">Amount</strong>: ${{$get_contract->amount}}</span>
											</div>
											<div class="col-md-6">
												<span><strong style="color:black">Duration (years) </strong>: {{$get_contract->total_years}}</span>
											</div>
											<div class="col-md-6">
												<span><strong style="color:black">Duration (month)</strong>: {{$get_contract->months}} </span>
											</div>
                                            <div class="col-md-6">
												<span><strong style="color:black">Amount pending </strong>:
												 ${{($get_contract->amount)-($get_contract->paid_amount)}}
												</span>
											</div>
											<div class="col-md-6">
												<span><strong style="color:black">Amount paid</strong>: ${{$get_contract->paid_amount}} </span>
											</div>
                                            

										</div>
									</div>
								</div>
								<div class="col-lg-12 col-12 ">
									<div class="statbox widget box box-shadow mb-4">
										<div class="widget-header">
											<div class="row">
												<div class="col-xl-12 col-md-12 col-sm-12 col-12">
													<h2>Add Documents</h2>
												</div>
											</div>
										</div>
										<div class="widget-content">
										<form action="{{url('customer/upload_contract_docs')}}" enctype="multipart/form-data" class="dropzone" id="dropzonewidget">
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row mb-5">
						<div class="col-lg-12 col-12" >
							<div class="widget-content widget-content-area br-6 ">
								<div class="widget-header ml-4 mt-2">
									<div class="row">
										<div class="col-xl-12 col-md-12 col-sm-12 col-12">
											<h2>Docs details</h2>
										</div>
									</div>
								</div>
								<table id="html5-extension" class="table table-hover non-hover" style="width:100%">
									<thead>
										<tr>
											<th>#</th>
											<th>Name</th>
										
											<th class="dt-no-sorting">Upload by</th>
											<th class="dt-no-sorting">Upload date</th>
										</tr>
									</thead>
									<tbody>
										@php
										$count=1;
										@endphp
										@if(count($get_contract->customer_docs) > 0)
											@foreach($get_contract->customer_docs as $docs)
											<tr>
												<td>{{$count}}</td>
												<td><a target="blank" href="{{asset('storage/app/'.$docs->document)}}">{{$docs->document}}</a></td>
												
												<td>
												<span class="shadow-none badge badge-primary ">{{Auth::guard('customer')->user()->name." [You]";}}
												</td>
												<td >
													@php
													$d=strtotime($docs->created_at);
													$formate=date('m-d-Y',$d);
													
													@endphp
													{{$formate}}
												</td>
											</tr>
											@php
											$count++;
											@endphp
											@endforeach
										@endif
										@if(count($get_contract->dealer_docs) > 0)
											@foreach($get_contract->dealer_docs as $docs)
											<tr>
												<td>{{$count}}</td>
												<td><a target="blank" href="{{asset('storage/app/'.$docs->document)}}">{{$docs->document}}</a></td>
												
												<td>
												<span class="shadow-none badge badge-primary ">{{$get_contract->	dealer->owner_name." [Dealer]";}}
												</td>
												<td >
													@php
													$d=strtotime($docs->created_at);
													$formate=date('m-d-Y',$d);
													
													@endphp
													{{$formate}}
												</td>
											</tr>
											@php
											$count++;
											@endphp
											@endforeach
										@endif
										
										
										@if(count($get_contract->employee_docs) > 0)
											@foreach($get_contract->employee_docs as $docs)
											<tr>
												<td>{{$count}}</td>
												<td><a target="blank" href="{{asset('storage/app/'.$docs->document)}}">{{$docs->document}}</a></td>
												
												<td>
												<span class="shadow-none badge badge-primary ">{{ "UIG";}}
												</td>
												<td >
													@php
													$d=strtotime($docs->created_at);
													$formate=date('m-d-Y',$d);
													
													@endphp
													{{$formate}}
												</td>
											</tr>
											@php
											$count++;
											@endphp
											@endforeach
										@endif
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				@include('customer.includes.footer')
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
		<script src="{{asset('public/plugins/font-icons/feather/feather.min.js')}}"></script>
		<script >
			feather.replace();
			
			
		</script>
		<script src="{{asset('public/plugins/highlight/highlight.pack.js')}}"></script>
		<script src="{{asset('public/assets/js/custom.js')}}"></script>
		<script src="{{asset('public/assets/js/scrollspyNav.js')}}"></script>
		<script src="{{asset('public/assetsss/plugins/dropzone/dist/dropzone.js')}}"></script>
		<script src="{{asset('public/plugins/table/datatable/datatables.js')}}"></script>
		<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>    <!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
		<script src="{{asset('public/plugins/table/datatable/button-ext/dataTables.buttons.min.js')}}"></script>
		<script src="{{asset('public/plugins/table/datatable/button-ext/jszip.min.js')}}"></script>    
		<script src="{{asset('public/plugins/table/datatable/button-ext/buttons.html5.min.js')}}"></script>
		<script src="{{asset('public/plugins/table/datatable/button-ext/buttons.print.min.js')}}"></script>
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
			$('#html8-extension').DataTable( {
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
			// var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");

			Dropzone.autoDiscover = false;
			var myDropzone = new Dropzone(".dropzone",{ 
					maxFilesize: 20, // 2 mb
					// acceptedFiles: ".jpeg,.jpg,.png,.pdf",
			});
			myDropzone.on("sending", function(file, xhr, formData) {
					formData.append("_token","{{ csrf_token() }}");
					formData.append("customer_id","{{Auth::guard('customer')->user()->id}}");
					formData.append("contract_id","{{$get_contract->id}}");
			}); 
			myDropzone.on("success", function(file, response) {

					if(response.success == 0){ // Error
						alert(response.error);
					}

			});
       </script>
	</body>
</html>