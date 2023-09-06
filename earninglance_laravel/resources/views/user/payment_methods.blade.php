<?php
// session_start();
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
    // $wmsg = "";
    // if(isset($_POST['pdelete'])){
    //     $payid = $_POST['pid'];
    //     $uppayq = mysqli_query($con,"DELETE FROM payment_methods WHERE id = '$payid'");
    //     if($uppayq){
    //         $msg = "Method Deleted! _danger";
    //     }
    // }
    // if(isset($_POST['wdelete'])){
    //     $wid = $_POST['pid'];
    //     $upwithq = mysqli_query($con,"DELETE FROM withdraw_methods WHERE id = '$wid'");
    //     if($upupwithqpayq){
    //         $wmsg = "Method Deleted! _danger";
    //     }
    // }
    // if(isset($_POST['padd'])){
    //     $upname = $_POST['name'];
    //     $upaccname = $_POST['accname'];
    //     $upacc = $_POST['acc'];
    //     $upayq = mysqli_query($con,"INSERT INTO `payment_methods`(`name`, `account_name`, `account_number`) VALUES ('$upname','$upaccname','$upacc')");
    //     if($upayq){
    //         $msg = "Method Added Successfully! _success";
    //     }
    //     else{
    //         $msg = "Error! _danger";
    //     }
    // }
    // if(isset($_POST['wadd'])){
    //     $uwname = $_POST['name'];
    //     $uwithq = mysqli_query($con,"INSERT INTO `withdraw_methods`(`name`) VALUES ('$uwname')");
    //     if($uwithq){
    //         $wmsg = "Method Added Successfully! _success";
    //     }
    //     else{
    //         $wmsg = "Error! _danger";
    //     }
    // }
    ?>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ url('/add_payment_methods') }}" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Payment Method</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <input type="text" name="name" placeholder="Method Name" class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <input type="text" name="account_name" placeholder="Account Name"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="text" name="account_number" placeholder="Account Number"
                                        class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="padd" class="btn btn-info">Add Method</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
            </form>
        </div>
    </div>
    </div>

    <div class="modal fade" id="withdrawal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ url('/add_withdrawal_methods') }}" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Withdawl Method</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="text" name="name" placeholder="Method Name" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="wadd" class="btn btn-info">Add Method</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
            </form>
        </div>
    </div>
    </div>

    <div class="content mt-5">
        <div class="row">
            <div class="col-md-6">
                <div class="card mt-5">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-3">
                                <button type="button" class="btn btn-info" data-toggle="modal"
                                    data-target="#exampleModal">
                                    <i class="now-ui-icons ui-1_simple-add"></i>
                                </button>
                            </div>
                            <div class="col-9">
                                <h4 class="card-title">Payment Methods</h4>
                            </div>
                        </div>
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
                                        Method
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Number
                                    </th>
                                    <th>
                                        Actions
                                    </th>
                                </thead>
                                <tbody>
                                    <?php
                                    // $pq = mysqli_query($con,"SELECT * FROM payment_methods ORDER BY id ASC");
                                    // while($prow = mysqli_fetch_array($pq)){
                                    //     $pid = $prow['id'];
                                    //     $name = $prow['name'];
                                    //     $accname = $prow['account_name'];
                                    //     $acc = $prow['account_number'];
                                    ?>
                                    @foreach ($pmethods as $pmethod)
                                    <tr>
                                        <td>
                                            {{ $pmethod->name }}
                                        </td>
                                        <td>
                                            {{ $pmethod->account_name }}
                                        </td>
                                        <td>
                                            {{ $pmethod->account_number }}
                                        </td>
                                        <td>
                                            <form action="{{ url('/delete_payment_methods') }}/{{ $pmethod->id }}"
                                                method="post">
                                                @csrf
                                                {{-- <input type="hidden" name="pid" value="pid-variable"> --}}
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    name="pdelete"><i
                                                        class="now-ui-icons design_scissors"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card mt-5">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-3">
                                <button type="button" class="btn btn-info" data-toggle="modal"
                                    data-target="#withdrawal">
                                    <i class="now-ui-icons ui-1_simple-add"></i>
                                </button>
                            </div>
                            <div class="col-9">
                                <h4 class="card-title">Withdrawal Methods</h4>
                            </div>
                        </div>
                        <?php
                        // if($wmsg != ""){
                        //     $wm = explode('_',$wmsg);
                        //     echo "<p class='text-".$wm[1]."' >".$wm[0]."</p>";
                        //     $wmsg = "";
                        // }
                        ?>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-danger">
                                    <th>
                                        Method
                                    </th>
                                    <th>
                                        Actions
                                    </th>
                                </thead>
                                <tbody>
                                    <?php
                                    // $pq = mysqli_query($con,"SELECT * FROM withdraw_methods ORDER BY id ASC");
                                    // while($prow = mysqli_fetch_array($pq)){
                                    //     $pid = $prow['id'];
                                    //     $name = $prow['name'];
                                    ?>
                                    @foreach ($wmethods as $wmethod)
                                        <tr>
                                            <td>
                                                {{ $wmethod->name }}
                                            </td>
                                            <td>
                                                <form action="{{ url('/delete_withdrawal_method') }}/{{ $wmethod->id }}"
                                                    method="post">
                                                    @csrf
                                                    <input type="hidden" name="pid" value="pid-variable">
                                                    <button type="submit" class="btn btn-sm btn-danger"
                                                        name="wdelete"><i
                                                            class="now-ui-icons design_scissors"></i></button>
                                                </form>
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
    </div>


    @include('user.inc.footer')
</body>

</html>
