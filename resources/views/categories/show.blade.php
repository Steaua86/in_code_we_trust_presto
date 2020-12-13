<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5 text-uppercase">
                <h1 class="my-5">{{$category->name}}</h1>
                
            </div>
            
            @foreach ($category->posts()->get() as $post)
                <div class="col-12 col-md-4">
                <div class="card">
                    <div class="card-body shadow">
                        <h5 class="card-title">{{$post->title}}</h5>
                        <p class="card-text">{{$post->price}} €</p>
                        <img src="{{Storage::url($post->image)}}" class="card-img-top img-fluid img-responsive" alt="{{$post->title}}">
                        <p class="card-text trunc">{{$post->description}}</p>
                        <p class="card-text">{{$post->created_at}}</p>                        
                        <p class="card-text">{{$post->category->name}}</p>                        
                        <a href="{{route('posts.show', compact('post'))}}" class="btn bg-btn rounded-pill text-white">Visualizza</a>

                        @if (Auth::id() == $post->user->id)
                        <a href="{{route('posts.edit', compact('post'))}}" class="btn bg-btn rounded-pill text-white">Modifica</a>
                        <form action="{{route('posts.destroy', compact('post'))}}" method="POST">
                            @csrf
                            @method('DELETE')
                              <button class="btn btn-danger rounded-pill text-white">Cancella</button>
                          </form>
                            
                        @endif
                    </div>
                </div>
            </div>
                @endforeach
        </div> 
        <div class="row">
            <div class="col-12 mt-5 mb-3">
                
                <h2>Ecco i post delle altre categorie</h2>
            </div>
            @foreach ($posts as $post)
                    <div class="col-12 col-md-4">
                <div class="card mb-3">
                    <div class="card-body shadow">
                        <h5 class="card-title">{{$post->title}}</h5>
                        <p class="card-text">{{$post->price}} €</p>
                        <img src="{{Storage::url($post->image)}}" class="card-img-top img-fluid img-responsive" alt="{{$post->title}}">
                        <p class="card-text trunc">{{$post->description}}</p>
                        <p class="card-text">{{$post->created_at}}</p>                        
                        <p class="card-text">{{$post->category->name}}</p>                        
                        <a href="{{route('posts.show', compact('post'))}}" class="btn bg-btn rounded-pill text-white">Visualizza</a>

                        @if (Auth::id() == $post->user->id)
                        <a href="{{route('posts.edit', compact('post'))}}" class="btn bg-btn rounded-pill text-white">Modifica</a>
                        <form action="{{route('posts.destroy', compact('post'))}}" method="POST">
                            @csrf
                            @method('DELETE')
                              <button class="btn btn-danger rounded-pill text-white mt-2"> Cancella</button>
                          </form>
                            
                        @endif
                    </div>
                </div>
            </div>
                @endforeach
        </div> 
    </div>
</div>
</x-layout>

<style>
    .img-responsive {
    width: auto;
    height: 300px;
}

.trunc{
     width:250px; 
     white-space: nowrap; 
     overflow: hidden; 
     text-overflow: ellipsis;
}
</style>