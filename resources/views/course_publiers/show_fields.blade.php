<!-- Nomcourse Field -->
<div class="col-sm-12">
    {!! Form::label('nomCourse', 'Nomcourse:') !!}
    <p>{{ $coursePublier->nomCourse }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $coursePublier->description }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $coursePublier->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $coursePublier->updated_at }}</p>
</div>

