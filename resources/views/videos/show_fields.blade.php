<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $video->name }}</p>
</div>

<!-- Dure Field -->
<div class="col-sm-12">
    {!! Form::label('dure', 'Dure:') !!}
    <p>{{ $video->dure }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $video->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $video->updated_at }}</p>
</div>

