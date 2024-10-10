<div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h3>Update Author</h3>
            </div>
            <div class="card-body">
                <form action="/edit_author" method="post">
                    <div class="mb-3">
                        <label for="authorName" class="form-label">Author`s New Name</label>
                        <input type="text" class="form-control" id="authorName" name="author_new_name" required>
                    </div>

                    <input type="hidden" name="id" value="<?= $_POST['id']?>" id="">
                    <button type="submit" name = "submit" class="btn btn-primary">Update</button>
                    <a class="btn btn-warning" href="/">Back</a>
                </form>
            </div>
        </div>
    </div>
