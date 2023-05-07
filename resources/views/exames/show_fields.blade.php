<!-- Question Field -->
<div class="col-sm-12">
    {!! Form::label('question', 'Question:') !!}
    <p>{{ $exames->question }}</p>
</div>

<!-- Repanse Field -->
<div class="col-sm-12">
    {!! Form::label('repanse', 'Repanse:') !!}
    <p>{{ $exames->repanse }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $exames->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $exames->updated_at }}</p>
</div>

