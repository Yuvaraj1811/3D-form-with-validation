<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="edit.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>   
    <title>Document</title>
</head>

<style>
    * {
    box-sizing: border-box;
}
body {

    font-family: Tahoma, Verdana, Segoe, sans-serif;
    font-size: 14px;
    /* background: linear-gradient(45deg, #83a4d4, #b6fbff)!important; */
    padding: 20px;
    text-align: center;
}
.wrapper {
    width: 250px;
    height: 350px;
    margin: 60px auto;
    perspective: 600px;
    text-align: left;
}
.rec-prism {
    width: 100%;
    height: 100%;
    position: relative;
    transform-style: preserve-3d;
    transform: translateZ(-100px);
    transition: transform 0.5s ease-in;
}
.face {
    position: absolute;
    width: 250px;
    height: 400px;
    padding: 20px;
    background: rgba(250, 250, 250, 0.96);
    /* background:linear-gradient(45deg, #83a4d4, #b6fbff)!important; */
    border: 1px solid black;
    border-radius: 3px;
}
.face .content {
    color: black;
}
.face .content h2 {
    font-size: 1.2em;
    color: black;
}
.face .content .field-wrapper {
    margin-top: 30px;
    position: relative;
}
.face .content .field-wrapper label {
    position: absolute;
    pointer-events: none;
    font-size: 0.85em;
    top: 40%;
    left: 0;
    transform: translateY(-50%);
    transition: all ease-in 0.25s;
    color: #999;
}
.face .content .field-wrapper input[type="text"], .face .content .field-wrapper input[type="password"], .face .content .field-wrapper input[type="submit"], .face .content .field-wrapper textarea {
    -webkit-appearance: none;
    appearance: none;
}
.face .content .field-wrapper input[type="text"]:focus, .face .content .field-wrapper input[type="password"]:focus, .face .content .field-wrapper input[type="submit"]:focus, .face .content .field-wrapper textarea:focus {
    outline: none;
}
.face .content .field-wrapper input[type="text"], .face .content .field-wrapper input[type="password"], .face .content .field-wrapper textarea {
    width: 100%;
    border: none;
    background: transparent;
    line-height: 2em;
    border-bottom: 1px solid black;
    color: black;
}
.face .content .field-wrapper input[type="text"]::-webkit-input-placeholder, .face .content .field-wrapper input[type="password"]::-webkit-input-placeholder, .face .content .field-wrapper textarea::-webkit-input-placeholder {
    opacity: 0;
}
.face .content .field-wrapper input[type="text"]::-moz-placeholder, .face .content .field-wrapper input[type="password"]::-moz-placeholder, .face .content .field-wrapper textarea::-moz-placeholder {
    opacity: 0;
}
.face .content .field-wrapper input[type="text"]:-ms-input-placeholder, .face .content .field-wrapper input[type="password"]:-ms-input-placeholder, .face .content .field-wrapper textarea:-ms-input-placeholder {
    opacity: 0;
}
.face .content .field-wrapper input[type="text"]:-moz-placeholder, .face .content .field-wrapper input[type="password"]:-moz-placeholder, .face .content .field-wrapper textarea:-moz-placeholder {
    opacity: 0;
}
.face .content .field-wrapper input[type="text"]:focus + label, .face .content .field-wrapper input[type="password"]:focus + label, .face .content .field-wrapper textarea:focus + label, .face .content .field-wrapper input[type="text"]:not(:placeholder-shown) + label, .face .content .field-wrapper input[type="password"]:not(:placeholder-shown) + label, .face .content .field-wrapper textarea:not(:placeholder-shown) + label {
    top: -35%;
    color: #42509e;
}
.face .content .field-wrapper input[type="submit"] {
    -webkit-appearance: none;
    appearance: none;
    cursor: pointer;
    width: 100%;
    background: black;
    line-height: 2em;
    color: #fff;
    border: 1px solid black;
    border-radius: 3px;
    padding: 5px;
}
.face .content .field-wrapper input[type="submit"]:hover {
    opacity: 0.9;
}
.face .content .field-wrapper input[type="submit"]:active {
    transform: scale(0.96);
}
.face .content .field-wrapper textarea {
    resize: none;
    line-height: 1em;
}
.face .content .field-wrapper textarea:focus + label, .face .content .field-wrapper textarea:not(:placeholder-shown) + label {
    top: -25%;
}
.face .thank-you-msg {
    position: absolute;
    width: 200px;
    height: 130px;
    text-align: center;
    font-size: 2em;
    color: black;
    left: 50%;
    top: 50%;
    -webkit-transform: translate(-50%, -50%);
}
button.btn.btn-dark {
    /* margin-top: 25px; */
}
.face .thank-you-msg:after {
    position: absolute;
    content: '';
    width: 50px;
    height: 25px;
    border: 10px solid black;
    border-right: 0;
    border-top: 0;
    left: 50%;
    top: 50%;
    -webkit-transform: translate(-50%, -50%) rotate(0deg) scale(0);
    transform: translate(-50%, -50%) rotate(0deg) scale(0);
    -webkit-animation: success ease-in 0.15s forwards;
    animation: success ease-in 0.15s forwards;
    animation-delay: 2.5s;
}
.face-front {
    transform: rotateY(0deg) translateZ(125px);
}
.face-top {
    height: 250px;
    transform: rotateX(90deg) translateZ(125px);
}
.face-back {
    transform: rotateY(180deg) translateZ(125px);
}
.face-right {
    transform: rotateY(90deg) translateZ(125px);
}
.face-left {
    transform: rotateY(-90deg) translateZ(125px);
}
.face-bottom {
    height: 250px;
    transform: rotateX(-90deg) translateZ(225px);
}
.nav {
    margin: 20px 0;
    padding: 0;
}
ul.nav {
    
    margin-left: 500px;
  
}
.nav li {
    display: inline-block;
    list-style-type: none;
    font-size: 1em;
    margin: 0 10px;
    color: #42509e;
    position: relative;
    cursor: pointer;
}
.nav li:after {
    content: "";
    position: absolute;
    bottom: 0;
    left: 0;
    width: 20px;
    border-bottom: 1px solid #42509e;
    transition: all ease-in 0.25s;
}
.nav li:hover:after {
    width: 100%;
}
/* span.psw {
    display: none;
} */
.psw, .signup, .singin {
    display: block;
    margin: 10px 0;
    font-size: 0.75em;
    text-align: center;
    color: #42509e;
    cursor: pointer;
}
span#psw {
    margin-top: 30px;
}
small {
    font-size: 0.7em;
}
@-webkit-keyframes success {
    from {
        -webkit-transform: translate(-50%, -50%) rotate(0) scale(0);
   }
    to {
        -webkit-transform: translate(-50%, -50%) rotate(-45deg) scale(1);
   }
}
p.password {
    font-size: 10px;
    margin-top: 5px;
}
#next1
{
    margin-top:25px;
}


span#psw12 {
    margin-top: -15px;
}


</style>
<body>
    
<div class="container">
    <div class="row">
        <div class="col-sm-3"></div>
                    <!-- <ul class="nav">
                        
                    <li onclick="showLogin()">Sign-in</li>
                    <li onclick="showSubscribe()">Email</li>
                    <li onclick="showSignup()">Enter all Details</li>
                    <li onclick="showForgotPassword()">Forgot password</li>
                    <li onclick="showContactUs()">Your Details</li>
                    <li onclick="showThankYou()">Register</li>
                    </ul> -->
            
    </div>
</div>
<form method="POST" >
    <div class="wrapper" method="POST" >
    <div class="rec-prism">
            <div class="face face-top">
            <div class="content">
                <h2>Enter Email </h2> 
                <form onsubmit="event.preventDefault()">
                <div class="field-wrapper">
                    <input type="text" namw="email" placeholder="Enter Email" id="inputemail" >
                    <label>Email</label>
                </div>
                <button type="button" class="btn btn-dark " id="next1" >next</button>   
                <span class="psw" id="psw13" onclick="showThankYou()">GO-BACK</span> 
                </form>
            </div>
            </div>



            <div class="face face-bottom">
            <div class="content">
                <h6 >Register</h6>
                <form onsubmit="event.preventDefault()">
                <div class="field-wrapper">
                    <input type="text" name="username" placeholder="Firstname"id="firstname" required>
                    <label>Firstname</label>
                </div>
                <div class="field-wrapper">
                    <input type="text" name="username" placeholder="Lastname"id="lastname" required >
                    <label>Lastname</label>
                </div>
                
                <div class="field-wrapper">
                    <!-- <input type="submit" id="sub1"> -->
                    <button type="button" class="btn btn-dark " id="sub1" >next</button>
                    <span class="psw" id="psw12" onclick="showLogin()">Sign-In</span>
                </div>
            
                </form>
            </div>
            </div>




            <div class="face face-back">
            <div class="content">
                <h2>Forgot your password?</h2>
            
                <form onsubmit="event.preventDefault()">
                <div class="field-wrapper">
                    <input type="text" name="email" placeholder="Enter Email" name="forgotemail" id="forgotinputemail" >
                    <label>Email</label>
                </div>
                <div class="field-wrapper">
                    <input type="password" name="password" id="pswd1" name="updatepswd" placeholder="password" autocomplete="new-password" id="password" >
                    <label>Password</label>
                </div>
                <div class="field-wrapper">
                    <input type="password" name="password2" id="pswd2" placeholder="password" autocomplete="new-password" id="re_password">
                    <label>Re-enter password</label>
                </div>
                <div class="field-wrapper">
                    <!-- <input type="submit" id="forgot" onclick="showLogin()"> -->
                    <center>
                    <button type="button" class="btn btn-dark" id="forgotpassbtn">Change Password</button></center>
                </div>
                <span class="psw" id="psw1" onclick="showLogin()">Go-Back</span>
                </form>
            </div>
            </div>





            <div class="face face-right">
            <div class="content">
                <h2>Enter All Details</h2>
                <form onsubmit="event.preventDefault()">
                <div class="field-wrapper">
                    <input type="text" name="Phone Number" placeholder="Phone Number"  id="phone" required >
                    <label>Phone Number</label>
                </div>
                <div class="field-wrapper">
                    <input type="password" name="password" placeholder="password" autocomplete="new-password" id="pswd">
                    <label>Password</label>
                    <p class="password"> Ex: Demo@123 </p>
                </div>
                <div class="field-wrapper">
                    <input type="password" name="password2" placeholder="password" autocomplete="new-password" id="re_psd">
                    <label>Re-enter password</label>
                </div>
                <div class="field-wrapper">
                    <button type="button" id="submit2" class="finalformsubmit btn btn-dark">Submit</button>
                    <span class="psw" id="psw12" onclick="showSubscribe()">GO-BACK</span>
                </div>
                
                </form>
            </div>
            </div>
                <span>{{message}}</span>




            <div class="face face-left">
            <div class="content">
                <!-- <p class="font_size">COnfirm UR Details</p> -->
                <form onsubmit="event.preventDefault()">
                <div class="field-wrapper">
                    <input type="text" name="username" placeholder="Firstname"id="confirmfirstname"  >
                    <label>Firstname</label>
                </div>
                <div class="field-wrapper">
                    <input type="text" name="username" placeholder="Lastname"id="confirmlastname" required >
                    <label>Lastname</label>
                </div>
                <div class="field-wrapper">
                    <input type="text" name="email" placeholder="Enter Email" id="confirminputemail" >
                    <label>Email</label>
                </div>
                <div class="field-wrapper">
                    <input type="text" name="Phone Number" placeholder="Phone Number"  id="confirmphone" required >
                    <label>Phone Number</label>
                </div>
                <div class="field-wrapper">
                    <input type="password" name="password" placeholder="password" autocomplete="new-password" id="confirmpassword" >
                    <label>Password</label>
                </div>
                <div class="field-wrapper">
                    <button type="button" id="submit5" class="finalformsubmit btn btn-dark">Confirm Details</button>
                </div>
                </form> 
            </div>
            </div>


            
            <div class="face face-front">
                <div class="content">
                    <h2>Sign-In</h2>
                    <h6 >{{msg}}</h6>
                    <form method="POST" action="/login">
                    <div class="field-wrapper">
                        <input type="text" name="name" placeholder="name" id="emailsign" required>
                        <label>Email</label>
                    </div>
                    <div class="field-wrapper">
                        <input type="password" required  name="password" placeholder="password" id="pswdsign"></textarea>
                        <label>Password</label>
                    </div>
                    <div class="field-wrapper">
                        <!-- <input type="submit" > -->
                        <button type="submit" id="btnsignin" class="btn btn-dark " >Submit</button>
                    </div>
                    </form> 
                    <span class="psw" id="psw" onclick="showForgotPassword()">Forgot Password?   </span>
                    <span class="signup" id="signup" onclick="showThankYou()">Not a user?  Sign up</span>
                    
                </div>
            </div>

        </div>
    </div>
    <span class="message"></span>
</form>

<!-- <a href="/dashboard">dufasduasudgasuid</a> -->
<!-- <script  src="function.js"></script> -->
</body>
</html>


<!-- function.js -->
<script>
    $(document).ready(function(){
        $("#sub1").click(function(){
            $("#inputemail1").hide();
        });
        $("#sub1").click(function(){
            $("#inputemail1").show();
        });

    })
</script>

<script>
    $(document).ready(function(){
        $("#signup").click(function(){
            $("#submit5").hide();
        })
    })
</script>

<script>
    $(document).ready(function(){
        $("#submit2").click(function(){
            $("#submit5").show();
        })
    })
</script>





<script>
    let prism = document.querySelector(".rec-prism");

function showSignup(){
  prism.style.transform = "translateZ(-100px) rotateY( -90deg)";
}
function showLogin(){
  prism.style.transform = "translateZ(-100px)";
}
function showForgotPassword(){
  prism.style.transform = "translateZ(-100px) rotateY( -180deg)";
}

function showSubscribe(){
  prism.style.transform = "translateZ(-100px) rotateX( -90deg)";
}

function showContactUs(){
  prism.style.transform = "translateZ(-100px) rotateY( 90deg)";
}

function showThankYou(){
  prism.style.transform = "translateZ(-100px) rotateX( 90deg)";
}


</script>
<script>
    
    $(document).ready(function(){
        $("#sub1").on("click",function(){
            var firstname=$("#firstname").val();
            var pattern_f=/^(\w+\s?)*\s?$/
            if(!pattern_f.test(firstname)){
                alert("Please enter correct Firstname")
                return false
            }

            var lastname=$("#lastname").val();
            var pattern_l=/^(\w+\s?)*\s?$/
            if(!pattern_l.test(lastname)){
                alert("Please enter correct Lastname")
                return false
            }
            
            if((firstname=="") || (lastname=="")){
               
                alert("Please enter all details")
                return false
            }
            else{
                localStorage.setItem("firstname",firstname)
                localStorage.setItem("lastname",lastname)
                
                showSubscribe()
            }
            
        })
        $("#next1").on("click",function(){
            var email=$("#inputemail").val();
            var pattern2=/[a-zA-z0-9_\-\.]+[@][a-z]+[\.][a-z]{2,3}/
            if(!pattern2.test(email)){
                alert("Please enter correct email")
                return false
            }
            else{
                var finalemail1=localStorage.setItem("email",email)
                var finalemail=localStorage.getItem("email")
                // alert("finalemail : ",finalemail)
                $.ajax({
                url:'/email1',
                type:'POST',
                data:JSON.stringify(({"email":finalemail})),
                contentType:"application/json;charset=UTF-8",
                // beforeSend:function(){   
                //     $(".message").html("<h6>Please Wait we are submitting..")
                // },
                success: function(response) {
                    // console.log("success : ",response['error'])
                    // alert(response['error'])
                    if (response['error']=="Email Id already exists"){
                        alert(response['error'])
                        return false
                    }
                    else{
                        showSignup()
                    }
                    
                },
                // complete:function(){
                // console.log("successfully submiited")
                // $(".message").html("<h6>Submitted</h6>")
                // },
                error:function(response){
                console.log("errror happend",response)
                }

            })

                // showSignup()
            }
        });

        $("#submit2").on("click",function(){
            var phone=$ ("#phone").val();
            var pattern1=/^\(?([6-9]{1})\)?[-. ]?([0-9]{9})$/
            
            var password=$("#pswd").val();
            var pattern3=/[a-zA-Z]{1}[a-z].{6,20}/
            if(!pattern3.test(password)){
                alert("Pattern Doesn't Match")
                
                return false
            }
            var re_pswd=$("#re_psd").val();

            if((phone=="") || (password=="") || (re_pswd=="")){
                alert("Please enter all details")
                return false
            }
            else if(password!=re_pswd){
                alert("Password Doesn't Match")
                return false
            }
            if(!pattern1.test(phone)){
                alert("Not a valid number")
                return false
            }
            
            else{
                
                showContactUs()
                localStorage.setItem("phone",phone)
                localStorage.setItem("password",password)
                var a=localStorage.getItem("firstname")
                var b=localStorage.getItem("lastname")
                var c=localStorage.getItem("email")
                var d=localStorage.getItem("password")
                var e=localStorage.getItem("phone")
                console.log("printing values...")
                console.log(a,b,c,d,e)
                $("#confirmfirstname").attr("value",a)
                $("#confirmlastname").attr("value",b)
                $("#confirminputemail").attr("value",c)
                $("#confirmpassword").attr("value",d)
                $("#confirmphone").attr("value",e)


       
                
            }
            
        });

        
    })

    
</script>


<script>
    $(document).ready(function(){
        $("#submit5").on("click",function(){
            var firstname=$("#confirmfirstname").val();
            var lastname=$("#confirmlastname").val();
            var email=$("#confirminputemail").val();
            var password=$("#confirmpassword").val();
            var phone=$("#confirmphone").val();
            if((firstname=="")||(lastname=="")||(email=="")||(password=="")||(phone=="")){
                alert("Please enter all the details")
                return false
            }
            $.ajax({
            url:'/db',
            type:'POST',
            data:JSON.stringify(({"firstname":firstname,"lastname":lastname,"email":email,"password":password ,"phone":phone})),
            contentType:"application/json;charset=UTF-8",

            beforeSend:function(){
                // $(".message").html("<h6>Please Wait we are submitting..")
            },
            success:function(response){
                alert("Successfully Submitted")
                $("#submit5").hide();
                $("#psw").show();
                
                // console.log("success : ",response)
                // alert("Successfully Registered")
                $("input").val('');

            },
            complete:function(){
                // $(".message").html("<h6>Submitted</h6>")
            },
            error:function(){
                console.log("errror happend")
            }
            
            });
            localStorage.clear();
            showLogin()

        })
    })

</script>   

<script>
    // var a=localStorage.getItem("firstname")
    // var b=localStorage.getItem("lastname")
    // var c=localStorage.getItem("email")
    // var d=localStorage.getItem("password")
    // var e=localStorage.getItem("phone")
    // console.log(a,b,c,d,e)
    $(document).ready(function(){
        
        $(".finalformsubmit").on("click",function(){
            console.log("In function")
            var a=localStorage.getItem("firstname")
            var b=localStorage.getItem("lastname")
            var c=localStorage.getItem("email")
            var d=localStorage.getItem("password")
            var e=localStorage.getItem("phone")
            console.log("printing values...")
            console.log(a,b,c,d,e)
            $.ajax({
            // url:'/db',
            url:'/'
            type:'POST',
            data:JSON.stringify(({"firstname":a , "lastname":b,"email":c,"password":d,"phone":e})),
            contentType:"application/json;charset=UTF-8",
            beforeSend:function(){
            // $(".message").html("<h6>Please Wait we are submitting..")
          },
          success:function(response){
            console.log("success : ",response)
          },
          complete:function(){
            // $(".message").html("<h6>Submitted</h6>")
          },
          error:function(){
            console.log("errror happend")
          }
        });
    });
    });
</script>

<script>
$(document).ready(function(){
    $("#forgotpassbtn").on("click",function(){
        var email=$("#forgotinputemail").val();
        var updated_password=$("#pswd1").val();
        var c_pswd=$("#pswd2").val();
        var pattern4=/[a-zA-Z]{1}[a-z].{6,20}/
        // console.log(updated_password)
        // console.log(c_pswd)
        if((email=="") || (updated_password=="") || (c_pswd=="")){
                alert("Please enter all details")
                return false
            }
        else if (!pattern4.test(updated_password)){
            alert("Enter correct pattern ")
            return false
        }
        else if(updated_password!=c_pswd){
            alert("Password Doesn't Match")
                return false
        }
        else{
            // alert("infjdfjdf")
            // showLogin()
            $.ajax({
                url:'/update',
                type:'POST',
                data:JSON.stringify({"email":email,"password":updated_password}),
                contentType:"application/json;charset=UTF-8",
                beforeSend:function(){
                    // $(".message").html("<h6>Please Wait we are submitting..")
                },
                success:function(response) {
                    alert(response["message"])
                    $("input").val('');
                    // showLogin().
                },
                complete:function(){
                    // console.log("successfully submiited")
                    // $(".message").html("<h6>Submitted</h6>")
                },
                error:function(){
                    console.log("errror happend")
                },
            });
            
            
            
        }
        showLogin()
    });
    })
</script>
<!-- <script>
    $(document).ready(function(){
       
        $("#btnsignin").on("click",function(){
            // alert("clicking")
            var login_email=$("#emailsign").val();
            var login_pswd=$("#pswdsign").val();
            // alert(login_email)
            if ((login_email=="") || (login_pswd=="")){
               
                alert("Please Enter All Details")
                return false 
            }
            
            else{
                $.ajax({
                    url:'/login',
                    type:'POST',
                    data:JSON.stringify({"email":login_email,"password":login_pswd}),
                    contentType:"application/json;charset=UTF-8",
                    beforeSend:function(){
                        console.log("redirecting...")
                        // $(".message").html("<h6>Please Wait we are submitting..")
                    },
                    error:function(){
                        console.log("errror happend")
                    },
                });
            }
            
            
        });
        

    })
</script> -->

<!-- <script>
//     $("#forgotpassbtn").on("click",function(){
//         alert("click")
//         console.log("hdjsahdusaud")
//         var updated_password=$("#pswd1").val();
//         var c_pswd=$("#pswd2").val();
//         console.log(updated_password)
//         console.log(c_pswd)
//         var pattern4=/[a-zA-Z]{1}[a-z].{6,20}/
//         if((updated_password=="") || (c_pswd=="")){
//                 alert("Please enter all details")
//                 return false
//             }
//         else if(!pattern4.test(updated_password)){
//                 alert("Enter correct pattern ")
//                 return false
//             }
      
       
//         else if(updated_password!=c_pswd){
//                 alert("Password Doesn't Match")
//                 return false
//         }

//         else{
//             $.ajax({
//             url:'/update'
//             type:'POST'
//             data:JSON.stringify({"password":updated_password}),
//             contentType:"application/json;charset=UTF-8",
//             beforeSend:function(){   
//                 $(".message").html("<h6>Please Wait we are submitting..")
//             },
//             success: function() {
//                 console.log("success")
//             },
//             complete:function(){
//                 // console.log("successfully submiited")
//                 $(".message").html("<h6>Submitted</h6>")
//             },
//             error:function(){
//                 console.log("errror happend")
//             }
//             showLogin()
//         })

//         }
//     })
// })
// </scr -->


