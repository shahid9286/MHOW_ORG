@php
    use Illuminate\Support\Facades\Route;
@endphp
<div class="bg-light p-2 rounded mb-3" style="overflow-x: auto; white-space: nowrap;">
    <ul class="nav nav-pills flex-row" style="min-width: max-content;">
        <li class="nav-item">
            <a href="{{ route('admin.course.edit', ['slug' => $slug]) }}"
                class="nav-link {{ Route::currentRouteName() == 'admin.course.edit' ? 'active' : '' }}">
                Edit Course
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.course.section.index', ['slug' => $slug]) }}"
                class="nav-link {{ Route::currentRouteName() == 'admin.course.section.index' || Route::currentRouteName() == 'admin.course.section.add' || Route::currentRouteName() == 'admin.course.section.edit' ? 'active' : '' }}">
                Sections
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.course.block.index', ['slug' => $slug]) }}"
                class="nav-link {{ Route::currentRouteName() == 'admin.course.block.index' || Route::currentRouteName() == 'admin.course.block.add' || Route::currentRouteName() == 'admin.course.block.edit' ? 'active' : '' }}">
                Blocks
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.course.element.index', ['slug' => $slug]) }}"
                class="nav-link {{ Route::currentRouteName() == 'admin.course.element.index' || Route::currentRouteName() == 'admin.course.element.add' || Route::currentRouteName() == 'admin.course.element.edit' ? 'active' : '' }}">
                Elements
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.course.why-choose-us.index', ['slug' => $slug]) }}"
                class="nav-link {{ Route::currentRouteName() == 'admin.course.why-choose-us.index' || Route::currentRouteName() == 'admin.course.why-choose-us.add' || Route::currentRouteName() == 'admin.course.why-choose-us.edit' ? 'active' : '' }}">
                Why Choose Us'
            </a>
        </li>
        {{-- <li class="nav-item">
            <a href="{{ route('admin.course.we-serve.index', ['slug' => $slug]) }}"
                class="nav-link {{ Route::currentRouteName() == 'admin.course.we-serve.index' || Route::currentRouteName() == 'admin.course.we-serve.add' || Route::currentRouteName() == 'admin.course.we-serve.edit' ? 'active' : '' }}">
                We Serve
            </a>
        </li> --}}

        <li class="nav-item">
            <a href="{{ route('admin.course.cta.index', ['slug' => $slug]) }}"
                class="nav-link {{ Route::currentRouteName() == 'admin.course.cta.index' || Route::currentRouteName() == 'admin.course.cta.add' || Route::currentRouteName() == 'admin.course.cta.edit' ? 'active' : '' }}">
                Call To Actions
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.course.feature.index', ['slug' => $slug]) }}"
                class="nav-link {{ Route::currentRouteName() == 'admin.course.feature.index' || Route::currentRouteName() == 'admin.course.feature.add' || Route::currentRouteName() == 'admin.course.feature.edit' ? 'active' : '' }}">
                Features
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.course.outline.index', ['slug' => $slug]) }}"
                class="nav-link {{ Route::currentRouteName() == 'admin.course.outline.index' || Route::currentRouteName() == 'admin.course.outline.add' || Route::currentRouteName() == 'admin.course.outline.edit' ? 'active' : '' }}">
                Outlines
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.course.setting', ['slug' => $slug]) }}"
                class="nav-link {{ Route::currentRouteName() == 'admin.course.setting' ? 'active' : '' }}">
                Settings
            </a>
        </li>
    </ul>
</div>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const activeLink = document.querySelector('.nav-link.active');
        if (activeLink) {
            activeLink.scrollIntoView({
                behavior: 'smooth',
                inline: 'start'
            });
        }
    });
</script>
