<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../client/css/trending.css">
    <title>Trending</title>
</head>
<body>
    
    <div class="container">
        <div class="row" id="popular-row">
           
        </div>
    </div>

    <script>

//fetching popular movies
    let page = Math.floor(Math.random() * 101)

    const options = {
        method: 'GET',
        headers: {
        accept: 'application/json',
        Authorization: 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJhNDA1ZTNlMzY4YTNhYzlmMDM5ZWMwYjMyODQ4YjdiOSIsInN1YiI6IjY1YWU0NGFmNTQ0YzQxMDBhZTI0ZjBiOSIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.FobF9qy1qBiHfiYbaw8yi2g2wzQs8R-YGAJ96W-7g_k'
        }
    };

    fetch(`https://api.themoviedb.org/3/movie/upcoming?language=en-US&page=${page}`, options)
        .then(response => response.json())
        .then(data =>{
            
            const populars = data.results;
            const popularRow = document.querySelector("#popular-row");
            
            populars.forEach(popular => {
                console.log(popular);
                const {id, overview, poster_path, title} = popular;
                const imageUrl = `https://image.tmdb.org/t/p/w300${poster_path}`;

                const card = document.createElement('div');
                card.classList.add('col-3');

                
                card.innerHTML = `
                    <div class="card text-bg-dark p-2" style="width: 100%; max-height: 100%">
                            <img src="${imageUrl}" class="card-img-top img-fluid" alt="${title}">
                        <div class="card-body text-md-start">
                            <h5 class="card-title">${title}</h5>
                            <p class="card-text">${overview}</p>
                                <div class="like">
                                    <a href="#" class="btn m-2">Details</a>
                                    <button class="btn m-2">
                                        <img src="../client/images/heart.png" class="img-fluid w-50 ">
                                    </button>
                                </div>
                        </div>
                    </div>
                `;
                popularRow.appendChild(card);
            });
        })
        .catch(err => console.error(err));

    

</script>
</body>
</html>