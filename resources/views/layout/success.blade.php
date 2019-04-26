@if(Session::has('create'))
    <div id="myAlert" class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong>成功！</strong>{{Session::get('create')}}
    </div>
@endif