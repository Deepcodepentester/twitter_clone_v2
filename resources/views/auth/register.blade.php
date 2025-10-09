<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advanced Signup Form</title>
    <script src="https://js.paystack.co/v1/inline.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
            margin: 0;
        }
        .form-container {
            background: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            text-align: center;
            width: 100%;
            max-width: 400px;
        }
        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .error {
            color: red;
            font-size: 14px;
            text-align: left;
            margin-top: -8px;
        }
        button {
            background: #00b894;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }
        button:hover {
            background: #008573;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h2>Signup</h2>
        <form id="signupForm" method="POST" action="{{ route('register') }}">
            @csrf
            <input type="text" id="fullName" placeholder="Full Name" name="name" value="{{ old('name') }}" required>
            @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
            <input type="email" id="email" placeholder="Email Address" name="email" value="{{ old('email') }}"required >
            <div class="col-md-6">
                                

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
            <p class="error" id="emailError"></p>
            <input type="tel" id="phone" placeholder="Phone Number" name="phone_number" required>
            @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
            <input type="password" id="password" placeholder="Password" name="password" required>
            @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
            <p class="error" id="passwordError"></p>
            <input type="password" id="confirmPassword" placeholder="Confirm Password" name="password_confirmation" required>
            <p class="error" id="confirmPasswordError"></p>
        
            <button type="submit">Signup </button>
        </form>
    </div>

    <script>
        const signupForm = document.getElementById("signupForm");

        /*signupForm.addEventListener("submit", (event) => {
            event.preventDefault();
            validateForm();
        });*/

        function validateForm() {
            const email = document.getElementById("email").value;
            const password = document.getElementById("password").value;
            const confirmPassword = document.getElementById("confirmPassword").value;

            let valid = true;

            // Email validation
            if (!validateEmail(email)) {
                document.getElementById("emailError").textContent = "Invalid email format!";
                valid = false;
            } else {
                document.getElementById("emailError").textContent = "";
            }

            // Password validation
            if (!validatePassword(password)) {
                document.getElementById("passwordError").textContent = "Password must be at least 8 characters, contain a number & special character!";
                valid = false;
            } else {
                document.getElementById("passwordError").textContent = "";
            }

            // Confirm password validation
            if (password !== confirmPassword) {
                document.getElementById("confirmPasswordError").textContent = "Passwords do not match!";
                valid = false;
            } else {
                document.getElementById("confirmPasswordError").textContent = "";
            }

            if (valid) {
                signupUser();
            }
        }

        function validateEmail(email) {
            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(email);
        }

        function validatePassword(password) {
            return /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/.test(password);
        }

        function signupUser() {
            const userData = {
                fullName: document.getElementById("fullName").value,
                email: document.getElementById("email").value,
                phone: document.getElementById("phone").value,
                password: document.getElementById("password").value
            };

            // Simulating backend registration (You should send this to your backend)
            console.log("User Registered:", userData);

            // Proceed to Paystack payment
            payWithPaystack(userData.email);
        }

        /*function payWithPaystack(email) {
            let handler = PaystackPop.setup({
                key: 'your-public-key-here', // Replace with your actual Paystack Public Key
                email: email,
                amount: document.getElementById("amount").value * 100, // Convert to kobo
                currency: "NGN",
                ref: 'PSK-' + Math.floor((Math.random() * 1000000000) + 1), // Unique reference
                callback: function(response) {
                    alert('Payment successful! Transaction ref: ' + response.reference);
                    window.location.href = "dashboard.html"; // Redirect to dashboard
                },
                onClose: function() {
                    alert('Transaction was not completed.');
                }
            });
            handler.openIframe();
        }*/
    </script>

</body>
</html>
