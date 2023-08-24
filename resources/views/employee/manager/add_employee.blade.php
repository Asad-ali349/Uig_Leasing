<!DOCTYPE html>
<html lang="en">
@include('employee.manager.includes.head')

    <link rel="stylesheet" type="text/css" href="{{asset('public/plugins/select2/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/signature_assets/css/jquery_signature.css')}}">
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
                                            <h2>Add employee</h2>
                                        </div>                                                                        
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <form action="{{url('employee/manager/submit_employee')}}" method="POST" enctype="multipart/form-data">
                                       
                                        <div class="form-row mb-4">
                                            @csrf
                                            <div class="form-group col-md-12">
                                                <h5>Personal Information</h5>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label >Full Name</label>
                                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" required>
                                            </div>
                                            <div class="form-group col-md-4" required>
                                             <label >Email</label>
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required>
                                            </div>
                                            <div class="form-group col-md-4" required>
                                             <label >SSN</label>
                                                <input type="text" class="form-control" id="ssn" name="ssn" placeholder="Enter SSN" required>
                                            </div>
                                            <div class="form-group col-md-4" required>
                                             <label >Telephone</label>
                                                <input type="text" class="form-control" id="telephone" name="telephone" placeholder="Enter Telephone" required>
                                            </div>
                                            <div class="form-group col-md-4" required>
                                             <label >Profile Pic</label>
                                                <input type="file" class="form-control-file" name="image"  required>
                                            </div>
                                            <div class="form-group col-md-4" required>
                                             <label >Select Role</label>
                                             <select class="form-control select2" name="role" id="role" required>
                                                    <option value="">Select Role for employee</option>
                                                    @foreach($roles as $role)
                                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <h5>Address Information</h5>
                                            </div>
                                            <div class="form-group col-md-8">
                                            <label>Street Address</label>
                                                <input type="text" class="form-control" id="employeestreet" name="employeestreet" placeholder="Enter Street Address" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>City</label>
                                                <input type="text" class="form-control" id="employeecity" name="employeecity" placeholder="Enter City" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>State</label>
                                                <input type="text" class="form-control" id="employeestate" name="employeestate" placeholder="Enter State" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Zip</label>
                                                <input type="text" class="form-control" id="employeezip" name="employeezip" placeholder="Enter Zip" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Country</label>
                                                <input type="text" class="form-control" id="employeecountry" name="employeecountry" placeholder="Enter Country" required>
                                            </div>
                                            
                                        </div>
                                   
                                        <center><button type="submit" name="submit" class="btn btn-success mt-3" >Add Employee</button></center>
                                    </form>
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
    <script  src="{{asset('public/signature_assets/js/jquery.signature.js')}}"></script>
    <script src="{{asset('public/plugins/input-mask/input-mask.js')}}"></script>
    <script src="{{asset('public/plugins/input-mask/jquery.inputmask.bundle.min.js')}}"></script>
    <script>
        $("#ssn").inputmask("999-99-9999");
        $("#telephone").inputmask("999-999-9999");
    </script>
    
</body>
</html>