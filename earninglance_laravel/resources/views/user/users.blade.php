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
    // if(isset($_POST['deluser'])){
    //     $deluser = $_POST['user'];
    //     $delq = mysqli_query($con,"DELETE FROM users WHERE username = '$deluser'");
    //     if($delq){
    //         $msg = "User Deleted Successfully! _success";
    //     }
    //     else{
    //         $msg = "Can't Delete User _danger";
    //     }
    // }
    // if(isset($_POST['addcash'])){
    //     $amnt = $_POST['amnt'];
    //     $cuser = $_POST['user'];
    //     $cq = mysqli_query($con,"SELECT * FROM users WHER username = '$cuser'");
    //     $crow = mysqli_fetch_assoc($cq);
    //     $cblnc = $crow['balance'];
    //     $cablnc = $cblnc + $amnt;
    //     $addq = mysqli_query($con,"UPDATE users SET balance = '$cablnc' WHERE username = '$cuser'");
    //     if($addq){
    //         $msg = "Cash Added Successfully! _success";
    //     }
    //     else{
    //         $msg = "Error! _danger";
    //     }
    // }

    ?>

    <div class="content mt-5" >
        <div class="row" >
        <div class="col-md-12">
            <div class="card mt-5">
              <div class="card-header">
                <h4 class="card-title">Users</h4>
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
                        Add
                      </th>
                      <th>
                        Name
                      </th>
                      <th>
                        Username
                      </th>
                      <th>
                        Balance
                      </th>
                    </thead>
                    <tbody>
                      <?php
                        // $pq = mysqli_query($con,"SELECT * FROM users ORDER BY id DESC");
                        // while($prow = mysqli_fetch_array($pq)){
                        //     $name = $prow['name'];
                        //     $username = $prow['username'];
                        //     $role = $prow['role'];
                            ?>
                            @foreach($users as $user)
                            <div class="modal fade" id="{{$user->username}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Cash to {{$user->username}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <form action="{{url('/users')}}/{{$user->id}}" method="post" >
                                    @csrf
                                      <div class="modal-body">
                                        <div class="form-group" >
                                            <input type="number" name="amnt" class="form-control" >
                                            <input type="hidden" name="user" placeholder="Amount" value="{{$user->username}}" >
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button> &nbsp;
                                        <button type="submit" name="addcash" class="btn btn-info btn-sm">Add</button>
                                      </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                            @endforeach
                            @foreach($users as $user)
                            <tr>
                                <td>
                                    <button class="btn btn-sm btn-round btn-info" type="button" data-toggle="collapse" data-target="#{{$user->username}}" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="now-ui-icons ui-1_simple-add" ></i>
                                    </button>
                                </td>
                                <td>
                                  {{$user->name}}
                                </td>
                                <td>
                                  {{$user->username}}
                                </td>
                                <td>
                                  {{$user->balance}}
                                </td>
                            </tr>
                            <tr class="collapse" id="{{$user->username}}" >
                                <td>
                                  
                                </td>
                                <td>
                                  {{$user->email}}
                                </td>
                                <td>
                                  {{$user->phone}}
                                </td>
                                <td>
                                <form action="users.php" method="post" >
                                    <input type="hidden" name="user" value="{{$user->username}}" >
                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#{{$user->username}}">
                                      <i class="now-ui-icons business_money-coins" ></i>
                                    </button>
                                    <button type="submit" name="deluser" class="btn btn-sm btn-danger" ><i class="now-ui-icons ui-1_simple-remove" ></i></button>
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


    @include('user.inc.footer')
</body>
</html>