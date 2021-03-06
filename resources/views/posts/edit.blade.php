<x-layout>
    @if (session('message'))
    <div class="toast" data-autohide="false">
        <div class="toast-body d-flex align-items-center">
            <i class="far fa-check-circle"></i> &nbsp; {{ session('message') }}
        </div>
    </div>   
    @endif
    <div class="container my-5">
        <div class="row">
            <div class="col-12"><h1 class="text-center mt-4">Modifica il tuo annuncio</h1></div>
            
        </div>

        <div class="row">
            <div class="col-12">
                <form action="{{route('posts.update', compact('post'))}}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                      <label for="title">{{ __('ui.Titolo_annuncio') }}</label>
                      <input type="text" class="form-control" id="title" name="title" aria-describedby="title" value="{{$post->title}}" placeholder="Titolo del post">
                    </div>
                    <div class="form-group">
                      <label for="description">{{ __('ui.Descrizione_annuncio') }}</label>
                      <textarea class="form-control" id="description" name="description" rows="3" placeholder="Descrizione">{{$post->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="price">{{ __('ui.Prezzo') }}</label>
                        <input type="text" class="form-control" id="price" aria-describedby="price" name="price" value="{{$post->price}}">
                    </div>
                    <div class="form-group">
                        <label for="categories">{{ __('ui.Categoria') }}</label>
                        <select class="form-control" id="categories" name="category_id">
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}" {{$post->category_id == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                            
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="image">{{ __('ui.Immagine') }}</label>
                        <input type="file" class="form-control" id="image" aria-describedby="image" name="image" value="{{Storage::url($post->image)}}">
                       <p> L'immagine di questo post:<br> <img src="{{Storage::url($post->image)}}" class="rounded-circle" width="80"></p> 
                    </div>
                    
                      <button type="submit" class="btn bg-btn rounded-pill text-white">{{ __('ui.Modifica') }}</button>
                </form> 
            </div>
        </div>
    </div>
</x-layout>