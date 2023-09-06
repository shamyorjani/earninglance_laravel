<?php
// if(isset($_SESSION['user'])){
//   $username = $_SESSION['user'];
//   $uq = mysqli_query($con,"SELECT * FROM users WHERE username = '$username'");
//   $urow = mysqli_fetch_assoc($uq);
//   $name = $urow['name'];
//   $role = $urow['role'];
//   $setq = mysqli_query($con,"SELECT * FROM settings WHERE id = 1");
//   $setrow = mysqli_fetch_assoc($setq);
//   $website = $setrow['name'];
//   $url = $setrow['url'];
//   $msg = "";
// }
// else{
//   $_SESSION['msg'] = "Please Login to continue first! _danger";
?>
{{-- <script>location.replace('../');</script> --}}
<?php
// }
?>
<div class="wrapper ">
    <div class="sidebar" data-color="orange">
        <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
        <div class="logo">
            <a href="index.php" class="simple-text logo-normal">
                <img src="{{ url('user_assets/img/logo.png') }}">
            </a>
        </div>
        <div class="sidebar-wrapper" id="sidebar-wrapper">
            <ul class="nav">
                <li class="">
                    <a href="{{ url('/dashboard') }}">
                        <i class="now-ui-icons design_app"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                @if ($user->role == 2)
                    <li>
                        <a href="{{ url('/payment_methods') }}">
                            <i class="now-ui-icons business_bank"></i>
                            <p>Payment Methods</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/user_payments') }}">
                            <i class="now-ui-icons business_money-coins"></i>
                            <p>Users Payments</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/withdrawal_request') }}">
                            <i class="now-ui-icons files_paper"></i>
                            <p>Withdrawl Requests</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/plans') }}">
                            <i class="now-ui-icons files_single-copy-04"></i>
                            <p>Plans</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/users') }}">
                            <i class="now-ui-icons users_single-02"></i>
                            <p>Users</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/contact') }}">
                            <i class="now-ui-icons ui-2_chat-round"></i>
                            <p>Contact</p>
                        </a>
                    </li>
                    <li>
                        <button class="li_btn" type="button" data-toggle="modal" data-target="#website">
                            <i class="now-ui-icons loader_gear"></i>
                            Website Settings
                        </button>
                    </li>
                @else
                    <li>
                        <a href="{{ route('logout') }}">
                            <i class="now-ui-icons users_single-02"></i>
                            <p>Logout</p>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
    <div class="main-panel" id="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-absolute" style="background-color: #F96332;">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <div class="navbar-toggle">
                        <button type="button" class="navbar-toggler">
                            <span class="navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </button>
                    </div>
                    <a class="navbar-brand" href="index.php">
                        <?php
                        if ($user->role == 1) {
                            echo 'User';
                        } elseif ($user->role == 2) {
                            echo 'Admin';
                        }
                        ?> Dashboard
                    </a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                    aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navigation">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown me-2">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="now-ui-icons ui-2_chat-round"></i>
                                <span
                                    class="position-absolute top-1 start-100 translate-middle badge rounded-pill bg-danger">
                                    {{-- @foreach ($withdrawal_request_all as $withdraw_one) --}}
                                        @if ($user->role == 2)
                                            {{ $total_withdraw_requests_zero }}+
                                        @else
                                            {{ $total_withdraw_requests }}+
                                        @endif
                                    {{-- @endforeach --}}
                                    <span class="visually-hidden">unread messages</span>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                {{-- @if (isset($withdrawal_request_desc_order)) --}}
                                    @if ($user->role == 1)
                                        @foreach ($withdrawal_request_desc_order as $withdraw_order)
                                            <a class="dropdown-item"><strong>Your Payment Request of Rs.
                                                    {{ $withdraw_order->amount }}
                                                    @if ($withdraw_order->status == 1)
                                                        has been <span
                                                            class="text-success font-weight-bold">Approved</span>.
                                                    @elseif($withdraw_order->status == 2)
                                                        has been <span
                                                            class="text-danger font-weight-bold">Disapproved</span>.
                                                    @elseif ($withdraw_order->status == 0)
                                                        is <span class="text-warning font-weight-bold">Pending</span>.
                                                    @endif
                                                </strong>
                                            </a>
                                        @endforeach
                                    @elseif ($user->role == 2)
                                        @foreach ($withdrawal_request_all as $withdraw_one)
                                            @if ($withdraw_one->status == 0)
                                                <a class="dropdown-item"><strong>Withdrawal Request of Rs.
                                                        {{ $withdraw_one->amount }} from
                                                        {{ $withdraw_one->username }}
                                                        is <span class="text-warning font-weight-bold">Pending</span>.
                                                    </strong>
                                                </a>
                                            @endif
                                        @endforeach
                                    @endif
                                {{-- @endif --}}
                                <?php
                                //     }
                                // }
                                // else
                                // if($role == 2){
                                //     $withnotq = mysqli_query($con,"SELECT * FROM withdrawl_request WHERE status = 0  ORDER BY id DESC LIMIT 4");
                                //     while($withnotrow = mysqli_fetch_array($withnotq)){
                                //         $notst = $withnotrow['status'];
                                //         $notuser = $withnotrow['username'];
                                ?>
                                {{-- <a href="wreqest.php" class="dropdown-item">Withdrawl Request of 67 Rs from user
                                    is
                                    pending</a> --}}


                                <?php
                                // if($role == 1){
                                //     $withnotq = mysqli_query($con,"SELECT * FROM withdrawl_request WHERE username = '$username' ORDER BY id DESC LIMIT 4");
                                //     while($withnotrow = mysqli_fetch_array($withnotq)){
                                //         $notst = $withnotrow['status'];
                                ?>

                                {{-- <a class="dropdown-item" >Your Payment Request of amount Rs --}}
                                <?php
                                // if($notst == 1){
                                //     echo "has been Approved!";
                                // }
                                // else
                                // if($notst == 2){
                                //     echo "has been disapproved";
                                // }
                                // else
                                // if($notst == 0){
                                //     echo "is pending";
                                // }
                                ?>
                                <?php
                                //     }
                                // }
                                ?>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="now-ui-icons users_single-02"></i>
                                <p>{{ $user->name }}</p>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="{{ url('/logout') }}">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->



        <div class="modal fade bd-example-modal-sm " id="website" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="index.php" method="POST">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Website Title"
                                            name="title">
                                        <br>
                                        <input type="text" class="form-control" placeholder="Website URL"
                                            name="url">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="update_website" class="btn btn-primary">Save
                                changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
