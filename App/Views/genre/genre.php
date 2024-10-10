
<h1>Genres</h1>
<a class = 'btn btn-primary m-3' href="/create_genre_page">Add New</a>

<table class = "table">

<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Number of Books</th>
    <th>Options</th>
</tr>

<?php

    use App\Model\Genre;

    foreach($authors_genres as $genre){
        ?>
        <tr>
            <td><?= $genre['id']?></td>
            <td><?= $genre['name']?></td>
            <td><?= Genre::getBookGenres($genre['id'])[0]['total_books'] ?? 0?> books</td>
            <td>
                <form action="/delete_genre" method = 'POST' class="d-inline" >
                    <input type="hidden" name="id" value="<?=$genre['id']?>">
                    <input type="submit" name="ok" class="btn btn-danger" value="Delete">
                </form>

                <form action="/edit_genre_page" method = 'POST'  class="d-inline">
                    <input type="hidden" name="id" value="<?=$genre['id']?>" id="">
                    <input type="submit" name="ok" class="btn btn-warning m-2" value="Edit" id="">
                </form>
            </td>
        </tr>

    <?php } 
    ?>
</table>