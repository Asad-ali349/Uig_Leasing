<!DOCTYPE html>
<html lang="en">
@include('employee.admin.includes.head')
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

    @include('employee.admin.includes.topbar')

    

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

      
    @include('employee.admin.includes.navbar')
        
        
        <!--  BEGIN CONTENT PART content -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing mb-5">
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
                            <form action="" method="POST" >
                                <div id="circle-basic" class=""> 
                                    <h3>Customer Info</h3>
                                    <section>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-12">
                                                <h5>Personal Information</h5>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Customer Name</label>
                                                <input type="text" class="form-control" id="name" name="name"  placeholder="Enter Customer Name" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Email</label>
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Telephone</label>
                                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Telephone" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Home Telephone</label>
                                                <input type="text" class="form-control" id="phone" name="homephone" placeholder="Enter Home Telephone" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Date Of Birth</label>
                                                <input type="date" class="form-control" id="" name="dob" placeholder="Enter Dob" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label><label>SSN</label></label>
                                                <input type="password" class="form-control" id="ssn" name="ssn"  placeholder="Enter SSN " required>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>License Number</label>
                                                <input type="text" class="form-control" id="licenseNumber" name="licenseNumber" placeholder="Enter License Number" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>License Issue Date</label>
                                                <input type="date" class="form-control" id="licenseissuedate" name="licenseissuedate" placeholder="Enter License Issue Date" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>License Expiry Date</label>
                                                <input type="date" class="form-control" id="licenseexpirydate" name="licenseexpirydate" placeholder="Enter License Expiry Date" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>License Copy</label>
                                                <input type="file" class="form-control-file" id="licensecopy" name="licensecopy" >
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Customer Picture</label>
                                                <input type="file" class="form-control-file" id="cimg" name="cimg" >
                                            </div>
                                            <div class="form-group col-md-12" required>
                                                <div class="d-flex justify-content-between">
                                                    <label for="password">Signature</label>
                                                    
                                                </div>
                                                <div class="row" id="sig">
                                                                            
                                                    <div class="col-md-4" >
                                                        <center><canvas id="sig-canvas" width="300" height="160">
                                                            Get a better browser, bro.
                                                        </canvas></center>
                                                    </div>
                                                
                                                    <div class="col-md-12" style="display:none">
                                                        <input type="text" id="letterid" value="" >
                                                        <textarea id="sig-dataUrl" class="form-control" required name="sign" rows="5"></textarea>
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
                                                <input type="text" class="form-control" id="street" name="street" placeholder="Enter Street Address" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>City</label>
                                                <input type="text" class="form-control" id="city" name="city" placeholder="Enter City" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>State</label>
                                                <input type="text" class="form-control" id="state" name="state" placeholder="Enter State" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Zip</label>
                                                <input type="text" class="form-control" id="zip" name="zip" placeholder="Enter Zip" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Country</label>
                                                <input type="text" class="form-control" id="country" name="country" placeholder="Enter Country" required>
                                            </div>


                                            <div class="form-group col-md-4">
                                            <label>Home Type</label>
                                                <select class="form-control select2" name="Paymentmethod" >
                                                    <option class="" value="">Select Home Type</option>
                                                    <option class="" value="rental">Rental</option>
                                                    <option class="" value="own">Own</option>
                                                </select>
                                            </div>
                                            
                                            
                                        </div>
                                    </section>
                                    <h3>Customer Bank Info</h3>
                                    <section>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-12">
                                                <h5>Bank Information</h5>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Bank Name</label>
                                                <input type="text" class="form-control" id="bankname" name="bankname"  placeholder="Enter Bank Name" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Bank Phone</label>
                                                <input type="text" class="form-control" id="bankphone" name="bankphone" placeholder="Enter Bank Telephone" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Bank Routing</label>
                                                <input type="text" class="form-control" id="" name="bankrout" placeholder="Enter Bank Routing" required>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <h5>Account Information</h5>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Account Type</label>
                                                <select class="form-control select2" name="Paymentmethod" >
                                                    <option class="" value="">Select Account Type</option>
                                                    <option class="" value="checking">Checking</option>
                                                    <option class="" value="saving">Saving</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Account Number</label>
                                                <input type="text" class="form-control" id="accountnumber" name="accountnumber"  placeholder="Enter Account Number " required>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Account Opening Date</label>
                                                <input type="month" class="form-control" id="accountissuedate" name="accountissuedate" placeholder="Enter Account Issue Date" required>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <h5>Card Information</h5>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Card Type</label>
                                            <select class="form-control select2" name="Paymentmethod" >
                                                    <option class="" value="">Select Card Type</option>
                                                    <option class="" value="visa">Visa</option>
                                                    <option class="" value="master card">Master Card</option>
                                                    <option class="" value="amex">Amex</option>
                                                    <option class="" value="discover">Discover</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Card Number</label>
                                                <input type="text" class="form-control" id="cardnumber" name="cardnumber" placeholder="Enter Card Number" required>
                                            </div>

                                            <div class="form-group col-md-4">
                                            <label>Card Expiry Date</label>
                                                <input type="month" class="form-control" id="cardexpiry" name="cardexpiry" placeholder="Enter Card Expiry Date" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Card CVV</label>
                                                <input type="password" class="form-control" id="cardccv" name="zipcardccv" placeholder="Enter Card CVV" required>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <h5>Address Information</h5>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>City</label>
                                                <input type="text" class="form-control" id="bankcity" name="bankcity" placeholder="Enter City" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>State</label>
                                                <input type="text" class="form-control" id="bankstate" name="bankstate" placeholder="Enter State" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Zip</label>
                                                <input type="text" class="form-control" id="bankzip" name="bankzip" placeholder="Enter Zip" required>
                                            </div>
                                            
                                        </div>
                                    </section>
                                    <h3>Customer Relative info</h3>
                                    <section>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-12">
                                                <h5>Relative 1</h5>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Relative Name</label>
                                                <input type="text" class="form-control" id="relative1name" name="relative1name" required placeholder="Enter Relative Name" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Telephone</label>
                                                <input type="text" class="form-control" id="relative1contact" name="relative1contact" required placeholder="Enter Relative Telephone" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Relation</label>
                                                <input type="text" class="form-control" id="relation1" name="relation1" placeholder="Enter Relationship" required>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <h5>Address Information</h5>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>City</label>
                                                <input type="text" class="form-control" id="relative1city" name="relative1city" placeholder="Enter City" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>State</label>
                                                <input type="text" class="form-control" id="relative1state" name="relative1state" placeholder="Enter State" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Zip</label>
                                                <input type="text" class="form-control" id="relative1zip" name="relative1zip" placeholder="Enter Zip" required>
                                            </div>
                                            
                                            
                                            <div class="form-group col-md-12">
                                                <h5>Relative 2</h5>
                                            </div>

                                            <div class="form-group col-md-4">
                                            <label>Relative Name</label>
                                                <input type="text" class="form-control" id="relative2name" name="relative2name" required placeholder="Enter Relative Name" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Telephone</label>
                                                <input type="text" class="form-control" id="relative2contact" name="relative2contact" required placeholder="Enter Relative Telephone" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Relation</label>
                                                <input type="text" class="form-control" id="relation2" name="relation2" placeholder="Enter Relationship" required>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <h5>Address Information</h5>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>City</label>
                                                <input type="text" class="form-control" id="relative2city" name="relative2city" placeholder="Enter City" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>State</label>
                                                <input type="text" class="form-control" id="relative2state" name="relative2state" placeholder="Enter State" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Zip</label>
                                                <input type="text" class="form-control" id="relative2zip" name="relative2zip" placeholder="Enter Zip" required>
                                            </div>
                                        </div>
                                    </section>
                                    <h3>Source of Income</h3>
                                    <section>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-12">
                                                <h5>General Information</h5>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Employer Name</label>
                                                <input type="text" class="form-control" id="employername" name="employername" required placeholder="Enter Employer Name" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Telephone</label>
                                                <input type="text" class="form-control" id="employercontact" name="employercontact" required placeholder="Enter Relative Telephone" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>City</label>
                                                <input type="text" class="form-control" id="employercity" name="employercity" placeholder="Enter City" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>State</label>
                                                <input type="text" class="form-control" id="employerstate" name="employerstate" placeholder="Enter State" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Zip</label>
                                                <input type="text" class="form-control" id="employerzip" name="employerzip" placeholder="Enter Zip" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Profession</label>
                                                <input type="text" class="form-control" id="profession" name="profession" placeholder="Enter Profession" required>
                                            </div>
                                            
                                            <div class="form-group col-md-4">
                                            <label>Joining Date</label>
                                                <input type="date" class="form-control" id="joindate" name="joindate" placeholder="Enter Join Date" required>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <h5>Salary Information</h5>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Direct Deposit</label>
                                                <select class="form-control select2" name="directdeposit" >
                                                    <option class="" value="">Direct Deposit</option>
                                                    <option class="" value="1">Yes</option>
                                                    <option class="" value="0">No</option>
                                                </select>
                                            </div>    

                                            <div class="form-group col-md-4">
                                            <label>Income</label>
                                                <input type="text" class="form-control" id="" name="income" placeholder="Enter Income" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Last Pay Date</label>
                                                <input type="date" class="form-control" id="" name="lastpaydate" placeholder="Enter Last Pay Date" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Next Pay Date</label>
                                                <input type="date" class="form-control" id="" name="nextpaydate" placeholder="Enter Next Pay Date" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Income Method</label>
                                                <select class="form-control select2" name="incomemethod" >
                                                    <option class="" value="">Select Income method</option>
                                                    <option class="" value="Weekly">Weekly</option>
                                                    <option class="" value="Bi Weekly">Bi Weekly</option>
                                                    <option class="" value="Monthly">Monthly</option>
                                                </select>
                                            </div>

                                        </div>
                                    </section>
                                </div>
                            </div>
                        </form>     
                    </div>
                </div>    
            </div>
            @include('employee.admin.includes.footer')

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
    
    <script src="{{asset('public/plugins/jquery-step/jquery.steps.min.js')}}"></script>
    <script src="{{asset('public/plugins/jquery-step/custom-jquery.steps.js')}}"></script>
    
    <script  src="{{asset('public/signature_assets/js/jquery.signature.js')}}"></script>
    <script src="{{asset('public/plugins/input-mask/input-mask.js')}}"></script>
    <script src="{{asset('public/plugins/input-mask/jquery.inputmask.bundle.min.js')}}"></script>
    <script>
        $("#ssn").inputmask("999-99-9999");
        $("#relative1contact").inputmask("999-999-9999");
        $("#relative2contact").inputmask("999-999-9999");
    </script>
</body>
</html>