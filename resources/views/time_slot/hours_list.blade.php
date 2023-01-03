<html>
<head>
    <title>Time Slots</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
   
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    
</head>
<body>
	<style type="text/css">
		/*body {
		  font-family: 'Helvetica';
		  background-color: #0e2439;
		}*/

		.filter-buttons {
		  display: flex;
		  margin-bottom: 20px;
		}

		/*.list-view-button,
		.grid-view-button {
		  color: white;
		  border: 1px solid white;
		  padding: 5px;
		  font-size: 14px;
		  cursor: pointer;
		  border-radius: 3px;
		}

		.list-view-button:hover,
		.grid-view-button:hover {
		  background: white;
		  color: #0e2439;
		}

		.list-view-button {
		  margin-right: 10px;
		}*/

		.list {
		  list-style: none;
		  margin: 0;
		  padding: 0;
		  display: flex;
		}
		.add-red{
			background-color: #b12331;
		}
		.btn-clear{
			background-color: #1f364d;
		}

		li {
		  background-color: #1f364d;
		  color: white;
		  border-radius: 3px;
		  margin-bottom: 10px;
		  transition: 0.3s;
		  
		}


		.list.list-view-filter {
			flex-direction: column;
			width: 20%

		}

		.list.list-view-filter li {
		  padding: 10px;
		}
	</style>
	<div class="filter-buttons">
	  <div class="list-view-button"><h1>Hours List</h1></div>

	</div>
	<form method="POST" action="{{ route('logout') }}">
        @csrf
        <a class="btn btn-success" href="{{route('logout')}}" onclick="event.preventDefault();
                            this.closest('form').submit();"> Log Out</a>
       
    </form>

	<ol class="list list-view-filter">
		@foreach($getSLots as $key => $value)
	  		<a href="{{route('time_slots.show',$value->id)}}"><li @if(isset($value->allocated_slot) && !empty($value->allocated_slot)) class="add-red" @endif>{{$value->hour_slots}}</li></a>
	  	@endforeach
	 
	</ol>
	<a class="btn btn-clear" href="{{route('time_slots.deleteAllSlot')}}">Clear</a>
</body>
</html