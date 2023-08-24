<!DOCTYPE html>
<html lang="en">
@include('dealer.includes.head')
    <link rel="stylesheet" type="text/css" href="{{asset('public/plugins/jquery-step/jquery.steps.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/plugins/select2/select2.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('public/plugins/font-icons/fontawesome/css/fontawesome.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/signature_assets/css/jquery_signature.css')}}">
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

    @include('dealer.includes.topbar')

    

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

      
    @include('dealer.includes.navbar')
        
        
        <!--  BEGIN CONTENT PART content -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing mb-5">
            @if(session('success_msg'))
                    <div class="alert alert-success mt-2 " role="alert" id="alert">           
                        <strong>Success! </strong>{{session('success_msg')}}
                    </div> 
                @endif
                @if(session('error_msg'))
                    <div class="alert alert-danger mt-2 " role="alert" id="alert">           
                        <strong>Error! </strong>{{session('error_msg')}}
                    </div> 
                @endif
                <div class="col-lg-12 layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>Add Customer</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <form action="{{url('dealer/submit_customer')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div id="circle-basic" class="">
                                     
                                    <h3>Customer Info</h3>
                                    <section>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-12">
                                                <h5>Personal Information</h5>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Customer Name</label>
                                                <input type="text" class="form-control" id="name" name="name"  placeholder="Enter Customer Name"  >
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Email</label>
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email"  >
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Telephone</label>
                                                <input type="text" class="form-control telephone" id="phone" name="phone" placeholder="Enter Telephone"  >
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Home Telephone</label>
                                                <input type="text" class="form-control telephone" id="homephone" name="homephone" placeholder="Enter Home Telephone"  >
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Date Of Birth</label>
                                                <input type="date" class="form-control" id="dob" name="dob" placeholder="Enter Dob"  >
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>SSN</label>
                                                <div class="input-group">
                                                    <input type="password" class="form-control" placeholder="Enter SSN" aria-label="notification" aria-describedby="basic-addon2" name="ssn" id="ssn">
                                                    <!-- <div class="input-group-append"> -->
                                                    <a onclick="changeType()">    
                                                        <span class="input-group-text" style="padding:12px"><svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></span>
                                                    </a>    
                                                    <!-- </div> -->
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>License Number</label>
                                                <input type="text" class="form-control" id="licenseNumber" name="licenseNumber" placeholder="Enter License Number"  >
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>License Issue Date</label>
                                                <input type="date" class="form-control" id="licenseissuedate" name="licenseissuedate" placeholder="Enter License Issue Date"  >
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>License Expiry Date</label>
                                                <input type="date" class="form-control" id="licenseexpirydate" name="licenseexpirydate" placeholder="Enter License Expiry Date"  >
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>License Copy</label>
                                                <input type="file" class="form-control-file" id="licensecopy" name="licensecopy" >
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Customer Picture</label>
                                                <input type="file" class="form-control-file" id="cimg" name="cimg" >
                                            </div>

                                            <div class="form-group col-md-12"   >
                                                <div class="d-flex justify-content-between">
                                                    <label for="">Signature</label>
                                                    
                                                </div>
                                                <div class="row" id="sig">
                                                                            
                                                    <div class="col-md-4" >
                                                        <center><canvas id="sig-canvas" width="300" height="160">
                                                            Get a better browser, bro.
                                                        </canvas></center>
                                                    </div>
                                                
                                                    <div class="col-md-12" style="display:none">
                                                        <input type="text" id="letterid" value="" >
                                                        <textarea id="sig-dataUrl" class="form-control"    name="sign" rows="5"></textarea>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="row ml-1">
                                                            <div class="col-md-11 mt-3">
                                                                <button type="button" class="btn btn-success"  id="sig-submitBtn">Save</button>
                                                            </div>
                                                            <div class="col-md-11 mt-3">
                                                                <button type="button" class="btn btn-default" id="sig-clearBtn">Clear</button>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <center><img id="sig-image" style="display: none" src="" alt="Your signature will go here!"/></center>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-group col-md-12">
                                                <h5>Adress Information</h5>
                                            </div>
                                            <div class="form-group col-md-8">
                                            <label>Street Address</label>
                                                <input type="text" class="form-control" id="street" name="street" placeholder="Enter Street Address"  >
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>City</label>
                                                <input type="text" class="form-control" id="city" name="city" placeholder="Enter City"  >
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>State</label>
                                                <input type="text" class="form-control" id="state" name="state" placeholder="Enter State"  >
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Zip</label>
                                                <input type="text" class="form-control" id="zip" name="zip" placeholder="Enter Zip"  >
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Country</label>
                                                <input type="text" class="form-control" id="country" name="country" placeholder="Enter Country"  >
                                            </div>


                                            <div class="form-group col-md-4">
                                            <label>Home Type</label>
                                                <select class="form-control select2" name="homeType" id="homeType">
                                                    <option class="" value="">Select Home Type</option>
                                                    <option class="" value="0">Rental</option>
                                                    <option class="" value="1">Own</option>
                                                </select>
                                            </div>
                                            
                                        </div>
                                        <span style="color:red" id="error2"></span>
                                    </section>
                                    <h3>Customer Bank Info</h3>
                                    <section>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-12">
                                                <h5>Bank Information</h5>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Bank Name</label>
                                                <input type="text" class="form-control" id="bankname" name="bankname"  placeholder="Enter Bank Name"  >
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Bank Telephone</label>
                                                <input type="text" class="form-control telephone" id="bankphone" name="bankphone" placeholder="Enter Bank Telephone"  >
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Bank Routing</label>
                                                <input type="number" class="form-control" id="bankrout" name="bankrout" placeholder="Enter Bank Routing"  >
                                            </div>

                                            <div class="form-group col-md-12">
                                                <h5>Account Information</h5>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Account Type</label>
                                                <select class="form-control select2" name="accountType" id="accountType">
                                                    <option class="" value="">Select Account Type</option>
                                                    <option class="" value="checking">Checking</option>
                                                    <option class="" value="saving">Saving</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Account Number</label>
                                                <input type="text" class="form-control" id="accountnumber" name="accountnumber"  placeholder="Enter Account Number "  >
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Account Open Date</label>
                                                <input type="month" class="form-control" id="accountissuedate" name="accountissuedate" placeholder="Enter Account Issue Date"  >
                                            </div>
                                            <div class="form-group col-md-12">
                                                <h5>Card Information</h5>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Card Type</label>
                                            <select class="form-control select2" name="cardType" id="cardType" >
                                                    <option class="" value="">Select Card Type</option>
                                                    <option class="" value="visa">Visa</option>
                                                    <option class="" value="master card">Master Card</option>
                                                    <option class="" value="amex">Amex</option>
                                                    <option class="" value="discover">Discover</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Card Number</label>
                                                <input type="text" class="form-control" id="cardnumber" name="cardnumber" placeholder="Enter Card Number"  >
                                            </div>

                                            <div class="form-group col-md-4">
                                            <label>Card Expiry Date</label>
                                                <input type="month" class="form-control" id="cardexpiry" name="cardexpiry" placeholder="Enter Card Expiry Date"  >
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Card CVV</label>
                                                <input type="password" class="form-control" id="cardccv" name="cardccv" placeholder="Enter Card CVV"  >
                                            </div>
                                            <div class="form-group col-md-12">
                                                <h5>Address Information</h5>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>City</label>
                                                <input type="text" class="form-control" id="bankcity" name="bankcity" placeholder="Enter City"  >
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>State</label>
                                                <input type="text" class="form-control" id="bankstate" name="bankstate" placeholder="Enter State"  >
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Zip</label>
                                                <input type="text" class="form-control" id="bankzip" name="bankzip" placeholder="Enter Zip"  >
                                            </div>
                                            
                                        </div>
                                        <span style="color:red" id="error3"></span>
                                    </section>
                                    <h3>Customer Relative info</h3>
                                    <section>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-12">
                                                <h5>Relative 1</h5>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Relative Name</label>
                                                <input type="text" class="form-control" id="relative1name" name="relative1name"   placeholder="Enter Relative Name"  >
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Telephone</label>
                                                <input type="text" class="form-control" id="relative1contact" name="relative1contact"   placeholder="Enter Relative Telephone"  >
                                            </div>
                                            
                                            <div class="form-group col-md-4">
                                            <label>Relation</label>
                                                <input type="text" class="form-control" id="relation1" name="relation1" placeholder="Enter Relationship"  >
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>City</label>
                                                <input type="text" class="form-control" id="relative1city" name="relative1city" placeholder="Enter City"  >
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>State</label>
                                                <input type="text" class="form-control" id="relative1state" name="relative1state" placeholder="Enter State"  >
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Zip</label>
                                                <input type="text" class="form-control" id="relative1zip" name="relative1zip" placeholder="Enter Zip"  >
                                            </div>
                                            
                                            <div class="form-group col-md-12">
                                                <h5>Relative 2</h5>
                                            </div>

                                            <div class="form-group col-md-4">
                                            <label>Relative Name</label>
                                                <input type="text" class="form-control" id="relative2name" name="relative2name"   placeholder="Enter Relative Name"  >
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Telephone</label>
                                                <input type="text" class="form-control" id="relative2contact" name="relative2contact"   placeholder="Enter Relative Telephone"  >
                                            </div>
                                            
                                            <div class="form-group col-md-4">
                                            <label>Relation</label>
                                                <input type="text" class="form-control" id="relation2" name="relation2" placeholder="Enter Relationship"  >
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>City</label>
                                                <input type="text" class="form-control" id="relative2city" name="relative2city" placeholder="Enter City"  >
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>State</label>
                                                <input type="text" class="form-control" id="relative2state" name="relative2state" placeholder="Enter State"  >
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Zip</label>
                                                <input type="text" class="form-control" id="relative2zip" name="relative2zip" placeholder="Enter Zip"  >
                                            </div>
                                        </div>
                                        <span style="color:red" id="error4"></span>
                                    </section>
                                    <h3>Source of Income</h3>
                                    <section>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-12">
                                                <h5>Basic Information</h5>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Employer Name</label>
                                                <input type="text" class="form-control" id="employername" name="employername"   placeholder="Enter Employer Name"  >
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Telephone</label>
                                                <input type="text" class="form-control telephone" id="employercontact" name="employercontact"   placeholder="Enter Relative Telephone"  >
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>City</label>
                                                <input type="text" class="form-control" id="employercity" name="employercity" placeholder="Enter City"  >
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>State</label>
                                                <input type="text" class="form-control" id="employerstate" name="employerstate" placeholder="Enter State"  >
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Zip</label>
                                                <input type="text" class="form-control" id="employerzip" name="employerzip" placeholder="Enter Zip"  >
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Profession</label>
                                                <input type="text" class="form-control" id="profession" name="profession" placeholder="Enter Profession"  >
                                            </div>
                                            
                                            <div class="form-group col-md-4">
                                            <label>Joining Date</label>
                                                <input type="date" class="form-control" id="joindate" name="joindate" placeholder="Enter Join Date"  >
                                            </div>
                                            <div class="form-group col-md-12">
                                                <h5>Salary Information</h5>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Direct Deposit</label>
                                                <select class="form-control select2" name="directdeposit" id="directdeposit">
                                                    <option class="" value="">Direct Deposit</option>
                                                    <option class="" value="1">Yes</option>
                                                    <option class="" value="0">No</option>
                                                </select>
                                            </div>    

                                            <div class="form-group col-md-4">
                                            <label>Income</label>
                                                <input type="text" class="form-control" id="income" name="income" placeholder="Enter Income"  >
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Last Pay Date</label>
                                                <input type="date" class="form-control" id="lastpaydate" name="lastpaydate" placeholder="Enter Last Pay Date"  >
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Next Pay Date</label>
                                                <input type="date" class="form-control" id="nextpaydate" name="nextpaydate" placeholder="Enter Next Pay Date"  >
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Income Method</label>
                                                <select class="form-control select2" name="incomemethod" id="incomemethod">
                                                    <option class="" value="">Select Income method</option>
                                                    <option class="" value="Weekly">Weekly</option>
                                                    <option class="" value="Bi Weekly">Bi Weekly</option>
                                                    <option class="" value="Monthly">Monthly</option>
                                                </select>
                                            </div>

                                        </div>
                                        <span style="color:red" id="error5"></span>
                                    </section>
                                    
                                </div>
                            </div>
                        </form>     
                    </div>
                </div>    
            </div>
            @include('dealer.includes.footer')

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
   
    <script src="{{asset('public/plugins/highlight/highlight.pack.js')}}"></script>
    <script src="{{asset('public/assets/js/custom.js')}}"></script>
    <script src="{{asset('public/assets/js/scrollspyNav.js')}}"></script>
    
    <script src="{{asset('public/plugins/jquery-step/jquery.stepss.min.js')}}"></script>
    
    <script src="{{asset('public/plugins/jquery-step/custom-jquery.steps.js')}}"></script>
    <script src="{{asset('public/plugins/input-mask/input-mask.js')}}"></script>
    <script src="{{asset('public/plugins/input-mask/jquery.inputmask.bundle.min.js')}}"></script>
    <script  src="{{asset('public/signature_assets/js/jquery.signature.js')}}"></script>
    <script>
        $("#ssn").inputmask("999-99-9999");
        $("#relative1contact").inputmask("999-999-9999");
        $("#relative2contact").inputmask("999-999-9999");
        $(".telephone").inputmask("999-999-9999");

        function changeType(){
            var x = document.getElementById("ssn");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
    
</body>
</html>