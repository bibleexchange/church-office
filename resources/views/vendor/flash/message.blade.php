@if (Session::has('flash_notification.message'))
    @if (Session::has('flash_notification.overlay'))
        @include('flash::modal', ['modalClass' => 'flash-modal', 'title' => Session::get('flash_notification.title'), 'body' => Session::get('flash_notification.message')])
    @else
        <div class="alert alert-{{ Session::get('flash_notification.level') }}">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

            {{ Session::get('flash_notification.message') }}
        </div>
    @endif
@endif

@if (count($errors) > 0)
    <div class="alert alert-danger" style='position:fixed; bottom:50px; left:50px; z-index:10; width:60%;'>
		 <a href="#" class="close" data-dismiss="alert">&times;</a>
        <ul>ERROR: Your changes were not saved!
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif