<!-- tag list -->

@foreach ($tags as $tag)
    <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center pr-0">
        <label class="mt-auto mb-auto">
            <!-- todo: show tag title -->
            {{ $tag->title }}
        </label>
        <div>
            <!-- edit -->
            <a class="btn btn-sm btn-info" href="{{ route('tags.edit', ['tag' => $tag]) }}" role="button">
                <i class="fas fa-edit"></i>
            </a>
            <!-- delete -->
            <form class="d-inline" action="{{ route('tags.destroy', ['tag' => $tag]) }}" role="alert"
                alert-text="{{ trans('tags.alert.delete.message.confirm', ['title' => $tag->title]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">
                    <i class="fas fa-trash"></i>
                </button>
            </form>
        </div>
    </li>
@endforeach

<!-- end  tag list -->
