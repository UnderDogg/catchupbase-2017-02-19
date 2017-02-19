<form class="navbar-form navbar-right" role="search" autocomplete="off">
    <div class="input-group">
        {!! Form::input('search', 'query', Input::get('query', ''), $attributes = ['class' => 'form-control', 'placeholder' => 'Search for...']) !!}
        <span class="input-group-btn">
            {!! Form::submit('Search', $attributes = ['class' => 'btn btn-default']) !!}
        </span>
    </div><!-- /input-group -->
</form>
