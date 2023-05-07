<div class="table-responsive">
    <table class="table" id="coursePubliers-table">
        <thead>
        <tr>
            <th>Nomcourse</th>
        <th>Description</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($coursePubliers as $coursePublier)
            <tr>
                <td>{{ $coursePublier->nomCourse }}</td>
            <td>{{ $coursePublier->description }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['coursePubliers.destroy', $coursePublier->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('coursePubliers.show', [$coursePublier->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('coursePubliers.edit', [$coursePublier->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
