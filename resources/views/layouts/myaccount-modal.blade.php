<!-- My account Modal -->
@if (auth()->check())
    <div class="modal my-account-modal" id="accountModal" tabindex="-1" role="dialog" aria-hidden="true"
        data-bs-backdrop="false">

        <div class="modal-dialog cart-modal-dialog-container account-modal-subcontainer">
            <div class="modal-content rounded-0 px-3 account-modal-content">
                <div class="modal-header">
                    <button type="button" class="account-modal-btn" data-mdb-dismiss="modal" aria-label="Close">
                        <i class="fa fa-long-arrow-left" aria-hidden="true" style="font-size:20px"></i>
                    </button>
                </div>
                <div class="profile-container ">
                    <div class="profile-sub-conatiner d-flex mt-2">
                        <a href="{{ url('myaccount') }}">
                            <div class="text-container">
                                <h3>{{ auth()->user()->first_name ?? null }} {{ auth()->user()->last_name ?? null }}
                                </h3>
                                <p>{{ auth()->user()->email ?? null }}</p>
                            </div>
                        </a>
                        <div class="img-section circle-img">
                            <a href="{{ url('myaccount') }}">
                                <h3 class="text-capitalize">
                                    {{ substr(auth()->user()->first_name ?? auth()->user()->email, 0, 1) }}</h3>
                            </a>
                            <!-- <img src="{{ URL::asset('media/img/Navbar/account.svg') }}" class="me-2" alt="account"> -->
                        </div>
                        <div>
                        </div>
                    </div>
                    <h5 class="mt-4 ms-2" style="color: #756b6b;">Account</h5>

                    <div class="modal-body list-accpunt-container">
                        <ul class="account-list-container mb-3" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item px-0" href="{{ url('myaccount') }}"><i class="fa fa-user"
                                        aria-hidden="true"></i>My Account</a></li>
                            <li><a class="dropdown-item px-0" href="{{ url('/myorder') }}"><i class="fa fa-file-text"
                                        aria-hidden="true"></i>Orders</a></li>
                        </ul>
                    </div>

                    <h5 class="mt-4 ms-2" style="color: #756b6b;">More</h5>

                    <div class="modal-body list-accpunt-container">
                        <ul class="account-list-container mb-3" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item px-0" href="{{ url('/privacy-policy') }}"><i class="fa fa-tasks"
                                        aria-hidden="true"></i>Privacy Policy</a></li>
                            <li><a class="dropdown-item px-0" href="{{ url('/conditions') }}"><i
                                        class="fa fa-check-circle" aria-hidden="true"></i>Conditions Of Use</a></li>
                        </ul>
                    </div>
                    <h5 class="mt-4 ms-2" style="color: #756b6b;">Events</h5>

                    <div class="modal-body list-accpunt-container mb-8">
                        <ul class="account-list-container mb-3" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item px-0" href="{{ url('/event/mothers-day') }}"><i
                                        class="fa fa-user" aria-hidden="true"></i>Thanksgiving</a></li>
                            <li><a class="dropdown-item px-0" href="{{ url('/event/thanksgiving') }}"><i
                                        class="fa fa-tree" aria-hidden="true"></i>Christmas</a></li>
                            <li><a class="dropdown-item px-0" href="{{ url('logout') }}"><i class="fa fa-power-off"
                                        aria-hidden="true"></i>Log Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
@endif
<!-- My account Modal -->
