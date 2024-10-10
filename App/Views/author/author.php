
<h1>Authors</h1>
<a class = 'btn btn-primary m-3' href="/create_author_page">Add New</a>

<table class = "table">

<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Number of Books</th>
    <th>Options</th>
</tr>

<?php

    use App\Model\Author;
    foreach($authors_genres as $author){        
        $a = Author::getAuthorBooks($author['id']);
        ?>
        <tr>
            <td><?= $author['id']?></td>
            <td><?= $author['name']?></td>
            <td><?= $a[0]['total_books'] ?? 0?> books</td>
            <td>
                <form action="/delete_author" method = 'POST' class="d-inline" >
                    <input type="hidden" name="id" value="<?=$author['id']?>">
                    <input type="submit" name="ok" class="btn btn-danger" value="Delete">
                </form>

                <form action="/edit_author_page" method = 'POST'  class="d-inline">
                    <input type="hidden" name="id" value="<?=$author['id']?>" id="">
                    <input type="submit" name="ok" class="btn btn-warning m-2" value="Edit" id="">
                </form>
            </td>
        </tr>

    <?php } 
    ?>
</table>