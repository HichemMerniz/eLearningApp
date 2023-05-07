<div class="table-responsive">
    <table class="table" id="exames-table">
        <thead>
        <tr>
            <th>Question</th>
        <th>Repanse</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($exames as $exames)
            <tr>
                <td>{{ $exames->question }}</td>
            <td>{{ $exames->repanse }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['exames.destroy', $exames->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('exames.show', [$exames->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('exames.edit', [$exames->id]) }}"
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
