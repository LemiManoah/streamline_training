@extends('patients.layouts')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New patient</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{route('patients.index')}}"> Back</a>
            <a class="btn btn-primary" href="{{route('patients.store')}}"> View Patients</a>
        </div>
    </div>
</div>
   
<!-- @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif -->
   
<form action="{{ route('patients.store') }}" method="POST" enctype="multipart/form-data" >
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>First name:</strong>
                <input type="text" name="first_name" class="form-control" placeholder="first name" value="{{old('first_name')}}">
            </div>
            <div class="form-group">
                <strong>Last name:</strong>
                <input type="text" name="last_name" class="form-control" placeholder="last_name" value="{{old('last_name')}}">
            </div>
            <div class="form-group">
                <strong >Gender:</strong>
                <label for="male">Male</label>
                <input type="radio" name="gender" id = "male" value="m" @if(old('gender')=='m') checked @endif>
                <label for="female">Female</label>
                <input type="radio" name="gender" id="female" value="f" @if(old('gender')=='f') checked @endif>
                <br>

            </div>
            <div class="form-group">
                <strong>Date of Birth:</strong>
                <input type="date" name="dateOfBirth" class="form-control" placeholder="dd/mm/yyyy" value="{{ old('dateOfBirth') }}">
            </div>
            <div class="form-group">
                <strong>Phone Number:</strong>
                <input type="text" name="phonenumber" class="form-control @error('phonenumber')is-invalid @enderror" value="{{ old('phonenumber') }}">
                @error('phonenumber')
                    <div class = "alert alert-danger">
                        {{$message}}
                    </div>
                
                @enderror
            </div>
            <div class="form-group">
                <strong>NIN:</strong>
                <input type="text" name="NIN" id= "NIN"class="form-control" value="{{ old('NIN') }}">
            </div>
            <div class="form-group">
                <strong >Marital status:</strong>
                <label for="single">Single</label>
                <input type="radio" name="marital" id="single" value="1" @if(old('marital')=='1') checked @endif>
                <label for="married">Married</label>
                <input type="radio" name="marital" id="married" value="2" @if(old('marital')=='2') checked @endif>
                <label for="single">Divorced</label>
                <input type="radio" name="marital" id="divorced" value="3" @if(old('marital')=='3') checked @endif>
            </div>

            <div class="form-group">
                <strong>Next of Kin:</strong>
                <input type="text" name="nextOfkin" id= "nextOfkin"class="form-control" value="{{ old('nextOfkin') }}">
            </div>

            <div class="form-group">
                <strong>Kin Phone Number:</strong>
                <input type="text" name="kincontactNumber" class="form-control" value="{{ old('nextOfkin') }}">
            </div>

            <div class="form-group">
                <strong>Relationship:</strong>
                <input type="text" name="Relationship" class="form-control" value="{{ old('Relationship') }}">
            </div>
            <div class="form-group">
                <strong>Profile Picture:</strong>
                <input  type="file" name="picture" class="form-control">
            </div>
            
            
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
@endsection