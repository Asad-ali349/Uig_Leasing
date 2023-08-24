<!DOCTYPE html>
<html lang="en">
@include('employee.admin.includes.head')

    <link rel="stylesheet" type="text/css" href="{{asset('public/plugins/select2/select2.min.css')}}">
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
                                            <h2>Create Ticket</h2>
                                        </div>                                                                        
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <form action="" method="POST" >
                                       
                                        <div class="form-row mb-4">
                                             <div class="form-group col-md-12 mt-4">
                                                <h5>Ticket Details:</h5>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label >Subject</label>
                                                <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter Subject" required>
                                            </div>
                                            
                                             <div class="form-group col-md-6" required>
                                             <label >Ticket Type</label>
                                                <select class="form-control select2" name="ticket_type">
                                                    <option class="" value="">Select Ticket Type</option>
                                                    
                                                </select>
                                            </div>
                                            
                                            
                                           
                                            <div class="form-group col-md-12">
                                            <label >Ticket Description</label>
                                                <textarea type="text" class="form-control"  rows="5" name="description" id="editor" placeholder="Enter Description "></textarea>
                                            </div>
                                            <div class="form-group col-md-12">
                                            <label >Ticket document</label>
                                                <input type="file" class="form-control-file" id="" rows="5" name="ticketDoc" placeholder="Choose document">
                                            </div>
                                             <hr>
                                        </div>
                                   
                                        <center><button type="submit" name="submit" class="btn btn-success mt-3" style="background-color:#05748!important">Create Ticket</button></center>
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

    <script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
        
        <script>
            ClassicEditor.create( document.querySelector( '#editor' ) )
                .catch( error => {
                    console.error( error );
                } );
        </script>
</body>
</html>