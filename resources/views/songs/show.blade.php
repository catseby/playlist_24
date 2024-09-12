<x-app-layout>
    <style>

        .top-div{
            background-color: lightgray;
            height: 320px;
            margin-left: 320px;
            margin-right: 320px;

        }

       .image-div {
        float: left
       }


       .info-div {
            padding-top: 120px;
            padding-left: 336px;
       }

       .info-div h1{
            font-size: 64px;
       }

       .widget-div {
            float: right;
            display: inline;
            writing-mode: vertical-lr;
            text-orientation: upright;
       }

       .widget-div form, .widget-div a {
            padding-bottom: 128px;
        }

       .song-image {
            width: 320px;
            height: 320px;
       }


    </style>
    
        <div class="top-div">

            <div class="image-div">
                <img src="/images/test_img.png" alt="Song Cover" class="song-image">  
            </div>

            <div class="info-div">
                <b>
                <p>{{ $song->genre}}</p>
                <h1>{{ $song->title }}</h1> 
                <p>{{ $song->artist}}</p>
                </b>
            </div> 

            <div class="widget-div">
                <a href="{{ route('songs.edit', $song->id) }}" class="edit-button">
                    Edit
                </a>
                <form action="{{ route('songs.destroy', $song->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete-button">
                        Delete
                    </button>
                </form>
            </div>

        </div>

            <form action="{{ route('songs.add', $song->id) }}" method="POST">
                @csrf
                @method('PUT')


                <label for="playlists">Add to a playlist:</label>
                    <select name="type" id="type">
                        @foreach ($playlists as $playlist)
                            <option value="{{ $playlist->id }}">{{ $playlist->name }}</option>
                        @endforeach
                    </select>
                <br><br>
                <input type="submit" value="Add">
            </form>
            <div>
                @foreach ($song->playlists as $pl)
                    <p>{{$pl->name}}</p>
                @endforeach
            </div>
        </div>
</x-app-layout>
