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

        <div style="display: none">
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

            <div class="box" style="width: 400; height: 200; background-color: aqua" v-on:mousemove="getCord">
                hover me
            </div>

            <p>
                X : @{{ x }}
                Y : @{{ y }}
            </p>


            <p>
                @{{ name }}
            </p>

            <button v-on:click.right="updateWithGivenName('testName')">
                click
            </button>

            <hr>

            {{-- make an invoice --}}

            <table>
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Unit Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            Mobile Phone
                        </td>
                        <td>
                            <input type="text" name="unitPrice">
                        </td>
                        <td>
                            <input type="text" name="quantity">
                        </td>
                        <td>
                            <input type="text" name="totalPrice" readonly>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" class="float-right">
                            Grand Total
                        </td>
                        <td>

                        </td>
                    </tr>
                </tfoot>
            </table>



            <form action="" method="get" v-on:submit="handleForm($event)">
                <input type="text" name="firstName" placeholder="First Name" v-model="formData.firstName">
                <input type="text" name="lastName" placeholder="Last Name" v-model="formData.lastName">
                <button type="submit">Save</button>
            </form>


            <button v-on:click="a++">
                Button A
            </button>
            <p>A= @{{ a }}</p>
            <p>B= @{{ b }}</p>
            <button v-on:click="b++">
                Button B
            </button>
            <p>Salary + A = @{{ addToA }} </p>
            <p>Salary + B = @{{ addToB }} </p>

        </div>


        <hr>



    </div>


    <div style="display: none">
        <div id="app1">
            <p>
                This is the @{{ value }} instance
            </p>

            <button @click="changeValue()">
                click me
            </button>
        </div>

        <hr>

        <div id="app2">
            <p>
                This is @{{ value }} instance
            </p>
        </div>


    </div>

    <div id="app3">

    </div>

    <div id="app4">

    </div>



</body>


<script>
    const template = `
<div>
    Test title
    </div>
`;
    const app3 = new Vue({
        el: '#app3',
        data: {
            value: 'first'
        },
        template: {
            template
        }
    });

    const app4 = new Vue({
        el: '#app4',
        data: {
            value: 'second'
        }
    });


    setTimeout(() => {
        app3.$mount('#app3');
    }, 2000);
</script>



<script>
    const app1 = new Vue({
        el: '#app1',
        data: {
            value: "first"
        },
        methods: {
            changeValue() {
                app2.value = 'changed'
            }
        }
    });


    const app2 = new Vue({
        el: '#app2',
        data: {
            value: "second"
        },
        methods: {

        }
    });
</script>


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
            imgSrc__: '',
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
                name: 'Raz',
                age: 20,
                country: 'BD'
            },
            name: "Razu",
            x: 0,
            y: 0,
            formData: {
                firstName: '',
                lastName: ''
            },
            a: 0,
            b: 0,
            salary: 10
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
            updateName: function() {
                setTimeout(() => {
                    this.name = "Raza"
                }, 2000);
            },
            updateUser: function() {
                this.name = "Mina"
            },
            getCord: function(event) {
                this.x = event.clientX,
                    this.y = event.clientY
            },
            updateWithGivenName: function(newName) {
                this.name = newName;
                // console.log(event.eventType);
            },
            handleForm: function(event) {
                console.log(this.formData);
                event.preventDefault();
            }
        },
        computed: {
            addToA() {
                console.log("Add a");
                return this.a + this.salary;
            },
            addToB() {
                console.log("Add b");
                return this.b = this.salary;
            }
        }

    });
</script>

</html>
