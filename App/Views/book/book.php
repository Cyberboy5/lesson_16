
<h1>Books</h1>
<a class = 'btn btn-primary m-3' href="/create_book_page">Add New</a>

<table class = "table">

<tr>
    <th>ID</th>
    <th>Image</th>
    <th>Title</th>
    <th>Description</th>
    <th>Text</th>
    <th>Author Name</th>
    <th>Genre Name</th>
    <th>Options</th>
</tr>

<?php
    foreach($authors_genres as $book){?>
        <tr>
            <td><?= $book['id']?></td>
            <td><img width="150px" src="../../../<?= $book['image']?>" alt=""></td>
            <td><?= $book['title']?></td>
            <td><?= $book['description']?></td>
            <td><?= $book['text']?></td>
            <td><?= $book['author_name']?></td>
            <td><?= $book['genre_name']?></td>
            <td>
                <form action="/delete_book" method = 'POST' class="d-inline" >
                    <input type="hidden" name="id" value="<?=$book['id']?>">
                    <input type="submit" name="ok" class="btn btn-danger" value="Delete">
                </form>

                <form action="/edit_book_page" method = 'POST'  class="d-inline">
                    <input type="hidden" name="id" value="<?=$book['id']?>" id="">
                    <input type="submit" name="ok" class="btn btn-warning m-2" value="Edit" id="">
                </form>
            </td>
        </tr>

    <?php } 
    ?>
</table>