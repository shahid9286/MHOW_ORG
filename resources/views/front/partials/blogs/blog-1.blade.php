<section class="th-blog-wrapper space-top space-extra-bottom">
    <div class="container">
        <div class="row">
            <div class="col-xxl-8 col-lg-7">
                @foreach ($blogs as $blog)
                    <div class="th-blog blog-single has-post-thumbnail">
                        <div class="blog-img"><a href="blog-details.html"><img
                                    src="{{ asset('assets/front/img/blog/' . $blog->image) }}" alt="Blog Image"></a></div>
                        <div class="blog-content">
                            <div class="blog-meta"><a href="blog.html"><i
                                        class="fa-solid fa-calendar-days"></i>{{ $blog->created_at->format('d M, Y') }}</a>
                                <a href="blog-details.html"><img src="{{ asset('front/img/icon/map.svg') }}"
                                        alt="">{{ $blog->bcategory->name }}</a>
                            </div>
                            <h2 class="blog-title"><a href="blog-details.html">{{ $blog->title }}</a></h2>
                            <p class="blog-text">{{ \Illuminate\Support\Str::limit(strip_tags($blog->content), 150) }}
                            </p><a href="blog-details.html" class="th-btn style4 th-icon">Read
                                More</a>
                        </div>
                    </div>
                @endforeach
                <div class="th-pagination">
                    {{-- <ul>
                        <li><a class="active" href="blog.html">1</a></li>
                        <li><a href="blog.html">2</a></li>
                        <li><a href="blog.html">3</a></li>
                        <li><a href="blog.html">4</a></li>
                        <li><a class="next-page" href="blog.html">Next <img src="assets/img/icon/arrow-right4.svg"
                                    alt=""></a></li>
                    </ul> --}}
                    <div class="th-pagination">
                        {{ $blogs->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
            <div class="col-xxl-4 col-lg-5">
                <aside class="sidebar-area">
                    <div class="widget widget_search">
                        <form class="search-form"><input type="text" placeholder="Search"> <button type="submit"><i
                                    class="far fa-search"></i></button></form>
                    </div>
                    <div class="widget widget_categories">
                        <h3 class="widget_title">Categories</h3>
                        <ul>
                            @foreach ($blog_categories as $blog_category)
                                <li><a href="blog.html"><img src="{{ asset('front/img/icon/map.svg') }}"
                                            alt="">{{ $blog_category->name }}</a>
                                    <span>({{ $blog_category->blogs->count() }})</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="widget">
                        <h3 class="widget_title">Recent Blogs</h3>
                        <div class="recent-post-wrap">
                            @foreach ($recent_blogs as $recent_blog)
                                <div class="recent-post">
                                    <div class="media-img"><a href="blog-details.html"><img
                                                src="{{ asset('assets/front/img/blog/' . $recent_blog->image) }}"
                                                alt="Blog Image"></a></div>
                                    <div class="media-body">
                                        <h4 class="post-title"><a class="text-inherit"
                                                href="blog-details.html">{{ $recent_blog->title }}</a></h4>
                                        <div class="recent-post-meta"><a href="blog.html"><i
                                                    class="fa-regular fa-calendar"></i>{{ $recent_blog->created_at->format('d/m/ Y') }}</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="widget widget_tag_cloud">
                        <h3 class="widget_title">Popular Tags</h3>
                        <div class="tagcloud"><a href="blog.html">Tour</a> <a href="blog.html">Adventure</a> <a
                                href="blog.html">Rent</a> <a href="blog.html">Innovate</a> <a href="blog.html">Hotel</a>
                            <a href="blog.html">Modern</a> <a href="blog.html">Luxury</a> <a href="blog.html">Travel</a>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>
