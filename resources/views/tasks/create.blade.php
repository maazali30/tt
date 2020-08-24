@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 15px;">
  <div class="row">
      <div class="col-md-12">
          <div class="card">
              <div class="card-body">
                  <h4 class="card-title">Enter Task Details</h4>
                  <form class="needs-validation" method="post" action="{{ route('task.store') }}" data-parsley-validate novalidate>
                    
                    <div class="form-group row {{ $errors->has('product_id') ? ' has-error' : '' }}">
                        <label for="product_id" class="col-sm-3 text-right control-label col-form-label">Task Product</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="product_id" name="product_id" required="required">
                                <option value="">Select Product</option>
                                @if(count($taskProducts))
                                  @foreach($taskProducts as $row)
                                    <option value="{{ $row->id }}">{{$row->name}} - {{ $row->location->name }}</option>
                                  @endforeach
                                @endif
                            </select>
                            @if ($errors->has('product_id'))
                            <span class="help-block">{{ $errors->first('product_id') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row {{ $errors->has('description') ? ' has-error' : '' }}">
                        <label for="description" class="col-sm-3 text-right control-label col-form-label">Task Description</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="description" name="description" placeholder="Enter Task Description" required>{{ Request::old('description') ?: '' }}</textarea>
                            @if ($errors->has('description'))
                              <span class="help-block">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row {{ $errors->has('employee_id') ? ' has-error' : '' }}">
                        <label for="employee_id" class="col-sm-3 text-right control-label col-form-label">Task Employee</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="employee_id" name="employee_id[]" multiple="multiple">
                                @if(count($taskEmployees))
                                  @foreach($taskEmployees as $row)
                                    <option value="{{ $row->id }}">{{$row->name}}</option>
                                  @endforeach
                                @endif
                            </select>
                            @if ($errors->has('employee_id'))
                            <span class="help-block">{{ $errors->first('employee_id') }}</span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="form-group m-b-0">
                      <div class="offset-sm-3 col-sm-9">
                          <input type="hidden" name="_token" value="{{ Session::token() }}">
                          <button type="submit" class="btn btn-info waves-effect waves-light m-t-10">Submit Task</button>
                          <a href="{{route('task.index')}}" class="btn btn-inverse waves-effect waves-light m-t-10">Cancel</a>
                      </div>
                  </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
</div>

<!-- Script -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> <!-- jQuery CDN -->
 
     <script type='text/javascript'>
      
     $(document).ready(function(){
        
        $('#product_id').change(function(){
          var prod_id = $(this).val();

          if(prod_id > 0){
            fetchRecords(prod_id);
          }
 
       });
 
     });
 
     function fetchRecords(id){
       $.ajax({
         url: "{{ route('getEmpByProd',"+id+") }}",
         type: 'get',
         dataType: 'json',
         success: function(response){

          $('#employee_id').find('option').remove();

          $.each(response, function(i, value) {
              $('#employee_id').append($('<option>').text(value[0].name).attr('value', value[0].id));
          });

           console.log(response);
           return;

           var len = 0;
           $('#userTable tbody').empty(); // Empty <tbody>
           if(response['data'] != null){
             len = response['data'].length;
           }
 
           if(len > 0){
             for(var i=0; i<len; i++){
               var id = response['data'][i].id;
               var username = response['data'][i].username;
               var name = response['data'][i].name;
               var email = response['data'][i].email;
 
               var tr_str = "<tr>" +
                   "<td align='center'>" + (i+1) + "</td>" +
                   "<td align='center'>" + username + "</td>" +
                   "<td align='center'>" + name + "</td>" +
                   "<td align='center'>" + email + "</td>" +
               "</tr>";
 
               $("#userTable tbody").append(tr_str);
             }
           }else if(response['data'] != null){
              var tr_str = "<tr>" +
                  "<td align='center'>1</td>" +
                  "<td align='center'>" + response['data'].username + "</td>" + 
                  "<td align='center'>" + response['data'].name + "</td>" +
                  "<td align='center'>" + response['data'].email + "</td>" +
              "</tr>";
 
              $("#userTable tbody").append(tr_str);
           }else{
              var tr_str = "<tr>" +
                  "<td align='center' colspan='4'>No record found.</td>" +
              "</tr>";
 
              $("#userTable tbody").append(tr_str);
           }
 
         }
       });
     }
   </script>

@endsection