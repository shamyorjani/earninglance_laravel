<!DOCTYPE html>
<html lang="en">

<head>
    @include('user.inc.css')
</head>

<body>
    @include('user.inc.nav')
    <div class="content mt-5" style="min-height: 100vh;" data-color='orange'>
        <div class="row">
            {{-- @if ($user->role == 1) --}}
            <?php
            //     if(isset($_POST['confirmplan'])){
            //         $planid = $_POST['plan'];
            //         $image = $_FILES['image']['name'];
            //         $pmethod = $_POST['payment'];
            //         $logotargetdir = "payments/";
            //         $username = $_SESSION['user'];
            //         $logoname = $_FILES['image']['name'];
            //         $logotargetFilePath = $logotargetdir . $logoname;
            //         $gplanq = mysqli_query($con,"SELECT * FROM plans WHERE id = '$planid'");
            //         $gprow = mysqli_fetch_assoc($gplanq);
            //         $amount = $gprow['charges'];
            //         if($logoname != ""){
            //                 move_uploaded_file($_FILES["image"]["tmp_name"], '../'.$logotargetFilePath);
            //                 $paymentq = mysqli_query($con,"INSERT INTO `payments`(`username`, `plan_id`, `method_id`,        `amount`, `image`) VALUES ('$username','$planid','$pmethod','$amount','$logotargetFilePath')");
            //             if($paymentq){
            //
            ?>
            
            <script>
                //                     location.replace('index.php');
                //                 
            </script>
             <?php
            //             }
            //             else{
            //                 echo "Payment Error";
            //             }
            //         }
            //         else{
            //             echo "File Upload Failed";
            //         }
            
            //     }
            //     else
            //     if(isset($_GET['planid'])){
            //         $splanid = $_GET['planid'];
            ?>
            <?php 
    if ($user->role == '1')
    {
        if (isset($plans_with_id->id)) {
            ?>
            <div class="card text-center">
                <div class="card-header">
                    <h4>Complete the Payment</h4>
                </div>
                <div class="card-body p-3">
                    <form action="{{ url('/uploads') }}/{{ $plans_with_id->id }}" method="post"
                        enctype="multipart/form-data">
                        @csrf

                        <h5>Please pay Rs {{ $plans_with_id->charges }}</h5>
                        <h5>Select Account</h5>
                        <div class="row">
                            <div class="col-lg-4"></div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <input type="hidden" name="plan" value="plaind">
                                    <select required name="payment" class="form-control">
                                        @foreach ($pmethods as $pmethod)
                                            <option value="{{ $pmethod->id }}">
                                                Name:{{ $pmethod->name }} Acc_Number:{{ $pmethod->account_number }}
                                                Acc_Name:{{ $pmethod->account_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input required id="image" type="file" name="image" class="hidden">
                                    <label for="image" class="btn btn-round"
                                        style="background-color: #E3E3E3; color: #f96332;"><i
                                            class="fa-solid fa-image"></i> Upload Image</label>
                                </div>

                                <div class="form-group">
                                    <input type="submit" value="Confirm" name="confirmplan"
                                        class="btn btn-primary btn-round">
                                </div>
                            </div>
                            <div class="col-lg-4"></div>
                        </div>
                    </form>
                </div>
            </div>
            <?php
        }
            // else{
            // $plancheck = mysqli_query($con,"SELECT * FROM user_has_plan WHERE username = '$username'");
            // if(mysqli_num_rows($plancheck) == 1){
            //     $earnq = mysqli_query($con,"SELECT SUM(amount) as userearnings FROM withdrawl_request WHERE username = '$username' AND status = '1'");
            //     $erow = mysqli_fetch_assoc($earnq);
            //     $userearning = $erow['userearnings'];
            //     $upq = mysqli_query($con,"SELECT * FROM user_has_plan WHERE username ='$username'");
            //     $uprow = mysqli_fetch_assoc($upq);
            //     $pid = $uprow['plan_id'];
            //     $uplanq = mysqli_query($con,"SELECT * FROM plans WHERE id = '$pid'");
            //     $uplanrow = mysqli_fetch_assoc($uplanq);
            //     $level = $uplanrow['level'];
            //     $direct = $uplanrow['direct'];
            //     $indirect = $uplanrow['indirect'];
            //     $blnc = $urow['balance'];
        elseif ($user_has_plan_count == 1) {
            ?>
            <div class="col-lg-12">
                @if (session()->has('withdraw_failed'))
                    <div class="alert alert-danger alert-dismissible text-light fade show mt-4" role="alert">
                        {{ session()->get('withdraw_failed') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @elseif (session()->has('withdraw_success'))
                <div class="alert alert-success alert-dismissible text-light fade show mt-4" role="alert">
                    {{ session()->get('withdraw_success') }}
                    <button type="button" class="btn-close btn-light" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <div class="card text-center mt-5">
                    <div class="card-header">
                        <h4 class="text-success">Welcome</h4>
                    </div>
                    <div class="card-body">
                        <h5 style="text-transform: capitalize;">{{ $user->name }}</h5>

                        <?php
                        // if (isset($_SESSION['msg'])) {
                        //     $msg = $_SESSION['msg'];
                        // }
                        // if ($msg != '') {
                        //     $m = explode('_', $msg);
                        // "<h5 class='text-" . $m[1] . "' >" . $m[0] . '</h5>';
                        // }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card text-center">
                    <div class="card-header">
                        <h4 class="text-success">Balance</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="text-success">
                            Rs.
                            @if ($user->balance == 0.0)
                                0.00
                            @else
                                {{ $user->balance }}
                                <br>
                                <?php
                                // if($blnc == 0.00){
                                //     echo "0.00";
                                // }
                                // else{
                                //     echo $blnc. "</br>";
                                ?>
                                <button type="button" class="btn btn-warning btn-sm mt-4" data-toggle="modal"
                                    data-target="#withdraw">Withdraw</button>
                                <div class="modal fade bd-example-modal-sm" id="withdraw" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-sm" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel" style="font-size: 15px;">
                                                    Withdraw Payment</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{ route('withdraw') }}" method="POST">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="from-group">
                                                        <input type="number" required class="form-control"
                                                            max="{{ $user->balance }}" name="amount"
                                                            placeholder="Amount">
                                                        <br>
                                                        <select required class="form-control" name="method_id">
                                                            @foreach ($wmethods as $wmethod)
                                                                <option value={{ $wmethod->id }}>{{ $wmethod->name }}
                                                                </option>
                                                            @endforeach
                                                            <?php
                                                            // $wmq = mysqli_query($con, 'SELECT * FROM withdraw_methods');
                                                            // while ($wmrow = mysqli_fetch_array($wmq)) {
                                                            //     echo "<option value='" . $wmrow['id'] . "' >" . $wmrow['name'] . '</option>';
                                                            // }
                                                            ?>
                                                        </select>
                                                        <br>
                                                        {{-- <input type="hidden" name="balance" value="blnc variable">
                                                    <input type="hidden" name="username" value="username variable"> --}}
                                                        <input type="number" class="form-control" name="account_number"
                                                            placeholder="Account Number">
                                                        <br>
                                                        <input type="text" class="form-control" name="account_name"
                                                            placeholder="Account Title">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary btn-sm"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" name="withdrawamnt"
                                                        class="btn btn-sm btn-success">Withdraw</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            @endif
                            <?php
                            // }
                            ?>
                        </h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card text-center">
                    <div class="card-header">
                        <h4 class="text-success">Total Earnings</h4>
                    </div>
                    <div class="card-body">
                        <h5 style="text-transform: capitalize;" class="text-success">
                            Rs.
                            @if ($userearning->total == 0)
                                0.00
                            @else
                                {{ $userearning->total }}
                            @endif
                            <?php
                            // if ($userearning == '') {
                            //     echo '0.00';
                            // } else {
                            //     echo $userearning;
                            // }
                            ?>
                        </h5>
                        <br><br><br>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card text-center">
                    <div class="card-header">
                        <h4 class="card-title">Referral Link</h4>
                    </div>
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-11">
                                <div class="form-group mb-4">
                                    <input id="skinp" disabled type="text"
                                        class="form-control form-control-muted" <input type="text"
                                        class="form-control"
                                        value="{{ url('/register') }}/{{ $user_payments->username }}"
                                        aria-describedby="basic-addon1">


                                </div>
                            </div>
                            <div class="col-1 text-start">
                                <button class="btn btn-danger btn-sm btn-round mt-1 " id="skbtn"
                                    onclick="secretkey()" data-toggle="tooltip" data-placement="top"
                                    title="Copy"><i class="now-ui-icons files_single-copy-04"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card text-center">
                    <div class="card-header">
                        <h4 class="card-title">Referral Username</h4>
                    </div>
                    <div class="card-body">
                        <h5 style="text-transform: capitalize;">{{ $user_payments->username }}</h5>
                        <br>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card text-center">
                    <div class="card-header">
                        <h4 class="card-title">Plan</h4>
                    </div>
                    <div class="card-body">
                        <h5 style="text-transform: capitalize;">Business - Level {{ $user_plan->level }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card text-center">
                    <div class="card-header">
                        <h4 class="card-title">Direct Comission</h4>
                    </div>
                    <div class="card-body">
                        <h5 style="text-transform: capitalize;">{{ $user_plan->direct }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card text-center">
                    <div class="card-header">
                        <h4 class="card-title">Indirect Comission</h4>
                    </div>
                    <div class="card-body">
                        <h5 style="text-transform: capitalize;">{{ $user_plan->indirect }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card text-center">
                    <div class="card-header">
                        <h4 class="card-title">Team Bonus</h4>
                    </div>
                    <div class="card-body">
                        <h5 style="text-transform: capitalize;">{{ $user_plan->bonus }}</h5>
                    </div>
                </div>
            </div>
            <?php
        } 
        elseif($user_payments_user_count != 0) {

            if($user_payments->status == 0) {
            ?>
            <div class="col-lg-12 mt-5">
                <div class="card">
                    <div class="card-body p-3 text-center">
                        <h5>You've signed up successfully! Your Payment will be approved in 2 working days.</h5>
                        <div class="table-responsive text-center">
                            <table class="table">
                                <tr>
                                    <th colspan='2'>
                                        Your Choosen Plan
                                    </th>
                                </tr>
                                <tr>
                                    <th style="width: 50%;">Plan</th>
                                    <th style="width: 50%;">Charges</th>
                                </tr>
                                <tr>
                                    <td style="width: 50%;">{{ $user_payments->plan_id }}</td>
                                    <td style="width: 50%;">{{ $user_payments->amount }}</td>
                                </tr>
                                <?php
                                // $planq = mysqli_query($con, "SELECT * FROM plans WHERE id= '$pid'");
                                // $plrow = mysqli_fetch_assoc($planq);
                                // echo '<tr><td>' . $plrow['name'] . '</td><td>' . $plrow['charges'] . '</td></tr>';
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
                <?php
            }
            elseif($user_payments->status == 1){
                // else if($status == 2){
                ?>
                <div class="col-lg-12 mt-5">
                    <div class="card">
                        <div class="card-body p-3 text-center">
                            <h5 class="text-danger">Your request can't be approved because your payment was not
                                processed to Earninglance!</h5>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
        else
        {
                // else{
            ?>
                <div class="col-lg-12 mt-5">
                    <div class="card">
                        <div class="card-body p-3 text-center">
                            <h3 class="">Choose Your Plan</h3>
                            <div class="row justify-content-center">
                                @foreach ($plans as $plan)
                                    <div class="col-lg-3 p-1 mx-5">
                                        <form
                                            style="background: linear-gradient(105deg, #fb730d 0%, #ff461e 100%); border-radius: 20px;">
                                            <div class="row text-center text-white">
                                                <div class="col-lg-12 p-3">
                                                    <h5>{{ $plan->name }}</h5>
                                                    <p class="text-white">Level {{ $plan->level }}</p>
                                                    <h3 class="m-0">{{ $plan->charges }}</h3>
                                                    <h4 class="m-1">Comissions</h4>
                                                    <p class="text-white">Direct: {{ $plan->direct }}</p>
                                                    <p class="text-white">Indirect: {{ $plan->indirect }}</p>
                                                    <p class="text-white">Team Bonus: {{ $plan->bonus }}</p>
                                                    <br>
                                                </div>
                                                <div class="col-lg-12">
                                                    <fieldset><a class="btn btn-white btn-round"
                                                            style="background-color: white;color: #f96332;"
                                                            href="{{ url('/dashboard/plans') }}/{{ $plan->id }}">
                                                            Continue
                                                        </a>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="contact-dec">
                                                <img src="{{ url('assets/images/contact-decoration.png') }}"
                                                    alt="">
                                            </div>
                                        </form>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <?php
        }
                //     }
                //     }
                // }
                // else if($role == 2){
                //     $tcustsq = mysqli_query($con,"SELECT * FROM `users`");
                //     $tcust = mysqli_num_rows($tcustsq);
                
    }
    elseif($user->role == 2)
    {    
        ?>
                <div class="col-lg-12 mt-5">
                    <div class="card">
                        <div class="card-body p-3 text-center">
                            <h5 class="text-success">Welcome, Admin</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card text-center">
                                <div class="card-header">
                                    <h4 class="card-title">Registered Users</h4>
                                </div>
                                <div class="card-body">
                                    <h5 class="text-success">{{ $users }}</h5>
                                </div>
                            </div>
                        </div>
                        <?php
                        // $pappq = mysqli_query($con, 'SELECT * FROM payments WHERE status = 0');
                        // $papps = mysqli_num_rows($pappq);
                        ?>
                        <div class="col-lg-6">
                            <div class="card text-center">
                                <div class="card-header">
                                    <h4 class="card-title">Pending Approvals</h4>
                                </div>
                                <div class="card-body">
                                    <h5 class="text-danger">{{ $user_payments_status_count }}</h5>
                                </div>
                            </div>
                        </div>
                        <?php
                        // $twraq = mysqli_query($con, 'SELECT SUM(amount) as twith FROM `withdrawl_request` WHERE status = 0;');
                        // $twrarow = mysqli_fetch_assoc($twraq);
                        // $twithamnt = $twrarow['twith'];
                        ?>

                        <div class="col-lg-6">
                            <div class="card text-center">
                                <div class="card-header">
                                    <h4 class="card-title">Withdrawal Requests</h4>
                                </div>
                                <div class="card-body">
                                    <h5 class="text-danger">
                                        @if ($total_withdraw_amount == 0)
                                            0.00
                                        @else
                                            {{ $total_withdraw_amount }}.00
                                        @endif
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <?php
                        // $tearnq = mysqli_query($con, 'SELECT SUM(amount) as tearning FROM payments WHERE status = 1');
                        // $tearnrow = mysqli_fetch_assoc($tearnq);
                        // $tearning = $tearnrow['tearning'];
                        ?>
                        <div class="col-lg-6">
                            <div class="card text-center">
                                <div class="card-header">
                                    <h4 class="card-title">Total Earnings</h4>
                                </div>
                                <div class="card-body">
                                    <h5 class="text-success">{{ $total_user_payments }}</h5>
                                </div>
                            </div>
                        </div>
                        <?php
                        // }
                        ?>
                    </div>
                </div>
                <?php
    }
                ?>
                @include('user.inc.footer')

</body>

</html>
