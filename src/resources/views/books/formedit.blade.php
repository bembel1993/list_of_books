<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update book</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{ asset('style.css') }}" rel = "stylesheet">
</head>
<body>
    <div class="wrapper_table_books">
        <div class="add_title_properties">
            <h3>Update book</h3>
            <hr>
        <div>
        <div class="table_properties">
            <div class="form_properties">
                <form action="{{ url('updateindb/'.$book->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">Title</label><br>
                        <input type="text" class="form-control form-control-lg" id="title" name="title" value="{{$book->title}}" placeholder="Title">
                    </div><br>
                    <div class="form-group">
                        <label for="author">Author</label><br>
                        <input type="text" class="form-control form-control-lg" id="author" name="author" value="{{$book->author}}" placeholder="Author">
                    </div><br>
                    <div class="form-group">
                        <label for="published_year">Published Year</label><br>
                        <input type="number" class="form-control form-control-lg" id="published_year" name="published_year" value="{{$book->published_year}}" placeholder="Published Year">
                    </div><br>
                    <div class="form-group">
                        <label for="isbn">ISBN</label><br>
                        <input type="text" class="form-control form-control-lg" id="isbn" name="isbn" value="{{$book->isbn}}" placeholder="ISBN">
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-primary" id="update-btn" name="update-btn">
                        Update
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>