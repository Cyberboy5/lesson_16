    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h3>Create Author</h3>
            </div>
            <div class="card-body">
                <form action="/create_author" method="post">
                    <div class="mb-3">
                        <label for="authorName" class="form-label">Author Name</label>
                        <input type="text" class="form-control" id="authorName" name="author_name" required>
                    </div>
                    <button type="submit" name = 'submit' class="btn btn-primary">Create</button>
                    <a class="btn btn-warning" href="/">Back</a>
                </form>
            </div>
        </div>
    </div>
