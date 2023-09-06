<?php
// session_start();
// error_reporting(0);
// include "../inc/dbcon.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    @include('user.inc.css')
</head>

<body>
    @include('user.inc.nav')
    <?php
    // $msg = "";
    // if(isset($_POST['confirm'])){
    //     $paymentid = $_POST['pid'];
    //     $upid = $_POST['planid'];
    //     $user = $_POST['user'];
    //     $uppayq = mysqli_query($con,"UPDATE payments SET status = '1' WHERE id = '$paymentid'");
    //     if($uppayq){
    //         $planadd = mysqli_query($con,"INSERT INTO `user_has_plan`(`username`, `plan_id`) VALUES ('$user','$upid')");
    //         $refralcheck = mysqli_query($con,"SELECT * FROM users WHERE username = '$user'");
    //         $refralrow = mysqli_fetch_assoc($refralcheck);
    //         $direct = $refralrow['refral'];
    //         $indirect = $refralrow['indirect'];
    
    //         if($direct != ""){
    //             $directuser = mysqli_query($con,"SELECT * FROM user_has_plan WHERE username = '$direct'");
    //             $directuserrow = mysqli_fetch_assoc($directuser);
    //             $directplan = $directuserrow['plan_id'];
    //             $directplanq = mysqli_query($con,"SELECT * FROM plans WHERE id='$directplan'");
    //             $directplanrow  = mysqli_fetch_assoc($directplanq);
    //             $directamnt = $directplanrow['direct'];
    //             $directblncq = mysqli_query($con,"UPDATE users SET balance = balance + $directamnt WHERE username = '$direct';");
    //         }
    
    //         if($indirect != ""){
    //             $indirectuser = mysqli_query($con,"SELECT * FROM user_has_plan WHERE username = '$indirect'");
    //             $indirectuserrow = mysqli_fetch_assoc($indirectuser);
    //             $indirectplan = $indirectuserrow['plan_id'];
    //             $indirectplanq = mysqli_query($con,"SELECT * FROM plans WHERE id='$indirectplan'");
    //             $indirectplanrow  = mysqli_fetch_assoc($indirectplanq);
    //             $indirectamnt = $indirectplanrow['indirect'];
    //             $indirectblncq = mysqli_query($con,"UPDATE users SET balance = balance + $indirectamnt WHERE username = '$indirect'");
    //         }
    
    //       if($newq){
    //         $msg = "Payment Approved! _success";
    //       }
    
    //     }
    // }
    // if(isset($_POST['cancel'])){
    //     $paymentid = $_POST['pid'];
    //     $uppayq = mysqli_query($con,"UPDATE payments SET status = '2' WHERE id = '$paymentid'");
    //     if($uppayq){
    //         $msg = "Payment Disapproved! _danger";
    //     }
    // }
    ?>


    <div class="content mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header">
                        <h4 class="card-title">User Payment for Plans</h4>
                        <?php
                        // if($msg != ""){
                        //     $m = explode('_',$msg);
                        //     echo "<p class='text-".$m[1]."' >".$m[0]."</p>";
                        //     $msg = "";
                        // }
                        ?>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-danger">
                                    <th>
                                        Username
                                    </th>
                                    <th>
                                        Plan
                                    </th>
                                    <th>
                                        Method
                                    </th>
                                    <th>
                                        Amount
                                    </th>
                                    <th>
                                        Actions
                                    </th>
                                </thead>
                                <tbody>
                                    <?php
                                    // $pq = mysqli_query($con,"SELECT * FROM payments ORDER BY id DESC");
                                    // while($prow = mysqli_fetch_array($pq)){
                                    //     $pid = $prow['id'];
                                    //     $puser = $prow['username'];
                                    //     $amount = $prow['amount'];
                                    //     $img = $prow['image'];
                                    //     $status = $prow['status'];
                                    //     $planid = $prow['plan_id'];
                                    //     $planq = mysqli_query($con,"SELECT * FROM `plans` WHERE `id` = $planid");
                                    //     $plrow = mysqli_fetch_assoc($planq);
                                    //     $plan = $plrow['name'];
                                    //     $methodid = $prow['method_id'];
                                    //     $mq = mysqli_query($con,"SELECT * FROM payment_methods");
                                    //     $mrow = mysqli_fetch_assoc($mq);
                                    //     $method = $mrow['name'];
                                    //     $method_acc = $mrow['account_name'];
                                    ?>

                                    @foreach ($payments as $payment)
                                        <div class="modal fade" id="exampleModal{{ $payment->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Screenshot</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img src="{{public_path('storage').'/'.$payment->image}}" style="width: 100%;">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <tr>
                                            <td>
                                                {{ $payment->id }} - {{ $payment->username }}
                                            </td>
                                            <td>
                                                {{ $payment->plan_id }}
                                            </td>
                                            <td>
                                                {{ $payment->method_id }}
                                            </td>
                                            <td>
                                                {{ $payment->amount }}
                                            </td>
                                            <td>
                                                <button type="button" style="float: left;"
                                                    class="btn btn-sm btn-warning mr-1" data-toggle="modal"
                                                    data-target="#exampleModal{{ $payment->id }}"><i
                                                        class="now-ui-icons design_image"></i></button>
                                                @if ($payment->status == 0)
                                                    <form action="{{url('user_payments')}}/{{$payment->id}}" method="post">
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-success"
                                                            name="status_update" value="1"><i
                                                                class="now-ui-icons ui-1_check"></i></button>
                                                        <button type="submit" class="btn btn-sm btn-danger"
                                                            name="status_update" value="2"><i
                                                                class="now-ui-icons ui-1_simple-remove"></i></button>
                                                    </form>
                                                @elseif ($payment->status == 1)
                                                    <button disabled class='btn btn-sm btn-success'><i
                                                            class='now-ui-icons ui-1_check'></i></button>
                                                @elseif ($payment->status == 2)
                                                    <button disabled class='btn btn-sm btn-danger'><i
                                                            class='now-ui-icons ui-1_simple-remove'></i></button>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    @include('user.inc.footer')
</body>

</html>
