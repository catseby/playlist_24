<x-app-layout>
    <style>
       
    </style>
    
    <div class="">
        <a href="{{ route('songs.create') }}" class="button">
            <div class="button-overlay"></div>
            <span>Create Song <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 53 58" height="58" width="53">
                <path stroke-width="9" stroke="currentColor" d="M44.25 36.3612L17.25 51.9497C11.5833 55.2213 4.5 51.1318 4.50001 44.5885L4.50001 13.4115C4.50001 6.86824 11.5833 2.77868 17.25 6.05033L44.25 21.6388C49.9167 24.9104 49.9167 33.0896 44.25 36.3612Z"></path>
            </svg></span>
        </a>
    </div>
        <div class="">
            <div class="">
                <div>       
                    <a class="" href="{{ route('songs.show', $song->id) }}">
                        {{ $song->title }}
                    </a>     
                    <div class="">
                        <span class="">
                            {{ $song->artist }}
                        </span>
                    </div>
                    <div class="">
                        <span class="inline-block shadow-lg bg-gray-400 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                            {{ $song->genre }}
                        </span>
                    </div>
                </div>
                <div>
                    <a href="{{ route('songs.show', $song->id) }}" class="bg-blue-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded mr-2">
                        View
                    </a>
                    <a href="{{ route('songs.edit', $song->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded mr-2">
                        Edit
                    </a>
                    <form action="{{ route('songs.destroy', $song->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
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
