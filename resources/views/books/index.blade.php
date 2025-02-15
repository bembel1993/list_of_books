<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>List of Books</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{ asset('style.css') }}" rel = "stylesheet">
</head>
<body>
        <div class="add_title_properties">
            <div class="text-success"><h3>{{ session('success') }}</h3></div>
        </div>
    <div class="wrapper_table_books">
        <div class="add_title_properties">
            <a href="{{ route('books.formcreate') }}">Add new book</a>
        <div>
        <hr>
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                            <div class="row">
                                <div class=search_properties>
                                    <div class="col-md-5">
                                        <div class="input-group col-mb-3">
                                            <form action="" method="">
                                                <input type="text" class="form-control" placeholder="Search author" id="search_auth">
                                            </form>
                                            &emsp;&emsp;&emsp;
                                            <form action="" method="">
                                                <input type="text" class="form-control" placeholder="Search published year" id="search_pubyear">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-12">
            <label for="books_sort">Sort books:</label>
                <div class="col-md-5">
                    <!-- <form method="" action=""> -->
                        <input type="submit" class="btn btn-light" id="by_title_top" value="by title ↑" onclick="return topBooks()"/>
                        <input type="submit" class="btn btn-light" id="by_title_bottom" value="by title ↓" onclick="return bottomBooks()"/>
                        <input type="submit" class="btn btn-light" id="by_year_top" value="by year ↑" onclick="return topYearBooks()"/>
                        <input type="submit" class="btn btn-light" id="by_year_bottom" value="by year ↓" onclick="return bottomYearBooks()"/>
                    <!-- </form> -->
                </div>
            </div>
        </div>
        <hr>
        <div class="table_properties">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Title</td>
                        <th scope="col">Author</td>
                        <th scope="col">Published Year</td>
                        <th scope="col">ISBN</td>
                    </tr>
                </thead>
                <tbody id="books-tbody">
                @if(count($books)>0)    
                    @foreach ($books as $row)
                    <tr>
                        <td id="title">
                            {{ $row->title }}
                        </td>
                        <td id="author">
                            {{ $row->author }}
                        </td>
                        <td id="published_year">
                            {{ $row->published_year }}
                        </td>
                        <td id="isbn">
                            {{ $row->isbn }}
                        </td>
                        <td>  
                            <a href="{{ url('books.formedit/'.$row->id) }}">Edit</a>
                        </td>
                        <td>
                            <a href="{{ url('books.delete/'.$row->id) }}" onclick="return deleteBook()">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <p>No Posts Found</p>
                @endif
                </tbody>
            </table>
            
        </div>
    </div> 

    <nav aria-label="Page navigation example"> 
        <ul class="pagination justify-content-center"> 
            {{-- Previous Page Link --}} 
            @if ($books->onFirstPage()) 
            <li class="page-item disabled"> 
                <span class="page-link">&laquo;</span> 
            </li> 
            @else 
            <li class="page-item"> 
                <a class="page-link" href="{{ $books->previousPageUrl() }}" aria-label="Previous"> 
                <span aria-hidden="true">&laquo;</span> 
                </a> 
            </li> 
            @endif 
        
            {{-- Numbered Page Links --}} 
            @foreach ($books->getUrlRange(1, $books->lastPage()) as $page => $url) 
            <li class="page-item {{ $books->currentPage() == $page ? 'active' : '' }}"> 
                <a class="page-link" href="{{ $url }}">{{ $page }}</a> 
            </li> 
            @endforeach 
        
            {{-- Next Page Link --}} 
            @if ($books->hasMorePages()) 
            <li class="page-item"> 
                <a class="page-link" href="{{ $books->nextPageUrl() }}" aria-label="Next"> 
                <span aria-hidden="true">&raquo;</span> 
                </a> 
            </li> 
            @else 
            <li class="page-item disabled"> 
                <span class="page-link">&raquo;</span> 
            </li> 
            @endif 
        </ul> 
    </nav>  
    
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

    <script>
        $('#search_auth').on('keyup', function(){
            searchAuth();
        });
        searchAuth();
        function searchAuth()
        {
            var keyword_auth = $('#search_auth').val();
            $.post('{{ route("authors.search") }}',
            {
                _token: $('meta[name="csrf-token"]').attr('content'),
                keyword_auth:keyword_auth
            },
            function(data){
                auth_post_row(data);
                console.log(data);
            });
        }

        function auth_post_row(res)
        {
            let htmlView = '';
            let title = '';
            let author = ''; 
            let published_year = ''; 
            let isbn = '';

            if(res.books.length <= 0){
                htmlView+= `
                <tr>
                    <td colspan="6">No data.</td>
                </tr>`;
            }

            for(let i = 0; i < res.books.length; i++)
            {
                $("#authorId").val(res.books[i].title);

                htmlView += `
                        <tr>
                            <td>`+res.books[i].title+`</td>
                            <td>`+res.books[i].author+`</td>
                            <td>`+res.books[i].published_year+`</td>
                            <td>`+res.books[i].isbn+`</td>
                            <td>  
                                <a href="{{ url('books.formedit/') }}/${res.books[i].id}">Edit</a>
                            </td>
                            <td>
                                <a href="{{ url('books.delete/') }}/${res.books[i].id}" onclick="return deleteBook()">Delete</a>
                            </td>
                        </tr>`;
                        
            }
            $('tbody').html(htmlView);
        }
        

        $('#search_pubyear').on('keyup', function(){
            searchPubyear();
        });
        searchPubyear();
        function searchPubyear()
        {
            var keyword_pubyear = $('#search_pubyear').val();
            $.post('{{ route("authors.search") }}',
            {
                _token: $('meta[name="csrf-token"]').attr('content'),
                keyword_pubyear:keyword_pubyear
            },
            function(data){
                pubyear_post_row(data);
                console.log(data);
            });
        }

        function pubyear_post_row(res)
        {
            let htmlView = '';
            let title = '';
            let author = ''; 
            let published_year = ''; 
            let isbn = '';

            if(res.books.length <= 0){
                htmlView+= `
                <tr>
                    <td colspan="6">No data.</td>
                </tr>`;
            }

            for(let i = 0; i < res.books.length; i++)
            {
                $("#authorId").val(res.books[i].title);

                htmlView += `
                        <tr>
                            <td>`+res.books[i].title+`</td>
                            <td>`+res.books[i].author+`</td>
                            <td>`+res.books[i].published_year+`</td>
                            <td>`+res.books[i].isbn+`</td>
                            <td>  
                                <a href="{{ url('books.formedit/') }}/${res.books[i].id}">Edit</a>
                            </td>
                            <td>
                                <a href="{{ url('books.delete/') }}/${res.books[i].id}" onclick="return deleteBook()">Delete</a>
                            </td>
                        </tr>`;
                        
            }
            $('tbody').html(htmlView);
        }
    </script>
    <script>
        function deleteBook()
        {
            if (confirm("Are you really want to delete this book?") == false){
                return false;
            } 
        }
    </script>
    <script>
        function topBooks()
        {
            $('#by_title_top').on('keyup', function(){
                sortTitleTop();
            });
            
            sortTitleTop();
            
            function sortTitleTop()
                {
                    var keyword_title_top = $('#by_title_top').val();
                    $.post('{{ route("bytitletop.sort") }}',
                    {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        keyword_title_top:keyword_title_top
                    },
                    function(data){
                        books_sort(data);
                        console.log(data);
                    });
                }

                function books_sort(res)
                {
                    let htmlView = '';
                    let title = '';
                    let author = ''; 
                    let published_year = ''; 
                    let isbn = '';

                    if(res.books.length <= 0){
                        htmlView+= `
                        <tr>
                            <td colspan="6">No data.</td>
                        </tr>`;
                    }

                    for(let i = 0; i < res.books.length; i++)
                    {
                        $("#authorId").val(res.books[i].title);

                        htmlView += `
                                <tr>
                                    <td>`+res.books[i].title+`</td>
                                    <td>`+res.books[i].author+`</td>
                                    <td>`+res.books[i].published_year+`</td>
                                    <td>`+res.books[i].isbn+`</td>
                                    <td>  
                                        <a href="{{ url('books.formedit/') }}/${res.books[i].id}">Edit</a>
                                    </td>
                                    <td>
                                        <a href="{{ url('books.delete/') }}/${res.books[i].id}" onclick="return deleteBook()">Delete</a>
                                    </td>
                                </tr>`;
                                
                    }
                    $('tbody').html(htmlView);
                }
        }
    </script>
    <script>
        function bottomBooks()
        {
            $('#by_title_bottom').on('keyup', function(){
                sortTitleBottom();
            });
            
            sortTitleBottom();
            
            function sortTitleBottom()
                {
                    var keyword_title_top = $('#by_title_bottom').val();
                    $.post('{{ route("bytitlebottom.sort") }}',
                    {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        keyword_title_top:keyword_title_top
                    },
                    function(data){
                        books_sort(data);
                        console.log(data);
                    });
                }

                function books_sort(res)
                {
                    let htmlView = '';
                    let title = '';
                    let author = ''; 
                    let published_year = ''; 
                    let isbn = '';

                    if(res.books.length <= 0){
                        htmlView+= `
                        <tr>
                            <td colspan="6">No data.</td>
                        </tr>`;
                    }

                    for(let i = 0; i < res.books.length; i++)
                    {
                        $("#authorId").val(res.books[i].title);

                        htmlView += `
                                <tr>
                                    <td>`+res.books[i].title+`</td>
                                    <td>`+res.books[i].author+`</td>
                                    <td>`+res.books[i].published_year+`</td>
                                    <td>`+res.books[i].isbn+`</td>
                                    <td>  
                                        <a href="{{ url('books.formedit/') }}/${res.books[i].id}">Edit</a>
                                    </td>
                                    <td>
                                        <a href="{{ url('books.delete/') }}/${res.books[i].id}" onclick="return deleteBook()">Delete</a>
                                    </td>
                                </tr>`;
                                
                    }
                    $('tbody').html(htmlView);
                }
        }
    </script>
    <script>
        function topYearBooks()
        {
            $('#by_year_top').on('keyup', function(){
                sortYearTop();
            });
            
            sortYearTop();
            
            function sortYearTop()
                {
                    var keyword_title_top = $('#by_year_top').val();
                    $.post('{{ route("byyeartop.sort") }}',
                    {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        keyword_title_top:keyword_title_top
                    },
                    function(data){
                        books_sort(data);
                        console.log(data);
                    });
                }

                function books_sort(res)
                {
                    let htmlView = '';
                    let title = '';
                    let author = ''; 
                    let published_year = ''; 
                    let isbn = '';

                    if(res.books.length <= 0){
                        htmlView+= `
                        <tr>
                            <td colspan="6">No data.</td>
                        </tr>`;
                    }

                    for(let i = 0; i < res.books.length; i++)
                    {
                        $("#authorId").val(res.books[i].title);

                        htmlView += `
                                <tr>
                                    <td>`+res.books[i].title+`</td>
                                    <td>`+res.books[i].author+`</td>
                                    <td>`+res.books[i].published_year+`</td>
                                    <td>`+res.books[i].isbn+`</td>
                                    <td>  
                                        <a href="{{ url('books.formedit/') }}/${res.books[i].id}">Edit</a>
                                    </td>
                                    <td>
                                        <a href="{{ url('books.delete/') }}/${res.books[i].id}" onclick="return deleteBook()">Delete</a>
                                    </td>
                                </tr>`;
                                
                    }
                    $('tbody').html(htmlView);
                }
        }
    </script>
    <script>
        function bottomYearBooks()
        {
            $('#by_year_bottom').on('keyup', function(){
                sortYearBottom();
            });
            
            sortYearBottom();
            
            function sortYearBottom()
                {
                    var keyword_title_top = $('#by_year_bottom').val();
                    $.post('{{ route("byyearbottom.sort") }}',
                    {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        keyword_title_top:keyword_title_top
                    },
                    function(data){
                        books_sort(data);
                        console.log(data);
                    });
                }

                function books_sort(res)
                {
                    let htmlView = '';
                    let title = '';
                    let author = ''; 
                    let published_year = ''; 
                    let isbn = '';

                    if(res.books.length <= 0){
                        htmlView+= `
                        <tr>
                            <td colspan="6">No data.</td>
                        </tr>`;
                    }

                    for(let i = 0; i < res.books.length; i++)
                    {
                        $("#authorId").val(res.books[i].title);

                        htmlView += `
                                <tr>
                                    <td>`+res.books[i].title+`</td>
                                    <td>`+res.books[i].author+`</td>
                                    <td>`+res.books[i].published_year+`</td>
                                    <td>`+res.books[i].isbn+`</td>
                                    <td>  
                                        <a href="{{ url('books.formedit/') }}/${res.books[i].id}">Edit</a>
                                    </td>
                                    <td>
                                        <a href="{{ url('books.delete/') }}/${res.books[i].id}" onclick="return deleteBook()">Delete</a>
                                    </td>
                                </tr>`;
                                
                    }
                    $('tbody').html(htmlView);
                }
        }
    </script>
</body>
</html>