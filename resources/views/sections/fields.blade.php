<div class="form-group col-sm-6">
    {!! Form::label('titre', 'titre :') !!}
    {!! Form::text('titre', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>
