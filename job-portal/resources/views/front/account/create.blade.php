@extends('front.layouts.app')
@section('main')
<section class="section-5">
    <div class="container my-5">
        <div class="py-lg-2">&nbsp;</div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-5">
                <div class="card shadow border-0 p-5">
                    <h1 class="h3">Register</h1>
                    <form action="#" name="register-form" id="register-form">
                        <div class="mb-3">
                            <label for="name" class="mb-2">Name*</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name">
                            <p></p>
                        </div> 
                        
                        <div class="mb-3">
                            <label for="email" class="mb-2">Email*</label>
                            <input type="text" name="email" id="email" class="form-control" placeholder="Enter Email">
                            <p></p>
                        </div> 
                        
                        <div class="mb-3">
                            <label for="password" class="mb-2">Password*</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password">
                            <p></p>
                        </div> 
                        
                        <div class="mb-3">
                            <label for="confirmation_password" class="mb-2">Confirm Password*</label>
                            <input type="password" name="confirmation_password" id="confirmation_password" class="form-control" placeholder="Enter Password">
                            <p></p>
                        </div> 
                        
                        <button type="submit"  class="btn btn-primary mt-2">Register</button>
                    </form>                    
                </div>
                <div class="mt-4 text-center">
                    <p>Have an account? <a  href={{route('account.login')}}>Login</a></p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('custom-js')
<script>
    $("#register-form").submit(function(event){
        event.preventDefault();
        var formData = $(this).serializeArray();
        $.ajax({
            url : "{{route('account.registerProccess')}}",
            method : 'POST',
            data : formData,
            dataType : 'json',
            success : function ( response ){
                if(response['status'] == false){
                    var error = response['errors'];
                    console.log(error);
                    if(error['name']){
                        $("#name").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(error['name'])
                    } else {
                        $("#name").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('')
                    }

                    if(error['email']){
                        $("#email").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(error['email'])
                    } else {
                        $("#email").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('')
                    }
                    if(error['password']){
                        $("#password").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(error['password'])
                    } else {
                        $("#password").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('')
                    }
                    if(error['confirmation_password']){
                        $("#confirmation_password").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(error['confirmation_password'])
                    } else {
                        $("#confirmation_password").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('')
                    }
                } else {
                    window.location.href = "{{route('account.login')}}"
                }
            },
            error : function ( error ){
                console.log(error);
            }
        })
    });
</script>
@endsection