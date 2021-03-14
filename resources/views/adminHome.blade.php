@extends('layouts.app')



@section('content')

<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card">

                <div class="card-header pull-left">Dashboard

                </div>
                  <div class="card-header pull-right">
                  <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModalLong">
                       Add Employee
                 </button>

                  <!-- Modal -->
                    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form class="form-control" action="" method="post">
                                
                               @csrf
                             <table class="table">
                                  <tr>
                                      <td>Name</td>
                                      <td>:</td>
                                      <td><input type="text" name="name"  id="name" placeholder="Enter Your Name">
                                  </tr>
                                  <tr>
                                      <td>Email</td>
                                      <td>:</td>
                                      <td><input type="email" name="email" id="email" placeholder="Enter Your Email">
                                  </tr>
                                  <tr>
                                      <td>Mobile</td>
                                      <td>:</td>
                                      <td><input type="text" name="mobile" id="mobile" placeholder="Enter Your Mobile ">
                                  </tr>
                                  <tr>
                                      <td>Designation</td>
                                      <td>:</td>
                                      <td><select name="designation" class="form-control" id="designation">
                                            <option value="">--Select--</option>
                                            <option value="IT">IT</option>
                                            <option value="DCS">DCS</option>
                                            <option value="Logistic">Logistic</option>

                                      </select>
                                  </td>
                                  </tr>
                                  <tr>
                                      <td>Salary</td>
                                      <td>:</td>
                                      <td><input type="number" name="salary" class="form-control" id="salary" placeholder="Enter Your Salary "></td>
                                  </tr>
                             </table>
                                </form>
                          </div>
                          <div class="modal-footer">
                            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                         <input class="btn-sm btn btn-primary" id="adduser" value="Add" onclick="adduser()">
                          </div>
                        </div>
                      </div>
                    </div>
                 </div>
               
                <div class="card-body">

                   <h4 style="color: red;font-weight: bold;"> You are Admin.</h4>

                    
                   <table class="table">
                     <thead>
                       <th>Name</th>
                       <th>Email</th>
                       <th>Mobile</th>
                       <th>designation</th>
                       <th>salaray</th>
                     </thead>
                     <tbody>  
                       @foreach($data as $emp)
                          
                           <tr>
                             <td>{{$emp->name}}</td>
                             <td>{{$emp->email}}</td>
                             <td>{{$emp->mobile}}</td>
                             <td>{{$emp->designation}}</td>
                             <td>{$emp->salary}}</td>
                               

                           </tr>
                           @endforeach
                             

                     </tbody>
                     
                   </table>

                   <center><a  href="downloadcsv" class="btn btn-sm btn-warning">Download </a> </center>
                </div>

            </div>

        </div>

    </div>

</div>

@endsection

<script type='text/javascript'>
  // Add record
  function adduser(){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var mobile = document.getElementById('mobile').value;
    var e = document.getElementById("designation");
    var strUser = e.value;
    var salary = document.getElementById('salary').value;
    
    if(name != '' && email != ''  && salary != ''){
      $.ajax({
        url: 'addUser',
        type: 'post',
        data: {_token: CSRF_TOKEN,name: name,email: email,mobile: mobile,salary: salary,desg: strUser},
        success: function(response){
          
              if(response == 1){

                alert("Record as created! please refresh your page for latest data to Load in the screen");

                 document.location.reload(true); 


              
              }else{

                alert('Fill all fields');
              }

        },
        error: function (error) {
       console.log(error);
}
      });
    }else{
      alert('Fill all fields');
    }

 }


</script>