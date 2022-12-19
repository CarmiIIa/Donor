@extends('layout')

@section('content')

    <div class="container mb-5">
      <form method="POST" action="{{route('update', $item['id'])}}">
      @csrf
      @method('PATCH')
      @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
  <div class="row ">
    <div class="col-lg-9 mx-auto">
      <div class="card mt-2 mx-auto p-4 bg-light">
        <div class="" style="margin-left: 35px;">
          <h1>Edit Donation</h1> 
      </div>
          <div class="card-body bg-light"> 
          <div class = "container">
      
          <form id="contact-form" role="form">
          <div class="controls">
            <div class="form-group create-data">
                <label>Golongan Darah</label>
                   <select class="form-control" name="bloodtype">
                           <option value="A">A</option>
                           <option value="B">B</option>
                           <option value="AB">AB</option>
                           <option value="O">O</option>
                   </select>
                   <br>
                   
           </div>
              <div class="row">
                
                  <div class="col-md-6">
                      <div class="form-group">
                          <input type="number" name="nik" class="form-control"  placeholder="NIK" value="{{ $item['nik'] }}">                        
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <input type="number" name="age" class="form-control" placeholder="Age" value="{{ $item['age'] }}">
                      </div>
                  </div>
              </div>
              <br>
              <div class="row">
                  <div class="col-md-12">        
                          <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $item['name'] }}">          
                      </div>
                  </div>
                  <br>
                  <div class="col-md-13" >
                    <div class="form-group">
                  <textarea name="address" class="form-control"  placeholder="Address" >{{ $item['address'] }}</textarea>
                        </div>
                    </div>
                    <br>
                    <div class="col-md-13">
                        <div class="form-group">
                            <input type="number" name="totalcc" class="form-control"  placeholder="Total Kantong" value="{{ $item['totalcc'] }}">                        
                        </div>
                    </div>
                  {{-- <div class="col-md-12">
                      <div class="form-group">
                          <label for="form_need">Please specify your need *</label>
                          <select id="form_need" name="need" class="form-control" required="required" data-error="Please specify your need.">
                              <option value="" selected disabled>--Select Your Issue--</option>
                              <option >Request Invoice for order</option>
                              <option >Request order status</option>
                              <option >Haven't received cashback yet</option>
                              <option >Other</option>
                          </select>                       
                      </div>
                  </div> --}}
                  {{-- <div class="row">
                    <div class="col-md-12">
                            <label for="form_email">Alamat</label>
                            <input id="form_email" type="text" name="address" class="form-control" required="required" data-error="Valid email is required.">          
                        </div>
                    </div> --}}
              </div>
              <br>
              
              <div class="row" >   
                <div class="col ">                    
                    {{-- <input type="submit" class="btn btn-dark btn-send btn-block" value="Back">--}}
                    <a class="fa-solid fa-arrow-left text-dark" style="font-size: 30px;" href="{{route('index') }}"></a>
                    <button class="fa-solid fa-plus text-dark btn" style="font-size: 30px; margin-bottom: 8px; margin-left:5px;"></button>
                    
                </div>        
              </div>
      </div>
       </form>
      </div>
          </div>
  </div>
  </div> 
</div>
</div>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </body>
</html>

@endsection