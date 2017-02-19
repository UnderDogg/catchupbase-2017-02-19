<div class="container content-page">
    <div class="row">
        <main class="col-md-8">
            <h1>{{ $page->title or '' }}</h1>

            {!! $page->content->body or '' !!}

            <p class="author">
                Author: {{ $page->content->author or '' }}
            </p>

        </main>
    </div>
</div>
