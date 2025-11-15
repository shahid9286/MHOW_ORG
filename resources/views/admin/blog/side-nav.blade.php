@php
    use Illuminate\Support\Facades\Route;
@endphp
<div class="bg-light p-2 rounded mb-3" style="overflow-x: auto; white-space: nowrap;">
    <ul class="nav nav-pills flex-row" style="min-width: max-content;">
        <li class="nav-item">
            <a href="{{ route('admin.blog.edit', ['slug' => $slug]) }}"
                class="nav-link {{ Route::currentRouteName() == 'admin.blog.edit' ? 'active' : '' }}">
                Edit Blog
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.blog.section.index', ['slug' => $slug]) }}"
                class="nav-link {{ Route::currentRouteName() == 'admin.blog.section.index' || Route::currentRouteName() == 'admin.blog.section.add' || Route::currentRouteName() == 'admin.blog.section.edit' ? 'active' : '' }}">
                Sections
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.blog.block.index', ['slug' => $slug]) }}"
                class="nav-link {{ Route::currentRouteName() == 'admin.blog.block.index' || Route::currentRouteName() == 'admin.blog.block.add' || Route::currentRouteName() == 'admin.blog.block.edit' ? 'active' : '' }}">
                Block
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.blog.cta.index', ['slug' => $slug]) }}"
                class="nav-link {{ Route::currentRouteName() == 'admin.blog.cta.index' || Route::currentRouteName() == 'admin.blog.cta.add' || Route::currentRouteName() == 'admin.blog.cta.edit' ? 'active' : '' }}">
                Call To Actions
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.blog.setting', ['slug' => $slug]) }}"
                class="nav-link {{ Route::currentRouteName() == 'admin.blog.setting' ? 'active' : '' }}">
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
