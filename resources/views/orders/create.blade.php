<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Order Form</title>

    <script src="{{ asset('js/vue.js') }}"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.5.1/axios.min.js"
        integrity="sha512-emSwuKiMyYedRwflbZB2ghzX8Cw8fmNVgZ6yQNNXXagFzFOaQmbvQ1vmDkddHjm5AITcBIZfC7k4ShQSjgPAmQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <div class="container mt-4">
        <form action="" id="createOrderForm">
            <div class="card">
                <div class="card-header">
                    <h2>Add New</h2>
                </div>
                <div class="card-body">


                    <table class="table" id="selectProductInfoTable">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Unit Price</th>
                                <th>Quantity</th>
                                <th>Product Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <select class="form-control" @change="getProductInfoById($event)">
                                        <option value="">Choose Product</option>
                                        <option v-for="(product, index) in products" :value="product.id"
                                            :selected="product.id === selectedProduct.id ?
                                                true : false">
                                            @{{ product.name }}
                                        </option>
                                    </select>
                                </td>
                                <td>
                                    <input type="number" class="form-control" v-model="unitPriceById" readonly
                                        step="0.01">
                                </td>
                                <td>
                                    <input type="number" class="form-control" v-model="quantity" step="0.01"
                                        @input="calculateProductTotal($event)" @wheel="calculateProductTotal($event)">
                                </td>
                                <td>
                                    <input type="number" class="form-control" readonly v-model="productTotalPrice"
                                        step="0.01">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <button type="button" class="btn btn-primary"
                                        @click="appendInProductsTable($event)">Add</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <table class="table" id="allProductsTable">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Unit Price</th>
                                <th>Quantity</th>
                                <th>Product Total</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="3" class="text-right">
                                    Sub Total
                                </th>
                                <th>
                                    <input type="number" name="sub_total" step="0.01" class="form-control"
                                        value="0" v-model="subTotal" readonly>
                                </th>
                            </tr>
                            <tr>
                                <th colspan="3" class="text-right">
                                    Additional Charge
                                </th>
                                <th>
                                    <input type="number" name="additinal_charge" step="0.01" class="form-control"
                                        value="0" v-model="additionalCharge" @input="calculateGrandTotal"
                                        @wheel="calculateGrandTotal">
                                </th>
                            </tr>
                            <tr>
                                <th colspan="3" class="text-right">
                                    Discount
                                </th>
                                <th>
                                    <input type="number" name="discount" step="0.01" class="form-control"
                                        value="0" v-model="discount" @input="calculateGrandTotal"
                                        @wheel="calculateGrandTotal">
                                </th>
                            </tr>
                            <tr>
                                <th colspan="3" class="text-right">
                                    Grand Total
                                </th>
                                <th>
                                    <input type="number" readonly class="form-control" value="0" step="0.01"
                                        v-model="grandTotal">
                                </th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="card-footer">
                    <button class="btn btn-success" type="button">Save</button>
                </div>
            </div>
        </form>

    </div>


    <script>
        window.productList = {!! json_encode($products) !!}

        new Vue({
            el: '#createOrderForm',
            data() {
                return {
                    products: window.productList,
                    selectedProduct: {
                        id: null
                    },
                    unitPriceById: 0,
                    productTotalPrice: 0,
                    quantity: 0,
                    subTotal: 0,
                    grandTotal: 0,
                    additionalCharge: 0,
                    discount: 0
                }
            },
            methods: {
                // to show unit price from database
                getProductInfoById(event) {
                    console.log(event);
                    const productId = parseInt(event.target.value)
                    axios.get(
                        `{{ url('ajax/get-product-info-by-id/${productId}') }}`
                    ).then(
                        resp => {
                            this.selectedProduct = resp.data;
                            this.unitPriceById = resp.data.unit_price
                            console.log(resp);

                            this.calculateProductTotal();
                        }


                    ).catch(
                        error => {
                            console.log(error);
                        }
                    );
                },
                // calculate total price depending on quantity
                calculateProductTotal() {
                    const unitPrice = parseFloat(this.unitPriceById);
                    const quantity = parseFloat(this.quantity);
                    const productTotal = unitPrice * quantity;

                    this.productTotalPrice = productTotal;
                },
                // append the selected product in invoice all products table
                appendInProductsTable(event) {
                    const selectProductRow = $('#selectProductInfoTable tr:eq(1)').clone();
                    const productId = selectProductRow.find('select');

                    const selectedProduct = selectProductRow.find('select').val();
                    productId.val(selectedProduct);

                    // append product row in all products table
                    $('#allProductsTable').find('tbody').append(selectProductRow);


                    // get sub total
                    this.calculateSubTotal();

                    // get grand total
                    this.calculateGrandTotal();



                },
                // get sum of each row of product total
                calculateSubTotal() {
                    this.subTotal += this.productTotalPrice
                },
                // 
                calculateGrandTotal() {
                    this.grandTotal = parseFloat(this.subTotal) + parseFloat(this.additionalCharge) - parseFloat(
                        this.discount)
                }
            },
        });
    </script>
</body>

</html>
