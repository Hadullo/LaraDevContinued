
@extends('layouts.main')


@section('content')


	<!-- Begin Featured
	================================================== -->

		<h2><span>Home Page</span></h2>
	</div>
	<div class="card-columns listfeaturedtag">

        @foreach ($posts as $post )


		<!-- begin post -->
		<div class="card">
			<div class="row">
				<div class="col-md-5 wrapthumbnail">
					<a href="post.html">
						<div class = "post-image-specs"><a href = ""><img src =  " {{ asset($post->imagePath) }}" class="thumbnail" style="background-image" alt="img"></a>
						</div>
					</a>
				</div>
				<div class="col-md-7">
					<div class="card-block">

						<h4 class="card-text"><h2 class="card-title"><a href="post.html">{{ $post->title }}</a></h2>
                            <h4 class="card-text">{{ substr(strip_tags($post->body), 0, 150) }}
                                {{ strlen(strip_tags($post->body)) > 50 ? "......" : "" }}</h4>

                                <span class="post-read-more"><a href="#" title="Read Story">Read More >> </a></span></h4>
						<div class="metafooter">
							<div class="wrapfooter">

								<span class="author-meta">
                                    <span class="post-name"><a href="author.html"><b>Posted:&nbsp;</b>{{$post->created_at->diffForHumans()}}&nbsp;<b>By:</b>{{ $post->user->name ?? 'None' }}</a></span><br/>
															</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end post -->

        @endforeach







	</div>

	<!-- End Featured
	================================================== -->

@endsection



