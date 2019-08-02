function movieshome(){

    var movies= ["tt6105089","tt4463894","tt2274648","tt4154796","tt5884052","tt8648699","tt4154664","tt0448115","tt9537532"];
    output=``;
    movies.forEach(function(movie){
        console.log(movie);
        fetch('http://www.omdbapi.com/?i='+movies+'&apikey=d7d5aafc')
            .then((res)=> res.json())
            .then((data)=> {
                console.log(data);

                output +=`<div class=' col-sm-3'>
      <div class="back">
      <img  src="${post.Poster}">
      <h5>${post.Title}</h5>
      <a onclick="movieSelected('${post.imdbID}','${post.Title}','${post.Year}')" class="btn btn-primary" href="#">Details</a>
       </div>
       </div>

      `;



                document.getElementById('output1').innerHTML=output;
            })



    });


}
function serieshome(){

    var series= ["tt0944947","tt1475582","tt0436992","tt4574334","tt0898266","tt3107288"];
    output1=``;
    series.forEach(function(serie){
        fetch('http://www.omdbapi.com/?i='+serie+'&apikey=d7d5aafc')
            .then((res)=> res.json())
            .then((data1)=>{
                console.log(data1);


                output1 +=`<div class=' col-sm-3'>
      <div class="back">
      <img  src="${post.Poster}">
      <h5>${post.Title}</h5>
      <a onclick="movieSelected('${post.imdbID}','${post.Title}','${post.Year}')" class="btn btn-primary" href="#">Details</a>
       </div>
      </div>
          `;

                document.getElementById('output2').innerHTML=output1;
            })



    });


}



function getPosts(){

    var movie= document.getElementById('search').value;
    fetch('http://www.omdbapi.com/?s='+movie+'&apikey=d7d5aafc')
        .then((res)=> res.json())
        .then((data)=>{
            console.log(data);
            output=``;
            data.Search.forEach(function(post){
                output +=`
      <div class=' col-sm-3'>
      <div class="back">
      <img  src="${post.Poster}">
      <h5>${post.Title}</h5>
      <a onclick="movieSelected('${post.imdbID}','${post.Title}','${post.Year}')" class="btn btn-primary" href="#">Movie Details</a>
       </div>
       </div>
      `;
            });
            document.getElementById('output').innerHTML=output;
        })

}





function movieSelected(id,movie,year){
    sessionStorage.setItem('movieId',id);
    sessionStorage.setItem('Title',movie);
    sessionStorage.setItem('year',year);
    window.location= "movie.php";
    return false;
}

function getMovies(){

    let movieId= sessionStorage.getItem('movieId');


    fetch('http://www.omdbapi.com/?i='+movieId+'&apikey=d7d5aafc')
        .then((res)=> res.json())
        .then((data)=>{
            console.log(data);
            let output=`
         <br><div class="row">
         <div class="col-md-4">
         <div class="jk">
          <img src="${data.Poster}" class="thumbnail">
          </div>
          <div class="jk">
          <a href="http://imdb.com/title/${data.imdbID}" target="_blank" class="btn btn-primary">View IMDB</a>
          <button onclick="addf();" id="add" type="button" class="btn btn-success">Add in favourites</button>
          <a onclick='trailer();' target="_blank" class="btn btn-danger">Watch trailer</a>


          </div>
          </div>
          <div class="col-md-8">
          <div class="jf">
            <h2>${data.Title}</h2>
            <ul class="list-group" >
               <li class="list-group-item" style="{color:black;}"><strong>Genre: </strong>${data.Genre}</li>
               <li class="list-group-item" style="{color:black;}"><strong>Released: </strong>${data.Released}</li>
               <li class="list-group-item" style="{color:black;}"><strong>Rated: </strong>${data.Rated}</li>
               <li class="list-group-item" style="{color:black;}"><strong>Director: </strong>${data.Director}</li>
               <li class="list-group-item" style="{color:black;}"><strong >Actors: </strong>${data.Actors}</li>
               <li class="list-group-item" style="{color:black;}"><strong >Plot: </strong>${data.Plot}</li>
            </ul>
            </div>
            </div>
            </div>
            <br>
            <br>
   
         
         `;
            document.getElementById('output').innerHTML=output;
        })
}

function init(){

    gapi.client.setApiKey("AIzaSyBaYvjqTb6i1Pgb-eUEhQfhdqczZUZjLio");
    gapi.client.load("youtube","v3", function(){

    });
}
function trailer()
{

    let movie= sessionStorage.getItem('Title');
    let year= sessionStorage.getItem('year');
    var request= gapi.client.youtube.search.list({
        part: "snippet",
        type: "video",
        q: encodeURIComponent(movie+year+" Teaser Trailer").replace(/%20/g,"+"),
        maxResults:1,
        order: "viewCount",

    });
    request.execute(function(response){

        var results= response.result;
        output=``;
        results.items.forEach(function(item){

            console.log(item);
            output +=`
            <div class=' col-sm-6'>
            <h2>${item.snippet.title}</h2>
            <iframe class="video w100" width="640" height="360" src="//www.youtube.com/embed/${item.id.videoId}" frameborder="0" allowfullscreen></iframe>
           </div>
            `;

        });
        document.getElementById('trailer').innerHTML=output;
    });

}


function homepage()
{


    fetch('http://www.omdbapi.com/?y=2019&apikey=d7d5aafc')
        .then((res)=> res.json())
        .then((data)=>{
            console.log(data);
            output=``;
            data.Search.forEach(function(post){
                output +=`
      <div class=' col-sm-3'>
      <div class="back">
      <img  src="${post.Poster}">
      <h5>${post.Title}</h5>
      <a onclick="movieSelected('${post.imdbID}','${post.Title}','${post.Year}')" class="btn btn-primary" href="#">Movie Details</a>
       </div>
       </div>
      `;
            });
            document.getElementById('output').innerHTML=output;
        })





}


