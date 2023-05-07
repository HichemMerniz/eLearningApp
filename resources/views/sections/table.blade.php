<div class="table-responsive">
    <table class="table" id="sections-table">
        <thead>
        <tr>
            <th>Titre</th>
        <th>Description</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($sections as $section)
            <tr>
                <td>{{ $section->titre }}</td>
            <td>{{ $section->description }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['sections.destroy', $section->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('sections.show', [$section->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('sections.edit', [$section->id]) }}"
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
