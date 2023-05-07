<div class="table-responsive">
    <table class="table" id="courseLives-table">
        <thead>
        <tr>
            <th>Name</th>
        <th>Description</th>
        <th>Duree</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($courseLives as $courseLive)
            <tr>
                <td>{{ $courseLive->name }}</td>
            <td>{{ $courseLive->description }}</td>
            <td>{{ $courseLive->duree }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['courseLives.destroy', $courseLive->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('courseLives.show', [$courseLive->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('courseLives.edit', [$courseLive->id]) }}"
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
