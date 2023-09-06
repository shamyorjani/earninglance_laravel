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
    // if(isset($_POST['delete'])){
    //     $planid = $_POST['pid'];
    //     $uppayq = mysqli_query($con,"DELETE FROM plans WHERE id = '$planid'");
    //     if($uppayq){
    //         $msg = "Plan Deeleted! _danger";
    //     }
    // }
    // if(isset($_POST['add'])){
    //     $upname = $_POST['name'];
    //     $uplevel = $_POST['level'];
    //     $upcharges = $_POST['charges'];
    //     $updir = $_POST['direct'];
    //     $upind = $_POST['indirect'];
    //     $upbonus = $_POST['bonus'];
    //     $upfeatures = $_POST['features'];
    //     $uplanq = mysqli_query($con,"INSERT INTO `plans`(`name`, `charges`, `direct`, `indirect`, `bonus`, `features`, `level`) VALUES ('$upname','$upcharges','$updir','$upind','$upbonus','$upfeatures','$uplevel')");
    //     if($uplanq){
    //         $msg = "Plan Added Successfully! _success";
    //     }
    //     else{
    //         $msg = "Error! _danger";
    //     }
    // }
    ?>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ url('/plans') }}" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add new Plan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <input type="text" name="name" placeholder="Plan Name" class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <input type="number" name="level" placeholder="Level" class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <input type="number" name="charges" placeholder="Charges" class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <input type="number" name="bonus" placeholder="Team Bonus" class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <input type="number" name="direct" placeholder="Direct Comission"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <input type="number" name="indirect" placeholder="Indirect Comission"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Write 1 Feature on one line</label>
                                    <textarea name="features" placeholder="Features" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="add" class="btn btn-info">Add Plan</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
            </form>
        </div>
    </div>
    </div>

    <div class="content mt-5">
        <div class="row">
            <div class="col-md-12">
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
                                <h4 class="card-title">Plans</h4>
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
                                        Name/ Level
                                    </th>
                                    <th>
                                        Charges
                                    </th>
                                    <th>
                                        Comisssions
                                    </th>
                                    <th>
                                        Bonus
                                    </th>
                                    <th>
                                        Actions
                                    </th>
                                </thead>
                                <tbody>
                                    <?php
                                    // $pq = mysqli_query($con,"SELECT * FROM plans ORDER BY id ASC");
                                    // while($prow = mysqli_fetch_array($pq)){
                                    //     $pid = $prow['id'];
                                    //     $name = $prow['name'];
                                    //     $charges = $prow['charges'];
                                    //     $direct = $prow['direct'];
                                    //     $indirect = $prow['indirect'];
                                    //     $bonus = $prow['bonus'];
                                    //     $level = $prow['level'];
                                    ?>
                                    @foreach ($plans as $plan)
                                        <tr>
                                            <td>
                                                {{ $plan->name }} - {{ $plan->level }}
                                            </td>
                                            <td>
                                                {{ $plan->charges }}
                                            </td>
                                            <td>
                                                {{ $plan->direct }} / {{ $plan->indirect }}
                                            </td>
                                            <td>
                                                {{ $plan->bonus }}
                                            </td>
                                            <td>
                                                <form action="{{ url('/plans')}}/{{$plan->id}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="pid" value="{{ $plan->id }}">
                                                    <button type="submit" class="btn btn-sm btn-danger"
                                                        name="delete"><i
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


    @include('user.inc.footer')

</body>

</html>
