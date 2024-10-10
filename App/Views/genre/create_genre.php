<div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h3>Create Genre</h3>
            </div>
            <div class="card-body">
                <form action="/create_genre" method="post">
                    <div class="mb-3">
                        <label for="genreName" class="form-label">Genre Name</label>
                        <input type="text" class="form-control" id="genreName" name="genre_name" required>
                    </div>
                    <button type="submit" name = 'submit' class="btn btn-primary">Create</button>
                    <a class="btn btn-warning" href="/genre">Back</a>
                </form>
            </div>
        </div>
    </div>
