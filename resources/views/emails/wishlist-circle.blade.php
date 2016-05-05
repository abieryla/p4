<h1>Good news {{ $user->firstname }}!</h1>

<p>A wishlist has been created and you are invited to view it.</p>

<div>
    <h2>{{ $book->title }}</h2>
    <h3>By {{ $book->author->first_name }} {{ $book->author->last_name }}</h3>
    <a href='{{ Config::get('app.url').'/book/show/'.$book->id}}'>View now...</a>
</div>

<p>
From,<br>
Team Foobooks
</p>
