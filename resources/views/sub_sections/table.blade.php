<div class="table-responsive">
    <table class="table" id="subSections-table">
        <thead>
        <tr>
            <th>Titre</th>
        <th>Description</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($subSections as $subSection)
            <tr>
                <td>{{ $subSection->titre }}</td>
            <td>{{ $subSection->description }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['subSections.destroy', $subSection->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('subSections.show', [$subSection->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('subSections.edit', [$subSection->id]) }}"
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
