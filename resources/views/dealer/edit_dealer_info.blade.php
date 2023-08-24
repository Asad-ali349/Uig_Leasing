<!DOCTYPE html>
<html lang="en">
@include('dealer.includes.head')

    <link rel="stylesheet" type="text/css" href="{{asset('public/plugins/select2/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/signature_assets/css/jquery_signature.css')}}">
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
                        <div class="col-lg-12 col-12 layout-spacing">
                            
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h2>Edit Dealer Info</h2>
                                        </div>                                                                        
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <form action="{{url('dealer/update_dealer')}}" method="POST" enctype="multipart/form-data" >
                                       @csrf
                                        <div class="form-row mb-4">
                                             <!-- <div class="form-group col-md-12 mt-4">
                                                <h5>Ticket Details:</h5>
                                            </div> -->
                                            <div class="form-group col-md-4">
                                                <label >Company Name</label>
                                                <input type="text" class="form-control" id="subject" name="companyname" placeholder="Enter Company name" value="{{$user->shop_name}}" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Company Telephone</label>
                                                <input type="text" class="form-control" id="comptelephone" name="companycontact" placeholder="Enter Company Telephone" value="{{$user->shop_contact}}" required>
                                            </div>
                                            <div class="form-group col-md-4" required>
                                             <label >Shop logo</label>
                                                <input type="file" class="form-control-file"   name="companylogo"  >
                                            </div>
                                            <div class="form-group col-md-4" required>
                                             <label >Dealer Name</label>
                                                <input type="text" class="form-control" name="dealername" placeholder="Enter Dealer Name" value="{{$user->owner_name}}" required>
                                            </div>
                                            <div class="form-group col-md-4" required>
                                             <label >Email</label>
                                                <input type="email" class="form-control" name="dealeremail" placeholder="Enter Email" value="{{$user->email }}" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>EIN</label>
                                                <div class="input-group">
                                                    <input type="password" class="form-control" placeholder="Enter Ein" aria-label="notification" value="{{$user->ein}}" aria-describedby="basic-addon2" name="ein" id="ein">
                                                    <!-- <div class="input-group-append"> -->
                                                    <a onclick="changeType()">    
                                                        <span class="input-group-text" style="padding:12px"><svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></span>
                                                    </a>    
                                                    <!-- </div> -->
                                                </div>
                                            </div>
                                            <div class="form-group col-md-8">
                                            <label>Street Address</label>
                                                <input type="text" class="form-control" id="dealerstreet" name="dealerstreet" value="{{$user->shop_address}}" placeholder="Enter Street Address" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>City</label>
                                                <input type="text" class="form-control" id="dealercity" name="dealercity" value="{{$user->shop_city}}" placeholder="Enter City" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>State</label>
                                                <input type="text" class="form-control" id="dealerstate" name="dealerstate" value="{{$user->shop_state}}" placeholder="Enter State" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Zip</label>
                                                <input type="text" value="{{$user->shop_zip}}" class="form-control" id="dealerzip" name="dealerzip" placeholder="Enter Zip" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Country</label>
                                                <input type="text" value="{{$user->shop_country}}" class="form-control" id="dealercountry" name="dealercountry" placeholder="Enter Country" required>
                                            </div>
                                            <div class="form-group col-md-6" required>
                                             <label >Tax certificate</label>
                                                <input type="file" class="form-control-file" id="taxcertificate" name="taxcertificate" placeholder="Enter certificate" >
                                            </div>
                                            <div class="form-group col-md-6" required>
                                                <div class="d-flex justify-content-between">
                                                    <label for="password">Signature</label>
                                                    
                                                </div>
                                                <div class="row" id="sig">
                                                                            
                                                    <div class="col-md-8 " >
                                                        <center><canvas id="sig-canvas" width="300" height="160">
                                                            Get a better browser, bro.
                                                        </canvas></center>
                                                    </div>
                                                
                                                    <div class="col-md-12" style="display:none">
                                                        <input type="text" id="letterid" value="" >
                                                        <textarea id="sig-dataUrl" class="form-control"  name="sign" rows="5"></textarea>
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
                                            <div class=" col-lg-12 col-md-12 col-sm-12 col-12">
                                                <h4>Bank Information:</h4>
                                            </div>
                                            <div class="form-group col-md-4" required>
                                             <label >Bank Name</label>
                                                <input type="text" class="form-control" name="bank_name" placeholder="Enter Bank Name" value="{{$user->bank != null ? $user->bank->bank_name : ''}}" required>
                                            </div>
                                            <div class="form-group col-md-4" required>
                                             <label >Account Type</label>
                                                <select class="form-control select2" name="account_type" id="account_type" required>
                                                    <option class="" value="">Select Account Type</option>
                                                    @if($user->bank != null ? $user->bank->account_type : ''=='checking')
                                                    <option class="" value="checking" selected>Checking</option>
                                                    <option class="" value="saving">Saving</option>
                                                    @elseif($user->bank != null ? $user->bank->account_type : ''=='saving')
                                                    <option class="" value="checking">Checking</option>
                                                    <option class="" value="saving" selected>Saving</option>
                                                    @else
                                                    <option class="" value="checking">Checking</option>
                                                    <option class="" value="saving">Saving</option>

                                                    @endif
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4" required>
                                             <label >Account Number</label>
                                                <input type="text" class="form-control" id="account_number" name="account_number" placeholder="Enter Account Number" value="{{$user->bank != null ? $user->bank->account_number : ''}}" required>
                                            </div>
                                            <div class="form-group col-md-4" required>
                                                <label >Card Type</label>
                                                <select class="form-control select2" name="card_type" id="card_type" required>
                                                <option class="" value="">Select Card Type</option>
                                                @if($user->bank != null ? $user->bank->card_type : ''=='visa')
                                                <option class="" value="visa" selected>Visa</option>
                                                <option class="" value="master card">Master Card</option>
                                                <option class="" value="amex">Amex</option>
                                                <option class="" value="discover">Discover</option>
                                                @elseif($user->bank != null ? $user->bank->card_type : ''=='master card')
                                                <option class="" value="visa" >Visa</option>
                                                <option class="" value="master card" selected>Master Card</option>
                                                <option class="" value="amex">Amex</option>
                                                <option class="" value="discover">Discover</option>
                                                @elseif($user->bank != null ? $user->bank->card_type : ''=='Amex')
                                                <option class="" value="visa" >Visa</option>
                                                <option class="" value="master card">Master Card</option>
                                                <option class="" value="amex" selected>Amex</option>
                                                <option class="" value="discover">Discover</option>
                                                @elseif($user->bank != null ? $user->bank->card_type : ''=='visa')
                                                <option class="" value="visa" >Visa</option>
                                                <option class="" value="master card">Master Card</option>
                                                <option class="" value="amex">Amex</option>
                                                <option class="" value="discover" selected>Discover</option>
                                                @else
                                                <option class="" value="visa" >Visa</option>
                                                <option class="" value="master card">Master Card</option>
                                                <option class="" value="amex">Amex</option>
                                                <option class="" value="discover">Discover</option>
                                                @endif
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4" required>
                                             <label >Card Number</label>
                                                <input type="text" class="form-control" name="card_number" placeholder="Enter Card Number" value="{{$user->bank != null ? $user->bank->card_number : ''}}" required>
                                            </div>
                                            <div class="form-group col-md-4" required>
                                             <label >Card Expiry</label>
                                                <input type="date" class="form-control" id="card_expiry" name="card_expiry" placeholder="Enter Card Expiry" value="{{$user->bank != null ? $user->bank->card_expiry : ''}}" required>
                                            </div>
                                        </div>
                                   
                                        <center><button type="submit" name="submit" class="btn btn-success mt-3" >Update Dealer</button></center>
                                    </form>
                                </div>
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
    <script src="{{asset('public/plugins/highlight/highlight.pack.js')}}"></script>
    <script src="{{asset('public/assets/js/custom.js')}}"></script>
    <script src="{{asset('public/assets/js/scrollspyNav.js')}}"></script>
    <script  src="{{asset('public/signature_assets/js/jquery.signature.js')}}"></script>

    <script src="{{asset('public/plugins/input-mask/input-mask.js')}}"></script>
    <script src="{{asset('public/plugins/input-mask/jquery.inputmask.bundle.min.js')}}"></script>
    <script>
        $("#ein").inputmask("99-9999999");
        $("#comptelephone").inputmask("999-999-9999");
        function changeType(){
            var x = document.getElementById("ein");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</body>
</html>