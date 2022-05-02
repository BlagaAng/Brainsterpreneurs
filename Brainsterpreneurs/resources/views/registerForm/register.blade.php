<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div id="registerFirst">
        <div class="regiserFirstForm">
            <p class="title">Register</p>


            <form>
                <input class="forminput" for="name" type="text" placeholder="Name">
                <input class="forminput" for="surname" type="text" placeholder="Surname"><br>
                <input class="forminput" for="email" type="email" placeholder="Email">
                <input class="forminput" for="password" type="text" placeholder="Password"><br>
                <p class="bio">Biography</p>

                <textarea id="biographyinput" for="biography" id="biographyinput" cols="60" rows="7"
                    placeholder="Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged."></textarea><br>
                <button class="btnNext">Next</button>
            </form>
        </div>


    </div>

    <div class="registerSecond">
        <div class="regiserFirstForm">
            <div class="academies">
                <p class="title" id="academyTitle">Academies</p>
                <hr class="hrAcademies">
            </div>
            <p>Please select one of the academies listed below
            </p>
        </div>


    </div>
</body>

</html>
