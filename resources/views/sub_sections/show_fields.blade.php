<!-- Titre Field -->
<div class="col-sm-12">
    {!! Form::label('titre', 'Titre:') !!}
    <p>{{ $subSection->titre }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $subSection->description }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $subSection->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $subSection->updated_at }}</p>
</div>

