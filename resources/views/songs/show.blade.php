<x-app-layout>
    <style>

        .top-div{
            background-color: lightgray;
            height: 320px;
            margin-left: 320px;
            margin-right: 320px;
        }

       .image-div {
        float: left;
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
            position: relative;
            bottom: 255px;
            line-height: 2;
            letter-spacing: -4px;   
        }

       .widget-div button {
            color: crimson;
            text-shadow: 0 0 gray, 0 0 gray, 1px 0 gray, 0 -1px gray;
            transition: 0.3s;
        }

        .widget-div a {
            color: #FFBF00;
            text-shadow: 0 0 gray, 0 0 gray, 1px 0 gray, 0 -1px gray;
            transition: 0.3s;
        }

        .widget-div button:hover {
            text-shadow: -1px 0 gray, 0 1px gray, 1px 0 gray, 0 -1px gray;
        }

        .widget-div a:hover {
            text-shadow: -1px 0 gray, 0 1px gray, 1px 0 gray, 0 -1px gray;
        }

       .song-image {
            width: 320px;
            height: 320px;
       }


       .bottom-div {
            margin-top: 16px;
            margin-left: 320px;
            margin-right: auto;
       }

       .add-div {
        font-size: 16px;
        float: center; 
       }


       .dropdown, .dropdown:active, .dropdown:focus {
        background-color: lightgray;
        font-size: 16px;
        width: auto;
        height: 42px;
        border: 1px outset darkgray;
        outline: none;
        box-shadow: none;
        
       }

       .add-button {
        transition: 0.3s;
        background-color: lightgray;
        border: 1px outset lightgray;
        width: 64px;
        height: 42px;
        color: green;
        text-shadow: 0 0 gray, 0 0 gray, 1px 0 gray, 0 -1px gray;
       }

       .add-button:hover {
            background-color: #DFDFDF;
            border: 1px outset darkgray;
            text-shadow: -1px 0 gray, 0 1px gray, 1px 0 gray, 0 -1px gray;
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
                <br>
                <form action="{{ route('songs.destroy', $song->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete-button">
                        Delete
                    </button>
                </form>
            </div>

        </div>

        
        <div class="bottom-div">
            <div class="add-div">
                <form action="{{ route('songs.add', $song->id) }}" method="POST">
                    @csrf
                    @method('PUT')


                        <select name="type" id="type" class="dropdown">
                            @foreach ($playlists as $playlist)
                                <option value="{{ $playlist->id }}">{{ $playlist->name }}</option>
                            @endforeach
                        </select>
                    <input type="submit" value="Add" class="add-button">
                </form>
            </div>
         </div>

                <div>
                    @foreach ($song->playlists as $pl)
                        <p>{{$pl->name}}</p>
                    @endforeach
                </div>
</x-app-layout>
