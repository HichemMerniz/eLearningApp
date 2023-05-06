<div class="table-responsive">
    <table class="table" id="quizzes-table">
        <thead>
        <tr>
            <th>Question</th>
        <th>Repance</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($quizzes as $quiz)
            <tr>
                <td>{{ $quiz->question }}</td>
            <td>{{ $quiz->repance }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['quizzes.destroy', $quiz->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('quizzes.show', [$quiz->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('quizzes.edit', [$quiz->id]) }}"
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
