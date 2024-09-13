<x-app-layout>
    <style>
        .grid-container{
            display: grid;
            grid-template-columns: repeat(6, 1fr);
        }

        .grid-item{
            transition: 0.3s;
	        background-color: rgb(243 244 246);

            border-radius: 8px;
            display: block;
            margin-left: 8px;
            margin-right: 8px;
            margin-top: 8px;
            margin-bottom: 8px;
            padding-top: 20px;
            padding-bottom: 16px;
        }

        .grid-item:hover{
            background-color: #DFDFDF;
        }


        .song-image {
            width: 256px;
            height: 256px;
            display: block;
            margin-left: 21.5px;
            margin-top: 0px
        }

        .song-title, .song-artist {
            margin-left: 21.5px;
        }

        .song-title{
            font-size: 20px
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
        <a href="{{ route('songs.show', $song->id) }}">
        <div class="grid-item">
                <img src="/images/test_img.png" alt="test image" class="song-image">  

                <h1 class="song-title"><b>{{ $song->title }}</b></h1>

                <p class="song-artist">{{ $song->artist }}</p>
        </div>
        </a>
        @endforeach
    </div>
</x-app-layout>
