<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../client/css/favorite.css">
    <title>Document</title>
</head>
<body>

<div class="container" id="movie-list">
  <div class="row" id="movie-row"></div>
</div>

<script>
    getData('../server/Favorite.php', renderCards);
    
    function renderCards(data) {
        console.log(data);
        for (const item of data) {
            document.getElementById('movie-row').innerHTML += 
            `
            <div class="col-3">
                <div class="card text-bg-dark p-2" style="width: 100%; max-height: 100%">
                        <img src="${item.poster_path}" class="card-img-top" alt="${item.title}">
                    <div class="card-body text-md-start">
                        <h5 class="card-title">${item.title}</h5>
                        <p class="card-text">${item.overview}</p>
                        <div class="remove d-flex justify-content-end">
                            <button class="btn m-2" id="likeButton" onclick="removeFavorite(${item.movieId})">
                                <img src="../client/images/whiteheart.png" value="${item.movieId}" class="img-fluid w-50">
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            `;
        }
    }

    function removeFavorite(obj) {
        console.log(obj);
    }
</script>
</body>
</html>