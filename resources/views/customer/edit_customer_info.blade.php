<!DOCTYPE html>
<html lang="en">
@include('customer.includes.head')
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
                <div class="col-lg-12 layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>Update Profile</h4>
                                </div>
                            </div>
                        </div>
                       
                        <div class="widget-content widget-content-area">
                            <form action="{{Url('customer/updateprofile')}}" method="POST" id="profileform" enctype="multipart/form-data">
                                <div id="circle-basic" class=""> 
                                    <h3>Customer Info</h3>
                                    <section>
                                        @csrf
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-12">
                                                <h5>Personal Information</h5>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Customer Name</label>
                                                <input type="text" class="form-control" id="name" name="name"  value="{{$customer->name}}"   required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                 <label>Email</label>
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email"  required value="{{$customer->email}}">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Telephone</label>
                                                <input type="text" class="form-control telephone" id="phone" name="phone" value="{{$customer->contact}}" required >
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Home Telephone</label>
                                                <input type="text" class="form-control telephone" id="homephone" name="homephone" placeholder="Enter Home Telephone" value="{{$customer->home_contact}}"  required >
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Date Of Birth</label>
                                                <input type="date" class="form-control" id="dob" name="dob" placeholder="Enter Dob" value="{{$customer->dob}}" required >
                                            </div>
                                            
                                            <div class="form-group col-md-4">
                                                <label>SSN</label>
                                                <div class="input-group">
                                                    <input type="password" class="form-control" placeholder="Enter SSN" aria-label="notification" value="{{$customer->ssn}}" aria-describedby="basic-addon2" name="ssn" id="ssn">
                                                    <!-- <div class="input-group-append"> -->
                                                    <a onclick="changeType()">    
                                                        <span class="input-group-text" style="padding:12px"><svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></span>
                                                    </a>    
                                                    <!-- </div> -->
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>License Number</label>
                                                <input type="text" class="form-control" id="licenseNumber" name="licenseNumber" placeholder="Enter License Number"   value="{{$customer->drive_license_number}}" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>License Issue Date</label>
                                                <input type="date" class="form-control" id="licenseissuedate" name="licenseissuedate" placeholder="Enter License Issue Date"   value="{{$customer->liscense_issue_date}}" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>License Expiry Date</label>
                                                <input type="date" class="form-control" id="licenseexpirydate" name="licenseexpirydate" placeholder="Enter License Expiry Date"   value="{{$customer->license_expiry}}" required>
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
                                                        <textarea id="sig-dataUrl" class="form-control"    name="sign" rows="5">{{$customer->signature}}</textarea>
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
                                                <input type="text" class="form-control" id="street" name="street" placeholder="Enter Street Address" required  value="{{$customer->street}}">
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>City</label>
                                                <input type="text" class="form-control" id="city" name="city" placeholder="Enter City"  required value="{{$customer->city}}">
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>State</label>
                                                <input type="text" class="form-control" id="state" name="state" placeholder="Enter State"  required value="{{$customer->state}}">
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Zip</label>
                                                <input type="text" class="form-control" id="zip" name="zip" placeholder="Enter Zip" required  value="{{$customer->zip}}">
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Country</label>
                                                <input type="text" class="form-control" id="country" name="country" placeholder="Enter Country"  required value="{{$customer->country}}">
                                            </div>


                                            <div class="form-group col-md-4">
                                            <label>Home Type</label>
                                                <select class="form-control select2" name="homeType" id="homeType" required>
                                                    <option class="" value="">Select Home Type</option>
                                                    @if($customer->home_type=='1')
                                                        <option class="" value="1" selected>Rental</option>
                                                        <option class="" value="0">Own</option>
                                                    @elseif($customer->home_type=='0')
                                                        <option class="" value="1">Rental</option>
                                                        <option class="" value="0" selected>Own</option>
                                                        @else
                                                        <option class="" value="1">Rental</option>
                                                        <option class="" value="0">Own</option>
                                                    @endif
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
                                                <input type="text" class="form-control" id="bankname" name="bankname"  placeholder="Enter Bank Name"  value="{{$customer->bank != null ? $customer->bank->bank_name : ''}}" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Bank Telephone</label>
                                                <input type="text" class="form-control telephone" id="bankphone" name="bankphone" placeholder="Enter Bank Telephone"   value="{{$customer->bank != null ? $customer->bank->bank_contact : ''}}" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Bank Routing</label>
                                                <input type="number" class="form-control" id="bankrout" name="bankrout" placeholder="Enter Bank Routing"  value="{{$customer->bank != null ? $customer->bank->bank_routing : ''}}" required>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <h5>Account Information</h5>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Account Type</label>
                                                <select class="form-control select2" name="accountType" id="accountType" required>
                                                    <option class="" value="">Select Account Type</option>
                                                    @if($customer->bank != null ? $customer->bank->account_type : ''=='checking')
                                                    <option class="" value="checking" selected>Checking</option>
                                                    <option class="" value="saving">Saving</option>
                                                    @elseif($customer->bank != null ? $customer->bank->account_type : ''=='saving')
                                                    <option class="" value="checking">Checking</option>
                                                    <option class="" value="saving" selected>Saving</option>
                                                    @else
                                                    <option class="" value="checking">Checking</option>
                                                    <option class="" value="saving">Saving</option>

                                                    @endif
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Account Number</label>
                                                <input type="text" class="form-control" id="accountnumber" name="accountnumber"  placeholder="Enter Account Number "   value="{{$customer->bank != null ? $customer->bank->account_number : ''}}" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Account Opening Date</label>
                                                <input type="month" class="form-control" id="accountissuedate" name="accountissuedate" placeholder="Enter Account Issue Date"  value="{{$customer->bank != null ? $customer->bank->account_open_date : ''}}" required>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <h5>Card Information</h5>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Card Type</label>
                                            <select class="form-control select2" name="cardType" id="cardType" required>

                                                    <option class="" value="">Select Card Type</option>
                                                    @if($customer->bank != null ? $customer->bank->card_type : ''=='visa')
                                                    <option class="" value="visa" selected>Visa</option>
                                                    <option class="" value="master card">Master Card</option>
                                                    <option class="" value="amex">Amex</option>
                                                    <option class="" value="discover">Discover</option>
                                                    @elseif($customer->bank != null ? $customer->bank->card_type : ''=='master card')
                                                    <option class="" value="visa" >Visa</option>
                                                    <option class="" value="master card" selected>Master Card</option>
                                                    <option class="" value="amex">Amex</option>
                                                    <option class="" value="discover">Discover</option>
                                                    @elseif($customer->bank != null ? $customer->bank->card_type : ''=='Amex')
                                                    <option class="" value="visa" >Visa</option>
                                                    <option class="" value="master card">Master Card</option>
                                                    <option class="" value="amex" selected>Amex</option>
                                                    <option class="" value="discover">Discover</option>
                                                    @elseif($customer->bank != null ? $customer->bank->card_type : ''=='visa')
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
                                            <div class="form-group col-md-4">
                                            <label>Card Number</label>
                                                <input type="text" class="form-control" id="cardnumber" name="cardnumber" placeholder="Enter Card Number"  value="{{$customer->bank != null ? $customer->bank->card_number : ''}}" required>
                                            </div>

                                            <div class="form-group col-md-4">
                                            <label>Card Expiry Date</label>
                                                <input type="month" class="form-control" id="cardexpiry" name="cardexpiry" placeholder="Enter Card Expiry Date"  value="{{$customer->bank != null ? $customer->bank->card_expiry : ''}}" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Card CVV</label>
                                                <input type="password" class="form-control" id="cardccv" name="cardccv" placeholder="Enter Card CVV"  value="{{$customer->bank != null ? $customer->bank->card_cvv : ''}}" required>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <h5>Address Information</h5>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>City</label>
                                                <input type="text" class="form-control" id="bankcity" name="bankcity" placeholder="Enter City"   value="{{$customer->bank != null ? $customer->bank->bank_city : ''}}" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>State</label>
                                                <input type="text" class="form-control" id="bankstate" name="bankstate" placeholder="Enter State"  value="{{$customer->bank != null ? $customer->bank->bank_state : ''}}" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Zip</label>
                                                <input type="text" class="form-control" id="bankzip" name="bankzip" placeholder="Enter Zip" value="{{$customer->bank != null ? $customer->bank->bank_zip : ''}}" required>
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
                                                <input type="text" class="form-control" id="relative1name" name="relative1name"    placeholder="Enter Relative Name" value="{{count($customer->relative) != 0 ? $customer->relative[0]->relative_name : ''}}" required >
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Telephone</label>
                                                <input type="text" class="form-control telephone" id="relative1contact" name="relative1contact"    placeholder="Enter Relative Telephone"  value="{{count($customer->relative) != 0 ? $customer->relative[0]->relative_contact : ''}}" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Relation</label>
                                                <input type="text" class="form-control" id="relation1" name="relation1" placeholder="Enter Relationship"  value="{{count($customer->relative) != 0 ? $customer->relative[0]->relationship : ''}}" required>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <h5>Address Information</h5>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>City</label>
                                                <input type="text" class="form-control" id="relative1city" name="relative1city" placeholder="Enter City" value="{{count($customer->relative) != 0 ? $customer->relative[0]->relative_city : ''}}"  required>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>State</label>
                                                <input type="text" class="form-control" id="relative1state" name="relative1state" placeholder="Enter State" value="{{count($customer->relative) != 0 ? $customer->relative[0]->relative_state : ''}}"  required>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Zip</label>
                                                <input type="text" class="form-control" id="relative1zip" name="relative1zip" placeholder="Enter Zip"  value="{{count($customer->relative) != 0 ? $customer->relative[0]->relative_zip : ''}}" required>
                                            </div>
                                            
                                            
                                            <div class="form-group col-md-12">
                                                <h5>Relative 2</h5>
                                            </div>

                                            <div class="form-group col-md-4">
                                            <label>Relative Name</label>
                                                <input type="text" class="form-control" id="relative2name" name="relative2name" placeholder="Enter Relative Name"  value="{{count($customer->relative) != 0 ? $customer->relative[1]->relative_name : ''}}" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Telephone</label>
                                                <input type="text" class="form-control" id="relative2contact" name="relative2contact"    placeholder="Enter Relative Telephone"  value="{{count($customer->relative) != 0 ? $customer->relative[1]->relative_contact : ''}}" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Relation</label>
                                                <input type="text" class="form-control" id="relation2" name="relation2" placeholder="Enter Relationship"  value="{{count($customer->relative) != 0 ? $customer->relative[1]->relationship : ''}}" required>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <h5>Address Information</h5>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>City</label>
                                                <input type="text" class="form-control" id="relative2city" name="relative2city" placeholder="Enter City" value="{{count($customer->relative) != 0 ? $customer->relative[1]->relative_city : ''}}"  required>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>State</label>
                                                <input type="text" class="form-control" id="relative2state" name="relative2state" placeholder="Enter State"  value="{{count($customer->relative) != 0 ? $customer->relative[1]->relative_state : ''}}" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Zip</label>
                                                <input type="text" class="form-control" id="relative2zip" name="relative2zip" placeholder="Enter Zip"  value="{{count($customer->relative) != 0 ? $customer->relative[1]->relative_zip : ''}}" required>
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
                                                <input type="text" class="form-control" id="employername" name="employername"    placeholder="Enter Employer Name"  value="{{$customer->income != null ? $customer->income->employer_name : ''}}" required >
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Telephone</label>
                                                <input type="text" class="form-control telephone" id="employercontact" name="employercontact"    placeholder="Enter Relative Telephone"  value="{{$customer->income != null ? $customer->income->employer_contact : ''}}"  required>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>City</label>
                                                <input type="text" class="form-control" id="employercity" name="employercity" placeholder="Enter City"  value="{{$customer->income != null ? $customer->income->employer_city : ''}}" required >
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>State</label>
                                                <input type="text" class="form-control" id="employerstate" name="employerstate" placeholder="Enter State" value="{{$customer->income != null ? $customer->income->employer_state : ''}}"  required>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Zip</label>
                                                <input type="text" class="form-control" id="employerzip" name="employerzip" placeholder="Enter Zip" value="{{$customer->income != null ? $customer->income->employer_zip : ''}}" required >
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Profession</label>
                                                <input type="text" class="form-control" id="profession" name="profession" placeholder="Enter Profession"  value="{{$customer->income != null ? $customer->income->profession : ''}}" required>
                                            </div>
                                            
                                            <div class="form-group col-md-4">
                                            <label>Joining Date</label>
                                                <input type="date" class="form-control" id="joindate" name="joindate" placeholder="Enter Join Date"  value="{{$customer->income != null ? $customer->income->join_date : ''}}" required>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <h5>Salary Information</h5>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Direct Deposit</label>
                                                <select class="form-control select2" name="directdeposit" id="directdeposit" required>
                                                    <option class="" value="">Direct Deposit</option>
                                                    @if($customer->income != null ? $customer->income->direct_desposit : ''=='yes')
                                                    <option class="" value="1" selected>Yes</option>
                                                    <option class="" value="0">No</option>
                                                    @elseif($customer->income != null ? $customer->income->direct_desposit : ''=='no')
                                                    <option class="" value="1">Yes</option>
                                                    <option class="" value="0" selected>No</option>
                                                    @else
                                                    <option class="" value="1">Yes</option>
                                                    <option class="" value="0" >No</option>
                                                    @endif
                                                </select>
                                            </div>    

                                            <div class="form-group col-md-4">
                                            <label>Income</label>
                                                <input type="text" class="form-control" id="income" name="income" placeholder="Enter Income"  value="{{$customer->income != null ? $customer->income->income : ''}}" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Last Pay Date</label>
                                                <input type="date" class="form-control" id="lastpaydate" name="lastpaydate" placeholder="Enter Last Pay Date"  value="{{$customer->income != null ? $customer->income->last_pay_date : ''}}" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Next Pay Date</label>
                                                <input type="date" class="form-control" id="nextpaydate" name="nextpaydate" placeholder="Enter Next Pay Date"  value="{{$customer->income != null ? $customer->income->next_pay_date : ''}}" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>Income Method</label>
                                                <select class="form-control select2" name="incomemethod" id="incomemethod" required>
                                                    <option class="" value="">{{$customer->income != null ? $customer->income->paid_time : ''}}</option>
                                                    @if($customer->income != null ? $customer->income->paid_time : ''=='7')
                                                    <option class="" value="7" selected>Weekly</option>
                                                    <option class="" value="15">Bi Weekly</option>
                                                    <option class="" value="30">Monthly</option>

                                                    @elseif($customer->income != null ? $customer->income->paid_time : ''=='15')

                                                    
                                                    <option class="" value="7">Weekly</option>
                                                    <option class="" value="15" selected>Bi Weekly</option>
                                                    <option class="" value="30">Monthly</option>

                                                    @elseif($customer->income != null ? $customer->income->paid_time : ''=='30')
                                                    <option class="" value="7">Weekly</option>
                                                    <option class="" value="15">BiWeekly</option>
                                                    <option class="" value="30" selected>Monthly</option>
                                                    @else
                                                    <option class="" value="7">Weekly</option>
                                                    <option class="" value="15">Bi Weekly</option>
                                                    <option class="" value="30">Monthly</option>

                                                    @endif
                                                    
                                                </select>
                                            </div>

                                        </div>
                                        <span style="color:red" id="error4"></span>
                                    </section>
                                </div>
                                <!-- <button class="btn btn-primary" > submit</button> -->
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

    <script src="{{asset('public/plugins/highlight/highlight.pack.js')}}"></script>
    <script src="{{asset('public/assets/js/custom.js')}}"></script>
    <script src="{{asset('public/assets/js/scrollspyNav.js')}}"></script>
    <script>
        function addvalue(){
            document.querySelector('#profileform').addEventListener('submit', (e) => {
                e.preventDefault();
                var formData = new FormData(e.target);
                fetch("{{ Url('customer/updateprofile') }}", { 
                    method: 'POST',
                    body: formData
                }).then(() => console.log('success'));
            });
        }
    </script>
    <script src="{{asset('public/plugins/jquery-step/jquery.stepsss.min.js')}}"></script>
    <script src="{{asset('public/plugins/jquery-step/custom-jquery.steps.js')}}"></script>
    
    <script  src="{{asset('public/signature_assets/js/jquery.signature.js')}}"></script>
    <script src="{{asset('public/plugins/input-mask/input-mask.js')}}"></script>
    <script src="{{asset('public/plugins/input-mask/jquery.inputmask.bundle.min.js')}}"></script>
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