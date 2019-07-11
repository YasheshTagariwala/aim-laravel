@extends('layouts.master')
@section('title','Register')
@section('pagebody')

<!-- Start Inner Contents -->               
        
        <section class="login-header">
            <div class="container">
                <h1>Invitation required</h1>
            </div>
        </section>
        <section class="myaccount-body">
            <div class="myaccount-document"> 
                <div class="container">                                  
                    <h3 >Please Sign Up</h3>                
                    <div class="col-12 text-center">
                        <form name="form" method="post" action="/register/store">
                            {{csrf_field()}} 
                            <select name="grbid" class="form-control">
                                @foreach($usergroup as $group)
                                <option value="{{$group->id}}">{{$group->name}}</option>
                                @endforeach
                            </select>
                            <br>
                            <input class="form-control" name="first_name" value="{{$fname}}" type="hidden" required="">
                            <input class="form-control" name="last_name" value="{{$lname}}" type="hidden"><br>
                            <input class="form-control" name="username" value="{{$uname}}" type="hidden" readonly="">
                            <input class="form-control" name="email" placeholder="Email Id" value="{{$email}}" type="hidden" >
                            <input class="form-control" name="password" id="password" value="{{$provider}}" type="hidden">
                            <input class="form-control" name="provider" id="provider" value="{{$provider}}" type="hidden">
                            
                            <label for="country">&nbsp<input type="checkbox" name="terms" id="terms" checked="">&nbsp I accepts the <a href="{{url('/term-use')}}" target="_blank" required>Terms & Conditions.</a></label>
                            <p><button style="background-color: #37b2d6; padding: 5px 20px; border: 2px solid #37B2D6; color: #fff;" name="submit" type="submit" onclick="return Validate()" />SUBMIT</button></p>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Inner Contents -->                 
              
<script type="text/javascript">
    // function Validate() {
    //     var terms = document.getElementById("terms").value;
    //     // var confirmPassword = document.getElementById("cpassword").value;
    //     // if (password != confirmPassword) {
    //     //     alert("Passwords do not match.");
    //     //     return false;
    //     // }
    //     if (terms != 'false') {
    //         alert("Please accepts the Terms & Conditions.");
    //         return false;
    //     }
    //     return true;
    // }
</script> 

@endsection