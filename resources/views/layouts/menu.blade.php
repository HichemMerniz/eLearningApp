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


<li class="nav-item">
    <a href="{{ route('videos.index') }}"
       class="nav-link {{ Request::is('videos*') ? 'active' : '' }}">
        <p>Videos</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('sections.index') }}"
       class="nav-link {{ Request::is('sections*') ? 'active' : '' }}">
        <p>Sections</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('subSections.index') }}"
       class="nav-link {{ Request::is('subSections*') ? 'active' : '' }}">
        <p>Sub Sections</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('exames.index') }}"
       class="nav-link {{ Request::is('exames*') ? 'active' : '' }}">
        <p>Exames</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('uploads.index') }}"
       class="nav-link {{ Request::is('uploads*') ? 'active' : '' }}">
        <p>Uploads</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('courseLives.index') }}"
       class="nav-link {{ Request::is('courseLives*') ? 'active' : '' }}">
        <p>Course Lives</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('coursePubliers.index') }}"
       class="nav-link {{ Request::is('coursePubliers*') ? 'active' : '' }}">
        <p>Course Publiers</p>
    </a>
</li>


