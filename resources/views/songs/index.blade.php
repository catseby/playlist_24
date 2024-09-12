<x-app-layout>
    <style>
        .grid-container{
            display: grid;
            grid-template-columns: repeat(6, 1fr);
        }

        .grid-item{
            background-color: gray;
            text-align: center;
            display: block;
            margin-left: 0px;
            margin-right: 0px;
            margin-top: 16px;
            margin-bottom: 16px;
        }

        .song-image {
            width: 256px;
            height: 256px;
            display: block;
            margin-left: 32px;
        }



    </style>    

    <div class="">
        <a href="{{ route('songs.create') }}" class="button">
            <div class=""></div>
            <span>Create Song</span>
        </a>
    </div>
    <div class="grid-container">
        @foreach ($songs as $song)
        <div class="grid-item">
                <img src="/images/test_img.png" alt="test image" class="song-image">  

                <h1 class="song-title">
                    {{ $song->title }}
                </h1>

                <p class="">
                    {{ $song->artist }}
                </p>


        </div>
        @endforeach
    </div>
</x-app-layout>
