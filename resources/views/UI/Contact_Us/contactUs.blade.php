@extends('Layouts.userLayout')

@section('content')
    <form action="/contact-uss" method="POST">
        @csrf
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-8">
                    <h2>Contact Us</h2>
                    <br />
                    <div class="row">
                        <div class="col-md-4">
                            <input type="text" placeholder="Name*" class="form-control" id="name" name="name" />
                        </div>
                        <div class="col-md-4">
                            <input type="text" placeholder="Email*" class="form-control" id="email" name="email" />
                        </div>
                        <div class="col-md-4">
                            <input type="text" placeholder="Subject*" class="form-control" id="subject"
                                name="subject" />
                        </div>
                    </div>
                    <br />
                    <textarea rows="10" cols="10" placeholder="Message*" class="form-control" id="message" name="message"></textarea>
                    <br />
                    <br />
                    <button type="submit" class="btn btn-danger pe-4 ps-4 pt-2 pb-2">
                        <b>Send Message</b>
                    </button>
                </div>
    </form>
    <div class="col-md-4">
        <h2>Contact Info</h2>

        <div class="container mt-4">
            <div class="row ">
                <div class="col-md-1"> <i class="bi bi-geo-alt-fill text-danger"></i></div>
                <div class="col-md-11 mb-2">
                    <b class="text-secondary">203, Shree Ganesh Galaxy, Pune Alandi Road,
                        Wadhukmadi, Pune</b>
                </div>
                <div class="col-md-1">
                    <i class="bi bi-phone text-danger"></i>
                </div>
                <div class="col-md-11 mb-2">
                    <b class="text-secondary">+918830163185, +919689049548</b>
                </div>
                <div class="col-md-1">
                    <i class="bi bi-envelope text-danger"> </i>
                </div>
                <div class="col-md-11">
                    <b class="text-secondary"> sanjay.vitkare@cg-it.in
                        <br />
                        chetan.barde@cg-it.in
                        <br />
                        shahuraj.yewate@cg-it.in</b>
                </div>
            </div>

        </div>
    </div>
    </div>
    </div>
@endsection
