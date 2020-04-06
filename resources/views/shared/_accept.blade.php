@can ('accept', $model)
    <a 
        title="Mark this answer as best answer" 
        class="{{ $model->status }} mt-2"
        onclick="event.preventDefault(); document.getElementById('accept-answer-{{ $model->id }}').submit();"    
    >
        <i class="fas fa-check fa-2x"></i>
    </a>
@else
    @if ($model->is_best)
        <a 
            title="Mark this answer as best answer" 
            class="{{ $model->status }} mt-2"
            onclick="event.preventDefault(); document.getElementById('accept-answer-{{ $model->id }}').submit();"    
        >
            <i class="fas fa-check fa-2x"></i>
        </a>
    @endif
@endcan