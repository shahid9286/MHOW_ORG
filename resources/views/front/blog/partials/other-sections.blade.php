@foreach ($blog->settings as $setting)
    @php
        $type = class_basename($setting->reference_type);
    @endphp

    @switch($type)
        @case('BlogBlock')
            @include('front.blog.partials.block', ['block' => $setting->reference])
        @break

        @case('BlogCTA')
            @include('front.blog.partials.cta', ['cta' => $setting->reference])
        @break

        @case('BlogSection')
            @include('front.blog.partials.section', ['section' => $setting->reference])
        @break
    @endswitch
@endforeach
