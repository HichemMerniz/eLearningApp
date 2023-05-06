<!-- Question Field -->
<div class="col-sm-12">
    {!! Form::label('question', 'Question:') !!}
    <p>{{ $quiz->question }}</p>
</div>

<!-- Repance Field -->
<div class="col-sm-12">
    {!! Form::label('repance', 'Repance:') !!}
    <p>{{ $quiz->repance }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $quiz->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $quiz->updated_at }}</p>
</div>

