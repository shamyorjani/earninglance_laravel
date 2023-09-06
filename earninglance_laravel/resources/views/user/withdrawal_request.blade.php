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
    // if(isset($_POST['confirm'])){
    //     $paymentid = $_POST['pid'];
    //     $uppayq = mysqli_query($con,"UPDATE withdrawl_request SET status = '1' WHERE id = '$paymentid'");
    //     if($uppayq){
    //         $msg = "Withdrawl Approved! _success";
    //     }
    // }
    // if(isset($_POST['cancel'])){
    //     $paymentid = $_POST['pid'];
    //     $paymentid = $_POST['pid'];
    //     $payuser = $_POST['user'];
    //     $payamnt = $_POST['amnt'];
    //     $payblnc = $_POST['blnc'];
    //     $afterblnc = $payblnc + $payamnt;
    //     $uppayq = mysqli_query($con,"UPDATE withdrawl_request SET status = '2' WHERE id = '$paymentid'");
    //     if($uppayq){
    //         $ubq = mysqli_query($con,"UPDATE users SET balance = '$afterblnc' WHERE username = '$payuser'");
    //         if($ubq){
    //            $msg = "Withdrawl Disapproved! _danger";   
    //         }
    //     }
    // }


    ?>


    <div class="content mt-5" >
        <div class="row" >
        <div class="col-md-12">
            <div class="card mt-5">
              <div class="card-header">
                <h4 class="card-title">Withdrawl Requests</h4>
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
                        Amount
                      </th>
                      <th>
                        Method
                      </th>
                      <th>
                        Details
                      </th>
                      <th>
                        Actions
                      </th>
                    </thead>
                    <tbody>
                      <?php
                        // $pq = mysqli_query($con,"SELECT * FROM withdrawl_request ORDER BY id DESC");
                        // while($prow = mysqli_fetch_array($pq)){
                        //     $pid = $prow['id'];
                        //     $puser = $prow['username'];
                        //     $amount = $prow['amount'];
                        //     $status = $prow['status'];
                        //     $details = $prow['details'];
                        //     $d = explode(',',$details);
                        //     $number = $d[1];
                        //     $name = $d[0];
                        //     $methodid = $prow['method_id'];
                        //     $mq = mysqli_query($con,"SELECT * FROM withdraw_methods");
                        //     $mrow = mysqli_fetch_assoc($mq);
                        //     $method = $mrow['name'];
                        //     $userq = mysqli_query($con,"SELECT * FROM users WHERE username = '$puser'");
                        //     $userrow = mysqli_fetch_assoc($userq);
                        //     $userblnc = $userrow['balance'];
                            ?>
                            @foreach ($requests as $request)
                            <tr>
                                <td>
                                  {{$request->username}}
                                </td>
                                <td>
                                  {{$request->amount}}
                                </td>
                                <td>
                                  {{$request->method_id}}
                                </td>
                                <td>
                                  {{$request->fullname}}<br>{{$request->number}}
                                </td>
                                <td>
                                    @if($request->status == 0)
                                    <form action="{{url('/withdrawal_request')}}/{{$request->id}}" method="post" >
                                      @csrf
                                        {{-- <input type="hidden" name="amnt" value="{{$request->amount}}" >
                                        <input type="hidden" name="pid" value="{{$request->id}}" >
                                        <input type="hidden" name="user" value="{{$request->username}}" >
                                        <input type="hidden" name="blnc" value="{{$request->amount}}" > --}}
                                        <button type="submit" class="btn btn-sm btn-success" name="status_update" value="1" ><i class="now-ui-icons ui-1_check" ></i></button>
                                        
                                        <button type="submit" class="btn btn-sm btn-danger" name="status_update" value="2" ><i class="now-ui-icons ui-1_simple-remove" ></i></button>
                                    </form>
                                    @endif
                                    @if($request->status == 1)
                                        <button disabled class='btn btn-sm btn-success' ><i class='now-ui-icons ui-1_check' ></i></button>
                                    @endif
                                    @if($request->status == 2)
                                        <button disabled class='btn btn-sm btn-danger' ><i class='now-ui-icons ui-1_simple-remove' ></i></button>
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