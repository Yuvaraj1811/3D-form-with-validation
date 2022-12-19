<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <title>Document</title>
</head>
<style>
    center {
    margin-top: 25px;
    margin-bottom: 25px;
}
a#logout {
    float: right;
    margin-bottom: 20px;
    margin-right: 10px;
}
button#accepted {
    color: black;
    background: white;
}
button#rejected {
    background: white;
}
button#deleted {
    color: black;
    background: white;
}
.btn-success {
    color: black;
    /* background-color: #28a745; */
    border-color: #28a745;
    background: white;
}
button#new1 {
    color: black;
    background: white;
}
a#reject1 {
    background: white;
    color: black;
}
a#delete1 {
    color: black;
    background: white;
}
a#logout {
    color: black;
    background: white;
}
.btn-warning {
    color: #212529;
    /* background-color: #ffc107; */
    border-color: #ffc107;
}

</style>
<body>
    <!-- <form method='POST' action="/dashboard"></form> -->
    <table id="data" class="table table-striped">
        <div class="container">
            <div class="row" mt-10>
            <div class="col-sm-3" >
                <button type="button" class="btn btn-primary" id="new1" value="new">New-User</button>
            </div>
            <div class="col-sm-2">
                <a href="/acceptdashbaord" class="btn btn-success"  id="accepted1" value="accept" >Accept</a>
            </div>
            <div class="col-sm-2">
            <a href="/rejectdashbaord" class="btn btn-warning" id="reject1" value="reject">Reject</a>
            </div>
            <div class="col-sm-2">
            <a href="/deletedashbaord" class="btn btn-danger" id="delete1" value="delete">Delete</a>
            </div>
            <div class="col-sm-2">
            <a href="/logout" class="btn btn-primary" id="logout" value="logout">Logout</a>
            </div>
            </div>
        </div>
    <!-- <center>
    <button type="button" class="btn btn-primary" id="new1" value="new">New-User</button>
    <a href="/acceptdashbaord" class="btn btn-success"  id="accepted1" value="accept" >Accept</a>
    <a href="/rejectdashbaord" class="btn btn-warning" id="reject1" value="reject">Reject</a>
    <a href="/deletedashbaord" class="btn btn-danger" id="delete1" value="delete">Delete</a></center>
    <a href="/logout" class="btn btn-primary" id="logout" value="logout">Logout</a> -->

    <thead>
      <tr>
        <th>FirstName</th>
        <th>LastName</th>
        <th>Email</th>
        <th>Phone-Number</th>
        <th class="action">Accept</th>
        <th class="action">Reject</th>
        <th class="action">Delete</th>
      </tr>
    </thead>
    <tbody>
      {% for user in results %}
        <tr>
          <td>{{ user[1] }}</td>
          <td>{{ user[2] }}</td>
          <td>{{ user[3] }}</td>
          <center><td>{{ user[4] }}</td></center>
          <!-- <td>{{ user[6] }}</td> -->
        
          <td><button type="button" class="btn btn-success" id="accepted" onClick="window.location.reload();" value="accept">Accept</button></td>
          <td><button type="button" class="btn btn-warning" id="rejected" onClick="window.location.reload();"value="reject">Reject</button></td>
          <td><button type="button" class="btn btn-danger" id="deleted" onClick="window.location.reload();" value="delete">Delete</button></td>


        </tr>
      {% endfor %}
    </tbody>
  </table>
    
</body>
</html>

<!-- <script>
    $(document).ready(function(){
        $.ajax({
        url:'/dashboard',
        type:'POST',
        contentType:"application/json;charset=UTF-8",
    })
})
</script> -->
<script>
$(document).ready(function(){
    $("#accepted").on("click",function(){

    var tr=$(this).closest("tr");
    var td=tr.find("td")
    var email=$(td[2]).text()
    console.log("email: "+email)
    $.ajax({
                url:'/accept',
                type:'POST',
                data:JSON.stringify(({"email":email})),
                contentType:"application/json;charset=UTF-8",
                // beforeSend:function(){   
                //     $(".message").html("<h6>Please Wait we are submitting..")
                // },
                // success: function(response) {
                //     // console.log("success : ",response['error'])
                //     // alert(response['error'])
                //     if (response['message']=="Accepted"){
                //         alert(response['message'])
                //         return false
                //     }
                

            })
    });
})
</script>

<script>
    $(document).ready(function(){
        $("#rejected").on("click",function(){
        var tr=$(this).closest("tr");
        var td=tr.find("td")
        var email=$(td[2]).text()
        console.log("email: "+email)
        $.ajax({
                url:'/reject',
                type:'POST',
                data:JSON.stringify(({"email":email})),
                contentType:"application/json;charset=UTF-8",
                // beforeSend:function(){   
                //     $(".message").html("<h6>Please Wait we are submitting..")
                // },
                // success: function(response) {
                //     console.log("success : ",response['error'])
                //     alert(response['error'])
                //     if (response['message']=="Accepted"){
                //         alert(response['message'])
                //         return false
                //     }
                // }
                // window.location.replace("/dashboard");
                
            })
        })
    })

</script>

<script>
    $(document).ready(function(){
        $("#deleted").on("click",function(){
        var tr=$(this).closest("tr");
        var td=tr.find("td")
        var email=$(td[2]).text()
        console.log("email: "+email)
        $.ajax({
                url:'/delete',
                type:'POST',
                data:JSON.stringify(({"email":email})),
                contentType:"application/json;charset=UTF-8",
            })
        })
    })

</script>