<div class="breadcrumb-area with-banner bg-cover text-center bg-dark text-light"
        style="background-image: url({{ asset('front/assets/img/banner/7.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h1>{{ $blog->title }}</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li><a href="{{ route('front.index') }}"><i class="fas fa-home"></i> Home</a></li>
                            <li><a href="{{ route('front.blogs') }}">Blogs</a></li>
                            <li class="active">{{ $blog->title }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>