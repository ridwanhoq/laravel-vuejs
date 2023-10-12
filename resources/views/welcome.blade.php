<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="{{ asset('js/vue.js') }}"></script>
</head>

<body>
    <div id="app">
        <p>
            @{{ title }}
        </p>
        <p>
            @{{ testFunction() }}
        </p>
        <p>
            @{{ testFunction2() }}
        </p>
        <img v-bind:src="imgSrc__" v-bind:alt="imgAlt" width="200" height="200">
        <a v-bind:href="websiteLink">Google</a>
        <hr>
        <hr>
        <p v-text="myText">
        </p>

        <p v-html="myHtml">
        </p>

        <p v-if="userAge >= 30">
            You are good to go
        </p>
        <p v-else="">
            You are not good to go
        </p>

        <p v-if="userAge <= 10">
            less than or equal 10
        </p>
        <p v-else-if="userAge > 10 && userAge <= 18">
            less than or equal 18, but greater than 10
        </p>
        <p v-else="">
            greater than 18
        </p>

        @{{ changeUser() }}

        <p v-if="changeUser">
            userName is Raz
        </p>

        <p v-show="userName == 'Raz'">
            show it if the user name is Raz
        </p>
        <p v-show="userName != 'Raz'">
            show it when user name is not Raz
        </p>


        <p>
        <ul>
            <li v-for="(car, index) in cars">
                @{{ index + 1 }} : @{{ car }}
            </li>
        </ul>
        </p>


        <p>
            <ul>
                <li v-for="(user, key, index) in users">
                    @{{ index + 1 }} : @{{ key }} : @{{ user }}
                </li>
            </ul>
        </p>

        <p>
            <ul>
                <li v-for="n in 10">
                    @{{ n }}
                </li>
            </ul>
        </p>

        <h4 v-once>
            Old Name : @{{ name }}
        </h4>
        <h4> 
            Updated Name : @{{ name }}
            @{{ updateName() }}
        </h4>


        <h4>
            Name : @{{ name }}
        </h4>

        <button v-on:click="updateUser">Update Name </button>

        <div class="box" style="width: 400; height: 200; background-color: ">
            hover me 
        </div>
    </div>
</body>
<script>
    new Vue({
        el: '#app',
        data: {
            title: 'v app',
            status: true,
            fruits: [
                'Apple',
                'Orange',
                'Banana',
                {
                    'special': {
                        'name': 'dragon'
                    }
                }
            ],
            imgSrc: 'https://fastly.picsum.photos/id/832/200/300.jpg?hmac=6gMt7WeRsS41_901ujRTrOgfwtW9MBZ375g8qXO3LUc',
            imgAlt: 'Image',
            websiteLink: 'http://google.com',
            myText: 'Hello world',
            myHtml: "<strong>Hello world</strong>",
            userName: "Raz1",
            userAge: 16,
            cars: [
                'BMW',
                'Toyota',
                'Ford'
            ],
            users: {
                name : 'Raz',
                age : 20,
                country: 'BD'
            },
            name: "Razu"
        },
        methods: {
            testFunction: function() {
                return this.title
            },
            testFunction2: function() {
                return this.status
            },
            changeUser: function() {
                return this.userName == "Raz" ?? false
            },
            updateName: function(){
                setTimeout(() => {
                    this.name = "Raza"
                }, 2000);
            },
            updateUser: function(){
                this.name = "Mina"
            }   
        },

    });
</script>

</html>
