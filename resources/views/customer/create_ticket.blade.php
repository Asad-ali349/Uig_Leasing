<!DOCTYPE html>
<html lang="en">
@include('customer.includes.head')

    <link rel="stylesheet" type="text/css" href="{{asset('public/plugins/select2/select2.min.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
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
                                    <h2>Create Ticket</h2>
                                </div>                                                                        
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <form action="{{url('customer/submit_ticket')}}" method="POST" enctype="multipart/form-data">
                                @csrf
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
                                        <select class="form-control select2" name="ticket_type" id="ticket_type">
                                            <option class="" value="">Select Ticket Type</option>
                                            @foreach($ticket_category as $cat)
                                            <option class="" value="{{$cat->id}}">{{$cat->category_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12">
                                    <label >Ticket Description</label>
                                        <textarea type="text" class="form-control description"  rows="5" name="description" id="description" placeholder="Enter Description "></textarea>
                                    </div>
                                    <div class="form-group col-md-12">
                                    <label >Ticket document</label>
                                    <div class="dropzone mt-4" id="myDropzone" name="docs" ></div>
                                    </div>
                                        <hr>
                                </div>
                            
                                <center><button type="submit" name="submit" id="submit-all" class="btn btn-success mt-3" style="background-color:#05748!important">Create Ticket</button></center>
                            </form>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        ClassicEditor.create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
    <script>
        setTimeout(()=> {
            $('#alert').hide('slow')
        }, 5000)
    </script>
    <script>
        Dropzone.options.myDropzone= {
        url: "{{url('customer/submit_ticket')}}",
        autoProcessQueue: false,
        uploadMultiple: true,
        parallelUploads: 50,
        maxFiles: 50,
        maxFilesize: 20,
        addRemoveLinks: true,
        success: function(file, response){
            Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: "Ticket Created Successfully",
            showConfirmButton: false,
            timer: 1500,
            width:420
            })

            setTimeout(()=> {
                window.location.href="view_detail_ticket/"+response['id'];
            }, 1000)

        },
        init: function() {
            dzClosure = this; // Makes sure that 'this' is understood inside the functions below.

            // for Dropzone to process the queue (instead of default form behavior):
            document.getElementById("submit-all").addEventListener("click", function(e) {
                // Make sure that the form isn't actually being sent.
                e.preventDefault();
                e.stopPropagation();
                dzClosure.processQueue();
            });

            //send all the form data along with the files:
            this.on("sendingmultiple", function(data, xhr, formData) {
                formData.append("_token", "{{ csrf_token() }}");
                formData.append("subject", $("#subject").val());
                formData.append("ticket_type", $("#ticket_type").val());
                formData.append("description", $("#description").val());
            });
        }
    }
    </script> 
</body>
</html>