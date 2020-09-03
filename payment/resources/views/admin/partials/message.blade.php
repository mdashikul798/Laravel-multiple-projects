@if(Session('success'))
	<div class="alert alert-success alert-success-style1 alert-success-stylenone">
	    <button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
				<span class="icon-sc-cl" aria-hidden="true">×</span>
			</button>
	    <p class="message-alert-none"><strong>Success!</strong> {{ Session('success') }}</p>
	</div>
@endif

@if (Session('error'))
	<div class="alert alert-danger alert-mg-b alert-success-style4 alert-success-stylenone">
	    <button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
				<span class="icon-sc-cl" aria-hidden="true">×</span>
			</button>
	    <p class="message-alert-none ml-2"><strong>Danger!</strong> {{ Session('error') }}</p>
	</div>
@endif

@if ($errors->any())
	<div class="alert alert-danger alert-mg-b alert-success-style4 alert-success-stylenone">
		@foreach ($errors->all() as $error)
		    <button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
					<span class="icon-sc-cl" aria-hidden="true">×</span>
				</button>
		    <p class="message-alert-none ml-2"><strong>Danger!</strong> {{ $error }}</p>
	    @endforeach
	</div>
@endif
