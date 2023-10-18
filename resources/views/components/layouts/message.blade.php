@if (session('message.title'))
    
    <div class="alert 
        @if (session('message.class') )
            alert-{{ session('message.class') }}
        @else
            alert-success
        @endif
     alert-dismissible fade show" role="alert">
        
        <strong>{{ session('message.title') }}</strong> 
        @if (session('message.detail'))
            {{ session('message.detail') }}
        @endif

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

@endif
