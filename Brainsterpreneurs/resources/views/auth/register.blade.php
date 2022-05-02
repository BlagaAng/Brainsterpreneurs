<style>


</style>
<x-guest-layout>
    {{-- <form id="contactForm"> --}}
    <div class="registerFirst">
        <form method="POST" action="{{ route('register.store') }}">

            @csrf
            <div class="regiserFirstForm">
                <p class="title">Register</p>
                <x-auth-card>
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <!-- Name -->
                    <div>
                        <x-input id="name" class=" mt-1 w-full forminput" type="text" name="name" :value="old('name')"
                            required autofocus placeholder="Name" />
                        <!-- Surname -->
                        <x-input id="surname" class=" mt-1 w-full forminput" type="text" name="surname"
                            :value="old('surname')" required autofocus placeholder="Surname" /><br>
                        <!-- Email Address -->
                        <x-input id="email" class=" mt-1 w-full forminput" type="email" name="email"
                            :value="old('email')" required placeholder="Email" />
                        <!-- Password -->
                        <x-input id="password" class=" mt-1 w-full forminput" type="password" name="password" required
                            autocomplete="new-password" placeholder="Password" />
                    </div>
                    <p class="bio">Biography</p>
                    <textarea id="biography" for="biography" cols="60" rows="7" name="biography"
                        placeholder="Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged."></textarea><br>
                    <button type="submit" class="btnNext" type="button" id="btnFirst">Next</button>
        </form>

        </x-auth-card>
    </div>


    </div>

    <div class="registerSecond">
        <form method="POST" action="{{ route('register.update') }}">
            @method('PUT')
            @csrf
            <div class="regiserFirstForm">
                <div class="academies">
                    <p class="title" id="academyTitle">Academies</p>
                    <hr class="hrAcademies">
                </div>
                <p class="academiesParagraph">Please select one of the academies listed below
                </p>
            </div>

            <div class="boxesAcademies" id="academies">
                @foreach ($academies as $academy)
                    <div id="academy_id" data-id="{{ $academy->id }}" class="squareAcademies">
                        {{ $academy->name }}</div>
                @endforeach
            </div>


            <button type="submit" class="btnNext2" type="button" id="btnSecond">Next</button>
        </form>

    </div>

    <div class="registerThird">
        <form method="POST" action="{{ route('register.update2') }}">
            @method('PUT')
            @csrf
            <div class="regiserFirstForm">
                <div class="academies">
                    <p class="title" id="academyTitle">Skills</p>
                    <hr class="hrSkills">
                </div>
                <p class="skillsParagraph">Please select your skills set
                </p>
            </div>

            <div class="boxesSkills">
                @foreach ($skills as $skill)
                    <div id="skill_id" data-id="{{ $skill->id }}" class="squareSkills">{{ $skill->name }}</div>
                @endforeach
            </div>

            <button type="submit" class="btnNext3" type="button" id="btnThird">Next</button>
        </form>
    </div>

    <div class="registerFourth">
        <form method="POST" action="{{ route('register.update3') }}">
            @method('PUT')
            @csrf

            <div class="regiserFirstForm">
                <div class="academies">
                    <p class="title" id="academyTitle">Your profile image</p>
                    <hr class="hrAcademies">
                </div>

                <div class="profile-images-card">
                    <div class="profile-images">
                        <img src="images/profile.png" id="image">
                    </div>

                </div>
                <div class="custom-file">
                    <label class="imageParagraph" for="fileupload">Click here to upload an image</label>
                    <input type="file" id="fileupload" name="image">
                </div>
            </div>

            <button type="submit" class="btnNext4" id="btnFourth">Finish</button>
        </form>

    </div>
    </form>

</x-guest-layout>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="js/jquery-latest.min.js"></script>
<script>
    $(function() {


        $("#fileupload").change(function(event) {
            var x = URL.createObjectURL(event.target.files[0]);
            $("#image").attr("src", x);
            console.log(event);
        });


        $('.squareAcademies').click(function(e) {
            $('.squareAcademies').removeClass('active');
            $(this).addClass('active');

            console.log($(this).attr("data-id"))
        });




        $(".squareSkills").on("click", function() {
            $(this).css("background", "#48695c");
            $(this).css("color", "white");
            $("div").attr({
                "max": 10,
                "min": 5
            });

            console.log($(this).attr("data-id"))
        });



        $('.registerSecond').hide()
        $('.registerThird').hide()
        $('.registerFourth').hide()

        $(".btnNext").on("click", function() {
            $('.registerSecond').show()
            $('.registerFirst').hide()
            $('.registerThird').hide()
            $('.registerFourth').hide()
        });
        $(".btnNext2").on("click", function() {
            $('.registerThird').show()
            $('.registerFirst').hide()
            $('.registerSecond').hide()
            $('.registerFourth').hide()
        });

        $(".btnNext3").on("click", function() {
            $('.registerFourth').show()
            $('.registerFirst').hide()
            $('.registerSecond').hide()
            $('.registerThird').hide()
        });

        $('#contactForm').on('btnFourth', function(e) {
            e.preventDefault();

            let name = $('#name').val();
            let surname = $('#surname').val();
            let email = $('#email').val();
            let password = $('#password').val();
            let biography = $('#biography').val();
            let academy_id = $('#academy_id').text();
            let image = $('#image').val();
            console.log(academy_id);

            $.ajax({
                url: "{{ route('register.store') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    name: name,
                    surname: surname,
                    email: email,
                    password: password,
                    biography: biography,
                    academy_id: academy_id,
                    image: image,

                },
                success: function(response) {
                    console.log(response);
                },
            });
        });
        /*
                        $("#contact-frm").submit(function(e) {
                            e.preventDefault();
                            let url = $(this).attr('action');
                            $("#btnNext4").attr('disabled', true);
                            $.post(url, {
                                    '_token': $("#token").val(),

                                    email: $("#email").val(),
                                    name: $("#name").val(),
                                    surname: $("#surname").val(),
                                    password: $("#password").val(),
                                    biography: $("#biography").val(),
                                    academy_id: $("#academies").val(),
                                    image: $("#upload-img").val(),
                                },
                                function(response) {
                                    if (response.code == 400) {
                                        $("#btnNext4").attr('disabled', false);
                                        let error = '<span class="alert alert-danger">' + response.msg + '</span>';
                                        $("#res").html(error);
                                    } else if (response.code == 200) {
                                        $("#btn").attr('disabled', false);
                                        let success = '<span class="alert alert-success">' + response.msg +
                                            '</span>';
                                        $("#res").html(success);
                                    }
                                });
         */


    })
</script>
