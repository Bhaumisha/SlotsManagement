<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>User Form</h2>
  <form action="@if(isset($allocatedSoltes)){{route('time_slots.update',$allocatedSoltes->id)}} @else{{route('time_slots.store')}}@endif" method="post" id = "userForm">
    @csrf
    @if(isset($allocatedSoltes)){{ method_field('PATCH') }}@endif
    <input type="hidden" name="slot_id" value="{{$id}}">
    <div class="form-group">
      <label for="name">First Name</label>
      <input type="text" class="form-control" id="name" placeholder="Enter first name" name="first_name" value="{{isset($allocatedSoltes) ? $allocatedSoltes->first_name : ''}}">
    </div>
    <div class="form-group">
      <label for="name">Last Name</label>
      <input type="text" class="form-control" id="name" placeholder="Enter last name" name="last_name" value="{{isset($allocatedSoltes) ? $allocatedSoltes->last_name : ''}}">
    </div>
    <div class="form-group">
      <label for="phone_no">Phone no:</label>
      <input type="text" class="form-control" id="phone_no" placeholder="Enter phone number" name="phone_no" value="{{isset($allocatedSoltes) ? $allocatedSoltes->phone_no : ''}}">
    </div>
    
    <button type="submit" class="btn btn-default">Submit</button>
    <a class="btn btn-default" href="{{route('time_slots.index')}}">clear</a>
  </form>
</div>

</body>
</html>