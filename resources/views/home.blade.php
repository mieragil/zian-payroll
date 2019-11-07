@extends('layouts.app')

@section('content')
{{-- user view --}}
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="row">
            <div class="col-lg-9">
                <div class="card shadow">
                    <div class="card-header text-light bg-dark">
                        <div class="row">
                            <div class="col-6">
                                <h1>4:20 PM</h1>
                            </div>
                            <div class="col text-right">
                                Tuesday <br>
                                October 1, 2019
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                       <div class="row">
                           <div class="col-lg-3">
                                <img src="{{ asset('/img/wew.png') }}" alt="..." class="rounded-circle img-fluid" >
                            </div>
                            <div class="col-lg-4">
                                <small class="text-secondary">Name</small>
                                <p class="lead">{{strtoupper(Auth::user()->name)}}</p>

                                <small class="text-secondary">Employee Status</small>
                                <p class="lead">{{strtoupper(Auth::user()->emp_status)}}</p>
                            </div>
                            <div class="col-lg-5">
                                <small class="text-secondary">Department</small>
                                <p class="lead">{{strtoupper(Auth::user()->department)}}</p>

                                <small class="text-secondary">Position</small>
                                <p class="lead">{{strtoupper(Auth::user()->position)}}</p>
                            </div>
                       </div>
                    </div>
                </div><br>
                <div class="card shadow mb-4">
                    <h5 class="card-header text-light bg-primary">
                       Payments Received
                    </h5>
                    <div class="card-body">
                        <table class="table table-hover">
                                <thead>
                                  <tr class="text-secondary">
                                    <th scope="col">#</th>
                                    <th scope="col">Period</th>
                                    <th scope="col">Payment</th>
                                    <th scope="col">Date Received</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <th scope="row">1</th>
                                    <td>Oct. 2,2019 - Oct 10, 2019 </td>
                                    <td>Php 7,000</td>
                                    <td>Oct 15, 2019</td>
                                  </tr>
                                </tbody>
                              </table>
                    </div>
                </div>

                <div class="card shadow">
                    <div class="card-header pb-0" style="background-color:mediumslateblue">
                        <div class="row">
                            <div class="col-6 text-white">
                                <div class="row">
                                    <i class="cui-clock fa-2x mr-2 mb-2 ml-2"></i>
                                    <h5 class="mt-1">Application for Overtime</h5>
                                </div>
                            </div>
                            <div class="col-6 text-right">

                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('employee.fileOvertime', Auth::user()->id) }}" method="POST">
                            @csrf
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="date">Date of Overtime</label>
                                        <input type="date" name="date" id="date" class="form-control" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="reason">Reason of Overtime</label>
                                        <textarea type="text" name="reason" id="reason" class="form-control" required></textarea>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="minutes">Number of Minutes:</label>
                                        <input type="number" name="minutes" id="minutes" class="form-control" max="999999" min="60" required>
                                    </div>
                                </div>
                                <button class="btn btn-success float-right mt-3"><i class="cui-arrow-circle-right mt-1"></i>
                                    Submit</button>
                        </form>
                        <br><br>
                
                        <hr>
                        @if (!$data['OTs']->isEmpty())
                            <p class="text-left font-weight-bolder">Overtime Record:</p>
                            <table class="table table-hover table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Date of OT</th>
                                        <th scope="col">Minutes</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data['OTs'] as $ot)
                                        <tr>
                                            <td>{{$ot->date}}</td>
                                            <td>{{$ot->minutes}}</td>
                                            @if ($ot->status == 'PENDING')
                                                <td><h4 style="font-size: 15px" class="badge badge-primary">{{$ot->status}}</h4></td>
                                            @elseif($ot->status == 'DECLINED')
                                                <td><h4 style="font-size: 15px" class="badge badge-danger">{{$ot->status}}</h4></td>
                                            @else
                                                <td><h4 style="font-size: 15px" class="badge badge-success">{{$ot->status}}</h4></td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div><br>


            </div>

            <div class="col">
                <div class="card shadow mb-4">
                    <h5 class="card-header text-light bg-secondary"><i class="fas fa-money-check"></i>
                        Running Salary</h5>
                    <div class="card-body text-center">
                        <h3>5,000</h3>
                        <small><p>Oct 26, 2019 - Nov 10, 2019</p></small>
                        <p class="text-primary">To receive on Nov. 15, 2019</p>
                    </div>
                </div>

                <div class="card shadow">
                    <h5 class="card-header text-light bg-info"><i class="cui-list-rich mr-1"></i>
                        Attendance SHIT</h5>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item py-0">Friday - 10/02/2019 <br>
                            <p class ="text-success"> <i class="fas fa-circle mr-2"></i></i> Present</p>
                            </li>
                            <li class="list-group-item py-1">Thursday - 10/02/2019 <br>
                            <p class="text-danger"> <i class="fas fa-circle mr-2"></i></i> Absent</p>
                            </li>
                            <li class="list-group-item py-1">Wednesday - 10/02/2019 <br>
                            <p class ="text-success"> <i class="fas fa-circle mr-2"></i> Present</p>
                            </li>
                            <li class="list-group-item py-1">Tuesday - 10/02/2019 <br>
                            <p class ="text-success"> <i class="fas fa-circle mr-2"></i> Present</p>
                            </li>
                            <li class="list-group-item py-1">Tuesday - 10/02/2019 <br>
                            <p class ="text-success"> <i class="fas fa-circle mr-2"></i> Present</p>
                            </li>
                        </ul>
                        <br>
                        <div class="text-right">
                            <a href="#" class="">View More...</a>
                        </div>
                    </div>
                </div>
                <br>
                <div class="card shadow">
                        <h5 class="card-header text-light bg-info"><i class="cui-briefcase mr-1"></i>
                            Accountability</h5>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item py-0">
                                <p>Laptop</p>
                                <p>Tablet</p>
                                </li>
                            </ul>
                            <div class="text-right">
                                <a href="#" class="">View More...</a>
                            </div>
                        </div>
                    </div>
                <br>
            </div>
        </div>
    </div>
@endsection
