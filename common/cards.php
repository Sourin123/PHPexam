<!-- <?php

$url = "https://api.api-onepiece.com/v2/characters/en";

try {
    $response = file_get_contents($url);
    if ($response === false) {
        throw new Exception("Failed to retrieve data from API");
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
    exit;
}

$data = json_decode($response, true);
if (json_last_error() !== JSON_ERROR_NONE) {
    echo "Error: Invalid JSON response";
    exit;
}

// Assuming the API returns an array of character objects
$characters = $data['characters'] ?? []; // or whatever the key is in the API response

// Print the name of the first character
if (!empty($characters)) {
    print($characters[0]['name'] ?? ''); // or whatever the key is for the character's name
} else {
    echo "No characters found";
}
?> -->

<div class="container py-5">
    <div class="row justify-content-center">

        <div class="col-12 col-lg-4">
            <div class="card box-shadow mx-auto my-5" style="width: 18rem;">
                <img src="https://i.imgur.com/YGz2LXh.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Anémone</h5>
                    <hr>
                    <p class="card-text">Some quick example</p>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                    <path fill="#ffffff" fill-opacity="1" d="M0,192L48,197.3C96,203,192,213,288,192C384,171,480,117,576,90.7C672,64,768,64,864,85.3C960,107,1056,149,1152,186.7C1248,224,1344,256,1392,272L1440,288L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
                </svg>
                <a href=""><i class="fas fa-disease"></i></a>
            </div>
        </div>
    </div>
</div>




<style>
    a {
        cursor: pointer;
    }

    p {
        padding-bottom: 1rem;
    }

    h5 {
        font-weight: bold;
        color: #2b2b2b;
    }

    .box-shadow {
        -webkit-box-shadow: 0 1px 1px rgba(72, 78, 85, .6);
        box-shadow: 0 1px 1px rgba(72, 78, 85, .6);
        -webkit-transition: all .2s ease-out;
        -moz-transition: all .2s ease-out;
        -ms-transition: all .2s ease-out;
        -o-transition: all .2s ease-out;
        transition: all .2s ease-out;
    }

    .box-shadow:hover {
        -webkit-box-shadow: 0 20px 40px rgba(72, 78, 85, .6);
        box-shadow: 0 20px 40px rgba(72, 78, 85, .6);
        -webkit-transform: translateY(-15px);
        -moz-transform: translateY(-15px);
        -ms-transform: translateY(-15px);
        -o-transform: translateY(-15px);
        transform: translateY(-15px);
    }

    .card {
        border-radius: 25px;

    }

    .card img {
        border-top-left-radius: 25px;
        border-top-right-radius: 25px;
    }

    .card svg {
        position: absolute;
        top: 19rem;
        -webkit-transition: all .2s ease-out;
        -moz-transition: all .2s ease-out;
        -ms-transition: all .2s ease-out;
        -o-transition: all .2s ease-out;
        transition: all .2s ease-out;
        filter: drop-shadow(2px -9px 4px rgba(0, 69, 134, 0.2));
    }

    .card:hover svg {
        filter: drop-shadow(2px -9px 4px rgba(0, 69, 134, 0.4));
    }

    i {
        position: absolute;
        top: 18rem;
        right: 2rem;
        color: white;
        font-size: 3rem;
        background: rgb(238, 174, 202);
        background: linear-gradient(133deg, rgba(255, 255, 255, 1) 0%, rgba(211, 210, 231, 1) 19%, rgba(11, 39, 73, 1) 100%);
        padding: 1rem;
        border-radius: 100%;
        transition: all .6s ease-in-out;
    }

    .card:hover i {
        transform: rotate(-180deg);
    }

    i:hover {
        box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.7) 0px 18px 36px -18px inset;
    }

    @import url('https://fonts.googleapis.com/css?family=Roboto&display=swap');
    @import url('https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');

    * {
        margin: 0;
        padding: 0;
    }

    *,
    *::before,
    *::after {
        margin: 0;
        padding: 0;
        box-sizing: inherit;
    }

    body {
        min-height: 100vh;
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        align-content: flex-start;

        font-family: 'Roboto', sans-serif;
        font-style: normal;
        font-weight: 300;
        font-smoothing: antialiased;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        font-size: 15px;
        background: #eee;
    }

    .cd__intro {
        padding: 60px 30px;
        margin-bottom: 15px;
        flex-direction: column;

    }

    .cd__intro,
    .cd__credit {
        display: flex;
        width: 100%;
        justify-content: center;
        align-items: center;
        background: #fff;
        color: #333;
        line-height: 1.5;
        text-align: center;
    }

    .cd__intro h1 {
        font-size: 18pt;
        padding-bottom: 15px;

    }

    .cd__intro p {
        font-size: 14px;
    }

    .cd__action {
        text-align: center;
        display: block;
        margin-top: 20px;
    }

    .cd__action a.cd__btn {
        text-decoration: none;
        color: #666;
        border: 2px solid #666;
        padding: 10px 15px;
        display: inline-block;
        margin-left: 5px;
    }

    .cd__action a.cd__btn:hover {
        background: #666;
        color: #fff;
        transition: .3s;
        -webkit-transition: .3s;
    }

    .cd__action .cd__btn:before {
        font-family: FontAwesome;
        font-weight: normal;
        margin-right: 10px;
    }

    .down:before {
        content: "\f019"
    }

    .back:before {
        content: "\f112"
    }

    .cd__credit {
        padding: 12px;
        font-size: 9pt;
        margin-top: 40px;

    }

    .cd__credit span:before {
        font-family: FontAwesome;
        color: #e41b17;
        content: "\f004";


    }

    .cd__credit a {
        color: #333;
        text-decoration: none;
    }

    .cd__credit a:hover {
        color: #1DBF73;
    }

    .cd__credit a:hover:after {
        font-family: FontAwesome;
        content: "\f08e";
        font-size: 9pt;
        position: absolute;
        margin: 3px;
    }

    .cd__main {
        background: #fff;
        padding: 20px;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: center;

    }

    .cd__main {
        display: flex;
        width: 100%;
    }

    @media only screen and (min-width: 1360px) {
        .cd__main {
            max-width: 1280px;
            margin-left: auto;
            margin-right: auto;
            padding: 24px;
        }
    }
</style>

<script>
    import fontAwesome from "https://cdn.skypack.dev/font-awesome@4.7.0";
</script>

