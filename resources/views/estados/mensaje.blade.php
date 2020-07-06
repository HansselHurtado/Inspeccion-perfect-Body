@if(session('message'))
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		{{session('message')}}
	</div>
@endif

@if(session('message2'))
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		{{session('message2')}}
	</div>
@endif

@if(session('message3'))
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		{{session('message3')}}
	</div>
@endif

@if(session('message4'))
	<div class="alert alert-danger alert-dismissible fade show" role="alert">
		<strong>Datos Inavlidos :( </strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		{{session('message4')}}
	</div>
@endif

@if(session('message5'))
	<div class="alert alert-primary alert-dismissible fade show" role="alert">
		<strong>Hasta Pronto! </strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		{{session('message5')}}
	</div>
@endif

@if(session('message6'))
	<div class="alert alert-danger alert-dismissible fade show" role="alert">
		<strong>ERROR!!</strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		{{session('message6')}}
	</div>
@endif
