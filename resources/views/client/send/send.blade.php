@extends('layouts.client')

@section('content')
<div id="content" class="py-4">
    <div class="container">
        <h2 class="font-weight-400 text-center mt-3">Send Money</h2>
        <p class="text-4 text-center mb-4">Send your money on anytime, anywhere in the world.</p>

        @if(Session::has('message'))
        <div class="alert alert-success alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>{{Session::get('message')}}</strong>
        </div>
        @endif

        <form action="{{route('client.send.store')}}" method="POST">
            @csrf
            <div id="moneyBox" class="row justify-content-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="bg-light shadow-sm rounded p-3 p-sm-4 mb-4">
                        <h3 class="text-5 font-weight-400 mb-3">Currency</h3>

                        <div class="form-group">
                            <label for="send_amount">Send Money</label>
                            <div class="input-group">
                                <input type="text" class="form-control" data-bv-field="send_amount" id="send_amount"
                                    name="send_amount" placeholder="Send Amount" required>

                                <div class="input-group-append">
                                    <span class="input-group-text p-0">
                                        <select id="send_currency" name="send_currency"
                                            data-style="custom-select bg-transparent border-0" data-container="body"
                                            data-live-search="true" class="selectpicker form-control bg-transparent"
                                            required>
                                            <option data-divider="true"></option>
                                            <optgroup label="All Currency">
                                                @foreach($currencies as $currency)
                                                <option value="{{$currency->code}}"
                                                    data-icon="currency-flag {{$currency->avatar}} mr-1"
                                                    data-subtext="{{$currency->title}}">
                                                    {{$currency->code}}
                                                </option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="font-weight-bold text-danger">
                            <ul class="nav flex-column">
                                <li class="nav-item">{{$errors->first('send_currency')}}</li>
                                <li class="nav-item">{{$errors->first('send_amount')}}</li>
                            </ul>
                        </div>

                        <div class="form-group">
                            @foreach($currencies as $currency)
                            <input type="hidden" id="currency_value{{$currency->code}}" value="{{$currency->value}}">
                            @endforeach
                        </div>


                        <div class="form-group">
                            <label for="received_amount">Receive Money</label>
                            <div class="input-group">
                                <input type="text" class="form-control" data-bv-field="received_amount"
                                    id="received_amount" name="received_amount" placeholder="Received Amount" readonly
                                    required>
                                <div class="input-group-append">
                                    <span class="input-group-text p-0">
                                        <select id="received_currency" name="received_currency"
                                            data-style="custom-select bg-transparent border-0" data-container="body"
                                            data-live-search="true" class="selectpicker form-control bg-transparent"
                                            required>
                                            <option data-divider="true"></option>
                                            <optgroup label="All Currency">
                                                @foreach($currencies as $currency)
                                                <option value="{{$currency->code}}"
                                                    data-icon="currency-flag {{$currency->avatar}} mr-1"
                                                    data-subtext="{{$currency->title}}">
                                                    {{$currency->code}}
                                                </option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="font-weight-bold text-danger">
                            <ul class="nav flex-column">
                                <li class="nav-item">{{$errors->first('received_currency')}}</li>
                                <li class="nav-item">{{$errors->first('received_amount')}}</li>
                            </ul>
                        </div>

                        <div class="form-group">
                            <input type="hidden" name="fee" id="fee" value="{{$fee->amount}}" class="form-control" readonly>
                        </div>

                        <p class="text-muted text-center">
                            The current exchange rate is
                            <span class="font-weight-500" id="currencyConversion"></span>
                        </p>
                        <hr>
                        <p>Total fees <span class="text-3 float-right" id="feeAmount">0 USD</span></p>
                        {{-- <p class="font-weight-500">Total To Pay <span class="text-3 float-right">1,000.00 USD</span></p> --}}
                        <button type="button" id="moneyBoxBtn" class="btn btn-primary btn-block"
                            disabled>Continue</button>
                    </div>
                </div>
            </div>

            <div id="methodBox" class="row justify-content-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="bg-light shadow-sm rounded p-3 p-sm-4 mb-4">
                        <h3 class="text-5 font-weight-400 mb-3">Method</h3>

                        <div class="form-group mb-4">
                            <label for="send_method">Send Method</label>
                            <select class="selectpicker form-control bg-transparent" name="send_method" id="send_method"
                                required>
                                <option data-divider="true"></option>
                                <optgroup label="All Method">
                                    @foreach($methods as $method)
                                    <option value="{{$method->code}}">{{$method->title}}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </div>
                        <div class="font-weight-bold text-danger">{{$errors->first('send_method')}}</div>

                        <div class="form-group">
                            @foreach($methods as $method)
                            <input type="hidden" id="method_id{{$method->code}}" value="{{$method->method_id}}">
                            @endforeach
                        </div>

                        <div class="form-group mb-4">
                            <label for="received_method">Received Method</label>
                            <select id="received_method" class="selectpicker form-control bg-transparent"
                                name="received_method" required>
                                <option data-divider="true"></option>
                                <optgroup label="All Method">
                                    @foreach($methods as $method)
                                    <option value="{{$method->code}}">{{$method->title}}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </div>
                        <div class="font-weight-bold text-danger">{{$errors->first('received_method')}}</div>

                        <div class="form-group" id="send_method_id_wrapper">
                            <label for="send_method_id">Send Method ID</label>
                            <input type="text" class="form-control" id="send_method_id" name="send_method_id"
                                placeholder="Your Selected Send Method ID" required>
                        </div>
                        <div class="font-weight-bold text-danger">{{$errors->first('send_method_id')}}</div>

                        <div class="form-group" id="received_method_id_wrapper">
                            <label for="received_method_id">Receive Method ID</label>
                            <input type="text" class="form-control" id="received_method_id" name="received_method_id"
                                placeholder="Your Selected Received Method ID" required>
                        </div>
                        <div class="font-weight-bold text-danger">{{$errors->first('received_method_id')}}</div>

                        <div class="form-group text-center" id="admin_received_id_wrapper">
                            <label for="admin_received_id" class="font-weight-bold">Send to This ID</label>
                            <input type="text" class="form-control" id="admin_received_id" name="admin_received_id"
                                readonly required>
                        </div>
                        <div class="font-weight-bold text-danger">{{$errors->first('admin_received_id')}}</div>

                        <button type="button" id="methodBoxBtn" class="btn btn-primary btn-block"
                            disabled>Continue</button>
                    </div>
                </div>
            </div>

            <div id="summaryBox" class="row justify-content-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="bg-light shadow-sm rounded p-3 p-sm-4 mb-4">
                        <h3 class="text-5 font-weight-400 mb-3">Summery</h3>

                        <div class="form-group text-center">
                            <label for="admin_received_id2" class="font-weight-bold">Send to This ID</label>
                            <input type="text" class="form-control" id="admin_received_id2" name="admin_received_id2"
                                readonly required>
                        </div>

                        <div class="form-group text-center">
                            <label for="review" class="font-weight-bold">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{Auth::user() ? Auth::user()->email : ''}}" required
                                placeholder="Enter Your Email to Login">
                        </div>

                        <div class="form-group text-center">
                            <label for="review" class="font-weight-bold">Review</label>
                            <textarea name="review" id="review" class="form-control"
                                required>{{old('review')}}</textarea>
                        </div>
                        <div class="font-weight-bold text-danger">{{$errors->first('review')}}</div>

                        <div class="table-responsive">
                            <table class="table table-sm text-center table-borderless">
                                <thead>
                                    <tr>
                                        <th>Send Method</th>
                                        <th>Receive Method</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <span id="summary_send_method" class="text-uppercase"></span>
                                        </td>
                                        <td>
                                            <span id="summary_received_method" class="text-uppercase"></span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <hr>
                            <table class="table table-sm text-center table-borderless">
                                <thead>
                                    <tr>
                                        <th>Send</th>
                                        <th>Receive</th>
                                        <th>Fee</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>
                                            <span id="summary_send_amount"></span>
                                            <span id="summary_send_currency"></span>
                                        </td>
                                        <td>
                                            <span id="summary_received_amount"></span>
                                            <span id="summary_received_currency"></span>
                                        </td>
                                        <td>
                                            <span id="summary_fee_amount"></span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="paypal-wrapper text-center mb-3"></div>

                        <button id="confirmExchageBtn" type="submit" class="btn btn-primary btn-block">Confirm
                            Exchange</button>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>

@endsection

@push('custom-js')

<script src="https://www.paypalobjects.com/api/checkout.js"></script>

<script>
    $(document).ready(function () {
        let sendCurrency = null
        let receivedCurrency = null
        let sendCurrencyValue = null
        let receivedCurrencyValue = null
        let sendAmount = null
        let receivedAmount = null
        let sendAmountConvert = null
        let exchangeFee = null
        let sendMethod = null
        let receivedMethod = null
        let sendMethodID = null
        let receivedMethodID = null
        let sendMethodAdminID = null

        let sendCurrencyAmount = null
        let receivedCurrencyAmount = null


        // Hiding Send & Received ID
        $('#methodBox').hide()
        $('#summaryBox').hide()
        $('#send_method_id_wrapper, #received_method_id_wrapper, #admin_received_id_wrapper').hide()

        $('#send_amount').attr('readonly', true)

        // Send Currency Change or Choose
        $('#send_currency').change(function (e) {
            sendCurrency = e.target.value

            console.log(sendCurrency)

            if (sendCurrency) {
                sendCurrencyValue = $('#currency_value' + sendCurrency).val()

                console.log(sendCurrencyValue)

                $('#summary_send_currency').text(sendCurrency)
                sendAmountFieldEnable()

                if (sendAmount != null) {
                    convertSendToReceivedAmount()
                }

                currencyConversionRate()
            }
        })

        // Received Currency Change or Choose
        $('#received_currency').change(function (e) {
            receivedCurrency = e.target.value

            console.log(receivedCurrency)

            if (receivedCurrency) {
                receivedCurrencyValue = $('#currency_value' + receivedCurrency).val()

                console.log(receivedCurrencyValue)

                $('#summary_received_currency').text(receivedCurrency)
                sendAmountFieldEnable()

                if (sendAmount != null) {
                    convertSendToReceivedAmount()
                }

                currencyConversionRate()
            }
        })

        // Send Amount Enable Function
        function sendAmountFieldEnable() {
            if (sendCurrency && receivedCurrency) {
                $('#send_amount').removeAttr('readonly')
            }
        }

        function moneyBoxBtnToggle() {
            if (sendAmount) {
                $('#moneyBoxBtn').removeAttr('disabled')
            } else {
                $('#moneyBoxBtn').attr('disabled', true)
            }
        }

        function currencyConversionRate() {
            if (sendCurrency && receivedCurrency) {
                sendCurrencyAmount = 1 / sendCurrencyValue;
                receivedCurrencyAmount = (sendCurrencyAmount * receivedCurrencyValue).toFixed(2)

                $('#currencyConversion').text(
                    `1 ${sendCurrency} = ${receivedCurrencyAmount} ${receivedCurrency}`
                )
            }
        }

        // Send Amount Change
        $('#send_amount').keyup(function (e) {
            sendAmount = e.target.value

            console.log(sendAmount)
            convertSendToReceivedAmount()
            moneyBoxBtnToggle()
        })

        // Convert Send Amount to Received Amount
        function convertSendToReceivedAmount() {
            exchangeFee = $('#fee').val()

            $('#feeAmount').text(exchangeFee + ' USD');

            if (sendAmount) {
                // Send Amount Convert to Base Currency
                sendAmountConvert = sendAmount / sendCurrencyValue

                // Received Amount Converted Send Amount Multiply with Received Currency
                receivedAmount = (sendAmountConvert * receivedCurrencyValue).toFixed(4)

                $('#received_amount').val(receivedAmount)
                $('#summary_send_amount').text(sendAmount)
                $('#summary_received_amount').text(receivedAmount)
                $('#summary_fee_amount').text(exchangeFee)
            } else {
                $('#received_amount').val('')
            }
        }

        // Method Box Show
        $('#moneyBoxBtn').click(function () {
            $('#methodBox').fadeIn();
        })


        // Send Method Change or Choose
        $('#send_method').change(function (e) {
            sendMethod = e.target.value
            console.log(sendMethod)
            if (sendMethod) {
                sendMethodAdminID = $('#method_id' + sendMethod).val()
                $('#send_method_id_wrapper').fadeIn()
                $('#admin_received_id_wrapper').fadeIn()
                $('#admin_received_id').val(sendMethodAdminID)
                $('#admin_received_id2').val(sendMethodAdminID)
                $('#summary_send_method').text(sendMethod)

                if (sendMethod == 'paypal') {
                    $('#confirmExchageBtn').attr('disabled', true);
                    $('.paypal-wrapper').append(`<h6>You select paypal method so please send first</h6>
                                                <div id='paypal-button'></div>`)
                    paypalButton();
                    console.log(sendAmountConvert)
                }else{
                    $('#confirmExchageBtn').removeAttr('disabled');
                    $('.paypal-wrapper').empty()
                }

            }
        })

        // Received Method Change or Choose
        $('#received_method').change(function (e) {
            receivedMethod = e.target.value
            console.log(receivedMethod)
            if (receivedMethod) {
                $('#received_method_id_wrapper').fadeIn()
                $('#summary_received_method').text(receivedMethod)
            }
        })

        $('#send_method_id').keyup(function (e) {
            sendMethodID = e.target.value
            console.log(sendMethodID)
            methodBoxBtnToggle()
        })

        $('#received_method_id').keyup(function (e) {
            receivedMethodID = e.target.value
            console.log(receivedMethodID)
            methodBoxBtnToggle()
        })

        function methodBoxBtnToggle() {
            if (sendMethod && receivedMethod && sendMethodID && receivedMethodID) {
                $('#methodBoxBtn').removeAttr('disabled')
            } else {
                $('#methodBoxBtn').attr('disabled', true)
            }
        }

        // Method Box Show
        $('#methodBoxBtn').click(function () {
            $('#summaryBox').fadeIn();
        })


        function paypalButton() {
            paypal.Button.render({
                // Configure environment
                env: 'sandbox',
                client: {
                    sandbox: 'AZBwqi_60wJtfwVJe0CXeo5Rs1Gr3SkJFyBrsp0FxqbnmXqoq859IbSn5QwO6J_V9uzTqV1eAFZdVFGj',
                    production: 'demo_production_client_id'
                },
                // Customize button (optional)
                locale: 'en_US',
                style: {
                    size: 'small',
                    color: 'gold',
                    shape: 'pill',
                },

                // Enable Pay Now checkout flow (optional)
                commit: true,

                // Set up a payment
                payment: function (data, actions) {
                    return actions.payment.create({
                        transactions: [{
                            amount: {
                                // total: '0.01',
                                total: sendAmountConvert.toFixed(2),
                                currency: 'USD'
                            }
                        }]
                    });
                },
                // Execute the payment
                onAuthorize: function (data, actions) {

                    console.log(data)
                    

                    return actions.payment.execute().then(function () {

                        document.cookie= 'payer_id='+data.payerID;
                        document.cookie= 'payment_id='+data.paymentID;
                        document.cookie= 'order_id='+data.orderID;

                        // Show a confirmation message to the buyer
                        window.alert('Thank you for your exchange! Now confirm your exchange...');

                        $('#confirmExchageBtn').removeAttr('disabled');
                        $('.paypal-wrapper').remove();
                    });
                }
            }, '#paypal-button');
        }
    })

</script>
@endpush
