
        <div class="overlay"></div>
        <div class="search-overlay"></div>
        <!--  BEGIN SIDEBAR  -->
        <div class="sidebar-wrapper sidebar-theme" >
            
            <nav id="sidebar">
                <div class="shadow-bottom"></div>   

                <ul class="list-unstyled menu-categories" id="accordionExample">
                    <li class="menu ">
                        <a href="{{Url('employee/customer_service/dashboard')}}" class="dropdown-toggle" id="single">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                <span>Dashboard</span>
                            </div>
                            
                        </a>
                        
                    </li>
                    <li class="menu">
                        <a href="{{Url('employee/customer_service/employee_info')}}" class="dropdown-toggle" id="single">
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
                        <a href="{{Url('employee/customer_service/non_approved_ticket')}}" class="dropdown-toggle" id="single">
                            <div class="">
                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
                            <span>Tickects</span>
                            </div>
                            
                        </a>
                    </li>
                    <li class="menu">
                        <a href="{{Url('employee/customer_service/view_dealers')}}" class="dropdown-toggle" id="single">
                            <div class="">
                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                            <span>Dealers</span>
                            </div>
                            
                        </a>
                    </li>
                    <li class="menu">
                        <a href="{{Url('employee/customer_service/view_customers')}}" class="dropdown-toggle" id="single">
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
                                <a href="{{Url('employee/customer_service/non_approved_contract')}}"> Non Approved</a>
                            </li>
                            <li>
                                <a href="{{Url('employee/customer_service/approved_contract')}}"> Approved</a>
                            </li>
                            <li>
                                <a href="{{Url('employee/customer_service/rejected_contract')}}"> Rejected</a>
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
                                <a href="{{Url('employee/customer_service/add_notes')}}"> Add Notes</a>
                            </li>
                            <li>
                                <a href="{{Url('employee/customer_service/view_notes')}}"> View Notes</a>
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
                                <a href="{{Url('employee/customer_service/add_task')}}"> Add Task</a>
                            </li>
                            <li>
                                <a href="{{Url('employee/customer_service/view_todo_list')}}"> View Tasks</a>
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
