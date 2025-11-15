@php
    use Illuminate\Support\Facades\Route;
@endphp
<div class="bg-light p-2 rounded mb-3" style="overflow-x: auto; white-space: nowrap;">
    <ul class="nav nav-pills flex-row" style="min-width: max-content;">
        <li class="nav-item">
            <a href="{{ route('admin.course.edit', ['slug' => $slug]) }}"
                class="nav-link {{ Route::currentRouteName() == 'admin.course.edit' ? 'active' : '' }}">
                Edit Blog
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
                Block
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.course.element.index', ['slug' => $slug]) }}"
                class="nav-link {{ Route::currentRouteName() == 'admin.course.element.index' || Route::currentRouteName() == 'admin.course.element.add' || Route::currentRouteName() == 'admin.course.element.edit' ? 'active' : '' }}">
                Element
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.course.why-choose-us.index', ['slug' => $slug]) }}"
                class="nav-link {{ Route::currentRouteName() == 'admin.course.why-choose-us.index' || Route::currentRouteName() == 'admin.course.why-choose-us.add' || Route::currentRouteName() == 'admin.course.why-choose-us.edit' ? 'active' : '' }}">
                Why Choose Us'
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.course.cta.index', ['slug' => $slug]) }}"
                class="nav-link {{ Route::currentRouteName() == 'admin.course.cta.index' || Route::currentRouteName() == 'admin.course.cta.add' || Route::currentRouteName() == 'admin.course.cta.edit' ? 'active' : '' }}">
                Call To Actions
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.course.setting', ['slug' => $slug]) }}"
                class="nav-link {{ Route::currentRouteName() == 'admin.course.setting' ? 'active' : '' }}">
                Setting
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
