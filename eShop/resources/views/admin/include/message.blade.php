<!-- Displaying the success message -->
@if(Session('message'))
    <div class="alert alert-success alert-success-style1 alert-success-stylenone">
        <button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
                <span class="icon-sc-cl" aria-hidden="true">×</span>
            </button>
        <i class="fa fa-check adminpro-checked-pro admin-check-sucess admin-check-pro-none" aria-hidden="true"></i>
        <p class="message-alert-none"><strong>Success!</strong> {{Session('message')}}</p>
    </div>
@endif

<!-- Displaying the error message -->
@if($errors->any())
    @foreach($errors->all() as $error)
        <div class="alert alert-danger alert-mg-b alert-success-style4">
            <button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
    				<span class="icon-sc-cl" aria-hidden="true">×</span>
    			</button>
            <i class="fa fa-times adminpro-danger-error admin-check-pro" aria-hidden="true"></i>
            <p><strong>Danger!</strong> {{ $error }}</p>
        </div>
    @endforeach
@endif