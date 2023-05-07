<div class="table-responsive">
    <table class="table" id="uploads-table">
        <thead>
        <tr>
            <th>Vedioname</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($uploads as $uploads)
            <tr>
                <td>{{ $uploads->vedioName }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['uploads.destroy', $uploads->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('uploads.show', [$uploads->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('uploads.edit', [$uploads->id]) }}"
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
