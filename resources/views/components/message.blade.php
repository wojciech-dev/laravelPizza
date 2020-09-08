@if (session('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        {{ session('message') }}
    </div>
@endif

@if($errors->count())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
        @foreach($errors->all() as $error)
        {{ $error }}
        @endforeach
    </div>
@endif
@if(session('verified'))
<div class="alert alert-primary alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    Your email has been verified!
</div>
@endif
@if(session('resent'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    Verification link has been sent to you!
</div>
@endif
