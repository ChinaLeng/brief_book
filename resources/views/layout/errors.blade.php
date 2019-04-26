@if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $value)
            <li>{{ $value }}</li>
        @endforeach
    </div>
@endif