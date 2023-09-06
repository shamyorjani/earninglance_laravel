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
                        Name
                      </th>
                      <th>
                        Email
                      </th>
                      <th>
                        Message
                      </th>
                    </thead>
                    <tbody>
                      <?php
                        // $pq = mysqli_query($con,"SELECT * FROM contact ORDER BY id DESC");
                        // while($prow = mysqli_fetch_array($pq)){
                        //     $name = $prow['firstname'];
                        //     $surname = $prow['surname'];
                        //     $email = $prow['email'];
                        //     $msg = $prow['msg'];
                            
                            ?>
                            @foreach ($contacts as $contact)
                            <tr>
                                <td>
                                  {{$contact->firstname}}
                                </td>
                                <td>
                                  {{$contact->email}}
                                </td>
                                <td>
                                  {{$contact->msg}}
                                </td>
                              </tr>
                              @endforeach
                            <?php 
                        // }
                      ?>
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