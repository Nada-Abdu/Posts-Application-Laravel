
@if (count($errors) > 0)

@foreach ($errors->all() as $error)
<div x-data="{show : true}" X-init="setTimeout(()=> show= false , 7000)" x-show="show" class="alert alert-danger">
    {{$error}}
</div>
@endforeach

@endif

@if (session('success'))
<div x-data="{show : true}" X-init="setTimeout(()=> show= false , 7000)" x-show="show" class="alert alert-success">
    {{session('success')}}
</div>
@endif

@if (session('error'))
<div x-data="{show : true}" X-init="setTimeout(()=> show= false , 7000)" x-show="show" class="alert alert-danger">
    {{session('error')}}
</div>
@endif

@if (session('contact'))
<div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" class="alert alert-dark">
    {{session('contact')}}
</div>
@endif
