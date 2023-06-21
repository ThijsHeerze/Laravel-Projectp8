<x-app-layout>
    <h1>Users</h1>
    <table class="border-spacing-2 border border-slate-500">
        <thead class="border-spacing-2 border border-slate-500">
        <tr class="border-spacing-2 border border-slate-500">
            <th class="border border-slate-500">ID</th>
            <th class="border border-slate-500">Name</th>
            <th class="border border-slate-500">Email</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <br>
    <h1>addFriend</h1>
    <table class="border-spacing-2 border border-slate-500">
        <thead>
        <tr>
            <th class="border border-slate-500">ID</th>
            <th class="border border-slate-500">Name</th>
            <th class="border border-slate-500">Email</th>
            <th class="border border-slate-500">Add friend</th>
        </tr>
        </thead>
        <tbody>
        @foreach($addFriend as $friend)
            <tr>
                <form method="post" action="{{ route('user.index') }}">
            @csrf
            <tr>
                <td id="id">{{ $friend->id }}</td>
                <td>{{ $friend->name }}</td>
                <td>{{ $friend->email }}</td>
                <input type="hidden" name="friend_id" value="{{ $friend->id }}">
                <td><button type="submit">Add Friend</button></td>
            </tr>
            </form>
            </tr>
        @endforeach
        </tbody>
    </table>
    <br>
    <h1>ShowFriends</h1>
    <table class="border-spacing-2 border border-slate-500">
        <thead>
        <tr>
            <th class="border border-slate-500">ID</th>
            <th class="border border-slate-500">Name</th>
        </tr>
        </thead>
        <tbody>
        @foreach($showFriends as $friend)
            <tr>
                <td>{{$friend->friend_id}}</td>
                <td>{{$friend->name}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</x-app-layout>
