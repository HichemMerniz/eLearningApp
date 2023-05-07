<!-- Vedioname Field -->
<div class="col-sm-12">
    {!! Form::label('vedioName', 'Vedioname:') !!}
    <p>{{ $uploads->vedioName }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $uploads->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $uploads->updated_at }}</p>
</div>

