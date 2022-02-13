@extends('layouts.admin')

@section('content')
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Banner</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Banner</li>
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
                    @if(session()->has('message'))
                        @if($message = Session::get('message'))
                            <div class="alert alert-success"> {{ $message }} </div>
                        @endif
                    @endif

                  <div class="text-right">
                    <a href="{{url('order-schedule-list')}}" class="btn bnt-sm customBtn"> <i class="fa fa-list"></i> Order Schedule List</a>
                  </div>
                  <br>
                </div>
                   <div class="col-lg-12">
                      <form method="POST" name="banner-form" id="banner-form" action="{{route('order-schedule.update', $getDetails->id)}}" enctype="multipart/form-data">
                        @method('PATCH')
                        {{ csrf_field() }}
                        <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label> Order From Time  </label>
                                <select name="order_from_time" class="form-control" required>
                                <?php 
                                    for($hours=0; $hours<12; $hours++){
                                      for($mins=0; $mins<60; $mins+=5) { 
                                        $selected = '';
                                        $time = str_pad($hours,2,'0',STR_PAD_LEFT).':'.str_pad($mins,2,'0',STR_PAD_LEFT);
                                        if($getDetails->from_time == $time){
                                          $selected = "selected = 'selected'";
                                        }
                                      echo '<option '.$selected.' value= "'.$time.'">'.$time.'</option>';
                                      } 
                                    }  
                                ?>
                              </select>

                            </div>    
                          </div>
                          <div class="col-sm-4">
                            <div class="form-group">
                              <label> Order To Time </label>
                              <select name="order_to_time" class="form-control" required>
                                <?php 
                                    for($hours=0; $hours<12; $hours++){
                                      for($mins=0; $mins<60; $mins+=5) { 
                                        $selected = '';
                                        $time = str_pad($hours,2,'0',STR_PAD_LEFT).':'.str_pad($mins,2,'0',STR_PAD_LEFT);
                                        if($getDetails->to_time == $time){
                                          $selected = "selected = 'selected'";
                                        }
                                      echo '<option '.$selected.' value= "'.$time.'">'.$time.'</option>';
                                      } 
                                    }  
                                ?>
                              </select>
                            </div>    
                          </div> 

                          <div class="col-sm-3">
                            <div class="form-group">
                              <label> Status </label> <br>
                              <div class="icheck-primary d-inline">
                                <input type="radio" id="radioPrimary1" name="status" value="1" {{($getDetails->status == 1) ? 'checked' : '' }} >
                                <label for="radioPrimary1">Active
                                </label>
                              </div>  

                              <div class="icheck-primary d-inline">
                                <input type="radio" id="radioPrimary2" name="status" value="0" {{($getDetails->status == 0) ? 'checked' : '' }} >
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