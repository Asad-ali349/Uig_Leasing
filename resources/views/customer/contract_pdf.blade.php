<!DOCTYPE html>
<html lang="en">
	@include('customer.includes.head')

	<link href="{{asset('public/assets/css/apps/invoice-preview.css')}}" rel="stylesheet" type="text/css" />
	<style type="text/css">
		.field{
		border:1px solid #000000 !important;
		height: 40px;
		}
		.heading{
		border:1px solid #000000 !important;
		background-color:lightgrey ;
		}
		.border{
		border:1px solid #000000 !important;
		}
        .contract_container{
            font-size:11px;
        }
		.font-16{
			font-size:16px;
		}
		p{
			color:black;
		}
		li{
			color:black;
		}
		.pg_break{
			page-break-after: always !important;
		}
	</style>
	<body>
		<!-- BEGIN LOADER -->
		<div id="load_screen">
			<div class="loader">
				<div class="loader-content">
					<div class="spinner-grow align-self-center"></div>
				</div>
			</div>
		</div>
		<!--  END LOADER -->
		@include('customer.includes.topbar')
		<!--  BEGIN MAIN CONTAINER  -->
		<div class="main-container" id="container">
			@include('customer.includes.navbar')
			<!--  BEGIN CONTENT PART content -->
			<div id="content" class="main-content">
				<div class="layout-px-spacing mb-5">
					<div class="row invoice layout-top-spacing layout-spacing">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="doc-container">
								<div class="row">
									<div class="col-xl-9">
										<div class="invoice-container">
											<div class="invoice-inbox">
												<div id="ct" class="">
													<div class="invoice-00001">
														<div class="content-section p-2">
															<div class="container mb-5 contract_container" >
																<div class="row">
																	<div class="col-md-7 col-sm-7 col-7" style="text-align: center;">
																		<h3>Customer Application</h3>
																		<p>Please print application Information. All fields must be complete.
																			Any field left blank will result in a pending response.
																		</p>
																	</div>
																	<div class="col-md-5 col-sm-5 col-5">
																		<div class="row">
																			<div class="col-md-12 field">Store Name: {{$get_contract->dealer->shop_name}}</div>
																			<div class="col-md-12 field">Store Tel: +1-{{$get_contract->dealer->shop_contact}}</div>
																			<div class="col-md-12 field">Sales Rep.:</div>
																			<div class="col-md-12 field">Amount Requested:</div>
																		</div>
																	</div>
																</div>
																<div class="row">
																	<div class="col-md-12 heading">Applicant Information</div>
																</div>
																<div class="row">
																	<div class="col-md-5 col-sm-5 col-5 field">Name (First Middle Last): {{$customer->name}}</div>
																	<div class="col-md-4 col-sm-4 col-4 field">Social Security No: {{$customer->ssn}}</div>
																	<div class="col-md-3 col-sm-3 col-3 field">Date of Birth: {{$customer->dob}}</div>
																</div>
																<div class="row">
																	<div class="col-md-5 col-sm-5 col-5 field">Street Address {{$customer->street}}</div>
																	<div class="col-md-1 col-sm-1 col-1 field">Apt No:</div>
																	<div class="col-md-2 col-sm-2 col-2 field">City: {{$customer->city}}</div>
																	<div class="col-md-2 col-sm-2 col-2 field">State: {{$customer->state}}</div>
																	<div class="col-md-2 col-sm-2 col-2 field">Zip Code: {{$customer->zip}}</div>
																</div>
																<div class="row">
																	<div class="col-md-3 col-sm-3 col-3 field">DO You Rent or DO You Own: 
																		@if($customer->home_type=='1')
																			{{"Yes"}}
																		@else
																			{{"No"}}
																		@endif
																	</div>
																	<div class="col-md-3 col-sm-3 col-3 field">Driver License No: {{$customer->drive_license_number}}</div>
																	<div class="col-md-3 col-sm-3 col-3 field">State of Issuance:</div>
																	<div class="col-md-3 col-sm-3 col-3 field">Exp. Date: {{$customer->license_expiry}}</div>
																</div>
																<div class="row">
																	<div class="col-md-3 col-sm-3 col-3 field">Home Phone: {{$customer->home_contact}}</div>
																	<div class="col-md-3 col-sm-3 col-3 field">Cell Phone: {{$customer->contact}}</div>
																	<div class="col-md-6 col-sm-6 col-6 field">Email Address: {{$customer->email}}</div>
																</div>
																<div class="row">
																	<div class="col-md-12 col-sm-12 col-12 heading">Source of Income (Must be verifiable)</div>
																</div>
																<div class="row">
																	<div class="col-md-9 col-sm-9 col-9 field">Employer Name: {{$customer->income->employer_name}}</div>
																	<div class="col-md-3 col-sm-3 col-3 field">Profession: {{$customer->income->profession}}</div>
																</div>
																<div class="row">
																	<div class="col-md-3 col-sm-3 col-3 field">Employer City State Zip: {{$customer->income->employer_city.",".$customer->income->employer_state.",".$customer->income->employer_zip}}</div>
																	<div class="col-md-3 col-sm-3 col-3 field">Employer Tel. #: {{$customer->income->employer_contact}}</div>
																	<div class="col-md-3 col-sm-3 col-3 field">Hire Date: {{$customer->income->join_date}}</div>
																	<div class="col-md-3 col-sm-3 col-3 field">Monthly Income: {{$customer->income->income}}</div>
																</div>
																<div class="row">
																	<div class="col-md-9 col-sm-9 col-9 border">
																		How are you get Paid (Complete one):
																		<div class="row mt-2 mb-2 p-2">
																			<div class="col-md-3 col-sm-3 col-3 border">
																				Every week:
																				<div>
																					On what day (Check one)
																					<div class="row" style="padding:5px">
																						<div class="col-md-4 col-sm-4 col-4 border">MON</div>
																						<div class="col-md-4 col-sm-4 col-4 border">TUE</div>
																						<div class="col-md-4 col-sm-4 col-4 border">WED</div>
																						<div class="col-md-4 col-sm-4 col-4 border">THU</div>
																						<div class="col-md-4 col-sm-4 col-4 border">FRI</div>
																						<div class="col-md-4 col-sm-4 col-4 border">SAT</div>
																					</div>
																				</div>
																			</div>
																			<div class="col-md-3 col-sm-3 col-3 border">
																				Every other week:
																				<div>
																					On what day (Check one)
																					<div class="row" style="padding:5px">
																						<div class="col-md-4 col-sm-4 col-4 border ">MON</div>
																						<div class="col-md-4 col-sm-4 col-4 border">TUE</div>
																						<div class="col-md-4 col-sm-4 col-4 border">WED</div>
																						<div class="col-md-4 col-sm-4 col-4 border">THU</div>
																						<div class="col-md-4 col-sm-4 col-4 border">FRI</div>
																						<div class="col-md-4 col-sm-4 col-4 border">SAT</div>
																					</div>
																				</div>
																			</div>
																			<div class="col-md-3 col-sm-3 col-3 border">
																				Twice a month:
																				<div>
																					On what days:
																				</div>
																			</div>
																			<div class="col-md-3 col-sm-3 col-3 border">
																				Once a month:
																				<div>
																					On what day: 
																				</div>
																			</div>
																		</div>
																	</div>
																	<div class="col-md-3 col-sm-3 col-3 ">
																		<div class="row">
																			<div class="col-md-12 border" style="height:60px">Direct Deposit: 
																			@if($customer->income->direct_desposit=='1')
																				{{"Yes"}}
																			@else
																				{{"No"}}
																			@endif
																			</div>
																			<div class="col-md-12 border" style="height:60px">Last Pay day: {{$customer->income->last_pay_date}}</div>
																			<div class="col-md-12 border" style="height:60px">Next Pay Day: {{$customer->income->next_pay_date}}</div>
																		</div>
																	</div>
																</div>
																<div class="row">
																	<div class="col-md-12 heading">Bank Information (Must match information on voided check and Bank statement)</div>
																</div>
																<div class="row">
																	<div class="col-md-4 col-sm-4 col-4 field">Routing No: {{$customer->bank->bank_routing}}</div>
																	<div class="col-md-4 col-sm-4 col-4 field">Account No: {{$customer->bank->account_number}}</div>
																	<div class="col-md-4 col-sm-4 col-4 field">Bank Phone No: {{$customer->bank->bank_contact}}</div>
																	<div class="col-md-4 col-sm-4 col-4 field">Bank Name: {{$customer->bank->bank_name}}</div>
																	<div class="col-md-4 col-sm-4 col-4  field">Debit-Credit Card No: {{$customer->bank->card_number}}</div>
																	<div class="col-md-4 col-sm-4 col-4  field">Date Opened: {{$customer->bank->account_open_date}}</div>
																</div>
																<div class="row">
																	<div class="col-md-12 heading">List two (2) relative not living with you</div>
																</div>
																<div class="row">
																	<div class="col-md-3 col-sm-3 col-3  field">Name: {{$customer->relative[0]->relative_name}}</div>
																	<div class="col-md-3 col-sm-3 col-3  field">City State: {{$customer->relative[0]->relative_city.",".$customer->relative[0]->relative_state}}</div>
																	<div class="col-md-3 col-sm-3 col-3  field">Relationship: {{$customer->relative[0]->relationship}}</div>
																	<div class="col-md-3 col-sm-3 col-3  field">Phone #: +1-{{$customer->relative[0]->relative_contact}}</div>
																	<div class="col-md-3 col-sm-3 col-3  field">Name: {{$customer->relative[1]->relative_name}}</div>
																	<div class="col-md-3 col-sm-3 col-3  field">City State: {{$customer->relative[1]->relative_city.",".$customer->relative[1]->relative_state}}</div>
																	<div class="col-md-3 col-sm-3 col-3  field">Relationship: {{$customer->relative[1]->relationship}}</div>
																	<div class="col-md-3 col-sm-3 col-3  field">Phone #: +1-{{$customer->relative[1]->relative_contact}}</div>
																</div>
																<div class="row mt-1">
																	<div class="col-md-12">
																		<p><b>I understand that I am requesting that UIG Leasing, LLC, or its subsidiaries ("UIG") enter a Lease-Purchase agree bound by the terms and conditions and important disclosures of the Application.</b></p>
																		<p>
																			I hereby (1) certify that all information have provided or will provide is true, correct and complete. (2) consent to UIG contacting any person or company
																			used in my application to obtain information about me and fully release all party from any claim that may arise out of such contact (3) authorize UIG to
																			charge any credit or debit card (as described in the Application) in the amount of my Initial Payment 1f my Application 1s approved and I execute a LeasePurchase agreement with UIG authorizing such a charge (4) agree that UIG may obtain one or more consumer reports ("Consumer Reports") in connection
																			with either (a) my application (b) any updates, renewal, or extensions of any transaction resulting from my application ("Transactions"). (c) the review or
																			collection of any Transaction and (d) other legitimate business purposes related to any Transaction and (5) understand that upon my request I will be
																			informed whether UIG obtain Consumer Reports and if so the name and address of individual or company that furnished the Consumer Reports.
																		</p>
																	</div>
																</div>
																<div class="row mb-3">
																	<div class="col-md-4 col-sm-4 col-4">
																		<div style="height:80px;vertical-align: text-bottom" >
																				<p style='position:absolute; bottom:30px;font-size:20px'>{{$customer->name}}</p>
																		</div>
																		<div style="border-top: 2px solid black;"><p>Customer Name</p></div>
																	</div>
																	<div class="col-md-3 col-sm-3 col-3">
																		<div style="height:80px;">
																			<p style='position:absolute; bottom:30px;font-size:17px'>
																				@php
																					$t=strtotime($get_contract->created_at);
																					$start_date=date('m/d/Y',$t)
																				@endphp
																				{{$start_date}}
																			</p>
																		</div>
																		<div style="border-top: 2px solid black;"><p>Date</p></div>
																	</div>
																	<div class="col-md-2 col-sm-2 col-2">
																	<!-- <div style="height:200px"></div> -->
																		<img src="{{asset('public/uigleasing.png')}}" style="height:100px;width: 100px;">
																	</div>
																	<div class="col-md-3 col-sm-3 col-3"></div>
																</div>
																<div style="border-top:2px black solid"></div>
																<div class="row">
																	<div class="col-md-12">Office Use Only</div>
																</div>
																<div class="row mt-1">
																	<div class="col-md-3 col-sm-3 col-3 field">No of Payments</div>
																	<div class="col-md-3 col-sm-3 col-3 field">Lease Amount</div>
																	<div class="col-md-3 col-sm-3 col-3 field">Debit/Credit (Last 4 digit)</div>
																	<div class="col-md-3 col-sm-3 col-3 field">Bank Acct. # (Last 4 digit)</div>
																</div>
																<div class="row mt-1">
																	<div class="col-md-4 col-sm-4 col-4 field">Item Description 1</div>
																	<div class="col-md-4 col-sm-4 col-4 field">Item Description 2</div>
																	<div class="col-md-4 col-sm-4 col-4 field">Item Description 3</div>
																</div>
																<div class="row mt-1">
																	<div class="col-md-2 col-sm-2 col-2 field">Invoiced Amount 1</div>
																	<div class="col-md-2 col-sm-2 col-2 field">Invoice Number 1</div>
																	<div class="col-md-2 col-sm-2 col-2 field">Invoiced Amount 2</div>
																	<div class="col-md-2 col-sm-2 col-2 field">Invoice Number 2</div>
																	<div class="col-md-2 col-sm-2 col-2 field">Invoiced Amount 3</div>
																	<div class="col-md-2 col-sm-2 col-2 field">Invoice Number 3</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
                                        
										<div class="invoice-container mt-5">
											<div class="invoice-inbox">
												<div id="ct" class="">
													<div class="invoice-00001">
														<div class="content-section " >
															<div class="container mb-5 mt-5 p-5" >
																<div class="row">
                                                                    <div class="col-md-12 mt-5">
                                                                        <h5 style="text-align:center">
                                                                            Information and Acknowledgment about your Lease
                                                                        </h5>
                                                                        <p class="mt-5 font-16" >
                                                                        Your Agreement is a lease-purchase or rental-purchase contract with UIG Leasing, LLC (“UIG”), or its
                                                                        subsidiary. THIS I S N O T A L O A N O R C R E D I T TRANSACTION. Your lease includes a 90
                                                                        day (3-months in California) Purchase Option. This purchase option will be for more than the
                                                                        retailer’s sale price, not “same as cash”, (except in California).
                                                                        <br><br>
                                                                        You understand that by signing the Agreement, UIG will buy from the retailer the merchandise you
                                                                        selected and will then lease that merchandise to you.
                                                                        <br><br>

                                                                        During the term of your Lease, UIG is the owner of the merchandise. Once you’ve paid your lease in
                                                                        full, or exercised a buyout option, ownership will transfer to you. The least expensive option to
                                                                        purchase under the Agreement must be exercised within 90 days of delivery (three calendar months
                                                                        in California). Regularly scheduled lease payments are still due even if you intend to purchase the
                                                                        merchandise later
                                                                        <br><br>


                                                                        Lease payments will be deducted automatically from your bank account, charged to your card, or
                                                                        made at another authorized vendor or payment processor, depending upon information you gave in
                                                                        your Lease Application. Charges will appear on your statements as UIG Leasing or UIG, not the store
                                                                        where you selected your merchandise.
                                                                        <br><br>

                                                                        You may stop leasing at any time, without incurring a penalty, and stop any un-accrued payments by
                                                                        returning the merchandise to UIG. You will not receive a refund if you return the merchandise early.
                                                                        Additionally, UIG’s Customer Satisfaction Policy allows you to cancel your Agreement within five (5)
                                                                        calendar days of signature and receive a full refund by calling us at (855)332-5487 and scheduling a
                                                                        return of the merchandise. 

                                                                        <br><br>
                                                                        Your Lease Agreement includes reinstatement rights that may allow you to get returned merchandise
                                                                        back, as described in your Agreement.

                                                                        <br><br>
                                                                        Full terms are in your Lease Agreement, which will be mailed and e-mailed to you and available on
                                                                        our Customer Portal. The copies sent are computer-generated and may not include your signature.

                                                                        <br><br>
                                                                        You agree by signing this acknowledgement that you read, understand, and received a copy of this
                                                                        document and your Lease Agreement.

                                                                        </p>

                                                                    </div>
                                                                    
                                                                </div>
                                                                <div class="row">
																	<div class="col-md-4 col-sm-4 col-4">
																	<div style="height:300px"></div>
																		<div style="border-top: 2px solid black;"><p>Customer Name</p></div>
																	</div>
																	<div class="col-md-3 col-sm-3 col-3">
																	<div style="height:300px"></div>
																		<div style="border-top: 2px solid black;"><p>Date</p></div>
																	</div>
																	<div class="col-md-2 col-sm-2 col-2">
																	<div style="height:200px"></div>s
																		<img src="{{asset('public/uigleasing.png')}}" style="height:100px;width: 100px;">
																	</div>
																	<div class="col-md-3 col-sm-3 col-3"></div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
                                        <div class="invoice-container mt-5">
											<div class="invoice-inbox">
												<div id="ct" class="">
													<div class="invoice-00001">
														<div class="content-section" >
															<div class="container mb-5 p-5 mt-5" >
																<div class="row">
                                                                    <div class="col-md-12">
                                                                        <h5 style="text-align:center">
                                                                            LEASE-PURCHASE AGREEMENT
                                                                        </h5>
                                                                        <p class="mt-5">
                                                                        <b> THIS LEASE-PURCHASE AGREEMENT CONTAINS AN ARBITRATION PROVISION (SEE ¶ 21). UNLESS YOU
                                                                        PROMPTLY REJECT THE ARBITRATION PROVISION (SEE ¶ 21(a)), THE ARBITRATION PROVISION WILL HAVE A
                                                                        SUBSTANTIAL EFFECT ON YOUR RIGHTS IN THE EVENT OF A DISPUTE, INCLUDING YOUR RIGHT TO BRING OR
                                                                        PARTICIPATE IN A CLASS PROCEEDING.</b>
                                                                        </p>
                                                                        
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="row p-3">
                                                                            <div class="col-md-4 col-sm-4 col-4 border">
                                                                            <p><b>Lessor/Owner:</b></p>  
                                                                            </div>
                                                                            <div class="col-md-4 col-sm-4 col-4 border">
                                                                            <p><b>Lessee/Potential Purchaser:</b></p> 
                                                                            </div>
                                                                            <div class="col-md-4 col-sm-4 col-4 border">
                                                                            <p><b>Store Use Only:</b></p>
                                                                            </div>
                                                                        <!-- </div>
                                                                        <div class="row p-3"> -->
                                                                        
                                                                            <div class="col-md-4 col-sm-4 col-4 border">
                                                                                <div>
                                                                                <p>UIG Leasing, LLC
                                                                                12200 Gulf Freeway #544
                                                                                Houston, TX 77034
                                                                                Toll Free: (855) 332 – 5487</p>
                                                                                </div>
                                                                             
                                                                            </div>
                                                                            <div class="col-md-4 col-sm-4 col-4 border">
                                                                            <p>Lessee/Potential Purchaser:</p>
                                                                            </div>
                                                                            <div class="col-md-4 col-sm-4 col-4 border">
                                                                                <div>
                                                                                <p>App Date:</p>
                                                                                </div>
                                                                                <div>
                                                                                <p>Submit Date:</p>
                                                                                </div>
                                                                                <div>
                                                                                <p>Store Name:</p>
                                                                                </div>
                                                                                <div>
                                                                                <p>Store Tel.</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <p>
                                                                        In this Lease-Purchase Agreement (“Lease”), “you” and “your” mean the person(s) signing this Lease as Lessee/Potential
                                                                        Purchaser, and “we”, “our” and “us” mean the Lessor/Owner identified above and its successors and assigns.
                                                                        </p>
                                                                        <ol>
                                                                            <li>
                                                                            <b>Leased Property:</b> You are leasing the item(s) (the “Property”) described listed below as follows:<br>
                                                                            ____________________________________________________________________________________
                                                                            <br>
                                                                            The Property is new. You represent to us that you are acquiring the Property for personal, family,
                                                                            or household purposes and not for commercial use.

                                                                            </li>
                                                                            <li>
                                                                            <b>Cash Price:</b> The “Cash Price” of the Property, which is the amount we would charge for a cash sale
                                                                            of the Property, is $
                                                                            </li>
                                                                            <li>
                                                                            <b>Payment at Signing:</b> A payment (the “Initial Payment”) of $49.00, plus tax of $4.04, totaling $53.04, is
                                                                            due when this Lease is signed.

                                                                            </li>
                                                                            <li>
                                                                            <b>Recurring Payments:</b>  Additional payments (“Recurring Payments”) of $________, plus tax of
                                                                            $______, totaling $___________, are due every __________weeks thereafter while this Lease
                                                                            remains in force, commencing on the day indicated in your Lease application that you receive pay or
                                                                            benefits, but no sooner than ten (10) days from the delivery date of the Property. The final Recurring
                                                                            Payment will be in the amount of $________, plus tax of $_______, totaling ___________. Recurring
                                                                            Payments are made in arrears. The Recurring Payment amount may change to the extent the tax rate
                                                                            changes after the date of this Lease. 
                                                                            </li>

                                                                            <li>

                                                                            <b>Total Purchase Price:</b>  This Lease will end and you will own the Property if you make ____ payments
                                                                            totaling $___________, plus tax (the “Total Purchase Price”). This is $___________ more than the Cash
                                                                            Price (excluding tax). The total monetary amount of the Lease payments does not include other
                                                                            charges under the Lease, including Returned Payment Fees.

                                                                            </li>

                                                                            <li>
                                                                            <b>Early Purchase Options:</b> Early Purchase Options: You can purchase the Property at any time during the first 90 days after the
                                                                            Property is delivered to you by paying us the “90-Day Purchase Option” amount plus tax and any
                                                                            Returned Payment Fees, with credit for all payments you have made. The 90-Day Purchase Option amount is $____________. You can also purchase the Property at any time by paying us an amount
                                                                            equal to any payment then due (including Returned Payment Fees), plus the “Early Buyout Option”
                                                                            amount, which is 65% of the unpaid Recurring Payments. Applicable tax will be added to either option.

                                                                            </li>
                                                                            <li>
                                                                            <b>Cancellation without Penalty:</b> You may cancel this Lease without penalty at any time by complying
                                                                            with the steps described in ¶ 13

                                                                            </li>s
                                                                            <li>
                                                                            <b>Payment Method:</b> You authorize us to initiate electronic fund transfers (“EFT”) from your bank account
																			number XXX_____ or any bank account you authorize us to charge in the future (the “Bank Account”)
																			or charges to the credit or debit card number XXXX______ or any card you authorize us to charge in
																			the future (the “Card”) for each required payment, including each Returned Payment Fee. You may
																			make payments on this Lease by sending a check or money order to us at UIG Leasing, LLC, 12200
																			Gulf Freeway, Suite 544 Houston TX 77034 (for overnight delivery the address is UIG Leasing, LLC,
																			12200 Gulf Freeway, Suite 544 Houston TX 77034. online at www.uigleasing.com, or by calling us at
																			(855)332-5487. We have arrangements with certain third-party payment processors to accept
																			payments on our behalf; please contact us if you would like more information about this payment
																			method. These payment processors will charge you a fee to make your payment through their services.<br> <br>
																			
																			You agree that we may resubmit any returned electronic fund transfers EFT or Card charge as permitted
																			by law and network rules. We are not responsible for any fees you incur in connection with returned
																			payments. You also authorize us to process any charges you subsequently confirm by phone, text
																			message, or email. In the event that we make an error in processing a charge, you authorize us to
																			initiate a corresponding reverse charge to correct the error.<br> <br>
																			You may change your scheduled payment dates with our permission (which we will typically grant if
																			the new payments coincide with the dates you receive payments and do not materially increase the
																			Lease term), terminate your payment authorization or update any payment information by calling us at
																			(855)332-5487, emailing us at support@uigleasing.com, or writing us at 12200 Gulf Freeway, Suite
																			544 Houston TX 77034. We will honor your termination or modification request so long as you make this
																			request at least three (3) business days before the scheduled payment or far enough in advance for us
																			to reasonably act on it. If any payment cannot be obtained by the methods described above, you remain
																			responsible for contacting us to make such payment by other means. Please include your Lease number
																			(shown at the top right corner of this Lease) with any payment you send to ensure it is properly posted
																			to your account.

                                                                            </li>
                                                                            <li>
                                                                            <b>Maintaining the Property:</b>  During the term of this Lease, you are responsible for maintaining the
																			Property in its original condition, ordinary wear and tear accepted. We are not responsible for
																			damage resulting from the negligence or misconduct of you or third parties. We do not carry any
																			insurance on the Property. If the Property is lost, stolen, damaged, or destroyed during the Lease
																			term, or you do not return the Property to us when required to do so, you must pay us, in addition to
																			all other amounts you owe us: (a) the amount you would need to pay to acquire the Property; (b) the
																			fair market value of the Property as of the date of loss; or (c) if you returned the Property in damaged
																			condition, the cost to repair the Property, whichever is least.

                                                                            </li>
                                                                            <li>
                                                                            <b>Default and Reinstatement:</b> You will be in breach of this Lease if you fail to make any payment within
																			seven (7) days after its scheduled date. If you are in breach of this Lease, or if you do not renew, we
																			have the right to take possession of the Property without breaching the Lease. However, if you voluntarily
																			surrender the Property, you may reinstate this Lease without losing any of your rights by paying us all
																			amounts you owe within 45 days after the date of surrender. Upon reinstatement, we will return the
																			Property to you or substitute property of comparable worth, quality, and condition. Reinstatement
																			results in a continuation of this Lease. In the event you wish to reinstate after the times indicated above,
																			you should contact us and request reinstatement, as we will accommodate a reinstatement for longer
																			than required by law if we are reasonably able to do so. There is no reinstatement fee.


                                                                            </li>
                                                                            <li>
                                                                            <b>Nature of Obligation:</b> This is a lease-purchase transaction. The initial term of this Lease ends, when
																			your first Recurring Payment is due. However, this Lease will renew automatically from scheduled
																			Recurring Payment date to scheduled Recurring Payment date unless it is ended or you make all the
																			payments required to acquire the Property. You will not own the Property until you make all the
																			scheduled payments or exercise an early purchase option. If you want to purchase this or similar property now, you should consider cash or credit terms that may be available to you
                                                                            </li>

																			<li>
                                                                            <b>Returned Payment Fee:</b> In the event that any payment you make under this Lease is returned
																			unpaid, you agree to pay us a “Returned Payment Fee" equal to the lesser of $30.00 or the maximum
																			permitted by law. In no event, however, will we assess a Returned Payment Fee for an unsuccessful
																			Card charge. We will not charge any fee that is not reasonably related to the services performed.

                                                                            </li>
																			
																			<li>
                                                                            <b>Termination:</b> We may end this Lease and recover the Property if you breach this Lease. You may
																			end this Lease at any time without penalty by returning the Property to us in good condition, ordinary
																			wear and tear excepted, in accordance with the directions we give you and paying us any amounts
																			you owe us at the time of termination plus an amount equal to your next scheduled payment times a
																			fraction equal to the number of days from your latest prior Recurring Payment (or the date of delivery of
																			the Property, if the first Recurring Payment is not yet due) (the “Prior Payment Date”) to the termination
																			date divided by the number of days from the Prior Payment Date to the next scheduled Recurring
																			Payment date. You agree that there is no refund of an Initial or Recurring Payment for return or
																			surrender of the Property before the end of a Lease term.

                                                                            </li>
																			<li>
                                                                            <b>Manufacturer’s Warranty:</b> If you acquire ownership of the Property, the manufacturer's warranty will be
																			given to you if the warranty is still in effect and we are allowed to do so. There are no other warranties
																			which extend beyond those set forth in this Lease.


                                                                            </li>
																			<li>
                                                                            	<b>Disclaimer of Warranties:</b>
																				<ol type="a">
																					<li>
																						<b>General Terms:</b> Lessee acknowledges that Lessor is not the manufacturer of the Property, nor
																						manufacturer’s or retailer’s agent, and Lessee agrees that as between Lessor and Lessee, the Property
																						leased hereunder is of a design, size, fitness, and capacity selected by Lessee and that Lessee finds
																						the Property suitable and fit for its intended purpose. LESSEE FURTHER ACKNOWLEDGES THAT
																						THE PROPERTY IS LEASED UNDER THIS AGREEMENT AND EACH LEASE ON AN AS-IS,
																						WHERE IS BASIS, AND THAT LESSOR MAKES NO REPRESENTATION OR WARRANTY OF ANY
																						KIND, EXPRESS OR IMPLIED, WITH RESPECT TO THE PROPERTY, ITS MERCHANTABILITY OR
																						ITS FITNESS FOR A PARTICULAR PURPOSE. <b>LESSOR SHALL NOT BE LIABLE TO LESSEE OR
																						ANY OTHER PERSON FOR DIRECT, INDIRECT, SPECIAL, INCIDENTAL, OR CONSEQUENTIAL
																						DAMAGES ARISING FROM LESSEE’S USE OF THE PROPERTY, ANY DEFECT OR
																						MALFUNCTION OF THE PROPERTY.</b> No defect or unfitness of the Property shall relieve Lessee of
																						the obligation to pay rent on time, or perform any other obligation under this Agreement.
																					</li>
																					<li>
																					<b> As-Is Condition: LESSEE AGREES TO PURCHASE THE PROPERTY "AS IS", "WHERE IS", WITH
																					ALL FAULTS AND CONDITIONS THEREON. ANY INFORMATION CONCERNING THE PROPERTY
																					PROVIDED OR MADE AVAILABLE TO LESSEE BY RETAILER, OR RETAILER'S AGENTS SHALL
																					NOT BE REPRESENTATIONS OR WARRANTIES MADE BY LESSOR. IN LEASING THE
																					PROPERTY OR TAKING OTHER ACTION HEREUNDER, LESSEE HAS NOT AND SHALL NOT
																					RELY ON ANY SUCH DISCLOSURES, BUT RATHER, LESSEE SHALL RELY ONLY ON
																					LESSEE'S OWN INSPECTION OF THE PROPERTY. LESSEE ACKNOWLEDGES THAT THE
																					TOTAL PURCHASE PRICE REFLECTS AND TAKES INTO ACCOUNT THAT THE PROPERTY IS
																					BEING SOLD "AS IS".</b>

																					</li>
																					<li>
																						<b>
																						Liability: LESSOR SHALL HAVE NO RESPONSIBILITY OR LIABILITY TO LESSEE OR ANY
																						OTHER PERSON WITH RESPECT TO ANY OF THE FOLLOWING, REGARDLESS OF ANY
																						NEGLIGENCE OR FAULT OF LESSOR: (i) ANY LIABILITY, LOSS OR DAMAGE CAUSED OR
																						ALLEGED TO BE CAUSED DIRECTLY OR INDIRECTLY BY THE PROPERTY OR ANY
																						COMPONENT OF THE PROPERTY OR BY ANY INADEQUACY THEREOF, ANY DEFICIENCY OR
																						DEFECT IN THIS AGREEMENT OR ANY OTHER CIRCUMSTANCES IN CONNECTION WITH THE
																						PROPERTY OR THIS AGREEMENT; (ii) THE USE, OPERATION OR PERFORMANCE OF THE
																						PROPERTY, OR ANY COMPONENT OF THE PROPERTY, OR ANY RISKS RELATING THERETO.
																						0
																						Page 4 of 9
																						LESSEE SHALL INDEMNIFY, DEFEND AND HOLD LESSOR HARMLESS FROM AND AGAINST
																						ANY AND ALL CLAIMS, ACTIONS, SUITS, PROCEEDINGS, INJURIES (OR DEATH), DAMAGES,
																						LIABILITIES, COSTS, OR EXPENSES (INCLUDING WITHOUT LIMITATION REASONABLE
																						ATTORNEYS’ FEES) ARISING FROM OR IN ANY WAY RELATING TO LESSEE’S LEASE OR
																						POSSESSION OF THE PROPERTY DURING THE TERM AND SUCH INDEMNIFICATION SHALL
																						SURVIVE THE EXPIRATION OR EARLIER TERMINATION OF THIS AGREEMENT. WE MAKE NO
																						WARRANTY THAT THE SERVICE WILL MEET YOUR REQUIREMENTS OR THAT THE SERVICE
																						WILL BE TIMELY, SECURE, OR ERROR-FREE; NOR DO WE MAKE ANY WARRANTY AS TO THE
																						RESULTS THAT MAY BE OBTAINED FROM THESE SERVICES.
																						</b>
																					</li>
																					<li>
																					<b>Prohibited and Unenforceable Provisions:</b> Any clause of this provision which is prohibited or
																					unenforceable in any jurisdiction shall, as to such jurisdiction, be ineffective to the extent of such
																					prohibition or unenforceability without invalidating the remaining provisions hereof, and any such
																					prohibitions or unenforceability in any jurisdiction. To the extent permitted by applicable law, each of
																					Lessor and Lessee hereby waives any provision of applicable law that renders any provision hereof
																					prohibited or unenforceable in any respect.

																					</li>
																				</ol> 
																			


                                                                            </li>
																			<li>
																				<b>Marketing and Communications:</b>
																				<ol type="a">
																					<li>
																					We may share your name and contact information and information about this Lease. You have the
																					right to limit this sharing. To exercise this right, call us at (855)332-5487
																					</li>
																					<li>
																					You understand and agree that we may monitor and/or record any of your phone conversations with
																					any of our representatives.


																					</li>
																					<li>
																					We may use automated telephone dialing, text messaging systems, and electronic mail to provide
																					messages to you about scheduled payments, missed payments, and other important information via the
																					telephone numbers and email addresses you provided during the Lease application or during any other
																					correspondence or communication we may have with you. The telephone messages are played by a
																					machine automatically when the telephone is answered, whether answered by you or someone else.
																					These messages may also be recorded by your answering machine. You give us your permission to call
																					or send a text message to any telephone number you have given us and to play pre-recorded messages
																					or send text messages with information about this Lease or your account. You also give us permission
																					to send such information to you by email. You understand that, when you receive such calls, texts, or
																					emails, you may incur a charge from the company that provides you with telecommunications, wireless,
																					and/or Internet services. You agree that we will not be liable to you for any fees, inconvenience,
																					annoyance, or loss of privacy in connection with such calls, texts, or emails.

																					</li>
																					
																				</ol> 
																			</li>
																			<li>
																				<b>Miscellaneous:</b>
																				 Entire Agreement: This Lease constitutes the entire agreement between you and us concerning the Property. Assignment: We may sell, transfer, or assign this Lease. You may not sell,
																				transfer, or assign this Lease without our written consent. You may not sell, assign, mortgage, pawn,
																				pledge, encumber, hock, or otherwise dispose of the Property. You may not remove the Property from
																				your address as shown on the first page of this Lease without our written consent. Adjustment to Property:
																				If you initiate a return or exchange of the Property, we will send you a document modifying your Lease
																				terms. If you do not object to the modified document within five (5) days of receipt we will assume your
																				acceptance of the modification as it reflects your intended changes. Accord and Satisfaction: Any
																				statement accompanying your payment to the effect that your balance is paid in full will not bind us. Our
																				deposit of any such payment will not constitute an accord and satisfaction, and we may apply the payment
																				to your account. Insurance: You are not required to purchase insurance for the Property, including
																				insurance from or through us or from any insurer owned or controlled by us. Governing Law: This Lease
																				(but not the Arbitration Provision) is governed by the laws of the State of Texas without regard to its
																				conflict of law principles. Consumer Report: You understand and agree that we may obtain a consumer
																				report on you in connection with this Lease. Upon your written request, you will be informed of whether
																				or not such a report was obtained and, if so, the name and address of the agency that furnished it. Right to Suspend Payments: You understand and agree that we may suspend payments, when legal or
																				necessary, due to any circumstance out of our control; we also reserve the right to resume payments
																				with no fee or penalty.

																			</li>
																			<li>
																			<b>Credit Reporting:</b> You authorize us to make inquiries concerning your credit history, standing, and ability
																			to pay. This may include information regarding your employment history and income. We may report
																			information about your Lease to consumer reporting agencies, but we are not required to do so, even
																			upon your request. Late payments, missed payments, timely payments, or other defaults on your Lease
																			may, however, be reflected in your credit report. In the event of default or late payments, this may have
																			a negative impact on your credit report. Timely payments are unlikely to have a positive impact on your
																			credit report. If we furnish any information about your Lease to a consumer reporting agency that you
																			believe is inaccurate, or if you believe that you have been the victim of identity theft in connection with
																			any lease made by us, write to us at 12200 Gulf Freeway, Suite 544 Houston TX 77034, attention
																			Compliance. In your letter (i) provide your name, mailing address, and phone number, (ii) identify the
																			specific information that is being disputed, (iii) explain the basis for the dispute, and (iv) provide any
																			supporting documentation you have that substantiates the basis of the dispute. If you believe that you
																			have been the victim of identity theft, submit an identity theft affidavit or identity theft report.

																			</li>
																			<li>
																			<b>Returning a Computer or Other Electronic Device:</b> If you return or exchange a computer, tablet, or
																			other electronic device (collectively referred to as “Device”), it is your responsibility to remove all personal
																			information or data containing personal information or other information that may be of a personal nature
																			(such as emails, photos, or videos) and any software you have installed (collectively referred to as
																			"Information") on the Device. Therefore, it is your responsibility to remove or make a back-up copy of any
																			Information that you want to preserve or keep. We will take commercially reasonable steps to delete and
																			erase the Information on the Device and restore the Device back to its original state, but this is not a
																			guarantee that the Information will not be accessible by any subsequent user. We shall not be responsible
																			for accessing, deleting, or destroying any Information left on the Device. You agree to hold us harmless
																			in the event that any or all of your Information is accessed, altered, deleted, or destroyed as a result of
																			returning the Device.
																			</li>
                                                                           <li>
																		   	<b>Servicing Devices:</b> (a) In the event that we service your Device, we or our service providers may have
																			access to Information (such as emails, photos, videos, web searches, web queries, websites you visited,
																			or technical information) loaded, stored on, or recorded by your Device. While we will attempt to preserve
																			as much of your Information as possible, in some circumstances Information may be permanently altered,
																			deleted, or destroyed in the process of carrying out the servicing. Therefore, you should remove or make
																			a back-up copy of any Information that you want to preserve or keep. You understand that by providing
																			the Device for servicing, we may have access to any Information that has been loaded, stored on, or
																			recorded by the Device. You consent to our viewing or accessing that Information as we deem necessary
																			to carry out the requested service. You also agree to hold us harmless in the event that any or all of your
																			Information is altered, deleted, or destroyed as a result of the service process or any type of access. (b)
																			We shall not be liable for any direct, indirect, incidental, special, or consequential damages resulting from
																			servicing your Device or any access to or alteration, deletion, or destruction of any Information on the
																			Device, including, but not limited to, damages for value, loss of profits, or other intangibles, even if we
																			have been advised of the possibility of such damages. Some jurisdictions do not allow the limitation or
																			exclusion of liability for incidental or consequential damages so some of the above limitations may not
																			apply to you. Our maximum liability arising from or related to servicing your Device shall be limited to the
																			sums you paid under your Lease. (c) We shall not be liable for any failure or delay in performance due to
																			any cause beyond our control. We reserve the right to refrain from providing the requested services if we
																			are unable to do so, including, but not limited to, instances where you did not authorize us to restore the
																			Device.
																		   </li>
																		   <li>
																			   <b>
																			   Arbitration Provision:
																			   </b>
																			   <ol type="a">
																				   <li>
																				   	Effect of Arbitration Provision; Right to Reject. (i) Unless prohibited by applicable law and unless you
																					reject the Arbitration Provision in accordance with subsection (a)(ii) below, you and we agree that either
																					party may elect to arbitrate or require arbitration of any Claim under this Arbitration Provision. (ii) If you
																					do not want this Arbitration Provision to apply, you may reject it within thirty (30) days after the date of
																					this Lease by delivering to us at 12200 Gulf Freeway, Suite 544 Houston TX 77034, Attn: Arbitration OptOut, a written and signed rejection notice which: (A) provides your name and address and the date of
																					this Lease; and (B) states that you are rejecting the Arbitration Provision in this Lease. If you want proof
																					that you sent such a notice, you should send the rejection notice by “certified mail, return receipt
																					requested”. If you do, we will reimburse you for the postage upon your request. Nobody else can reject
																					arbitration for you (except an attorney at law you have personally retained); this is the only way you can
																					reject arbitration. Your rejection of arbitration will not affect your right to this Lease or the terms of this
																					Lease apart from this Arbitration Provision.

																				   </li>
																				   <li>
																				   	Certain Definitions. As used in this Arbitration Provision, the following terms have the following
																					meanings: (i) References to “we”, “us”, and “our” include our “Related Parties” – all our parent companies,
																					subsidiaries and affiliates, and our and their employees, directors, officers, shareholders, governors,
																					managers, and members. Our “Related Parties” also include third parties that you bring a Claim against
																					at the same time you bring a Claim against us or any other Related Party, including, without limitation,
																					the merchant who sold us the Property we then leased to you. (ii) “Claim” means any claim, dispute or
																					controversy between you and us (including any Related Party) that arises from or relates in any way to
																					this Lease or the Property (including any amendment, modification, or extension of this Lease); any prior
																					Lease between you and us and/or the property subject to such prior Lease; any of our marketing,
																					advertising, solicitations, and conduct relating to this Lease, the Property and/or a prior Lease and related
																					property; our collection of any amounts you owe; or our disclosure of or failure to protect any information
																					about you. “Claim” is to be given the broadest reasonable meaning and includes claims of every kind and
																					nature, including, but not limited to, initial claims, counterclaims, cross-claims and third-party claims, and
																					claims based on constitution, statute, regulation, ordinance, common law rule (including rules relating to
																					contracts, torts, negligence, fraud or other intentional wrongs), and equity. It includes disputes that seek
																					relief of any type, including damages and/or injunctive, declaratory or other equitable relief. Despite the
																					foregoing, “Claim” does not include any individual action brought by you in small claims court or your
																					state’s equivalent court, unless such action is transferred, removed, or appealed to a different court. In
																					addition, except as set forth in the immediately following sentence, “Claim” does not include disputes
																					about the validity, enforceability, coverage, or scope of this Arbitration Provision or any part thereof
																					(including, without limitation, subsections (f)(iii), (f)(iv), and/or (f)(v) (the “Class Action and Multi-Party
																					Claim Waiver”), the last sentence of subsection (j) and/or this sentence); all such disputes are for a court
																					and not an arbitrator to decide. However, any dispute or argument that concerns the validity or
																					enforceability of this Lease as a whole is for the arbitrator, not a court, to decide. (iii) “Proceeding” means
																					any judicial or arbitration proceeding regarding any Claim. “Complaining Party” means the party who
																					threatens or asserts a Claim in any Proceeding, and “Defending Party” means the party who is a subject
																					of any threatened or actual Claim. “Claim Notice” means written notice of a Claim from a Complaining
																					Party to a Defending Party.
																				   </li>
																				   <li>
																				   	Arbitration Election; Administrator; Arbitration Rules. (i) A Proceeding may be commenced after the
																					Complaining Party complies with subsection (k). The Complaining Party may commence the Proceeding
																					either as a lawsuit or an arbitration by following the appropriate filing procedures for the court or the
																					arbitration administrator selected by the Complaining Party in accordance with this subsection (c). If a
																					lawsuit is filed, the Defending Party may elect to demand arbitration under this Arbitration Provision of
																					the Claim(s) asserted in the lawsuit. If the Complaining Party initially asserts a Claim in a lawsuit on an
																					individual basis but then seeks to assert the Claim on a class, representative or multi-party basis, the
																					Defending Party may then elect to demand arbitration. A demand to arbitrate a Claim may be given in
																					papers or motions in a lawsuit. If you demand that we arbitrate a Claim initially brought against you in a lawsuit, your demand will constitute your consent to arbitrate the Claim with the administrator of our
																					choice, even if the administrator we choose does not typically handle arbitration proceedings initiated
																					against consumers. (ii) Any arbitration Proceeding shall be conducted pursuant to this Arbitration
																					Provision and the applicable rules of the arbitration administrator in effect at the time the arbitration is
																					commenced. The arbitration administrator will be the American Arbitration Association (“AAA”), 1633
																					Broadway, 10th Floor, New York, NY 10019, www.adr.org; JAMS, 620 Eighth Avenue, 34th Floor, New
																					York, NY 10018, www.jamsadr.com; or any other company selected by mutual agreement of the parties.
																					If both AAA and JAMS cannot or will not serve and the parties are unable to select an arbitration
																					administrator by mutual consent, the administrator will be selected by a court. Notwithstanding any
																					language in this Arbitration Provision to the contrary, no arbitration may be administered, without the
																					consent of all parties to the arbitration, by any arbitration administrator that has in place a formal or
																					informal policy that is inconsistent with the Class Action and Multi-Party Claim Waiver. The arbitrator will
																					be selected under the administrator’s rules, except that the arbitrator must be a lawyer with at least ten
																					(10) years of experience or a retired judge unless the parties agree otherwise.
																				   </li>
																				   <li>
																				   	Non-Waiver. Even if all parties have elected to litigate a Claim in court, you or we may elect arbitration
																					with respect to any Claim made by a new party or any new Claim asserted in that lawsuit (including a
																					Claim initially asserted on an individual basis but modified to be asserted on a class, representative or
																					multi-party basis), and nothing in that litigation shall constitute a waiver of any rights under this Arbitration
																					Provision. This Arbitration Provision will apply to all Claims, even if the facts and circumstances giving
																					rise to the Claims existed before the effective date of this Arbitration Provision.

																				   </li>
																				   <li>
																				   	Location And Costs. The arbitrator may decide that an in-person hearing is unnecessary and that he
																					or she can resolve a Claim based on the papers submitted by the parties and/or through a telephone
																					hearing. However, any arbitration hearing that you attend will take place in a location that is reasonably
																					convenient for you. We will consider any good faith request you make for us to pay the administrator’s or
																					arbitrator’s filing, administrative, hearing, and/or other fees if you cannot obtain a waiver of such fees
																					from the administrator, and we will not seek or accept reimbursement of any such fees we agree to pay.
																					We will also pay any fees or expenses we are required by law to pay or that we must pay in order for this
																					Arbitration Provision to be enforced. We will pay the reasonable fees and costs you incur for your
																					attorneys, experts, and witnesses if you are the prevailing party in an arbitration Proceeding or if we are
																					required to pay such amounts by applicable law or by the administrator’s rules. The arbitrator shall not
																					limit the attorneys’ fees and costs to which you are entitled because your Claim is for a small amount.
																					Notwithstanding any language in this Arbitration Provision to the contrary, if the arbitrator finds that any
																					Claim or defense is frivolous or asserted for an improper purpose (as measured by the standards set
																					forth in Federal Rule of Civil Procedure 11(b)), then the arbitrator may award attorneys’ and other fees
																					related to such Claim or defense to the injured party so long as such power does not impair the
																					enforceability of this Arbitration Provision.
																				   </li>
																				   <li>
																				   	No Class Actions Or Similar Proceedings; Special Features Of Arbitration. <b>IF YOU OR WE ELECT
																					TO ARBITRATE A CLAIM, NEITHER YOU NOR WE WILL HAVE THE RIGHT TO: (i) HAVE A COURT
																					OR A JURY DECIDE THE CLAIM; (ii) OBTAIN INFORMATION PRIOR TO THE HEARING TO THE
																					SAME EXTENT THAT YOU OR WE COULD IN COURT; (iii) PARTICIPATE IN A CLASS ACTION IN
																					COURT OR IN ARBITRATION, EITHER AS A CLASS REPRESENTATIVE, CLASS MEMBER OR
																					CLASS OPPONENT; (iv) ACT AS A PRIVATE ATTORNEY GENERAL IN COURT OR IN
																					ARBITRATION; OR (v) JOIN OR CONSOLIDATE CLAIM(S) INVOLVING YOU WITH CLAIMS
																					INVOLVING ANY OTHER PERSON. THE RIGHT TO APPEAL IS MORE LIMITED IN ARBITRATION
																					THAN IN COURT. OTHER RIGHTS THAT YOU WOULD HAVE IF YOU WENT TO COURT MAY ALSO
																					NOT BE AVAILABLE IN ARBITRATION.</b>

																				   </li>
																				   <li>
																				   	Getting Information. In addition to the parties’ rights under the administrator’s rules to obtain
																					information prior to the hearing, either party may ask the arbitrator for more information from the other party. The arbitrator will decide the issue in his or her sole discretion, after allowing the other party the
																					opportunity to object.
																				   </li>
																				   <li>
																				   	Effect of Arbitration Award. Any court with jurisdiction may enter judgment upon the arbitrator’s award.
																					The arbitrator’s award will be final and binding, except for: (i) any appeal right under the Federal
																					Arbitration Act, 9 U.S.C. §1, et seq. (the “FAA”); and (ii) Claims involving more than $50,000 (including
																					Claims that may reasonably require injunctive relief costing more than $50,000). For Claims involving
																					more than $50,000, any party may appeal the award to a three-arbitrator panel appointed by the
																					administrator, which will reconsider anew any aspect of the initial award that is appealed. The panel’s
																					decision will be final and binding, except for any appeal right under the FAA. Costs in connection with
																					any such appeal will be borne in accordance with subsection (e) of this Arbitration Provision.

																				   </li>
																				   <li>
																				   	Governing Law. This Lease involves interstate commerce and this Arbitration Provision shall be
																					governed by the Federal arbitration Act (FAA), and not Federal or state rules of civil procedure or
																					evidence or any state laws that pertain specifically to arbitration. To the extent that state law bears on
																					the enforceability of this Arbitration Law, Texas law shall govern. The arbitrator is bound by the terms of
																					this Arbitration Provision. The arbitrator shall follow applicable substantive law to the extent consistent
																					with the Federal arbitration Act, 9 USC Sec 1 and following, applicable statutes of limitation and applicable
																					privilege rules, and shall be authorized to award all remedies available in an individual lawsuit under
																					applicable substantive law, including, without limitation, compensatory, statutory, and punitive damages
																					(which shall be governed by the constitutional standards applicable in judicial proceedings), declaratory,
																					injunctive and other equitable relief, and attorneys’ fees and costs. The arbitrator shall issue a reasoned
																					written decision sufficient to explain the essential findings and conclusions on which the award is based.
																				   </li>
																				   <li>
																				   	Survival, Severability, Primacy. In the event of any conflict or inconsistency between this Arbitration
																					Provision and the administrator’s rules or the rest of this Lease, this Arbitration Provision will govern. This
																					Arbitration Provision shall survive the full payment of any amounts due under this Lease; any rescission
																					or cancellation of this Lease; any exercise of a self-help remedy; our sale or transfer of this Lease or our
																					rights under this Lease; any legal proceeding by us to collect a debt owed by you; and your (or our)
																					bankruptcy. If any part of this Arbitration Provision cannot be enforced, the rest of this Arbitration
																					Provision will continue to apply. However, if the Class Action and Multi-Party Claim Waiver is declared
																					invalid in a proceeding between you and us, without in any way impairing the right to appeal such
																					decision, this entire Arbitration Provision (other than this sentence) shall be null and void in such
																					proceeding.
																				   </li>
																				   <li>
																				   	Pre-Dispute Resolution Procedure. Before a Complaining Party asserts a Claim in any Proceeding
																					(including as an individual litigant or as a member or representative of any class or proposed class), the
																					Complaining Party shall give the Defending Party: (1) a Claim Notice providing at least thirty (30) days’
																					written notice of the Claim and explaining in reasonable detail the nature of the Claim and any supporting
																					facts; and (ii) a reasonable good faith opportunity to resolve the Claim on an individual basis without the
																					necessity of a Proceeding. If you are the Complaining Party, you must send any Claim Notice to us at
																					12200 Gulf Freeway, Suite 544 Houston TX 77034, Attn.: Legal Dispute (or such other address as we
																					shall subsequently provide to you). If we are the Complaining Party, we will send the Claim Notice to you
																					at your address appearing in our records or, if you are represented by an attorney, to your attorney at his
																					or her office address. If the Complaining Party and the Defending Party do not reach an agreement to
																					resolve the Claim within thirty (30) days after the Claim Notice is received, the Complaining Party may
																					commence a Proceeding, subject to the terms of this Arbitration Provision. Neither the Complaining Party
																					nor the Defending Party shall disclose in any Proceeding the amount of any settlement demand made by
																					the Complaining Party or any settlement offer made by the Defending Party until after the arbitrator or
																					court determines the amount, if any, to which the Complaining Party is entitled (before the application of
																					subsection (l) of this Arbitration Provision). No settlement demand or settlement offer may be used in any
																					Proceeding as evidence or as an admission of any liability or damages.
																				   </li>
																				   <li>
																				   	Special Payment. If: (i) you submit a Claim Notice in an arbitration Proceeding on your own behalf
																					(and not on behalf of any other party) and comply with all of the requirements (including timing and
																					confidentiality requirements) of subsection (k); (ii) we refuse to provide you with the money damages you
																					request; and (iii) the arbitrator issues you an award that is greater than the latest money damages you
																					requested at least ten (10) days before the date the arbitrator was selected, then we will pay you the
																					amount of the award or $7,500, whichever is greater, in addition to the attorneys' fees and expenses
																					(including expert witness fees and costs) to which you are otherwise entitled. We encourage you to
																					address all Claims you have in a single Claim Notice and/or a single arbitration. Accordingly, this $7,500
																					minimum award is a single award that applies to all Claims you have asserted or could have asserted in
																					the arbitration, and multiple awards of $7,500 are not contemplated by this subsection (l).

																				   </li>
																			   </ol>
																		   </li>
                                                                        </ol>

                                                                    </div>
																	<div class="col-md-12 col-sm-12 col-12">
																		<h6 class=" inv-title" style="color:black"><b>NOTICE TO LESSEE: (1) DO NOT SIGN THIS LEASE BEFORE YOU READ IT OR IF IT CONTAINS ANY
																		BLANK SPACES. (2) YOU ARE ENTITLED TO AN EXACT COPY OF THIS LEASE YOU SIGN. KEEP IT TO
																		PROTECT YOUR LEGAL RIGHTS. (3) YOU HAVE THE RIGHT TO EXERCISE AN EARLY PURCHASE
																		OPTION THAT WILL RESULT IN A LOWER COST TO ACQUIRE OWNERSHIP. BY SIGNING THIS LEASE:
																		(1) YOU AGREE TO ALL ITS TERMS, INCLUDING THE EFT AUTHORIZATION (¶ 8) AND ARBITRATION
																		PROVISION (¶ 21); AND (2) YOU ACKNOWLEDGE RECEIPT OF A COMPLETED COPY OF THIS LEASE.</b>
																		</h6>
																	</div>
																	<div class="col-md-12 col-sm-12 col-12">
																		<div class="row">
																			<div class="col-md-5 col-sm-5 col-5">
																				<div style="height:200px"></div>
																				<div style="border-top: 2px solid 
																				black;">
																				Lessee/Prospective Purchaser</div>
																			</div>
																			<div class="col-md-4 col-sm-4 col-4">
																				<div style="height:200px"></div>
																				<div style="border-top: 2px solid black;">Date</div>
																			</div>
																			
																			<div class="col-md-3 col-sm-3 col-3"></div>
																		</div>
																	</div>
																	<div class="col-md-12 col-sm-12 col-12">
																		<p class="font-16 mt-5">
																		Intending to be legally bound, UIG Lease, LLC, caused this Lease to be signed on its behalf.
																		</p>
																	

																	</div>
																	<div class="col-md-12 col-sm-12 col-12">
																		<div class="row">
																			<div class="col-md-5 col-sm-5 col-5">
																				<div style="height:200px"></div>
																				<div style="border-top: 2px solid 
																				black;">
																				<p>Lessee/Prospective Purchaser</p></div>
																			</div>
																			<div class="col-md-4 col-sm-4 col-4">
																				<div style="height:200px"></div>
																				<div style="border-top: 2px solid black;"><p>Date</p></div>
																			</div>
																			
																			<div class="col-md-3 col-sm-3 col-3"></div>
																		</div>
																	</div>
                                                                    
                                                                </div>
                                                                
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

                                        <div class="invoice-container mt-5 ">
											<div class="invoice-inbox">
												<div id="ct" class="">
													<div class="invoice-00001">
														<div class="content-section " >
															<div class="container mb-5 mt-5 p-5" >
																<div class="row">
                                                                    <div class="col-md-12 mt-3">
                                                                        <h5  style="text-align:center">
																			<b>Recurring Payment Authorization Form</b>
                                                                        </h5>
                                                                        
																		<p class="mt-3">
																		Schedule your payment to be automatically deducted from your bank account, or charged to your Visa, MasterCard,
																		American Express or Discover Card. Just complete and sign this form to get started!
																		<br><br>
																		<b>
																		Recurring Payments Will Make Your Life Easier:
																		</b>
																		<ul>
																			<li>It’s convenient (saving you time and postage)</li>
																			<li>Your payment is always on time (even if you’re out of town), eliminating late charges</li>
																		</ul>
																		</p>
																		<p>
																		<b>
																		Here’s How Recurring Payments Work: 
																		</b>
																		<br>
																		You authorize regularly scheduled charges to your checking/savings account or credit card. You will be charged the
																		amount indicated below each billing period. A receipt for each payment will be emailed to you and the charge will
																		appear on your bank statement as an “ACH Debit.” You agree that no prior-notification will be provided unless the date
																		or amount changes, in which case you will receive notice from us at least 5 days prior to the payment being collected.
																		</p>
																		<div style="border-top:3px black solid;"></div>
																		
																		
                                                                    </div>
																	<div class="col-md-12 col-sm-12 col-12">
																		<p class="mt-2">
																			<b>
																			Please complete the information below:
																			</b><br>
																			I ______________________________ authorize UIG Leasing, LLC to charge my credit card or withdraw from my
																			bank account indicated below for $_____________ on a_____________ basis, total number of _____________
																			payments of my Lease #:______________________.
																		</p> 
																	</div>
																	<div class="col-md-12 col-sm-12 col-12">
																		<div class="row">
																				<div class="col-md-6 col-sm-6 col-6"><p>Billing Address ____________________________ </p></div>
																				<div class="col-md-6 col-sm-6 col-6"><p>Phone# ________________________</p></div>
																				<div class="col-md-6 col-sm-6 col-6"><p>City, State, Zip ____________________________</p> </div>
																				<div class="col-md-6 col-sm-6 col-6"><p>Email ________________________</p> </div>
																		</div>
																	</div>	
																	<div class="col-md-12 col-sm-12 col-12">
																		<div class="row mt-3">
																				<div class="col-md-6 col-sm-6 col-6 ">	
																					<p style="text-align:center;">Checking/ Savings Account </p>
																					<div class="border p-3">
																						
																						<div>
																							<input type="checkbox" class="ml-3"> Checking
																							<input type="checkbox" class="ml-3"> Savings
																						</div>	
																						<div class="mt-1">
																							<div>
																								<p>Name on Acct ____________________</p>
																							</div>
																							<div>
																								<p>Bank Name ____________________</p>
																							</div>
																							<div>
																								<p>Account Number ____________________</p>
																							</div>
																							<div>
																								<p>Bank Routing # ____________________</p>
																							</div>
																							<div>
																								<p>Bank City/State ____________________</p>
																							</div>
																						</div>
																					</div>
																				</div>
																				<div class="col-md-6 col-sm-6 col-6 ">	
																					<p style="text-align:center;">Credit Card </p>
																					<div class="border p-3">
																						<div>
																							<input type="checkbox" class="ml-3"> Visa
																							<input type="checkbox" class="ml-3"> MasterCard
																							<br>
																							<input type="checkbox" class="ml-3"> Amex
																							<input type="checkbox" class="ml-3"> Discover
																						</div>
																						
																						<div class="mt-2">
																							
																							<div>
																								<p>Cardholder Name ____________________</p>
																							</div>
																							<div>
																								<p>Account Number____________________</p>
																							</div>
																							<div>
																								<p>Exp. Date ____________________</p>
																							</div>
																							<div>
																								<p>CVV # ____________________</p>
																							</div>
																						</div>
																					</div>
																				</div>
																				
																		</div>
																	</div>	
																	<div class="col-md-12 col-sm-12 col-12">
																		<div class="row mt-5">
																			<div class="col-md-8 col-sm-8 col-8">
																				<p>
																				SIGNATURE_____________________________________________________
																				</p>
																			</div>
																			<div class="col-md-4 col-sm-4 col-4">
																				<p>DATE________________</p>
																			</div>
																			<div class="col-md-12 col-sm-12 col-12">
																				<p class="contract_container">
																				I understand that this authorization will remain in effect until I cancel it in writing, and I agree to notify UIG Leasing, LLC in writing of any changes in my
																				account information or termination of this authorization at least 15 days prior to the next billing date. If the above noted payment dates fall on a weekend
																				or holiday, I understand that the payments may be executed on the next business day. For ACH debits to my checking/savings account, I understand
																				that because these are electronic transactions, these funds may be withdrawn from my account as soon as the above noted periodic transaction dates. In
																				the case of an ACH Transaction being rejected for Non Sufficient Funds (NSF) I understand that UIG Leasing, LLC may at its discretion attempt to
																				process the charge again within 10 days, and agree to an additional $30.00 charge for each attempt returned NSF which will be initiated as a separate
																				transaction from the authorized recurring payment. I acknowledge that the origination of ACH transactions to my account must comply with the provisions
																				of U.S. law. I certify that I am an authorized user of this credit card/bank account and will not dispute these scheduled transactions with my bank or credit
																				card company; so long as the transactions correspond to the terms indicated in this authorization form. 

																				</p>
																			</div>
																		</div>

																	</div>
                                                                    
                                                                </div>
                                                                
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="invoice-container mt-5 " >
											<div class="invoice-inbox">
												<div id="ct" class="">
													<div class="invoice-00001">
														<div class="content-section " >
															<div class="container mb-5 mt-5 p-5" >
															<!-- <div class="inv--head-section inv--detail-section"> -->
															<p style="page-break-after: always;">&nbsp;</p>
																<div class="row">
                                                                     <div class="col-md-5 col-sm-5 col-5">
																		<h4>UIG LEASING</h4>
																	 </div>
																	 <div class="col-md-3 col-sm-3 col-3">
																			<img src="{{asset('public/uigleasing.png')}}" height="50px" alt="">
																	 </div>
																	 <div class="col-md-4 col-sm-4 col-4">
																			<p><b>12200 Gulf Freeway Suite # 544
																				Houston, TX 77034</b></p>
																	 </div>
                                                                </div>
															<!-- </div>	 -->
																<div class="row mt-5" >
																	<div class="col-md-12 col-sm-12 col-12">
																			<h4 style="text-align:center"><u>RECEIPT OF GOODS</u></h4>
																	</div>
																	<div class="col-md-12 col-sm-12 col-12">
																		<p>
																		Customer Name(S) _________________________________________________________________________
																		Customer Store Acct. #:_____________________________ Customer Invoice #: _____________________
																		Date Accepted___________________ Customer Tel.__________________________
																		Dealer Name (purchasing from): ________________________________________________
																		Purchase Amount: _______________ Lease ID #:__________________________

																		</p>
																		<p>
																			<b>
																			I/We verify that all merchandise mentioned below has been received via delivery,made available for pick up, or will initiate purchase of any custom merchandise.
																			</b>
																		</p>
																		<p>
																			List of Items Leased; 

																		</p>
																		<div class="mt-5" style="border-top:2px black solid;"></div>
																		<div class="mt-5" style="border-top:2px black solid;"></div>
																		<div class="mt-5" style="border-top:2px black solid;"></div>

																		<p class="mt-4" >
																		Please note any damage, marked or imperfections:
																				
																		</p>
																		<div class="mt-3" style="border-top:2px black solid;"></div>
																		<p class="mt-1">
																		<b>Failure to note any damages, marks, or imperfections on goods received indicates satisfactory condition of merchandise.</b>
																		<br><br>
																		I/We acknowledge that signing and dating below indicates the start of my financing contract agreement 
																		</p>
																	</div>
																	<div class="col-md-12 col-sm-12 col-12">
																		<p>Delivery Date: ____________</p>
																	</div>
																	<div class="col-md-12 col-sm-12 col-12">
																		<div class="row">
																				<div class="col-md-6 col-sm-6 col-6 mt-5"><p style="border-top:2px black solid;">Customer Signature </p></div>
																				<div class="col-md-6 col-sm-6 col-6 mt-5"><p style="border-top:2px black solid;">Store Rep. Signature</p></div>
																				<div class="col-md-6 col-sm-6 col-6 mt-5"><p style="border-top:2px black solid;">Customer Full Name </p> </div>
																				<div class="col-md-6 col-sm-6 col-6 mt-5"><p style="border-top:2px black solid;">Store Rep. Name </p> </div>
																		</div>
																	</div>
																	<div class="col-md-12 col-sm-12 col-12">
																		<h5 class="mt-5" style="text-align:center"><b>(This form must be SIGNED, DATED, & SUBMITTED for funding)
																		</b></h5>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									
									</div>
                                    
									<div class="col-xl-3">
										<div class="invoice-actions-btn">
											<div class="invoice-action-btn">
												<div class="row">
													<div class="col-xl-12 col-md-3 col-sm-6">
														<a href="javascript:void(0);" class="btn btn-secondary btn-print  action-print">Print</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
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
		<script src="{{asset('public/assets/js/apps/invoice-preview.js')}}"></script>
	</body>
</html>