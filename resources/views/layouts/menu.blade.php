<li class="nav-item">
    <a href="{{ route('courses.index') }}"
       class="nav-link {{ Request::is('courses*') ? 'active' : '' }}">
        <p>Courses</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('quizzes.index') }}"
       class="nav-link {{ Request::is('quizzes*') ? 'active' : '' }}">
        <p>Quizzes</p>
    </a>
</li>


