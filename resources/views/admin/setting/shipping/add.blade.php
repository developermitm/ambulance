@extends('layouts.admin')

@section('content')
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Shipping Cost</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Shipping Cost</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card card-primary card-outline">
              <div class="card-body">
                <div class="col-lg-12">
                   @if(session()->has('message.level'))
                        @if ($message = Session::get('message.content'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button> 
                                <strong>{{ $message }}</strong>
                        </div>
                        @endif
                  @endif
<style>
  .error{color : red ;}
</style>
                  <div class="text-right">
                    <a href="{{url('shipping-list')}}" class="btn bnt-sm customBtn"> <i class="fa fa-list"></i> Shipping Cost List</a>
                  </div>
                  <br>
                </div>
                   <div class="col-lg-12">
                      <form method="POST" name="banner-form" id="banner-form" action="{{route('shipping.store')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                          <div class="col-sm-3">
                            <div class="form-group">
                                <label> Minimum Order Amount  </label>
                                <input type="text" name="minimum_order_amount"  value="{{old('minimum_order_amount')}}" class="form-control" placeholder="Enter Minimum Order Amount" required>
                            </div>    
                          </div>
                          <div class="col-sm-3">
                            <div class="form-group">
                              <label> Shipping Cost <small style="color:red; font-size:15px"> (Flat) </small>  </label>
                              <input type="text" class="form-control @error('shipping_amount') is-invalid @enderror" name="shipping_amount" placeholder="Shipping Cost (Flat)" required>
                              @error('shipping_amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            </div>    
                          </div> 

                          <div class="col-sm-3">
                            <div class="form-group">
                              <label> Status </label> <br>
                              <div class="icheck-primary d-inline">
                                <input type="radio" id="radioPrimary1" name="status" value="1" checked="checked">
                                <label for="radioPrimary1">Active
                                </label>
                              </div>  

                              <div class="icheck-primary d-inline">
                                <input type="radio" id="radioPrimary2" name="status" value="0" >
                                <label for="radioPrimary2">InActive
                                </label>
                              </div>
                            </div>    
                          </div>
                        </div>

                      <input type="submit" name="submit" value="submit" class="btn btn-md customBtn">  
                      </form>
                   </div>
              </div>
            </div><!-- /.card -->
          </div>

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

<script type="text/javascript">
  document.getElementById('bannerImage').onchange = function () {
  var src = URL.createObjectURL(this.files[0])
  document.getElementById('image').src = src
}
</script>

@endsection           