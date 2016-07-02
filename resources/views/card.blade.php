<!-- small box -->
<div class="small-box {{$card->color}}">
	<div class="inner">
		<h3>{{$card->data}} <sup style="font-size: 20px">{{$card->dataPost}}</sup></h3>
		<p>{{$card->title}}</p>
	</div>
	<div class="icon">
		<i class="{{$card->icon}}"></i>
	</div>
	<a href="{{$card->url}}" class="small-box-footer">
		Go <i class="fa fa-arrow-circle-right"></i>
	</a>
	
	@foreach($card->links AS $link)
		<a href="{{$link->url}}" class="small-box-footer bg-aqua">{{$link->title}}</a>
	@endforeach
	
</div>