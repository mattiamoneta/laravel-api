@extends('layouts.guest')
@section('content')
    <div class="jumbotron p-5 bg-light rounded-3 text-center vh-100 d-flex align-items-center">
        <div class="container py-5 ">


            <h1 class="display-4 fw-bold mb-3">Bool<span class="display-4">folio<sup><span
                            class="badge rounded-pill border text-dark pill-sup ms-2">DEMO</span></sup></span></h1>

           <div class="row mb-5">
            <div class="col-5 mx-auto small">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae magnam ipsum quo minima repellat laboriosam
                    laborum culpa ullam cum perferendis.</p>
            </div>

           </div>


            <a href="{{ route('admin.dashboard') }}" class="btn btn-primary" type="button">Go to Admin</a>
        </div>
    </div>
@endsection
