<!DOCTYPE html>
<html lang="en">
@include('dealer.includes.head')
    <link rel="stylesheet" type="text/css" href="assets/css/forms/theme-checkbox-radio.css">
    <link rel="stylesheet" type="text/css" href="assets/css/forms/switches.css">
<body class="form no-image-content">
    

    <div class="form-container outer">
        
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">
                       
                        <img src="{{asset('public/logo.png')}}" style="height: 50px">
                        <p class="signup-link recovery">An email verification Link sent to you email. Kindly verify it to proceed!</p>
                        <a href="{{url('dealer/verify/'.$link)}}">click to verify</a>
                        <p class="signup-link" id="resendtimer">Resend Link in <span id="text"></span></p>
                        <p class="signup-link" style="display:none" id="resendlink"><a href="{{url('dealer/resendVerification/'.$resend)}}" >Resend Link</a></p>
                    </div>                    
                </div>
            </div>
        </div>
    </div>

    
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/authentication/form-2.js"></script>
    <script type="text/javascript">
        setTimeout(()=> {
            $('#alert').hide('slow')
        }, 1000)
    </script>
    <script>
        timer();

        document.getElementById("bb").addEventListener("click", timer);

        function timer() {
            var sec = 11;

            function updateSec() {
                sec--;
                if (sec < 10) {
                document.getElementById("text").innerHTML = `&nbsp${sec}`;
                } else {
                document.getElementById("text").innerHTML = sec;
                }
                if (sec === 0) {
                    document.getElementById("resendtimer").style.display="none";
                    document.getElementById("resendlink").style.display="block";
                    stopTimer();

                }
            }
            updateSec();

            var interval = setInterval(updateSec, 1000);

            function stopTimer() {
                clearInterval(interval);
            }
        }

    </script>
</body>
</html>