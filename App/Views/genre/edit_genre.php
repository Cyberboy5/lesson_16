<div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h3>Update Genre</h3>
            </div>
            <div class="card-body">
                <form action="/edit_genre" method="post">
                    <div class="mb-3">
                        <label for="genreName" class="form-label">New Name</label>
                        <input type="text" class="form-control" id="genreName" name="genre_new_name" required>
                    </div>

                    <input type="hidden" name="id" value="<?= $_POST['id']?>" id="">
                    <button type="submit" name = "submit" class="btn btn-primary">Update</button>
                    <a class="btn btn-warning" href="/genre">Back</a>
                </form>
            </div>
        </div>
    </div>
