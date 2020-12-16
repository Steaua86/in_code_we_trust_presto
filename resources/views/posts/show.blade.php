<x-layout>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1 class="my-5">{{$post->title}}</h1>
        <p class="card-text">{{$post->price}} €</p>
        <img src="{{Storage::url($post->image)}}" class="card-img-top" alt="{{$post->title}}">
        <p class="card-text">{{$post->description}}</p>
        <p class="card-text">{{ __('ui.Data') }}: {{$post->created_at}}</p>                        
        <p class="card-text">{{ __('ui.Categoria') }}: {{$post->category->name}}</p> 
        <p>{{ __('ui.Autore') }}: {{$post->user->name}}</p>

        <div class="slider">
          @foreach ($post->images as $image)
          <div><img src="{{$image->getUrl(450, 300)}}"></div>
          @endforeach
        </div>      
           
        @if (Auth::id() == $post->user->id)
            
            <a href="{{route('posts.edit', compact('post'))}}" class="btn bg-btn rounded-pill text-white">{{ __('ui.Modifica') }}</a>
            
            <form action="{{route('posts.destroy', compact('post'))}}" method="POST">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger rounded-pill text-white mt-2">{{ __('ui.Cancella') }}</button>
            </form>
            
            @endif

      </div>
    </div>
  </div>
  <x-slot name="scripts">
    <script>
      $('.slider').slick({
        dots: true,
        infinite: false,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 4,
        responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
        ]
      });
    </script>
  </x-slot>
</x-layout>