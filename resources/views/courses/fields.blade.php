<div class="form-group col-sm-6">
    {!! Form::label('name', 'name :') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>
{{--<!-- Description Field -->--}}
{{--<div class="form-group col-sm-12 col-lg-12">--}}
{{--    {!! Form::label('description__en', __('company.description').' En:') !!}--}}
{{--    {!! Form::textarea('description__en', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}
{{--<!-- Description Field -->--}}
{{--<div class="form-group col-sm-12 col-lg-12">--}}
{{--    {!! Form::label('description__ar', __('company.description').' Ar:') !!}--}}
{{--    {!! Form::textarea('description__ar', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}


<!-- Submit Field -->
{{--<div class="form-group col-sm-12">--}}
{{--    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}--}}
{{--    <a href="{{ route('courses.show',1) }}" class="btn btn-secondary">Cancel</a>--}}
{{--</div>--}}
