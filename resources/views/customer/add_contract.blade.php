<!DOCTYPE html>
<html lang="en">
@include('customer.includes.head')
    <link rel="stylesheet" type="text/css" href="{{asset('public/plugins/jquery-step/jquery.steps.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/plugins/select2/select2.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('public/plugins/font-icons/fontawesome/css/fontawesome.css')}}">
    <style>
        #formValidate .wizard > .content {min-height: 25em;}
        #example-vertical.wizard > .content {min-height: 24.5em;}
    </style>
<body>
    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div>
</div></div>
    <!--  END LOADER -->

    @include('customer.includes.topbar')

    

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

      
    @include('customer.includes.navbar')
        
        
        <!--  BEGIN CONTENT PART content -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing mb-5">
                <div class="col-lg-12 layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>Add Contract</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <form action="{{url('customer/submit_contract')}}" method="POST" >
                                <div id="circle-basic" class="">
                                <h3>Contract info</h3>
                                    <section>
                                        @csrf
                                        <div class="form-row mb-4">
                                            
                                            <input type="hidden" class="form-control" id="profilestatus" value="{{$profile_status}}" required>
                                            
                                            <div class="form-group col-md-4">
                                                <label>Contract Type</label>
                                                <select class="form-control select2" name="contracttype"  id="contracttype">
                                                    <option class="" value="">Select Contract Type</option>
                                                    @foreach($contract_type as $type)
                                                        <option class="" value="{{$type->id}}">{{$type->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Payment Method</label>
                                                <select class="form-control select2" name="Paymentmethod" id="Paymentmethod">
                                                    <option class="" value="">Select Payment Method</option>
                                                    <option class="" value="Weekly">Weekly</option>
                                                    <option class="" value="Bi weekly">Bi weekly</option>
                                                    <option class="" value="Monthly">Monthly</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Contract Duration(in year)</label>
                                                <select class="form-control select2" name="contractyear" id="contractyear">
                                                    <option class="" value="">Select Number of years</option>
                                                    <option class="" value="1">1</option>
                                                    <option class="" value="2">2</option>
                                                    <option class="" value="3">3</option>
                                                    <option class="" value="4">4</option>
                                                    <option class="" value="5">5</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Dealers</label>
                                                <select class="form-control select2" name="dealer" id="dealer">
                                                    <option class="" value="">Select Dealer</option>
                                                    @foreach($dealers as $dealer)
                                                        <option class="" value="{{$dealer->id}}">{{$dealer->owner_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label >Invoice Number</label>
                                                <input type="text" class="form-control" id="invoice" name="invoice" placeholder="Enter Invoice number" >
                                            </div>
                                            
                                        </div>
                                        <span style="color:red" id="error"></span>
                                    </section>   
                                    
                                    
                                    <h3>Product Information</h3>
                                    <section>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <h5>Product information</h5>    
                                            </div>
                                            <div class="form-group col-md-6">
                                                <button class="btn btn-primary" onclick="addproduct()" style="float:right"> Add Product</button>    
                                            </div>
                                        </div>
                                        <div id="body">
                                            <div class="form-row mb-4">
                                                <div class="form-group col-md-12">
                                                    <h5>Product 1</h5>
                                                    
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label >Product Name</label>
                                                    <input type="text" class="form-control" id="" name="productname[]" placeholder="Enter Product Name" >
                                                </div>
                                                <div class="form-group col-md-4">
                                                <label >Product Price</label>
                                                    <input type="number" class="form-control" id="" name="productprice[]" placeholder="Enter Price" >
                                                </div>
                                                <div class="form-group col-md-4">
                                                <label >Product quantity</label>
                                                    <input type="number" class="form-control" id="" name="productquantity[]" placeholder="Enter Quantity" >
                                                </div>
                                                
                                                <div class="form-group col-md-12">
                                                <label >Product Description</label>
                                                    <textarea name="productdescription[]" class="form-control" cols="30" id="" rows="10"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                          
                                    </section>
                                </div>
                            </div>
                        </form>     
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script >
       
        $(document).ready(function() {
            $('.select2').select2();
        });
        
        setTimeout(()=> {
            $('#alert').hide('slow')
        }, 5000)
       
    </script>
    <script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
        
        <script>
            ClassicEditor.create( document.querySelector( '#editor' ) )
                .catch( error => {
                    console.error( error );
                } );
        </script>
    <script>
            var count=2
        function addproduct(){
            additionalhtml='<div class="form-row mb-4" id="'+count+'">'+
                                '<div class="form-group col-md-12">'+
                                    '<h5><a  onclick="deleterow('+count+')"><i class="fa fa-times-circle" style="color: red; font-size: 20px;" aria-hidden="true"></i></a> &nbsp;&nbsp;Product '+count +' </h5>'+
                                '</div>'+             
                                '<div class="form-group col-md-4" >'+
                                    '<label >Product Name</label>'+
                                    '<input type="text" class="form-control" id="" name="productname[]" placeholder="Enter Product Name" >'+
                                '</div>'+
                                '<div class="form-group col-md-4">'+
                                '<label >Product Price</label>'+
                                    '<input type="number" class="form-control" id="" name="productprice[]" placeholder="Enter Price" required>'+
                                '</div>'+
                                '<div class="form-group col-md-4">'+
                                '<label >Product quantity</label>'+
                                    '<input type="number" class="form-control" id="" name="productquantity[]" placeholder="Enter Quantity" >'+
                                '</div>'+
                                '<div class="form-group col-md-12">'+
                                '<label >Product Description</label>'+
                                    '<textarea name="productdescription[]" class="form-control" id="" cols="30" rows="10"></textarea>'+
                                '</div>'+
                            '</div>';
                            count++;
                
            $("#body").append(additionalhtml);
            


        }

        function deleterow(id){
        
            $('#'+id).remove()
        
        }
    </script>
    <script src="{{asset('public/plugins/highlight/highlight.pack.js')}}"></script>
    <script src="{{asset('public/assets/js/custom.js')}}"></script>
    <script src="{{asset('public/assets/js/scrollspyNav.js')}}"></script>
    <script src="{{asset('public/plugins/jquery-step/jquery.stepssss.min.js')}}"></script>
    <script src="{{asset('public/plugins/jquery-step/custom-jquery.steps.js')}}"></script>
    
    
</body>
</html>