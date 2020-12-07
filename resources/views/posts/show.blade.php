<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>{{$post->title}}</h1>
                <p class="card-text">{{$post->price}} €</p>
                <img src="{{Storage::url($post->image)}}" class="card-img-top" alt="{{$post->title}}">
                <p class="card-text">{{$post->description}}</p>
                <p class="card-text">{{$post->created_at}}</p>                        
                <p class="card-text">{{$post->category->name}}</p> 
                <div class="slider">
                    <div> <img src="https://picsum.photos/202/300" alt=""></div>
                    <div> <img src="https://picsum.photos/203/300" alt=""></div>
                    <div> <img src="https://picsum.photos/204/300" alt=""></div>
                    <div> <img src="https://picsum.photos/204/300" alt=""></div>
                    <div> <img src="https://picsum.photos/205/300" alt=""></div>
                    <div> <img src="https://picsum.photos/201/300" alt=""></div>
                  </div>                       
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