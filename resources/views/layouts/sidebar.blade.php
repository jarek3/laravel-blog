    <div class="col-md-4">
            <aside class="right-sidebar">
                <div class="search-widget">
                    <form action="{{route('blog')}}">
                       <div class="input-group">
                        <input type="text" class="form-control input-lg" value="{{request('term')}}" name="term" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-lg btn-default" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                          </span>
                        </div>
                    </form><!-- /input-group -->

                </div>

                <div class="widget">
                    <div class="widget-heading">
                        <h4>Categories</h4>
                    </div>
                    <div class="widget-body">
                        <ul class="categories">
                            @foreach($categories as $category)
                            <li>
                                <a href="{{route('category', $category->slug)}}"><i class="fa fa-angle-right"></i> {{$category->title}}</a>
                                <span class="badge pull-right">{{$category->posts->count()}}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tags</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            {!! Form::text('post_tags', null,
                            ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>


                <div class="widget">
                    <div class="widget-heading">
                        <h4>Popular Posts</h4>
                    </div>
                    <div class="widget-body">
                        <ul class="popular-posts">

                      @foreach($popularPosts as $post)
                            <li>
                                @if($post->image_thumb_url)
                                <div class="post-image">
                                    <a href="{{route('blog.show', ($post->slug))}}">
                                        <img src="{{$post->image_thumb_url}}" />
                                    </a>
                                </div>
                                @endif
                                <div class="post-body">
                                    <h6><a href="{{route('blog.show', ($post->slug))}}">{{$post->title}}</a></h6>
<div class="post-meta">
                                        <span>{{$post->date}}</span>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                        </ul>
                    </div>
                </div>

                <div class="widget">
                    <div class="widget-heading">
                        <h4>Tags</h4>
                    </div>
                    <div class="widget-body">
                        <ul class="tags">

                        @foreach($tags as $tag)
                           <li><a href="{{route('tag', $tag->slug)}}">{{$tag->name}}</a></li>
                        @endforeach

                        </ul>
                    </div>
                </div>

                <div class="widget">
                    <div class="widget-heading">
                        <h4>Archives</h4>
                    </div>
                    <div class="widget-body">
                        <ul class="categories">
                            @foreach($archives as $archive)
                            <li><a href="{{route('blog', ['month' => $archive->month, 'year' => $archive->year])}}">{{month_name($archive->month) . " " . $archive->year}}</a>
                                <span class="badge pull-right">{{$archive->post_count}}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

            </aside>
        </div>
