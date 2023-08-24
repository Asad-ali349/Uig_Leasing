<!DOCTYPE html>
<html lang="en">
@include('employee.admin.includes.head')

    <link rel="stylesheet" type="text/css" href="{{asset('public/plugins/select2/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/signature_assets/css/jquery_signature.css')}}">
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
                        
                        <div class="col-lg-12 col-12 layout-spacing">
                            
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h2>Add Dealer </h2>
                                        </div>                                                                        
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <form action="" method="POST" >
                                       
                                        <div class="form-row mb-4">
                                             <!-- <div class="form-group col-md-12 mt-4">
                                                <h5>Ticket Details:</h5>
                                            </div> -->
                                            <div class="form-group col-md-4">
                                                <label >Company Name</label>
                                                <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter Company name" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Company Contact</label>
                                                <input type="text" class="form-control" id="shopcontact" name="shopcontact" placeholder="Enter Company Contact" required>
                                            </div>
                                            <div class="form-group col-md-4" required>
                                             <label >Shop logo</label>
                                                <input type="file" class="form-control-file" id="subject" name="subject"  required>
                                            </div>
                                            <div class="form-group col-md-4" required>
                                             <label >Dealer Name</label>
                                                <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter Dealer Name" required>
                                            </div>
                                            <div class="form-group col-md-4" required>
                                             <label >Email</label>
                                                <input type="email" class="form-control" id="subject" name="subject" placeholder="Enter Email" required>
                                            </div>
                                            <div class="form-group col-md-4" required>
                                             <label >EIN</label>
                                                <input type="password" class="form-control" id="subject" name="subject" placeholder="Enter EIN" required>
                                            </div>
                                            <div class="form-group col-md-8">
                                            <label>Street Address</label>
                                                <input type="text" class="form-control" id="dealerstreet" name="dealerstreet" placeholder="Enter Street Address" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>City</label>
                                                <input type="text" class="form-control" id="dealercity" name="dealercity" placeholder="Enter City" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>State</label>
                                                <input type="text" class="form-control" id="dealerstate" name="dealerstate" placeholder="Enter State" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Zip</label>
                                                <input type="text" class="form-control" id="dealerzip" name="dealerzip" placeholder="Enter Zip" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Country</label>
                                                <input type="text" class="form-control" id="dealercountry" name="dealercountry" placeholder="Enter Country" required>
                                            </div>
                                            <div class="form-group col-md-6" required>
                                             <label >Tax certificate</label>
                                                <input type="file" class="form-control-file" id="taxcertificate" name="taxcertificate" placeholder="Enter Subject" required>
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
                                        </div>
                                   
                                        <center><button type="submit" name="submit" class="btn btn-success mt-3" >Add Dealer</button></center>
                                    </form>
                                </div>
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
    <script  src="{{asset('public/signature_assets/js/jquery.signature.js')}}"></script>

    
</body>
</html>