
        <div class="overlay"></div>
        <div class="search-overlay"></div>
        <!--  BEGIN SIDEBAR  -->
        <div class="sidebar-wrapper sidebar-theme" >
            
            <nav id="sidebar">
                <div class="shadow-bottom"></div>   

                <ul class="list-unstyled menu-categories" id="accordionExample">
                    <li class="menu ">
                        <a href="{{Url('employee/admin/dashboard')}}" class="dropdown-toggle" id="single">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                <span>Dashboard</span>
                            </div>
                            
                        </a>
                        
                    </li>
                    <li class="menu">
                        <a href="{{Url('employee/admin/employee_info')}}" class="dropdown-toggle" id="single">
                            <div class="">
                                <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M12 3C14.21 3 16 4.79 16 7S14.21 11 12 11 8 9.21 8 7 9.79 3 12 3M16 13.54C16 14.6 15.72 17.07 13.81 19.83L13 15L13.94 13.12C13.32 13.05 12.67 13 12 13S10.68 13.05 10.06 13.12L11 15L10.19 19.83C8.28 17.07 8 14.6 8 13.54C5.61 14.24 4 15.5 4 17V21H20V17C20 15.5 18.4 14.24 16 13.54Z" />
                                </svg>
                                @if(session()->get('profile_status')>=99)
                                <span>Profile &nbsp;&nbsp;&nbsp;<span class="badge badge-success" style="color:white;">
                                {{session()->get('profile_status')."%"}}</span></span>
                                @else
                                <span>Profile &nbsp;&nbsp;&nbsp;<span class="badge badge-danger" style="color:white;">
                                {{session()->get('profile_status')."%"}}</span></span>
                                @endif
                            </div>
                            
                        </a>
                    </li>
                    <li class="menu">
                        <a href="{{Url('employee/admin/non_approved_ticket')}}" class="dropdown-toggle" id="single">
                            <div class="">
                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
                            <span>Tickects</span>
                            </div>
                            
                        </a>
                    </li>
                    
                    <li class="menu">
                        <a href="#employee" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" id="two">
                            <div class="">
                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                <span>Employee</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="employee" data-parent="#accordionExample">
                            
                            <li>
                                <a href="{{Url('employee/admin/add_employee')}}"> Add Employee</a>
                            </li>
                            <li>
                                <a href="{{Url('employee/admin/view_employee')}}"> View Employee</a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu">
                        <a href="{{Url('employee/admin/view_dealers')}}" class="dropdown-toggle" id="single">
                            <div class="">
                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                <span>Dealer</span>
                            </div>
                            
                        </a>
                    </li>
                    <li class="menu">
                        <a href="{{Url('employee/admin/view_customers')}}" class="dropdown-toggle" id="single">
                            <div class="">
                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                <span>Customer</span>
                            </div>
                            
                        </a>
                    </li>
                    <li class="menu">
                        <a href="#Lease" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" id="two">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-briefcase"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg>
                                <span>Contract</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="Lease" data-parent="#accordionExample">
                            <li>
                                <a href="{{Url('employee/admin/non_approved_contract')}}"> Non Approved</a>
                            </li>
                            <li>
                                <a href="{{Url('employee/admin/approved_contract')}}"> Approved</a>
                            </li>
                            <li>
                                <a href="{{Url('employee/admin/rejected_contract')}}"> Rejected</a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu">
                        <a href="#usernotes" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" id="two">
                            <div class="">
                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect></svg>
                                <span>Notes</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="usernotes" data-parent="#accordionExample">
                            <li>
                                <a href="{{Url('employee/admin/add_notes')}}"> Add Notes</a>
                            </li>
                            <li>
                                <a href="{{Url('employee/admin/view_notes')}}"> View Notes</a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu">
                        <a href="#usertask" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" id="two">
                            <div class="">
                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect></svg>
                                <span>To do List</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="usertask" data-parent="#accordionExample">
                            <li>
                                <a href="{{Url('employee/admin/add_task')}}"> Add Task</a>
                            </li>
                            <li>
                                <a href="{{Url('employee/admin/view_todo_list')}}"> View Tasks</a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu">
                        <a href="#invoice" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" id="two">
                            <div class="">
                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg> 
                                <span> Customer Invoices</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="invoice" data-parent="#accordionExample">
                            <li>
                                <a href="{{Url('employee/admin/due_invoice_contract')}}"> Due</a>
                            </li>
                            <li>
                                <a href="{{Url('employee/admin/paid_invoice_contract')}}"> Paid</a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu">
                        <a href="#dealer_invoice" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" id="two">
                            <div class="">
                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg> 
                                <span>Dealer Invoices</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="dealer_invoice" data-parent="#accordionExample">
                            <li>
                                <a href="{{Url('employee/admin/dealer_due_invoice')}}"> Due</a>
                            </li>
                            <li>
                                <a href="{{Url('employee/admin/dealer_paid_invoice')}}"> Paid</a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu">
                        <a href="#transaction" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" id="two">
                            <div class="">
                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg> 
                                <span>Transactions</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="transaction" data-parent="#accordionExample">
                            <li>
                                <a href="{{Url('employee/admin/dealer_transaction')}}"> Dealer</a>
                            </li>
                            <li>
                                <a href="{{Url('employee/admin/customer_transaction')}}"> Customer</a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu">
                        <a href="{{Url('employee/admin/view_reports')}}" class="dropdown-toggle" id="single">
                            <div class="">
                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                            <span>Reports</span>
                            </div>
                            
                        </a>
                    </li>
                    <li class="menu">
                        <a href="#interestrate" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" id="two">
                            <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#000000" viewBox="0 0 50 50" width="50px" height="50px" stroke="currentColor"><path d="M 29.767578 2.0136719 C 29.49368 2.0344185 29.222672 2.1064374 28.966797 2.234375 L 25 4.1269531 L 20.962891 2.1992188 L 20.90625 2.1816406 C 19.999983 1.8795518 18.755476 2.0699109 18.09375 3.0625 L 15.505859 6.5410156 L 11.009766 6.6328125 L 10.941406 6.6445312 C 10.031572 6.79617 9.0111933 7.4763345 8.8417969 8.6621094 L 8.84375 8.640625 L 8.1230469 12.976562 L 4.0605469 15.191406 L 3.9941406 15.244141 C 3.2113074 15.870407 2.7186892 16.915833 3.0820312 18.005859 L 3.0839844 18.011719 L 4.53125 22.175781 L 2.1933594 25.863281 C 1.5591834 26.814545 1.7416918 28.110832 2.515625 28.884766 L 2.5195312 28.890625 L 5.6972656 31.976562 L 5.3339844 36.421875 L 5.3417969 36.363281 C 5.1669218 37.587407 5.995994 38.585253 6.9941406 38.917969 L 7.0175781 38.925781 L 11.291016 40.109375 L 13.019531 44.205078 L 13.033203 44.232422 C 13.544954 45.255923 14.629831 45.726407 15.660156 45.554688 L 15.677734 45.552734 L 20.044922 44.642578 L 23.523438 47.480469 L 23.5625 47.505859 C 23.986475 47.78851 24.484778 47.96875 25 47.96875 C 25.515222 47.96875 26.056097 47.813043 26.484375 47.384766 L 26.412109 47.451172 L 29.853516 44.642578 L 34.203125 45.548828 L 34.134766 45.53125 C 35.303312 45.86512 36.413187 45.140423 36.867188 44.232422 L 36.880859 44.205078 L 38.609375 40.109375 L 42.882812 38.925781 L 42.90625 38.917969 C 43.904397 38.585253 44.733469 37.587407 44.558594 36.363281 L 44.564453 36.421875 L 44.203125 31.976562 L 47.375 28.894531 L 47.304688 28.957031 C 48.247383 28.202875 48.420244 26.849524 47.65625 25.894531 L 47.71875 25.980469 L 45.361328 22.265625 L 46.726562 18.083984 L 46.730469 18.066406 C 47.024178 17.038424 46.69482 15.765376 45.632812 15.234375 L 41.878906 13.087891 L 41.15625 8.7402344 L 41.158203 8.7636719 C 41.003416 7.6801654 40.061581 6.7324219 38.900391 6.7324219 L 38.939453 6.7324219 L 34.501953 6.5507812 L 31.90625 3.0625 C 31.589162 2.586868 31.109563 2.2519266 30.582031 2.0996094 C 30.318265 2.0234507 30.041476 1.9929252 29.767578 2.0136719 z M 29.957031 3.921875 C 30.072625 3.898958 30.170554 3.9501668 30.294922 4.1367188 L 30.308594 4.1582031 L 33.498047 8.4492188 L 38.880859 8.6679688 L 38.900391 8.6679688 C 39.1392 8.6679688 39.196974 8.7206158 39.242188 9.0371094 L 39.242188 9.0488281 L 40.121094 14.3125 L 44.742188 16.955078 L 44.767578 16.966797 C 44.905116 17.035567 44.973902 17.162107 44.869141 17.53125 C 44.869141 17.53125 44.869141 17.533203 44.869141 17.533203 L 43.238281 22.533203 L 46.111328 27.064453 L 46.144531 27.105469 C 46.180541 27.150479 46.153033 27.397516 46.095703 27.443359 L 46.058594 27.472656 L 46.025391 27.505859 L 42.197266 31.222656 L 42.636719 36.607422 L 42.640625 36.636719 C 42.665625 36.81174 42.495492 37.011832 42.294922 37.080078 L 37.189453 38.492188 L 35.130859 43.369141 C 34.986105 43.657632 34.896344 43.733777 34.666016 43.667969 L 34.632812 43.658203 L 29.345703 42.558594 L 25.150391 45.980469 L 25.115234 46.015625 C 25.143514 45.987345 25.084774 46.03125 25 46.03125 C 24.91927 46.03125 24.81532 46.00346 24.654297 45.900391 L 20.554688 42.558594 L 15.339844 43.644531 C 15.171331 43.672621 14.860265 43.543787 14.769531 43.369141 L 12.708984 38.492188 L 7.6035156 37.078125 C 7.4036686 37.009347 7.232878 36.811261 7.2578125 36.636719 L 7.2636719 36.607422 L 7.703125 31.222656 L 3.8847656 27.515625 C 3.6586988 27.289558 3.6408166 27.186236 3.8066406 26.9375 L 3.8125 26.927734 L 6.6679688 22.423828 L 4.9179688 17.394531 L 4.9179688 17.392578 C 4.8834283 17.285762 4.9943751 16.9583 5.1953125 16.779297 L 9.8769531 14.224609 L 10.757812 8.9472656 L 10.757812 8.9375 C 10.787543 8.7293756 10.970335 8.6173212 11.246094 8.5664062 L 16.494141 8.4589844 L 19.691406 4.1582031 L 19.705078 4.1367188 C 19.840615 3.9334205 19.998642 3.9296968 20.28125 4.0214844 L 25 6.2734375 L 29.824219 3.9707031 L 29.833984 3.9667969 C 29.878109 3.9447346 29.9185 3.929514 29.957031 3.921875 z M 19.5 14 C 17.9 14 16.699219 14.900391 16.199219 16.400391 C 15.999219 17.000391 16 17.3 16 19.5 C 16 21.7 16.099219 22.099609 16.199219 22.599609 C 16.699219 23.999609 17.9 25 19.5 25 C 21.1 25 22.300781 24.099609 22.800781 22.599609 C 23.000781 21.999609 23 21.7 23 19.5 C 23 17.3 22.900781 16.900391 22.800781 16.400391 C 22.300781 15.000391 21.1 14 19.5 14 z M 30.400391 14 C 30.100391 14 30.000391 14.100781 29.900391 14.300781 L 18.099609 35.699219 C 17.999609 35.799219 18.100781 36 18.300781 36 L 19.699219 36 C 19.899219 36 19.999609 35.899219 20.099609 35.699219 L 32 14.300781 C 32 14.200781 32.000781 14 31.800781 14 L 30.400391 14 z M 19.5 16.099609 C 20.2 16.099609 20.700391 16.499609 20.900391 17.099609 C 21.000391 17.399609 21 17.699609 21 19.599609 C 21 21.399609 20.900391 21.7 20.900391 22 C 20.700391 22.7 20.2 23 19.5 23 C 18.8 23 18.299609 22.6 18.099609 22 C 17.999609 21.7 18 21.399609 18 19.599609 C 18 17.699609 18.099609 17.399609 18.099609 17.099609 C 18.299609 16.399609 18.8 16.099609 19.5 16.099609 z M 30.5 25 C 28.9 25 27.699219 25.900391 27.199219 27.400391 C 26.999219 28.000391 27 28.3 27 30.5 C 27 32.7 27.099219 33.099609 27.199219 33.599609 C 27.699219 34.999609 28.9 36 30.5 36 C 32.1 36 33.300781 35.099609 33.800781 33.599609 C 34.000781 32.999609 34 32.7 34 30.5 C 34 28.3 33.900781 27.900391 33.800781 27.400391 C 33.300781 26.000391 32.1 25 30.5 25 z M 30.5 27.099609 C 31.2 27.099609 31.700391 27.499609 31.900391 28.099609 C 32.000391 28.399609 32 28.699609 32 30.599609 C 32 32.399609 31.900391 32.7 31.900391 33 C 31.700391 33.7 31.2 34 30.5 34 C 29.8 34 29.299609 33.6 29.099609 33 C 28.999609 32.7 29 32.399609 29 30.599609 C 29 28.699609 29.099609 28.399609 29.099609 28.099609 C 29.299609 27.399609 29.8 27.099609 30.5 27.099609 z"/></svg>
                                <span>Interest Rate</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="interestrate" data-parent="#accordionExample">
                            <li>
                                <a href="{{Url('employee/admin/loan_interests')}}"> Loan</a>
                            </li>
                            <li>
                                <a href="{{Url('employee/admin/lease_interests')}}"> Lease</a>
                            </li>
                        </ul>
                    </li>
                                         
                </ul>
                
            </nav>

        </div>
        <!--  END SIDEBAR  -->

        <script type="text/javascript">
            const currentLocation=location.href;
            const menuItem= document.querySelectorAll('a');
            const menuLength= menuItem.length;
            

            for (let i=0; i<menuLength; i++) {

                if (menuItem[i].href==currentLocation) {
                    
                    var submenu=menuItem[i].parentElement;
                    const mainMenu=submenu.parentElement;
                    const mainLi=mainMenu.parentElement;

                    if (menuItem[i].getAttribute('id')=="single") {
                        menuItem[i].setAttribute("aria-expanded","true");
                        menuItem[i].setAttribute("data-active","true");
                        break;
                    }
                    else if (menuItem[i].getAttribute('id')=="menue") {
                        
                    }

                    else  {
                        menuItem[i].parentElement.className="active";
                        submenu.parentElement.className="collapse submenu list-unstyled show";
                        mainLi.firstElementChild.setAttribute("aria-expanded","true");
                        mainLi.firstElementChild.setAttribute("data-active","true");

                    }

                 }

            }
             
        </script>
